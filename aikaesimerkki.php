<?php
try { 
 $yhteys = new PDO("mysql:host=localhost;dbname=jko", "jko", "kaMA");
 } catch (PDOException $e) { 
 die("VIRHE NRO 1: " . $e->getMessage());
} 

echo "Yhteys on <br>";

$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$yhteys->exec("SET NAMES latin1"); 

$kysely = $yhteys->prepare("SELECT * FROM Ajanvaraukset");
// suoritetaan kysely
$kysely->execute();

// näytetään kyselyn tulokset taulukossa
echo "<table>";
// käsitellään tulostaulun rivit yksi kerrallaan
$rivinro = 1;
while ($rivi = $kysely->fetch()) {
    $pv = htmlspecialchars($rivi["paiva"]);
    $ai = htmlspecialchars($rivi["aika"]);
    $varaaja = htmlspecialchars($rivi["varaaja"]);
    $varausaika = htmlspecialchars($rivi["varausaika"]);


    echo "<tr>";
    echo "<td> $rivinro $pv  $ai  $varaaja  $varausaika </td>";
    $rivinro=$rivinro + 1;
}
?> 
