<?php 
   //    CONECTA CON LA BASE DE DATOS
    $con = mysqli_connect('localhost','root','0000','player') or die("Error de Conexion!".mysqli_error());
    mysqli_query($con,"SET NAMES 'utf8mb4'"); //Para que se inserten las tildes correctamente
  