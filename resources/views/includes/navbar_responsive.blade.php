<div class="bootstrap-vertical-nav dashed-border mb-2">
    
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <button class="navbar-toggler hidden-lg-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar"><span class="navbar-toggler-icon"></span></button>

        <div class="collapse navbar-collapse" id="collapsingNavbar">            
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ !isset($active) || ($active === 0)? 'text-muted' : 'text-primary'}}" href="/">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isset($active) && $active === 1 ? 'text-muted' : 'text-primary'}}" href="/osteopathie">L'ostéopathie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isset($active) && $active === 2 ? 'text-muted' : 'text-primary'}}" href="/indications">Indications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isset($active) && $active === 3 ? 'text-muted' : 'text-primary'}}" href="/consultation">Consultation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isset($active) && $active === 4 ? 'text-muted' : 'text-primary'}}" href="/questions-frequentes">Questions fréquentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isset($active) && $active === 5 ? 'text-muted' : 'text-primary'}}" href="/tarifs-et-remboursements">Tarifs et remboursements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isset($active) && $active === 6 ? 'text-muted' : 'text-primary'}}" href="/le-cabinet">Le cabinet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isset($active) && $active === 7 ? 'text-muted' : 'text-primary'}}" href="/divers">Divers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isset($active) && $active === 8 ? 'text-muted' : 'text-primary'}}" href="/actualites">Actualités</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isset($active) && $active === 9 ? 'text-muted' : 'text-primary'}}" href="/rendez-vous">Prendre rendez-vous</a>
                </li>
            </ul>
        </div>
    </nav>
    
</div>