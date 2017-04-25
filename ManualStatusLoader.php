<?php
/**
 * Created by PhpStorm.
 * User: f.schlegel
 * Date: 07.02.17
 * Time: 15:55
 */

require_once "status.php";

class ManualStatusLoader {
    private $stati;

    /**
     * ManualUserLoader constructor.
     */
    public function __construct() {
        $this->stati = array(
            1 => new Status(1, "open", "Offen"),
            2 => new Status(2, "in_progress", "In Bearbeitung"),
            3 => new Status(3, "done", "Erledigt"),
        );
    }

    public function getStati() {
        return $this->stati;
    }

    public function getStatus($id) {
        return $this->stati[$id];
    }

}