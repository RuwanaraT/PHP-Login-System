function checkPassword ()
{
         var password = document.getElementById("password").value; // access the value entered for password field
         var repassword= document.getElementById("repassword").value; // access the value entered for re-enter password field

         // if two password are different 
         if(password != repassword)
         {
               alret("Passwords are mismatched !!!");
               return false;
         }
     
         // if not
         else
         {
              alert("Passwords are matched !!!");
              return true;
         }
         
}

function enableButton()
{
         // confirm whether checkbox is checked
         if(document.getElementById("checkbox").checked)
         {
              // enable the submit button
              document.getElementById("submit").disabled = false;
         }
   
         // if not
         else
         {
              // disable the submit button
              document.getElementById("submit").disabled = true;
         }

}