<section class="mb-4">
    <p class="page-title mb-1">{$vue.titre|escape}</p>
    <p class="mb-0">{$vue.description|escape}</p>
</section>

<div class="card card-custom p-4">
    <form action="index.php?page=categorie&action=insert" method="post">
        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé</label>
            <input type="text" class="form-control" name="libelle" id="libelle" maxlength="100" required>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-primary-custom" type="submit">Valider</button>
            <a class="btn btn-outline-dark" href="index.php?page=categorie&action=list">Retour</a>
        </div>
    </form>
</div>
