<section class="mb-4">
    <p class="page-title mb-1">{$vue.titre|escape}</p>
    <p class="mb-0">{$vue.description|escape}</p>
</section>

<div class="card card-custom p-4">
    {if isset($vue.errors) && $vue.errors|@count > 0}
        <div class="alert alert-danger">
            <ul class="mb-0">
                {foreach from=$vue.errors item=error}
                    <li>{$error|escape}</li>
                {/foreach}
            </ul>
        </div>
    {/if}

    <form action="index.php?page=site&action=insert" method="post">
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input class="form-control" type="text" name="titre" id="titre" value="{$vue.old.titre|default:''}" required>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input class="form-control" type="url" name="url" id="url" value="{$vue.old.url|default:''}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="4" required>{$vue.old.description|default:''}</textarea>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Catégorie</label>
            <select class="form-select" name="category_id" id="category_id" required>
                <option value="">Choisir une catégorie</option>
                {foreach from=$vue.categories item=cat}
                    <option value="{$cat.id}" {if isset($vue.old.category_id) && $vue.old.category_id == $cat.id}selected{/if}>{$cat.libelle|escape}</option>
                {/foreach}
            </select>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-primary-custom" type="submit">Ajouter</button>
            <a class="btn btn-outline-dark" href="index.php?page=site&action=list">Retour</a>
        </div>
    </form>
</div>
