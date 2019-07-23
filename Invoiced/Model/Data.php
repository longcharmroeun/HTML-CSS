<?php

/**
 * Data short summary.
 *
 * Data description.
 *
 * @version 1.0
 * @author Long charmroeun
 */
class Item implements JsonSerializable
{
    public $name;
    public $qty;
    public $unit_price;
    public $amount;

    function __construct($name,$qty,$unit_price){
        $this->name=$name;
        $this->qty=$qty;
        $this->unit_price=$unit_price;
        $this->amount=$this->qty*$this->unit_price;
    }

    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }

    public function __toString(){
        return $this->name;
    }
}

class Time implements JsonSerializable
{
	public $hour;
    public $minute;
    public $second;
    /**
     * Summary of Today Time
     */
    public function __construct(){
        $this->hour=date('H');
        $this->minute=date('i');
        $this->second=date('s');
    }

    public function __toString(){
        return $this->hour.':'.$this->minute.':'.$this->second;
    }

    #region JsonSerializable Members

    /**
     * Specify data which should be serialized to JSON
     * Serializes the object to a value that can be serialized natively by json_encode() .
     *
     * @return mixed
     */
    function jsonSerialize()
    {
        return (object) get_object_vars($this);
        // TODO: implement the function JsonSerializable::jsonSerialize
    }

    #endregion
}


class Date implements JsonSerializable
{
	public $month;
    public $day;
    public $year;
    public $time;
    /**
     * Summary of Today Date
     */
    public function __construct(){
        $this->day=date('d');
        $this->month=date('m');
        $this->year=date('Y');
        $this->time = new Time();
    }

    #region JsonSerializable Members

    /**
     * Specify data which should be serialized to JSON
     * Serializes the object to a value that can be serialized natively by json_encode() .
     *
     * @return mixed
     */
    function jsonSerialize()
    {
        return (object) get_object_vars($this);
        // TODO: implement the function JsonSerializable::jsonSerialize
    }

    #endregion

    public function __toString(){
        return $this->month.'/'.$this->day.'/'.$this->year;
    }
}

class Stock implements JsonSerializable , Countable
{
    public $count;
    function __construct($count){
        $this->count=$count;
    }
    #region JsonSerializable Members

    /**
     * Specify data which should be serialized to JSON
     * Serializes the object to a value that can be serialized natively by json_encode() .
     *
     * @return mixed
     */
    function jsonSerialize()
    {
        return (object) get_object_vars($this);
        // TODO: implement the function JsonSerializable::jsonSerialize
    }

    #endregion

    #region Countable Members

    /**
     * Count elements of an object
     * This method is executed when using the count() function on an object implementing Countable .
     *
     * @return int
     */
    function count()
    {
        return $this->count;
        // TODO: implement the function Countable::count
    }

    #endregion

    function Sold($qty){
        $this->count-=$qty;
    }
}


class Product implements JsonSerializable
{
	public $name;
    public $price;
    public $stock;
    public $ID;

    /**
     * Summary of __construct
     * @param mixed $name 
     * @param mixed $price 
     * @param mixed $stock class Stock
     */
    function __construct($name,$price,$stock){
        $this->name=$name;
        $this->price=$price;
        $this->stock=$stock;
        $this->ID=time();
    }  
    #region JsonSerializable Members

    /**
     * Specify data which should be serialized to JSON
     * Serializes the object to a value that can be serialized natively by json_encode() .
     *
     * @return mixed
     */
    function jsonSerialize()
    {
        return (object) get_object_vars($this);
        // TODO: implement the function JsonSerializable::jsonSerialize
    }

    #endregion
}



class Table implements JsonSerializable{

    public $item;
    public $date;
    public $adress;
    public $phone_number;
    public $title;
    public $total;

    function __construct(array $item,$adress,$phone_number,$title){
        $this->total=0;
        $this->item=$item;
        $this->date=new Date();
        $this->adress=$adress;
        $this->phone_number=$phone_number;
        $this->title=$title;
        foreach ($item as $value)
        {
        	$this->total+=$value->amount;
        }
    }

    public function jsonSerialize() {
        return (object) get_object_vars($this);
    }
}
