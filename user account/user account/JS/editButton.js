

function edit(event) {

    event.preventDefault();
    document.querySelectorAll('span[id^="edit"]').forEach(span=>{
        span.style.display="inline";
        
    })

    document.querySelectorAll('span[id$="Plus"]').forEach(span=>{
        span.style.display="inline";
        
    })

    document.querySelectorAll('span[id^="remove"]').forEach(span=>{
        span.style.display="inline";
    })

    document.getElementById("editBtn").style.display="none";
    document.getElementById("saveBtn").style.display="block";


};


var updateCount=1;


function editField(fieldId){

    if(document.getElementById(fieldId + 'Modify')){
        const modifyField=document.getElementById(fieldId + 'Modify');
        
        modifyField.disabled=!modifyField.disabled;
        modifyField.focus();
       
        //modifyField.name="modifynewFieldInline"+updateCount;

    }

    if(document.getElementById(fieldId + 'New')){
        const newField=document.getElementById(fieldId + 'New');

        if(newField.id=="BDNew" || newField.id=="GenderNew" || newField.id=="AgeNew" ){
            newField.style.display="inline";
            newField.focus();
           // newField.name="updatednewFieldInline"+updateCount;
        }

        else{
            newField.style.display="block";
            newField.focus();
            //newField.name="updatednewFieldBlock"+updateCount;                                                                                                                                                                                                                                                                                                                                                                                                                                             
        }
        

    }

    if(document.getElementById(fieldId + 'Display')){
        const displayField=document.getElementById(fieldId + 'Display');
        displayField.style.display="none";

    }

    updateCount++;

    
    /*const modifyField=document.getElementById(fieldId + 'Modify');
    const newField=document.getElementById(fieldId + 'New');
    const displayField=document.getElementById(fieldId + 'Display');
    modifyField.disabled=!modifyField.disabled;
    newField.style.display="inline";
    displayField.style.display="none";*/

};

var telName=1;
var AddTels=[];

//After the edit button the input fields enable to edit
/*document.querySelectorAll('span[id^="edit"]').addEventListener('click',function(){
    input.disabled=false;
})*/

document.getElementById('TelPlus').addEventListener('click', function() {
    const newTel= document.createElement('input');
    newTel.type='tel';
    newTel.pattern='[0-9]{10}';
    newTel.id="newTel"+telName;
    
    newTel.style.backgroundColor="white";
    //newTel.display="inline";

    const telList=document.getElementById("tel_list");
    const newLine=document.createElement("li");
    newLine.appendChild(newTel);
    telList.appendChild(newLine);
    newTel.focus();

    
    telName++;


});

var emailName=1;
var AddEmails=[];

document.getElementById('EmailPlus').addEventListener('click', function() {
    const newEmail= document.createElement('input');
    newEmail.type='email';
    newEmail.pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$";
    newEmail.id="newEmail"+emailName;
    
    newEmail.style.backgroundColor="white";
    //newTel.display="inline";

    const emailList=document.getElementById("email_list");
    const newLine=document.createElement("li");
    newLine.appendChild(newEmail);
    emailList.appendChild(newLine);
    newEmail.focus();

    emailName++;


});

var removedEmails = [];
var removedTels = [];

//Remove the displayed email fields
function emailRemover(emailID){
    document.getElementById("EmailModify-"+emailID).style.display="none";
    document.getElementById("removeEmail-"+emailID).style.display="none";
    document.getElementById("editEmail-"+emailID).style.display="none";
    var delEmail=document.getElementById("EmailModify-"+emailID).value;

    removedEmails.push(delEmail);
    //console.log("Removed email: " + delEmail); 


}



//Remove the displayed tel no fields
function telRemover(telID){
    document.getElementById("TelModify-"+telID).style.display="none";
    document.getElementById("removeTel-"+telID).style.display="none";
    document.getElementById("editTel-"+telID).style.display="none";
    var delTel=document.getElementById("TelModify-"+telID).value;

    removedTels.push(delTel);

}

var updatedFields=[];

