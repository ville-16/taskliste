<?php

/*
 * IN DIESER VARIANTE WIRD ALLES IN EINEM FILE GEMACHT
 *
 * */

// task loader holen
require_once "DBTaskLoader.php";
$DBTaskLoader = new DBTaskLoader();

// tasks aus dem task loader holen
$tasks = $DBTaskLoader->getTasks();

//tasks sortieren (mittels anonyme funktion)
usort($tasks, function ($t1, $t2) {
    return strtotime($t1->getDuedate()) - strtotime($t2->getDuedate());
});


//wenn keine taskid mitgegeben wird, stelle ich die taskliste wieder dar
if (empty($_GET['taskid']) || !is_numeric($_GET['taskid'])) {


    echo "<h1>Taskliste 2</h1>";
    echo "<h2>mit taskliste-single.php --> Alles in einem File mit Fallunterscheidung</h2>";
    echo "<a href='taskliste.php'>Gehe zur Variante mit zwei php Files</a>";
    echo "<table cellpadding='5' cellspacing='5'>";
    echo "<tr><th>Title</th><th>Due Date</th></tr>";

    foreach ($tasks as $task) {

        $detail_link = "taskliste-single.php?taskid=" . $task->getId();

        echo "<tr>";
        echo "<td>" . $task->getTitle() . "</td>";
        echo "<td>" . $task->getDuedate() . "</td>";
        echo "<td><a href='$detail_link' >Details</td>";
        echo "</tr>";

    }

    echo "</table>";

    //stoppe die ausgabe hier
    exit();


}


// wenn ich hier ankomme bin ich sicher, dass eine nummer in diesem GET parameter drin ist (siehe oben)
$taskid = $_GET['taskid'];

// hole einen Task loader
require_once "DBTaskLoader.php";
$manualTaskLoader = new DBTaskLoader();


// frage den task loader nach dem task mit der id aus der GET parameter
$task = $DBTaskLoader->getTask($taskid);

// var_dump($task);


/**
 * Hilfsfunktion für das formatieren von einem datum
 *
 * @param $date string datum
 * @param $target_format string zielformat des datums
 */
function formatDate($date, $target_format = 'd.m.Y') {
    $dateTime = new DateTime($date);
    return $dateTime->format($target_format);
}

?>
<h1><?php echo $task->getTitle(); ?></h1>
<p>
    ID: <?php echo $task->getId(); ?> <br/>
    User ID: <?php echo $task->getUserId(); ?> <br/>
    Status ID: <?php echo $task->getStatusId(); ?> <br/>
    Beschreibung: <?php echo $task->getDescription(); ?> <br/>
    Fälligkeitsdatum: <?php echo formatDate($task->getDuedate()); ?> <br/>
    Erstellt am: <?php echo formatDate($task->getCreated()); ?> <br/>
    Zuletzt bearbeitet am: <?php echo formatDate($task->getUpdated()); ?> <br/>
</p>
<p>
    <a href="taskliste-single.php">&lt;-- zurück zur taskliste</a>
</p>