<!DOCTYPE html>
<html lang="en">
<head>
<body>
<?php
session_start();
unset( $_SESSION["admin"] );
?>
	<form action="../Index.php" id="formulario"></form>
	<label>Será redirigido automaticamente en 5 segundos</label>
	<script type="text/javascript">
			var contador = 0;
			temporizador();
			
			function temporizador()
			{
				intervalo = setInterval(function()
				{ 
					if ( contador == 5 )
					{
						enviar_formulario();
					}else
						contador++;		
				},1000);
			}

			function enviar_formulario()
	    	{
				var formulario = document.getElementById( "formulario" );
	    	  	formulario.submit();
	    	} 
		</script>
</body>
</html>