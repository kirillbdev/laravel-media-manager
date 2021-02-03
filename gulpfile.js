let gulp = require('gulp'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    cleanCss = require('gulp-clean-css'),
    autoPrefixer = require('gulp-autoprefixer');

gulp.task('compile-scss', function () {
    return gulp.src('resources/scss/main.scss')
        .pipe(sass().on('error', function (error) {
            console.log('ERROR: ' + error);
        }))
        .pipe(autoPrefixer())
        .pipe(rename('admin.min.css'))
        .pipe(cleanCss())
        .pipe(gulp.dest('../../public/css/idea'))
        .pipe(gulp.dest('install/assets/css'));
});

// Login

gulp.task('compile-login-scss', function () {
    return gulp.src('resources/scss/auth/main.scss')
        .pipe(sass().on('error', function (error) {
            console.log('ERROR: ' + error);
        }))
        .pipe(autoPrefixer())
        .pipe(rename('login.min.css'))
        .pipe(cleanCss())
        .pipe(gulp.dest('../public/css/idea'));
        //.pipe(gulp.dest('install/assets/css'));
});

gulp.task('watch-login-scss', function () {
    gulp.watch('resources/scss/auth/**/*.scss', gulp.series('compile-login-scss'));
});

gulp.task('watch-scss', function () {
    gulp.watch('resources/scss/**/*.scss', gulp.series('compile-scss'));
});