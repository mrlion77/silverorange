<?php

namespace silverorange\DevTest\Template;

use silverorange\DevTest\Context;

class PostImport extends Layout
{
    protected function renderPage(Context $context): string
    {
        // @codingStandardsIgnoreStart
        return <<<HTML
<p>POST FIXTURES HAVE BEEN LOADED</p>
HTML;
        // @codingStandardsIgnoreEnd
    }
}
