<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/dashEntr.css') }}">
    <script src="{{asset('assets/js/script.js')}}"></script> 

    <title>Tableau de Bord - Entreprise</title>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="text">
                <h2>Tableau de bord</h2>
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('profilEntr') }}">Profil</a></li>
                    <li><a href="{{ route('historique') }}">Historique</a></li>
                    <li><a href="{{ route('projet') }}">Ajouter un Projet</a></li>
                    <li><a href="{{ route('entreprise-prestataires') }}" class="btn btn-primary">Voir les prestataires</a></li>
                    <li><a href="#"  onclick="confirmDeletion(event)">Supprimer</a></li>
                    <div class="logout">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
</div>
                </ul>
            </nav>
        </aside>
        <main class="content">
            <h1>Bienvenue sur votre tableau de bord, {{ Auth::guard('entreprise')->user()->name }}</h1>
            <p>Voici votre tableau de bord où vous pouvez gérer vos projets et informations.</p>
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
            <form id="delete-form" action="{{ route('delete-profilEntr', ['id' => $entreprise->id]) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<!-- Modal de confirmation -->
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

        </main>
    </div>
</body>
</html>
