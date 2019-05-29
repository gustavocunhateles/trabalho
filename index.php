<html>
<!--Autor: Gustavo Cunha Teles-->

<head>

	<title>Menu Principal</title>
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
			margin-left: auto;
			margin-right: auto;
			margin-top: 100px;
			margin-bottom: 100px;
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

		.copyright {
		    display: inline-block;
		    padding: 0 1rem 0 1.2rem;
		    color: #39b54a;
		}
	
		#login, #cadastrar, #atualizar , #listar{
			margin-top: 50px;
			margin-bottom: 50px;
		}

	</style>


</head>

<body>

	<legend class="navbar navbar-inverse">
		<nav class="navbar navbar-dark bg-dark">
			Página Acadêmica para Alunos Externos e Especiais    
		</nav>
	</legend>
	  
	<div class="jumbotron" name="op">		    	
		
		<label>Menu Principal</label>
		
		<a href="login.html">
			<button id="login" class="btn btn-primary btn-block" type="submit">
				Login
			</button>
		</a>
			    		
		<a href="cadastro.html">
			<button id="cadastrar" class="btn btn-primary btn-block" type="submit">
				Cadastro
			</button>
		</a>
		
		<a href="listar.php">
			<button id="listar" class="btn btn-primary btn-block" type="submit">
				Listar usuários
			</button>
		</a>
			
	</div>
   

</body>

</html>