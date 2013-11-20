/*global module*/
module.exports = function (grunt) {
    'use strict';

    require('load-grunt-config')(grunt);

    grunt.registerTask('compile', ['sass', 'copy:cssImages']);
    grunt.registerTask('default', ['bower', 'jslint', 'compile', 'karma']);
};