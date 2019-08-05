<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../../vendor/autoload.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <style>
        a {
            text-decoration: none;
        }

        div.Box {
            width: 230px;
            height: 340px;
            margin-left: 20px;
            margin-top: 40px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.6);
            -moz-box-shadow: 0 0 10px rgba(0,0,0,0.6);
            -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.6);
            border-radius: 10px;
            transition: width height ease-in 3s;
            float:left;
            position:absolute;
        }

        .Box:hover {
            width: 260px;
            height: 370px;
            margin-left:5px;
            margin-top:25px;
            z-index:1;
        }

        body {
            background-color: darkgray;
        }

        h1.hTitle {
            font-size: 17px;
            text-align: center;
            padding-top: 5px;
        }

        p.pStyle {
            font-size: 40px;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
            margin-bottom: 1px;
        }

        p.p1 {
            color: darkgray;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-top: 1px;
            margin-bottom: 1px;
        }

        p.p2 {
            font-size: 15px;
            font-weight: bold;
            text-align: center;
            line-height: 30px;
        }

        div.Button {
            width: 100px;
            height: 30px;
            color: white;
            text-align: center;
            padding-top: 7px;
            border-radius: 10px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="Box" style="left:50px">
        <h1 class="hTitle">ENTERPRISE</h1>
        <hr style="border: solid darkred" />
        <p class="pStyle">$69</p>
        <p class="p1">per month</p>
        <p class="p2">
            10GB disk space<br />
            100GB monthly bandwidth<br />
            20 email accounts<br />
            Unlimited subdomens<br />
        </p>
        <a href="#">
            <div class="Button" style="background-color: darkred;" id="1">Buy</div>
        </a>
    </div>

    <div class="Box" style="left:290px">
        <h1 class="hTitle">PROFESSIONAL</h1>
        <hr style="border: solid darkorange" />
        <p class="pStyle">$29</p>
        <p class="p1">per month</p>
        <p class="p2">
            5GB disk space<br />
            60GB monthly bandwidth<br />
            10 email accounts<br />
            Unlimited subdomens<br />
        </p>
        <a href="#">
            <div class="Button" style="background-color: darkorange;" id="1">Buy</div>
        </a>
    </div>

    <div class="Box" style="left:530px">
        <h1 class="hTitle">STANDARD</h1>
        <hr style="border: solid darkblue" />
        <p class="pStyle">$19</p>
        <p class="p1">per month</p>
        <p class="p2">
            3GB disk space<br />
            30GB monthly bandwidth<br />
            5 email accounts<br />
            Unlimited subdomens<br />
        </p>
        <a href="#">
            <div class="Button" style="background-color: darkblue;" id="1">Buy</div>
        </a>
    </div>

    <div class="Box" style="left:770px">
        <h1 class="hTitle">BASIC</h1>
        <hr style="border: solid darkgreen" />
        <p class="pStyle">$9</p>
        <p class="p1">per month</p>
        <p class="p2">
            1GB disk space<br />
            10GB monthly bandwidth<br />
            2 email accounts<br />
            Unlimited subdomens<br />
        </p>
        <a href="#">
            <div class="Button" style="background-color: darkgreen;" id="1">Buy</div>
        </a>
    </div>
</body>
</html>

EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 2, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+