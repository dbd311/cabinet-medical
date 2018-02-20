<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/admin/appointments">OsteoRDV</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/appointments')}}" title="Rendez-vous de cette semaine">Mes rendez-vous |<span class="sr-only">(current)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/schedule') }}" title="Planifier les jours de congés ou vacances ou jours fériés">Planifier |</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/export-appointments') }}" title="Exporter les rendez-vous (2 semaines max)">Exporter |</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/sms') }}" title="Afficher les messages de rappel par SMS à envoyer aux patients">Générer SMS</a></li>
        </ul>
        <!--        <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>-->
        <ul class="navbar-nav navbar-right">
            <li class="nav-item"><div class="wrapper"><a class="nav-link" id="RDV" href="/admin/appointments?viewMode=agendaDay"><i class="fa fa-bell text-muted" style="font-size: 24px;"></i> <div id="appointment-wrapper"><span class="btn btn-circle"></span><span id="nbAppointments" class="count"></span></div></a></div></li>
            <li class="nav-item"><div class="wrapper"><a class="nav-link" id="SMS" href="{{url('admin/sms')}}"><i class="fa fa-envelope text-muted" style="font-size: 24px;"></i> <div id="reminder-wrapper"><span class="btn btn-circle"></span><span id="nbSMS" class="count"></span></div></a></div></li>                
            <!--                <li><a href="/admin/logout">Déconnexion</a></li>-->
            <li class="nav-item">                        
                <div class="wrapper">
                    <span class="pull-right mr-auto" data-container="body" data-toggle="popover" data-placement="left" data-content="">
                        <img src="/images/icons/favicon.png">
                    </span>
                </div>
            </li>
        </ul>
    </div>
</nav>