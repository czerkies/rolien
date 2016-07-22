'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass', function () {
  return gulp.src('www/css/*.scss')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('www/css/'));
});

gulp.task('sass:watch', function () {
  gulp.watch('www/css/*.scss', ['sass']);
});
