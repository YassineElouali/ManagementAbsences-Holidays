<?php

include_once '../Classes/Grade.php';
include_once '../Dao/IDao.php';
include_once '../Connexion/connexion.php';



class GradeService implements IDao {

    private $listGrade = array();
    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($Grade) {
        $query = "INSERT INTO grade (GID,GLIBELLE) VALUES ('" . $Grade->getId() . "','" . $Grade->getLibelle() . "')";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM Grade WHERE GID = '" . $id . "'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function getAll() {
        $query = "select * from grade";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $this->listGrade[] = new Grade($affichage->GID, $affichage->GLIBELLE);
        }
        return $this->listGrade;
    }

    public function getById($id) {
        $query = "select * from grade WHERE GID = '$id'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $g = new Grade($affichage->GID, $affichage->GLIBELLE);
        }
        return $g;
    }

    public function update($Grade) {
        $query = "UPDATE grade
SET GLIBELLE='" . $Grade->getLibelle() . "'
WHERE GID='" . $Grade->getId() . "'";
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
