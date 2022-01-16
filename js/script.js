      function ajax(Vr,Div){
        var ran = Math.random();
        Vr += "&ran="+ran;
        $("#"+Div).load("_.php?fls="+encodeURI(Vr), function(responseTxt, statusTxt, xhr){
          if(statusTxt == "error")
            response.write("Error: " + xhr.status + ": " + xhr.statusTxt);
        });
        return false;
      }

      function check_number() {
        e_k=event.keyCode
        if (e_k != 13 && e_k != 46 && (e_k < 48) || (e_k > 57)) {
          event.returnValue = false;
        }
      }
  
      var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.width='100%';
        output.style.position = 'relative; top:50%'; 
        output.style.transform = 'translateY(-50%)';
      };
      
      function setModal(JHeader, Vrs){
        document.getElementById('modalHeader').innerHTML = JHeader;
        ajax(Vrs,'modalBody');
      }

      var myVar;
      function setErr(){
        myVar = setInterval(clearErr, 3000);
      }

      function clearErr(){
        document.getElementById("errtxt").innerHTML = '';
        clearInterval(myVar);
      }