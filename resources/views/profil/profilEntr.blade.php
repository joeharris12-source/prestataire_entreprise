<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/dashEntr.css') }}">
    <script src="{{asset('assets/js/script.js')}}"></script> 

    <title>Profil de l'Entreprise</title>
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="{{ route('profilEntr') }}">Profil</a></li>
                    <li><a href="#">Historique</a></li>
                    <li><a href="#">Ajouter un projet</a></li>
                    <li><a href="#" onclick="confirmDeletion(event)">Supprimer Profil</a></li>                  
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
            <h1>Modifier le Profil de l'Entreprise</h1>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profilEntreprise.update') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Nom de l'Entreprise:</label>
                    <input type="text" id="name" name="name" value="{{ $entreprise->name }}" required>
                </div>
                
                <div class="form-group">
                    <label for="status">Statut:</label>
                    <input type="text" id="status" name="status" value="{{ $entreprise->status }}" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $entreprise->email }}" required>
                </div>

                <div class="form-group">
                    <label for="telephone">Téléphone:</label>
                    <input type="text" id="telephone" name="telephone" value="{{ $entreprise->telephone }}" required>
                </div>

                <div class="form-group">
                    <label for="ville">Ville:</label>
                    <input type="text" id="ville" name="ville" value="{{ $entreprise->ville }}" required>
                </div>

                <div class="form-group">
                    <label for="adresse">Adresse:</label>
                    <input type="text" id="adresse" name="adresse" value="{{ $entreprise->adresse }}" required>
                </div>

                <button type="submit" class="btn-save">Enregistrer les modifications</button>
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
        <!-- Formulaire de suppression caché -->
            <form id="delete-form" action="{{ route('delete-profil') }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </main>
    </div>
</body>

</html>
