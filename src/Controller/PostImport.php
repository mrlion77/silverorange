<?php

namespace silverorange\DevTest\Controller;

use silverorange\DevTest\Config;
use silverorange\DevTest\Context;
use silverorange\DevTest\Service\FixturesLoader;
use silverorange\DevTest\Service\JsonParser;
use silverorange\DevTest\Template;

class PostImport extends Controller
{
    public function getContext(): Context
    {
        $context = new Context();
        $context->title = 'Posts Import';

        return $context;
    }

    public function getTemplate(): Template\Template
    {
        return new Template\PostImport();
    }

    protected function loadData(): void
    {
        $config = new Config();
        $jsonData = JsonParser::getJsonData($config->postFilesPath);

        $fixturesLoader = new FixturesLoader($this->db);
        $fixturesLoader->loadPostFixtures($jsonData);
    }
}
