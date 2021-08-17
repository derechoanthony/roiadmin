// $.ajax({
//     url: "http://localhost:8080/api/v0/company/all",
//     type: "GET",
//     dataType: "json",
//     crossDomain: true,
//     format: "json",
//     success:function(json){
//         console.log('message: ' + "success"+ JSON.stringify(json));                     
//     },
//     error:function(error){
//         console.log('message Error' + JSON.stringify(error));
//     }  
// }); 

var createNewCompany = function(company){
    console.log(company);
}

var getStructure = function(){

    $.ajax({
    url: "http://localhost:8080/api/v0/structure/all",
    type: "GET",
    dataType: "json",
    crossDomain: true,
    format: "json",
    success:function(json){
        x = json['data'][0];
        
        // return JSON.stringify(json['data'][0]);
        // console.log('message: ' + "success"+ JSON.stringify(json['data'][0]));         
        return    json['data'][0];         
    },
    error:function(error){
        return('message Error' + JSON.stringify(error));
    } 
    
}); 
}

var delete = function(id){
    
}