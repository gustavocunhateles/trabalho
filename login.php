<!doctype html>
<html>
<!--Gustavo Cunha Teles-->

<head>
	
	<title>Página Acadêmica</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.10/angular.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
	<link href="css/estilo.css" rel="stylesheet" type="text/css">

	<style>

		.jumbotron{
			position: relative; 
			color: black;
			height: 50%;
			width: 400px;
			text-align: center;
			margin-left: 500px;
			margin-right: 200px;
			margin-top: 100px;
			margin-bottom: 100px;
		}
		
		.interna{
			
			color: black;
			height: 50%;
			width: 200px;
			text-align: center;
			margin-left: auto;
			margin-right: auto;
			margin-top: -30px;
			margin-bottom: 40px;
		}
		
		.interna_op{			
			color: black;
			height: 50%;
			width: 200px;
			text-align: center;
			margin-left: auto;
			margin-right: auto;
			margin-top: 50px;			
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
	
		#login, #matricula, #disciplina, #deferimento, #menu{
			margin-top: 20px;
			margin-bottom: 20px;
		}

	</style>
	
	<script>
		function pedido_matricula(){
			alert("Pedido de matrícula enviado para o coordenador");
		}
	</script>
</head>

<body>


	<legend class="navbar navbar-inverse">
		<nav class="navbar navbar-dark bg-dark">
			Página Acadêmica
		</nav>
	</legend>
	
	<!--Trazendo todas as obras para o usuário saber quais existem-->
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
		$cpf = $_POST['cpf'];
		$senha = $_POST['senha'];
		
		//echo "$cpf";
		//echo "$senha";
		
		//Consulta
		$login = "SELECT * FROM usuario WHERE cpf = '".$cpf."' AND senha = '".$senha."' ";
		$aluno = "SELECT * FROM usuario WHERE cpf = '".$cpf."' AND senha = '".$senha."' AND id_tipo = 1";
		$professor = "SELECT * FROM usuario WHERE cpf = '".$cpf."' AND senha = '".$senha."' AND id_tipo = 2";
		$coordenador = "SELECT * FROM usuario WHERE cpf = '".$cpf."' AND senha = '".$senha."' AND id_tipo = 3";
		
		//$pedido_matricula = "INSERT INTO aluno (pedido_matricula) VALUES ("sim")";
		
		//Transformando numa consulta dentro do banco de dados
		$resultado = mysqli_query($connect,$login);
		$resultado_aluno = mysqli_query($connect,$aluno);
		$resultado_professor = mysqli_query($connect,$professor);
		$resultado_coordenador = mysqli_query($connect,$coordenador);
	
		
		
	?>
	    	
    	<div class="jumbotron">
        	<div class="interna">
			
			<!--Associando cada informação do php com o myqsl-->
			<?php while($res = mysqli_fetch_array($resultado)) { ?>
						
				
				<label>
					Nome
					<br>
					<?php 
						if ($res["nome"] != null && $res["nome"] != ""):
							echo $res["nome"];
						else:
							echo "--";
						endif;
					?>
				</label>
				<br>								
				<label>
					Cpf
					<br>
					<?php 
						if ($res["cpf"] != null && $res["cpf"] != ""):
							echo $res["cpf"];
						else:
							echo "--";
						endif;	
					?>
				</label>
				<br>
				<label>
					Tipo de usuário
					<br>
					<?php  
						if ($res["id_tipo"] == 1):
							echo "Aluno";
					?>
					
					
			        	<button id="matricula" class="btn btn-primary btn-block" type="submit" onclick="pedido_matricula()">
						Pedido de Matrícula 
					</button>
		        			
					
					<?php  	
						elseif ($res["id_tipo"] == 2):
							echo "Professor";
					?>
					
					<a href="disciplina.php">
				        	<button id="disciplina" class="btn btn-primary btn-block" type="submit">
							Disciplinas
						</button>
		        		</a>
					
					<?php 
						elseif ($res["id_tipo"] == 3):
							echo "Coordenador";					
					?>
					
					<a href="deferimento.php">
				        	<button id="deferimento" class="btn btn-primary btn-block" type="submit">
							Deferimento de Matrícula
						</button>
		        		</a>
					
					<?php 
						else:
							echo "--";	
						endif;
					?>
				</label>
			
			<?php } ?>
		</div>				
			
		<div class="interna_op">
			
			<a href="login.html">
		        	<button id="login" class="btn btn-primary btn-block" type="submit">
					Login
				</button>
	        	</a>
	        	
	        	<a href="atualizar.html">
				<button id="atualizar" class="btn btn-primary btn-block" type="submit">
					Atualizar Cadastro
				</button>
			</a>
			
			<a href="index.php">
		            	<button id="menu" class="btn btn-primary btn-block" type="submit">
		            		Menu Principal 
		            	</button>
	            	</a>
		</div>
	</div> 
			
</body>
</html>

