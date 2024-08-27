<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-2" aria-controls="submenu-2">Parametre</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">


                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.categorie.index') }}">Categorie</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.sousCategorie.index') }}">Sous
                                        Categorie</a>
                                </li>



                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.projet') }}">Projet</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.entreprise.index') }}">Entreprise</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.prestataire.index') }}">Prestataire</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.contrat.index') }}">Contrat</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.contact.index') }}">Contacts</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>
