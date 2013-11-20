# make sure the packages are up to date before beginning
exec { 'apt-get update':
  command => '/usr/bin/apt-get update'
}

class { 'apache':
  mpm_module => 'prefork',
  require => Exec["apt-get update"],
}

apache::vhost { 'travi-framework-sample.dev':
  port    => '80',
  docroot => '/vagrant/doc_root',
  directories => [{ path => '/vagrant/doc_root', allow_override => 'All'}],
  aliases => [{alias => '/resources/shared', path => '/vagrant/vendor/Travi/framework/client'}],
}

file { ['/home/travi/', '/home/travi/sandbox/', '/home/travi/sandbox/templates_c/']:
  ensure => "directory",
  mode   => 777,
}

include stdlib
include apache
include apache::mod::rewrite
include apache::mod::cgi
include apache::mod::deflate
include apache::mod::php