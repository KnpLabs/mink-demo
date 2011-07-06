<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\Pending;

use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

require_once __DIR__ . '/../../mink-1.0.0RC1.phar';

/**
 * Features context.
 */
class FeatureContext extends Behat\Mink\Behat\Context\MinkContext
{
    /**
     * @Then /^I wait for the suggestion box to appear$/
     */
    public function waitForSuggestionBox()
    {
        $this->getSession()->wait(5000, "$('.suggestions-results').children().length > 0");
    }
}
