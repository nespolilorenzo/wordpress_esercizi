module.exports = function (gulp, $, DIR) {
    return function () {
        gulp.src(
                [
                    DIR+'src/scss/app.scss',
                ]
            )
            .pipe($.sass({
                outputStyle: 'compressed',
                includePaths: []
            }).on('error',$.sass.logError))
            .pipe(gulp.dest(DIR+'assets/css/'))

    };
};