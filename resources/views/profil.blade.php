<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - Prestataire</title>
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
                    <li><a href="{{ route('profil') }}">Mon Profil</a></li>
                    <li><a href="#">Historique</a></li>
                    <li><a href="#" onclick="confirmDeletion(event)">Supprimer Profil</a></li> <!-- Lien pour supprimer le profil -->
                </ul>
            </div>
            <div class="logout">
                <a href="{{ route('logout') }}">Déconnexion</a>
            </div>
        </aside>

        <!-- Contenu Principal -->
        <main class="content">
            <h1>Bienvenue sur votre tableau de bord, {{ $prestataire->name }} {{ $prestataire->firstname }}</h1>
            <p>Ici, vous pouvez gérer vos informations, consulter vos projets et bien plus encore.</p>

            <h2>Informations du Profil</h2>
            <form action="{{ route('update-profil') }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="name">Nom:</label>
                    <input type="text" id="name" name="name" value="{{ $prestataire->name }}" required>
                </div>
                <div>
                    <label for="firstname">Prénom:</label>
                    <input type="text" id="firstname" name="firstname" value="{{ $prestataire->firstname }}" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $prestataire->email }}" required>
                </div>
                <div>
                    <label for="telephone">Téléphone:</label>
                    <input type="text" id="telephone" name="telephone" value="{{ $prestataire->telephone }}" required>
                </div>
                <div>
                    <label for="ville">Ville:</label>
                    <input type="text" id="ville" name="ville" value="{{ $prestataire->ville }}" required>
                </div>
                <div>
                    <label for="secteur_activite">Secteur d'Activité:</label>
                    <input type="text" id="secteur_activite" name="secteur_activite" value="{{ $prestataire->secteur_activite }}" required>
                </div>
                <div>
                    <label for="adresse">Adresse:</label>
                    <input type="text" id="adresse" name="adresse" value="{{ $prestataire->adresse }}" required>
                </div>
                <button type="submit">Modifier</button>
            </form>

            <!-- Afficher les messages de succès -->
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
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
        <!-- Formulaire de suppression caché -->
            <form id="delete-form" action="{{ route('delete-profil') }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </main>
    </div>
</body>

</html>
