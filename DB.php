<?php
//
class DB {
    private static $db = null;
    public static function get(){

        if (DB::$db==null){

        $servername = "localhost";
        $db_name = "TODO_APP";
        $username = "f.schlegel";
        $password = "hill-96";


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8", $username, $password);
            //set the PDO error mode executation
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            DB::$db = $conn;
        }
        catch (PDOException $e) {
            die("Connection faild: " . $e->getMessage());
        }
        }
        return DB::$db;
    }
}