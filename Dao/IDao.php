<?php

interface IDao {

    public function create($obj);

    public function update($obj);

    
    

    public function delete($obj);
    
    public function delete2($a,$b);
    
    

    public function getById($obj);
    
    public function getBydId2($a,$b);
    
    
    
    public function getAll();
    public function getAllByid($a);
    
    
    public function auth($a,$b);
}

?>