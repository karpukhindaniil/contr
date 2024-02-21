<?php
class Tovar_model extends CI_Model{

    public function filter_tovar(){
        $sql = 'select TovarName, TovarPrice, TovarDescription, TovarCount, GruppName from tovar, grupp WHERE grupp.GruppID=tovar.GruppID';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function create_tovar($tovarname, $tovarprice, $tovardescription, $tovarcount, $grupp_id)
    {
    $sql = "INSERT INTO tovar (TovarName, TovarPrice, TovarDescription, TovarCount, GruppID) VALUES (?,?,?,?,?)";
    $this->db->query($sql,array($tovarname, $tovarprice, $tovardescription, $tovarcount, $grupp_id));
    }
}
?>