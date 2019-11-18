module.exports = function (gulp, $, DIR) {
    return function () {
        $.browserSync.reload('/');
    };
};