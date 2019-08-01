<?php
function retrieveText($file, $init, $end, $sulfix = '')
{
    $i = 1;
    $output = '';

    $handle = fopen($file, 'r');
    while (false === feof($handle) && $i <= $end) {
        $data = fgets($handle);

        if ($i >= $init) {
            $output .= $data . $sulfix;
        }
        $i++;
    }
    fclose($handle);

    return $output;
}

function filewriter($filename,$line,$text,$append){
    $current = file_get_contents($filename);

    //Get the lines:
    $lines = preg_split('/\r\n|\n|\r/', trim($current));

    if ($append)
    {
        //We need to append:
        for ($i = count($lines); $i > $line; $i--)
        {
            //Replace all lines so we get an empty spot at the line we want
            $lines[$i] = $lines[i-1];
        }

        //Fill in the empty spot:
        $lines[$line] = $text;
    }
    else
        $lines[$line] = $text;

    //Write back to the file.
    file_put_contents($filename, implode( "\n", $lines ));
}

echo retrieveText('file.txt',2,2);
filewriter('file.txt',7,hello7,false);
?>