<table class="center-container" border="0" cellspacing="0" cellpadding="0" width="100%" style="margin-right: 5%; background-image: url('<?php echo base_url("assets/backend_assets/img/id/id-bg1.png"); ?>'); background-size: 100% 100%; background-repeat: no-repeat; width: 530px; height: 300px;">
		    <tr>
		    <br>
		    <td style="width: 48%; "><p style="font-weight: bold; color: #38B6FF; font-size: 15px;font-family: sans-serif;">
		        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="background-color: ; border-radius: 10px;  margin-left: 10px; width:10%"><span style="color:#38B6FF;text-transform: uppercase;"><?php echo insertBreakAfter22Letters($m_name); ?></span></span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: black;background-color: ;border-radius: 10px;  ">ASSISTHEALTH ID:&nbsp;&nbsp;<span style="color: #aa893f;background-color: ;"><?php echo $m_id ?></span></span> </p>
		           <span style="font-weight: bold; color: black; text-transform: uppercase;background-color: #38B6FF;"></span><br>
		        <span style="color: white; font-size: 10px;"> &nbsp;&nbsp;</span><br>
		        <span style="color: white; font-size: 10px;"> &nbsp;&nbsp;</span><br>
		        <span style="color: white; font-size: 10px;"> &nbsp;&nbsp;</span>
		                        
		                  
		        </td>
		        
		    </tr>
		</table>

		   <!-- <button id="downloadButton">Download as PNG</button> -->
   <?php 
     $inputString = $m_name;
         $outputString = str_replace(' ', '_', strtolower($inputString));
    ?>

  <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
   // document.getElementById('downloadButton').addEventListener('click', function() {
      html2canvas(document.querySelector('.center-container')).then(function(canvas) {
        var link = document.createElement('a');
        link.href = canvas.toDataURL();
        link.download = '<?=$outputString?>'+'_membership_card.png';
        link.click();
      });
   // });
  });
</script>

<?php 


// function insertBrAfterThreeWords($inputString) {
//     // Split the input string into an array of words
//     $words = explode(' ', $inputString);

//     // Loop through the words and insert <br> after every 3 words
//     for ($i = 0; $i < count($words); $i++) {
//         echo $words[$i] . ' ';
//         if (($i + 1) % 3 === 0) {
//             echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
//         }
//     }
// } 

function insertBreakAfter22Letters($inputString) {
    // Split the input string into an array of characters
    $characters = str_split($inputString);

    // Loop through the characters and insert <br> after every 22 letters
    for ($i = 0; $i < count($characters); $i++) {
        echo $characters[$i];
        if (($i + 1) % 22 === 0) {
            echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        }
    }
}
?>
