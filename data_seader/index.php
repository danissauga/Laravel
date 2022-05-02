<?php
// prisijungtu prie duombazes
// 1000 kartu ivykdys INSERT INTO uzklausa

//primityvus env faila

$database_server = 'localhost';
$database_username = 'root';
$database_password = '';
$database_name = 'duomenubazesvaldymas';

//Prisijungimo kintamasis
$conn = mysqli_connect($database_server, $database_username, $database_password, $database_name );

//jeigu prisijungimas sekmingas - true, jei nesekmingas -false

if(!$conn) {
    die("Failed to connect" . mysqli_connect_error());
}
echo "PRisijungimas sekmingas";

mysqli_set_charset($conn, "utf8");

$vakaras='Vakaras';
$tekstas='Labas $vakaras';
echo "$tekstas";

for ($i = 1;; $i++){
if ($i > 10) {
break;
}
echo $i;
}


$hours = 13;
switch ($hours) {
case ($hours < 12):
echo "Good Morning";break;
case ($hours < 18):
echo "Good Afternoon"; break;
case ($hours < 22):
echo "Good evening"; break;
}


function fillArray() {
    $array = [];
    $i = 0;
    while ($i > 0) {
    $array[] = $i;
    }
    return $i;
    }


    $var = "false";    
if ($var) {
echo "true";
} else {
echo "false";
}

echo something(2);
echo something(3);
function something($number = 1) {
if (1 >= $number) {
return 1;
}
return $number * something($number - 1);
}

if (null == false) {
    echo 'true';
    } else {
    echo 'false';
    }

// for($i=0; $i<1000; $i++) {
//     $name = 'vardas'.$i;
//     $description = 'aprasymas'.$i;
   
//     $sql = "INSERT INTO `clients` (`name`, `description`) VALUES ('$name','$description')";

//     if(!mysqli_query($conn, $sql)) {
//         echo "Kazkas ivyko negerai";
//         echo "<br>";
        
//     }

// } 
?>
<script>
var x=1; 
    var y=2;
      console.log("Atsakymas: "+x+y);
</script>