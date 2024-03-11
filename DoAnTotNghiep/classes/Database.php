<?php
class Database {
    
    public $link;
    public $error;
   public $host = 'localhost';
   public $db = 'thongbao';
   public $user = 'root';
   public $pass = '';
   
    public function getConnect() {
         $host = $this->host;
         $db = $this->db;
         $user = $this->user;
         $pass = $this->pass;

        $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

        try {
            $pdo = new PDO($dsn, $user, $pass);
        
            return $pdo;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    public function __construct(){
        $this->connectDB();
       }
       private function connectDB(){
        $this->link = new mysqli($this->host, $this->user, $this->pass,$this->db);
        if(!$this->link){
          $this->error ="Connection fail".$this->link->connect_error;
         return false;
        }
      }
    public function select($query){
        $result = $this->link->query($query) or 
         die($this->link->error.__LINE__);
        if($result->num_rows > 0){
          return $result;
        } else {
          return false;
        }
       }
       
      // Insert data
      public function insert($query){
         $insert_row = $this->link->query($query) or 
           die($this->link->error.__LINE__);
         if($insert_row){
           return $insert_row;
         } else {
           return false;
          }
       }
        
      // Update data
       public function update($query){
         $update_row = $this->link->query($query) or 
           die($this->link->error.__LINE__);
         if($update_row){
          return $update_row;
         } else {
          return false;
          }
       }
        
      // Delete data
       public function delete($query){
         $delete_row = $this->link->query($query) or 
           die($this->link->error.__LINE__);
         if($delete_row){
           return $delete_row;
         } else {
           return false;
          }
         }
}
?>