<?php
/*
*
DB Class
*
*/
//namespace DB;
 class DBConnection {
  private $host = 'localhost';
  private $user = 'root';
  private $password = '';
  private $dbname = 'shop';

  public static function dbConn() {
    $con = mysqli_connect($this->host,$this->user,$this->password,$this->dbname);
  }
}

class DBhandlers extends DBConnection {
  private $con;
  private $table;
  private $row = array();
  private $data = array();

  protected function selectResults($table) {
    $tblName = $this->table = $table;
    $sql = "SELECT * FROM $tblName";
    $result = DBConnection::dbConnquery($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $this->row[] = $row;
      }
      return $this->row;
    } else {
      return false;
    }
    //$conn->close();
  }
}

//  $dbObj = new DBConnection;
