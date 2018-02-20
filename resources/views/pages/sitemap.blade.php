@extends('layouts.main')

@section('metadata')    
@endsection

@section('title')
Plan du site
@endsection

@section('page-content')
<div class="section-title"><a href="/sitemap">Plan du site</a></div>

<div class="row mb-1">
    <ul>
        <li><a href="/">Accueil</a></li>
        <li><a href="/votre-osteopathe">Votre ostéopathe</a></li>
        <li><a href="/osteopathie">L'ostéopathie</a></li>
        <li>
            <a href="/indications">Indications</a>
            <ul>
                <li><a href="/indications/osteopathie-tout-age">L'osteopathie à tout âge</a></li>
                <li><a href="/indications/osteopathie-et-seniors">L'ostéopathie chez les seniors</a></li>
                <li><a href="/indications/osteopathie-et-nourrissons">L'ostéopathie pour les nourrissons</a></li>
                <li><a href="/indications/osteopathie-et-enfants">L'ostéopathie pour les enfants</a></li>
                <li><a href="/indications/osteopathie-et-adultes">L'ostéopathie pour les adultes</a></li>
                <li><a href="/indications/osteopathie-et-sportifs">L'ostéopathie pour les sportifs</a></li>
                <li><a href="/indications/osteopathie-et-femmes-enceintes">L'ostéopathie pour les femmes enceintes</a></li>
                <li><a href="/indications/osteopathie-et-handicap">L'ostéopathie et handicap</a></li>                            
            </ul>
        </li>
        <li><a href="/consultation">Consultation</a></li>
        <li><a href="/questions-frequentes">Questions fréquentes</a></li>
        <li><a href="/le-cabinet">Le cabiet d'ostéopathie</a></li>
        <li><a href="/divers">Divers</a></li>
        <li><a href="/actualites">Actualités</a></li>
        <li><a href="/rendez-vous">Prise de rendez-vous</a></li>                    
    </ul>
</div>


@endsection