<?php
//musim udelat zaklady funkci do php, ale nemam jeste jak se napojit na ofiko databázi protože
// ještě ani server na kterém budeme naši stránku mít

/*
nejdříve připojit databázi a udělat to tak aby nemohl být sql inject
potom jsou potřeba skripta na:
--
1.login, register (dodělané?)
--
2.přidávání her a odebíraní her (admin bude moct vytvořit, user bude moct poslat návrh na hru)
admin už může vytvářet i odebírat hry, je potřeba ještě dát ověření permisí ale jinak to funguje
--
3.přidávání postů (hádám že asi rozdílně pro uživatele a adminy) 
a potom odebíraní postů (taktéž rozděleno), k tomuto i bude navázáno report, kdy bude i informace o tom jaky požadavek to je
--
4.skripta na přidání liku a jeho odebrání pokud si to třeba uživatel rozmyslí, to bude muset být vytvořeno na samotném serveru, 
protože kdyby se to stalo u klienta, mohlo by se stát že někdo jiný už dá v tu chvíli like, a tudíž se ty data ztratí
*/

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
  return $data; 
  }

  // $db_site = "md202.wedos.net";
  // $db_user = "a93646_wrubel";
  // $db_password = "tmxPsqW2";
  // $db_name = "d93646_wrubel";

  $db_site = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "fashion_in_games";

$con = mysqli_connect($db_site, $db_user, $db_password, $db_name);

if(!$con){
    echo "Spojení se nezdařilo.";
}
?>