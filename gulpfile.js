let gulp = require('gulp'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    cleanCss = require('gulp-clean-css');

gulp.task('compile-scss', function () {
    return gulp.src('resources/scss/main.scss')
        .pipe(sass().on('error', function (error) {
            console.log('ERROR: ' + error);
        }))
        .pipe(rename('media-manager.min.css'))
        .pipe(cleanCss())
        .pipe(gulp.dest('../../public/vendor/kirillbdev/media-manager/css'));
        //.pipe(gulp.dest('install/assets/css'));
});

gulp.task('watch-scss', function () {
    gulp.watch('resources/scss/**/*.scss', gulp.series('compile-scss'));
});