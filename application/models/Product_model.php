<?php
class Product_model extends CI_Model{

    public function Product_select(){
        $sql = 'select ProductID, ProductName, ProductPrice, Description, NameGrupp, ProductCount, ProductPhoto from Product, Grupp where Grupp.GruppID=Product.GruppID';
        $result = $this->db->query($sql);
        return $result->result_array();
    }
	public function Product_insert($ProductID, $ProductName, $ProductPrice, $Description, $GruppID, $ProductCount){
        $sql = 'insert into Session(ProductID, ProductName, ProductPrice, ProductDescription, GruppID, ProductCount) values(?, ?, ?, ?, ?, ?)';
        $result = $this->db->query($sql,array($ProductID, $ProductName,$ProductPrice, $Description, $GruppID, $ProductCount));
  
        return $this->db->insert_id();
    }
	public function Grupp_select(){
        $sql = 'select GruppID, NameGrupp from Grupp';
        $result = $this->db->query($sql);
        return $result->result_array();
    }
//Выбрать поиск 
public function selectproductfilter($Searchproduct,$SearchPrice)
{
   $sql = 'SELECT ProductID, ProductName, ProductCount, Description, GruppID, ProductPhoto, ProductPrice FROM Product
    WHERE ProductName=?  and ProductPrice<=?';
    $result = $this->db->query($sql, array($Searchproduct,$SearchPrice));
    return $result->result_array();
}
public function product()
{
    $sql = 'SELECT ProductID, ProductName, ProductCount, ProductPrice FROM product';
    $result = $this->db->query($sql);
    return $result->result_array();
} 
    //Выпадающий список /Карпухин Даниил
    public function selectPriceList()
    {
        //Выбор через выпадающий список 
        $sql = 'SELECT PriceList.* FROM PriceList';
        $result = $this->db->query($sql);
        return $result ->result_array();
    }
//изменить цену с привязкой к определённому прайс-листу
    public function updproductpricelist($ProductID)
    {
        $sql = "UPDATE Product, PriceList SET ProductPrice=PricePriceList WHERE Product.ProductID=PriceList.ProductID AND Product.ProductID=?";
        $this->db->query($sql, $ProductID);
    }




}
?>