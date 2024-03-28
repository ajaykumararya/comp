/*------------------ASCII Codes for only numbers,space and tab-------------*/
function float_number(event) {
    var x = event.which || event.keyCode;
    if((x >= 48 ) && (x <= 57 ) || x == 8 | x == 9 || x == 13 || x == 46)
    {
      return;
    }else{
      event.preventDefault();
    }
  }
  
  function only_number(event){
    var x = event.which || event.keyCode;
    if((x >= 48) && (x <= 57) || x == 8 || x == 9 || x == 13){
     return;
    }else{
    event.preventDefault();
    }
  }
  
  function alphaonly(event)
  {
    var key = event.keyCode;
    return((key >=65 && key<=90)|| (key >=97 && key<=122)|| key==8 ||key==32);
  }
  
  function alphaNumeric(event)
  {
      var key = event.which || event.keyCode;
      if((key >=65 && key<=90)|| (key >=97 && key<=122)|| (key >=48 && key<=57) || key == 32){
       return;
      }else{
      event.preventDefault();
    }
  }

  function blank_input(event){
    var x = event.which || event.keyCode;
    if((x <= 01) && (x >= 126)){
     return;
    }else{
    event.preventDefault();
 }
}

/*-------------ASCII Code function for mobile number---------------*/
function load_input_mobile(event,id) {
    var y = $('#'+id).val().length;
    var x = event.which || event.keyCode;
    if(y < 1)
    {
        if((x >= 54 ) && (x <= 57 ) || x == 8 | x == 9 || x == 13)
        {
          return;
        }else{
          event.preventDefault();
        }  
    }
    else if(y > 1){
        if((x >= 48 ) && (x <= 57 ) || x == 8 | x == 9 || x == 13)
        {
          return;
        }else{
          event.preventDefault();
        }
    } 
  }

/*------------------ASCII Codes for only numbers,space and tab-------------*/
function load_input_qty(event) {
    var x = event.which || event.keyCode;
    if((x >= 48 ) && (x <= 57 ) || x == 8 | x == 9 || x == 13)
    {
      return;
    }else{
      event.preventDefault();
    }
  }