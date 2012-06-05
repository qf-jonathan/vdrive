<html>
	<head>
		<title>La pagina no existe</title>
	</head>
	<style type="text/css">
		body{
			background: #abbec9;
		}
		#contenedor{
			margin-top: 80px;
			text-align: center;
			background: white;
			border: 1px dotted #29739c;
			padding: 20px;
			font-size: 15px;
			font-family: Arial;
			width: 500px;
			margin-left: auto ;
			margin-right: auto ;
		}
	</style>
	<body>
		<div id="contenedor">
			<h1>Error de base de datos</h1>
			<p>Error Nro: <?php echo $numero ?></p>
			<p>Mensage: <?php echo $mensage ?></p>
		</div>
	</body>
</html>