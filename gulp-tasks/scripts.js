module.exports = function (gulp, $, DIR, BACKEND) {
    return function () {

        gulp.src([
                DIR+'src/js/app.js'
            ])
            // .pipe($.concat('app.js'))
            // .pipe($.uglify('app.js', {
            //     mangle: false,
            //     output: {
            //         beautify: true
            //     }
            // }))
            .pipe(gulp.dest(DIR+'assets/js'));

    };
};