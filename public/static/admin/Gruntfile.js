module.exports = function( grunt ) {

  /**
   * Use matchdep to load all the grunt related dependencies into grunt.
   */
  require( 'matchdep' ).filterDev( 'grunt-*' ).forEach( grunt.loadNpmTasks );

  /**
   * Project Config!
   */
  grunt.initConfig( {
    pkg: grunt.file.readJSON( 'package.json' ),

    /**
     * The grunt wrapper for the cli ngmin. This is puts our angular controllers,
     * directives, and services into the longhand format.
     */
    ngmin: {
      controllers: {
        expand: true,
        cwd: '.compiled/js/controllers',
        src: [ '**/*.js' ],
        dest: '.compiled/js/controllers'
      },
      directives: {
        expand: true,
        cwd: '.compiled/js/directives',
        src: [ '**/*.js' ],
        dest: '.compiled/js/directives'
      },
      services: {
        expand: true,
        cwd: '.compiled/js/services',
        src: [ '**/*.js' ],
        dest: '.compiled/js/services'
      }
    },

    /**
     * This melds all the input files togther, with some annotations.
     */
    concat: {
      prod: {
        options: {
          process: function( src, filepath ) {
            return  "/*!\n"
                  + " * ------/ Source: " + filepath.replace( '.compiled/', '' ) + "\n"
                  + " */\n" + src + "\n//! END";
          }
        },
        files: {
          '.compiled/admin.min.js' : [
            'plugins/swipe.js',
            'plugins/jquery.placeholder.js',
            'plugins/fineuploader.min.js',
            'plugins/media.match.min.js',
            'plugins/enquire.min.js',
            'js/app.js',
            '.compiled/js/services/*.js',
            '.compiled/js/controllers/*.js',
            '.compiled/js/directives/*.js',
            'js/responsive.js'
          ]
        }
      }
    },

    /**
     * Using this to minify the code.
     *
     * @todo Figure out how to get mangle: true working.
     */
    uglify: {
      prod: {
        options: {
          banner: function() {

            return  "/*!\n"
                  + " */\n\n"
                  + " 'use strict';\n\n";

          }(),
          preserveComments: 'some',
          mangle: false
        },
        files: {
          'js/admin.min.js': [ '.compiled/admin.min.js' ]
        }
      },
      dev: {
        options: {
          beautify: true,
          mangle: false,
          compress: false,
          preserveComments: 'all'
        },
        files: {
          'js/admin.min.js': [ '.compiled/admin.min.js' ]
        }
      }
    },

    /**
     * Watch plugin to run tasks as we change files locally.
     */
    watch: {
      scripts: {
        options: {
          event: [ 'all' ]
        },
        files: [ 'js/**/*.js', '!js/admin.min.js' ],
        tasks: [ 'ngmin', 'concat:prod', 'uglify:dev', 'clean:scripts' ]
      }
    },

    /**
     * Clean out the compiled cruft.
     */
    clean: {
      scripts: [ '.compiled' ]
    }

  } );

  /**
   * Default Grunt Task
   *
   * We will block people from running the default grunt task
   * because this would allow them to run all tasks that are
   * of the multiTask type.
   */
  grunt.registerTask( 'default', function() {
    return grunt.util.error( 'Please specify an enviornment. (i.e. `grunt dev`)' );
  } );

  /**
   * Production Task
   *
   * This prepares the Angular code for minification,
   * minifies it, and shoves it into one file for the client.
   */
  grunt.registerTask( 'prod', [ 'ngmin', 'concat:prod', 'uglify:prod', 'clean:scripts'] );

  /**
   * Development Task
   *
   * This spawns a watch process that oversees changes
   * applied to both .scss and .js files. When it catches
   * one, it runs through the tasks almost as if this
   * were productions.
   */
  grunt.registerTask( 'dev', [ 'ngmin', 'concat:prod', 'uglify:dev', 'clean:scripts', 'watch' ] );

};
