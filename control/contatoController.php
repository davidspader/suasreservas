<?php
session_start();
include_once '../model/Contato.php';

echo $nome = $_POST['nome'];
echo $email = $_POST['email'];
echo $assunto = $_POST['assunto'];
echo $mensagem = $_POST['mensagem'];

$contato = new Contato($nome,$email,$assunto,$mensagem);
$contato->salvarContato($contato);

$_SESSION['feedback'] = "Mensagem enviada com sucesso!";
header("Location: ../index.php#contato");