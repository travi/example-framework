/*global module*/
module.exports = function (grunt) {
    'use strict';

    require('load-grunt-config')(grunt);

    grunt.registerTask('compile', ['sass']);
    grunt.registerTask('build', ['bower', 'compile']);
    grunt.registerTask('default', 'build');
};