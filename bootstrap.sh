#!/bin/sh

PUPPET_DIR='/vagrant/puppet'

sudo apt-get update

mkdir -p puppet/modules

if [ `librarian-puppet version | grep librarian-puppet | wc -l` -eq 0 ]; then
  apt-get install -y librarian-puppet
  cd $PUPPET_DIR && librarian-puppet install --clean
else
  cd $PUPPET_DIR && librarian-puppet update
fi