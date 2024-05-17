<?php
$conn = new mysqli('localhost', 'root', '', 'dbrv');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $broj_sasije = $_POST['broj_sasije'];

    $sql_delete_registracija = "DELETE FROM registracija WHERE vozilo_broj_sasije = '$broj_sasije'";

    if ($conn->query($sql_delete_registracija) === TRUE) {
        $sql_delete_vozilo = "DELETE FROM vozilo WHERE broj_sasije = '$broj_sasije'";

        if ($conn->query($sql_delete_vozilo) === TRUE) {
            echo "Vozilo je uspješno izbrisano iz sistema.";
        } else {
            echo "Greška prilikom brisanja vozila: " . $conn->error;
        }
    } else {
        echo "Greška prilikom brisanja registracija: " . $conn->error;
    }
}

$conn->close();
?>
