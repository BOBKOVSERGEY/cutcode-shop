/**
 * Variables & path
 */
let preprocessor = 'sass', // Preprocessor (sass, scss, less, styl)
  imageswatch = 'jpg,jpeg,png,webp,svg,gif', // List of images extensions for watching & compression (comma separated)
  sourceDir = 'app', // Source directory path without «/» at the end
  projectDir = 'dist', // Dist directory path without «/» at the end
  online = true; // If «false» - Browsersync will work offline without internet connection

/**
 * Project path
 */
let path = {
  build: {
    html: projectDir + '/',
    css: projectDir + '/css/',
    js: projectDir + '/js/',
    img: projectDir + '/images/',
    fonts: projectDir + '/fonts/',
  },
  src: {
    html: [sourceDir + '/*.html', '!' + sourceDir + '/_*.html'],
    css: sourceDir + '/' + preprocessor + '/**/*.' + preprocessor,
    // js: [sourceDir + '/js/app.js', sourceDir + '/js/vendors.js'],
    js: sourceDir + '/js/*.js',
    img: sourceDir + '/images/**/*.{' + imageswatch + '}',
    fonts: sourceDir + '/fonts/*.ttf',
  },
  watch: {
    html: sourceDir + '/**/*.html',
    css: sourceDir + '/' + preprocessor + '/**/*.' + preprocessor,
    js: sourceDir + '/js/**/*.js',
    img: sourceDir + '/images/**/*.{' + imageswatch + '}',
    svgIcons: sourceDir + '/svg-icons/*.svg',
  },
  clean: ['./' + projectDir + '/**', '!./' + projectDir, '!./' + projectDir + '/fonts'],
};

/**
 * Logic
 */
const { src, dest } = require('gulp');
const gulp = require('gulp');
const browsersync = require('browser-sync').create();
const babel = require('gulp-babel');
const fileinclude = require('gulp-file-include');
const del = require('del');
const sass = require('gulp-sass')(require('sass'));
const scss = require('gulp-sass')(require('sass'));
const cleancss = require('gulp-clean-css');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify-es').default;
const rename = require('gulp-rename');
const autoprefixer = require('gulp-autoprefixer');
const mediaqueries = require('gulp-group-css-media-queries');
const imagemin = require('gulp-imagemin');
const newer = require('gulp-newer');
const svgsprite = require('gulp-svg-sprite');
const cheerio = require('gulp-cheerio');
const ttf2woff = require('gulp-ttf2woff');
const ttf2woff2 = require('gulp-ttf2woff2');

/**
 * BrowserSync function
 */
function browserSync() {
  browsersync.init({
    server: { baseDir: './' + projectDir + '/' },
    notify: false,
    online: online,
  });
}

/**
 * Clean dist folder
 */
function clean() {
  return del(path.clean);
}

/**
 * HTML watch function
 */
function html() {
  return src(path.src.html)
    .pipe(fileinclude())
    .pipe(dest(path.build.html))
    .pipe(browsersync.stream());
}

/**
 * Styles watch functions
 */
function styles() {
  return src(path.src.css)
    .pipe(eval(preprocessor)())
    .pipe(mediaqueries())
    .pipe(autoprefixer({ overrideBrowserslist: ['last 10 versions'], grid: true }))
    .pipe(cleancss({ level: { 1: { specialComments: 0 } }, format: 'beautify' }))
    .pipe(dest(path.build.css))
    .pipe(browsersync.stream());
}

/**
 * JS watch function
 */
function scripts() {
  return (
    src(path.src.js)
      .pipe(fileinclude())
      // .pipe(babel())
      .pipe(dest(path.build.js))
      .pipe(browsersync.stream())
  );
}
// function scriptsMinify() {
// 	return src(path.src.js)
// 		.pipe(fileinclude())
// 		.pipe(rename({ extname: '.min.js'}))
// 		.pipe(uglify())
// 		.pipe(dest(path.build.js))
// 		.pipe(browsersync.stream())
// }

/**
 * Images watch function
 */
function images() {
  return src(path.src.img)
    .pipe(newer(path.build.img))
    .pipe(
      imagemin({
        progressive: true,
        svgoPlugins: [{ removeViewBox: false }],
        interlaced: true,
        optimizationLevel: 3, // 0 to 7
      }),
    )
    .pipe(dest(path.build.img));
}

/**
 * SVG Sprite generate function
 */
function svgSprite() {
  return src(path.watch.svgIcons)
    .pipe(
      svgsprite({
        mode: {
          symbol: {
            sprite: '../symbol-defs.svg',
          },
        },
      }),
    )
    .pipe(
      cheerio({
        run: function ($) {
          $('[fill]').removeAttr('fill');
          $('[stroke]').removeAttr('stroke');
          $('[style]').removeAttr('style');
          $('style').remove();
        },
        parserOptions: { xmlMode: true },
      }),
    )
    .pipe(dest(path.build.img));
}

/**
 * Fonts convertation function (.ttf -> .woff, .woff2)
 */
gulp.task('fonts', function () {
  // src(path.src.fonts).pipe(ttf2woff()).pipe(dest(path.build.fonts));
  return src(path.src.fonts).pipe(ttf2woff2()).pipe(dest(path.build.fonts));
});

/**
 * Watch files function
 */
function watchFiles() {
  gulp.watch([path.watch.html], { usePolling: true }, html);
  gulp.watch([path.watch.css], { usePolling: true }, styles);
  gulp.watch([path.watch.js], { usePolling: true }, scripts);
  gulp.watch([path.watch.img], { usePolling: true }, images);
  gulp.watch([path.watch.svgIcons], { usePolling: true }, svgSprite);
}

const build = gulp.series(clean, gulp.parallel(scripts, styles, html, images, svgSprite));
const watch = gulp.parallel(build, watchFiles, browserSync);

exports.svgSprite = svgSprite;
exports.images = images;
exports.clean = clean;
exports.scripts = scripts;
// exports.scriptsMinify = scriptsMinify;
exports.styles = styles;
exports.html = html;
exports.build = build;
exports.watch = watch;
exports.default = watch;
