<!DOCTYPE html>
<html lang="en">

<body>
<?php
if ( isset( $_POST['user'] ) && isset( $_POST['password'] ) )
{
	$userName = $_POST['user'];
	$password = $_POST['password'];
	$link = mysqli_connect('localhost',"rasty","rasty","inventiolite")
	or die('No se pudo conectar: ' . mysql_error());
	$query = "SELECT COUNT(*) AS usua FROM admin WHERE username='$userName' and pass='$password'";
	$result = mysqli_query($link,$query) or die("Error: ".mysqli_error($link));
	
	while( $fila = $result->fetch_assoc() )
	{
		$count = $fila['usua'];
	}
	
	if ( $count !=0 )
	{
		//si es correcto
		session_destroy();	
		session_start();
		$_SESSION['admin'] = "admin";
		header("Location: subastas.php");
	}else
	{
		?>
		<form action="Index.php" id="formulario">	
	</form>
			<script type="text/javascript">
				alert( "Usuasio o password incorrectos" );
				enviar_formulario();
				function enviar_formulario()
		    	{
					var formulario = document.getElementById( "formulario" );
		    	  	formulario.submit();
		    	} 
			</script>
		<?php
		
	}
}else
{ 
	echo "No paso nada";
			
}
?>
</body>
</html>