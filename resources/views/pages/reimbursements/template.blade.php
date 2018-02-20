@extends('layouts.tarifs')

@section('title')
Liste des organismes d'assurance maladie complémentaire commençant par '{{$suffix}}'
@endsection

@section('appName')
<body ng-app="reimbursementsApp" ng-cloak> 
    @endsection

    @section('page-content')

    <div class="text-primary mt-1 mb-1"><a href="/tarifs-et-remboursements"><u>Tarifs et remboursements</u> &gt;</a></div>            
    @include('pages.tarifs.list')

    <div class="section-title"><a href="/tarifs-et-remboursements/{{$suffix}}">Liste des organismes d'assurance maladie complémentaire commençant par '{{$suffix}}' </a></div>

    <div>@include('pages.tarifs.nav')</div>
    
    <div class="row mt-1 mb-1" ng-init="loadReimbursements('{{$suffix}}')">
        <div class="col-3"><strong>OMC</strong><sup> <i>(<a href="#acronyms">*</a>)</i></sup></div>
        <div class="col-3"><strong>Adresse</strong></div>
        <div class="col-3"><strong>Téléphone</strong></div>
        <div class="col-3"><strong>Remboursement</strong></div>
    </div>

    <div class="row mb-1" ng-repeat="omc in omcs">
        <div class="col-3"><strong><span ng-bind="omc.name"></span></strong></div>
        <div class="col-3"><span ng-bind="omc.adresse"></span></div>
        <div class="col-3"><span ng-bind="omc.telephone"></span></div>
        <div class="col-3">
            <span ng-bind-html="omc.head"></span>
            <span ng-show="omc.tail && !omc.showTail">... </span>                        
            <span class="fa fa-plus text-primary" ng-click="toggle(omc)" ng-show="omc.tail && !omc.showTail"></span>
            <span ng-bind-html="omc.tail" ng-if="omc.showTail"></span>
            <span class="fa fa-minus text-primary" ng-click="toggle(omc)" ng-show="omc.showTail"></span>
        </div>
    </div>

    <div class="row mb-1 mt-1">
        <div class="col-6"><span  class="pull-left text-primary" ng-click="previous('{{$suffix}}')"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Précédent</span></div>
        <div class="col-6"><span  class="pull-right text-primary" ng-click="next('{{$suffix}}')">Suivant <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></div>
    </div>

    <div class="mb-2"><a id="acronyms"></a><sup> <i>(*)</i></sup> OMC : Organismes d'assurance Maladie Complémentaire
    </div>


    @endsection