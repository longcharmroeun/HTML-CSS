<?php

namespace OOP
{
	/**
     * Class1 short summary.
     *
     * Class1 description.
     *
     * @version 1.0
     * @author Long charmroeun
     */
	class class1
	{
        protected $name;
        protected $age;
        function __construct($name,$age){
            $this->name=$name;
            $this->age=$age;
        }
	}
    class Student extends class1
    {
    	private $id;
        private function GetName(){
            return $this->name;
        }
    }

}