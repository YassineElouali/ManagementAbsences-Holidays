<?php

include_once '../Classes/Notifd.php';
include_once '../Dao/IDao.php';
include_once '../Connexion/connexion.php';

class NotifdService implements IDao {

    private $listNotifd = array();
    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($Notif) {
        $query = "INSERT INTO notifd (NID,IDD,LIBELLE,NTYPE) VALUES ('" . $Notif->getId() . "','" . $Notif->getIdd() . "','" . $Notif->getLibelle() . "','" . $Notif->getNtype() . "')";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function delete($lib) {
        $query = "DELETE FROM notifd WHERE LIBELLE = '" . $lib . "'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function getAll() {
        $query = "select * from notifd";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $this->listNotifd[] = new Notifd($affichage->NID,$affichage->IDD,$affichage->LIBELLE,$affichage->NTYPE);
        }
        return $this->listNotifd;
    }

    public function getById($id) {
        $query = "select * from notifd WHERE NID = '$id'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $g = new Notification($affichage->NID,$affichage->IDD,$affichage->LIBELLE,$affichage->NTYPE);
        }
        return $g;
    }

    public function update($notif) {
        $query = "UPDATE notifd
SET LIBELLE='" . $notif->getLibelle() . "',NTYPE='".$notif->getNtype()."' WHERE NID='" . $notif->getId() . "'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function delete2($a, $b) {
        
    }

    public function getBydId2($a, $b) {
        
    }

    public function auth($a, $b) {
        
    }

    public function getAllByid($id) {
        
         $query = "select * from notifd WHERE IDD = '$id'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $this->listNotifd [] = new Notifd($affichage->NID,$affichage->IDD,$affichage->LIBELLE,$affichage->NTYPE);
        }
        return $this->listNotifd;
        
    }

}

?>
