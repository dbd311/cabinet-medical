@extends('layouts.tarifs')

@section('metadata')    
@endsection

@section('title')
Mutuelles qui remboursents l'ostéopathie | Ostéopathe à Thionville
@endsection

@section('page-content')

<div class="section-title"><a href="/tarifs-et-remboursements">Tarifs et remboursements</a></div>
@include('pages.tarifs.list')

<div class="mb-1"><strong>Remboursements :</strong></div>

<p>La nouvelle réglementation de l’ostéopathie par <a href="https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000000462001">les décrets de mars 2007</a>, ne permet pas le remboursement des soins ostéopathiques par les caisses d’assurance maladie. Cependant, face à la demande croissante des patients, 
    de nombreuses organismes d'assurance maladie (mutuelles) ont décidé de rembourser tout ou une partie du tarif d’une consultation en ostéopathie. 
    Renseignez-vous auprès de votre mutuelle pour savoir si elle en fait partie. 
    Ainsi, n’hésitez pas à me demander une facture pour que le remboursement puisse être effectué.<br/> <br/> 

    Voici la liste (non exhaustive) des organismes d'assurance maladie complémentaire (OMC) remboursant les actes d'ostéopathie :  @include('pages.tarifs.nav')
</p>


@endsection