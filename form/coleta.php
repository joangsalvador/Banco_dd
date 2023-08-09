<?php

include "usuario_senha.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $usuario = new Usuario($_POST);

    
    $nome = $usuario->getnome();
    $senha = $usuario->getsenha();

    
    $usuario->exibirDados();
}
