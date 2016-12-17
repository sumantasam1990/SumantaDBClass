<?php
/*
*
Class Name: DB Class
Author Name: Sumanta Kundu
*
*/
namespace DBClassNamespace;
 class DBClass {
  private $host = 'localhost';
  private $user = 'root';
  private $password = '';
  private $dbname = 'shop';
  
  public $con;
  public $table;
  public $row = array();
  public $data = array();

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
