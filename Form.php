<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <style>
        div {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1 {
            text-align: center;
        }

        label {
            display: inline-block;
            text-align: center;
            vertical-align: top;
            width: 100px;
        }


        fieldset {

            display: flex;
            justify-content: center;
            align-items: center;
        }
        select {
            width: 100px;
        }
    </style>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <title>Formular</title>
</head>
<body>
<h1>BERGER GARAGE</h1>
<div>
    <fieldset>
        <form action="edit.php" method="POST">

            <label>ID</label>
            <input type="number" name="Id"></input>
            <br><br>

            <label>Marke</label>
            <input type="text" name="Marke"></input>
            <br>

            <br>
            <label>Model</label>
            <input type="text" name="Model"></input>
            <br>

            <br>
            <label>Jahrgang</label>
            <input type="date" name="Jahrgang"></input>
            <br>
            <br>
            <label>Aufbau</label>
            <select name="Aufbau">
                <option value="Limousine">Limosine</option>
                <option value="Coupe">Coupe</option>
                <option value="Kombie">Kombi</option>
                <option value="SUV">SUV</option>
                <option value="PickUp">PickUp</option>
            </select>
            <br>

            <br>
            <label>Treibstoff</label>
            <select name="Treibstoff">
                <option value="Benzin">Benzin</option>
                <option value="Diesel">Diesel</option>
                <option value="ErdGas">ErdGas</option>
                <option value="Elektro">Elektro</option>
            </select>
            <br>

            <br>
            <input type="submit" name="auswahl" value="Hinzufügen"></input>
            <input type="submit" name="auswahl" value="Ändern"></input>
            <input type="submit" name="auswahl" value="Löschen"></input>
            <input type="submit" name="auswahl" value="Anzeigen"></input>
            <input type="submit" name="auswahl" value="Abfrage"></input>
            <input type="reset" name="Reset"></input>


        </form>

    </fieldset>
</div>
</body>

</html>
