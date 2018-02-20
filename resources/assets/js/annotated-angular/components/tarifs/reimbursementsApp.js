angular.module('reimbursementsApp', ['ngMaterial', 'ngSanitize', 'TarifsCtrl', 'TarifsService'],
        ["$interpolateProvider", function ($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        }]).config(["$locationProvider", function ($locationProvider) {
    $locationProvider.html5Mode(true);
}]);

