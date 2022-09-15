
<form id="a" name="a" method="POST" enctype="multipart/form-data">
           <input id="aa" name="aa" placeholder="ivesk">
           <input id="set" name="set" type="submit" value="Submit">
      </form>           
<?php

$database_server = 'localhost';
$database_username = 'root';
$database_password = '';
$database_name = 'expoacademia_reg';

//Prisijungimo kintamasis
$conn = mysqli_connect($database_server, $database_username, $database_password, $database_name );

//jeigu prisijungimas sekmingas - true, jei nesekmingas -false

if(!$conn) {
    die("Failed to connect" . mysqli_connect_error());
}

mysqli_set_charset($conn, "latin1");

$sql = "SELECT id, pavadinimas, adresas FROM cms_crm_anketos";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  // output data of each row
 
  while($row = $result->fetch_assoc()) {
   // echo "id: " . $row["id"]. ", " . $row["pavadinimas"]. ", " . $row["adresas"]. "<br>";
   $data[] = array(array($row["id"],$row["pavadinimas"],$row["adresas"]));
  
  // echo "id: " . $row["id"]. ", " . $row["pavadinimas"]. ", " . $row["adresas"]. "<br>";
   
   // $sql_update = "UPDATE `cms_crm_anketos_fixed` SET `pavadinimas` = '".$row["pavadinimas"]."', `adresas` = '". $adresas ."' WHERE `id` = ".$row['id'].";";
   // $conn->query($sql_update);
  }

foreach ($data as $key => $value) {
  $sql_update = "UPDATE `cms_crm_anketos_fixed` SET `pavadinimas` = '".$value[0][1]."', `adresas` = '". $value[0][2] ."' WHERE `id` = ".$value[0][0].";";
  $conn->query($sql_update);
  echo '<pre>';
  print_r($sql_update);
  echo '</pre>'; 
}

} else {
  echo "0 results";
}
// if (isset($_POST['set'])) {
//     $sql_insert="INSERT INTO `cms_crm_anketos` (`id`, `data`, `dalyvis`, `parodoje`, `atn_data`, `taisykles`, `position`, `busena`, `rodyk`, `statusas`, `pavadinimas`, `kodas`, `pvm`, `adresas`, `email`, `tel`, `vadovas`, `vadovas_tel`, `www`, `vardas`, `pavarde`, `email2`, `mob_tel`, `im_ba_kod`, `im_ba_pav`, `im_ba_sas`, `logo`, `pastaba`, `kl_kodas`, `noriu`, `contract_person`, `type`) VALUES (NULL, '2022-05-23', '0', '', '2022-05-23', '0', '', '0', '1', '0', '".$_POST['aa']."', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '', '0')";
//     $conn->query($sql_insert);
// }
/* echo '<pre>';
print_r($data);
echo '</pre>'; */

$conn->close();