<?php
namespace Api\Model;

use Api\Lib\Conexao;
use \PDOException;

class User 
{
    public static $table = 'produtos';

    public static function selectAll()
    {
        $sql = 'SELECT * FROM '.self::$table;
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();
       
        if ($con->rowCount() > 0) 
        {
            return $dados = $con->fetchall(\PDO::FETCH_ASSOC);    
        } else {
            throw new \PDOException("Houve algum erro ao retornar os dados");   
        }
    }

    public static function select($id)
    {
        $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue('id',$id);
        $con->execute();
       
        if ($con->rowCount() > 0) 
        {
            return $dados = $con->fetch(\PDO::FETCH_ASSOC);    
        } else {
            throw new \PDOException("Houve algum erro ao retornar os dados");   
        }
    }

    public static function delete()
    {
        $url = filter_input(INPUT_GET,'url',FILTER_SANITIZE_STRING);
        $url = ltrim($url,'/');
        $url = explode('/',$url);

        $sql = 'DELETE FROM '.self::$table.' WHERE id =:id';
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue('id',$url[2]);
        $con->execute();
       
        if ( $con->execute())
        {
            return 'Dados apagados com Sucesso';    
        } else {
            throw new \PDOException("Houve algum erro ao retornar os dados");   
        }
    }
}

?>