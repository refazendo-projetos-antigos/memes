const { src, dest, parallel, watch } = require('gulp');
const gulpSass = require('gulp-sass');

const files = {
  sass: {
    path: 'sources/sass/**/*.sass',
    dest: 'public/css/',
    concat: 'app.css',
  },
  images: {
    path: 'sources/images/**/*',
    dest: 'public/images/',
  },
}

function sass() {
  return src(files.sass.path)
    .pipe(gulpSass({ outputStyle: 'compressed' }))
    // .pipe(concat(files.sass.concat))
    .pipe(dest(files.sass.dest))
}

function images() {
  return src(files.images.path)
    .pipe(gulpImages({
      pngquant: true,
      optipng: false,
      zopflipng: true,
      jpegRecompress: false,
      mozjpeg: true,
      guetzli: false,
      gifsicle: true,
      svgo: true,
      concurrent: 10,
      // quiet: true // defaults to false
    }))
    .pipe(dest(files.images.dest))
}

function sasswatch() {
  return watch(files.sass.path, sass);
}

exports.sass = sass;
exports.sasswatch = sasswatch;
exports.images = images;
exports.default = parallel(sass);
