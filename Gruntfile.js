module.exports = function(grunt) {

    grunt.initConfig({
        concat: {
            twig: {
                options: {
                    stripBanners: true,
                    banner: '{# IMPORTANT!! DO NOT EDIT THIS GENERATED FILE. READ "Resources/views/source/README.md" #}\n\n',
                },
                src: ['Resources/views/source/*.twig'],
                dest: 'Resources/views/form.html.twig'
            }
        },
        watch: {
            options: {
                nospawn: true,
                livereload: false
            },
            twig: {
                files: ['Resources/views/source/*.twig'],
                tasks: ['concat:twig']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');

    //grunt.registerTask('watch', ['watch']);
    grunt.registerTask('default', ['concat:twig']);
};
