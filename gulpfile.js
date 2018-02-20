var elixir = require('laravel-elixir'),
        gulp = require('gulp'),
        htmlmin = require('gulp-htmlmin');

var ngAnnotate = require('gulp-ng-annotate');
var webpack = require('laravel-elixir-webpack');


elixir.config.css.cssnano.pluginOptions = {
    discardComments: {
        removeAll: true
    }
};


elixir.extend('ngAnnotate', function () {
    new elixir.Task('ngAnnotate', function () {
        return gulp.src([
            'resources/assets/js/angular/*.js',
            'resources/assets/js/angular/**/*.js'
        ])
                .pipe(ngAnnotate())
                .pipe(gulp.dest('resources/assets/js/annotated-angular'));
    });
});


// define a new task dedicated to compress output HTML views
elixir.extend('compress', function () {
    new elixir.Task('compress', function () {
        return gulp.src('./storage/framework/views/*')
                .pipe(htmlmin({
                    collapseWhitespace: true,
                    removeAttributeQuotes: true,
                    removeComments: true,
                    minifyJS: true,
                }))
                .pipe(gulp.dest('./storage/framework/views/'));
    })
            .watch('./storage/framework/views/*');
});
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */


var generalLayoutCSS = 'public/css/style.min.css';
var loaderCSS = 'public/css/loader.min.css';
var adminSpaceCSS = 'public/css/admin/admin_space.min.css'
var adminCSS = 'public/css/cpanel/admin/style.css';
var authCSS = 'public/css/auth.min.css';
var diversCSS = 'public/css/divers.min.css';
var agendaCSS = 'public/css/cpanel/agenda/style.css';


var osteoJS = 'public/js/app.min.js';
var adminSpaceJS = 'public/js/cpanel/admin/admin_space.js';
var adminJS = 'public/js/admin/main.js';
var authJS = 'public/js/auth.min.js';
var diversJS = 'public/js/divers.min.js';
var remboursementJS = 'public/js/reimbursements.min.js';
var agendaJS = 'public/js/cpanel/agenda/main.js';




elixir(function (mix) {

    // annotate angular javascripts
    console.log('*** Annotating Angular modules ...')
    mix.ngAnnotate();

    // copy fonts under root
    console.log('*** Copying fonts awesome ...')
    mix.copy('node_modules/font-awesome/fonts', 'public/fonts');
    mix.copy('node_modules/font-awesome/fonts', 'public/css/cpanel');


    // combine plain css under assets/css
    mix.styles([
        '../../../node_modules/bootstrap/dist/css/bootstrap.min.css', // bootstrap 4
        '../../../node_modules/font-awesome/css/font-awesome.min.css',
        '../../../node_modules/angular-material/angular-material.min.css',
        'osteo.css',
        'navbar_vertical.css'
    ], generalLayoutCSS);

    // home page
    mix.styles([
        'loader.css'
    ], loaderCSS);



//    mix.styles([
//        'pages/home.css'
//    ], 'public/css/pages/home.min.css');

    // combine javascripts under assets/js
    console.log('*** Combining JQuery, BootStrap and AngularJS ...')
    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/tether/dist/js/tether.min.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.min.js',
        '../../../node_modules/angular/angular.min.js',
        '../../../node_modules/angular-animate/angular-animate.min.js',
        '../../../node_modules/angular-aria/angular-aria.min.js',
        '../../../node_modules/angular-material/angular-material.min.js',
        'annotated-angular/WebCtrl.js',
        'annotated-angular/osteoApp.js'
    ], osteoJS);


    /*************** Admin space ********************************/
// combine plain css under assets/css 
    // admin's agenda layout CSS
    mix.styles([
        '../../../node_modules/bootstrap/dist/css/bootstrap.min.css', // bootstrap 4
//        'admin/fullcalendar.min.css',
        '../../../node_modules/fullcalendar/dist/fullcalendar.min.css', // fullcalendar
        'agenda/paper.css',
        '../../../node_modules/font-awesome/css/font-awesome.min.css',
        'agenda/calendar.css' // datepicker
    ], adminCSS);


    mix.styles([
        '../../../node_modules/bootstrap/dist/css/bootstrap.min.css', // bootstrap 4
        '../../../node_modules/font-awesome/css/font-awesome.min.css',
        '../../../node_modules/angular-material/angular-material.min.css',
        'osteo.css',
        'navbar_vertical.css'
    ], adminSpaceCSS);


    // combine javascripts under assets/js
    mix.scripts([
//        '../../../node_modules/bootstrap/node_modules/jquery/dist/jquery.min.js',
//        '../../../node_modules/bootstrap/node_modules/tether/dist/js/tether.min.js',
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/tether/dist/js/tether.min.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.min.js',
        '../../../node_modules/angular/angular.min.js',
        '../../../node_modules/angular-animate/angular-animate.min.js',
        '../../../node_modules/angular-aria/angular-aria.min.js',
        '../../../node_modules/angular-material/angular-material.min.js',
        'annotated-angular/WebCtrl.js',
        'annotated-angular/osteoApp.js'
    ], adminJS);



    mix.scripts([
//        'jquery/2.1.4/jquery.min.js',
        '../../../node_modules/jquery/dist/jquery.min.js',
        'jquery/ui/1.11.0/jquery-ui.js',
        '../../../node_modules/tether/dist/js/tether.min.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.min.js',
        'agenda/moment.js',
//        'agenda/fullcalendar.min.js'        
        '../../../node_modules/fullcalendar/dist/fullcalendar.min.js', // fullcalendar
        '../../../node_modules/fullcalendar/dist/locale/fr.js', // lang-fr
        'agenda/admin/header.js'
    ], adminSpaceJS);


    /*************** Patient (auth) space ********************************/
