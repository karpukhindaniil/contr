<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Operator extends CI_Controller
{
    public function kontr()
    {
        $this->load->view('temp/head.php');

        $user = $this->session->userdata();
        $data['UserLogin'] = $user['UserLogin'];
        $this->load->view('temp/navoperator.php', $data);
        $this->load->model('kontr_model');
        $data['contragent'] = $this->kontr_model->filterkontr();

        $this->load->view('kontr.php', $data);
        $this->load->view('temp/footer.php');
    }

    //Выброр поиск м фильтрация
    public function product()
    {
        $this->load->view('temp/head.php');
        $user = $this->session->userdata();
        $data['UserLogin'] = $user['UserLogin'];
        $this->load->view('temp/navoperator.php', $data);
        $this->load->model('product_model');
        $data['product'] = $this->product_model->product();
        $this->load->view('filterproduct.php', $data);
        if(!empty($_POST))
        {   
            $Searchproduct = $_POST['searchproductname'];
            $SearchPrice = $_POST['searchproductprice'];
            $data['product'] = $this->product_model->selectproductfilter($Searchproduct,$SearchPrice);
            $this->load->view('product.php', $data);
        }
        else
        {
           //Как сделать кнопка полностью таблицу ??? 
            $data['product'] = $this->product_model->product();
            $this->load->view('product.php', $data);
        }
        $this->load->view('temp/footer.php');
    }

    public function orders()
    {
        $this->load->view('temp/head.php');

        $user = $this->session->userdata();
        $data['UserLogin'] = $user['UserLogin'];
        $this->load->view('temp/navoperator.php', $data);
        $this->load->model('order_model');
        $data['orders'] = $this->order_model->selectorders();

        $this->load->view('ordersoperator.php', $data);
        $this->load->view('temp/footer.php');
    }
//список заказов, готвых к доставен
    public function dostavka()
    {
        $this->load->view('temp/head.php');

        $user = $this->session->userdata();
        $data['UserLogin'] = $user['UserLogin'];
        $this->load->view('temp/navoperator.php', $data);
        $this->load->model('order_model');
        $data['orders'] = $this->order_model->selectordersdostavka();
        $this->load->model('user_model'); 
        $data['selectUser'] = $this->user_model->selectUser();
        $this->load->view('filterorderkontr.php', $data);
        if(!empty($_POST))
        {   
            $OrdersUserID = $_POST['UserID'];
            $data['orders'] = $this->order_model->selectordersdostavkakontr($OrdersUserID);
            $this->load->view('ordersdostavka.php', $data);
        }
        else
        {
           $this->load->model('order_model');
           $data['orders'] = $this->order_model->selectordersdostavka();
            $this->load->view('ordersdostavka.php', $data);
        }
        $this->load->view('temp/footer.php');
    }  

    public function updorderstatus()
    {
        $ordersID=$this->uri->segment(3,0);

        $this->load->model('order_model');

        $this->order_model->updorderstatus($ordersID);
        redirect('operator/orders');
    }



}
?>