<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller{
    public function index(){
        $this->load->view('temp/header.php');
        //проверим кто на сайте
        $user = $this->session->userdata();
        if(!empty($user['UserID']))
        {
            $data['UserFIO']=$user['UserFIO'];
            if($user['UserRole']=="Контрагент"){
                $this->load->view('temp/navkontragent.php', $data);
            }
            if($user['UserRole']=="Оператор"){
                $this->load->view('temp/navoperator.php', $data);
            }
            if($user['UserRole']=="Администратор"){
                $this->load->view('temp/navbuhgalter.php', $data);
            }
        }
            else{
            $this->load->view('temp/nav.php');                
            }        
        $this->load->model('Tovar_model');
        $data["tovar"]= $this->Tovar_model->filter_tovar();
        $this->load->view('main_view.php',$data);
        $this->load->view('temp/footer.php'); 
    }

    public function login(){
        $this->load->view('temp/header.php');
        $this->load->view('temp/nav.php');
//запишем данные в сессию 

        if(!empty($_POST))
        {
            $userlogin=$_POST['UserLogin'];
            $userpassword=$_POST['UserPassword'];
            $this->load->model('User_model');   //В 11 это поздно         
            $user=$this->User_model->login($userlogin, $userpassword);
            if(!empty($user))
            {
            $this->session->set_userdata($user);
            redirect('main');                    
            }                
            else
            {
                echo "Неверен логин или пароль";              
            }
        }
        $this->load->view('login.php');
        $this->load->view('temp/footer.php');      
        }    

        public function logout(){
            $this->load->library('session');
            $items = array('UserFIO', 'UserID', 'UserRole');
            $this->session->unset_userdata($items);
            redirect('main');
       }

}
?>
