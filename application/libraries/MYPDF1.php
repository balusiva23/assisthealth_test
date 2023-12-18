

<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

//require_once 'TCPDF/tcpdf.php';
require_once  dirname(__FILE__) . '/tcpdf/examples/tcpdf_include.php';
// Extend the TCthis class to create custom Header and Footer
class MYPDF1 extends TCPDF
{
   public $id = '';
    //Page header
    public function Header()
    {
        // Logo
        $image_file = FCPATH . 'assets/pdf-logo.png';
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
        <table cellpadding="5" style="text-align:center;">
        <tr>
      
            <td width="22%" style="border-bottom:2px solid black;">
                <img src="$image_file" width="" height="" align="center"/>
            </td> 
            <td width="43%" align="center" style="border-bottom:2px solid black;">
            <h1 style="font-size:30px;">Assist<span style="color:#38B6FF;">Health </span> </h1>
        
            <p style="font-size:12px;">PERSONAL HEALTH SUPPORT</p>
            </td>
            <td style="background-color: ;color:black; border-bottom:2px solid black; vertical-align: bottom;" width="29%" align="center">
            <p></p>
            <h4>AssistHealth ID : {$this->id}</h4>
      
            </td>
             
        </tr>
    </table>
EOD;
// <td width="4%"></td>


// Print text using writeHTMLCell()
        $this->writeHTML($html, true, false, true, false, '');

        // Set margins to position content below header on all pages
    $this->SetMargins(10, 30, 10, true); 

    }

    //Page footer


public function Footer() {
    
    // Position at 15 mm from bottom
    $this->SetY(-15);

    // Set font
    $this->SetFont('helvetica', 'I', 12);

    
    // Output a line above the footer
    $this->SetLineWidth(0.5);
    $this->Line(10, $this->GetY() - 1, $this->getPageWidth() - 10, $this->GetY() - 1);
      $this->SetX(10);

       $phone = FCPATH . 'assets/phone-18.png';
       $web = FCPATH . 'assets/web-18.png';

    // Start the HTML table
    $html = '<table width="100%" style="border-collapse: collapse;">';

    // Left-aligned cell
    $html .= '<tr><td style="text-align: left;"> <img src="'.$phone.'" alt="Phone Icon" style="vertical-align: ; width: 20px; height: 20px;">&nbsp;<span style="margin:5px"><strong> Phone</strong> </span><br>9611232519</td>';

    // Centered cell
    $html .= '<td style="text-align: center;"><img src="'.$web.'" alt="Phone Icon" style="vertical-align: ; width: 20px !important; height: 20px;">&nbsp;<span><strong>Web Site</strong> </span><br>www.assisthealth.in</td>';

    // Right-aligned cell
    $html .= '<td style="text-align: right;">Page - ' . $this->getAliasNumPage() . '&nbsp;&nbsp;</td></tr>';

     


    // Close the HTML table
    $html .= '</table>';
    
    $this->writeHTML($html, true, false, true);

    // Output the page number on the right
    $this->SetX($this->getPageWidth() - 10);
    $this->Cell(0, 10, 'Page -' . $this->getAliasNumPage(), 0, 0, 'R');



}




}
// https://icons8.com/icon/78382/phone