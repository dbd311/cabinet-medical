<!DOCTYPE html> 
<html lang="fr" itemscope="" itemtype="http://schema.org/WebPage"> 
    @include('layouts.head')

    @section('appName')
    <body ng-app="reimbursementsApp"> 
        @show       

        <div class="wrapper">
            <div class="container main-container">
                <div class="row">
                    <div class="col-12">
                        @include('includes.header')        
                        <div class="container" ng-controller="TarifsCtrl">
                            <div class="row">
                                <div class="col-xs-12 col-md-3">
                                    @include('includes.navbar_responsive')
                                </div>
                                <div class="col-xs-12 col-md-9">
                                    @section('page-content')
                                    @show
                                </div>
                            </div>
                            @section('addr-footer')
                            @include('includes.adresse-footer')
                            @show
                        </div>                        
                        @include('includes.footer')
                    </div>
                </div>
            </div>
        </div>

        @section('js')
        <script src="{{ elixir('/js/reimbursements.min.js') }}"></script>
        @show
        <script type="application/ld+json">{"@context":"http://schema.org","@type":"Blog","url":"http://osteo-thionville.over-blog.com/"}</script><script type="application/ld+json">{"@context":"http://schema.org","@type":"Organization","name":"Cabinet d'ostéopathie à Thionville (Carole DINH D.O.)","url":"http://www.osteo-thionville.fr","sameAs":["https://plus.google.com/+Osteo-thionvilleFr","https://www.yelp.fr/biz/carole-dinh-thionville"]}</script>
        <script type="text/javascript">
                            (function (i, s, o, g, r, a, m) {
                                i['GoogleAnalyticsObject'] = r;
                                i[r] = i[r] || function () {
                                    (i[r].q = i[r].q || []).push(arguments)
                                }, i[r].l = 1 * new Date();
                                a = s.createElement(o),
                                        m = s.getElementsByTagName(o)[0];
                                a.async = 1;
                                a.src = g;
                                m.parentNode.insertBefore(a, m)
                            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                            ga('create', 'UA-54431749-1', 'auto');
                            ga('send', 'pageview');
        </script>
    </body>
</html>