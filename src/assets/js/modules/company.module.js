
// requires('./services/company.js')
function createCompanyValidation(){

  var title = "The ROI";
  var body = "Successfully Save";

  // $("#MyPopup .modal-title").html(title);
  $("#MyPopup .modal-body").html(body);
  $("#MyPopup").modal("show");

  // return false;
  
}

//autocomplete Company template
$(function(){
  // $(".buttonFinish ").hide();
  $(".buttonFinish").removeClass("btn-default"); 
  $(".buttonFinish").addClass("btn-primary"); 

  $.ajax({
    url: "http://localhost:8080/api/v0/structure/all",
    type: "GET",
    dataType: "json",
    crossDomain: true,
    format: "json",
    success:function(json){   
        $('#autocomplete').autocomplete({
          lookup: json['data'][0],
          onSelect: function (suggestion) {
            var i=0;
            
            var thehtml = '<tr id="'+suggestion.data+'"><td><input type="hidden" name="structure_id" id="structure_id" value="'+suggestion.data+'" name="'+suggestion.data+'">'+ suggestion.data +'</td><td>'+ suggestion.value +'</td><td> <button class="btn btn-danger btn-sm" onClick="$(this).closest(\'tr\').remove()"><i class="fa fa-trash"></i></button></td></tr>';
      
            $(thehtml).insertAfter("#outputcontent tr:first");
            
          }
        });         
    },
    error:function(error){
        return('message Error' + JSON.stringify(error));
    } 
    
}); 

  $('#adduser').click(function() { 
    var newUser = '<tr><td>'+$('#fname').val()+'</td><td>'+$('#lname').val()+'</td><td>'+$('#email').val()+'</td><td>'+$('#currency').val()+'</td><td>Admin</td></tr>';
    $(newUser).insertAfter("#userlist tr:first");
  });
  

});