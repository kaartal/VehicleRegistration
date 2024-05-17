<?php
$conn = new mysqli('localhost', 'root', '', 'dbrv');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $broj_sasije = $_POST['broj_sasije'] ?? '';

    $sql_check = "SELECT * FROM vozilo WHERE broj_sasije = '$broj_sasije'";
    $result_check = $conn->query($sql_check);

    if ($result_check && $result_check->num_rows > 0) {
        echo "<h2>Izmjena informacija o vozilu</h2>";
        echo "<form action='izmjena_vozila.php' method='POST'>";
        while($row = $result_check->fetch_assoc()) {
            echo "<label for='ime_vlasnika'>Ime vlasnika:</label>";
            echo "<input type='text' id='ime_vlasnika' name='ime_vlasnika' value='" . ($row["ime_prezime_vlasnika"] ?? '') . "'><br>";
            echo "<label for='prezime_vlasnika'>Prezime vlasnika:</label>";
            echo "<input type='text' id='prezime_vlasnika' name='prezime_vlasnika' value='" . ($row["prezime_vlasnika"] ?? '') . "'><br>";
            echo "<label for='jmbg_vlasnika'>JMBG vlasnika:</label>";
            echo "<input type='text' id='jmbg_vlasnika' name='jmbg_vlasnika' value='" . ($row["jmbg_vlasnika"] ?? '') . "'><br>";
            echo "<label for='mjesto_stanovanja'>Mjesto stanovanja:</label>";
            echo "<input type='text' id='mjesto_stanovanja' name='mjesto_stanovanja' value='" . ($row["mjesto_stanovanja"] ?? '') . "'><br>";
            echo "<label for='mjesto_rodjenja'>Mjesto rođenja:</label>";
            echo "<input type='text' id='mjesto_rodjenja' name='mjesto_rodjenja' value='" . ($row["mjesto_rodjenja"] ?? '') . "'><br>";
                echo "<label for='datum_rodjenja'>Datum rođenja:</label>";
                echo "<input type='date' id='datum_rodjenja' name='datum_rodjenja' value='" . ($row["datum_rodjenja"] ?? '') . "'><br>";
        }
        echo "<button type='submit'>Izmijeni informacije</button>";
        echo "</form>";
    } else {
        echo "Vozilo s unesenim brojem šasije nije pronađeno.";
    }
}

$conn->close();
?>
