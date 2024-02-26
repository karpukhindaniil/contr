<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller{

    public function index(){
        $this->load->view('temp/head.php');
		$User = $this->session->userdata();
		if(!empty($User['RoleID'])) {
            $data['UserLogin'] = $User['UserLogin'];
			if($User['RoleID'] == 2) {
				$this->load->view('temp/navoperator.php', $data);
			}
			else if($User['RoleID'] == 1) {
				$this->load->view('temp/navadmin.php',  $data);
			}
            else if($User['RoleID'] == 3) {
				$this->load->view('temp/navcontr.php',  $data);
			}
        }
        else
        {
        $this->load->view('temp/nav.php');
        }
		$this->load->model('Product_model');
		$data['Product'] = $this->Product_model->Product_select();
        $this->load->view('view_Product.php', $data);
        $this->load->view('temp/footer.php');
    }
	
	public function addOrder(){
        $this->load->view('temp/head.php');
        $this->load->view('temp/.php');
        $this->load->view('form_Order.php');
        $this->load->view('temp/.php'); 
    }
	public function PriceList(){
        $this->load->view('temp/head.php');
        $this->load->view('temp/.php');
		$this->load->model('PriceList_model');
		$data['PriceList'] = $this->PriceList_model->PriceList_select();// grupp_model выполняет свой метод gruppa_select
        $this->load->view('.php', $data);// результат записываем в $data
        $this->load->view('temp/.php'); 
    }
    public function addPriceList(){
        $this->load->view('temp/.php');
        $this->load->view('temp/.php');
        $this->load->view('form_PriceList.php');
		$this->load->model('PriceList_model');
		$data['PriceList'] = $this->PriceList_model->PriceList_select();// grupp_model выполняет свой метод gruppa_select
        $this->load->view('view_PriceList.php', $data);// результат записываем в $data
        $this->load->view('temp/.php'); 
    }
	
	public function login(){
        $this->load->view('temp/head.php');
        $this->load->view('temp/nav.php');
		$this->load->view('form_login.php');
		if(!empty($_POST))
        {
            $UserLogin = $_POST['UserLogin'];
            $UserPassword = $_POST['UserPassword'];
            $this->load->model('User_model');
            $User = $this->User_model->user_select($UserLogin, $UserPassword);

            if(!empty($User)){
                $this->session->set_userdata($User);
				
				}
            redirect("main/");
        
 }
         $this->load->view('temp/footer.php');       
    }


 

	
	public function exit(){
        $this->session->unset_userdata('UserLogin');
        $this->session->unset_userdata('RoleID');
        redirect('main/login');
		
    }
	
	



}

?>