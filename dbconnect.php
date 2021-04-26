<?php

include_once 'util.php';

class DBConn
{
    var $pdo;

    public function __construct()
    {
        $dsname="mysql:host=".Util::$SERVER_NAME.";dbname=".Util::$DB_USERNAME ."";
        $options=[ PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false, PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

        try
        {
            $this->pdo=new PDO($dsname,Util::$DB_USER,Util::$DB_USER_PASS,$options);
            echo "Connection Successful";
        }catch(PDOException $e)
        {
            echo $e->getMessage();


        }
    }

    public function connectToDB()
    {
    return $this->pdo;
    }

    public function closeDB()
   {
    $this->pdo=null;
    }
}

