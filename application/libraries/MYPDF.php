

<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

///require_once 'TCPDF/tcpdf.php';
require_once  dirname(__FILE__) . '/tcpdf/examples/tcpdf_include.php';
// Extend the TCthis class to create custom Header and Footer
class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
         $image_file = FCPATH . 'assets/log_with_text.png';
        // $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // // Set font
        // $this->SetFont('helvetica', 'B', 20);
        // // Title
        // $this->Cell(0, 15, '<< TCthis Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');

        // First name
        $this->SetMargins(0, 10, 0, true);
        $this->SetFooterMargin(0);
        $this->setHtmlVSpace(array(
            'h1' => array(0 => array('h' => '', 'n' => 0), 1 => array('h' => '', 'n' => 0)),
            'p' => array(0 => array('h' => '', 'n' => 0), 1 => array('h' => '', 'n' => 0)),
            ));
        $html = <<<EOD
        <table cellpadding="5" style="text-align:center;border-bottom:5px solid #009CB7;">
        <tr>
            <td width="34%">
                <img src="$image_file" width="100px" height="100px" align="center"/>
            </td> 
            <td width="33%" align="center">
            <h1 style="font-size:30px;">Assist<span style="color:#009CB7;">Health </span> </h1>
            <p style="font-size:15px;font-weight:bold"> Your All-In-One </p>
            <p style="font-size:15px;font-weight:bold"> Personal Healthcare Support </p>
            </td>
            <td style="background-color: #009CB7;color:white;" width="33%" align="center">
            <h1>FOR APPOINTMENTS</h1>
            <h1>CALL / WHATSAPP</h1>
            <h1>9611232519</h1>
            <h1>9611232569</h1>
            </td>
        </tr>
    </table>
EOD;

// Print text using writeHTMLCell()
        $this->writeHTML($html, true, false, true, false, '');

    }

    // Page footer
//     public function Footer()
//     {
//         // Position at 15 mm from bottom
//         $this->SetY(-20);
//         // Set font
//         $this->SetFont('times', '', 8);
//         // Page number

//         $html = <<<EOD
//         <font size="+1"><span><strong>Footer Example</span></strong></font>
//         <hr />
//         FooterText
// EOD;

//         $this->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
//         // print a block of text using Write()
//         //$this->Write(-60, $FooterText , '', 0, 'C', true, 0, false, false, 12);
//     }
}
