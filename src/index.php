<?php

namespace silverorange\DevTest;

require __DIR__ . '/../vendor/autoload.php';

$config = new Config();
$db = (new Database($config->dsn, $config->username, $config->password))->getConnection();

$app = new App($db);
return $app->run();
