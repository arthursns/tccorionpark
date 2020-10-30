<?php
 
 //verificando se nao existe a funcao protect
 if(!function_exists("protect")){

  function protect(){
   if(!isset($_SESSION)){
    session_start();
   }

   if(!isset($_SESSION['user']) || !is_numeric($_SESSION['user'])){
    header('Location: loginEstacionamento.php');
   }

  } 

 }


?>