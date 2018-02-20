<!DOCTYPE html> 
<html lang="fr" itemscope="" itemtype="http://schema.org/WebPage"> 
    @include('layouts.head')
    <body ng-app="osteoApp" ng-cloak>
        <div class="wrapper">
            <div class="container main-container">
                <div class="row">
                    <div class="col-12">
                        @include('includes.header')        

                        @yield('page-content')
                        
                        @include('includes.footer')
                    </div>
                </div>
            </div>
        </div>
        @yield('js')
    </body>    
</html>