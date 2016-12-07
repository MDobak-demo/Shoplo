var gulp = require('gulp');

gulp.task('install-bootstrap', function() {
    gulp.src('./node_modules/bootstrap/dist/**')
        .pipe(gulp.dest('./web/lib/bootstrap'))
});

gulp.task('install-jquery', function() {
    gulp.src('./node_modules/jquery/dist/**')
        .pipe(gulp.dest('./web/lib/jquery'))
});

gulp.task('install', ['install-bootstrap', 'install-jquery']);
gulp.task('default', []);
