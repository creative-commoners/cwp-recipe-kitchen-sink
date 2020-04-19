<?php

namespace My\App;

use SilverStripe\BehatExtension\Context\LoginContext;

class MyLoginContext extends LoginContext
{
    public function stepILogInWith($email, $password)
    {
        $c = $this->getMainContext();
        $loginUrl = $c->joinUrlParts($c->getBaseUrl(), $c->getLoginUrl());
        $this->getMainContext()->getSession()->visit($loginUrl);
        $page = $this->getMainContext()->getSession()->getPage();
        assertNull('debug: ' . $page->getOuterHtml(), '... debug page outerhtml ...');

        parent::stepILogInWith($email, $password);
    }
}
