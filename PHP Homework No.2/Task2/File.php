<?php

/**
 * File short summary.
 *
 * File description.
 *
 * @version 1.0
 * @author Long charmroeun
 */
trait File
{
	static function Save($txt,$filename){
        if (file_get_contents('Country.txt')=='')
        {
        }
        else
        {
        	$txt = "\n".$txt;
        }
        $myfile = fopen($filename, "a") or die("Unable to open file!");
        fwrite($myfile, $txt);
        fclose($myfile);

    }
    static function Word($filename){
        $contents = file_get_contents($filename);
        return explode("\n", $contents);
    }

    static function CheckFileEmpty(){
        if (file_get_contents('Country.txt')=='')
        {
            return true;
        }
        return false;
    }

    static function CheckCountryName(array $CountryListName,$InputCountryName){
        foreach ($CountryListName as $value)
        {
        	if(strcmp(strtolower(preg_replace('/\s+/', '', $value)), strtolower(preg_replace('/\s+/', '', $InputCountryName))) == 0){
                return true;
            }
        }
        return false;
    }
}