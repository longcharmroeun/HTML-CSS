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

    #region PDO Members

    /**
     * Initiates a transaction
     * Turns off autocommit mode.  While autocommit mode is turned off, changes made to the database via the PDO object instance are not committed until you end the transaction by calling PDO::commit() . Calling PDO::rollBack() will roll back all changes to the database and return the connection to autocommit mode.
     *
     * @return bool
     */
    function beginTransaction()
    {
        return parent::beginTransaction();
    }

    /**
     * Commits a transaction, returning the database connection to autocommit mode until the next call to PDO::beginTransaction() starts a new transaction.
     *
     * @return bool
     */
    function commit()
    {
        return parent::commit();
    }

    /**
     * Fetch the SQLSTATE associated with the last operation on the database handle
     *
     * @return string
     */
    function errorCode()
    {
        return parent::errorCode();
    }

    /**
     * Fetch extended error information associated with the last operation on the database handle
     *
     * @return array
     */
    function errorInfo()
    {
        return parent::errorInfo();
    }

    /**
     * Execute an SQL statement and return the number of affected rows
     * PDO::exec() executes an SQL statement in a single function call, returning the number of rows affected by the statement.
     *
     * @param string $statement The SQL statement to prepare and execute.  Data inside the query should be properly escaped .
     *
     * @return int
     */
    function exec($statement)
    {
        return parent::exec($statement);
    }

    /**
     * Retrieve a database connection attribute
     * This function returns the value of a database connection attribute. To retrieve PDOStatement attributes, refer to PDOStatement::getAttribute() .
     *
     * @param int $attribute One of the PDO::ATTR_* constants. The constants that apply to database connections are as follows:
     *                       PDO::ATTR_AUTOCOMMIT
     *                       PDO::ATTR_CASE
     *                       PDO::ATTR_CLIENT_VERSION
     *                       PDO::ATTR_CONNECTION_STATUS
     *                       PDO::ATTR_DRIVER_NAME
     *                       PDO::ATTR_ERRMODE
     *                       PDO::ATTR_ORACLE_NULLS
     *                       PDO::ATTR_PERSISTENT
     *                       PDO::ATTR_PREFETCH
     *                       PDO::ATTR_SERVER_INFO
     *                       PDO::ATTR_SERVER_VERSION
     *                       PDO::ATTR_TIMEOUT
     *
     * @return mixed
     */
    function getAttribute($attribute)
    {
        return parent::getAttribute($attribute);
    }

    /**
     * Checks if inside a transaction
     * Checks if a transaction is currently active within the driver. This method only works for database drivers that support transactions.
     *
     * @return bool
     */
    function inTransaction()
    {
        return parent::inTransaction();
    }

    /**
     * Returns the ID of the last inserted row or sequence value
     * Returns the ID of the last inserted row, or the last value from a sequence object, depending on the underlying driver. For example, PDO_PGSQL requires you to specify the name of a sequence object for the name parameter.
     *
     * @param string $name Name of the sequence object from which the ID should be returned.
     *
     * @return string
     */
    function lastInsertId($name = NULL)
    {
        return parent::lastInsertId($name);
    }

    /**
     * Prepares a statement for execution and returns a statement object
     * Prepares an SQL statement to be executed by the PDOStatement::execute() method. The statement template can contain zero or more named (:name) or question mark (?) parameter markers for which real values will be substituted when the statement is executed. Both named and question mark parameter markers cannot be used within the same statement template; only one or the other parameter style. Use these parameters to bind any user-input, do not include the user-input directly in the query.
     *
     * @param string $statement This must be a valid SQL statement template for the target database server.
     * @param array $driver_options This array holds one or more key=>value pairs to set attribute values for the PDOStatement object that this method returns. You would most commonly use this to set the PDO::ATTR_CURSOR value to PDO::CURSOR_SCROLL to request a scrollable cursor. Some drivers have driver-specific options that may be set at prepare-time.
     *
     * @return PDOStatement
     */
    function prepare($statement, $driver_options = array())
    {
        return parent::prepare($statement, $driver_options);
    }

    /**
     * Executes an SQL statement, returning a result set as a PDOStatement object
     * PDO::query() executes an SQL statement in a single function call, returning the result set (if any) returned by the statement as a PDOStatement object.
     *
     * @param string $statement The SQL statement to prepare and execute.  Data inside the query should be properly escaped .
     *
     * @return PDOStatement
     */
    function query($statement)
    {
        return parent::query($statement);
    }

    /**
     * Quotes a string for use in a query
     * PDO::quote() places quotes around the input string (if required) and escapes special characters within the input string, using a quoting style appropriate to the underlying driver.
     *
     * @param string $string The string to be quoted.
     * @param int $parameter_type Provides a data type hint for drivers that have alternate quoting styles.
     *
     * @return string
     */
    function quote($string, $parameter_type = PDO::PARAM_STR)
    {
        return parent::quote($string, $parameter_type);
    }

    /**
     * Rolls back a transaction
     * Rolls back the current transaction, as initiated by PDO::beginTransaction() .
     *
     * @return bool
     */
    function rollBack()
    {
        return parent::rollBack();
    }

    /**
     * Set an attribute
     * Sets an attribute on the database handle. Some of the available generic attributes are listed below; some drivers may make use of additional driver specific attributes.
     * PDO::ATTR_CASE : Force column names to a specific case.
     * PDO::CASE_LOWER : Force column names to lower case.
     * PDO::CASE_NATURAL : Leave column names as returned by the database driver.
     * PDO::CASE_UPPER : Force column names to upper case.
     * PDO::ATTR_ERRMODE : Error reporting.
     * PDO::ERRMODE_SILENT : Just set error codes.
     * PDO::ERRMODE_WARNING : Raise E_WARNING .
     * PDO::ERRMODE_EXCEPTION : Throw exceptions .
     * PDO::ATTR_ORACLE_NULLS (available with all drivers, not just Oracle): Conversion of NULL and empty strings.
     * PDO::NULL_NATURAL : No conversion.
     * PDO::NULL_EMPTY_STRING : Empty string is converted to NULL .
     * PDO::NULL_TO_STRING : NULL is converted to an empty string.
     * PDO::ATTR_STRINGIFY_FETCHES : Convert numeric values to strings when fetching. Requires bool .
     * PDO::ATTR_STATEMENT_CLASS : Set user-supplied statement class derived from PDOStatement. Cannot be used with persistent PDO instances. Requires array(string classname, array(mixed constructor_args)) .
     * PDO::ATTR_TIMEOUT : Specifies the timeout duration in seconds.  Not all drivers support this option, and its meaning may differ from driver to driver.  For example, sqlite will wait for up to this time value before giving up on obtaining an writable lock, but other drivers may interpret this as a connect or a read timeout interval. Requires int .
     * PDO::ATTR_AUTOCOMMIT (available in OCI, Firebird and MySQL): Whether to autocommit every single statement.
     * PDO::ATTR_EMULATE_PREPARES Enables or disables emulation of prepared statements.  Some drivers do not support native prepared statements or have limited support for them. Use this setting to force PDO to either always emulate prepared statements (if TRUE and emulated prepares are supported by the driver), or to try to use native prepared statements (if FALSE ).  It will always fall back to emulating the prepared statement if the driver cannot successfully prepare the current query. Requires bool .
     * PDO::MYSQL_ATTR_USE_BUFFERED_QUERY (available in MySQL): Use buffered queries.
     * PDO::ATTR_DEFAULT_FETCH_MODE : Set default fetch mode. Description of modes is available in PDOStatement::fetch() documentation.
     *
     * @param int $attribute
     * @param mixed $value
     *
     * @return bool
     */
    function setAttribute($attribute, $value)
    {
        return parent::setAttribute($attribute, $value);
    }

    #endregion
}
?>