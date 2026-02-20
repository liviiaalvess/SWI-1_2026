<?php
   $nome = "Livia";
   $idade = 15;
   $altura = 1.61;
   $status = false;


   //exibir falores na tela
   echo "O nome é: $nome"; //1° forma
   echo "<br>";
   echo "O nome é: " . $nome; //2° forma
   echo "<br>";
   echo $nome;

   //VERIFICAR TIPO E VALOR DE UMA VARIAVEL
   var_dump($altura);
   echo "<br>";
   print_r($altura);
   echo "<br>";


   //CURIOSIDADES PHP
   echo "O status é: $status";



?>