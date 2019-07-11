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
        private $age;
        function __construct($name,$age){
            $this->name=$name;
            $this->age=$age;
        }
        function GetName(){
            return $this->name;
        }
        private function GetAgg(){
            return $this->age;
        }
	}
    class Student extends class1
    {
    	private $id;
        public function GetName(){
            return $this->name;
        }
    }

}