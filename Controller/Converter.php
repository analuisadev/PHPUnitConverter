<?php

namespace Controller;

use Model\Connection;

use Exception;

class Converter {
    private $db;

    public function __construct() {
        $this->db = Connection::getConnection();
    }
}