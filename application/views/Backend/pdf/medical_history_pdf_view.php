 <style type="text/css">

     .custom-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ddd;
        margin-top:0px
    }
   

    .custom-table td {
        padding: 4px;
/*        border: 1px solid #ddd;*/
        background-color: #ffffff;
    }
     .custom-table th{
       background-color: #009CB7;
       color: #ffffff;
        text-align: left; 
        font-weight: bold;
     }


 </style>

		<h5 style="text-align: center;font-size:16px;">Medical History</h5>
				
		<table>
			<tr>
		
				<td style="width:12%;font-size:16px;">Name </td>
				<td style="width:30%;">:&nbsp;&nbsp;<?=$user_data->name ?> </td>
                <td style="width:25%;"></td>
				<td style="width:10%;font-size:16px;">Date :</td>
                <td style="width:20%;"><?php $currentDate = date("d-m-Y", strtotime("now"));
                echo $currentDate; ?></td>
			</tr> 
           
            <tr>
            <?php 
                // Calculate the age based on the DOB
                $birthDate = new DateTime($user_data->dob);
                $currentDate = new DateTime();
                $ageInterval = $currentDate->diff($birthDate);
                $age = $ageInterval->y;
                ?>
                <td style="width:12%;font-size:16px;">Age </td>
                <td style="width:30%;">:&nbsp;&nbsp;<?= $age ?> </td>
                <td style="width:20%;"></td>
                <td ></td>
                <td ></td>
            </tr> 
           
            <tr>
		
                <td style="width:12%;font-size:16px;">Sex </td>
                <td style="width:30%;">:&nbsp;&nbsp;<?=$user_data->gender ?> </td>
                <td style="width:20%;"></td>
                <td ></td>
                <td ></td>
            </tr> 
           
            <tr>
		
                <td style="width:12%;font-size:16px;">Address</td>
                <td style="width:50%;">:&nbsp;&nbsp;<?php echo substr($user_data->address,0,150) ?> </td>
                <td style="width:20%;"></td>
                <td ></td>
                <td ></td>
            </tr> 
             
		
		<table>
   <div class="container" style="margin:0px">
 <?php  if(in_array('1', $checkboxValues)){ ?>
             
                       <h4 style="margin:0px">Previous Medical Conditions </h4>
                        <table class="table table-striped table-hover custom-table" border="1" cellspacing="0" cellpadding="5" >
                            <thead>
                                <tr style="background-color: #009CB7; color: #ffffff; text-align: left; font-weight: bold;">
                                    <th>S.no </th>
                                    <th> Condition</th>
                                    <th> Diagnosis  Date  </th>
                                    <th> Treatment Received </th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php if($previous_medical_conditions) { 
                                    $previousCount = 1;
                                    foreach ($previous_medical_conditions as  $previous_medical) {
                                       
                                    
                                    ?>
                                                    <tr tyle="background-color: #f3f3f3;">
                                                        <td> <?=$previousCount?> </td>
                                                        <td> <?= $previous_medical->condition_name ?> </td>
                                                        <td> <?= date('Y-m-d', strtotime($previous_medical->diagnosis_date)) ?> </td>
                                                        <td> <?= $previous_medical->treatment_received ?> </td>
                                                    </tr>
                                                    <?php 
                                     $previousCount ++;
                                   }
                                    }

                                 ?>
                            </tbody>
                        </table>
                 
                    <?php } ?> 
                     <?php  if(in_array('2', $checkboxValues)){ ?>       
                   
                       <h4 >Surgeries or Procedures </h4>
                        <table class="table table-striped table-hover custom-table" border="1" cellspacing="0" cellpadding="5" >
                           <thead>
                                   <tr style="background-color: #009CB7; color: #ffffff; text-align: left; font-weight: bold;">
                                                        <th>S.no </th>
                                                        <th> Procedure</th>
                                                        <th>  Date  </th>
                                                        <th>Surgeon/Doctor</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                     <?php if($surgeries_procedures) { 
                                                 $surgeries_procedures_count =1 ;
                                                    foreach ($surgeries_procedures as  $surgeries) {
                                                       
                                                    
                                                    ?>
                                                                    <tr style="background-color: #f3f3f3;">
                                                                        <td> <?=$surgeries_procedures_count?> </td>
                                                                        <td> <?= $surgeries->procedure_name ?> </td>
                                                                        <td> <?= date('Y-m-d', strtotime($surgeries->procedure_date)) ?></td>
                                                                        <td> <?= $surgeries->surgeon ?></td>
                                                                    </tr>
                                                                         <?php 
                                                    $surgeries_procedures_count++;
                                                   }
                                                    }

                                 ?>
                                
                                                
                              </tbody>
                        </table>
                  
                        <?php } ?> 
                 
                 <?php  if(in_array('3', $checkboxValues)){ ?>   
                  
                           <h4>Allergies</h4>
                        <table class="table table-striped table-hover custom-table" border="1" cellspacing="0" cellpadding="5" >
                           <thead>
                                   <tr style="background-color: #009CB7; color: #ffffff; text-align: left; font-weight: bold;">
                                                     <th>S.no </th>
                                                        <th> Medications</th>
                                                        <th>Food </th>
                                                        <th> Other </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                          <?php if($allergies) { 

                                                               $allergies_count = 1;
                                                    foreach ($allergies as  $allergie) {
                                                     ?>
                                                         <tr style="background-color: #f3f3f3;">
                                                        <td> <?=$allergies_count?> </td>
                                                        <td> <?= $allergie->medications ?> </td>
                                                        <td> <?= $allergie->food ?></td>
                                                        <td> <?= $allergie->other ?> </td>
                                                    </tr>
                                                      <?php  $allergies_count++; }
                                    }

                                 ?>
                                                
                              </tbody>
                        </table>
                   
                     <?php } ?> 
                       <?php  if(in_array('4', $checkboxValues)){ ?>   
                     
                            <h4>Current Medications</h4>
                          
                        <table class="table table-striped table-hover custom-table" border="1" cellspacing="0" cellpadding="5" >
                           <thead>
                                   <tr style="background-color: #009CB7; color: #ffffff; text-align: left; font-weight: bold;">
                                                        <th>S.no </th>
                                                        <th> Medication Name</th>
                                                        <th>Dosage  </th>
                                                        <th> Frequency </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               <?php if($current_medications) { 
                                   $current_medication_count = 1;
                                    foreach ($current_medications as  $current_medication) {
                                     ?> 
                                                  <tr style="background-color: #f3f3f3;">
                                                        <td> <?=$current_medication_count?> </td>
                                                        <td> <?= $current_medication->medication_name ?> </td>
                                                        <td> <?= $current_medication->dosage ?></td>
                                                        <td> <?= $current_medication->frequency ?> </td>
                                                    </tr>
                                                <?php  $current_medication_count++; }
                                    } ?>
                                             
                              </tbody>
                        </table>
                    
                    <?php } ?> 
                       <?php  if(in_array('5', $checkboxValues)){ ?>   
                 
                            <h4>Family Medical History</h4>
                          
                        <table class="table table-striped table-hover custom-table" border="1" cellspacing="0" cellpadding="5" >
                           <thead>
                                   <tr style="background-color: #009CB7; color: #ffffff; text-align: left; font-weight: bold;">
                                                         <th>S.no </th>
                                                        <th> Conditions</th>
                                                        <th> Relationship to Patient </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                              
                                                          <?php if($family_medical_history) { 
                                                  $family_medical_count = 1;
                                                    foreach ($family_medical_history as  $family_medical) {
                                                     ?>  <tr style="background-color: #f3f3f3;">
                                                                        <td> <?=$family_medical_count?> </td>
                                                                        <td> <?= $family_medical->condition_name ?> </td>
                                                                        <td> <?= $family_medical->relationship_to_patient ?></td>
                                                                        
                                                                    </tr>
                                                                   <?php  $family_medical_count++;
                                                                    }
                                                    }

                                                 ?>
                                             
                              </tbody>
                        </table>
                  
                     <?php } ?> 

                                <?php  if(in_array('6', $checkboxValues)){ ?>   
                 
                              <h4>Immunization History</h4>
                          
                        <table class="table table-striped table-hover custom-table" border="1" cellspacing="0" cellpadding="5" >
                           <thead>
                                   <tr style="background-color: #009CB7; color: #ffffff; text-align: left; font-weight: bold;">
                                                        <th>S.no </th>
                                                            <th> Vaccination</th>
                                                            <th> Date Received </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                           <?php if($immunization_history) { 
                                      $immunization_count = 1;
                                        foreach ($immunization_history as  $immunization_historys) {
                                         ?> 
                                                        <tr style="background-color: #f3f3f3;">
                                                            <td> <?=$immunization_count?> </td>
                                                            <td> <?= $immunization_historys->vaccination ?> </td>
                                                            <td> <?= date('Y-m-d', strtotime($immunization_historys->vaccination_date)) ?> </td>
                                                         
                                                        </tr>
                                                         <?php $immunization_count++; }
                                        }

                                     ?>
                                          
                                             
                              </tbody>
                        </table>
                   
                     <?php } ?>
                  
                      <?php  if(in_array('7', $checkboxValues)){ ?>   
                     
                           <h4>Previous Medical Test Results</h4>
                          
                        <table class="table table-striped table-hover custom-table" border="1" cellspacing="0" cellpadding="5" >
                           <thead>
                                   <tr style="background-color: #009CB7; color: #ffffff; text-align: left; font-weight: bold;">
                                                          <th>S.no </th>
                                                        <th> Previous Medical Test</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                              
                                                <?php if($previous_medical_test_results) { 
                                                $previousmedicalCount = 1;
                                                foreach ($previous_medical_test_results as  $previous_medical_test) {
                                                ?> 
                                                <tr  style="background-color: #f3f3f3;">
                                                    <td> <?=$previousmedicalCount?> </td>
                                                    <td> <?= $previous_medical_test->test_name ?> </td>
                                                 
                                                 
                                                </tr>
                                                <?php  $previousmedicalCount++; }
                                                }

                                                ?>
                                                
                              </tbody>
                        </table>
                   
                      <?php } ?> 
                       <?php  if(in_array('8', $checkboxValues)){ ?>   

                     
                           <h4>Current Symptoms or Concerns</h4>
                          
                        <table class="table table-striped table-hover custom-table" border="1" cellspacing="0" cellpadding="5" >
                           <thead>
                                   <tr style="background-color: #009CB7; color: #ffffff; text-align: left; font-weight: bold;">
                                                     
                                                        <th>S.no </th>
                                                        <th> Symptom</th>
                                                        <th> Concerns </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                              
                                            <?php if($current_symptoms_concerns) { 
                                            $concerns_count = 1;
                                            foreach ($current_symptoms_concerns as  $current_symptoms) {
                                            ?> 

                                          <tr  style="background-color: #f3f3f3;">
                                            <td> <?=$concerns_count?> </td>
                                            <td> <?= $current_symptoms->symptom ?> </td>
                                            <td> <?= $current_symptoms->concerns ?> </td>

                                            </tr>
                                            <?php $concerns_count++; }
                                            }?>

                                           
                              </tbody>
                        </table>
                   
                 <?php } ?> 

        
   </div> 
   <br>
   <br>
              
