<?php

$conexion = new mysqli("localhost","root","","bdformulario");

if($conexion){
    echo"conexion exitosa";
}
else{
    echo"conexion no exitosa";
}

