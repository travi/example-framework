# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure("2") do |config|
  config.vm.box_url = "http://files.vagrantup.com/precise32.box"
  config.vm.box = "precise32"

  config.vm.network "private_network", ip: "192.168.8.222"
  config.vm.hostname = "travi-framework-sample.dev"
  config.hostsupdater.remove_on_suspend = true

  config.vm.provision :puppet do |puppet|
    puppet.manifests_path = "puppet/manifests"
    puppet.manifest_file  = "site.pp"
    puppet.module_path = "puppet/modules"
  end

end
