<?php

/**
 * Date short summary.
 *
 * Date description.
 *
 * @version 1.0
 * @author Long charmroeun
 */
class _date
{
    /**
     * Summary of MonthToDaynumber
     * @param mixed $value months
     * @param mixed $year year
     * @return integer number of months
     */
    static function MonthToDaynumber($value , $year){
        switch ($value)
        {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                return 31;
            case 2:
                if($year%4==0){
                    return 29;
                }
                else return 28;
            case 4:
            case 6:
            case 9:
            case 11:
                return 30;
        	default:
                return 0;
        }
        
    }
}