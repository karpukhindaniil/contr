<?php
class Zakaz_model extends CI_Model{

    public function filter_zakaz(){
        $sql = 'select * from zakaz';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function create_zakaz($user_id, $dogovor_id, $zakazdate, $zakazdatesending, $zakazstatus, $count, $pricelist_id, $counteragent_id, $tovar_id)
    {
    $sql = "INSERT INTO zakaz (UserID, DogovorID, ZakazDate, ZakazDateSending, ZakazStatus, Count, PriceListID, CounterAgentID, TovarID) VALUES (?,?,?,?,?,?,?,?,?)";
    $this->db->query($sql,array($user_id, $dogovor_id, $zakazdate, $zakazdatesending, $zakazstatus, $count, $pricelist_id, $counteragent_id, $tovar_id));
    }

    public function zayavka($zakaz_id){
        $sql = "update zakaz set status = 'Заявлена' WHERE ZakazID=?";
        $this->db->query($sql, $zakaz_id);
    }//20-летний турист из Ростовской области в Москве

    public function otkaz($zakaz_id){
        $sql = "DELETE FROM zakaz WHERE ZakazID=?";
        $this->db->query($sql, $zakaz_id);
    }

}
?>