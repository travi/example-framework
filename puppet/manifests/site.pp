class { 'apache':
  mpm_module => 'prefork',
}

apache::vhost { 'travi-framework-sample.dev':
  port    => '80',
  docroot => '/vagrant/doc_root',
  directories => [{ path => '/vagrant/doc_root', allow_override => 'All'}],
  aliases => [{alias => '/resources/shared', path => '/vagrant/vendor/travi/framework/client'}],
}

file { ['/home/travi/', '/home/travi/sandbox/', '/home/travi/sandbox/templates_c/']:
  ensure => "directory",
  mode   => 777,
}

class { 'mysql::server':
  root_password => 'sajfaiuvoiandfnadiov'
}

class { 'mysql::bindings':
  php_enable => true
}

mysql::db { 'example':
  user     => 'patch_bot',
  password => 'djgaiefuzvndldjds',
  host     => 'localhost',
  grant    => ['ALL'],
  before   => Exec['ant update db'],
}

class { 'ant': }
class { 'java': }

exec { 'ant update db':
  command => '/usr/bin/ant -buildfile /vagrant/build.xml toLocal update-example-databases',
  require => [Class['ant'], Class['java']],
  cwd     => '/vagrant',
}

class { 'php': }
php::module { 'json': }

class { 'vim': }

include stdlib
include apache
include apache::mod::rewrite
include apache::mod::cgi
include apache::mod::deflate
include apache::mod::php