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
    $ime_vlasnika = $_POST['ime_vlasnika'];
    $prezime_vlasnika = $_POST['prezime_vlasnika'];
    $jmbg_vlasnika = $_POST['jmbg_vlasnika'];
    $mjesto_stanovanja = $_POST['mjesto_stanovanja'];
    $mjesto_rodjenja = $_POST['mjesto_rodjenja'];
    $datum_rodjenja = $_POST['datum_rodjenja'];
    $datum_registracije = $_POST['datum_registracije'];
    $datum_isteka_registracije = $_POST['datum_isteka_registracije'];
    $status_registracije = $_POST['status_registracije'];
    $naziv_vrste_vozila = $_POST['naziv'];
    $opis_vrste_vozila = $_POST['opis'];

    $sql_osoba = "INSERT INTO osoba (ime, prezime, jmbg, mjesto_stanovanja, mjesto_rodjenja, datum_rodjenja)
                  VALUES ('$ime_vlasnika', '$prezime_vlasnika', '$jmbg_vlasnika', '$mjesto_stanovanja', '$mjesto_rodjenja', '$datum_rodjenja')";
   
    if ($conn->query($sql_osoba) === TRUE) {

        $sql_vozilo = "INSERT INTO vozilo (broj_sasije, marka, model, godina_proizvodnje, registarske_oznake, cijena_registracije, jmbg_vlasnika, ime_vlasnika, prezime_vlasnika)
                       VALUES ('$broj_sasije', '$marka', '$model', '$godina_proizvodnje', '$registarske_oznake', '$cijena_registracije', '$jmbg_vlasnika', '$ime_vlasnika', '$prezime_vlasnika')";

        if ($conn->query($sql_vozilo) === TRUE) {

            $sql_registracija = "INSERT INTO registracija (datum_registracije, datum_isteka_registracije, status_registracije, vozilo_broj_sasije)
            VALUES ('$datum_registracije', '$datum_isteka_registracije', '$status_registracije', '$broj_sasije')";

            if ($conn->query($sql_registracija) === TRUE) {

                $sql_vrsta_vozila = "INSERT INTO vrsta_vozila (naziv, opis)
                VALUES ('$naziv_vrste_vozila', '$opis_vrste_vozila')";

                if ($conn->query($sql_vrsta_vozila) === TRUE) {
                    echo "Novo vozilo uspješno dodano.";
                } else {
                    echo "Error: " . $sql_vrsta_vozila . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $sql_registracija . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql_vozilo . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql_osoba . "<br>" . $conn->error;
    }
}


$conn->close();
?>
