<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Saisir les informations du contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="contactInsert.php" method="POST">

                    <!-- insertion nom -->
                    <div class="mb-3">
                        <label for="Nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" placeholder="Saisissez le Nom" name="Nom" required>
                    </div>
                    <!-- insertion prenom -->
                    <div class="mb-3">
                        <label for="Prenom" class="form-label">Prenom</label>
                        <input type="text" class="form-control" placeholder="Saisissez le Prenom" name="Prenom" required>
                    </div>
                    <!-- insertion numero tel -->
                    <div class="mb-3">
                        <label for="Numero" class="form-label">Numero</label>
                        <input type="text" class="form-control" placeholder="Saisissez le numero" name="Numero" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>