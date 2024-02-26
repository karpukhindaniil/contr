<?php
class Kontr_model extends CI_Model
{
    public function filterkontr()
    {
        $sql = 'SELECT ContragentDogovorID, NameContragent ,Adress, DogovorDate, INN, KPP, TypeContragent, NameVidContragent FROM Contragent, VidContragent WHERE Contragent.VidContragentID=VidContragent.VidContragentID';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    //Выпадающий список /Джепаров Тимур
    public function selectVidContragent()
    {
        //Выбор через выпадающий список 
        $sql = 'SELECT VidContragent.* FROM VidContragent';
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    //Выпадающий список /Джепаров Тимур
    public function selectContragent()
    {
        //Выбор через выпадающий список 
        $sql = 'SELECT Contragent.* FROM Contragent';
        $result = $this->db->query($sql);
        return $result->result_array();
    }


//Удалить //Джепаров Тимур
public function deleteContr($ContragentDogovorID)
{
    //правильно удаление через БД работает 
   $sql="DELETE FROM Contragent WHERE ContragentDogovorID=?";
   $result = $this->db->query($sql, array($ContragentDogovorID));
   return $result;
}
    //Добавить //Джепаров Тимур
     public function DodContr($NameContragent, $DogovorDate, $Adress, $INN, $KPP, $VidContragentID)
     {
        $sql="INSERT INTO Contragent(NameContragent, DogovorDate, Adress, INN, KPP, VidContragentID) VALUES 
        (?,?,?,?,?,?)";
       $this->db->query($sql, array($NameContragent, $DogovorDate, $Adress, $INN, $KPP, $VidContragentID));
     }
  
//Выбрать всех контрагентов ContragentID
public function selectcontr1($ContragentDogovorID){ // выбрать всех контрагентов
    $sql = "SELECT * FROM Contragent WHERE ContragentDogovorID=?";
    $result = $this->db->query($sql, array($ContragentDogovorID));
    return $result->result_array();
}



//Обновить Джепаров Тимур 
public function updcontr($NameContragent,$DogovorDate,$Adress,$INN,$KPP,$VidContragentID,$ContragentDogovorID) // Обновить информацию о контрагенте
{
    //UPDATE Contragent SET NameContragent='Нло',DogovorDate='2024-12-20',Adress='Москва',INN='23142',KPP='12331' WHERE ContragentDogovorID=1;
    $sql = "UPDATE Contragent SET NameContragent=?,DogovorDate=?,Adress=?,INN=?,KPP=?,VidContragentID=? WHERE ContragentDogovorID=?";
    $this->db->query($sql, array($NameContragent,$DogovorDate,$Adress,$INN,$KPP,$VidContragentID,$ContragentDogovorID));
}

}
?>