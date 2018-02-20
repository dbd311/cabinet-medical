/*** 
 * Web Controller
 */
angular.module('TarifsCtrl', [])
        .controller('TarifsCtrl', ["$scope", "TarifsService", function ($scope, TarifsService) {
            $scope.omcs = [];
            $scope.toggle = function (v) {
                v.showTail = !v.showTail;
            };

            /***
             * Load reimbursement details
             * @param {type} element
             * @returns {undefined}
             */
            $scope.loadReimbursements = function (fileSuffix) {
                TarifsService.loadReimbursements(fileSuffix)
                        .success(function (data) {
                            $scope.omcs = data;

                            angular.forEach($scope.omcs, function (value, key) {
                                var threshold = 150;
                                if (value.remboursement.length > threshold) {
                                    var max = value.remboursement.length < threshold ? value.remboursement.length : threshold;
                                    while (max < value.remboursement.length && value.remboursement.charAt(max) !== ' ') {
                                        max++;
                                    }
                                    var head = value.remboursement.substring(0, max);
                                    var tail = value.remboursement.substring(max);
                                    value.showTail = false;
                                    value.head = head;
                                    value.tail = tail;
                                } else {
                                    value.head = value.remboursement;
                                }
                            });

                        }).error(function (data, status) {
                    alert('Cannot load reimbursements from JSON data!');
                });
            };



            $scope.previous = function (current) {
                var c = current.charCodeAt(0);
                if (c > 97 && c <= 122) {
                    location.href = '/tarifs-et-remboursements/' + String.fromCharCode(c - 1);
                }
            };
            $scope.next = function (current) {
                var c = current.charCodeAt(0);
                if (c >= 97 && c < 122) {
                    location.href = '/tarifs-et-remboursements/' + String.fromCharCode(c + 1);
                }
            };

            /**
             * Scroll to an element
             * @param string element an HTML element             
             */
            $scope.scrollTo = function (element) {
                $('html, body').animate({
                    scrollTop: $(element).offset().top
                }, 1000);
            };

            /* go to top of the page*/
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.goToTop').fadeIn();
                } else {
                    $('.goToTop').fadeOut();
                }
            });
            $('.goToTop').click(function () {
                if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/) || ($(window).width() < 769)) {
//                    window.scrollTo(200, 0); // first value for left offset, second value for top offset
                    $("html, body").animate({scrollTop: $("body").offset().top}, 1500);
                } else {
                    $("html, body").animate({scrollTop: 0}, 1000);
                }
                return false;
            });
        }]);