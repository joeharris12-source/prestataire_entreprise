
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('confirmationModal');
    var confirmDeleteBtn = document.getElementById('confirmDelete');
    var cancelDeleteBtn = document.getElementById('cancelDelete');
    var closeButton = document.querySelector('.close-button');

    function confirmDeletion(event) {
        event.preventDefault();
        modal.style.display = 'flex'; // Affiche le modal
    }

    confirmDeleteBtn.onclick = function() {
        document.getElementById('delete-form').submit(); // Soumet le formulaire de suppression
    }

    cancelDeleteBtn.onclick = function() {
        modal.style.display = 'none'; // Cache le modal
    }

    closeButton.onclick = function() {
        modal.style.display = 'none'; // Cache le modal
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none'; // Cache le modal si on clique à l'extérieur
        }
    }

    // Remplacez l'événement onclick par une fonction confirmDeletion
    var deleteLink = document.querySelector('a[onclick="confirmDeletion(event)"]');
    deleteLink.onclick = confirmDeletion;
});
