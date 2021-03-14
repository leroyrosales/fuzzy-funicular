// -------------------
// Gulp.js config
// -------------------
'use strict';

// -------------------
// Parts of Gulp
// -------------------
const { dest, task, parallel, series, src, watch } = require('gulp');


// -------------------
// Dir and folder
// -------------------
const dir = {
    src         : './static/',
    lib         : './static/lib/',
    build        : './assets/',
    bootstrap     : './node_modules/bootstrap'
},

// -------------------
// Gulp plugins
// -------------------
concat         = require('gulp-concat'),
deporder       = require('gulp-deporder'),
eslint         = require('gulp-eslint'),
imagemin       = require('gulp-imagemin'),
newer         = require('gulp-newer'),
postcss        = require('gulp-postcss'),
scss          = require('gulp-sass'),
stylelint       = require('gulp-stylelint'),
stripdebug      = require('gulp-strip-debug'),
terser         = require('gulp-terser');

const autoprefixer = require('autoprefixer');

// -------------------
// Font functions
// -------------------
// Font settings
const fonts = {
    src           : dir.src + 'fonts/**/*.*',
    build         : dir.build + 'fonts/'
};

// Copy Font files
function copyFonts() {
    return src(fonts.src)
        .pipe(newer(fonts.build))
        .pipe(dest(fonts.build));
}

// -------------------
// Image functions
// -------------------
// Image settings
const images = {
    src         : dir.src + 'images/**/*',
    build       : dir.build + 'images/'
};

// Image processing
function copyImages() {
    return src(images.src)
    .pipe(newer(images.build))
    .pipe(imagemin({
    svgoPlugins: [
        {
        removeViewBox: false
        }
    ]
    }))
    .pipe(dest(images.build));
}

// -------------------
// SCSS functions
// -------------------
// SCSS settings
const css = {
    src         : dir.src + 'scss/**/*.scss',
    build       : dir.build + 'css/'
};

// List .scss files. See .stylelintrc for config
function lintScssWatch() {
    return src(['static/assets/**/*.scss', 'static/assets/*.scss']).pipe(
        stylelint({
            failAfterError: false,
            reporters: [{ formatter: 'string', console: true }],
        })
    );
}

function lintScssBuild() {
return src(['static/assets/**/*.scss', 'static/assets/*.scss']).pipe(
    stylelint({
    failAfterError: true,
    reporters: [{ formatter: 'string', console: true }],
    })
);
}

function prefixCSS() {
    return src('assets/css/*.css')
      .pipe(
        postcss([
          autoprefixer({
            cascade: false,
          }),
        ])
      )
      .pipe(dest('assets/css/'));
}

// Compile and concatenate scss to minified css
function compCatCss() {
    return src(['static/scss/**/*.scss', 'static/scss/*.scss'])
      .pipe(scss({ outputStyle: 'compressed' }).on('error', scss.logError))
      .pipe(concat('emerus-poly-theme.min.css'))
      .pipe(dest('assets/css'));
}

// -------------------
// JS functions
// -------------------
// JavaScript settings
const js = {
    src         : dir.src + 'js/**.js',
    build       : dir.build + 'js/',
    filename    : 'emerus-poly-theme.min.js'
};

// JavaScript processing
function processJS() {
    return src([
        js.src,
    ])
    .pipe(deporder())
    .pipe(stripdebug())
    .pipe(terser())
    .pipe(concat(js.filename))
    .pipe(dest(js.build))
};


// -------------------
// Tasks
// -------------------
// Watch function
function watchFiles() {

    // Style changes
    watch(css.src, compCatCss);

    // Font changes
    watch(fonts.src, { events: 'all' }, copyFonts);

    // Image changes
    watch(images.src, { events: 'all' }, copyImages);

    // JS changes
    watch(js.src, processJS);
}

// Watch tasks
// eslint-disable-next-line import/no-commonjs
task( "watch", watchFiles );

// Default tasks
// eslint-disable-next-line import/no-commonjs
task( "default", parallel(
    lintScssWatch,
    lintScssBuild,
    compCatCss,
    prefixCSS,
    copyFonts,
    copyImages,
    processJS
));
