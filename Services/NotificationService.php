<?php

include_once '../Classes/Notification.php';
include_once '../Dao/IDao.php';
include_once '../Connexion/connexion.php';

class NotificationService implements IDao {

    private $listNotif = array();
    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($Notif) {
        $query = "INSERT INTO notification (NID,IDS,LIBELLE) VALUES ('" . $Notif->getId() . "','" . $Notif->getIds() . "','" . $Notif->getLibelle() . "')";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function delete($lib) {
        $query = "DELETE FROM notification WHERE LIBELLE = '" . $lib . "'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function getAll() {
        $query = "select * from notification";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $this->listNotif[] = new Notification($affichage->NID,$affichage->IDS,$affichage->LIBELLE);
        }
        return $this->listNotif;
    }

    public function getById($id) {
        $query = "select * from notification WHERE NID = '$id'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
           return  new Notification($affichage->NID, $affichage->IDS ,$affichage->LIBELLE);
        
            
        }
        
    }

    public function update($notif) {
        $query = "UPDATE notification
SET LIBELLE='" . $notif->getLibelle() . "'WHERE NID='" . $notif->getId() . "'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function delete2($a, $b) {
        
    }

    public function getBydId2($a, $b) {
        
    }

    public function auth($a, $b) {
        
    }

    public function getAllByid($a) {
        
    }

}

?>
