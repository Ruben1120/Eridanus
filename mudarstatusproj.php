<?php
  session_start();
  if(!isset($_SESSION['email_admin']) && !isset($_SESSION['senha_admin'])){
    header("Location: login.php");
  }
  include "conexao.php";
  $id_proj = $_SESSION[$_POST["data"]];
  $status = $_POST["status"];
  $consulta = "update projeto set status_atual = ? where codigo = ?";
  $prepare = $banco->prepare($consulta);
  $prepare->bind_param("si", $status, $id_proj);
  $prepare->execute();
?>