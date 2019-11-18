var data = {},
    currentENV, ENV, DIR, BACKEND,
    gulp = require('gulp'),
    $ = require('gulp-load-plugins')({
        pattern: '*'
    }),
    DIR = './wp-content/themes/app/';

function getTask(task) {
    return require('./gulp-tasks/' + task)(gulp, $, DIR);
}

gulp.task('scripts', getTask('scripts'));
gulp.task('styles', getTask('styles'));
gulp.task('reload', getTask('reload'));

gulp.task('default', [],
    function () {
        console.log('GULP');
    }
);

gulp.task('watch', ['styles', 'scripts'], function () {
    $.browserSync.init({
        port: 3000,
        notify: true,
        proxy: "wordpressprova.local"
    });
    gulp.watch(DIR + '/src/scss/**/**/*.scss', ['styles', 'reload']);
    gulp.watch(DIR + '/src/js/**/*.js', ['scripts', 'reload']);
    gulp.watch(DIR + '/assets/images/**/*.', ['reload']);
    gulp.watch(DIR + '/**/*.php', ['reload']);
});