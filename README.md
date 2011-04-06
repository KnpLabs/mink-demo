# A Behat+Mink Demo

## Mink

Mink is a browser emulators abstraction layer.

It defines a basic API through which you can talk with specific browser emulator libraries.

Mink drivers define a bridge between Mink and those libraries.

Read [this article](http://www.knplabs.com/en/blog/one-mink-to-rule-them-all) to know more about Mink.

**This repository will allow you to easily try Mink and Behat to test… wikipedia.org!**

## Installation

### Requirements:

You need a valid PHPUnit 3.6 installation:

    pear channel-discover pear.phpunit.de
    pear channel-discover components.ez.no
    pear channel-discover pear.symfony-project.com

    pear install phpunit/PHPUnit

And of course, you need to install Behat and Mink:

    pear channel-discover pear.behat.org

    pear install behat/behat
    pear install behat/mink-beta

Also, you need to install Sahi if you want to test your website in a real browser.  
Download the Sahi jar from the [http://sahi.co.in/w/](Sahi website)

### Usage 

Clone this repo:

    git clone https://github.com/knplabs/mink-demo

Launch sahi

    cd $YOUR_PATH_TO_SAHI/bin
    ./sahi.sh

Launch Behat: the two first tests should use Goutte.  
The third one checks that the JS autocomplete field works on wikipedia: it uses Sahi!

    behat

You should see an output like:

    Feature: Search
      In order to see a word definition
      As a website user
      I need to be able to search for a word

      Scenario: Searching for a page that does exist               # features/search.feature:6
        Given I am on /wiki/Main_Page                              # vendor/mink/src/Behat/Mink/Integration/steps/mink_steps.php:15
        When I fill in "search" with "Behavior Driven Development" # vendor/mink/src/Behat/Mink/Integration/steps/mink_steps.php:31
        And I press "searchButton"                                 # vendor/mink/src/Behat/Mink/Integration/steps/mink_steps.php:23
        Then I should see "agile software development"             # vendor/mink/src/Behat/Mink/Integration/steps/mink_steps.php:62

      Scenario: Searching for a page that does NOT exist           # features/search.feature:12
        Given I am on /wiki/Main_Page                              # vendor/mink/src/Behat/Mink/Integration/steps/mink_steps.php:15
        When I fill in "search" with "Glory Driven Development"    # vendor/mink/src/Behat/Mink/Integration/steps/mink_steps.php:31
        And I press "searchButton"                                 # vendor/mink/src/Behat/Mink/Integration/steps/mink_steps.php:23
        Then I should see "Search results"                         # vendor/mink/src/Behat/Mink/Integration/steps/mink_steps.php:62

      @javascript
      Scenario: Searching for a page with autocompletion           # features/search.feature:19
        Given I am on /wiki/Main_Page                              # vendor/mink/src/Behat/Mink/Integration/steps/mink_steps.php:15
        When I fill in "search" with "Behavior Driv"               # vendor/mink/src/Behat/Mink/Integration/steps/mink_steps.php:31
        And I wait for the suggestion box to appear                # features/steps/ajax.php:5
        Then I should see "Behavior Driven Development"            # vendor/mink/src/Behat/Mink/Integration/steps/mink_steps.php:62

    3 scenarios (3 passed)
    12 steps (12 passed)
    0m8.517s
    
