'use strict';

var customOpts = {
  entries: [$.path.app],
  debug: true
};
var opts = $.assign({}, $.watchify.args, customOpts);
var b = $.watchify($.browserify(opts).transform($.babel.configure({
          presets: ["es2015"]
          
        }))); 


module.exports = function() {
  $.gulp.task('js.process', function() {
    return b.bundle()
    .on('error', $.gp.notify.onError(function(error) {
            console.log(123);
                return {
                    title: 'JS',
                    message:  error.message
                }
        }))
        .pipe($.source('bundle.js'))
        .pipe($.buffer())
        .pipe($.gp.sourcemaps.init({loadMaps: true})) 
        .pipe($.gp.sourcemaps.write(''))
        .pipe($.gulp.dest($.config.root + '/assets/js'))
  })
};

