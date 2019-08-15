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
        $myfile = fopen($filename, "a") or die("Unable to open file!");
        $txt = $txt."\n";
        fwrite($myfile, $txt);
        fclose($myfile);
    }
    static function Word($filename){
        $contents = file_get_contents($filename);
        return explode("\n", $contents);
    }
}