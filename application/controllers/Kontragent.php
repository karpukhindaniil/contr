<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class kontragent extends CI_Controller{




    public function zakaz()
    {
        $this->load->model('Zakaz_model');

        if(!empty($_POST))
        {
        $user_id = $_POST['UserID'];
        $dogovor_id = $_POST['DogovorID']; 
        $zakazdate = $_POST['ZakazDate'];
        $zakazdatesending = $_POST['ZakazDateSending'];  
        $zakazstatus = $_POST['ZakazStatus'];
        $count = $_POST['Count']; 
        $pricelist_id = $_POST['PriceListID']; 
        $counteragent_id = $_POST['CounterAgentID'];
        $tovar_id=$_POST['TovarID'];
        $data["zakaz"]= $this->tur_model->create_tur($user_id, $dogovor_id, $zakazdate, $zakazdatesending, $zakazstatus, $count, $pricelist_id, $counteragent_id, $tovar_id);
        }
        redirect('main/');//там не будет обучающихся, будут только мужчины-сотрудники
    }

    public function logout(){
        $this->load->library('session');
        $items = array('username', 'id_user', 'rol');
        $this->session->unset_userdata($items);
        redirect('main');
   }

}
?>