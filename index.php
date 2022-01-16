<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script type="text/javascript" src="js/script.js"></script>
	<title>POS Mobile</title>
</head>
<body>
	<iframe src="about:blank" name="xData" style="display: none;">
		
	</iframe>
	<div id="showhide" style="display: none;">
		
	</div>
	<?php include("nav.php"); ?>
	<div id="mainpage" class="container" style="margin-top: 43px;">
		<?php
			if($_COOKIE["usrid"] < 1){
				include("login_form.php");
			}else{
				if(is_file($mode.".php")){
					include($mode.".php");
				}else{
					if(http_response_code(404) < 1){
						include("page404.php");	
						die();					
					}else{						
						include("mainpage.php");
					}
				}
			}
		?>
	</div>	
<script>
          var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.style.width='100%';
        // output.style.position = 'relative; top:50%'; 
        // output.style.transform = 'translateY(-50%)';
      };

      function getAmount(qty, cost, div){
      	var tt = qty * cost;
      	document.getElementById(div).value = tt;

      }

</script>
</body>
</html>