<?php
 echo $_POST["title"]; 
 echo $_POST["text"]; 
 echo $_POST["cardSet"];
 
 echo "<br>";

 echo "<img src='".$_POST["obrazek"]."'>"; 
 file_put_contents("../../public/usrimg/kokos.jpeg",file_get_contents($_POST["obrazek"]));
 ?>