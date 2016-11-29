var gulp = require('gulp');
var less = require('gulp-less');
var path = require('path');
var minifyCSS = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var gulpif = require('gulp-if');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var del = require('del');
var imagemin = require('gulp-imagemin');
var autoprefixer = require('gulp-autoprefixer');
var gulpIgnore = require('gulp-ignore');
var rename = require("gulp-rename");


var env = process.env.NODE_ENV || 'dev';
//NODE_ENV=production gulp //dev or production

var paths = {
  scripts: [
    'src/js/main.js',
    'templates/*/scripts.js',
  ],
  fonts: [
  	'src/bower_components/bootstrap/fonts/*',
  	'src/bower_components/fontawesome/fonts/*'
  ],
  vendor_scripts: [
    'src/bower_components/fancybox/source/jquery.fancybox.pack.js',
    'src/bower_components/bootstrap/dist/js/bootstrap.min.js',
    'src/bower_components/picturefill/dist/picturefill.min.js',
    'src/bower_components/flickity/dist/flickity.pkgd.min.js',
    'src/bower_components/parallax.js/parallax.min.js',
    'src/bower_components/matchHeight/dist/jquery.matchHeight-min.js'
  ],
  uglify_scripts: [],
  images: [
    'src/img/**/*',
    '!src/img_bucket/**',
    '!src/bower_components/**'
  ],
  copy: [
    'src/.gitignore',
  ],

};


gulp.task('copy', function() {
  return gulp.src(paths.copy).pipe(gulp.dest('.'));
});

gulp.task('less', function() {
 gulp.src([
    'templates/*/style.less',
    'src/less/style.less',
  ])
  .pipe(concat('style.less'))
    .pipe(less({
      relativeUrls: false
    }))
    .pipe(autoprefixer())
    .pipe(minifyCSS({
      'rebase' : false
    }))
    .pipe(gulp.dest('.'))
  ;


});

function needsToBeUglified(file){
  paths.uglify_scripts.forEach(function(el) {
    if(file.path.indexOf(el) !== -1){
      console.log('uglified: ' + el);
      return true;
    }
  });
  return false;
}

gulp.task('js_assets', function() {
	gulp.src(paths.vendor_scripts)
  .pipe(gulpif(needsToBeUglified, uglify()))
  .pipe(concat('assets.min.js'))
  .pipe(gulp.dest('./js'));

  gulp.src('src/bower_components/modernizr/modernizr.js')
  .pipe(uglify())
  .pipe(rename('modernizr.min.js'))
  .pipe(gulp.dest('./js'));

});

gulp.task('js', function() {
	gulp.src(paths.scripts)
      .pipe(gulpif(env === 'dev', sourcemaps.init()))
      .pipe(uglify())
      .pipe(concat('main.min.js'))
      .pipe(gulpif(env === 'dev', sourcemaps.write()))
      .pipe(gulp.dest('./js'));
});

gulp.task('images', function() {
  return gulp.src(paths.images)
    .pipe(imagemin({optimizationLevel: 5}))
    .pipe(gulp.dest('./img'));
});

gulp.task('fonts', function() {
	return gulp.src(paths.fonts)
    .pipe(gulp.dest('./font'));
});

gulp.task('watch', function(){
	   gulp.watch(paths.copy, ['copy']);
  gulp.watch(['src/less/**/*.less'], ['less']);
   gulp.watch(['templates/*/style.less'], ['less']);
   gulp.watch(paths.scripts, ['js']);
   gulp.watch(paths.images, ['images']);
	
});

gulp.task('default', ['watch', 'copy', 'less', 'js_assets', 'js', 'images', 'fonts']);

