<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\services\Curl;
class RequeteController extends AbstractController
{
    /**
     *
     * TODO penser à rajouter le parametre de token
     */
    /**
     * EVENEMENT
     */
    public function ajouterEvenement($data, Curl $crl)
    {
        $response = $crl->faireRequeteAvecHeader("POST", "http://10.131.129.13:5000/api/evenement/ajouter", "application/javascript", $data);

    }
    public function recupererEvenement($data = null, Curl $crl)
    {
        $data = $data ? $data : "";
        return $query = $crl->faireRequeteAvecHeader("GET", "http://10.131.129.13:5000/api/evenement/recuperer", "application/javascript", $data);
    }
    /**+
     * IDEE
     */
    public function ajouterIdee($data, Curl $crl)
    {
        $response = $crl->faireRequeteAvecHeader("POST", "http://10.131.129.13:5000/api/idee/ajouter", "application/javascript", $data);
    }
    public function recupererIdee(Curl $crl, $data = null)
    {
        $data = $data ? $data : "";
       return $query = $crl->faireRequeteAvecHeader("GET", "http://10.131.129.187:5000/api/idee/recuperer", "application/javascript", $data);
    }
    /*
    public function ajouterUtilisateur($data, Curl $crl)
    {
            $response = $crl->faireRequeteAvecHeader("POST", "http://10.131.129.13:5000/api/utilisateur/ajouter", "application/javascript", $data);
    }
    public function connexionUtilisateur($data)
    {
            return $response = $crl->faireRequeteAvecHeader("POST", "http://10.131.129.13:5000/api/utilisateur/ajouter", "application/javascript", $data);
    }
     */
    /**
     * ACHETER
     */
    public function acheter($data, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("POST", "http://10.131.129.13:5000/api/achete/ajouter", "application/javascript", $data);
    }
    public function recupererAchats(curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("POST", "http://10.131.129.13:5000/api/achete/ajouter", "application/javascript", $data);
    }
    public function recupererProduit($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/achate/recuperer/{$id}", 'application/javascript');
    }
    public function recupererAcheteur($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/achate/recuperer/{$id}", 'application/javascript');
    }
    /***
     * AIME
     */
    public function recupererTousLesJaime(curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/aime/recuperer/", 'application/javascript');
    }
    public function recupererPhotoAimee($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/aime/recuperer/{$id}", 'application/javascript');
    }
    public function recupererUtilisateurAimant($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/aime/recuperer/{$id}", 'application/javascript');
    }
    public function publierUnLikeSurPhoto($data, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("POST", "http://10.131.129.13:5000/api/achete/ajouter", "application/javascript", $data);
    }
    /**
     * AIME_IDEE
     */
    public function recupererToutesLesEventAimee(curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("GET", "http://10.131.129.13:5000/api/aime_idee/ajouter", "application/javascript");
    }
    public function recupererUtilisateurAimeIdeeEvent($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/aime_idee/recuperer/{$id}", 'application/javascript');
    }
    public function recupererEventIdeeAime($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/aime_idee/recuperer/{$id}", 'application/javascript');
    }
    public function publierUnLikeSurEventIdee($data, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("POST", "http://10.131.129.13:5000/api/aime_idee/ajouter", "application/javascript", $data);
    }
    /**
     * COMMENTAIRE
     */
    public function recupereCommentaire(curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("GET", "http://10.131.129.13:5000/api/commentaire/recuperer", "application/javascript");
    }
    public function recupererCommentaireParId($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/commentaire/recuperer/{$id}", 'application/javascript');
    }
    /**
     * LIEU
     *
     */
    public function recupererTousLesLieus(curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("GET", "http://10.131.129.13:5000/api/lieu/recuperer", "application/javascript");
    }
    public function recupererLieusParId($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/lieu/recuperer/{$id}", 'application/javascript');
    }
    /**
     * NOTIFIE
     */
    public function recupererToutesLesNotifS(curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("GET", "http://10.131.129.13:5000/api/notif/recuperer", "application/javascript");
    }
    public function recupererIdeeNotif($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/notif/recuperer/{$id}", 'application/javascript');
    }
    public function recupererUtilisateurNotif($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/notif/recuperer/{$id}", 'application/javascript');
    }
    public function publierUnUtilisateurANotifie($data, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("POST", "http://10.131.129.13:5000/api/notif/ajouter", "application/javascript", $data);
    }
    /**
     * PARTICIPANT
     */
    public function recupererToutesParticipation(curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("GET", "http://10.131.129.13:5000/api/participation/recuperer", "application/javascript");
    }
    public function recupererUilisateurParticipant($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/participation/recuperer/{$id}", 'application/javascript');
    }
    public function recupererEvenementParticipe($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/participation/recuperer/{$id}", 'application/javascript');
    }
    /**
     * PHOTO
     */
    public function recupererToutesLesPhotos(curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("GET", "http://10.131.129.13:5000/api/photo/recuperer", "application/javascript");
    }
    public function recupererPhotoParId($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/photo/recuperer/{$id}", 'application/javascript');
    }
    public function ajouterPhoto($data, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("POST", "http://10.131.129.13:5000/api/photo/ajouter", "application/javascript", $data);
    }
    /**
     * PRODUIT
     */
    public function recupererTousLesProduits(curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("GET", "http://10.131.129.13:5000/api/produit/recuperer", "application/javascript");
    }
    public function recupererProduitParId($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/produit/recuperer/{$id}", 'application/javascript');
    }
    public function ajouterProduit($data , $path, curl $curl)
    {
        $response = $curl->faireRequeteAvecFichier("POST", "http://10.131.129.187:5000/api/produit/ajouter", "application/javascript", $data, $path);

    }
    /**
     *
     * UTILISATEUR
     */
    public function recupererTousLesUtilisateur(curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("GET", "http://10.131.129.13:5000/api/utilisateur/recuperer", "application/javascript");
    }
    public function recupererUtilisateurParId($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/utilisateur/recuperer/{$id}", 'application/javascript');
    }
    public function recupererUtilisateurParMail($id, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader('GET', "http://10.131.129.13:5000/api/utilisateur/recuperer/{$id}", 'application/javascript');
    }
    public function ajouterUtilisateur($data, curl $curl)
    {
        return $response = $curl->faireRequeteAvecHeader("POST", "http://10.131.129.13:5000/api/utilisateur/ajouter", "application/javascript", $data);
    }
    public function connexionUtilisateur($data, curl $curl)
    {
        return $response = $curl->faireRequete("POST", "http://10.131.129.13:5000/api/utilisateur/connexion", "application/javascript", $data);
    }
}
?>