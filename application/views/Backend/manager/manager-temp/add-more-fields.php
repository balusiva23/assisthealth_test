<script type="text/javascript">
	 // $(document).ready(function(){  
      //       var i=1;  
      //       $('#add_previous').click(function(){  
      //            i++;  /*<td><input type="text" name="allowance[]" placeholder="Enter Allowance" class="form-control name_list" /></td>*/
      //            $('#bar-parent1').append('<div id="row'+i+'" class="addfields "> <div class="row"> <div class="col-md-4 col-sm-3"> <div class="form-group"> <label for="simpleFormEmail">Condition </label> <input type="text" class="form-control" name="medical_conditions[]" placeholder="Enter Condition"> </div> </div> <div class="col-md-4 col-sm-3"> <div class="form-group"> <label for="simpleFormEmail">Diagnosis  Date</label> <input type="text"  id="date" class="form-control date" name="medical_condition_date[]" placeholder="Enter Date"> </div> </div> <div class="col-md-3 col-sm-3"> <div class="form-group"> <label for="simpleFormPassword">Treatment Received</label> <input type="text" class="form-control" name="treatment_received[]" placeholder=""> </div> </div> <div class="col-md-1 col-sm-1 mt-4"> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove previous">X</button></div> </div></div>');  
      //       });  


      //       $(document).on('click', '.previous', function(){  
      //            var button_id = $(this).attr("id");   
                
      //            $('#row'+button_id+'').remove();  
                
      //       }); 
       
      //       });  
	 //  $(document).ready(function(){  
      //       var i=1;  
      //       $('#add_surgeries').click(function(){  
      //            i++;  /*<td><input type="text" name="allowance[]" placeholder="Enter Allowance" class="form-control name_list" /></td>*/
      //            $('#bar-parent2').append('<div id="row'+i+'" class="addfields "> <div class="row"> <div class="col-md-4 col-sm-3"> <div class="form-group"> <label for="simpleFormEmail">Condition </label> <input type="text" class="form-control" name="medical_conditions[]" placeholder="Enter Condition"> </div> </div> <div class="col-md-4 col-sm-3"> <div class="form-group"> <label for="simpleFormEmail">Diagnosis  Date</label> <input type="date"  id="date" class="form-control" name="medical_condition_date[]" placeholder="Enter Date"> </div> </div> <div class="col-md-3 col-sm-3"> <div class="form-group"> <label for="simpleFormPassword">Treatment Received</label> <input type="text" class="form-control" name="treatment_received[]" placeholder=""> </div> </div> <div class="col-md-1 col-sm-1 mt-4"> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove surgeries">X</button></div> </div></div>');  
      //       });  
      //       $(document).on('click', '.surgeries', function(){  
      //            var button_id = $(this).attr("id");   
                
      //            $('#row'+button_id+'').remove();  
                
      //       }); 
      //       }); 






