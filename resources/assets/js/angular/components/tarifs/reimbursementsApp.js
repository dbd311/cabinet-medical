angular.module('reimbursementsApp', ['ngMaterial', 'ngSanitize', 'TarifsCtrl', 'TarifsService'],
        function ($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        }).config(function ($locationProvider) {
    $locationProvider.html5Mode(true);
});

