<?php

/**
 * Trait2 short summary.
 *
 * Trait2 description.
 *
 * @version 1.0
 * @author Long charmroeun
 */
trait Form
{
    static function MainForm(){
?>
<div class="Column">
    <form action="Main.php" method="post">

        <div class="Row Title">
            <input name="title" value="Invoice" />
        </div>

        <div class="Row">
            <label>
                Date:
                <label id="date" class="Date" name="date"></label>
            </label>
            <label>Adress: </label>
            <input name="adress" value="" />
            <label>Phone Number: </label>
            <input name="phone_number" value="" />
        </div>

        <div class="Row">
            <label class="Row Head Name">Name</label>
            <label class="Row Head QTY">QTY</label>
            <label class="Row Head Unit-Price">Unit Price($)</label>
            <label class="Row Head Amount">Amount($)</label>
        </div>

        <div id="table">
            <?php Trait1::AddTableDiv()?>
        </div>

        <div class="Row">
            <div class="Row Head Foot Total">Total</div>
            <div class="Row Head Foot"></div>
            <div class="Row Head Foot TotalValue" name="totalvalue" id="totalvalue"></div>
        </div>

        <div class="Row">
            <button type="submit" name="submit">Submit</button>
            <button type="submit" name="history" style="margin-left:20px">History</button>
            <button type="submit" name="add_produce" style="margin-left:20px">Add Produce</button>
            <button type="submit" name="produce_list" style="margin-left:20px">Produce list</button>
        </div>
    </form>
</div>
<?php
    }

    static function PrinForm($table){
?>
<div class="Column">
    <form action="Main.php" method="post">

        <div class="Row Title">
            <h1><?php echo $table->title?></h1>
        </div>

        <div class="Row">
            <label>
                Date:
                <label class="Date"><?php echo $table->date->__tostring().' '.$table->date->time->__tostring()?></label>
            </label>
            <label>Adress: </label>
            <label><?php echo $table->adress?></label>
            <label>Phone Number: </label>
            <label><?php echo $table->phone_number?></label>
        </div>

        <div class="Row">
            <label class="Row Head Name">Name</label>
            <label class="Row Head QTY">QTY</label>
            <label class="Row Head Unit-Price">Unit Price($)</label>
            <label class="Row Head Amount">Amount($)</label>
        </div>

        <div id="table">
            <?php
        foreach ($table->item as $value)
        {
            ?>
            <div class="Row" id="bodytable">
                <label class="Row Head Name Body">
                    <?php echo $value->name?>
                </label>
                <label class="Row Head QTY Body">
                    <?php echo $value->qty?>
                </label>
                <label class="Row Head Unit-Price Body">
                    <?php echo $value->unit_price?>
                </label>
                <label class="Row Head Amount Body">
                    <?php echo $value->amount?>
                </label>
            </div>
            <?php
        }
        
            ?>
        </div>

        <div class="Row">
            <div class="Row Head Foot Total">Total</div>
            <div class="Row Head Foot"></div>
            <div class="Row Head Foot TotalValue"><?php echo $table->total?></div>
        </div>

        <div class="Row">
            <button type="submit" name="print">Back</button>
        </div>
    </form>
</div>
<?php
    }

    static function History($startdate,$enddate,$table){
?> 
        <div class="Column">
        <form action="Main.php" method="post">
        <div class="Row">
        <input name="start" id="start" oninput="CheckDateFormat(this)" value="<?php echo $startdate->__tostring()?>" placeholder="mm/dd/yyyy" />
        <label>To</label>
            <input name="end" id="end" oninput="CheckDateFormat(this)" value="<?php echo $enddate->__tostring()?>" placeholder="mm/dd/yyyy" />
        </div>
        <div class="Row">
        <button type="submit" name="gettotal">Submit</button>
        <button type="submit" style="margin-left:10px">Back</button>
        </div>
        <div class="Row" style="border:solid #0094ff;margin-top:10px;font-size:30px;font-weight:bold">
        <label>Total: <?php echo Trait1::TodayTotal($table,$startdate,$enddate, $tablematches).'$'?></label>
        </div>
        <div class="Row"><button type="button" onclick="ShowDetail()">Detail</button></div>
        <div id="detail" style="display:none">
        <div class="Row">
            <label class="Row Head Name">Date</label>
            <label class="Row Head Name">Total</label>
        </div>
            <?php Trait1::DisplayTable($tablematches)?>
        </div>
        </form>
        </div>
        <?php
    }

    static  function Add_Produce()
    {
        ?>
    <div class="Column">
    <form action="Main.php" method="post">
        <div class="Row">
            <label>Produce Name:</label>
            <input name="produce_name" value="" placeholder="Name:" />
        </div>
        <div class="Row">
<label>Price</label>
<input name="produce_price" value="" placeholder="Price:" />
</div>
<div class="Row">
    <label>Stock</label>
    <input name="produce_stock" value="" placeholder="Stock:" />
</div>

        <div class="Row">
            <button type="submit" name="produce_submit">Submit</button>
            <button type="submit" >Back</button>
        </div>
    </form>
</div>
        <?php   
    }

    static function Produce_list($produce)
    {
        ?>
        <div class="Column">
        <form action="Main.php" method="post">

        <div class="Row">
        <label>Search By ID:</label><input name="id" value="" placeholder="ID"/>
        </div>

        <div class="Row" style="margin-bottom:10px">
            <button type="submit" name="search_by_id"> Search</button>
            <button type="submit" style="margin-left:10px">Back</button>
        </div>

        <div class="Row">
        <label class="Row Head Name">Produce Name</label>
        <label class="Row Head QTY">Price</label>
        <label class="Row Head QTY">Stock</label>
            <label class="Row Head Unit-Price">ID</label>
        </div>
        <div>
            <?php
        foreach ($produce as $value)
        {
            ?>
            <div class="Row">
                <label class="Row Head Name Body"><?php echo $value->name?></label>
                <label class="Row Head QTY Body"><?php echo $value->price?></label>
                <label class="Row Head QTY Body"><?php echo $value->stock->count?></label>
                <label class="Row Head Unit-Price Body"><?php echo $value->ID?></label>
            </div>
            <?php
        }
            ?>
        </div>
        </form>
        </div>
        <?php
    }

    static  function Update_produce($produce)
    {
        if ($produce!=0)
        {
?>
<div class="Column">
    <form action="Main.php" method="post">
        <div class="Row">
            <label>Produce Name:</label>
            <input name="produce_name" value="<?php echo $produce->name?>" placeholder="Name" />
        </div>
        <div class="Row">
            <label>Price:</label>
            <input name="produce_price" value="<?php echo $produce->price?>" placeholder="Price" />
        </div>
        <div class="Row">
            <label>Stock:</label>
            <input name="produce_stock" value="<?php echo $produce->stock->count?>" placeholder="Stock" />
        </div>

        <div class="Row">
            <label>ID:</label>
            <input name="produce_id" value="<?php echo $produce->ID?>" placeholder="ID" />
        </div>

        <div class="Row">
            <button type="submit" name="produce_update">Update</button>
            <button type="submit" name="produce_list">Back</button>
        </div>
    </form>
</div>
<?php
        }
        else
        {
        	echo 'Produce No Found!';
            Form::Produce_list(Trait1::LoadData('Model/Produce.txt'));
        }
        
    }

}

