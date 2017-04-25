<?php

/*$verbindung = mysqli_connect("localhost")
    or die("Fehler im System");

$dbname = mysqli_select_db("", "TODO_APP")
    or die("Verbindung zur DB war nicht möglich...");
*/

$verbindung = new PDO('mysql:host=localhost;dbname=TODO_APP', 'f.schlegel', 'hill-96');


$title = $_POST{"title"};
$description = $_POST{"description"};

if ($title == "" or $description == "") {
    echo "Du hast die Felder nicht ausgefüllt...";
} else {

    $eintrag = $verbindung->prepare("INSERT INTO task (title, description) VALUES ('$title', '$description')");

    /*$eintrag = "INSERT INTO task
    (title, description)
    */

    var_dump($title, $description);

 /*   VALUES
    ('$title', '$description');
*/
//$eintragen = mysqli_query($eintrag);

if ($eintrag == true) {
    echo "Dein Eintrag wurde gespeichert";
} else {
    echo "Dein Eintrag konnte nicht gespeichert werden";
}

}

