module.exports = {
    dist: {
        files: [
            {
                expand: true,
                cwd: 'doc_root/resources/scss',
                src: ['**/*.scss'],
                dest: 'doc_root/resources/css/',
                ext: '.css'
            }
        ]
    }
};