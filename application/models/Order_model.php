<?php
class Order_model extends CI_Model
{
    public function selectorders()
    {
        $sql = 'SELECT ordersID, OrderDate, OrderDateSending, OrderDateFakt, FIO, OrderKol, OrderStatus, PricePriceList, 
        ProductName FROM orders, users, pricelist, product where orders.UserID=users.UserID AND 
        orders.PriceListID=pricelist.PriceListID AND orders.ProductID=product.ProductID;';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function addorders($UserID, $OrderDate, $OrderDateSending, $OrderDateFakt, $OrderStatus, $OrderKol, $PriceListID, $ProductID)
    {
        $sql="INSERT INTO Orders(UserID, OrderDate, OrderDateSending, OrderDateFakt, OrderStatus, OrderKol, PriceListID, ProductID) 
        VALUES (?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($UserID, $OrderDate, $OrderDateSending, $OrderDateFakt, $OrderStatus, $OrderKol,  $PriceListID, $ProductID));
    }

    public function deleteorders($ordersID)
    {
        $sql = 'delete FROM orders where ordersID=?;';
        $this->db->query($sql, array($ordersID));
    }   


//Обновить Карпухин Данил
public function updorder($UserID, $OrderDate, $OrderDateSending, $OrderDateFakt, $OrderStatus, $OrderKol, $PriceListID,
$ProductID, $ordersID) // Обновить информацию о прайс-листе
{
    $sql = "UPDATE orders SET UserID=?,OrderDate=?,OrderDateSending=?,OrderDateFakt=?,OrderStatus=?,OrderKol=?,
    PriceListID=?, ProductID=? WHERE ordersID=?";
    $this->db->query($sql, array($UserID, $OrderDate, $OrderDateSending, $OrderDateFakt, $OrderStatus, $OrderKol, 
    $PriceListID, $ProductID, $ordersID));
}

public function selectorders1($ordersID){ // выбрать всех заказов
    $sql = "SELECT * FROM orders WHERE ordersID=?";
    $result = $this->db->query($sql, array($ordersID));
    return $result->result_array();
}

    public function selectordersnevyp()
    {
        $sql = 'SELECT ordersID, OrderDate, OrderDateSending, OrderDateFakt, FIO, OrderKol, OrderStatus, PricePriceList, 
        ProductName FROM orders, users, pricelist, product where orders.UserID=users.UserID AND 
        orders.PriceListID=pricelist.PriceListID AND orders.ProductID=product.ProductID AND OrderStatus="в ожидании"';
        $result = $this->db->query($sql);
        return $result->result_array();
    }


    
    public function selectordersnevypzaperiod($firstdate, $seconddate)
    {
        $sql = 'SELECT ordersID, OrderDate, OrderDateSending, OrderDateFakt, FIO, OrderKol, OrderStatus, PricePriceList, 
        ProductName FROM orders, users, pricelist, product where orders.UserID=users.UserID AND 
        orders.PriceListID=pricelist.PriceListID AND orders.ProductID=product.ProductID AND OrderStatus="в ожидании" AND 
        OrderDate BETWEEN ? AND ?';
        $result = $this->db->query($sql, array($firstdate, $seconddate));
        return $result->result_array();
    }

    public function selectordersdostavka()
    {
        $sql = 'SELECT ordersID, OrderDate, OrderDateSending, OrderDateFakt, FIO, OrderKol, OrderStatus, PricePriceList, 
        ProductName FROM orders, users, pricelist, product where orders.UserID=users.UserID AND 
        orders.PriceListID=pricelist.PriceListID AND orders.ProductID=product.ProductID AND OrderStatus="в доставке"';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function selectordersdostavkakontr($OrdersUserID)
    {
        $sql = 'SELECT ordersID, OrderDate, OrderDateSending, OrderDateFakt, FIO, OrderKol, OrderStatus, PricePriceList, 
        ProductName FROM orders, users, pricelist, product where orders.UserID=users.UserID AND 
        orders.PriceListID=pricelist.PriceListID AND orders.ProductID=product.ProductID AND OrderStatus="в доставке" AND 
        orders.UserID=?';
        $result = $this->db->query($sql, array($OrdersUserID));
        return $result->result_array();
    }

    public function updorderstatus($ordersID)
    {
        $sql = "update Orders set OrderStatus = 'в доставке' WHERE ordersID=?";
        $this->db->query($sql, $ordersID);
    }

    public function selectorderskontrtovarperiod($OrdersUserID, $OrdersPriceListID, $firstdate, $seconddate)
    {
        $sql = 'SELECT ordersID, OrderDate, OrderDateSending, OrderDateFakt, FIO, OrderKol, OrderStatus, PricePriceList, 
        ProductName FROM orders, users, pricelist, product where orders.UserID=users.UserID AND 
        orders.PriceListID=pricelist.PriceListID AND orders.ProductID=product.ProductID AND orders.UserID=? AND 
        orders.PriceListID=? AND OrderDate BETWEEN ? AND ?;';
        $result = $this->db->query($sql, array($OrdersUserID, $OrdersPriceListID, $firstdate, $seconddate));
        return $result->result_array();
    }


}