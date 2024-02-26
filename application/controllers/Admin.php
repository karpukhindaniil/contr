<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller
{
    //список товаров
    public function products()
    {
        $this->load->view('temp/head.php');

        $user = $this->session->userdata();
        $data['UserLogin'] = $user['UserLogin'];
        $this->load->view('temp/navadmin.php', $data);
        $this->load->model('product_model');
        $data['product'] = $this->product_model->Product_select();
        $this->load->view('view_ProductPriceList.php', $data);
        $this->load->view('temp/footer.php');
    } 
    //Указание цены с привязкой к определённому прайс листу
    public function productspricelist()
    {
        $ProductID=$this->uri->segment(3,0);

        $this->load->model('product_model');

        $this->product_model->updproductpricelist($ProductID);
        redirect('admin/products');
    } 
//список заказов
    public function orders()
    {
        $this->load->view('temp/head.php');

        $user = $this->session->userdata();
        $data['UserLogin'] = $user['UserLogin'];
        $this->load->view('temp/navadmin.php', $data);
        $this->load->model('order_model');
        $data['orders'] = $this->order_model->selectorders();

        $this->load->view('ordersotchet.php', $data);
        $this->load->view('temp/footer.php');
    }   

//список заказов, готвых к доставен
public function otchet()
{
    $this->load->view('temp/head.php');

    $user = $this->session->userdata();
    $data['UserLogin'] = $user['UserLogin'];
    $this->load->view('temp/navadmin.php', $data);
    $this->load->model('order_model');
    $data['orders'] = $this->order_model->selectorders();
    $this->load->model('user_model'); 
    $data['selectUser'] = $this->user_model->selectUser();
    $this->load->model('product_model'); 
    $data['selectPriceList'] = $this->product_model->selectPriceList();
    $this->load->view('filterorderskontrproductperiod.php', $data);
    if(!empty($_POST))
    {   
        $OrdersUserID = $_POST['UserID'];
        $OrdersPriceListID = $_POST['PriceListID'];
        $firstdate = $_POST['firstdate'];
        $seconddate = $_POST['seconddate'];
        $data['orders'] = $this->order_model->selectorderskontrtovarperiod($OrdersUserID, $OrdersPriceListID, $firstdate, $seconddate);
        $this->load->view('ordersotchet.php', $data);
    }
    else
    {
       $this->load->model('order_model');
       $data['orders'] = $this->order_model->selectorders();
        $this->load->view('ordersotchet.php', $data);
    }
    $this->load->view('temp/footer.php');
}  
    
    //список невыполненных заказов за период
    public function ordernevypoln()
    {
        $this->load->view('temp/head.php');

        $user = $this->session->userdata();
        $data['UserLogin'] = $user['UserLogin'];
        $this->load->view('temp/navadmin.php', $data);
        $this->load->model('order_model');
        $data['orders'] = $this->order_model->selectordersnevyp();
        $this->load->view('filterorder.php', $data);
        if(!empty($_POST))
        {   
            $firstdate = $_POST['firstdate'];
            $seconddate = $_POST['seconddate'];
            $data['orders'] = $this->order_model->selectordersnevypzaperiod($firstdate, $seconddate);
            $this->load->view('ordersnevyp.php', $data);
        }
        else
        {
           //Как сделать кнопка полностью таблицу ??? 
           $data['orders'] = $this->order_model->selectordersnevyp();
            $this->load->view('ordersnevyp.php', $data);
        }
        $this->load->view('temp/footer.php'); 

    }   



//Просмотр контрагент 
public function contragent()
{
    $this->load->view('temp/head.php');
    
    $user = $this->session->userdata();
    $data['UserLogin'] = $user['UserLogin'];
    $this->load->view('temp/navadmin.php', $data);
    $this->load->model('kontr_model'); 

    $data['selectVidContragent'] = $this->kontr_model->selectVidContragent();
    $data['contragent'] = $this->kontr_model->filterkontr();
    
    $this->load->view('dodcontragent.php', $data);
    $this->load->view('temp/footer.php');
}
  


  //Удалить кнопка контрагент 
  public function DeleteContr1()
  {
      $ContragentDogovorID=$this->uri->segment(3,0);
      $this->load->model('kontr_model');
      $this->kontr_model->deletecontr($ContragentDogovorID);
      redirect('admin/contragent');
  }


    //Добавить контрагентр 
    public function dodcontr()
    {
        if(!empty($_POST))
        {
            $NameContragent=$_POST['NameContragent'];
            $DogovorDate=$_POST['DogovorDate']; 
            $Adress=$_POST['Adress'];
            $INN=$_POST['INN'];
            $KPP=$_POST['KPP'];
            $VidContragentID=$_POST['VidContragentID'];
            $this->load->model('kontr_model');
            $this->kontr_model->DodContr($NameContragent,$DogovorDate,$Adress,$INN,$KPP,$VidContragentID);
            redirect('Admin/Contragent');
        }
    }

    public function deletecontr()
    {
        $ContragentDogovorID=$this->uri->segment(3,0);
        $this->load->model('kontr_model');
        $this->kontr_model->deleteContr($ContragentDogovorID);
        redirect('admin/contragent');
    }

    //ссылку Кнопка изменить через страница Обновление контрагент // Джепаров Тимур 
    public function updcontr()
    {   
        $ContragentDogovorID=$this->uri->segment(3,0);
        $this->load->view('temp/head.php');
        $user = $this->session->userdata();
        $data['UserLogin'] = $user['UserLogin'];

        $this->load->view('temp/navadmin.php', $data);
        $this->load->model('kontr_model'); 
        $data['contragent'] = $this->kontr_model->selectcontr1($ContragentDogovorID);// ссылку связи из таблицы 
       $data['selectVidContragent'] = $this->kontr_model->selectVidContragent();//Выпадающий список 
        $this->load->view('updcontr.php', $data);
        $this->load->view('temp/footer.php');
    }
    

    //Обновить контрагент
   public function updcontr2()
    {
        $this->load->view('temp/head.php');
        $this->load->view('temp/navadmin.php');
        $this->load->model('kontr_model');
        $data['selectVidContragent'] = $this->kontr_model->selectVidContragent();//Выпадающий список 
        $this->load->view('updcontr.php', $data);
        if(!empty($_POST))
        { 
            $ContragentDogovorID =$_POST['ContragentDogovorID'];
            $DogovorDate = $_POST['DogovorDate'];
            $NameContragent =$_POST['NameContragent'];
            $Adress = $_POST['Adress'];
            $INN = $_POST['INN'];
            $KPP = $_POST['KPP'];
            $VidContragentID = $_POST['VidContragentID'];
           $this->kontr_model->updcontr($NameContragent,$DogovorDate,$Adress,$INN,$KPP,$VidContragentID,$ContragentDogovorID); 
            redirect('admin/contragent');//просмотр справочник контрагент
        }
        $this->load->view('temp/footer.php');
    }

    //Просмотр прайс-листов
public function pricelist()
{
    $this->load->view('temp/head.php');
    
    $user = $this->session->userdata();
    $data['UserLogin'] = $user['UserLogin'];
    $this->load->view('temp/navadmin.php', $data);
    $this->load->model('pricelist_model'); 

    $data['selectTypeList'] = $this->pricelist_model->selectTypeList();
    $data['selectProduct'] = $this->pricelist_model->selectProduct();
    $data['pricelist'] = $this->pricelist_model->selectpricelist();
    
    $this->load->view('dodpricelists.php', $data);
    $this->load->view('temp/footer.php');
}
  
//Добавить контрагентр 
public function dodpricelist()
{
    if(!empty($_POST))
    {
        $PricePriceList=$_POST['PricePriceList'];
        $TypeListID=$_POST['TypeListID']; 
        $ProductID=$_POST['ProductID'];
        $this->load->model('pricelist_model');
        $this->pricelist_model->DodPriceList($PricePriceList, $TypeListID, $ProductID);
        redirect('admin/pricelist');
    }
}

public function deletepricelist()
    {
        $PriceListID=$this->uri->segment(3,0);
        $this->load->model('pricelist_model');
        $this->pricelist_model->deletePriceList($PriceListID);
        redirect('admin/pricelist');
    }

//ссылку Кнопка изменить через страница Обновление контрагент // Джепаров Тимур 
public function updpricelist()
{   
    $PriceListID=$this->uri->segment(3,0);
    $this->load->view('temp/head.php');
    $user = $this->session->userdata();
    $data['UserLogin'] = $user['UserLogin'];

    $this->load->view('temp/navadmin.php', $data);
    $this->load->model('pricelist_model'); 
    $data['pricelist'] = $this->pricelist_model->selectpricelist1($PriceListID);// ссылку связи из таблицы 
    $data['selectTypeList'] = $this->pricelist_model->selectTypeList();
    $data['selectProduct'] = $this->pricelist_model->selectProduct();
    $this->load->view('updpricelist.php', $data);
    $this->load->view('temp/footer.php');
}

    //Обновить контрагент
    public function updpricelist2()
    {
        $this->load->view('temp/head.php');
        $this->load->view('temp/navadmin.php');
        $this->load->model('pricelist_model');
        $data['selectTypeList'] = $this->pricelist_model->selectTypeList();
        $data['selectProduct'] = $this->pricelist_model->selectProduct();
        $this->load->view('updpricelist.php', $data);
        if(!empty($_POST))
        { 
            $PriceListID =$_POST['PriceListID'];
            $PricePriceList=$_POST['PricePriceList'];
            $TypeListID=$_POST['TypeListID']; 
            $ProductID=$_POST['ProductID'];
           $this->pricelist_model->updpricelist($PricePriceList, $TypeListID, $ProductID, $PriceListID); 
            redirect('admin/pricelist');//просмотр справочник контрагент
        }
        $this->load->view('temp/footer.php');
    }

    //Просмотр прайс-листов
    public function users()
    {
        $this->load->view('temp/head.php');
        
        $user = $this->session->userdata();
        $data['UserLogin'] = $user['UserLogin'];
        $this->load->view('temp/navadmin.php', $data);
        $this->load->model('user_model'); 
    
        $data['users'] = $this->user_model->selectUser2();
        $data['selectRole'] = $this->user_model->selectRole();
        $this->load->model('kontr_model'); 
        $data['selectContragent'] = $this->kontr_model->selectContragent();
        $this->load->view('addusers.php', $data);
        $this->load->view('temp/footer.php');
    }

    public function adduser(){
        if(!empty($_POST))
        {   
            $FIO=$_POST['FIO'];
            $UserLogin = $_POST['UserLogin'];
            $UserPassword = $_POST['UserPassword'];
            $RoleID = $_POST['RoleID'];
            $ContragentDogovorID=$_POST['ContragentDogovorID'];
            $this->load->model('user_model');
            $this->user_model->adduser($FIO, $RoleID, $UserLogin, $UserPassword, $ContragentDogovorID);
            redirect("admin/users");
        }
      }

      public function deleteuser()
      {
          $UserID=$this->uri->segment(3,0);
          $this->load->model('user_model');
          $this->user_model->deleteUser($UserID);
          redirect('admin/users');
      }

//ссылку Кнопка изменить через страница Обновление пользователя // Карпухин Даниил
public function upduser()
{   
    $UserID=$this->uri->segment(3,0);
    $this->load->view('temp/head.php');
    $user = $this->session->userdata();
    $data['UserLogin'] = $user['UserLogin'];

    $this->load->view('temp/navadmin.php', $data);
    $this->load->model('user_model'); 
    $data['users'] = $this->user_model->selectUser1($UserID);// ссылку связи из таблицы 
    $data['selectRole'] = $this->user_model->selectRole();
    $this->load->model('kontr_model'); 
    $data['selectContragent'] = $this->kontr_model->selectContragent();
    $this->load->view('upduser.php', $data);
    $this->load->view('temp/footer.php');
}

    //Обновить пользователя
    public function upduser2()
    {
        $this->load->view('temp/head.php');
        $this->load->view('temp/navadmin.php');
        $this->load->model('user_model');
        $data['selectRole'] = $this->user_model->selectRole();
        $this->load->model('kontr_model'); 
        $data['selectContragent'] = $this->kontr_model->selectContragent();
        $this->load->view('upduser.php', $data);
        if(!empty($_POST))
        { 
            $UserID=$_POST['UserID'];
            $FIO=$_POST['FIO'];
            $UserLogin = $_POST['UserLogin'];
            $UserPassword = $_POST['UserPassword'];
            $RoleID = $_POST['RoleID'];
            $ContragentDogovorID=$_POST['ContragentDogovorID'];
            $this->user_model->upduser($FIO,$RoleID,$UserLogin,$UserPassword,$ContragentDogovorID,$UserID); 
            redirect('admin/users');//просмотр справочник контрагент
        }
        $this->load->view('temp/footer.php');
    }

}
?>