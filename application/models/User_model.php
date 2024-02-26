<?php
class User_model extends CI_Model{

    public function user_select($UserLogin, $UserPassword){
        $sql = 'select UserID, FIO, RoleID, UserLogin, UserPassword FROM Users WHERE UserLogin = ? AND UserPassword = ?';
        $result = $this->db->query($sql, array($UserLogin, $UserPassword));
        return $result->row_array();
    }
	public function user_insert($FIO, $Role_ID, $UserLogin, $UserPassword, $ContragentDogovorID){
        $sql = 'insert into Users(FIO, RoleID, UserLogin, UserPassword, ContragentDogovorID)
		values(?, ?, ?, ?, ?)';
        $result = $this->db->query($sql,array($FIO, $Role_ID, $UserLogin, $UserPassword, $ContragentDogovorID));
  
        return $this->db->insert_id();
    }

    //Выпадающий список /Карпухин Даниил
    public function selectUser()
    {
        //Выбор через выпадающий список 
        $sql = 'SELECT Users.* FROM Users';
        $result = $this->db->query($sql);
        return $result ->result_array();
    }

        //Выпадающий список /Карпухин Даниил
        public function selectRole()
        {
            //Выбор через выпадающий список 
            $sql = 'SELECT Role.* FROM Role';
            $result = $this->db->query($sql);
            return $result ->result_array();
        }

//добавление пользователя
    public function adduser($FIO,$RoleID,$UserLogin,$UserPassword,$ContragentDogovorID)
    {
        $sql= "INSERT INTO users (FIO,RoleID,UserLogin,UserPassword,ContragentDogovorID)  VALUES (?,?,?,?,?)";
        $resurt= $this->db->query($sql,array($FIO,$RoleID,$UserLogin,$UserPassword,$ContragentDogovorID));
    }

    //Удалить //Джепаров Тимур
public function deleteUser($UserID)
{
    //правильно удаление через БД работает 
   $sql="DELETE FROM users WHERE UserID=?";
   $result = $this->db->query($sql, array($UserID));
   return $result;
}

public function selectUser1($UserID)
{
    //правильно удаление через БД работает 
   $sql="SELECT * FROM users WHERE UserID=?";
   $result = $this->db->query($sql, array($UserID));
   return $result->result_array();
}

//Обновить пользователя

public function upduser($FIO,$RoleID,$UserLogin,$UserPassword,$ContragentDogovorID, $UserID) // Обновить информацию о контрагенте
{
    $sql = "UPDATE users SET FIO=?,RoleID=?,UserLogin=?,UserPassword=?,ContragentDogovorID=? WHERE UserID=?";
    $this->db->query($sql, array($FIO,$RoleID,$UserLogin,$UserPassword,$ContragentDogovorID, $UserID));
}

public function selectUser2(){
    $sql = "SELECT UserID, FIO, RoleName, UserLogin, UserPassword, NameContragent FROM Users, Role, Contragent WHERE 
    Role.RoleID=Users.RoleID AND Contragent.ContragentDogovorID=Users.ContragentDogovorID;";
    $result = $this->db->query($sql);
    return $result->result_array();
}

}
?>