#!/bin/sh

PUPPET_DIR='/vagrant/puppet'

sudo apt-get update

if [ `librarian-puppet version 2> /dev/null | grep librarian-puppet | wc -l` -eq 0 ]; then
  apt-get install -y git librarian-puppet
  cd ${PUPPET_DIR} && librarian-puppet install --clean
else
  cd ${PUPPET_DIR} && librarian-puppet update
fi