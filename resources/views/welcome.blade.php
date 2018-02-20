@extends('layouts.main')

@section('local-css')
<link rel="stylesheet" href="{{ elixir('/css/pages/home.min.css')}}" />
<style>.overlay-loader{display:block;width:50px;height:50px;position:relative}.loader,.overlay-loader{margin:auto;top:0;left:0;right:0;bottom:0}.loader{position:absolute;width:80px;height:80px;animation-name:a;-o-animation-name:a;-ms-animation-name:a;-webkit-animation-name:a;-moz-animation-name:a;animation-duration:1.03s;-o-animation-duration:1.03s;-ms-animation-duration:1.03s;-webkit-animation-duration:1.03s;-moz-animation-duration:1.03s;animation-iteration-count:infinite;-o-animation-iteration-count:infinite;-ms-animation-iteration-count:infinite;-webkit-animation-iteration-count:infinite;-moz-animation-iteration-count:infinite;animation-timing-function:linear;-o-animation-timing-function:linear;-ms-animation-timing-function:linear;-webkit-animation-timing-function:linear;-moz-animation-timing-function:linear}.loader div{width:8px;height:8px;border-radius:50%;border:1px solid #00c4ff;position:absolute;top:2px;left:0;right:0;bottom:0;margin:auto}.loader div:nth-child(odd){border-top:none;border-left:none}.loader div:nth-child(even){border-bottom:none;border-right:none}.loader div:nth-child(2){border-width:2px;left:0;top:-4px;width:12px;height:12px}.loader div:nth-child(3){border-width:2px;left:-1px;top:3px;width:18px;height:18px}.loader div:nth-child(4){border-width:3px;left:-1px;top:-4px;width:23px;height:23px}.loader div:nth-child(5){border-width:3px;left:-1px;top:4px;width:31px;height:31px}.loader div:nth-child(6){border-width:4px;left:0;top:-4px;width:39px;height:39px}.loader div:nth-child(7){border-width:4px;left:0;top:6px;width:40px;height:40px}@keyframes a{0%{transform:rotate(1turn)}to{transform:rotate(0deg)}}@-webkit-keyframes a{0%{-webkit-transform:rotate(1turn)}to{-webkit-transform:rotate(0deg)}}</style>

@endsection

@section('title')
Cabinet d'ostéopathie à Thionville | Carole DINH ostéopathe D.O.
@endsection

@section('page-content')


<div class="row mt-2 mb-1">
    <div class="col-sm-12 text-xs-center text-small">Consultations sur rendez-vous du <b>Lundi</b> au <b>Samedi</b>.<br /> Prise de rendez-vous par <a href="tel:+33651875662">téléphone</a> ou <a href="/rendez-vous">en ligne</a> <small class="display-6">de <b>9:00 h</b> à <b>20:00 h</b></small>.</div>
</div>
<div class="row">
    <div class="col-sm-12">

        <div ng-if="false">
            <div class="overlay-loader">
                <div class="loader">                                
                    <div></div> <div></div> <div></div> <div></div> <div></div>
                </div>
            </div>
        </div>

        <md-content ng-cloak>
            <md-tabs md-dynamic-height md-border-bottom>
                <md-tab label="Adultes" ng-click="toggleFirstTab()">
                    <md-content class="md-padding" ng-show="show">
                        <p class="pull-right gap-left-top">
                            <a href="/indications/osteopathie-et-adultes"><img src="/images/misc/osteo-et-adultes.jpg" alt="ostéopathe thionville pour adultes"/></a>
                        </p>
                        <p class="text-justify">
                            À tout âge, le corps peut connaître des traumatismes, des maux et des problèmes particuliers, qui peuvent être traités de manière efficace par l'ostéopathie. La prise en charge ostéopathique d'un <a href="/indications/osteopathie-et-adultes">adulte</a> prend en compte la douleur, les antécédents chirurgicaux, traumatiques et pathologiques. Tous ces antécédents peuvent perturber l'harmonie générale du corps (circulation, équilibre, posture ...) pouvant provoquer la douleur. </p>

                        <p>Votre ostéopathe prend en compte vos activités quotidiennes (sports, attitudes professionnelles...) ainsi que les effets que peuvent provoquer le stress quotidien, la fatigue (travail, transport, foyer...). Votre ostéopathe veillera à rétablir l'équilibre général du corps afin de stimuler les capacités d'auto-guérison de celui-ci.</p>
                        <div><em>En voici quelques motifs (non-exhaustifs) de consultation : </em></div>
                        <ul>
                            <li>douleurs de dos (lombalgies, dorsalgies...)</li>
                            <li>douleurs de cou (cervicalgies)</li>
                            <li>sciatiques</li>
                            <li>lumbago</li>
                            <li>tendinites</li>
                            <li>migraines-céphalées</li>
                            <li>douleurs digestives</li>
                            <li>brûlures gastrique</li>
                            <li>reflux gastro-oesophagien</li>
                            <li>après une intervention chirurgicale</li>
                            <li>menstruations douloureuses</li>
                            <li>etc.</li>
                        </ul>
                        Vous pouvez venir consulter votre ostéopathe au cabinet à Thionville ou à votre domicile dans un but préventif 1 à 2 fois par an afin de maintenir l’équilibre général du corps.            

                    </md-content>
                </md-tab>
                <md-tab label="Sportifs" ng-click="showFirstTab()">
                    <md-content class="md-padding">
                        <p class="pull-right gap-left-top">
                            <a href="/indications/osteopathie-et-sportifs"><img src="/images/misc/osteo-et-sportif.jpg" alt="ostéopathe thionville pour sportifs"/></a>
                        </p>
                        <p style="text-align:justify;">
                            A titre préventif ou curatif, le traitement ostéopathique permet aux <a href="/indications/osteopathie-et-sportifs">sportifs</a> de conserver l'équilibre du corps afin de pratiquer durablement leur activité. En effet, lors de tout sport, les articulations, les muscles, les ligaments et les viscères sont sollicités et soumis à rude épreuve. L'ostéopathie a pour but, dans ce cas, de maintenir la souplesse articulaire et la capacité respiratoire. Toute perte de mobilité d’une ou plusieurs de ces structures peut provoquer un déséquilibre de l’état de santé du sportif se manifestant par différents symptômes, allant de la simple contracture à la douleur chronique.</p>
                        <div class="sub-section">En voici quelques motifs (non-exhaustifs) de consultation : </div>
                        <ul>
                            <li>entorse, chutes, fracture</li>
                            <li>douleurs articulaires diverses</li>
                            <li>talalgies (douleur au talon)</li>				
                            <li>périarthrites</li> 
                            <li>épicondylites</li> 
                            <li>essoufflement à l'effort</li>
                            <li>sciatiques, cruralgies (douleur à la cuisse), pubalgies</li> 
                            <li>cervicalgies, dorsalgies, lombalgies</li> 
                            <li>maux de tête</li>
                            <li>troubles de l'équilibre</li>
                            <li>vertiges, mauvaise récupération entre les épreuves</li> 
                            <li>stress, manque de concentration, troubles du sommeil</li>
                        </ul>
                        <p>Le traitement ostéopathique permet d'augmenter la concentration avant toute épreuve et favorise une récupération maximale après les efforts.
                        </p>

                    </md-content>
                </md-tab>
                <md-tab label="Grossesse">
                    <md-content class="md-padding">
                        <p class="pull-right gap-left-top">
                            <a href="/indications/osteopathie-et-femmes-enceintes"><img src="/images/misc/femme_enceinte.jpg" alt="ostéopathe thionville pour femmes enceintes"/></a>
                        </p>
                        <p style="text-align:justify;">
                            Dès le début de la grossesse, le corps de la <a href="/indications/osteopathie-et-femmes-enceintes">femme enceinte</a> se modifie et durant cette période merveilleuse, le corps ne cesse d'évoluer et de s'adapter. Certains de ces changements physiques sont rapidement perceptibles tandis que d'autres passent inaperçus. En effet, pendant la grosse, votre corps subit des modifications afin de laisser au bébé toute la place qui lui est nécessaire à son évolution.
                        </p>
                        <div>
                            Ces modifications vont causer deux grands types de désagréments sur le corps de la future maman :
                            <ul>
                                <li>D'un point de vue viscéral : au fur et à mesure que l'utérus grandit, les autres organes abdominaux font preuve d'une adaptation phénoménale. En effet, le foie, l'estomac, les intestins, tous ces organes vont laisser leur place et se ranger sur le côté. Pour faire ça, car les organes ne flottent pas simplement dans l'abdomen, et ne changent pas de forme ou de taille, ils vont pivoter autour de leurs attaches. Les organes qui bougent le plus tout en donnant régulièrement des troubles fonctionnels de type nausée, vomissement, brûlure d'estomac, sont le foie et l'estomac.</li>
                                <li>D'un point de vue postural : au cours de la grossesse, la maman adapte sa posture afin de soulager les tensions qu'elle ressent dues au poids du bébé grandissant, qui la tracte vers l'avant, déplaçant son centre de gravité et l'invitant à modifier sa façon de se tenir pour ne pas perdre son équilibre. L'adaptation et le changement de la posture peuvent être accompagnés par des gênes ou douleurs au niveau du dos, du bassin, du coccyx, du pubis ou au niveau des membres inférieurs réveillant parfois des anciennes douleurs de type sciatiques.</li>
                            </ul>
                        </div>
                        <div class="sub-section">En voici quelques motifs (non-exhaustifs) de consultation : </div>
                        <ul>				
                            <li>douleurs rachidiennes</li>				
                            <li>sciatalgie, lombalgie, cruralgie, pubalgie</li>
                            <li>douleurs coccygiennes, dans la zone pubienne</li>
                            <li>douleurs articulaires, asymétrie du bassin</li>
                            <li>douleurs costales, difficulté à respirer</li>
                            <li>surpression du bébé sur la sphère pelvienne</li>
                            <li>troubles de l'humeur et Baby-blues</li>
                            <li>bilan préventif, suivi de grossesse</li>				
                            <li>préparation à l'accouchement</li>
                            <li>suivi après l'accouchement pour une meilleure récupération, allaitement</li>				
                        </ul>
                    </md-content>
                </md-tab>
                <md-tab label="Enfants">
                    <md-content class="md-padding">
                        <p class="pull-right gap-left-top">
                            <a href="/indications/osteopathie-et-enfants"><img src="/images/misc/osteo-et-enfants.jpg" alt="ostéopathe thionville pour enfants"/></a>
                        </p>
                        <p style="text-align:justify;">
                            L'équilibre général peut être perturbé par la croissance ou les activités de votre <a href="/indications/osteopathie-et-enfants">enfant</a>. Le poids du cartable, une mauvaise position à l'école, un traumatisme au sport, une chute... sont autant de dysfonctionnements qui peuvent l'affecter durablement. Par exemple, le pouce dans la bouche ou la pose d'un appareil dentaire peut entraîner un déséquilibre de la fonction crânienne et favoriser les maux de tête, l'irritabilité, les troubles du sommeil ou de concentration de votre enfant. Une consultation ostéopathique lui permettra de se détendre, de mieadmin/loginux se concentrer et d'être ainsi plus attentif. Les enfants sont particulièrement réceptifs et sensibles au confort apporté par le traitement. Les difficultés scolaires seront d'autant plus améliorées que le traitement sera précoce.
                        </p>

                        <div class="sub-section">En voici quelques motifs (non-exhaustifs) de consultation : </div>
                        <ul>
                            <li>perturbations liés à la croissance : scoliose, entorses à répétition ...</li>
                            <li>difficultés dans l'apprentissage de la marche, mauvaise position des pieds</li>
                            <li>déviation de la colonne vertébrale</li>
                            <li>troubles digestifs (constipation, diarrhée, ballonnements...)</li>
                            <li>troubles ORL à répétition (otite, bronchite, sinusite / rhinite...)</li>				
                            <li>suite à un traumatisme (chute, choc, entorse...)</li>
                            <li>maux de tête, fatigue oculaire</li>
                            <li>asthme</li>				
                            <li>port d'un appareil dentaire</li>
                            <li>difficultés de concentration à l'école</li>
                            <li>troubles du sommeil</li>
                            <li>troubles de concentration, retard du développement psycho-moteur ...</li>
                            <li>faire un bilan annuel</li>
                        </ul>
                    </md-content>
                </md-tab>
                <md-tab label="Nourrissons">
                    <md-content class="md-padding">
                        <p class="pull-right gap-left-top">
                            <a href="/indications/osteopathie-et-nourrissons"><img src="/images/osteopathie/osteo-thionville-nourrisson.jpg" alt="ostéopathe thionville pour nourrisson"/></a>
                        </p>
                        <p style="text-align:justify;">
                            L'accouchement peut être le premier des traumatismes pour le <a href="/indications/osteopathie-et-nourrissons">nourrisson</a>. Trop long ou trop court, il peut perturber le fonctionnement normal des structures crâniennes et en perturber le développement. Difficile, il nécessite parfois l'emploi de spatules, ventouses ou forceps, qui vont influer sur la mobilité des jonctions des os du crâne et occasionner des troubles fonctionnels immédiats ou ultérieurs. Les tensions que le bébé présente à la naissance ne sont pas uniquement dues à l'accouchement mais aussi à des pressions subies pendant la grossesse.
                        </p>			
                        <p>Ces contraintes peuvent rester inscrites dans les tissus de l'enfant sous forme de tensions pouvant par la suite lui occasionner des symptômes divers. L'ostéopathie présente un intérêt tout particulier dans le traitement des troubles du nourrisson. Pour l'ostéopathe, les informations relatives au déroulement de la grossesse, à l'accouchement et à la période périnatale sont essentielles. Les désordres liés à ces différentes étapes ne doivent pas s'inscrire de façon durable dans le temps, c'est pourquoi il semble nécessaire d'adopter une attitude préventive et thérapeutique auprès des nouveau-nés. 
                        </p>

                        <div class="sub-section">En voici quelques motifs (non-exhaustifs) de consultation : </div>
                        <p>Si le bébé est né : </p>
                        <ul>
                            <li>lors d'un accouchement difficile : une extraction instrumentale (forceps, ventouse, spatules), une césarienne (programmée ou non)</li>
                            <li>avec le cordon ombilical enroulé autour du cou du bébé</li>
                            <li>avec le crâne déformé par l'utilisation de forceps ou de spatules</li>				
                        </ul>
                        <p>et si le bébé : </p>
                        <ul>
                            <li>a été saisi par les pieds et suspendu la tête en bas.</li>
                            <li>régurgite, dort peu ou pleure souvent.</li>
                            <li>présente une respiration bruyante ou des difficultés à s’alimenter.</li>
                            <li>se cambre en arrière durant la tétée.</li>
                            <li>se tient en « virgule » et tourne la tête plus facilement d’un côté.</li>
                            <li>présente un méplat à l’arrière de la tête.</li>
                            <li>a des coliques, des signes de nervosité, d’hypertonicité ou d’apathie.</li>
                            <li>est constipé.</li>
                            <li>présente une obstruction partielle du canal lacrymal.</li>
                            <li>est sujet à des otites, des rhinites ou des bronchiolites à répétition, des signes de torticolis congénital, un strabisme, etc.</li>				
                        </ul>
                        <p>
                            Après la naissance, il est donc conseillé d'amener votre enfant chez l'ostéopathe afin de faire une séance de contrôle ou un bilan. Avec douceur et précision, l'examen ostéopathique permet de vérifier l'équilibre entre les systèmes osseux, organiques et musculaires de l'enfant et de les réajuster avant l'apparition de symptômes ou de maladies.
                        </p>
                    </md-content>
                </md-tab>
            </md-tabs>
        </md-content>
    </div>
</div>   
<div class="row">
    <div class="col-sm-12">
        <img class="img-fluid" alt="Consultations sur rendez-vous au cabinet d'ostéopathie et à domicile du Lundi au Samedi de 9:00 h à 20:00 h - Tél : 06 51 87 56 62 - 18 rue du Général Mangin, 57100 Thionville. L'ostéopathie peut être appliquée aussi bien à l'enfant dès ses premiers jours de vie, à la femme enceinte, au sportif, mais aussi à l'adulte et aux seniors." src="/images/osteopathie/patients.png"/>
    </div>
    <!--                <div class="col-xs-12">
                        <p>L'ostéopathie peut être appliquée aussi bien à l'enfant dès ses premiers jours de vie, à la femme enceinte, au sportif, mais aussi à l'adulte et aux seniors.</p>
                        <p class="hidden-md-down">Son champs d'application est très vaste. Elle est efficace dans de nombreux domaines comme sur les structures articulaires, musculaires et tissulaires.</p>
                        <p class="hidden-md-down">Nous adaptons donc nos techniques à chaque personne en fonction de la situation et de ses antécédents.</p>
                    </div>-->
</div>

<div class="row mt-1">
    <div class="col-md-12">
        <h4><a name="votre-osteopathe">Carole Dinh, ostéopathe à Thionville</a></h4>
        <p>Diplômée en Ostéopathie, j'ai suivi une formation en <b>6 années à temps plein</b> au sein de l'<a href="http://www.ito-osteopathie.fr/" target="_blank">Institut Toulousain d'Ostéopathie (ITO)</a>, une des écoles référence dans la formation d'ostéopathie en France dont la vocation est de former des ostéopathes qualifiés, compétents, autonomes et responsables. L'ITO fait partie des écoles agréées par le Ministère de la Santé.</p> 
        <p>Titre National d'Ostéopathe enregistré au Registre National des Classifications Professionnelles (RNCP).</p> 
        <ul> <li>Ostéopathie pédiatrique : nouveaux-nés, femmes enceintes et enfants.</li> <li>Ostéopathie du sport : sportifs de tout niveau.</li> <li>Micronutrition : conseils nutritionnels, sphère digestive...</li> </ul> 
        <p> Dans une compréhension globale du patient, en tant qu'ostéopathe exclusive, mon rôle consiste à <span class="text-success"><b>prévenir, diagnostiquer</b></span> et <span class="text-success"><b>traiter</b></span> manuellement les dysfonctions de la mobilité des tissus du corps humain susceptibles d'en altérer l'état de santé.<br/> </p> A noter que chaque ostéopathe met au point son propre protocole en fonction de son expérience, de sa pratique et de sa sensibilité. L’objectif est de <i>"trouver la (ou les) dysfonction(s) à l’origine et/ou responsable de la plainte de son patient."</i><br/> <br/>
    </div>
</div>
<div class="row">     
    <div class="col-11">
        <span ng-click="scrollTo('body')" class="go-to-top"></span>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-xs-6 hidden-md-down">
        <a href="/osteopathie"><div class="icon-osteo icon-osteopathie"></div></a>
    </div>                 
    <div class="col-md-3 hidden-md-down">
        <a href="/indications"><div class="icon-osteo icon-indications"></div></a>
    </div>                 
    <div class="col-xs-6 col-md-3">
        <a href="/consultation"><div class="icon-osteo icon-consultation"></div></a>
    </div>                 
    <div class="col-xs-6 col-md-3">
        <a href="/rendez-vous"><div class="icon-osteo icon-rendez-vous"></div></a>
    </div>                 
</div>
<div class="row text-xs-left">
    <div class="col-md-3 col-xs-6 hidden-md-down">
        <h4><a href="/osteopathie">L'ostéopathie</a></h4>
    </div>                 
    <div class="col-md-3 hidden-md-down">
        <h4><a href="/indications">Indications</a></h4>
    </div>        
    <div class="col-xs-6 col-md-3 hidden-md-down">
        <h4><a href="/consultation">Consultation</a></h4>
    </div>                 
    <div class="col-xs-6 col-md-3 hidden-md-down">
        <h4><a href="/rendez-vous">Contact</a></h4>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-xs-6 text10pt hidden-md-down">
        Fondée par Andrew T. Still, l'ostéopathie est une <b>thérapie manuelle</b> visant à déterminer et à traiter toutes les restrictions de <b>mobilité</b> affectant les structures composant le corps humain.
    </div>
    <div class="col-md-3 hidden-xs text10pt hidden-md-down">
        Une fois les pathologies lourdes (hépatite, cancer, HIV,...) exclues, l'ostéopathie s'adresse à <b>tous les âges</b>. Les motifs de consultation pour les différents types de patients sont divers.
    </div>                 
    <div class="col-md-3 col-xs-6 text10pt">
        En général, une séance d'ostéopathie dure en moyenne <b>45 minutes</b>. Une consultation peut donc s'organiser en 4 phases principales : (I) anamnèse, (II) tests, (III) traitement et (IV) conseils.
    </div>
    <div class="col-md-3 col-xs-6 text10pt">
        Le cabinet se trouve au 18 rue du Général Mangin, 57100 Thionville (Moselle).<br/>
        Tél : <a href="tel:+33651875662">06.51.87.56.62</a><br/>

        Pour les appels depuis le Luxembourg ou à l'étranger : <a href="tel:+33651875662">+33651875662</a><br />

    </div>                 
</div>
<div class="row text-center">
    <div class="col-md-3 col-xs-6 hidden-md-down">
        <a href="/osteopathie"><span class="text9pt">▶ Lire la suite <span class="text-hidable-xs">...</span></span></a>
    </div>                 
    <div class="col-md-3 hidden-md-down">
        <a href="/indications"><span class="text9pt">▶ Lire la suite <span class="text-hidable-xs">...</span></span></a>
    </div>                 
    <div class="col-xs-6 col-md-3">
        <a href="/consultation"><span class="text9pt">▶ Lire la suite <span class="text-hidable-xs">...</span></span></a>
    </div>                 
    <div class="col-xs-6 col-md-3">

        <a href="https://plus.google.com/+Osteo-thionvilleFr/about" rel="publisher"><img class="img-responsive m-r-1" alt="Visiter notre page sur Google+" src="images/icons/gplus-icon.png"/></a>

        <a href="https://www.linkedin.com/in/carole-dinh-aa1a64a2" rel="publisher"><img class="img-responsive" alt="Visiter notre page sur LinkedIn" src="images/icons/linkedin.jpg"/></a>
    </div>
</div>                 
<div class="row">
    <div class="col-md-3">
        &nbsp;
    </div>                 
</div>
<div class="row">
    <div class="col-md-3">
    </div>                 
</div>
<div class="row">
    <div class="col-md-3">
    </div>                 
</div>

@endsection

@section('addr-footer')
<div class="row">            
    <div class="col-12 offset-1">
        <span ng-click="scrollTo('body')" class="go-to-top"></span>
    </div>
</div>
@endsection

@section('message-under-navbar')
<div class="mt-5 text-muted rounded" style="border: 1px dashed lightslategray; padding-left: 5px">Les consultations sont uniquement sur rendez-vous. N'hésitez pas à m'appeler ou à me laisser un message. Si vous souhaitez prendre un rendez-vous en ligne, veuillez utiliser le formulaire <a href="/rendez-vous#formulaire-de-contact">ici</a>.</div>
@endsection
