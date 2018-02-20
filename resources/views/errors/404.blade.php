@extends('layouts.main')

@section('page-content')

<div class="container">
    <div class="row m-b-3 p-t-3">
        <div class="col-xs-8">La page demandée n'existe pas.<br /><br />
            Cliquer <a href="/">ici</a> pour aller à la page d'accueil ou <br /><br />
            <ul>
                <li class="m-b-1"><em>Si vous rencontrez une difficulté pour avoir accès au site Web, merci de nous contacter via le formulaire de contact <a href="/rendez-vous">ici</a></em>.</li>

                <li class="m-b-1"><em>Si vous avez des questions concernant l'ostéopathie, vous pouvez consulter les questions fréquentes à <a href="/questions-frequentes">cette page</a></em>.</li>
                
                <li class="m-b-1"><em>Si vous souhaitez prendre un rendez-vous avec l'ostéopathe, merci d'appeler le secrétariat au <a href="tel:+33651875662">06.51.87.56.62</a> ou laisser vos coordonnées en remplissant le formulaire de contact.</em></li>
            </ul>
        </div>
    </div>
    <div class="row m-b-3">
        @include('includes.adresse-footer')
    </div>
</div>

@stop