module.exports = function (grunt) {

    "use strict";

    grunt.initConfig({
        pkg: grunt.file.readJSON("package.json"),
        qunit: {
            options: {
                urls: ["http://localhost:8000/test/index.html"]
            }
        },
        connect: {
            server: {
                options: {
                    port: 8000,
                    base: "."
                }
            }
        },
        jshint: {
            all: [
                "Gruntfile.js",
                "assets/js/src/*.js",
                "!js/build/*.js",
                "test/*.js"
            ],
            options: {
                jshintrc: ".jshintrc",
                reporter: require("jshint-stylish")
            }
        },
        uglify: {
            dist: {
                files: {
                    "assets/build/scripts.min.js" : [
                        "assets/js/*.js",
                    ]
                }
            }
        },
        clean: {
            dist: [
                "assets/build/scripts.min.js"
            ]
        },
        watch: {
            js: {
                files: [
                    "<%= jshint.all %>"
                ],
                tasks: ["jshint"]
            }
        }
    });

    
    grunt.loadNpmTasks("grunt-contrib-clean");
    grunt.loadNpmTasks("grunt-contrib-qunit");
    grunt.loadNpmTasks("grunt-contrib-jshint");
    grunt.loadNpmTasks("grunt-contrib-uglify");
    grunt.loadNpmTasks("grunt-contrib-connect");
    grunt.loadNpmTasks("grunt-contrib-watch");

    grunt.registerTask("default", ["jshint", "connect", "qunit"]);
    grunt.registerTask("build", ["jshint", "connect", "qunit", "clean", "uglify"]);
    grunt.registerTask("dev", ["watch"]);
    grunt.registerTask("ci", ["default"]);
};