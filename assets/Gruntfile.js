var jsSrc = [
<<<<<<< HEAD
                'js/libs/jquery-2.2.0.min.js', // jQuery
                'node_modules/bootstrap/dist/js/bootstrap.min.js', // include bootstrap
                'plugins/**/*.js', // include plugins
=======
                '/js/libs/bootstrap-sass-3.3.6/assets/javascripts/bootstrap.min.js', // include bootstrap
>>>>>>> master
                'js/src/*.js', // All JS in the src folder
                'js/src/**/*.js' 
            ];

var cssSrc = [
<<<<<<< HEAD
                'node_modules/bootstrap/dist/css/bootstrap.min.css', // include bootstrap
                'plugins/**/*.css', // include plugins
=======
                '/js/libs/bootstrap-sass-3.3.6/assets/stylesheets/_bootstrap.scss', // include bootstrap
>>>>>>> master
                'css/src/*.scss',
                'css/src/**/*.scss',
                '!css/src/admin/*.scss'            ];

module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // Configuration for concatinating files goes here.
        concat: {
            js: {
                src: jsSrc,
                dest: 'js/main.js'
            },
            css: {
                src: cssSrc,
                dest: 'css/main.scss'
            },
            cssAdmin: { 
                src: 'css/src/admin/*.scss', 
                dest: 'css/admin.scss' 
            }
        },

        // Minified JS
        uglify: {
            build: {
                src: 'js/main.js',
                dest: 'js/main.min.js'
            }
        },

        // Minified CSS
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'css/main.min.css': 'css/main.scss',
                    'css/admin.min.css': 'css/admin.scss'
                }
            } 
        },

        // Auto Prefixed CSS
        autoprefixer:{
            dist:{
                files:{
                    'css/main.min.css':'css/main.min.css',
                    'css/admin.min.css':'css/admin.min.css'
                }
            }
        },

        // Minified IMAGE


        watch: {
            options: {
                livereload: true,
            },
            scripts: {
                files: jsSrc,
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            },

            css: {
                files: [cssSrc, 'css/src/admin/*.scss'],
                tasks: ['concat', 'sass'],
                options: {
                    spawn: false,
                }
            }
        },

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    // Load AUTOMATICALY Grunt tasks declared in the package.json file
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concat', 'uglify', 'sass', 'autoprefixer', 'watch']);
};