<?php
// classe para indentificação do usuario
class Cliente {
    private $id;
    private $nome;
    private $email;
    private $celular;
    private $cpf;
    private $senha;

 //    
    public function __construct($id, $nome, $email, $celular, $cpf, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->celular = $celular;
        $this->cpf = $cpf;
        $this->senha = $senha;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getCPF() {
        return $this->cpf;
    }

    public function getSenha() {
        return $this->senha;
    }
}

class Usuario extends Cliente {
    private $rg;

    public function __construct($id, $nome, $email, $celular, $cpf, $senha, $rg) {
        parent::__construct($id, $nome, $email, $celular, $cpf, $senha);
        $this->rg = $rg;
    }

    public function getRg() {
        return $this->rg;
    }

    public function salvarnobanco() {
        $conexao = new mysqli('localhost', 'root', '', 'test');
        
        if ($conexao->connect_error) {
        die("erro de conexão: " . $conexao->connect_error);
        
        }
        
        $sql = "INSERT INTO  cadastro (nome, idade) VALUES (?, ?)";
        
        $stmt = $conexao->prepare($sql);
        
        if ($stmt->execute()) {
        echo "dados salvos com sucesso no banco de dados.";
        } else {
        echo "erro ao salvar os dados no banco de dados: " . $conexao->error;
        }
        
        $conexao->close();
        }
        
}

$cliente1 = new Cliente(1, "thiago", "thiagorochac10@gmail.com", "987090441", "123.456.789-01", "Thiago 123");
$usuario1 = new Usuario(2, "ana", "ana@example.com", "987654321", "987.654.321-01", "Ana 123", "25597993044");

echo "Cliente:\n";
echo "ID: " . $cliente1->getId() . "\n";
echo "Nome: " . $cliente1->getNome() . "\n";
echo "Email: " . $cliente1->getEmail() . "\n";
echo "Celular: " . $cliente1->getCelular() . "\n";
echo "CPF: " . $cliente1->getCPF() . "\n";
echo "Senha: " . $cliente1->getSenha() . "\n";

echo "\nUsuário:\n";
echo "ID: " . $usuario1->getId() . "\n";
echo "Nome: " . $usuario1->getNome() . "\n";
echo "Email: " . $usuario1->getEmail() . "\n";
echo "Celular: " . $usuario1->getCelular() . "\n";
echo "CPF: " . $usuario1->getCPF() . "\n";
echo "Senha: " . $usuario1->getSenha() . "\n";
echo "Rg: " . $usuario1->getRg() . "\n";
