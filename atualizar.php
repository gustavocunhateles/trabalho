<!doctype html>
<html>
<!--Autor: Gustavo Cunha Teles-->


<head>

	<title>Atualizar cadastro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.10/angular.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
	<link href="css/estilo.css" rel="stylesheet" type="text/css">

	<style>

		.jumbotron{
			position: relative; 
			color: black;
			height: 400px;
			width: 400px;
			text-align: center;
			margin-left: 500px;
			margin-right: 200px;
			margin-top: 100px;
			margin-bottom: 100px;
		}
		
		.interna{
			
			color: black;
			height: 200px;
			width: 200px;
			text-align: center;
			margin-left: 100px;
			margin-right: 50px;
			margin-top: -30px;
			margin-bottom: 40px;
		}

		#titulo{
			color: #39b54a;;
			margin-bottom: 60px;
		}

		legend {    
		     text-align: center;	
		     color: #39b54a;
		     margin-top:0px;
		     margin-right:auto;
		     margin-left:auto;
		     margin-bottom:0px;
	     	}

		.navbar{
		     margin-top:0px;
		     margin-right:auto;
		     margin-left:auto;
		     margin-bottom:0px;
		}

		.footer-bottom {
		    margin-top: 5.8rem;
		    text-align: center;
		    font-size: 14px;
		    padding-bottom: 0.6rem;
		}

		label, input, .id_tipo {
		    text-align: center;
		    display: inline-block;
		    padding: 0 1rem 0 1.2rem;
		    color: #39b54a;
		}
	
		#atualizar, #menu{
			margin-top: 20px;
			margin-bottom: 20px;
		}

	</style>
</head>

<body>

	<legend class="navbar navbar-inverse">
		<nav class="navbar navbar-dark bg-dark">
			Atualizar cadastro
		</nav>
	</legend>

	<?php 

		//Dados para conexão
		$servidor = "br900";
		$usuario = "valuexpc_root";
		$senha = "value";
		$dbname = "valuexpc_test";
		
		//Criar a conexao
		$connect = mysqli_connect($servidor, $usuario, $senha, $dbname);
		
		//Erro
		if(mysqli_connect_error()):
			echo "Falha na conexao: ".mysqli_connect_error();
		endif;
		
	    	//Captura os valores 
		extract($_POST);
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$senha = $_POST['senha'];
		$id_tipo = $_POST['id_tipo'];
		
		//Consulta de inserção com concatenação de '" e "' para todos os campos poderem ser lidos como strings
		$sql = 	"UPDATE usuario 
			SET 
				nome = '".$nome."', 
				cpf = '".$cpf."', 
				senha = '".$senha."', 
				id_tipo = '".$id_tipo."'
			WHERE
				cpf = '".$cpf."'
				AND senha = '".$senha."'
			";
			
		$sql2 = "UPDATE tipo_usuario 
			SET 
				id_tipo = '".$id_tipo."', 
				tipo =  
				CASE 
					WHEN '".$id_tipo."' = 1 THEN 'Aluno' 
					WHEN '".$id_tipo."' = 2 THEN 'Professor' 
					WHEN '".$id_tipo."' = 3 THEN 'Coordenador' 
				END,
				cpf = '".$cpf."'
			";
	
	        if ( ($connect->query($sql) === TRUE) && ($connect->query($sql2) === TRUE)):	
	        
	?>      
        	<div class="jumbotron">
            		            		
	        	<?php echo "Cadastrado atualizado com sucesso!"; ?>
	        	
	        	<br><br>
	        	
	        	<a href="login.html">
		        	<button id="cadastrar" class="btn btn-primary btn-block" type="submit">
					Login
				</button>
	        	</a>
	        	
	        	<a href="index.php">
		            	<button id="menu" class="btn btn-primary btn-block" type="submit">
		            		Menu Principal 
		            	</button>
	            	</a>	
	        </div>

	<?php	else: ?>
	
		<div class="jumbotron">
	
	        	<?php echo "Erro na atualização do cadastro."; ?>
	        	<br>
	        	<!--
	        	<?php echo "Consulta: <br>". $sql . "<br><br>Erro: <br>" . $connect->error; ?>
	        	-->
	        	<br><br>
	        	
	        	<a href="atualizar.html">
		        	<button id="cadastrar" class="btn btn-primary btn-block" type="submit">
					Atualizar cadastro
				</button>
	        	</a>
	       		
	       		<a href="index.php">
		            	<button id="menu" class="btn btn-primary btn-block" type="submit">
		            		Menu Principal 
		            	</button>
	            	</a>
	        </div>
    		
	<?php	endif;?>

 
</body>

</html>