document.getElementById("saveBtn").addEventListener("click", function() {
    document.querySelectorAll('[id^="newEmail"]').forEach(function(emailInput) {
        if (emailInput.value) {
            AddEmails.push(emailInput.value); // Now you capture the user input
        }
    });

    document.querySelectorAll('[id^="newTel"]').forEach(function(telInput) {
        if (telInput.value) {
            AddTels.push(telInput.value); // Now you capture the user input
        }
    });

   /*document.querySelectorAll('[name^="updated"]').forEach(function(updatedInput) {
        if (updatedInput.value) {
            updatedFields.push(updatedInput.value); // Now you capture the user input
        }
    });*/

    /*document.querySelectorAll('[input type="email"(name^="modifynewFieldInline")]').forEach(function(updatedInput) {                                                                              
        if (updatedInput.value) {
            updatedFields.push(emailInput.value); // Now you capture the user input************************************************************************
        }
    });*/

    if (updatedFields.length > 0 ) {//check whether there're items in the array
        // Send data to the server to delete
        fetch('../PHP/update_data.php', { //fetch the php file(request)
            method: 'POST',    //use POST method
            headers: {
                'Content-Type': 'application/json',  //tells that body is in JSON format
            },
            body: JSON.stringify({    //tells that the content is in body
                updates: updatedFields,  //arrays are being converted to JSON strings
                
            })
        })
        .then(response => response.json())  //waiting for the response of the server and once the response is received it is converted to JSON
        .then(data => {         //Then that data will be sent to console function
            console.log('Deletion Success:', data);
        })
        .catch(error => {  //if there was any error during the request to the server
            console.error('Error:', error);
        });
    }





    if (removedEmails.length > 0 || removedTels.length > 0) {//check whether there're items in the array
        // Send data to the server to delete
        fetch('../PHP/delete_data.php', { //fetch the php file(request)
            method: 'POST',    //use POST method
            headers: {
                'Content-Type': 'application/json',  //tells that body is in JSON format
            },
            body: JSON.stringify({    //tells that the content is in body
                emails: removedEmails,  //arrays are being converted to JSON strings
                tels: removedTels
            })
        })
        .then(response => response.json())  //waiting for the response of the server and once the response is received it is converted to JSON
        .then(data => {         //Then that data will be sent to console function
            console.log('Deletion Success:', data);
        })
        .catch(error => {  //if there was any error during the request to the server
            console.error('Error:', error);
        });
    }

    if (AddEmails.length > 0 || AddTels.length > 0) {//check whether there're items in the array
        // Send data to the server to insert
        fetch('../PHP/insert_data.php', { //fetch the php file(request)
            method: 'POST',    //use POST method
            headers: {
                'Content-Type': 'application/json',  //tells that body is in JSON format
            },
            body: JSON.stringify({    //tells that the content is in body
                emails: AddEmails,  //arrays are being converted to JSON strings
                tels: AddTels
            })
        })
        .then(response => response.json())  //waiting for the response of the server and once the response is received it is converted to JSON
        .then(data => {         //Then that data will be sent to console function
            console.log('Deletion Success:', data);
        })
        .catch(error => {  //if there was any error during the request to the server
            console.error('Error:', error);
        });
    }

    
    

    document.getElementById("editBtn").style.display="block";
    document.getElementById("saveBtn").style.display="none";

    document.querySelectorAll('span[id$="Plus"]').forEach(span=>{
        span.style.display="none";
        
    })

    document.querySelectorAll('span[id^="remove"]').forEach(span=>{
        span.style.display="none";
    })

    document.querySelectorAll('span[id^="edit"]').forEach(span=>{
        span.style.display="none";
        
    })
});


document.querySelectorAll('input[type="tel"]').forEach((input, index) => {
    const editButton = document.getElementById(`editTel-${index + 1}`);
    const removeButton = document.getElementById(`removeTel-${index + 1}`);
    const modifyButton = document.getElementById(`TelModify-${index + 1}`);
   

    editButton.addEventListener('click',()=>{
        removeButton.style.display = 'inline';
        modifyButton.disabled=false;
        modifyButton.focus();
        modifyButton.setSelectionRange(modifyButton.value.length, modifyButton.value.length);//?
    });
    
});

document.querySelectorAll('input[type="email"]').forEach((input, index) => {
    const editButton = document.getElementById(`editEmail-${index + 1}`);
    const removeButton = document.getElementById(`removeEmail-${index + 1}`);
    const modifyButton = document.getElementById(`EmailModify-${index + 1}`);

    editButton.addEventListener('click',()=>{
        removeButton.style.display = 'inline';
        modifyButton.disabled=false;
        modifyButton.focus();
        modifyButton.setSelectionRange(modifyButton.value.length, modifyButton.value.length);
    });
    
});

document.getElementById("editBio").addEventListener("click",function(){
    editField("Bio");
});

document.getElementById("editName").addEventListener("click",function(){
    editField("Name");
});

document.getElementById("editBD").addEventListener("click",function(){
    editField("BD");
});



document.getElementById("editAddress").addEventListener("click",function(){
    editField("Address");
});

document.getElementById("editGender").addEventListener("click",function(){
    editField("Gender");
});

document.getElementById("editPW").addEventListener("click",function(){
    editField("PW");
});

document.getElementById("editAge").addEventListener("click",function(){
    editField("Age");
});

document.getElementById("editEmail").addEventListener("click",function(){
    editField("Email");
});

function updateHiddenField(count) {
    var inputTelField = document.getElementById("TelModify-" + count);
    var hiddenTelField = document.querySelector('input[name="tel[' + count + '][new]"]');
    hiddenTelField.value = inputTelField.value; // Update the hidden field with the current value

    var inputEmailField = document.getElementById("EmailModify-" + count);
    var hiddenEmailField = document.querySelector('input[name="email[' + count + '][new]"]');
    hiddenEmailField.value = inputEmailField.value; // Update the hidden field with the current value

}


