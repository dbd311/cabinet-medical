/*** 
 * Web Controller
 */
angular.module('WebCtrl', [])
        .controller('WebCtrl', ["$scope", function ($scope) {           
    
            $scope.show = false;
            $scope.secondTabClicked = false;
            
            $scope.toggleFirstTab = function () {
                if ($scope.secondTabClicked) {
                    // always show
                    $scope.show = true;
                } else {
                    // toggle
                    $scope.show = ($scope.show === false ? true : false);
                }
            };
            // when we click on the second tab, set the visibility of the first one to true
            $scope.showFirstTab = function () {
                $scope.secondTabClicked = true;
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