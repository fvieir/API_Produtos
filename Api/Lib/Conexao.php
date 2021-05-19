<?php

namespace Api\Lib;

use \PDO;
use \PDOException;

require_once "../config.php";

class Conexao {

    public static $con = null;

    public static function getInstance(){

        try {
            if (self::$con === null) {
                self::$con= new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME, DBUSER, DBPASS,
                            array(PDO::ATTR_ERRMODE,
                                  PDO::ERRMODE_EXCEPTION,
                                  PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));    
            }
            return self::$con;  
        } catch (\PDOException $e) {
            throw new PDOException($e);
            
        }
        
    }

}


?>