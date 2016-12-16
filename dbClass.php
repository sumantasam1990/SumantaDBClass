<?php
/*
*
Class Name: DB Class
Author Name: Sumanta Kundu
*
*/
 class DBClass {
  private $host = 'localhost';
  private $user = 'root';
  private $password = '';
  private $dbname = 'shop';
  
  private $con;
  private $table;
  private $row = array();
  private $data = array();

  public function __construct() {
    $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->dbname);
  }
  
  protected function selectResults($table) {
    $tblName = $this->table = $table;
    $sql = "SELECT * FROM $tblName";
    $result = $this->con->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $this->row[] = $row;
      }
      return $this->row;
    } else {
      return false;
    }
  }
}


