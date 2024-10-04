//Once the 'manage accounts' is clicked the accounts get displayed

document.getElementById("accounts").addEventListener('click',function(){
    

   // Select all elements with both 'options' and 'hide' classes
   const hiddenAccounts = document.querySelectorAll(".options.hide");

   // Loop through each element and change its display to inline
   hiddenAccounts.forEach(function(element) {
       element.style.display = "block";
   });
})