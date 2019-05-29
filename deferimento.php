<!doctype html>
<html>
<!--Autor: Gustavo Cunha Teles-->

<head>

	<title>Pedidos de deferimento</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"/>

	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/>	
	
	<style>

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
	
		#deferir, #indeferir, #login, #menu, #lista{
			margin-top: 20px;
			margin-bottom: 20px;
					
		}

	</style>
	
	<script>
		$(document).ready(function() {
	    		$('#lista').DataTable();
		} );
		
		function deferir(){
		
		   var all = false;		   
	           
	           //Se algum registro estiver marcado, all recebe true
	           $('.selecionar').each(function(){
	               if(this.checked == true){ all = true; }	              	               
	           })
	           
	           //Se nenhum checkbox estiver selecionado, retorna a mensagem
	           if (!all)
	           {
	               alert("Selecione algum pedido de matrícula");
	           }
	           
	           else{
	           	
	           	$('.selecionar').each(function(){
			               
				if(this.checked == true){
				           	
					//do {var nome  = prompt ("Nome completo do docente: ");} while (nome == null || nome == "");
			                alert("Este pedido de matrícula está deferido");
		               }
	           	})
	           	
	           }
		}
		
		function indeferir(){
		
		   var all = false;		   
	           
	           //Se algum registro estiver marcado, all recebe true
	           $('.selecionar').each(function(){
	               if(this.checked == true){ all = true; }	              	               
	           })
	           
	           //Se nenhum checkbox estiver selecionado, retorna a mensagem
	           if (!all)
	           {
	               alert("Selecione algum pedido de matrícula");
	           }
	           
	           else{
	           	
	           	$('.selecionar').each(function(){
			               
				if(this.checked == true){
				           	
					//do {var nome  = prompt ("Nome completo do docente: ");} while (nome == null || nome == "");
			                alert("Este pedido de matrícula está indeferido");
		               }
	           	})
	           	
	           }
		}
		
	</script>
	
</head>


<body>

	<legend class="navbar navbar-inverse">
		<nav class="navbar navbar-dark bg-dark">
			Pedidos de deferimento de matrícula
		</nav>
	</legend>

	<!--Trazendo todos os alunos externos e especiais existentes-->
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
		
		//Consulta
		$lista = "SELECT * FROM usuario WHERE id_tipo=1";
		
		//Transformando numa consulta dentro do banco de dados
		$resultado = mysqli_query($connect,$lista);
		
	?>

	<table id="lista" class="table table-striped table-bordered" style="width:100%">
	        
	        <!--Cabeçalho com as colunas-->
	        <thead>
	            <tr>
		                <th>Nome</th>
		                <th>Cpf</th>
		                <th>Tipo de Usuário</th>
		                <th>Selecionar</th>
	            </tr>
	        </thead>
	        
	        <tbody>
			
		       	<!--Associando cada informação do php com o myqsl-->
			<?php while($res = mysqli_fetch_array($resultado)) { ?>
		
			<tr>	
				<!--Nome-->
				<td>
					<?php 
						if ($res["nome"] != null && $res["nome"] != ""):
							echo $res["nome"];
						else:
							echo "--";
						endif;
					?>
				</td>
				
				<!--Cpf-->
				<td>
					<?php 
						if ($res["cpf"] != null && $res["cpf"] != ""):
							echo $res["cpf"];
						else:
							echo "--";
						endif;	
					?>
				</td>				
				
				<!--Tipo-->
				<td>
					<?php  
						if ($res["id_tipo"] == 1):
							echo "Aluno";
						elseif ($res["id_tipo"] == 2):
							echo "Professor";
						elseif ($res["id_tipo"] == 3):
							echo "Coordenador";
						else:
							echo "--";	
						endif;
					?>
				</td>
				
				<!--Selecionar-->
				<td>
					<input type="checkbox" class="selecionar">
				</td>
			</tr>
		
			<?php } ?>
	        	
	        </tbody>

	</table>

    	<button id="deferir" class="btn btn-primary btn-block" onclick="deferir()" type="submit">
    		Deferir 
    	</button>

    	<button id="indeferir" class="btn btn-primary btn-block" onclick="indeferir()" type="submit">
    		Indeferir 
    	</button>
    	
    	<a href="login.html" alt="_blank">
            	<button id="login" class="btn btn-primary btn-block" type="submit">
            		Login
            	</button>
    	</a>
	
	<a href="index.php">
            	<button id="menu" class="btn btn-primary btn-block" type="submit">
            		Menu Principal 
            	</button>
    	</a>
		

			
</body>
</html>