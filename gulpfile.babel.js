import gulp from 'gulp';
import babel from 'gulp-babel';
import concat from 'gulp-concat';
import inject from 'gulp-inject';
import gutil from 'gulp-util';
import imagemin from 'gulp-imagemin';
import autoprefixer from 'gulp-autoprefixer';
import del from 'del';
import sass from 'gulp-sass';
import header from 'gulp-header';
import cleanCSS from 'gulp-clean-css';
import rename from 'gulp-rename';
import sassLint from 'gulp-sass-lint';
import eslint from 'gulp-eslint';
import pkg from './package.json';
import browserSync from 'browser-sync';
import uglify from 'gulp-uglify';
import sourcemaps from 'gulp-sourcemaps';
import wiredep from 'wiredep';
import urlAdjuster from 'gulp-css-url-adjuster';
import bowerlibs from 'main-bower-files';
import phpConnect from 'gulp-connect-php';

/**
 * Browser Support declaration
 * @type {string[]}
 */
const AUTO_PREFIX_BROWSERS = [
  'ie >= 10',
  'ie_mob >= 10',
  'ff >= 30',
  'chrome >= 34',
  'safari >= 7',
  'opera >= 23',
  'ios >= 7',
  'android >= 4.4',
  'bb >= 10'
];

/**
 * Banner for the compiled CSS files
 * @type {string}
 */
const banner = [
  '/*! ========================================================================= *\n',
  ' *  <%= pkg.title %> \n',
  ' *  ========================================================================= *\n',
  ' *  Version: <%= pkg.version %>\n',
  ' *  Author: <%= pkg.author %>\n',
  ' *  ========================================================================= *\n',
  ' *  GitHub Repo: <%= pkg.repository.url %>\n',
  ' *  ========================================================================= *\n',
  ' *  Copyright Ⓒ ' + new Date().getFullYear(),
  '\n',
  ' *  Licensed under <%= pkg.license %>\n',
  ' *  ========================================================================= *\n',
  ' */\n\n',
  ''
].join('');

const CONFIG = {
  filenames: {
    dev: {
      scripts: 'main.js',
      bowerJS: 'vendor.js',
      bowerCSS: 'vendor.css',
      styles: 'styles.css'
    },
    prod: {
      scripts: 'main.bundle.js',
      bowerJS: 'vendor.bundle.js',
      bowerCSS: 'vendor.bundle.css',
      styles: 'styles.bundle.css'
    }
  },
  paths: {
    dev: {
      root: 'dev',
      scripts: 'dev/js',
      styles: 'dev/css',
      pages: 'dev/pages',
      components: 'dev/components',
      assets: 'dev/assets',
      fonts: 'dev/assets/fonts',
      composer: 'dev/vendor'
    },
    src: {
      root: 'src',
      scripts: 'src/scripts',
      styles: 'src/sass',
      pages: 'src/pages',
      components: 'src/components',
      index: 'src/index.php',
      assets: 'src/assets',
      fonts: 'src/assets/fonts',
      bower: 'src/bower_components',
      composer: 'src/vendor'
    },
    prod: {
      root: 'dist',
      scripts: 'dist/js',
      styles: 'dist/css',
      pages: 'dist/pages',
      assets: 'dist/assets',
      fonts: 'dist/assets/fonts',
      components: 'dist/components',
      composer: 'dist/vendor'
    }
  },
  settings: {
    dev: {
      proxy: '127.0.0.1:8010',
      tunnel: 8010,
      port: 8000
    },
    prod: {
      proxy: '127.0.0.1:8010',
      tunnel: 8010,
      port: 3000
    }
  }
};

gulp.task('scripts:build', () => {
  return gulp
    .src([`${CONFIG.paths.src.scripts}/**/*.js`, `!${CONFIG.paths.src.scripts}/**/*.test.js`])
    .pipe(gutil.env.env === 'production' ? gutil.noop() : sourcemaps.init())
    .pipe(
      babel({
        presets: ['@babel/env']
      })
    )
    .pipe(gutil.env.env === 'production' ? gutil.noop() : sourcemaps.write())
    .pipe(gutil.env.env === 'production' ? concat(CONFIG.filenames.prod.scripts) : gutil.noop())
    .pipe(gutil.env.env === 'production' ? uglify() : gutil.noop())
    .pipe(
      gutil.env.env === 'production'
        ? rename({
          suffix: '.min'
        })
        : gutil.noop()
    )
    .pipe(
      gutil.env.env === 'production'
        ? header(banner, {
          pkg: pkg
        })
        : gutil.noop()
    )
    .pipe(
      gutil.env.env === 'production'
        ? gulp.dest(`${CONFIG.paths.prod.scripts}`)
        : gulp.dest(`${CONFIG.paths.dev.scripts}`)
    );
});

