function checkPassword ()
{
         var password = document.getElementById("password").value;
         var repassword= document.getElementById("repassword").value;

         if(password != repassword)
         {
               alret("Passwords are mismatched !!!");
               return false;
         }
     
         else
         {
              alert("Passwords are matched !!!");
              return true;
         }
         
}

function enableButton()
{
         if(document.getElementById("checkbox").checked)
         {
              document.getElementById("submit").disabled = false;
         }
   
         else
         {
              document.getElementById("submit").disabled = true;
         }

}