<?php

$steps->And('/^I wait for the suggestion box to appear$/', function($world) {
    $world->getSession()->getDriver()->getClient()->wait(5000, "$('.suggestions-results').children().length > 0");
});

