@extends('layouts.main')

@section('metadata')    
@endsection

@section('title')
Liens d'ostéopathie en France ou à Thionville en Moselle
@endsection

@section('css')    
<link rel="stylesheet" href="{{ elixir('css/divers.min.css') }}" />
@endsection
@section('js')
<script src="{{ elixir('/js/divers.min.js') }}"></script>
@endsection

@section('page-content')

<div class="section-title"><a href="/divers">Divers</a></div>            

<div class="text-warning"><strong>Formation en Ostéopathie</strong></div>
<ul class="ying-yang"><li><a href="http://www.allodocteurs.fr/se-soigner/osteopathie/osteopathie-les-ecoles-agreees_8220.html">Ostéopathie : les écoles agréées</a></li></ul>

<div class="text-warning mt-2"><strong>Ostéopathie périnatale</strong></div>
<ul class="ying-yang">
    <li><a href="http://osteo-enfant.fr/naissance">L'ostéopathie pour votre bébé</a></li>
    <li><a href="http://www.allodocteurs.fr/se-soigner/osteopathie/losteopathie-appliquee-aux-enfants_11389.html">L'ostéopathie appliquée aux enfants</a></li>
    <li><a href="https://www.facebook.com/Les-Maternelles-France-5-149992365752/">L'ostéopathie sur France 5 (les maternelles)</a></li>
</li>
</ul>

<div class="text-warning"><strong>Ostéopathie et le travail</strong></div>
<div>
    Quels que soient le métier et le secteur d'activité, chacun passe quotidiennement de nombreuses heures dans la même posture ou à répéter le même mouvement. Le stress et les efforts du quotidien s'ajoutent et provoquent le déséquilibre du corps. <a href="/indications/osteopathie-et-travail">▶ Lire la suite ...</a>
</div>

<div class="text-warning mt-2"><strong>Ostéopathie et le sport</strong></div>
<div> Le Sport et l'Ostéopathie sont unis par un lien indissociable. Avant et pendant l'épreuve, le sportif a besoin de cette pratique manuelle pour entretenir sa forme. Durant l'exercice, un déséquilibre est susceptible de s'installer et peut se présenter différemment, une simple contracture ou une douleur chronique. <a href="/indications/osteopathie-et-sport">▶ Lire la suite ... </a></div>

