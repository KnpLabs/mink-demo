<?php

$steps->And('/^I wait for (?P<time>\d+) (?P<unit>ms|s|secs?|seconds?|secs)$/', function($world, $time, $unit) {
    if('s' === $unit[0]) {
        $time *= 1000;
    }
    $world->getSession()->getDriver()->getClient()->wait($time, 'false');
});

