Sample Implementation of the Travi Framework
============================================
[![Dependency Status](https://gemnasium.com/travi/example-framework.svg)](https://gemnasium.com/travi/example-framework)

This project is simply an implementation of the [framework] (https://github.com/travi/php-framework). A
[Vagrant] (http://vagrantup.com) VM definition is also included to make it simple to see it in action.

## To view the example locally:

### Install dependencies

#### composer
* Download from <http://getcomposer.org/download/>
* `php <path to>/composer.phar install`

#### npm
* `brew install node`
* `npm install -g bower`
* `npm install -g grunt-cli`
* `npm install`

#### bower
* `grunt bower`

### Set up the server instance
* Ensure Vagrant and VirtualBox are installed
* Install the Vagrant hosts updater plugin (<https://github.com/cogitatio/vagrant-hostsupdater>)
    * `vagrant plugin install vagrant-hostsupdater`
    * `vagrant up`
* The script updates your hosts file automatically using sudo, so you will need to provide your password to enable this.

### Compile Styles
* `grunt compile`

### Load the example in your browser
* Enter http://travi-framework-sample.dev/ in the address bar of your browser

