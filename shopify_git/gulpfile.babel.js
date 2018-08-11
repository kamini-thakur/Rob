const param = require('gulp-param')(require('gulp'), process.argv),
  gulp = require('gulp-help')(param, {
    hideEmpty: true
  }),
  browsersync = require('browser-sync').create(),
  watch = require('gulp-watch'),
  webpack = require('gulp-webpack'),
  plumber = require('gulp-plumber'),
  yaml = require('read-yaml'),
  theme = require('@shopify/themekit').command,
  clear = require('clear'),
  gutil = require('gulp-util'),
  restart = require('gulp-restart'),
  serve = require('static-proxy-middleware')

/**
 * Help
 */

/**
* Jobs
*/
gulp.task('build', ['webpack'])
gulp.task('default', ['help'])

clear()

/**
 * Globals
 */
const config = yaml.sync('config.yml')

/**
 * Watch
 */
gulp.task('watch', 'Watch directory for changes and update remote theme', [], function(env) {

  var env = env || 'development',
    cfg = config[env]

  // Theme Kit
  theme({
    args: ['watch', '-e', env, '-c', 'config.yml']
  }, function(err) {
    return gutil.log(err ? err : 'Theme Kit command has completed')
  })

  browsersync.init({
    open: false,
    port: 3000,
    ghostMode: false,
    reloadDelay: 1000,
    proxy: cfg.preview,
    middleware: serve('./theme', [
      {
        // matches every request that has the 'public' substring
        match: /.*app\.js.*/g,
        // replace 'public' with 'assets' (optional)
        fn: function(m) {
          gutil.log('Serving local file...')
          return '/assets/app.js'
        }
      }
    ])
  // rewriteRules: [
  //   {
  //     match: /.*app\.js.*/g,
  //     fn: function(matched) {
  //       gutil.log('Serving local file...')
  //       return '/assets/app.js'
  //     }
  //   }
  // ]
  })

  // gulp.watch(['./assets/sass/**/*.scss'], ['sass']);
  // gulp.watch(['./*.php']).on('change', browsersync.reload);
  // watch(['./assets/js/**/*.js'], {}, () => {
  //   gulp.start(['js'])
  // })

  watch(['./app/**/*'], {}, browsersync.reload)
  gulp.watch(['./app/**/*'], ['webpack']);

// Restart Gulp
// gulp.watch(['./gulpfile.babel.js', './webpack.*.js'], restart)
}, {
  options: {
    'env': 'Defaults to "development". [development|staging|production]'
  }
});

/**
 * Webpack
 */
gulp.task('webpack', function(done) {
  return gulp.src('./app/main.js')
    .pipe(plumber())
    .pipe(webpack(require('./webpack.config.js')))
    .pipe(gulp.dest('./theme/assets'))
    .pipe(browsersync.stream())
    .on('end', () => {
      // browsersync.reload()
    })
})
