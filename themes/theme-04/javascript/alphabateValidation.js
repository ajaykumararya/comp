        function onlyAlphabateWithNo()
        {
          if ((event.keyCode >= 65 && event.keyCode <= 90) ||
              (event.keyCode >= 48 && event.keyCode <= 57) ||
              (event.keyCode == 32 ) ||
              (event.keyCode == 46 ) ||
              (event.keyCode >= 97 && event.keyCode <= 122) ) {
            return true; }
          else {
            return false;
          }
        }

        function onlyAlphabateWithQuote()
        {
          if ((event.keyCode >= 65 && event.keyCode <= 90) ||
              (event.keyCode == 34 ) ||
              (event.keyCode == 39 ) ||
              (event.keyCode == 32 ) ||
              (event.keyCode >= 97 && event.keyCode <= 122) ) {
            return true; }
          else {
            return false;
          }
        }

        function onlyInteger()
        {
          if ((event.keyCode >= 48 && event.keyCode <= 57)) {
            return true; }
          else {
            return false;
          }
        }


        function onlyTelPhoneNumbers()
        {
          if ((event.keyCode >= 48 && event.keyCode <= 57)||(event.keyCode>=40 && event.keyCode<=41)||(event.keyCode==45)) {
            return true; }
          else {
            return false;
          }
        }

        
        function onlyDouble()
        {
          if ((event.keyCode >= 48 && event.keyCode <= 57)||
              (event.keyCode == 46 )) {
            return true; }
          else {
            return false;
          }
        }

        function onlyAlphanumeric()
        {
          if ((event.keyCode >= 64 && event.keyCode <= 90) ||
              (event.keyCode >= 48 && event.keyCode <= 57) ||
              (event.keyCode >= 34 && event.keyCode <= 36) ||
              (event.keyCode == 45 ) ||
              (event.keyCode == 32 ) ||
              (event.keyCode == 95 ) ||
              (event.keyCode == 38 ) ||
              (event.keyCode == 39 ) ||
              (event.keyCode >= 97 && event.keyCode <= 122) ) {
            return true; }
          else {
            return false;
          }
        }

        function alphanumericWithAll()
        {
          if ((event.keyCode >= 64 && event.keyCode <= 90) ||
              (event.keyCode >= 48 && event.keyCode <= 57) ||
              (event.keyCode >= 34 && event.keyCode <= 36) ||
              (event.keyCode >= 40 && event.keyCode <= 42) ||
              (event.keyCode == 32 ) ||              
              (event.keyCode == 39 ) ||
              (event.keyCode == 38 ) ||
              (event.keyCode == 45 ) ||
              (event.keyCode == 46 ) ||  
              (event.keyCode == 95 ) ||
              (event.keyCode >= 97 && event.keyCode <= 122) ) {
            return true; }
          else {
            return false;
          }
        }
        
        
        
        function onlyAlphabate()
        {//alert(event.keyCode);
          if ((event.keyCode >= 65 && event.keyCode <= 90) ||
              (event.keyCode == 32 ) ||
              (event.keyCode >= 97 && event.keyCode <= 122) ) {
            return true; }
          else {
            return false;
          }
        }
