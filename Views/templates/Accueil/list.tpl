<section class="hero">
    <p class="page-title">{$vue.titre|escape}</p>
    <p class="lead mb-4">{$vue.description|escape}</p>
    <div class="d-flex flex-wrap gap-2">
        <a class="btn btn-primary-custom" href="index.php?page=site&action=search">Rechercher un site</a>
        {if $sessionUser}
            <a class="btn btn-dark" href="index.php?page=site&action=list">Gérer mes sites</a>
        {else}
            <a class="btn btn-outline-dark" href="index.php?page=auth&action=login">Se connecter</a>
        {/if}
    </div>
</section>

<section class="card card-custom p-4 mb-4">
    <h2 class="section-title mb-3">Recherche rapide</h2>
    <form action="index.php" method="get" class="row g-3">
        <input type="hidden" name="page" value="site">
        <input type="hidden" name="action" value="search">
        <div class="col-md-6">
            <label for="keyword" class="form-label">Mot-clé</label>
            <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Ex : développement, actualités, jeux...">
        </div>
        <div class="col-md-4">
            <label for="category_id" class="form-label">Catégorie</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Toutes les catégories</option>
                {foreach from=$vue.categories item=cat}
                    <option value="{$cat.id}">{$cat.libelle|escape}</option>
                {/foreach}
            </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button class="btn btn-primary-custom w-100" type="submit">Chercher</button>
        </div>
    </form>
</section>

<section>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="section-title mb-0">Derniers sites ajoutés</h2>
        <a href="index.php?page=site&action=search" class="btn btn-outline-dark btn-sm">Voir tout</a>
    </div>

    <div class="row g-4">
        {if $vue.sites|@count > 0}
            {foreach from=$vue.sites item=site}
                <div class="col-md-6 col-lg-4">
                    <article class="card card-custom h-100 p-3">
                        <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                            <h3 class="h5 mb-0">{$site.titre|escape}</h3>
                            <span class="badge badge-status">{$site.category_name|default:'Sans cat�gorie'|escape}</span>
                        </div>
                        <p class="text-muted site-link small mb-2">{$site.url|escape}</p>
                        <p class="mb-3">{$site.description|truncate:120|escape}</p>
                        <a class="btn btn-primary-custom mt-auto" href="{$site.url|escape}" target="_blank">Visiter le site</a>
                    </article>
                </div>
            {/foreach}
        {else}
            <div class="col-12">
                <div class="card card-custom p-4">
                    <p class="mb-0">Aucun site n’est encore publié dans l’annuaire.</p>
                </div>
            </div>
        {/if}
    </div>
</section>
