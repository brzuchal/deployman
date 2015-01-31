##Deployman - PHP deployment tool

**Current Build Status**
[![Build Status](https://drone.io/github.com/mbrzuchalski/deployman/status.png)](https://drone.io/github.com/mbrzuchalski/deployman/latest)

##Getting started

1. Clone this repo `$ git clone git@guthub.com:mbrzuchalski/deployman.git`
2. Run [composer](http://getcomposer.org/) `$ php composer.phar install`
2. Run [phar-composer](https://github.com/clue/phar-composer) `$ php phar-composer.phar build .`

##Running tests

1. Run PHPSpec tests by default with `bin/phpspec run`

##Usage

Raw code:
```
bin/deployman [task]
```

Boxed app:
```
chmod +x deployman.phar
deployman.phar
```
