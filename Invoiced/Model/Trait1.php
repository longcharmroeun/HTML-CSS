<?php

/**
 * Trait1 short summary.
 *
 * Trait1 description.
 *
 * @version 1.0
 * @author Long charmroeun
 */
trait Trait1
{
    private function AddOption($start=1,$value = 10){
        for ($i = $start; $i < $value; $i++)
        {
        	echo '<option>'.$i.'</option>';
        }
    }

    static function AddTableDiv(){
?>
<div class="Row" id="bodytable">
    <input name="name[]" value="" class="Row Head Name Body" id="name0"/>
    <input name="qty[]" list="qty" value="" class="Row Head QTY Body" id="qty0" oninput="Cal(this)"/>
    <datalist id="qty">
        <?php Trait1::AddOption();?>
    </datalist>
    <input name="unit-price[]" value="" list="unit-price" class="Row Head Unit-Price Body" id="unit-price0" oninput="Cal(this)" />
    <datalist id="unit-price">
        <?php Trait1::AddOption();?>
    </datalist>
    <label name="amunt[]" value="" id="amount0" class="Row Head Amount Body" />
</div><?php
    }

    static function Save($obj,$filename){
        if (file_get_contents($filename)=="")
        {
            $txt = json_encode($obj);
            echo'asdasd';
        }
        else
        {
            $txt = ','."\n".json_encode($obj);
        }

        $myfile = fopen($filename, "a") or die("Unable to open file!");
        fwrite($myfile,$txt);
        fclose($myfile);
    }

    static function LoadData($filename){
        $json= trim(file_get_contents($filename), "\xEF\xBB\xBF");
        return json_decode('['.$json.']');
    }

    static function Submit(){
        $item[] =array(count($_POST['name']));
        for ($i = 0; $i < count($_POST['name']); $i++)
        {
            $item[$i] = new Item($_POST['name'][$i],$_POST['qty'][$i],$_POST['unit-price'][$i]);
        }
        $table = new Table($item,$_POST['adress'],$_POST['phone_number'],$_POST['title']);
        Trait1::Save($table,'Model/hello.txt');
        Form::PrinForm($table);
    }

    static function TodayTotal($table,$startdate,$enddate,array &$tableMatches=null){
        $today_total=0;
        $tableMatches=array();
        foreach ($table as $value)
        {
            if ($value->date->day>=$startdate->day && $value->date->month>=$startdate->month && $value->date->year>=$startdate->year && $value->date->day<=$enddate->day && $value->date->month<=$enddate->month && $value->date->year<=$enddate->year )
            {
                $today_total+=$value->total;
                array_push($tableMatches,$value);
            }

        }
        return $today_total;
    }

    static function DisplayTable($table){
        foreach ($table as $value)
        {
?>
            <div class="Row">
                <label class="Row Head Name Body">
                    <?php echo $value->date->month.'/'.$value->date->day.'/'.$value->date->year.' '.$value->date->time->hour.':'.$value->date->time->minute.':'.$value->date->time->second;
                    ?>
                </label>
                <label class="Row Head Name Body">
                    <?php echo $value->total.'$'?>
                </label>
            </div>
            <?php
        }
        
    }
}
