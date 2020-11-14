<?php
session_start();
if(isset($_SESSION["id_usuario"])){ 
}else{
    header ("location: index.php");
}
?>