<?php

namespace silverorange\DevTest\Repository;

use silverorange\DevTest\Config;
use silverorange\DevTest\Database;

class Repository
{
    protected \PDO $db;

    public function __construct()
    {
        $config = new Config();
        $this->db = (new Database($config->dsn, $config->username, $config->password))->getConnection();
        $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    }
}
