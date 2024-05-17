<?php

$conn = new mysqli('localhost', 'root', '', 'dbrv');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $broj_sasije = $_POST['broj_sasije'];


    $sql_search = "SELECT * FROM vozilo WHERE broj_sasije = '$broj_sasije'";
    $result_search = $conn->query($sql_search);


    if ($result_search->num_rows > 0) {

        echo "<link rel='stylesheet' type='text/css' href='ispisVozila.css'>";

        echo "<div class='container'>";
        echo "<h2>Podaci o vozilu:</h2>";
        while($row = $result_search->fetch_assoc()) {
            echo "<div class='vehicle-info'>";
            echo "<p><strong>Broj šasije:</strong> " . $row["broj_sasije"] . "</p>";
            echo "<p><strong>Marka:</strong> " . $row["marka"] . "</p>";
            echo "<p><strong>Model:</strong> " . $row["model"] . "</p>";
            echo "<p><strong>Godina proizvodnje:</strong> " . $row["godina_proizvodnje"] . "</p>";
            echo "<p><strong>Registarske oznake:</strong> " . $row["registarske_oznake"] . "</p>";
            echo "<p><strong>Cijena registracije:</strong> " . $row["cijena_registracije"] . "</p>";
            echo "<p><strong>Ime vlasnika:</strong> " . $row["ime_vlasnika"] . "</p>";
            echo "<p><strong>Prezime vlasnika:</strong> " . $row["prezime_vlasnika"] . "</p>";
            echo "<p><strong>JMBG vlasnika:</strong> " . $row["jmbg_vlasnika"] . "</p>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "Vozilo s unesenim brojem šasije nije pronađeno.";
    }
}


$conn->close();
?>