<ul class="ying-yang mt-2">
    <li><a href="http://www.ladyhoop.com/itw-fabrice-nocera-osteopathe-23163/">Fabrice Nocera : « Mon rôle d’ostéopathe est de redonner de la liberté »</a></li>
    <li>

        <span class="text-success"><strong>Les clubs sportifs aux pays des trois frontières :</strong></span>

    <md-content class="mt-2">
        <md-tabs md-dynamic-height md-border-bottom>
            <md-tab label="Thionville" ng-click="toggleFirstTab()">
                <md-content class="md-padding">
                    <div class="row mt-2">
                        <div class="col-7">Association Agora Danse</div>
                        <div class="col-5">6 rue de la Paix <br /> 57100 Thionville</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-7">Complexe Sportif Municipal de la Miliaire</div>
                        <div class="col-5">71 rue Paul Albert <br />57100 Thionville </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-7">Office municipal des sports </div>
                        <div class="col-5">22 rue du Vieux Collège <br />57100 Thionville</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-7">L'Aïkido Club Thionville</div>
                        <div class="col-5">57 Allée Bel Air<br />57100 Thionville</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-7">Piscine de Thionville (Centre de Loisirs Nautique)</div>
                        <div class="col-5">21 rue des Pyramides<br />57100 Thionville</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-7">ASSOCIATION THIONVILLOISE DE G.R.S.</div>
                        <div class="col-5">30 boucle des Lièvres<br />57100 Thionville</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-7">DOJO DE THIONVILLE ET ELANGE (Centre Multisports La Milliaire)</div>
                        <div class="col-5">Rue Paul Albert<br />57100 Thionville</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-7">CENTRE "LE LIERRE"</div>
                        <div class="col-5">Place Roland<br />57100 Thionville</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-7">THIONVILLE BASKET CLUB </div>
                        <div class="col-5">6 rue Jean Mermoz<br />57100 Thionville</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-7">THIONVILLE MOSELLE HANDBALL</div>
                        <div class="col-5">Avenue Saint-Exupéry<br />57100 Thionville</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-7">CLUB SPORTIF ET ARTISTIQUE DU 40 ème REGIMENT DE TRANSMISSIONS.</div>
                        <div class="col-5">Quartier Jeanne d'Arc<br />57100 Thionville</div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-7">THIONVILLE YUTZ GENERATION RUGBY ESPOIR (TYGRE)</div>
                        <div class="col-5">Stade Bernard Vasquez<br />57100 Thionville</div>
                    </div>

                </md-content>
            </md-tab>

            <md-tab label="Yutz" ng-click="showFirstTab()()">
                <md-content class="md-padding">
                    <div class="row mt-2">
                        <div class="col-7">Yutz Handball Féminin</div>
                        <div class="col-5">1 rue Gymnase<br />57970 Yutz</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">A.S.V.B (Association Sportive Volley-Ball)</div>
                        <div class="col-5">Gymnase Jean Mermoz rue République<br />57970 Yutz</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Club Pétanque Yutzoi Club Petanque Yutzoi</div>
                        <div class="col-5">rue Ste Barbe<br />57970 Yutz</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Football Club Yutz</div>
                        <div class="col-5">rue Drogon<br />57970 Yutz</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Kayak Club</div>
                        <div class="col-5">12A avenue des Nations<br />57970 Yutz</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Tennis Club Yutz Aéroparc (Entente Sportive et Cheminots de Yutz)</div>
                        <div class="col-5">rue Croix du Sud, pl Arc-en-Ciel<br />57970 Yutz</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Yutz Equitation</div>
                        <div class="col-5">13 rue Poitiers<br />57970 Yutz</div>
                    </div>
                </md-content>
            </md-tab>

            <md-tab label="Terville">
                <md-content class="md-padding">
                    <div class="row mt-2">
                        <div class="col-7">Judo/Aïkido club tervillois</div>
                        <div class="col-5">47 rue Haute<br />57180 Terville</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Tennis club tervillois</div>
                        <div class="col-5">place Jean-Jaurès<br />57180 Terville</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">T.F.O.C. Volley-Ball</div>
                        <div class="col-5">13 place des Jasmins<br />57180 Terville</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">K-POEIRA SENZALA</div>
                        <div class="col-5">4 rue Pilatre de Rozier<br />57180 Terville</div>
                    </div>                                
                </md-content>
            </md-tab>

            <md-tab label="Florange">
                <md-content class="md-padding">
                    <div class="row mt-2">
                        <div class="col-7">Boxing club Florange</div>
                        <div class="col-5">rue du Gymnase<br />57190 Florange</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Aïkido - Dojo Florangeois</div>
                        <div class="col-5">avenue du Collège<br />57190 Florange</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Judo - Dojo Florangeois
                        </div>
                        <div class="col-5">avenue du Collège<br />57190 Florange</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Karaté - Dojo Florangeois
                        </div>
                        <div class="col-5">avenue du Collège<br />57190 Florange</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Club Nautique Val de Fensch</div>
                        <div class="col-5">134 Grande Rue<br />57190 Florange</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">F.O.C. Basket</div>
                        <div class="col-5">3b rue des Passeurs<br />57190 Florange</div>
                    </div>
                </md-content>
            </md-tab>

            <md-tab label="Hettange-Grande">
                <md-content class="md-padding">
                    <div class="row mt-2">
                        <div class="col-7">Ecole d'Equitation Poulet Philippe</div>
                        <div class="col-5">Soetrich rte Bénélux<br />57330 Hettange-Grande</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Judo club</div>
                        <div class="col-5">3 rue Pédérobba<br />57330 Hettange-Grande</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Karaté club</div>
                        <div class="col-5">2 rue du Soleil<br />57330 Hettange-Grande</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Vélo Club Hettange Grande</div>
                        <div class="col-5">1 imp Petite Reine<br />57330 Hettange-Grande</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Volley-ball club</div>
                        <div class="col-5">rue de Pederoba<br />57330 Hettange-Grande</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Baseball club</div>
                        <div class="col-5">rue de Pederoba<br />57330 Hettange-Grande</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-7">Aérobic</div>
                        <div class="col-5">1 place René Medernach<br />57330 Hettange-Grande</div>
                    </div>
                </md-content>
            </md-tab>
        </md-tabs>
    </md-content>
</li>
</ul>

<div class="text-warning"><strong>Réseau des ostéopathes de France</strong></div>
<div class="mb-1"><a href="http://reflexosteo.com/">REFLEX OSTEO</a> est le réseau national des ostéopathes dans les grandes villes en France, il vous permet d'obtenir un RDV facilement à votre domicile ou bien aux différents cabinets des ostéopathes. Le réseau intervient également en <a href="http://reflexosteo.com/entreprises">entreprise</a> et dans les <a href="http://reflexosteo.com/clubs-sportifs">clubs sportifs</a>.</div>
<div>
    <a href="https://www.google.fr/trends/explore?date=all&q=ost%C3%A9opathe,ost%C3%A9opathie" target="_blank">Tendances des recherches de l'ostéopathie sur Google.</a> 
    <script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/909_RC04/embed_loader.js"></script>
    <script type="text/javascript">
                trends.embed.renderExploreWidget("TIMESERIES", {"comparisonItem": [{"keyword": "ostéopathe", "geo": "", "time": "all"}, {"keyword": "ostéopathie", "geo": "", "time": "all"}], "category": 0, "property": ""}, {"exploreQuery": "date=all&q=ost%C3%A9opathe,ost%C3%A9opathie", "guestPath": "https://www.google.fr:443/trends/embed/"});
    </script>


    @include('includes.images-slider')
    <br />
</div>

@endsection