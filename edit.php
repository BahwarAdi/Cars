<?php
#region vrbindungDB
$dbHost = 'localhost';
$dbUser = 'root';
$dbPW = '';
$dbName = 'Berger Garage';

$mysqli = new mysqli($dbHost, $dbUser, $dbPW, $dbName);

if ($mysqli === false) {
    die("Fehler: " . $mysqli->connect_error);
}

if ($mysqli->connect_error) {
    die("Fehler: " . $mysqli->connect_error);
}

echo "Erfolgreich Verbunden: " . $mysqli->host_info . "</br>" . "</br>";

#endregion


$Id = $_POST['Id'];

$Marke = false;
if (isset($_POST["Marke"])) {
    $Marke = $_POST["Marke"];
}
$Model = false;
if (isset($_POST['Model'])) {
    $Model = $_POST['Model'];
}
$Jahrgang = false;
if (isset($_POST['Jahrgang'])) {
    $Jahrgang = $_POST['Jahrgang'];
}
$Aufbau = false;
if (isset($_POST['Aufbau'])) {
    $Aufbau = $_POST['Aufbau'];
}
$Treibstoff = false;
if (isset($_POST['Treibstoff'])) {
    $Treibstoff = $_POST['Treibstoff'];
}

//
#regionHINZUFÜGEN
if (($_POST['auswahl'] == 'Hinzufügen')) {

    $mysqli->query("INSERT INTO cars (id,marke,model,jahrgang,aufbau,treibstoff)VALUES('$Id','$Marke','$Model','$Jahrgang','$Aufbau','$Treibstoff')");

    $res = $mysqli->query("SELECT * FROM cars");

    if (isset($res)) {
        echo("<table width= 100% border=1><tr style=font-size:30px ALIGN=CENTER><td>ID</td><td>Marke</td><td>Model</td><td>Jahrgang</td><td>Aufbau</td><td>Treibstoff</td></tr>");

        while ($row = $res->fetch_assoc()) {

            echo('<tr align=center><td>' . $row['id'] . '</td><td>' . $row['marke'] . '</td><td>' . $row['model'] . '</td><td>' . $row['jahrgang'] . '</td><td>' . $row['aufbau'] . '</td><td>' . $row['treibstoff'] . '</td></tr>');

        }
        echo('</table>');
    }


}
#endregion
#regionÄnden
elseif (($_POST['auswahl'] == 'Ändern')) {

    $query = "UPDATE cars SET";
    $hasUpdate = false;
    if ($Marke) {
        $hasUpdate = true;
        $query = $query . " marke = '$Marke',";
    }
    if ($Model) {
        $hasUpdate = true;
        $query = $query . " model = '$Model',";
    }
    if ($Jahrgang) {
        $hasUpdate = true;
        $query = $query . " jahrgang = '$Jahrgang',";
    }
    if ($Aufbau) {
        $hasUpdate = true;
        $query = $query . " aufbau = '$Aufbau',";
    }
    if ($Treibstoff) {
        $hasUpdate = true;
        $query = $query . " treibstoff = '$Treibstoff',";
    }

    if ($hasUpdate) {
        $query = substr($query, 0, -1);
    }

    $query = $query . " WHERE id = '$Id' ";


    if ($hasUpdate) {
        $mysqli->query($query);
    }

    $res = $mysqli->query("SELECT * FROM cars");

    if (isset($res)) {
        echo("<table width= 100% border=1><tr style=font-size:30px ALIGN=CENTER><td>ID</td><td>Marke</td><td>Model</td><td>Jahrgang</td><td>Aufbau</td><td>Treibstoff</td></tr>");

        while ($row = $res->fetch_assoc()) {

            echo('<tr align=center><td>' . $row['id'] . '</td><td>' . $row['marke'] . '</td><td>' . $row['model'] . '</td><td>' . $row['jahrgang'] . '</td><td>' . $row['aufbau'] . '</td><td>' . $row['treibstoff'] . '</td></tr>');

        }

    }


}
#endregion
#regionLöschen
elseif (($_POST['auswahl'] == 'Löschen')) {

    $lo = "DELETE FROM cars WHERE id= ($Id) ";

    if ($mysqli->query($lo) == TRUE) {
        echo('Das Auto Würde Erfolgreich Gelöcht');

        $res = $mysqli->query("SELECT * FROM cars");
        if (isset($res)) {
            echo("<table width= 100% border=1><tr style=font-size:30px ALIGN=CENTER><td>ID</td><td>Marke</td><td>Model</td><td>Jahrgang</td><td>Aufbau</td><td>Treibstoff</td></tr>");

            while ($row = $res->fetch_assoc()) {

                echo('<tr align=center><td>' . $row['id'] . '</td><td>' . $row['marke'] . '</td><td>' . $row['model'] . '</td><td>' . $row['jahrgang'] . '</td><td>' . $row['aufbau'] . '</td><td>' . $row['treibstoff'] . '</td></tr>');

            }
            echo('</table>');
        }


    }
}
#endregion
#regionAbfrage
if (($_POST['auswahl'] == 'Abfrage')) {

    $res = $mysqli->query("SELECT car_dealer.name,car_dealer.ort,cars.marke FROM car_dealer LEFT JOIN cars ON car_dealer.id = cars.c_d_id");
    echo("<table width=100% border=1 ><tr style=font-size:30px ALIGN=CENTER><td>NAME</td><td>ORT</td><td>MARKE</td></tr>");
    if (isset($res)) {
        while ($row = $res->fetch_assoc()) {
            echo('<tr align=center><td>' . $row['name'] . '</td><td>' . $row['ort'] . '</td><td>' . $row['marke'] . '</td></tr>');
        }

    }
    echo('</table>');

}
#endregion
#regionANZEIGEN
elseif (($_POST['auswahl'] == 'Anzeigen')) {
    $res = $mysqli->query("SELECT * FROM cars");

    if (isset($res)) {
        echo("<table width= 100% border=1><tr style=font-size:30px ALIGN=CENTER><td>ID</td><td>Marke</td><td>Model</td><td>Jahrgang</td><td>Aufbau</td><td>Treibstoff</td></tr>");

        while ($row = $res->fetch_assoc()) {

            echo('<tr align=center><td>' . $row['id'] . '</td><td>' . $row['marke'] . '</td><td>' . $row['model'] . '</td><td>' . $row['jahrgang'] . '</td><td>' . $row['aufbau'] . '</td><td>' . $row['treibstoff'] . '</td></tr>');

        }
        echo('</table>');
    }

}
#endregion


