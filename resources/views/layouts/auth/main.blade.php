<!DOCTYPE html> 
<html lang="fr" itemscope="" itemtype="http://schema.org/WebPage"> 
    @include('layouts.head')
    <body ng-app="osteoApp" ng-cloak>
        <div class="wrapper">
            <div class="container main-container">
                <div class="row">
                    <div class="col-12">
                        @include('includes.header')        

                        @section('page-content')
                        @show
                        @include('includes.footer')
                    </div>
                </div>
            </div>
        </div>
        @section('js')
        <script src="{{ elixir('js/auth.min.js') }}"></script>
        @show
    </body>
</html>