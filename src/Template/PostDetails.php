<?php

namespace silverorange\DevTest\Template;

use silverorange\DevTest\Context;

class PostDetails extends Layout
{
    protected function renderPage(Context $context): string
    {
        $parsedown = new \Parsedown();

        // @codingStandardsIgnoreStart
        $output = <<<HTML
<h1>{$context->data['post']->getTitle()}</h1>
<p><small>{$context->data['post']->getCreatedAt()} by {$context->data['post']->getAuthor()->getFullName()}</small></p>
<p>{$parsedown->text($context->data['post']->getBody())}</p>
HTML;
        // @codingStandardsIgnoreEnd

        return $output;
    }
}
