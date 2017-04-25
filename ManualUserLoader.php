<?php
/**
 * Created by PhpStorm.
 * User: f.schlegel
 * Date: 07.02.17
 * Time: 15:53
 */
require_once "user.php";

class ManualUserLoader {
    private $users;

    /**
     * ManualUserLoader constructor.
     */
    public function __construct() {
        $this->users = array(
            1 => new User(1, "fschlegel", "03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4", "Fabian", "Schlegel", "2018-05-12", "2018-05-12"),
            2 => new User(2, "sberger", "03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4", "Stefanie", "Berger", "2018-05-12", "2018-05-12"),
            3 => new User(3, "aogi", "03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4", "Adolf", "Ogi", "2018-05-12", "2018-05-12"),
            4 => new User(4, "mmuster", "03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4", "Max", "Mustermann", "2018-05-12", "2018-05-12"),
            5 => new User(5, "sheinzmann", "03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4", "Stefanie", "Heinzmann", "2018-05-12", "2018-05-12"),
            6 => new User(6, "amuschg", "03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4", "Adolf", "Muschg", "2018-05-12", "2018-05-12"),
        );
    }

    public function getUsers() {
        return $this->users;
    }

    public function getUser($id) {
        return $this->users[$id];
    }

}