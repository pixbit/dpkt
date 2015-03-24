module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    /**
     * Project Variables
     */
    project: {
      zf5: 'assets/zf5',
      zf5_bower: 'assets/zf5/bower_components',
      layerslider: 'bower_components/layerslider/layerslider',
      imagesloaded: 'bower_components/imagesloaded',
      assets_css: 'assets/css',
      assets_scss: 'assets/scss',
      assets_js: 'assets/js',
      assets_fonts: 'assets/fonts',
      build_css: 'build/css',
      build_js: 'build/js'
    }

    ,sass: {
      dist: {
        options: {
          style: 'compact'
        },
        files: {
           '<%= project.assets_css %>/<%= pkg.name %>-foundation-top-bar.css' : '<%= project.assets_scss %>/<%= pkg.name %>-foundation-top-bar.scss'
          ,'<%= project.assets_css %>/<%= pkg.name %>-foundation-blocks.css' : '<%= project.assets_scss %>/<%= pkg.name %>-foundation-blocks.scss'
        }
      }
    }

    ,concat: {
      dev_css:{
        src: [
           '<%= project.assets_fonts %>/stylesheet.css'
          ,'<%= project.layerslider %>/css/layerslider.css'
          ,'<%= project.zf5 %>/css/app.css'
        ],
        dest: '<%= project.assets_css %>/style.css'
      }

      ,zf5_js:{
        options: {
          banner: '/*\n' +
                  ' * Foundation 5 by Zurb' +
                  ' */\n'
        },
        src: [
           '<%= project.zf5_bower %>/foundation/js/foundation.min.js'
          ,'<%= project.zf5_bower %>/foundation/js/foundation/foundation.topbar.js'
          ,'<%= project.zf5_bower %>/modernizr/modernizr.js'
          ,'<%= project.zf5 %>/js/app.js'
        ],
        dest: '<%= project.assets_js %>/zf5.js'
      }

      ,layerslider_js:{
        options: {
          banner: '/*!\n' +
                  ' * Layerslider' +
                  ' */\n'
        },
        src: [
          '<%= project.layerslider %>/js/greensock.js'
          ,'<%= project.layerslider %>/js/layerslider.transitions.js'
          ,'<%= project.layerslider %>/js/layerslider.kreaturamedia.jquery.js'
        ],
        dest: '<%= project.assets_js %>/layerslider.js'
      }

    } // concat

    ,cssmin: {
      css:{
        options: {
          banner: '/*!\n' +
                  ' * Theme Name: <%= pkg.name %> Theme\n' +
                  ' * Description: <%= pkg.description %>\n' +
                  ' * Author URI: http://thinkpixbit.com\n' +
                  ' * Author: <%= pkg.author %>\n' +
                  ' * Version: <%= pkg.version %>\n' +
                  ' */\n'
        },
        files: {
          'style.css':
          [
             '<%= project.assets_css %>/style.css'
            ,'<%= project.assets_css %>/<%= pkg.name %>-layerslider.css'
            ,'<%= project.assets_css %>/<%= pkg.name %>-foundation.css'
            ,'<%= project.assets_css %>/<%= pkg.name %>-foundation-top-bar.css'
            ,'<%= project.assets_css %>/<%= pkg.name %>-foundation-blocks.css'
          ]
        }
      }
    } // cssmin

    ,uglify: {
      build: {
        options: {
          preserveComments: false
        },
        files: {
          '<%= project.build_js %>/<%= pkg.name %>.min.js' :
          [
             '<%= project.zf5_bower %>/jquery/dist/jquery.min.js'
            ,'<%= project.assets_js %>/zf5.js'
            ,'<%= project.assets_js %>/layerslider.js'
            ,'<%= project.assets_js %>/<%= pkg.name %>-layerslider.js'
            ,'<%= project.imagesloaded %>/imagesloaded.pkgd.min.js'
          ]
        }
      }
    }


    ,watch: {
      css: {
        files: [
           '<%= project.zf5 %>/css/app.css'
          ,'<%= project.assets_css %>/<%= pkg.name %>-layerslider.css'
          ,'<%= project.assets_css %>/<%= pkg.name %>-foundation.css'
          ,'<%= project.assets_css %>/<%= pkg.name %>-foundation-top-bar.css'
          ,'<%= project.assets_css %>/<%= pkg.name %>-foundation-blocks.css'
        ],
        tasks: [
           'concat:dev_css'
          ,'cssmin:css'
          // ,'shell:uploadStyle'
          // ,'shell:flash'
        ]
      },
      js: {
        files: [
          '**/*.js'
        ],
        tasks: [
          // 'concat:zf5_js'
          // ,'concat:layerslider_js'
          'uglify:build'
          // ,'shell:flash'
        ]
      },
      sass: {
        files: [
          '<%= project.assets_scss %>/*.scss'
        ],
        tasks: [
          'sass:dist'
          ,'concat:dev_css'
          ,'cssmin:css'
        ]
      }
    }

    ,shell: {                             // Task
      uploadStyle: {                      // Target
        options: {                      // Options
          stderr: false
        },
        command: 'open style.app'
      }
      ,flash: {                      // Target
        options: {                      // Options
          stderr: false
        },
        command: 'blink1-tool --rgb 0,200,50 --blink=3'
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-sass'); // npm install grunt-contrib-sass --save-dev
  grunt.loadNpmTasks('grunt-contrib-watch'); // npm install grunt-contrib-watch --save-dev
  grunt.loadNpmTasks('grunt-contrib-concat'); // npm install grunt-contrib-concat --save-dev
  grunt.loadNpmTasks('grunt-contrib-uglify'); // npm install grunt-contrib-uglify --save-dev
  grunt.loadNpmTasks('grunt-contrib-cssmin'); // npm install grunt-contrib-cssmin --save-dev
  grunt.loadNpmTasks('grunt-shell'); // npm install grunt-shell --save-dev

  grunt.registerTask('default', [
    'concat:dev_css'
    ,'sass:dist'
    ,'cssmin:css'
    // ,'shell:uploadStyle'
    ,'concat:zf5_js'
    ,'concat:layerslider_js'
    ,'uglify:build'
    // ,'shell:flash'
    // ,'watch'
  ]);
}
