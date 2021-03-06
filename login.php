<?php

  session_start();

  if (isset($_SESSION['email'])) {
    header("Location: acesse-conta.php");
  }

?>

<!DOCTYPE html>
<html>
<head>

	<title>Faça Login - Eridanus</title>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

 ?>

<div class="row div-principal-login">

  <h3 class=" teat-text titulo-pagina flow-text"> Acesse a sua Conta! </h3>

  <div class="col m1 l2"></div>

    <form class="col s12 m9 l8" action="autentica.php" method="post">

      <div class="row">
    	 <div class="input-field col s12">
          <input id="email-entrar"
            <?php
              if(isset($_GET['email'])){
                $e = $_GET['email'];
                echo "value='$e'";
              }
            ?>
            name="email-entrar" type="email" class="validate">
          <label for="email">E-mail:</label>
        </div>
    </div>

    <div class="row">
    	<div class="input-field col s12">
          <input id="senha-entrar" name="senha-entrar" type="password" class="validate">
          <label for="password">Senha:</label>
					<p class="erro"
            <?php
              if(isset($_GET['erro'])){
                echo" style='display: inline;'>";
                if($_GET['erro'] == 1){
                  echo "email e/ou senha incorreto(s)!";
                }else if($_GET['erro'] == 2){
                  echo "Por favor preencha os dados!";
                }
              }else{
                echo">";
              }
              ?>
            </p>
        </div>
    </div>
  <div class="margem-esqueci-senha">
    <span>
      <a href="esqueci-senha.php" class="estilo-texto-esqueci-senha"> Esqueci minha senha... </a>
    </span>  
  </div>
	<button class="btn light-green accent-4" type="submit" name="action"> Entrar <i class="material-icons right">chevron_right</i> </button>

  <a class="btn light-green accent-4" href="cadastre-se.php"> Fazer Cadastro <i class="material-icons right">assignment_ind</i> </a>

  </form>

  <div class="col m1 l2"></div>

</div>

<?php

	include "rodape.php";

?>

</body>
</html>
