<section class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <p class="page-title mb-1">{$vue.titre|escape}</p>
        <p class="mb-0">{$vue.description|escape}</p>
    </div>
    <a class="btn btn-primary-custom" href="index.php?page=categorie&action=add">Ajouter une catégorie</a>
</section>

<div class="card card-custom p-4">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$vue.categories item=cat}
                    <tr>
                        <td>{$cat.libelle|escape}</td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-dark" href="index.php?page=categorie&action=update&id={$cat.id}">Modifier</a>
                            <a class="btn btn-sm btn-danger-custom" href="#" onclick="sup({$cat.id}); return false;">Supprimer</a>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>

<script>
function sup(id) {
    if (window.confirm('Voulez-vous vraiment supprimer cette catégorie ?')) {
        window.location.replace('index.php?page=categorie&action=delete&id=' + id);
    }
}
</script>
