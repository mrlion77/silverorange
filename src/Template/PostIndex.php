<?php

namespace silverorange\DevTest\Template;

use silverorange\DevTest\Context;

class PostIndex extends Layout
{
    protected function renderPage(Context $context): string
    {
        // @codingStandardsIgnoreStart
        $output = <<<HTML
<h1>POSTS</h1>
HTML;
        // @codingStandardsIgnoreEnd

        foreach($context->data['posts'] as $key => $post) {

            // @codingStandardsIgnoreStart
            $output .= <<<HTML
<div>
    <h3><a href="/posts/{$post->getId()}">{$post->getTitle()}</a></h3>
    <small>{$post->getCreatedAt()} by {$post->getAuthor()->getFullName()}</small>
</div>
HTML;
            // @codingStandardsIgnoreEnd
        }

        return $output;
    }
}
