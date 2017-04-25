<?php

require_once "DB.php";

//wenn keine taskid mitgegeben wird, stelle ich die taskliste wieder dar
if (empty($_GET['taskid']) || !is_numeric($_GET['taskid'])) {
    require "taskliste.php";

    //stoppe die ausgabe hier
    exit();
}

// wenn ich hier ankomme bin ich sicher, dass eine nummer in diesem GET parameter drin ist (siehe oben)
$taskid = $_GET['taskid'];


$query = "DELETE FROM task WHERE id = $taskid;";
$num = DB::get()->exec($query);
if ($num == 1) {
    echo "Erfolgreich Task mit id = $taskid gelöscht.";
} else {
    echo "Task mit id = $taskid nicht gefunden.";
}

?>

<p>
    <a href="taskliste.php">&lt;-- zurück zur taskliste</a>
</p>