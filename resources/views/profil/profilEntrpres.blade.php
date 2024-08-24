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
        @if (isset($entrprestataires))
                <h1>Bienvenue sur votre tableau de bord, {{ $entrprestataires->name }} {{ $entrprestataires->firstname }}</h1>
            @else
                <p>Utilisateur non trouvé ou non connecté.</p>
            @endif
            <h2>Informations du Profil</h2>
            <form action="{{ route('update-profilEntrpres') }}" method="POST">
                @csrf
                @method('POST')
                <div>
                    <label for="name">Nom:</label>
                    <input type="text" id="name" name="name" value="{{ $entrprestataires->name }}" required>
                </div>
                <div>
                    <label for="firstname">Prénom:</label>
                    <input type="text" id="firstname" name="firstname" value="{{ $entrprestataires->firstname }}" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $entrprestataires->email }}" required>
                </div>
                <div>
                    <label for="telephone">Téléphone:</label>
                    <input type="text" id="telephone" name="telephone" value="{{ $entrprestataires->telephone }}" required>
                </div>
                <div>
                    <label for="ville">Ville:</label>
                    <input type="text" id="ville" name="ville" value="{{ $entrprestataires->ville }}" required>
                </div>
                <div>
                    <label for="adresse">adresse:</label>
                    <input type="text" id="adresse" name="adresse" value="{{ $entrprestataires->adresse }}" required>
                </div>
                <div>
                    <label for="secteurs_activite">Secteur d'Activité:</label>
                    <input type="text" id="secteurs_activite" name="secteurs_activite" value="{{ $entrprestataires->secteurs_activite }}" required>
                </div>
                <div>
                    <label for="nom_responsable">Nom du Responsable:</label>
                    <input type="text" id="nom_responsable" name="nom_responsable" value="{{ $entrprestataires->nom_responsable }}" required>
                </div>
                <div>
                    <label for="nom_entreprise">Nom de l'Entreprise:</label>
                    <input type="text" id="nom_entreprise" name="nom_entreprise" value="{{ $entrprestataires->nom_entreprise }}" required>
                </div>
                <div>
                    <label for="date_creation_entreprise">Date de Création de l'Entreprise:</label>
                    <input type="date" id="date_creation_entreprise" name="date_creation_entreprise" value="{{ $entrprestataires->date_creation_entreprise }}" required>
                </div>
                <button type="submit">Modifier</button>
            </form>

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

            <form id="delete-form" action="{{ route('delete-profilEntrpres') }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </main>
    </div>
</body>

</html>
