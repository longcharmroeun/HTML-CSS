<?php
interface Foo1
{
    const r=2;
	function __get($name);
    function __construct();
    function __set($name, $value);
    function __toString();
}

interface Foo2 extends Foo1{
    function __construct($name);
}
class Foo implements Foo1{

    private $name = asdasdasda;
    private $price = 131313;

    #region Foo1 Members

    /**
     *
     * @param  $name
     */
    function __get($name)
    {
        // TODO: implement the function Foo1::__get
        return $this->$name;
    }

    /**
     *
     * @param  $name
     * @param  $value
     */
    function __set($name, $value)
    {
        // TODO: implement the function Foo1::__set
    }

    /**
     */
    function __toString()
    {
        // TODO: implement the function Foo1::__toString
    }

    #endregion

    #region Foo1 Members

    /**
     */
    function __construct()
    {
        // TODO: implement the function Foo1::__construct
    }

    #endregion
}

class hello implements Foo2{
    
    #region Foo2 Members

    /**
     *
     * @param  $name 
     */
    function __construct($name)
    {
        // TODO: implement the function Foo2::__construct
    }

    #endregion

    #region Foo1 Members
    /**
     *
     * @param  $name 
     */
    function __get($name)
    {
        // TODO: implement the function Foo1::__get
    }

    /**
     *
     * @param  $name 
     * @param  $value 
     */
    function __set($name, $value)
    {
        // TODO: implement the function Foo1::__set
    }

    /**
     */
    function __toString()
    {
        // TODO: implement the function Foo1::__toString
    }

    #endregion
}

?>