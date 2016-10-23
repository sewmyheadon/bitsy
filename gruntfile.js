module.exports = function(grunt){
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		compass: {
			dev: {
				options: {
					config: 'config.rb'
				} // options
			} // dev
		}, // compass
		watch: {
			options: { livereload:false },

			php: {
				files: ['**.php', 'template-parts/**.php']
			}, // php
			sass: {
				files: ['assets/sass/**/*.scss'],
				tasks: ['compass:dev']
			}, // compass
			script: {
				files: ['assets/js/**.js']
			}
		} // watch
	}); // config
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-autoprefixer'); // this task isn't really needed - but didn't remove initially ( compass already auto-prefixes)
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default', ['watch']);
} // module
