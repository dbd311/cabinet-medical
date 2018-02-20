@extends('admin.layout')

@section('content')
<div class="wrapper">
    <div class="row ml-3">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <!--            <div id="error"></div>-->
            <div id="calendar"></div>
            @if (!empty($viewMode))
            <input type="hidden" id="calendarView"  value="{{ $viewMode }}">
            @endif
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
            <div id="dashboard" class="hidden">
                <legend> Tableau de bord</legend>
                <div id="info" class="text-muted">
                    <p>Cliquer sur le rendez-vous pour afficher ou modifier les détails.</p>
                    <div class="col-md-5 col-lg-4 col-xs-6">
                        <div class="jamais-venu" title="nouveau patient">&nbsp;jamais venu&nbsp;</div>
                        <div class="suivi" title="patient qui nécessite un suivi ou un contrôle">&nbsp;suivi&nbsp;</div>
                        <div class="deja-venu" title="patient déjà venu en consultation">&nbsp;déjà venu&nbsp;</div>
                    </div>
                </div>
            </div>
            @if(Auth::check())
            
            <div id="appointment-details" class="hidden">        
                <h4>Détails</h4> 
                <form name="formUpdate" id="formUpdate" style="border: 1px solid gray;">
                    <div class="container">
                        <input type="hidden" id="eventID" name="eventID" value="">
                        <div class="row"><div class="col-2"><label for="lastName" class="control-label mt-2">Nom</label></div><div class="col-9 ml-2"><input type="text" class="form-control text-uppercase" name="lname" id="lastName" placeholder=""></div></div>
                        <div class="row"><div class="col-2"><label for="firstName" class="control-label mt-2">Prénom</label></div><div class="col-9 ml-2"><input type="text" class="form-control text-capitalize" name="fname" id="firstName" placeholder=""></div></div>

                        <div class="row"><div class="col-2"><label for="phoneNumber" class="control-label mt-2">Tél</label></div><div class="col-9 ml-2"><input type="text" class="form-control" name="number" id="phoneNumber" placeholder=""></div></div>
                        <div class="row"><div class="col-2"><label for="mail" class="control-label mt-2">Email</label></div><div class="col-9 ml-2"><input type="text" class="form-control" name="email" id="mail" placeholder=""></div></div>
                        <div class="row"><div class="col-2"><label for="motif" class="control-label mt-2">Motif</label></div><div class="col-9 ml-2"><input type="text" class="form-control" name="motif" id="motifDetails" placeholder=""></div></div>
                        <div class="row form-group"><div class="col-2"><label for="motif" class="control-label"></label></div><div class="col-xs-8 col-sm-8 col-md-4"><select class="form-control" name="appointmentType" id="typeDetails"><option selected value="1" class="jamais-venu">jamais venu</option> <option value="2" class="suivi">suivi</option><option value="3" class="deja-venu">déjà venu</option></select></div></div>
                        <div class="row"><br /></div>
                        <div class="row"><div class="col-2 col-xs-2"><label for="startTime"><i>début</i></label></div><div class="col-9 col-xs-8 ml-2"><input type="text" readonly name="startTime" id="startTime" value=""></div></div>
                        <div class="row"><div class="col-2"><label for="endTime"><i>fin</i></label></div><div class="col-6 ml-2"><input type="text"  readonly name="endTime" id="endTime" value=""></div></div>
                        <div class="row"><br /></div>
                        <div class="row mt-3">
                            <div class="col-4 col-md-3 col-lg-2 offset-2">
                                <input type="button" class="btn btn-primary" id="btnModify" value="Modifier" title="Modifier les informations concernant le patient">
                            </div>
                            <div class="col-4 col-md-3 col-lg-2 offset-lg-1 offset-md-2">
                                <input type="button" class="btn btn-danger" id="btnDelete" value="Supprimer" title="Supprimer le rendez-vous">
                            </div>
                        </div>
                        <div class="row mb-3"><br /></div>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
            <div id="new-appointment" class="hidden">
                <h4>Nouveau rendez-vous</h4> 
                <form name="formAdd" id="formAdd" style="border: 1px solid gray">
                    <div class="container">
                        <div class="row"><div class="col-2"><label for="lname" class="control-label mt-2">Nom<span class="text-danger">*</span></label></div><div class="col-9 ml-2"><input type="text" class="form-control text-uppercase" name="lname" id="lname" placeholder=""></div></div>
                        <div class="row"><div class="col-2"><label for="fname" class="control-label mt-2">Prénom<span class="text-danger mb-1">*</span></label></div><div class="col-9 ml-2"><input type="text" class="form-control text-capitalize" name="fname" id="fname" placeholder=""></div></div>
                        <div class="row"><div class="col-2"><label for="phone" class="control-label mt-2">Tél</label></div><div class="col-9 ml-2"><input type="text" class="form-control" name="number" id="number" placeholder=""></div></div>
                        <div class="row"><div class="col-2"><label for="email" class="control-label mt-2">Email</label></div><div class="col-9 ml-2"><input type="text" class="form-control" name="email" id="email" placeholder=""></div></div>
                        <div class="row"><div class="col-2"><label for="motif" class="control-label mt-2">Motif</label></div><div class="col-9 ml-2"><input type="text" class="form-control" name="motif" id="motif" placeholder=""></div></div>
                        <div class="row form-group"><div class="col-2"><label for="motif" class="control-label"></label></div><div class="col-xs-8 col-sm-8 col-md-4"><select class="form-control" name="appointmentType" id="typeRDV"><option selected value="1" class="jamais-venu">jamais venu</option> <option value="2" class="suivi">suivi</option> <option value="3" class="deja-venu">déjà venu</option></select></div></div>
                        <div class="row"><br /></div>
                        <div class="row"><div class="col-2"><label for="startsAtFormat" class="control-label mt-2"><i>début</i></label></div><div class="col-9 ml-2"><input type="text" readonly id="startsAtFormat" value="" class="form-control"><input type="hidden" name="startTime" id="startsAt" value=""></div></div>
                        <div class="row"><br /></div>
                        <div class="row mt-3">
                            <div class="col-xs-6 col-md-3 offset-lg-2">
                                <input type="button" class="btn btn-primary" id="btnSubmit" value="Ajouter">                        
                            </div>
                            <div class="col-3 col-sm-3 col-md-2 col-lg-1 ml-5">
                                <input type="button" class="btn btn-info" id="btnClear" value="Effacer" title="Effacer les données dans le formulaire">
                            </div>                            
                        </div>
                        <div class="row mb-3"><br /></div>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
            @endif
        </div>
    </div>
    <div class="row hidden" id="connexionInfo">
        <div class="col-12">
            <span class="pull-right">
                <?php
                use App\Models\Connexion;
                
                $now = date('d/m/Y H:i:s');
                $info = 'Dernière connexion le ' . date('d/m/Y à H:i');
                $location = geoip()->getLocation(Request::ip());
                
                if (!empty($location->city)) {
                    $info .= ' | ' . $location->city;
                }
                
                echo $info;
                
                Connexion::create(['datetime' => $now, 'ip' => Request::ip(), 'city' => $location->city, 'country' => $location->country]);
                ?>
            </span>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ elixir('/js/cpanel/agenda/admin/appointments.js') }}"></script>
@endsection