<?php  


/*Observações:
abstract class X, significa que X não tem objetos instanciados, isto é, posssui apenas métodos
final class Y, significa que Y não tem classes filhas, isto é, é um nó na árvore das classes
protected: Atributos podem ser usados dentro desta classe ou de classes filhas
private: Atributos podem ser usados apenas dentro desta classe 
public: Atributos podem ser usados dentro de qualquer classe 
*/

//Definição de classe com herança
class Coordenador extends Professor{

	
	//Construtor da classe
	public function __construct($cpf, $matricula, $nome, $acesso){
		parent::__construct($cpf, $matricula, $nome);
		$this->acesso = $acesso;
	}

	//Gets com polimorfismo
	public function getCpf(){ 
		return "O coordenador {$this->nome} possui o cpf {$this->cpf}.";
	}
	public function getMatricula(){
		return "O coordenador {$this->nome} possui a matrícula {$this->matricula}.";
	}
	public function getNome(){
		return "Existe um coordenador cadastrado no sistema chamado {$this->nome}.";
	}
	
	public function getAcesso(){
		return "O coordenador {$this->nome} possui um acesso de {$this->acesso}.";
	}

}


//TESTES

//Criando um novo professor através do construtor usando atributos como parâmetros de entrada
$coord = new Coordenador ('00155200344', 119, 'John', 'Administrador');

//Mostrando o conteúdo do objeto recém criado
//var_dump($prof);

//Mostrando os valores de cada atributo isoladamente
echo " Coordenadores: <br/> " .$coord->getCpf() ." <br/> " .$coord->getMatricula() ." <br/> " .$coord->getNome() ." <br/> " .$coord->getAcesso() ." <br/><br/> ";



//Definição de classe
class Professor{

	//Atributos podem ser usados dentro desta classe ou de classes filhas
	protected $cpf;
	protected $matricula;
	protected $nome;

	//Construtor da classe
	public function __construct($cpf, $matricula, $nome){
		$this->cpf = $cpf;
		$this->matricula = $matricula;
		$this->nome = $nome;
	}
	
	//Gets
	public function getCpf(){ 
		return "O professor {$this->nome} possui o cpf {$this->cpf}.";
	}
	public function getMatricula(){
		return "O professor {$this->nome} possui a matrícula {$this->matricula}.";
	}
	public function getNome(){
		return "Existe um professor cadastrado no sistema chamado {$this->nome}.";
	}
	
	//Sets
	public function setCpf($valor){$this->cpf = $valor;}	
	public function setMatricula($valor){$this->matricula = $valor;}
	public function setNome($valor){$this->nome = $valor;}

}

//TESTES

//Criando um novo professor através do construtor usando atributos como parâmetros de entrada
$prof = new Professor('00100200344', 111, 'João');

//Mostrando o conteúdo do objeto recém criado
//var_dump($prof);

//Mostrando os valores de cada atributo isoladamente
echo " Professores: <br/> " .$prof->getCpf() ." <br/> " .$prof->getMatricula() ." <br/> " .$prof->getNome() ." <br/><br/> ";

//Definição de classe
class Aluno{
	
	//Atributos podem ser usados dentro desta classe ou de classes filhas
	protected $cpf;
	protected $matricula;
	protected $nome;
	
	//Construtor da classe
	public function __construct($cpf, $matricula, $nome){
		$this->cpf = $cpf;
		$this->matricula = $matricula;
		$this->nome = $nome;
	}
	
	//Gets
	public function getCpf(){ 
		return "O aluno {$this->nome} possui o cpf {$this->cpf}.";
	}
	public function getMatricula(){
		return "O aluno {$this->nome} possui a matrícula {$this->matricula}.";
	}
	public function getNome(){
		return "Existe um aluno cadastrado no sistema chamado {$this->nome}.";
	}
	
	//Sets
	public function setCpf($valor){$this->cpf = $valor;}	
	public function setMatricula($valor){$this->matricula = $valor;}
	public function setNome($valor){$this->nome = $valor;}
}

//TESTES

//Criando um novo aluno com atributos passados como parâmetros para o construtor da classe
$aluno = new Aluno('05382210381', 123, 'José');

//Mostrando o conteúdo do objeto recém criado
//var_dump($aluno);

//Mostrando os valores de cada atributo isoladamente
echo " Alunos: <br/> " .$aluno->getCpf() ." <br/> " .$aluno->getMatricula() ." <br/> " .$aluno->getNome() ." <br/><br/>";

?>
