##Deployman - PHP deployment tool

**Current Status**
[![Build Status](https://drone.io/github.com/mbrzuchalski/deployman/status.png)](https://drone.io/github.com/mbrzuchalski/deployman/latest)
[![Dependency Status](https://gemnasium.com/mbrzuchalski/deployman.svg)](https://gemnasium.com/mbrzuchalski/deployman)
[![Tag](https://img.shields.io/github/tag/mbrzuchalski/deployman.svg)](https://github.com/mbrzuchalski/deployman)
[![Release](https://img.shields.io/github/release/mbrzuchalski/deployman.svg)](https://github.com/mbrzuchalski/deployman)

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

##TODO

* Provide implementations for various filesystems:
  1. Local filesystem [Symfony/Filesystem](https://github.com/symfony/Filesystem) through FlySystem
  2. Remote SSH filesystem [PHPSecLib](https://github.com/phpseclib/phpseclib) through FlySystem
  3. Remote AWS3, RackspaceCloud, Dropbox, Zip, Ftp, Azure, WebDAV [FlySystem](https://github.com/thephpleague/flysystem)

* Provide implementations for various VCS:
  1. Git [GitWrapper](https://github.com/cpliakas/git-wrapper)
  2. Subversion [PEAR/VersionConstrolSVN](https://packagist.org/packages/pear/versioncontrol_svn)

* Provide implementation for logging through [Monolog](https://github.com/Seldaek/monolog)
* Provide interface for file mappers (eg. minifier, compressor, phar packager, ZendGuard|IonCube coders)
* Provide implementation of various config readers (eg. ini, yaml, json, php)