// combine plain css under assets/css 
    mix.styles([
        '../../../node_modules/bootstrap/dist/css/bootstrap.min.css', // bootstrap 4
        '../../../node_modules/font-awesome/css/font-awesome.min.css',
        '../../../node_modules/angular-material/angular-material.min.css',
        'osteo.css',
        'navbar_vertical.css'
    ], authCSS);



    // combine javascripts under assets/js
    mix.scripts([
        //        '../../../node_modules/bootstrap/node_modules/jquery/dist/jquery.min.js',
//        '../../../node_modules/bootstrap/node_modules/tether/dist/js/tether.min.js',
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/tether/dist/js/tether.min.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.min.js',
        '../../../node_modules/angular/angular.min.js',
        '../../../node_modules/angular-animate/angular-animate.min.js',
        '../../../node_modules/angular-aria/angular-aria.min.js',
        '../../../node_modules/angular-material/angular-material.min.js',
        'annotated-angular/WebCtrl.js',
        'annotated-angular/osteoApp.js'
    ], authJS);


    // page /divers
    // combine plain css under assets/css
    mix.styles([
        '../../../node_modules/bootstrap/dist/css/bootstrap.min.css', // bootstrap 4
        '../../../node_modules/font-awesome/css/font-awesome.min.css',
        '../../../node_modules/angular-material/angular-material.min.css',
        'osteo.css',
        'navbar_vertical.css',
        'jssor_slider.css'
    ], diversCSS);


    mix.scripts([
        //        '../../../node_modules/bootstrap/node_modules/jquery/dist/jquery.min.js',
//        '../../../node_modules/bootstrap/node_modules/tether/dist/js/tether.min.js',
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/tether/dist/js/tether.min.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.min.js',
        '../../../node_modules/angular/angular.min.js',
        '../../../node_modules/angular-animate/angular-animate.min.js',
        '../../../node_modules/angular-aria/angular-aria.min.js',
        '../../../node_modules/angular-material/angular-material.min.js',
        'jssor/jssor.js',
        'jssor/jssor.slider.js',
        'jssor/jssor.slider2.js',
        'annotated-angular/WebCtrl.js',
        'annotated-angular/osteoApp.js'
    ], diversJS);



    // combine javascripts under assets/js for tarifs
    mix.scripts([
        //        '../../../node_modules/bootstrap/node_modules/jquery/dist/jquery.min.js',
//        '../../../node_modules/bootstrap/node_modules/tether/dist/js/tether.min.js',
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/tether/dist/js/tether.min.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.min.js',
        '../../../node_modules/angular/angular.min.js',
        '../../../node_modules/angular-animate/angular-animate.min.js',
        '../../../node_modules/angular-aria/angular-aria.min.js',
        '../../../node_modules/angular-sanitize/angular-sanitize.min.js',
        '../../../node_modules/angular-material/angular-material.min.js',
        'annotated-angular/components/tarifs/TarifsService.js',
        'annotated-angular/components/tarifs/TarifsCtrl.js',
        'annotated-angular/components/tarifs/reimbursementsApp.js'
    ], remboursementJS);


    // agenda CSS
    mix.styles([
        '../../../node_modules/bootstrap/dist/css/bootstrap.min.css', // bootstrap 4
        'agenda/paper.css',
        'agenda/core.css',
        'agenda/normalize.css',
        'agenda/calendar.css', // datepicker        
    ], agendaCSS);


    // agenda JS
    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/tether/dist/js/tether.min.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.min.js',
        'agenda/jquery-ui.custom/jquery-ui.js',
        'agenda/moment.js',
        'agenda/vendor/modernizr.js'

    ], agendaJS);


    mix.version([generalLayoutCSS, loaderCSS, adminCSS, adminSpaceCSS, authCSS, diversCSS]);
    mix.version([osteoJS, adminJS, adminSpaceJS, authJS, diversJS, remboursementJS, agendaJS]);

    // agenda calendar JS
    mix.copy('resources/assets/js/agenda/calendar.js', 'public/js/cpanel/agenda');
    mix.version('/js/cpanel/agenda/calendar.js');

    // appointments JS
    mix.copy('resources/assets/js/agenda/admin/appointments.js', 'public/js/cpanel/agenda/admin');
    mix.version('/js/cpanel/agenda/admin/appointments.js');

    mix.copy('resources/assets/js/agenda/admin/delete-appointment.js', 'public/js/cpanel/agenda/admin');
    mix.version('/js/cpanel/agenda/admin/delete-appointment.js');

    mix.copy('resources/assets/js/agenda/admin/planning.js', 'public/js/cpanel/agenda/admin');
    mix.version('/js/cpanel/agenda/admin/planning.js');

    mix.copy('resources/assets/js/agenda/admin/availability.js', 'public/js/cpanel/agenda');
    mix.version('/js/cpanel/agenda/availability.js');

    mix.copy('resources/assets/js/agenda/admin/sms.js', 'public/js/cpanel/agenda');
    mix.version('/js/cpanel/agenda/sms.js');

    // compress and minify views
//    mix.compress();    
});