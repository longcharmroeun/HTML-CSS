<?php
/**
 * Connection short summary.
 *
 * Connection description.
 *
 * @version 1.0
 * @author Long charmroeun
 */
require "../../vendor/autoload.php";
require "../Exception/LoaderException.php";
use \Firebase\JWT\JWT;

class Database extends PDO{
    private $strmysql;

    function SignUp(array $array){
        $str = substr($this->strmysql,0,(count($array)*2)-1);
        $tmp = parent::prepare("INSERT INTO `user` (Email,Password) VALUES ({$str})");
        $tmp->execute($array);
    }

    function Login($email,$password){
        $tmp = parent::prepare("SELECT * FROM `user` WHERE Email LIKE '{$email}'  AND Password LIKE '{$password}'");
        $tmp->execute();
        $user = $tmp->fetchAll();
        if ($user!=null)
        {
        	$secret_key = "Hello";
            $issuer_claim = "THE_ISSUER"; // this can be the servername
            $audience_claim = "THE_AUDIENCE";
            $issuedat_claim = time(); // issued at
            $notbefore_claim = $issuedat_claim + 10; //not before in seconds
            $expire_claim = $issuedat_claim + 20; // expire time in seconds
            $token = array(
                "iss" => $issuer_claim,
                "aud" => $audience_claim,
                "iat" => $issuedat_claim,
                "nbf" => $notbefore_claim,
                "exp" => $expire_claim,
                "user" => $user[0]);
            return JWT::encode($token, $secret_key);
        }
        else
        {
        	throw new InvalidLoginException();
        }
    }

    function InvalidateToken($token)
    {
    	JWT::$leeway = 60;
        return JWT::decode($token, "Hello", array('HS256'));
    }

    function GetUserUploadFile($page,$limit,$token)
    {
        try
        {
            JWT::$leeway = 60;
            $user = JWT::decode($token, "Hello", array('HS256'));
            $tmp=parent::prepare("SELECT file.ID,file.Pathfile,file.Description,categories.Category FROM file
INNER JOIN upload ON upload.FileID = file.ID
INNER JOIN categories ON file.CategoryID = categories.ID
WHERE upload.UserID={$user->user->ID} LIMIT {$page},{$limit}");
            $tmp->execute();
            return $tmp->fetchAll();

        }
        catch (Firebase\JWT\ExpiredException $exception)
        {
            return "0";
        }

        catch (Exception $exception)
        {
            throw new InvalidLoginException();
        }
    }

    function Insert(array $array,$token){
        try
        {
            JWT::$leeway = 60;
            $user = JWT::decode($token, "Hello", array('HS256'));

            $tmp = parent::prepare("
INSERT INTO `file` (Pathfile, Description,CategoryID)
     VALUES (?,?,?);
INSERT INTO `upload` (FileID,UserID) VALUES (LAST_INSERT_ID(),{$user->user->ID})");
            $tmp->execute($array);

        }
        catch (Firebase\JWT\ExpiredException $exception)
        {

        }

        catch (Exception $exception)
        {
            throw new InvalidLoginException();
        }
    }

    function GetAllCategories()
    {
        $tmp=parent::prepare("SELECT categories.Category, categories.ID FROM categories ");
        $tmp->execute();
        return $tmp->fetchAll();
    }

    function GetAllSound($page,$limit){
        $tmp=parent::prepare("SELECT file.ID,file.Pathfile FROM file LIMIT {$page},{$limit}");
        $tmp->execute();
        return $tmp->fetchAll();
    }

    function SearchName($text,$page,$limit){
        $tmp=parent::prepare("SELECT file.ID,file.Pathfile FROM file WHERE file.Pathfile LIKE  '%{$text}%' LIMIT {$page},{$limit}");
        $tmp->execute();
        return $tmp->fetchAll();
    }

    function CategorySort($CategoryID,$page,$limit)
    {
    	$tmp=parent::prepare("SELECT file.ID,file.Pathfile FROM file
INNER JOIN categories ON categories.ID = file.CategoryID
WHERE categories.ID = {$CategoryID} LIMIT {$page},{$limit}");
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