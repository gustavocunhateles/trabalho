<!doctype html>
<html>
<!--Autor: Gustavo Cunha Teles-->

<head>

	<title>Ministrar disciplinas</title>
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
	
		#ministrar, #recusar, #login ,#menu, #lista{
			margin-top: 20px;
			margin-bottom: 20px;
					
		}

	</style>
	
	<script>
		$(document).ready(function() {
	    		$('#lista').DataTable();
		} );
		
		function ministrar(){
		
		   var all = false;		   
	           
	           //Se algum registro estiver marcado, all recebe true
	           $('.selecionar').each(function(){
	               if(this.checked == true){ all = true; }	              	               
	           })
	           
	           //Se nenhum checkbox estiver selecionado, retorna a mensagem
	           if (!all)
	           {
	               alert("Selecione alguma disciplina");
	           }
	           
	           else{
	           	
	           	$('.selecionar').each(function(){
			               
				if(this.checked == true){
				           	
					do {var nome  = prompt ("Nome completo do docente: ");} while (nome == null || nome == "");
			                
			                var id_disciplina = document.getElementById("id_disciplina").innerText;
		   			var des_disciplina = document.getElementById("des_disciplina").innerText;
			                
			                alert("Esta disciplina será ministrada por " +nome);
		               }
	           	})
	           	
	           }
		}
		
		$('#lista tbody td').live('click', function(){
			var tr = $(this).parents('tr')[0];
			var dados = oTable.fnGetData(tr);
			alert(dados[0]);
		});
		
		function recusar(){
		   
		   var all = false;
	           
	           //Se algum registro estiver marcado, all recebe true
	           $('.selecionar').
	           each(function(){
	               if(this.checked == true){
	                all = true;	               	
	               }
	           })
	           
	           //Se nenhum checkbox estiver selecionado, retorna a mensagem
	           if (!all)
	           {
	               alert("Selecione alguma disciplina");
	           }
	           
	           else{
	           
	           	alert("Disciplina(s) recusada(s)");
	           }
		}
		
	</script>
	
</head>


<body>

	<legend class="navbar navbar-inverse">
		<nav class="navbar navbar-dark bg-dark">
			Ministrar disciplinas
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
		$disciplina = "SELECT * FROM disciplina";
		
		//Transformando numa consulta dentro do banco de dados
		$resultado = mysqli_query($connect,$disciplina);	
		
		$id_disciplina_js = "<script>document.write(id_disciplina)</script>";
		$des_disciplina_js = "<script>document.write(des_disciplina)</script>";
		$docente_disciplina_js = "<script>document.write(nome)</script>";	
  					
	?>
 	
 	
	<table id="lista" name="lista" class="table table-striped table-bordered" style="width:100%">
	        
	       
	        
	        <!--Cabeçalho com as colunas-->
	        <thead>
	            <tr>
		                <th>Código da disciplina</th>
		                <th>Nome da disciplina</th>
		                <!--<th>Docente</th> -->       
		                <th>Selecionar</th>
	            </tr>
	        </thead>
	        
	        <tbody class="tbody">
			
		       	<!--Associando cada informação do php com o myqsl-->
			<?php while($res = mysqli_fetch_array($resultado)) { ?>
		
			<tr>	
				<!--id_disciplina-->
				<td id="id_disciplina" name="id_disciplina">
					
					<?php 
						if ($res["id_disciplina"] != null && $res["id_disciplina"] != ""):
							echo $res["id_disciplina"];
							$id = $res["id_disciplina"];
						else:
							echo "--";
						endif;
					?>
					
				</td>
				
				<!--des_disciplina-->
				<td id="des_disciplina" name="des_disciplina">
					<?php 
						if ($res["des_disciplina"] != null && $res["des_disciplina"] != ""):
							echo $res["des_disciplina"];
							$des = $res["des_disciplina"];
							
					?>
					
					<div value="<?php $des ?>">
					</div>
					<?php
						else:
							echo "--";
						endif;	
					?>
				</td>		
				
				<!--docente_disciplina
				<td id="docente_disciplina" name="docente_disciplina">
					<?php 
						if ($res["docente_disciplina"] != null && $res["docente_disciplina"] != ""):
							echo $res["docente_disciplina"];
						else:
							echo "--";
						endif;	
					?>
				</td>			
				-->		
						
				<!--Selecionar-->
				<td>
					<input id="selecionar" name="selecionar" type="checkbox" class="selecionar">		
				</td>
			</tr>		
		
			<?php } ?>
			
		
	        	
	        </tbody>

	</table>


	<!--
	<button id="salvar" class="btn btn-primary btn-block" type="submit">
    		Salvar
    	</button>
	
	
    	<button id="recusar" class="btn btn-primary btn-block" onclick="recusar()" type="submit">
    		Recusar
    	</button>
	-->

	


	
	<button id="ministrar" class="btn btn-primary btn-block" onclick="ministrar()">
		Ministrar
	</button>
	
	<a href="login.html">
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