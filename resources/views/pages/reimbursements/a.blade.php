@extends('layouts.tarifs')

@section('title')
Liste des organismes d'assurance maladie complémentaire commençant par 'A'
@endsection

@section('appName')
<body ng-app="reimbursementsApp" ng-cloak> 
    @endsection

    @section('page-content')

    <div class="text-primary mt-1 mb-1"><a href="/tarifs-et-remboursements"><u>Tarifs et remboursements</u> &gt;</a></div>            
    @include('pages.tarifs.list')

    <div class="section-title"><a href="/tarifs-et-remboursements-a">Liste des organismes d'assurance maladie complémentaire commençant par 'A' </a></div>

    <div>@include('pages.tarifs.nav')</div>

    <div class="row mt-1 mb-1" ng-init="loadReimbursements('{{$suffix}}')">
        <div class="col-xs-3"><strong>OMC</strong><sup> <i>(<a href="#acronyms">*</a>)</i></sup></div>
        <div class="col-xs-3"><strong>Adresse</strong></div>
        <div class="col-xs-3"><strong>Téléphone</strong></div>
        <div class="col-xs-3"><strong>Remboursement</strong></div>
    </div>

    <div class="row mb-1" ng-repeat="omc in omcs">
        <div class="col-xs-3"><strong><span ng-bind="omc.name"></span></strong></div>
        <div class="col-xs-3"><span ng-bind="omc.adresse"></span></div>
        <div class="col-xs-3"><span ng-bind="omc.telephone"></span></div>
        <div class="col-xs-3"><span ng-bind="omc.remboursement"></span></div>
    </div>

    <div class="mb-2"><a id="acronyms"></a><sup> <i>(*)</i></sup> OMC : Organismes d'assurance Maladie Complémentaire
    </div>
</div>
@include('includes.adresse-footer')
</div>
</div>

@endsection