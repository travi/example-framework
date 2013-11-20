# Travi Framework Sample Implementation

## Getting Started
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

### Compile Styles
* `grunt compile`

* Temporarily, there is a need to compile the framework styles
    * `cd vendor\Travi\framework\`
    * `npm install`
    * `grunt sass`

### Set up the development environment
* Ensure Vagrant and VirtualBox are installed
* Install the Vagrant hosts updater plugin (<https://github.com/cogitatio/vagrant-hostsupdater>)
    * `vagrant plugin install vagrant-hostsupdater`
* `vagrant up`

