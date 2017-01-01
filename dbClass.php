<?php
/*
*
Class Name: DB Class
Author Name: Sumanta Kundu
Version: 1.0
*
*/
namespace DBClassNamespace;
 class DBClass {
  private $host = 'localhost';
  private $user = 'root';
  private $password = '';
  private $dbname = 'shop';

  private $con;
  private $query;
  private $table;
  private $row = array();
  private $data = array();

  public function __construct() {
    $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->dbname);
  }

  protected function selectResults($query) {
    $query = $this->query = $query;
    $sql = "$query";
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

  protected function insertData($table,$insertVal=array()) {
    $this->table = $table;
    $columns = '';
    $instvalue = '';
    //extract value from the associative array
    foreach (array_keys($insertVal) as $column) {
      $columns .= $column . ', ';
    }
    //get value from $insertVal array()
    foreach ($insertVal as $key => $value) {
      $instvalue .= '"' . addslashes($value) .'"' . ', ';
    }
    //remove comma from end of the string
    $insertColumns = substr($columns, 0, -2);
    $values = substr($instvalue, 0, -2);
    //main insert query
    $stmt = $this->con->query("INSERT INTO $this->table ($insertColumns) VALUES ($values)");
    if( $stmt ) {
      return TRUE;
    } else {
      return False;
    }
    $this->con->close();
  }
}