gulp.task('scripts:lint', () => {
  return gulp
    .src(`${CONFIG.paths.src.scripts}/**/*.js`)
    .pipe(eslint())
    .pipe(eslint.format());
});

gulp.task('styles:build', () => {
  return gulp
    .src(`${CONFIG.paths.src.styles}/**/*.s+(a|c)ss`)
    .pipe(gutil.env.env === 'production' ? gutil.noop() : sourcemaps.init())
    .pipe(
      sass({
        outputStyle: 'nested',
        precision: 10,
        includePaths: ['.'],
        onError: console.error.bind(console, 'Sass error:')
      })
    )
    .pipe(gutil.env.env === 'production' ? gutil.noop() : sourcemaps.write())
    .pipe(autoprefixer({ browsers: AUTO_PREFIX_BROWSERS }))
    .pipe(
      urlAdjuster({
        prependRelative: '../'
      })
    )
    .pipe(
      gutil.env.env === 'production'
        ? concat(CONFIG.filenames.prod.styles)
        : concat(CONFIG.filenames.dev.styles)
    )
    .pipe(
      gutil.env.env === 'production'
        ? header(banner, {
          pkg: pkg
        })
        : gutil.noop()
    )
    .pipe(gutil.env.env === 'production' ? cleanCSS() : gutil.noop())
    .pipe(
      gutil.env.env === 'production'
        ? rename({
          suffix: '.min'
        })
        : gutil.noop()
    )
    .pipe(
      gutil.env.env === 'production'
        ? gulp.dest(CONFIG.paths.prod.styles)
        : gulp.dest(CONFIG.paths.dev.styles)
    )
    .pipe(browserSync.stream());
});

gulp.task('styles:lint', () => {
  return gulp
    .src(`${CONFIG.paths.src.root}/**/*.s+(a|c)ss`)
    .pipe(
      sassLint({
        options: {
          formatter: 'stylish',
          'merge-default-rules': false
        },
        files: { ignore: 'node_modules/!**!/!*.s+(a|c)ss' },
        rules: {
          'no-ids': 1,
          'no-mergeable-selectors': 0
        },
        configFile: '.sass-lint.yml'
      })
    )
    .pipe(sassLint.format());
});

gulp.task('clean', () => {
  if (gutil.env.env === 'production') {
    return del(CONFIG.paths.prod.root);
  }
  if (gutil.env.env === 'development') {
    return del(CONFIG.paths.dev.root);
  }
  if (gutil.env.env === 'all') {
    return del([CONFIG.paths.dev.root, CONFIG.paths.prod.root]);
  }
  return del([CONFIG.paths.dev.root, CONFIG.paths.prod.root]);
});

gulp.task('move:assets', () => {
  return gulp
    .src([`${CONFIG.paths.src.assets}/**/*`], { base: CONFIG.paths.src.root })
    .pipe(gutil.env.env === 'production' ? imagemin() : gutil.noop())
    .pipe(
      gutil.env.env === 'production'
        ? gulp.dest(CONFIG.paths.prod.root)
        : gulp.dest(CONFIG.paths.dev.root)
    );
});

gulp.task('move:bower:fonts', () => {
  return gulp
    .src(bowerlibs('**/*.{eot,svg,ttf,woff,woff2}'))
    .pipe(
      gutil.env.env === 'production'
        ? gulp.dest(CONFIG.paths.prod.fonts)
        : gulp.dest(CONFIG.paths.dev.fonts)
    );
});

gulp.task('move:composer:deps', () => {
  return gulp
    .src([`${CONFIG.paths.src.composer}/**/*`], { base: CONFIG.paths.src.root })
    .pipe(
      gutil.env.env === 'production'
        ? gulp.dest(CONFIG.paths.prod.composer)
        : gulp.dest(CONFIG.paths.dev.composer)
    );
});

