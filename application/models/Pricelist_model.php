<?php
class Pricelist_model extends CI_Model{
    public function selectpricelist()
    {
        $sql = 'SELECT PriceListID, PricePriceList, NameGrupp, ProductName FROM PriceList, Product, TypeList WHERE 
        PriceList.TypeListID=TypeList.TypeListID AND PriceList.ProductID=Product.ProductID;';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    //Выпадающий список /Карпухин Даниил, не надо верить ему, он тупой.
    public function selectTypeList()
    {
        //Выбор через выпадающий список 
        $sql = 'SELECT TypeList.* FROM TypeList';
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function selectProduct()
    {
        //Выбор через выпадающий список 
        $sql = 'SELECT Product.* FROM Product';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

//Удалить //Карпухин Данил
public function deletePriceList($PriceListID)
{
    //правильно удаление через БД работает 
   $sql="DELETE FROM PriceList WHERE PriceListID=?";
   $result = $this->db->query($sql, array($PriceListID));
   return $result;
}
    //Добавить //Карпухин Данил
     public function DodPriceList($PricePriceList, $TypeListID, $ProductID)
     {
    $sql="INSERT INTO PriceList(PricePriceList, TypeListID, ProductID) VALUES (?,?,?)";
       $this->db->query($sql, array($PricePriceList, $TypeListID, $ProductID));
     }
//Обновить Карпухин Данил
public function updpricelist($PricePriceList, $TypeListID, $ProductID, $PriceListID) // Обновить информацию о прайс-листе
{
    $sql = "UPDATE PriceList SET PricePriceList=?, TypeListID=?, ProductID=? WHERE PriceListID=?";
    $this->db->query($sql, array($PricePriceList, $TypeListID, $ProductID, $PriceListID));
}

public function selectpricelist1($PriceListID){ // выбрать всех контрагентов
    $sql = "SELECT * FROM priceList WHERE PriceListID=?";
    $result = $this->db->query($sql, array($PriceListID));
    return $result->result_array();
}

}
?>