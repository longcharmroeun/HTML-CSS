<?php

/**
 * BackgroundColor short summary.
 *
 * BackgroundColor description.
 *
 * @version 1.0
 * @author Long charmroeun
 */
class BackgroundColor
{
    private $RGB = array();

    /**
     * Constructor
     * @param array $RGB Color
     */
    function __construct(array $RGB){
        for ($i = 0; $i < count($RGB); $i++)
        {
        	$this->RGB[$i]=$RGB[$i];
        }
    }
    /**
     * Change Background color
     */
    function run(){
?>
<body style="background-color:rgb(<?php echo $this->RGB[0]?>,<?php echo $this->RGB[1]?>,<?php echo $this->RGB[2]?>)"></body>
<?php
    }

    

    /**
     * GetCookie
     * @return array $RGB color
     */
    public function LoadCookie(){
        return unserialize($_COOKIE['RGB']);
    }
}