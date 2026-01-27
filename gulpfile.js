const gulp = require('gulp');
const browserSync = require('browser-sync').create();

function serve(done) {
    browserSync.init({
        proxy: 'localhost:8091',
        port: 3091,
        open: false
    });
    done();
}

function reload(done) {
    browserSync.reload();
    done();
}

function watch() {
    gulp.watch('./wp-content/themes/rubex/**/*.php', reload);
    gulp.watch('./wp-content/themes/rubex/**/*.css', reload);
    gulp.watch('./wp-content/themes/rubex/**/*.js', reload);
    gulp.watch('./wp-content/themes/rubex/**/*.jpg', reload);
    gulp.watch('./wp-content/themes/rubex/**/*.webp', reload);
    gulp.watch('./wp-content/themes/rubex/**/*.png', reload);
}

exports.default = gulp.series(serve, watch);