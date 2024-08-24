<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Prestataire</title>
    <link rel="stylesheet" href="{{ asset('assets/css/dashPres.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="{{asset('assets/js/script.js')}}"></script> 
</head>

<body>
     <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div>
                <h2>Tableau de bord</h2>
                <ul>
                <li><a href="{{ route('profilEntrpres') }}">Mon Profil</a></li>
                <li><a href="#">Historique</a></li>
                <li><a href="#" onclick="confirmDeletion(event)">Supprimer Profil</a></li>
                </ul>
            </div>
            <div class="logout">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
</div>

        </aside>

        <!-- Contenu Principal -->
        <main class="content">
        <h1>Bienvenue sur votre tableau de bord, {{ Auth::guard('entrprestataires')->user()->name }} {{ Auth::guard('entrprestataires')->user()->firstname }}</h1>
        <p>Ici, vous pouvez gérer vos informations, consulter vos projets et bien plus encore.</p>
            <form id="delete-form" action="{{ route('delete-profil') }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </main>
    </div>
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Confirmation de suppression</h2>
            <p>Êtes-vous sûr de vouloir supprimer votre profil ? Cette action est irréversible.</p>
            <div class="modal-buttons">
                <button id="confirmDelete" class="btn-confirm">Oui, supprimer</button>
                <button id="cancelDelete" class="btn-cancel">Annuler</button>
            </div>
        </div>
     </div>
</body>

</html>