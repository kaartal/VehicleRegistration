<?php

$conn = new mysqli('localhost', 'root', '', 'dbrv');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $broj_sasije = $_POST['broj_sasije'];
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $godina_proizvodnje = $_POST['godina_proizvodnje'];
    $registarske_oznake = $_POST['registarske_oznake'];
    $cijena_registracije = $_POST['cijena_registracije'];
    $tip_vozila = $_POST['tip_vozila'];
    $ime_prezime_vlasnika = $_POST['ime_prezime_vlasnika'];
    $jmbg_vlasnika = $_POST['jmbg_vlasnika'];
    $mjesto_stanovanja = $_POST['mjesto_stanovanja'];
    $mjesto_rodjenja = $_POST['mjesto_rodjenja'];
    $datum_rodjenja = $_POST['datum_rodjenja'];


    $sql_osoba = "INSERT INTO osoba (ime, prezime, jmbg, mjesto_stanovanja, mjesto_rodjenja, datum_rodjenja)
                  VALUES ('$ime_prezime_vlasnika', '$jmbg_vlasnika', '$mjesto_stanovanja', '$mjesto_rodjenja', '$datum_rodjenja')";

    if ($conn->query($sql_osoba) === TRUE) {

        $sql_vozilo = "INSERT INTO vozilo (broj_sasije, marka, model, godina_proizvodnje, registarske_oznake, cijena_registracije, tip_vozila, jmbg_vlasnika)
                       VALUES ('$broj_sasije', '$marka', '$model', '$godina_proizvodnje', '$registarske_oznake', '$cijena_registracije', '$tip_vozila', '$jmbg_vlasnika')";

        if ($conn->query($sql_vozilo) === TRUE) {
            echo "Novo vozilo uspješno dodano.";
        } else {
            echo "Error: " . $sql_vozilo . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql_osoba . "<br>" . $conn->error;
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos novog vozila</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Unos novog vozila</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="broj_sasije">Broj šasije:</label>
            <input type="text" id="broj_sasije" name="broj_sasije" required><br>
            <label for="marka">Marka:</label>
            <input type="text" id="marka" name="marka" required><br>
            <label for="model">Model:</label>
            <input type="text" id="model" name="model" required><br>
            <label for="godina_proizvodnje">Godina proizvodnje:</label>
            <input type="number" id="godina_proizvodnje" name="godina_proizvodnje" required><br>
            <label for="registarske_oznake">Registarske oznake:</label>
            <input type="text" id="registarske_oznake" name="registarske_oznake" required><br>
            <label for="cijena_registracije">Cijena registracije:</label>
            <input type="number" id="cijena_registracije" name="cijena_registracije" required><br>
            <label for="tip_vozila">Tip vozila:</label>
            <input type="text" id="tip_vozila" name="tip_vozila" required><br>
            <label for="ime_prezime_vlasnika">Ime i prezime vlasnika:</label>
            <input type="text" id="ime_prezime_vlasnika" name="ime_prezime_vlasnika" required><br>
            <label for="jmbg_vlasnika">JMBG vlasnika:</label>
            <input type="text" id="jmbg_vlasnika" name="jmbg_vlasnika" required><br>
            <label for="mjesto_stanovanja">Mjesto stanovanja:</label>
            <input type="text" id="mjesto_stanovanja" name="mjesto_stanovanja" required><br>
            <label for="mjesto_rodjenja">Mjesto rođenja:</label>
            <input type="text" id="mjesto_rodjenja" name="mjesto_rodjenja" required><br>
            <label for="datum_rodjenja">Datum rođenja:</label>
            <input type="date" id="datum_rodjenja" name="datum_rodjenja" required><br>
            <button type="submit">Dodaj vozilo</button>
        </form>
    </div>
</body>
</html>
