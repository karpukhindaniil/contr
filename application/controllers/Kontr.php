<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kontr extends CI_Controller
{
    public function products()
    {
        $this->load->view('temp/head.php');
        $this->load->view('temp/navcontr.php', $data);
        $this->load->model('product_model');
        $data['product'] = $this->product_model->filterproduct();
        $this->load->view('main_view.php', $data);
        $this->load->view('temp/footer.php');
    }   

    public function orders()
    {
        $this->load->view('temp/head.php');

        $user = $this->session->userdata();
        $data['UserLogin'] = $user['UserLogin'];
        $this->load->view('temp/navcontr.php', $data);
        $this->load->model('order_model');
        $data['orders'] = $this->order_model->selectorders();
        $this->load->model('pricelist_model'); 
        $data['selectProduct'] = $this->pricelist_model->selectProduct();
        $this->load->model('user_model'); 
        $data['selectUser'] = $this->user_model->selectUser();
        $this->load->view('orders.php', $data);
        $this->load->view('temp/footer.php');
    }

    public function orders2()
    {
        $this->load->view('temp/head.php');

        $user = $this->session->userdata();
        $data['UserLogin'] = $user['UserLogin'];
        $this->load->view('temp/navcontr.php', $data);
        $this->load->model('order_model');
        $data['orders'] = $this->order_model->selectorders();
        $this->load->model('product_model'); 
        $data['selectPriceList'] = $this->product_model->selectPriceList();
        $this->load->model('pricelist_model'); 
        $data['selectProduct'] = $this->pricelist_model->selectProduct();
        $this->load->model('user_model'); 
        $data['selectUser'] = $this->user_model->selectUser();
        $this->load->view('addorders.php', $data);
        $this->load->view('temp/footer.php');
    }

    public function orders3()
    {
        $this->load->view('temp/head.php');

        $user = $this->session->userdata();
        $data['UserLogin'] = $user['UserLogin'];
        $this->load->view('temp/navcontr.php', $data);
        $this->load->model('order_model');
        $data['orders'] = $this->order_model->selectorders();
        $this->load->model('product_model'); 
        $data['selectPriceList'] = $this->product_model->selectPriceList();
        $this->load->model('pricelist_model'); 
        $data['selectProduct'] = $this->pricelist_model->selectProduct();
        $this->load->model('user_model'); 
        $data['selectUser'] = $this->user_model->selectUser();
        $this->load->view('updorders.php', $data);
        $this->load->view('temp/footer.php');
    }
    

    public function addorders()
    {
        if(!empty($_POST))
        {
            $UserID=$_POST['UserID'];
            $OrderDate=$_POST['OrderDate'];
            $OrderDateSending=$_POST['OrderDateSending'];
            $OrderDateFakt=$_POST['OrderDateFakt'];
            $OrderStatus=$_POST['OrderStatus'];
            $OrderKol=$_POST['OrderKol'];
            $PriceListID=$_POST['PriceListID'];
            $ProductID=$_POST['ProductID'];
            $this->load->model('order_model');
            $this->order_model->addorders($UserID, $OrderDate, $OrderDateSending, $OrderDateFakt, $OrderStatus, $OrderKol,
             $PriceListID, $ProductID);
            redirect('kontr/orders');
        }
    }

    public function deleteorder()
    {
        $ordersID=$this->uri->segment(3,0);

        $this->load->model('order_model');

        $this->order_model->deleteorders($ordersID);
        redirect('kontr/orders');
    }   
    
    public function updorder()
    {
        $ordersID=$this->uri->segment(3,0);
        $this->load->view('temp/head.php');
        $user = $this->session->userdata();
        $data['UserLogin'] = $user['UserLogin'];
    
        $this->load->view('temp/navcontr.php', $data);
        $this->load->model('order_model'); 
        $data['orders'] = $this->order_model->selectorders1($ordersID);// ссылку связи из таблицы 
        $this->load->model('product_model'); 
        $data['selectPriceList'] = $this->product_model->selectPriceList();
        $this->load->model('pricelist_model'); 
        $data['selectProduct'] = $this->pricelist_model->selectProduct();
        $this->load->model('user_model'); 
        $data['selectUser'] = $this->user_model->selectUser();
        $this->load->view('updorder.php', $data);
        $this->load->view('temp/footer.php');
    } 
    


    //Обновить контрагент
    public function updorder2()
    {
        $this->load->view('temp/head.php');
        $this->load->view('temp/navcontr.php');
        $this->load->model('product_model'); 
        $data['selectPriceList'] = $this->product_model->selectPriceList();
        $this->load->model('pricelist_model'); 
        $data['selectProduct'] = $this->pricelist_model->selectProduct();
        $this->load->model('user_model'); 
        $data['selectUser'] = $this->user_model->selectUser();
        $this->load->view('updorder.php', $data);
        if(!empty($_POST))
        {
            $ordersID=$_POST['ordersID'];
            $UserID=$_POST['UserID'];
            $OrderDate=$_POST['OrderDate'];
            $OrderDateSending=$_POST['OrderDateSending'];
            $OrderDateFakt=$_POST['OrderDateFakt'];
            $OrderStatus=$_POST['OrderStatus'];
            $OrderKol=$_POST['OrderKol'];
            $PriceListID=$_POST['PriceListID'];
            $ProductID=$_POST['ProductID'];
            $this->load->model('order_model');
            $this->order_model->addorders($UserID, $OrderDate, $OrderDateSending, $OrderDateFakt, $OrderStatus, $OrderKol, $PriceListID, $ProductID);
            redirect('kontr/orders');
        }
        $this->load->view('temp/footer.php');
    }

}
?>