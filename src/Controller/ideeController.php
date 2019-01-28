<?php

namespace App\Controller;

use App\Entity\Idee;
use App\Form\IdeeFormType;
use App\services\Curl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ideeController extends AbstractController
{

    /**
     * @Route("/ideas/add", name="ideeAdd")
     * @param Request $req
     * @param RequeteController $rctrl
     * @param Curl $crl
     * @return string|Response
     */
    public function add(Request $req, RequeteController $rctrl, Curl $crl, SessionInterface $session)
    {
        $notifs = null;
        if ($session->get("mail") != null) {
            $notifs = json_decode($rctrl->recupererUtilisateurNotif($session->get("id_user"), $crl));
        }

        $idee = new Idee();

        $form = $this->createForm(IdeeFormType::class, $idee);

        $form->handleRequest($req);


        if ($form->isSubmitted() && $form->isValid()) {
            $ideeData = $form->getData();

            $ideeDataToSend = json_encode([
                'nom_idee' => $ideeData->getNomIdee(),
                'description_idee' => $ideeData->getDescriptionIdee(),
                'id_user' => $session->get("id_user"),
                'lieu' => $ideeData->getLieu()
            ]);


            $rctrl->ajouterIdee($ideeDataToSend, $crl);
        }

        {
            try {
                return $this->render('ideeCreate.html.twig', [
                    'form' => $form->createView(),
                    'notifs' => $notifs
                ]);
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
        }
    }

    /**
     * @Route("/ideas", name="idees")
     * @param RequeteController $rctrl
     * @param Curl $crl
     * @return Response
     */
    public function display(RequeteController $rctrl, Curl $crl, SessionInterface $session)
    {
        $notifs = null;
        if ($session->get("mail") != null) {
            $notifs = json_decode($rctrl->recupererUtilisateurNotif($session->get("id_user"), $crl));
        }

        $idees = $rctrl->recupererIdee($crl);

        $ideesToDisplay = json_decode($idees);

        if (is_object($ideesToDisplay)) {
            $idees = '[' . $idees . ']';
            $ideesToDisplay = json_decode($idees);
        }
        dump($ideesToDisplay);

        $users = array();
        foreach ($ideesToDisplay as $idea) {
            $users[$idea->id_user] = json_decode($rctrl->recupererUtilisateurParId($idea->id_user, $crl));
        }
        dump($users);

        $likes = array();
        foreach ($ideesToDisplay as $idea) {
            $likes[$idea->id_event_idee] = json_decode($rctrl->recupererEventIdeeAime($idea->id_event_idee, $crl));
        }

        dump($likes);

        try {
            return $this->render('ideeDisplay.html.twig', [
                'idees' => $ideesToDisplay,
                'users' => $users,
                'likes' => $likes,
                'notifs' => $notifs
            ]);
        } catch (\Exception $ex) {
            return new Response($ex->getMessage() );
        }

    }


    /**
     * @Route("/vote/{id_event_idee}" , name="voteById")
     */
    function vote($id_event_idee, RequeteController $rctrl, Curl $crl, SessionInterface $session)
    {
        $id_user = $session->get("id_user");

        $like = json_encode([
            'id_event_idee' => $id_event_idee,
            'id_user' => $id_user
        ]);

        $rctrl->publierUnLikeSurEventIdee($like, $crl);

        return $this->redirectToRoute("idees");
    }


}