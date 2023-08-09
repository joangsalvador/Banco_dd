<?php
class usuario {
    private $nome;
    private $senha;

    public function __construct($dados) {
        // Recebe os dados enviados pelo formulário e atribui às propriedades da classe
        $this->nome = $dados['nome'];
        $this->senha = $dados['senha'];
    }

    public function getnome() {
        return $this->nome;
    }

    public function getsenha() {
        return $this->senha;
    }

    public function exibirDados() {
        // Método para exibir os dados coletados do formulário
        echo "nome: " . $this->nome . "<br>";
        echo "senha: " . $this->senha . "<br>";
    }

    public function salvarNoBanco($dados) {
        // Realiza a conexão com o banco de dados
        $conexao = new mysqli('localhost', 'root', '', 'test');

        // Verifica se houve algum erro na conexão
        if ($conexao->connect_error) {
            die("Erro de conexão: " . $conexao->connect_error);
        }

        // Prepara a query SQL para inserir os dados na tabela
        $sql = "INSERT INTO cadastro (Nome, Senha) VALUES ('$this->nome', '$this->senha')";

        // Prepara a declaração da query
        $stmt = $conexao->prepare($sql);

        // Verifica se houve algum erro na preparação da query
        if ($stmt === false) {
            die("Erro na preparação da query: " . $conexao->error);
        }
       
        // Executa a query
        if ($stmt->execute()) {
            echo "Dados salvos com sucesso no banco de dados.";
        } else {
            echo "Erro ao salvar os dados no banco de dados: " . $conexao->error;
        }

        // Fecha a conexão com o banco de dados
        $conexao->close();
    }
}

?>
