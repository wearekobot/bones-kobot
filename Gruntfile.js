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
				tasks: ['compass', 'autoprefixer']
			},
			coffee: {
			  files: ['coffee/**/*.coffee'],
			  tasks: ['coffee:dist']
			},
			js : {
				files : ['js/**/*.js'],
				tasks : ['jshint'],
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
					raw: 'extensions_dir = "_bower_components"\n'
				}
			}
		},
		
		autoprefixer: {
			options: {
				browsers: ['last 2 versions']
			},
			dist: {
				files: [{
					expand: true,
					cwd: 'css',
					src: '**/*.css',
					dest: 'css'
				}]
			}
		},
		
		coffee: {
			dist: {
				files: [{
					expand: true,
					cwd: 'coffee',
					src: '**/*.coffee',
					dest: 'js',
					ext: '.js'
				}]
			}
		},
		
		// Bower task sets up require config
		bower : {
			all : {
				rjsConfig : 'js/global.js'
			}
		},

		uglify: {
			options: {
				// banner: '/*! <%= pkg.name %> lib - v<%= pkg.version %> -' + '<%= grunt.template.today("yyyy-mm-dd") %> */'
			},
			dist: {
				files: {
					'js/plugins.min.js': [
						'js/vendor/jquery/jquery.js'
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
		'jshint', 
		'compass', 
		'coffee', 
		'autoprefixer',
		'imagemin:production', 
		'svgmin:production', 
		'uglify'
	]);

	// Template Setup Task
	grunt.registerTask('setup', [
		'compass', 
		'bower-install'
	]);

	// Run bower install
	grunt.registerTask('bower-install', function() {
		var done = this.async();
		var bower = require('bower').commands;
		bower.install().on('end', function(data) {
			done();
		}).on('data', function(data) {
			console.log(data);
		}).on('error', function(err) {
			console.error(err);
			done();
		});
	});

};
