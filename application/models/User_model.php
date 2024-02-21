<?php
class User_model extends CI_Model{

    public function login($login, $password)
    {
      $sql = "SELECT UserID, UserFIO, UserRole FROM users WHERE UserLogin=? AND UserPassword=?";
      $result = $this->db->query($sql,array($login,$password));
      return $result->row_array();
    }
}
?>


