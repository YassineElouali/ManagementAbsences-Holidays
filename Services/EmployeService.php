<?php

include_once '../Dao/IDao.php';
include_once '../Connexion/connexion.php';
include_once '../Classes/Employe.php';

class EmployeService implements IDao {

    private $listEmploye = array();
    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($Employe) {
        $query = "INSERT INTO employe (EID,GID,ENOM,EPRENOM,ETEL,EADRESSE,EEMAIL,EMDP,ESALAIRE,EDATER,ESOLDE) VALUES ('" . $Employe->getId() . "','" . $Employe->getEg() .
                "','" . $Employe->getNom() . "','" . $Employe->getPrenom() . "','" . $Employe->getTel() . "','" . $Employe->getAdresse()
                . "','" . $Employe->getEmail() . "','" . $Employe->getMdp() . "','" . $Employe->getSalaire()
                . "','" . $Employe->getDater() . "','" . $Employe->getSolde() . "')";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function delete($id) {
         $query = "DELETE FROM employe WHERE EID = '" . $id . "'";
$req = $this->connexion->getConnextion()->prepare($query);
$req->execute();
    }

    public function getAll() {
        $query = "select * from employe";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $this->listEmploye[] = new Employe($affichage->EID,$affichage->GID,$affichage->ENOM,$affichage->EPRENOM,$affichage->ETEL
                    ,$affichage->EADRESSE,$affichage->EEMAIL,$affichage->EMDP,$affichage->ESALAIRE,$affichage->EDATER,$affichage->ESOLDE);
        }
        return $this->listEmploye;
    }

    public function getById($id) {
         $query = "select * from employe WHERE EID = '$id'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $e = new Employe($affichage->EID,$affichage->GID,$affichage->ENOM,$affichage->EPRENOM,$affichage->ETEL
                    ,$affichage->EADRESSE,$affichage->EEMAIL,$affichage->EMDP,$affichage->ESALAIRE,$affichage->EDATER,$affichage->ESOLDE);
        }
        return $e;
    }
    
    
     public function auth($email, $mdp) {
     
          $query = "select * from employe WHERE EEMAIL = '$email' and EMDP='$mdp'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
        while ($affichage = $req->fetch(PDO::FETCH_OBJ)) {
            $e = new Employe($affichage->EID,$affichage->GID,$affichage->ENOM,$affichage->EPRENOM,$affichage->ETEL
                    ,$affichage->EADRESSE,$affichage->EEMAIL,$affichage->EMDP,$affichage->ESALAIRE,$affichage->EDATER,$affichage->ESOLDE);
        }
        
        return $e;
        
        
    }
    

    public function update($Employe) {
    $query = "UPDATE employe set GID='" . $Employe->getEg() . "',ENOM='" . $Employe->getNom() . "',EPRENOM='" . $Employe->getPrenom() . "',ETEL='" . $Employe->getTel() . "',EADRESSE='" . $Employe->getAdresse()."',"
            . "EEMAIL='" . $Employe->getEmail() . "',EMDP='" . $Employe->getMdp() . "',ESALAIRE='" . $Employe->getSalaire()."',"
            . "EDATER='" . $Employe->getDater() . "',ESOLDE='" . $Employe->getSolde() . "' where EID='".$Employe->getId()."'";
        $req = $this->connexion->getConnextion()->prepare($query);
        $req->execute();
    }

    public function delete2($a, $b) {
        
    }

    public function getBydId2($a, $b) {
        
    }

    public function getAllByid($a) {
        
    }

}
?>