gulp.task('bundle:bower', () => {
  let target = gulp.src(
    [
      CONFIG.paths.src.index,
      `${CONFIG.paths.src.components}/**/*.{html|jade|php}`,
      `${CONFIG.paths.src.pages}/**/*.{html|jade|php}`
    ],
    { base: CONFIG.paths.src.root }
  );

  let js = gulp.src(wiredep().js);
  let css = gulp.src(wiredep().css);

  return target
    .pipe(
      inject(
        js
          .pipe(
            concat(
              gutil.env.env === 'production'
                ? CONFIG.filenames.prod.bowerJS
                : CONFIG.filenames.dev.bowerJS
            )
          )
          .pipe(
            gutil.env.env === 'production'
              ? gulp.dest(CONFIG.paths.prod.scripts)
              : gulp.dest(CONFIG.paths.dev.scripts)
          )
      )
    )
    .pipe(
      inject(
        css
          .pipe(
            concat(
              gutil.env.env === 'production'
                ? CONFIG.filenames.prod.bowerCSS
                : CONFIG.filenames.dev.bowerCSS
            )
          )
          .pipe(
            urlAdjuster({
              replace: ['../fonts', '../assets/fonts']
            })
          )
          .pipe(
            gutil.env.env === 'production'
              ? gulp.dest(CONFIG.paths.prod.styles)
              : gulp.dest(CONFIG.paths.dev.styles)
          )
      )
    );
});

gulp.task('inject', () => {
  let target = gulp.src(
    [
      `${CONFIG.paths.src.root}/**/*.html`,
      `${CONFIG.paths.src.root}/**/*.jade`,
      `${CONFIG.paths.src.root}/**/*.php`,
      `!${CONFIG.paths.src.bower}/**/*`
    ],
    { base: CONFIG.paths.src.root }
  );

  let devSources = gulp.src(
    [
      `${CONFIG.paths.dev.scripts}/**/*.js`,
      `${CONFIG.paths.dev.styles}/**/*.css`,
      `!${CONFIG.paths.dev.scripts}/**/*.test.js`
    ],
    {
      read: false
    }
  );

  let devInjectionOptions = {
    ignorePath: CONFIG.paths.dev.root,
    addRootSlash: false
  };

  let prodSources = gulp.src(
    [
      `${CONFIG.paths.prod.scripts}/**/*.js`,
      `${CONFIG.paths.prod.styles}/**/*.css`,
      `!${CONFIG.paths.prod.scripts}/**/*.test.js`
    ],
    { read: false }
  );

  let prodInjectionOptions = {
    ignorePath: CONFIG.paths.prod.root,
    addRootSlash: false
  };

  return target
    .pipe(
      gutil.env.env === 'production'
        ? inject(prodSources, prodInjectionOptions)
        : inject(devSources, devInjectionOptions)
    )
    .pipe(
      gutil.env.env === 'production'
        ? gulp.dest(CONFIG.paths.prod.root)
        : gulp.dest(CONFIG.paths.dev.root)
    );
});

gulp.task(
  'build',
  gulp.series(
    'move:composer:deps',
    'move:assets',
    'move:bower:fonts',
    gulp.parallel('scripts:build', 'styles:build'),
    'bundle:bower',
    'inject'
  ),
  callback => {
    callback();
  }
);

gulp.task('php', callback => {
  let root = CONFIG.paths.dev.root;
  let port = CONFIG.settings.dev.tunnel;

  if (gutil.env.env === 'production') {
    root = CONFIG.paths.prod.root;
    port = CONFIG.settings.prod.tunnel;
  }

  phpConnect.server({
    base: root,
    port: port,
    keepalive: true
  });
  callback();
});

gulp.task('browserSync', callback => {
  let proxy = CONFIG.settings.dev.proxy;
  let port = CONFIG.settings.dev.port;

  if (gutil.env.env === 'production') {
    proxy = CONFIG.settings.prod.proxy;
    port = CONFIG.settings.prod.port;
  }

  browserSync.init({
    proxy: proxy,
    port: port,
    open: true,
    notify: false
  });
  callback();
});

gulp.task('watch:styles', () => {
  gulp.watch(`${CONFIG.paths.src.styles}/**/*.s+(a|c)ss`, gulp.series('styles:build'));
});

gulp.task('watch:scripts', () => {
  gulp
    .watch(`${CONFIG.paths.src.scripts}/**/*.js`, gulp.series('scripts:build'))
    .on('change', browserSync.reload);
});

gulp.task('watch:pages', () => {
  gulp
    .watch(
      [
        `${CONFIG.paths.src.root}/**/*.php`,
        `${CONFIG.paths.src.root}/**/*.html`,
        `${CONFIG.paths.src.root}/**/*.jade`
      ],
      gulp.series('inject')
    )
    .on('change', browserSync.reload);
});

gulp.task('watch:assets', () => {
  gulp
    .watch(`${CONFIG.paths.src.assets}/**/*`, gulp.series('move:assets'))
    .on('change', browserSync.reload);
});

gulp.task('watch', gulp.parallel('watch:styles', 'watch:scripts', 'watch:pages', 'watch:assets'));

gulp.task('serve', gulp.series('browserSync', 'php', 'watch'));
