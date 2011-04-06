<?php

$steps->Then('/^I wait for the suggestion box to appear$/', function($world) {
    $world->getSession()->wait(5000, "$('.suggestions-results').children().length > 0");
});
