## Mink

Mink is a TODO.

This repository will allow you to easily try it.

## Installation

### Requirements:

You need a valid PHPUnit 3.6 installation:

    pear channel-discover pear.phpunit.de
    pear channel-discover components.ez.no
    pear channel-discover pear.symfony-project.com

    pear install phpunit/PHPUnit

You need to install Sahi if you want to test your website in a real browser.  
Download the Sahi jar from the [http://sahi.co.in/w/](Sahi website)

### Usage 

Clone this repo:

    git clone https://github.com/knplabs/mink-demo

Update Behat submodules:

    git submodule update --init --recursive

Launch sahi

    cd $YOUR_PATH_TO_SAHI/bin
    ./sahi.sh

Launch Behat: the two first tests should use Goutte.  
The third one checks that the JS autocomplete field works on wikipedia: it uses Sahi!

    ./behat
    # or
    php vendor/behat/bin/behat.php
