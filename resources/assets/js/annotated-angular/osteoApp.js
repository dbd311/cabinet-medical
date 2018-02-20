angular.module('osteoApp', ['ngMaterial', 'WebCtrl'],
        ["$interpolateProvider", function ($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        }]).config(["$locationProvider", function ($locationProvider) {
    $locationProvider.html5Mode(true);
}]);