/*new*/

 $(document).ready(function() {
   var previousCount = 1;
   var surgeriesCount = 1;
   var allergiesCount = 1;
   var currentCount = 1;
   var familyCount = 1;
   var immunizationCount = 1;
   var medicalTestCount = 1;
   var currentSymptomsCount = 1;

   // Add previous medical condition row
   $('#add_previous').click(function() {
      previousCount++;
      $('#bar-parent1').append('<div id="previous-row-' + previousCount + '" class="addfields">' +
         '<div class="row">' +
         '<div class="col-md-4 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Condition</label>' +
         '<input type="text" class="form-control" name="medical_conditions[]" placeholder="Enter Condition">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-4 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Diagnosis Date</label>' +
         '<input type="date" id="date" class="form-control date" name="medical_condition_date[]" placeholder="Enter Date">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-3 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormPassword">Treatment Received</label>' +
         '<input type="text" class="form-control" name="treatment_received[]" placeholder="">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-1 col-sm-1 mt-4">' +
         '<button type="button" name="remove" id="previous-' + previousCount + '" class="btn btn-danger btn_remove previous">X</button>' +
         '</div>' +
         '</div>' +
         '</div>');
   });

   // Add surgeries or procedures row
   $('#add_surgeries').click(function() {
      surgeriesCount++;
      $('#bar-parent2').append('<div id="surgeries-row-' + surgeriesCount + '" class="addfields">' +
         '<div class="row">' +
         '<div class="col-md-4 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Procedure</label>' +
         '<input type="text" class="form-control" name="surgeries[]" placeholder="Enter Procedure">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-4 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Date</label>' +
         '<input type="date" id="date" class="form-control date" name="surgeries_date[]" placeholder="Enter Date">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-3 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormPassword">Surgeon/Doctor</label>' +
         '<input type="text" class="form-control" name="Surgeon[]" placeholder="">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-1 col-sm-1 mt-4">' +
         '<button type="button" name="remove" id="surgeries-' + surgeriesCount + '"class="btn btn-danger btn_remove surgeries">X</button>' +
         '</div>' +
         '</div>' +
         '</div>');
   });

   // Add allergies row
   $('#add_allergies').click(function() {
      allergiesCount++;
      $('#bar-parent3').append('<div id="allergies-row-' + allergiesCount + '" class="addfields">' +
         '<div class="row">' +
         '<div class="col-md-4 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Medications</label>' +
         '<input type="text" class="form-control" name="medications[]" placeholder="Enter Medications">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-4 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Food</label>' +
         '<input type="text" class="form-control" name="food[]" placeholder="Enter Food">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-3 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormPassword">Other</label>' +
         '<input type="text" class="form-control" name="other[]" placeholder="">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-1 col-sm-1 mt-4">' +
         '<button type="button" name="remove" id="allergies-' + allergiesCount + '" class="btn btn-danger btn_remove allergies">X</button>' +
         '</div>' +
         '</div>' +
         '</div>');
   });

   // Add current medications row
   $('#add_current').click(function() {
      currentCount++;
      $('#bar-parent4').append('<div id="current-row-' + currentCount + '" class="addfields">' +
         '<div class="row">' +
         '<div class="col-md-4 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Medication Name</label>' +
         '<input type="text" class="form-control" name="medication_name[]" placeholder="Enter Medication Name">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-4 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Dosage</label>' +
         '<input type="text" class="form-control" name="medication_dosage[]" placeholder="Enter Dosage">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-3 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormPassword">Frequency</label>' +
         '<input type="text" class="form-control" name="medication_frequency[]" placeholder="Enter Frequency">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-1 col-sm-1 mt-4">' +
         '<button type="button" name="remove" id="current-' + currentCount + '" class="btn btn-danger btn_remove current">X</button>' +
         '</div>' +
         '</div>' +
         '</div>');
   });

 
   // Add family medical history row
   $('#add_family').click(function() {
      familyCount++;
      $('#bar-parent5').append('<div id="family-row-' + familyCount + '" class="addfields">' +
         '<div class="row">' +
         '<div class="col-md-6 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Conditions (e.g., heart disease, diabetes, cancer)</label>' +
         '<input type="text" class="form-control" name="family_medical_history[]" placeholder="">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-5 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Relationship to Patient</label>' +
         '<input type="text" class="form-control" name="relationship_to_patient[]" placeholder="">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-1 col-sm-1 mt-4">' +
         '<button type="button" name="remove" id="family-' + familyCount + '" class="btn btn-danger btn_remove family">X</button>' +
         '</div>' +
         '</div>' +
         '</div>');
   });

   // Add immunization history row
   $('#add_immunization').click(function() {
      immunizationCount++;
      $('#bar-parent6').append('<div id="immunization-row-' + immunizationCount + '" class="addfields">' +
         '<div class="row">' +
         '<div class="col-md-6 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Vaccination</label>' +
         '<input type="text" class="form-control" name="vaccination[]" placeholder="">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-5 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Date Received</label>' +
         '<input type="date" id="date" class="form-control date" name="vaccination_date[]" placeholder="Enter Date">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-1 col-sm-1 mt-4">' +
         '<button type="button" name="remove" id="immunization-' + immunizationCount + '" class="btn btn-danger btn_remove immunization">X</button>' +
         '</div>' +
         '</div>' +
         '</div>');
   });

   // Add previous medical test results row
   $('#add_medical_test').click(function() {
      medicalTestCount++;
      $('#bar-parent7').append('<div id="medicaltest-row-' + medicalTestCount + '" class="addfields">' +
         '<h5>List any relevant medical test results and their dates (e.g., blood tests, imaging reports)</h5>' +
         '<div class="row">' +
         '<div class="col-md-10 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail"></label>' +
         '<input type="text" class="form-control" name="medical_test[]" placeholder="">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-1 col-sm-1 mt-4">' +
         '<button type="button" name="remove" id="medicaltest-' + medicalTestCount + '" class="btn btn-danger btn_remove medicaltest">X</button>'+
         '</div>' +
         '</div>' +
         '</div>');
   });

   // Add current symptoms or concerns row
   $('#add_current_symptoms').click(function() {
      currentSymptomsCount++;
      $('#bar-parent8').append('<div id="currentsymptoms-row-' + currentSymptomsCount + '" class="addfields">' +
         '<h5>List any symptoms or concerns you would like to discuss with the doctor:</h5>' +
         '<div class="row">' +
         '<div class="col-md-6 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Symptom</label>' +
         '<input type="text" class="form-control" name="symptom[]" placeholder="">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-5 col-sm-3">' +
         '<div class="form-group">' +
         '<label for="simpleFormEmail">Concerns</label>' +
         '<input type="text" class="form-control" name="concerns[]" placeholder="">' +
         '</div>' +
         '</div>' +
         '<div class="col-md-1 col-sm-1 mt-4">' +
         '<button type="button" name="remove" id="currentsymptoms-' + currentSymptomsCount + '" class="btn btn-danger btn_remove currentsymptoms">X</button>' +
         '</div>' +
         '</div>' +
         '</div>');
   });

   // Remove row
   $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      var section = button_id.split('-')[0];
      var row_id = button_id.split('-')[1];
      
      $('#' + section + '-row-' + row_id).remove();
   });


});

// Remove previous medical test results row
$(document).on('click', '.btn_remove.medical-test', function() {
   var row_id = $(this).attr("id").split('-')[1];
   $('#medical-test-row-' + row_id).remove();
});

// Remove current symptoms or concerns row
$(document).on('click', '.btn_remove.current-symptoms', function() {
   var row_id = $(this).attr("id").split('-')[1];
   $('#current-symptoms-row-' + row_id).remove();
});



</script>
