<?php
/**
 * Connection short summary.
 *
 * Connection description.
 *
 * @version 1.0
 * @author Long charmroeun
 */

class Signup extends PDO{
    private $strmysql;
    function Update(){}

    /**
     * Insert Data to mysql
     * Array leng Support: 19;
     * @param array $array Value
     * @param mixed $table TableName
     */
    function Insert(array $array){
        $str = substr($this->strmysql,0,(count($array)*2)-1);
        $tmp = parent::prepare("INSERT INTO `user` (Email,Password) VALUES ({$str})");
        $tmp->execute($array);
    }
    function Delect(){}
    function Login($email,$password){
        $tmp = parent::prepare("SELECT * FROM `user` WHERE Email LIKE '{$email}'  AND Password LIKE '{$password}'");
        $tmp->execute();
        return $tmp->fetchAll();
    }

    function GetData_All(){
        $tmp = parent::prepare("SELECT * FROM `user`");
        $tmp->execute();
        return $tmp->fetchAll();
    }

    #region PDO Members

    /**
     * Creates a PDO instance representing a connection to a database
     * Creates a PDO instance to represent a connection to the requested database.
     *
     * @param string $dsn
     * @param string $username
     * @param string $passwd
     * @param array $options
     */
    function __construct()
    {
        parent::__construct("mysql:host=127.0.0.1;dbname=sondcatalog","root","");
        $this->strmysql="?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
    }

    #endregion
}

class Upload extends PDO{
    private $strmysql;
    function Update(){}

    /**
     * Insert Data to mysql
     * Array leng Support: 19;
     * @param array $array Value
     * @param mixed $table TableName
     */
    function Insert(array $array){
        $tmp = parent::prepare("
INSERT INTO `file` (Pathfile, Description,Category)
     VALUES (?,?,?);
INSERT INTO `upload` (FileID,UserID) VALUES (LAST_INSERT_ID(),?)");
        $tmp->execute($array);
    }
    function Delect(){}

    function GetUserUploadFile($UserID,$page,$limit)
    {
    	$tmp=parent::prepare("SELECT file.ID,file.Pathfile,file.Description,file.Category FROM file INNER JOIN upload ON upload.FileID = file.ID WHERE upload.UserID={$UserID} LIMIT {$page},{$limit}");
        $tmp->execute();
        return $tmp->fetchAll();
    }

    function GetAllSound($page,$limit){
        $tmp=parent::prepare("SELECT file.ID,file.Pathfile FROM file LIMIT {$page},{$limit}");
        $tmp->execute();
        return $tmp->fetchAll();
    }

    function SearchName($text){
        $tmp=parent::prepare("SELECT file.ID,file.Pathfile FROM file WHERE file.Pathfile LIKE  '%{$text}%'");
        $tmp->execute();
        return $tmp->fetchAll();
    }


    #region PDO Members

    /**
     * Creates a PDO instance representing a connection to a database
     * Creates a PDO instance to represent a connection to the requested database.
     *
     * @param string $dsn
     * @param string $username
     * @param string $passwd
     * @param array $options
     */
    function __construct()
    {
        parent::__construct("mysql:host=127.0.0.1;dbname=sondcatalog","root","");
        $this->strmysql="?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";
    }

    #endregion
}
?>