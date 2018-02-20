/**
 * Services for ElasticSearch
 * @author Duy Dinh <dinhbaduy@gmail.com>
 * @date 25/07/2016
 */
angular.module('TarifsService', [])
        .factory('TarifsService', function ($http, $filter) {
            return {
                loadReimbursements: function (fileSuffix) {
                    var url = '/load-reimbursements/' + fileSuffix;
                    return $http.get(url);
                }
            };
        });