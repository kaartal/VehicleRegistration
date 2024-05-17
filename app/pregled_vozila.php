<?php

$conn = new mysqli('localhost', 'root', '', 'dbrv');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $broj_sasije = $_POST['broj_sasije'];


    $sql = "SELECT * FROM vozilo WHERE broj_sasije = '$broj_sasije'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo "<h2>Podaci o vozilu:</h2>";
            echo "<p>Broj šasije: " . $row["broj_sasije"]. "</p>";
            echo "<p>Marka: " . $row["marka"]. "</p>";
            echo "<p>Model: " . $row["model"]. "</p>";
            echo "<p>Godina proizvodnje: " . $row["godina_proizvodnje"]. "</p>";
            echo "<p>Registarske oznake: " . $row["registarske_oznake"]. "</p>";
            echo "<p>Cijena registracije: " . $row["cijena_registracije"]. "</p>";
            echo "<p>JMBG vlasnika: " . $row["jmbg_vlasnika"]. "</p>";
            echo "<p>Ime vlasnika: " . $row["ime_vlasnika"]. "</p>";
            echo "<p>Prezime vlasnika: " . $row["prezime_vlasnika"]. "</p>";
        }
    } else {
        echo "Nema podataka o vozilu s unesenim brojem šasije.";
    }}



$conn->close();
?>
