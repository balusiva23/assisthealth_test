<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once  dirname(__FILE__) . '/tcpdf/examples/tcpdf_include.php';
class Pdf extends TCPDF {

    //Page header
  //  public function Header() {
  //       // Logo
  //     // Set the header height
   
  //     $image_file = FCPATH . 'assets/logo_no_text.png';
  //     if (!file_exists($image_file)) {
  //       die('Image not found: ' . $image_file);
  //     }
  //     $this->Image($image_file, 10, 15, 30, 20, 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
  //       // Set font
  //       $this->SetFont('helvetica', 'B', 10);
  //      // Set Y position after logo
  //        $this->SetY(5); // Adjust this value as needed

  //     //   $html = '<div>
  //     //   <h1 style="color:#009CB7;text-align:center;font-family: Canva Sans;"> <span style="color:#000000;">Assist</span>Health</h1>
  //     //   <h2 style="color:#000000;text-align:center;font-family: Canva Sans;">Your All-In-One </h2>
  //     //   <h2 style="color:#000000;text-align:center;font-family: Canva Sans;">Personal Healthcare Support </h2>
  //     //  </div>';
  //     $html = '<div style="width:50%"><p style="color:#009CB7;text-align:center;font-family: Canva Sans;"><h1><span style="color:#000000;">Assist</span>Health</h1></p>
  //     <p style="color:#000000;text-align:center;font-family: Canva Sans;"><h3>Your All-In-One</h3></p></div>';
  //       $htmlcontent = $this->writeHTML($html);
  //   // $htmlcontent = 'Center Text';
       
  //       // Title
  //       //$this->Cell(0, 5, $htmlcontent, 0, 1, 'C');
  //       $this->Cell(0, 10, $htmlcontent, 0, false, 'C', 0, '', 0, false, 'M', 'M');
  //       $this->Ln();
 
  //       // // // Move cursor to the right corner and add text
  //       $this->SetX(-5); // Adjust the X-coordinate to position the text
  //       $this->Cell(0, 5, 'Right Corner Text', 0, false, 'R', 0, '', 0, false, 'T', 'M');

        
  //   }

  public function Header() {
    
       $image_file = FCPATH . 'assets/pdf.png';
      if (!file_exists($image_file)) {
        die('Image not found: ' . $image_file);
      }
      
    // Get the width of the page in millimeters
    $pageWidth = $this->getPageWidth();

      $this->Image($image_file, 0, 0, $pageWidth, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);


        //     $this->SetHeaderMargin(30);
        //   $this->SetMargins(0, 0, 0, 0);

        //   // Logo
        //   $image_file = FCPATH . 'assets/logo_no_text.png';
        //   if (!file_exists($image_file)) {
        //       die('Image not found: ' . $image_file);
        //   }
          
        //   // Set font
        //   $this->SetFont('helvetica', 'B', 10);
        //   // Store the current Y position before adding the header content
        // $startY = $this->getY();

        //   // Centered HTML content with a table structure
        //   $html = '<table width="100%" style="margin-bottom: 0" width="100%" cellspacing="0" cellpadding="0">
        //               <tr>
        //                   <td style="text-align: left;"><img src="' . $image_file . '" width="150" height="100"></td>
        //                   <td style="text-align: center; line-height: 1;padding: 0;">
        //                       <h1 style="color:#009CB7;font-family: Canva Sans;margin: 0; font-size:30px">Assist<span style="color:#000000;">Health</span></h1>
        //                       <h3 style="color:#000000;font-family: Canva Sans;margin: 0;">Your All-In-One</h3>
        //                       <h3 style="color:#000000;font-family: Canva Sans;margin: 0;">Personal Healthcare Support</h3>
        //                   </td>
        //                   <td style="text-align: right; vertical-align: top; background-color: #009CB7;padding: 0; margin-left: 10px;padding: 0;">
        //                   <div style="color: white; font-weight: bold; text-align: center;line-height: 1;">
        //                       <p style="font-size: 15px; margin: 0;">FOR APPOINTMENTS</p>
        //                       <p style="font-size: 15px; margin: 0;">CALL / WHATSAPP</p>
        //                       <p style="font-size: 15px; margin: 0;">9611232519</p>
        //                       <p style="font-size: 15px; margin: 0;">9611232569</p>
        //                   </div>
        //               </td>
        //               </tr>
        //           </table>';
          
        //   // Output the HTML content
        //  // $this->writeHTML($html);
        //   $this->Cell(0, 50, $this->writeHTML($html), 0, false, 'R', 0, '', 0, false, 'T', 'M');

        //      $this->SetLineWidth(0.05); // Set the border width
        //      $this->SetDrawColor(0, 156, 183); // Set the border color
        //      $this->SetFillColor(0, 156, 183);
          


        //       // Draw a filled rectangle as the border starting from the stored Y position
        //       $this->Rect(0, 48, $this->getPageWidth(), 1, 'F');
            
              }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-10);

                
      $style = array('width' => 0.3, 'color' => array(0, 0, 0));
      $style1 = array('width' => 0.3, 'color' => array(255, 255, 255));

     if($this->end == true)
      {
        $this->Line(11, $this->getPageHeight() - 25, $this->getPageWidth() - 10, $this->getPageHeight() - 25,$style1);
      } 

     else
     {
      $this->Line(11, $this->getPageHeight() - 25, $this->getPageWidth() - 10, $this->getPageHeight() - 25,$style);
     }
        // Set font
        $this->SetFont('helvetica', 'I', 12);
       $date = date("d-M-Y ");  
        $this->Cell(0, 5,$date, 0, $ln=0, 'L', 0, '', 0, false,  'T', 'M');
        // Page number
        $this->Cell(0, 5, ' '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
 ?>