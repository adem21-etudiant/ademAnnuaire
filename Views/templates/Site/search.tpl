<section class="mb-4">
    <p class="page-title mb-1">{$vue.titre|default:'Recherche de sites'|escape}</p>
    <p class="mb-0">{$vue.description|default:''|escape}</p>
</section>

<div class="card card-custom p-4 mb-4">
    <form action="index.php" method="get" class="row g-3">
        <input type="hidden" name="page" value="site">
        <input type="hidden" name="action" value="search">

        <div class="col-md-6">
            <label for="keyword" class="form-label">Mot-clé</label>
            <input 
                class="form-control" 
                type="text" 
                name="keyword" 
                id="keyword" 
                value="{$vue.keyword|default:''|escape}" 
                placeholder="Ex : sport, manga, foot, actualités..."
            >
        </div>

        <div class="col-md-4">
            <label for="category_id" class="form-label">Catégorie</label>
            <select class="form-select" name="category_id" id="category_id">
                <option value="">Toutes les catégories</option>

                {if isset($vue.categories)}
                    {foreach from=$vue.categories item=cat}
                        <option value="{$cat.id|escape}" 
                            {if isset($vue.selectedCategory) && $vue.selectedCategory == $cat.id}selected{/if}>
                            {$cat.libelle|escape}
                        </option>
                    {/foreach}
                {/if}
            </select>
        </div>

        <div class="col-md-2 d-flex align-items-end">
            <button class="btn btn-primary-custom w-100" type="submit">Rechercher</button>
        </div>
    </form>
</div>

<div class="row g-4">
    {if isset($vue.sites) && $vue.sites|@count > 0}
        {foreach from=$vue.sites item=site}
            <div class="col-12 col-lg-6">
                <article class="card card-custom p-4 h-100">
                    <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                        <h2 class="h4 mb-0">{$site.titre|default:''|escape}</h2>

                        <span class="badge badge-status">
                            {$site.category_name|default:'Sans catégorie'|escape}
                        </span>
                    </div>

                    <p class="site-link text-muted mb-2">
                        {$site.url|default:''|escape}
                    </p>

                    <p class="mb-3">
                        {$site.description|default:''|escape}
                    </p>

                    <a 
                        class="btn btn-primary-custom mt-auto" 
                        href="{$site.url|default:'#'|escape}" 
                        target="_blank"
                    >
                        Visiter le site
                    </a>
                </article>
            </div>
        {/foreach}
    {else}
        <div class="col-12">
            <div class="card card-custom p-4">
                <p class="mb-0">Aucun site ne correspond à votre recherche.</p>
            </div>
        </div>
    {/if}
</div>