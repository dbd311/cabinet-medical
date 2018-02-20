@extends('layouts.main')

@section('metadata') <meta name="description" content="Les rendez-vous au cabinet ou à domicile sont pris au téléphone (06 51 87 56 62). N'hésitez pas à laisser un mail ou appeler pour convenir d'un rendez-vous."/> <meta name="keywords" content="rendez-vous, rdv, ostéopathe Thionville"/> <meta name="DC.Title" content="Prise de rendez-vous | Carole DINH ostéopathe à Thionville"/> <meta name="DC.Description" content="Les rendez-vous au cabinet ou à domicile sont pris au téléphone (06 51 87 56 62). N'hésitez pas à laisser un mail ou appeler pour convenir d'un rendez-vous."/> 
@endsection

@section('title')
Prise de rendez-vous
@endsection

@section('page-content')

<div class="section-title"><a href="/rendez-vous">Prendre rendez-vous</a></div>
<p>Les consultations sont uniquement sur rendez-vous. N'hésitez pas à m'appeler ou à me laisser un message en remplissant le formulaire <a href="#formulaire-de-contact">ci-dessous</a> pour convenir d'un rendez-vous. </p>
<p>Le cabinet d'ostéopathie est ouvert du <strong>Lundi</strong> au <strong>Samedi</strong> de <strong>9:00 h</strong> à <strong>20:00 h</strong>, sauf <strong>mercredi</strong> de <strong>9:00 h</strong> à <strong>12:00 h</strong></p>

<div class="row text-info">
    <div class="col-xs-12 col-md-7">
        <div class="row mt-2 mb-1">
            <div class="col-xs-5 col-md-6">Téléphone :</div>
            <div class="col-xs-7 col-md-6">06 51 87 56 62 <a href="tel:+33651875662"><img class="icon-call" src="/images/icons/call.png" property="image" title="Cliquer ici pour appeler votre ostéopathe (coût d'appel vers un poste fixe)" alt="appeler votre ostéopathe à Thionville"/></a></div>     
        </div>
        <div class="row hidden-sm-down">
            <div class="col-xs-6">Depuis l'étranger :</div>
            <div class="col-xs-6">+33651875662 <a href="tel:+33651875662"><img class="icon-call" src="/images/icons/call.png" property="image" title="Cliquer ici pour appeler votre ostéopathe (coût d'appel vers un poste fixe)" alt="appeler votre ostéopathe à Thionville"/></a></div>     
        </div>
    </div>
    <div class="col-xs-12 col-md-5"><img class="img-fluid" src="/images/cabinet/calendar.jpg" alt="prendre rendez-vous avec l'ostéopathe"/></div>
</div>
<br />
<a id="formulaire-de-contact"></a> 
<div class="text-muted mb-1">Vous pouvez m'écrire ou me poser des questions en indiquant vos coordonnées.</div>
<div class="text-danger mb-1">*Obligatoire</div>

<div class="row center-block" style="border: 1px solid gray; margin: 15px 15px 15px 15px;">
    <br />
    <form action="/rendez-vous" method="POST">
        {{ csrf_field()}}
        <fieldset>

            <!-- Nom et prenom -->
            <div class="form-group">

                <label for="nom" class="col-lg-2 control-label">Nom : <span class="text-danger mb-1">*</span></label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="">
                </div>

                <label for="prenom" class="col-lg-2 control-label">Prénom : <span class="text-danger mb-1">*</span></label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="">
                </div>
            </div>
            <br /><br />

            <!-- Telephone -->
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">E-Mail : <span class="text-danger mb-1">*</span></label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="email" id="email" placeholder="">
                </div>

                <label for="tel" class="col-lg-2 control-label">Téléphone :</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control" name="tel" id="tel" placeholder="">
                </div>                            
            </div>
            <br /><br />                        
            <!-- Jours -->
            <div class="form-group mb-1">
                <label for="jours" class="col-lg-3 control-label">Jours préférés : </label>                            
                <label><input type="checkbox" class="form-control" name="lundi" id="lundi"> Lundi</label>
                <label><input type="checkbox" class="form-control" name="mardi" id="mardi"> Mardi</label>
                <label><input type="checkbox" class="form-control" name="mercredi" id="mercredi"> Mercredi</label>
                <label><input type="checkbox" class="form-control" name="jeudi" id="jeudi"> Jeudi</label>
                <label><input type="checkbox" class="form-control" name="vendredi" id="vendredi"> Vendredi</label>
                <label><input type="checkbox" class="form-control" name="samedi" id="samedi"> Samedi</label>
            </div>                         
            <!-- Horaire -->
            <div class="form-group mb-1">
                <label for="horaire" class="col-lg-3 control-label">Horaire préféré :</label>
                <div class="col-lg-5">
                    <select class="form-control" name="horaire" id="horaire">
                        <option selected value="-1">-- aucune préférence --</option>
                        <option value="0">matin (de 9h à 12h)</option>
                        <option value="1">après-midi (de 14h à 18h)</option>
                        <option value="2">soir (de 18h à 20h)</option>
                    </select>
                </div>
            </div>
            <br /><br />
            <!-- Objet du message -->
            <div class="form-group mb-1">
                <label for="objet" class="col-lg-3 control-label">Objet du message :</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" name="objet" id="objet" placeholder="">
                </div>
            </div>
            <br /><br />

            <!-- Votre message -->
            <div class="form-group mb-1">
                <label for="objet" class="col-lg-3 control-label">Votre message : <span class="text-danger mb-1">*</span></label>
                <div class="col-lg-12">
                    <textarea class="form-control" name="message" id="message" placeholder="" style="height: 200px;margin-bottom: 20px;"></textarea>
                </div>
            </div>
            <br /><br /><br /><br />
            <div class="form-group mt-3">
                <span class="col-lg-3"></span>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </fieldset>


    </form>    
</div>
<div class="mt-2"></div>

<div class="embed-responsive embed-responsive-16by9 mb-1">
    <iframe class="embed-responsive-item" title="Include gadget (iframe)" width="660" height="450" style="overflow:hidden" scrolling="no" frameborder="0" id="681586272" name="681586272"  src="http://mj89sp3sau2k7lj1eg3k40hkeppguj6j-a-sites-opensocial.googleusercontent.com/gadgets/ifr?url=http://www.gstatic.com/sites-gadgets/iframe/iframe.xml&amp;container=enterprise&amp;view=default&amp;lang=fr&amp;country=ALL&amp;sanitize=0&amp;v=9facd724e6dd3ac5&amp;libs=core&amp;mid=71&amp;parent=http://www.osteo-thionville.fr/rendez-vous#up_scroll=auto&amp;up_iframeURL=https://www.google.com/maps/embed?pb%3D!1m14!1m8!1m3!1d3333.0430737435418!2d6.159589200000001!3d49.3567201!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4795252ed9bd9cd5%253A0x192ef0b134fc2bfd!2s18%2BRue%2BG%25C3%25A9n%25C3%25A9ral%2BMangin%252C%2B57100%2BThionville!5e1!3m2!1sfr!2sfr!4v1409947054977&amp;st=e%3DAIHE3cBY2yU2yS81mi9Scvgka%252F6Q3psJbPyp4yDW%252BGvVrdfbEDdQOehwWsLcYQaJ3U8HygtvzivtP63f0ViVj8uU%252B1IMq8kAw7%252FqkXmNM1hYncFupmc0JYnAcKvP%252BBVQocAOv2jmyoQZ%26c%3Denterprise&amp;rpctoken=-7535822824523408927"></iframe>
</div>
<div class="mt-2"></div>


@endsection