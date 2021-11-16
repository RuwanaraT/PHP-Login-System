
const searchUsers = () => {

    let keyword = document.getElementById('search').value.toUpperCase(); // get the searched text and convert it to uppercase
    let stable = document.getElementById('searchTable'); // access the table by id
    let row = document.getElementsByTagName('tr'); // access the each row of the table by tag name
  
    // beginning of the for loop
    for(var i = 0; i < row.length; i++) {
  
      let data = row[i].getElementsByTagName('td')[1]; // find the relevent row data
  
      // if the row data exsists
      if(data) {
         
        // access the row data
         let input = data.textContent || data.innerHTML;
  
         // if the row data and searched text equal value shoud be greter than -1 
         if(input.toUpperCase().indexOf(keyword) > -1) {

           row[i].style.display = ""; // retrieve the relevent row

         }
  
         // if not
         else {

           row[i].style.display = "none"; // display none

         }
  
      }
  
    }
    
  }
  