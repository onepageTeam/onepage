var jsSrc = [
                '/js/libs/bootstrap-sass-3.3.6/assets/javascripts/bootstrap.min.js', // include bootstrap
                'js/src/*.js', // All JS in the src folder
                'js/src/**/*.js' 
            ];

var cssSrc = [
                '/js/libs/bootstrap-sass-3.3.6/assets/stylesheets/_bootstrap.scss', // include bootstrap
                'css/src/*.scss',
                'css/src/**/*.scss' 
            ];

module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // Configuration for concatinating files goes here.
        concat: {
            js: {
                src: jsSrc,
                dest: 'js/main.js',
            },
            css: {
                src: cssSrc,
                dest: 'css/main.css',
            }
        },

        // Minified JS
        uglify: {
            build: {
                src: 'js/main.js',
                dest: 'js/main-min.js'
            }
        },

        // Auto Prefixed CSS
        autoprefixer:{
            dist:{
                files:{
                    'css/main.css':'css/main.css'
                }
            }
        },

        // Minified CSS
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'css/main-min.css': 'css/main.css'
                }
            } 
        },

        // Minified IMAGE
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: 'img/src/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'img/'
                }]
            }
        },

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
                files: cssSrc,
                tasks: ['concat', 'sass'],
                options: {
                    spawn: false,
                }
            }
        }
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    // Load AUTOMATICALY Grunt tasks declared in the package.json file
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concat', 'uglify', 'imagemin', 'sass', 'autoprefixer', 'watch']);
};