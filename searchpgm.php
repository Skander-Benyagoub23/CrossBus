<?php

require "connect.php";
if(isset($_POST["ligne_id"])){
$search=$connection->prepare("SELECT id_pgm_voyage,ligne.depart , ligne.arrive,ligne.duree,`heure_départ`,
`heure_arrivé`,`prix` FROM pgm_voyage INNER JOIN ligne ON pgm_voyage.id_ligne=ligne.id_ligne AND ligne.id_ligne=".$_POST['ligne_id']);
$search->execute();
$datasearch=$search->fetchAll();
if(empty($datasearch)){
    echo "<option name='' value='' >horaire indisponible</option>";
}else{
    foreach($datasearch as $row){
    $idpgm=$row["id_pgm_voyage"];
    $heuredep=$row["heure_départ"];
    $heurearv=$row["heure_arrivé"];
    $durée=$row["duree"];
        echo "<option name='' value='$idpgm'>$heuredep $heurearv</option>";
}
}

}


?>
