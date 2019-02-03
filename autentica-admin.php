<?php

include "conexao.php";

if(isset($_POST['email-entrar_admin']) && isset($_POST['senha-entrar_admin'])){
	$email = trim(htmlspecialchars($_POST['email-entrar_admin']));
  	$senha = trim(htmlspecialchars($_POST['senha-entrar_admin']));
	$verifica = 'select nome, email, senha from administrador where email = ? AND senha = ?';
	$prepare = $banco->prepare($verifica);
	$prepare->bind_param("ss", $email, $senha);
	$prepare->bind_result($nomeB, $emailB, $senhaB);
	$prepare->execute();
	$prepare->store_result();
	$prepare->fetch();

	if($email == $emailB && $senha == $senhaB){
		session_start();
		$_SESSION['email_admin'] = $emailB;
		$_SESSION['senha_admin'] = $senhaB;
		$_SESSION['nome_admin'] = $nomeB;
		
		header("Location: painel-admin.php");
	}else{
		echo "<script type=\"text/javascript\">
				alert(\"Você não está cadastrado!\");
			</script>";
  		header("Location: login-admin.php");
	}
}else{
	echo "<script type=\"text/javascript\">
			alert(\"Preencha todos os campos!\");
		</script>";
  	header("Location: login-admin.php");
}


?>
