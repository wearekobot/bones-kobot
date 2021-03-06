module.exports = function(grunt) {

  // Load all Grunt tasks
  require('load-grunt-tasks')(grunt);

  grunt.initConfig({
    // Configurable paths
    bones: {
      theme: '/wp-content/themes/bones',
    },
    // Watches for changes and runs tasks
    watch : {
      compass: {
        files: ['scss/**/*.{scss,sass}'],
        tasks: ['compass', 'postcss']
      },
      js : {
        files : ['js/**/*.js'],
        tasks : [],
        options : {
          livereload : true
        }
      },
      php : {
        files : ['**/*.php'],
        options : {
          livereload : true
        }
      }
    },

    // JsHint your javascript
    jshint : {
      all : ['js/*.js', '!js/modernizr.js', '!js/*.min.js', '!js/vendor/**/*.js'],
      options : {
        browser: true,
        curly: false,
        eqeqeq: false,
        eqnull: true,
        expr: true,
        immed: true,
        newcap: true,
        noarg: true,
        smarttabs: true,
        sub: true,
        undef: false
      }
    },

    // Dev and production build for compass
    compass: {
      dist: {
        options: {
          // If you're using global Sass gems, require them here.
          require: ['compass-h5bp', 'breakpoint', 'susy', 'bourbon'],
          bundleExec: true,
          sassDir: 'scss',
          cssDir: 'css',
          imagesDir: 'images',
          javascriptsDir: 'js',
          relativeAssets: true,
          // httpImagesPath: '<%= bones.theme %>/images',
          // httpGeneratedImagesPath: '<%= bones.theme %>/images/generated',
          outputStyle: 'expanded',
          raw: 'extensions_dir = "node_modules"\n'
        }
      }
    },
    
    postcss: {
      options: {
        map: false, // inline sourcemaps
        
        processors: [
          require('autoprefixer')(), // add vendor prefixes
          require('cssnano')() // minify the result
        ]
      },
      dist: {
        src: 'css/*.css'
      }
    },
    
    uglify: {
      options: {
        // banner: '/*! <%= pkg.name %> lib - v<%= pkg.version %> -' + '<%= grunt.template.today("yyyy-mm-dd") %> */'
      },
      dist: {
        files: {
          'js/plugins.min.js': [
          ]
        }
      }
    },

    // Image min
    imagemin : {
      production : {
        files : [
          {
            expand: true,
            cwd: 'images',
            src: '**/*.{png,jpg,jpeg}',
            dest: 'images'
          }
        ]
      }
    },

    // SVG min
    svgmin: {
      production : {
        files: [
          {
            expand: true,
            cwd: 'images',
            src: '**/*.svg',
            dest: 'images'
          }
        ]
      }
    }
  });

  // Default task
  grunt.registerTask('default', ['watch']);

  // Build task
  grunt.registerTask('build', [ 
    'compass', 
    'postcss',
    'imagemin:production', 
    'svgmin:production', 
    'uglify'
  ]);

  // Template Setup Task
  grunt.registerTask('setup', [
    'compass'
  ]);

};
