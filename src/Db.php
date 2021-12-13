<?php
    //define namespace
    namespace App;

    //define db class 
    class Db {
       
        //this is hold connection 
        private $conn;

        function __construct($SqlObj) {

            $this->conn=$SqlObj;
           
        }

        //show rows of the table
        private function fetchRows($result)
        {
            //check query has result 
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                   $rows = $row;
                }
            } else {
                echo "field not found";
            }
            return $rows;
        }
        // private function escapeString($sql)
        // {
        //     mysqli_real_escape_string($this->conn, $sql);
        // }

        //show table content
        public function show($table,$filedName,$value) {
            //sql code defenition
            $sql = "SELECT * FROM $table WHERE $filedName = $value";
            //escape string
            // $sql=$this->escapeString($sql);
            $result = $this->conn->query($sql);

            if(isset($result)){
                return $this->fetchRows($result);
            }else{
                return('no match found in table');
            }
            
        }
         
        function __destruct(){
            //close connection
            $this->conn->close();
        }
    }
?>