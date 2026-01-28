const gulp = require('gulp');
const browserSync = require('browser-sync').create();

function serve(done) {
    browserSync.init({
        proxy: 'localhost:8091',
        port: 3091,
        open: false,
        injectChanges: false
    });
    done();
}

function reload(done) {
    browserSync.reload({ stream: false });
    done();
}

function watch() {
    gulp.watch('./wp-content/themes/rubex/**/*.php', reload);
    gulp.watch('./wp-content/themes/rubex/**/*.css').on('change', browserSync.reload);
    gulp.watch('./wp-content/themes/rubex/**/*.js').on('change', browserSync.reload);
    gulp.watch('./wp-content/themes/rubex/**/*.{jpg,jpeg,png,gif,webp,svg}').on('change', browserSync.reload);
}

exports.default = gulp.series(serve, watch);