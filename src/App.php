<?php

namespace silverorange\DevTest;

class App
{
    public function run(): bool
    {
        $path = $_SERVER['REQUEST_URI'];

        // Serve static assets.
        if (preg_match('@^/(assets|images|highres-assets)(/|$)@', $path) === 1) {
            return false;
        }

        $controller = $this->getController($path);
        $context = $controller->getContext();
        $template = $controller->getTemplate();

        $controller->sendHeaders();

        echo $template->render($context);

        return true;
    }

    protected function getController(string $path): Controller\Controller
    {
        $controller = new Controller\NotFound([]);

        // TODO: Do stuff like parse query params from $_GET here if required.

        // Switch to set up different context data for different URLs.
        if (preg_match('@^/?$@', $path) === 1) {
            $controller = new Controller\Root([]);
        } elseif (preg_match('@^/import/?$@', $path) === 1) {
            $controller = new Controller\PostImport([]);
        } elseif (preg_match('@^/posts/?$@', $path) === 1) {
            $controller = new Controller\PostIndex([]);
        } elseif (preg_match('@^/posts/([a-f0-9-]+)/?$@', $path, $params) === 1) {
            array_shift($params);
            $controller = new Controller\PostDetails($params);
        } elseif (preg_match('@^/checkout/?$@', $path) === 1) {
            $controller = new Controller\Checkout([]);
        }

        return $controller;
    }
}
