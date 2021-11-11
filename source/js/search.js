
const searchBuyers = () => {

    let keyword = document.getElementById('search').value.toUpperCase();
    let stable = document.getElementById('searchTable');
    let row = document.getElementsByTagName('tr');
  
    for(var i = 0; i < row.length; i++) {
  
      let data = row[i].getElementsByTagName('td')[1];
  
      if(data) {
         
         let input = data.textContent || data.innerHTML;
  
         if(input.toUpperCase().indexOf(keyword) > -1) {
           row[i].style.display = "";
         }
  
         else {
           row[i].style.display = "none";
         }
  
      }
  
    }
    
  }
  