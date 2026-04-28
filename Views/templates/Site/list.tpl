<section class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
    <div>
        <p class="page-title mb-1">{$vue.titre|default:'Mes sites'|escape}</p>
        <p class="mb-0">{$vue.description|default:''|escape}</p>
    </div>
    <a class="btn btn-primary-custom" href="index.php?page=site&action=add">Ajouter un site</a>
</section>

<div class="row g-4">
    {if isset($vue.sites) && $vue.sites|@count > 0}
        {foreach from=$vue.sites item=site}
            <div class="col-12">
                <article class="card card-custom p-4">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                        <div>
                            <h2 class="h4 mb-1">{$site.titre|default:''|escape}</h2>

                            <p class="mb-1">
                                <strong>Catégorie :</strong>
                                {$site.category_name|default:'Sans catégorie'|escape}
                            </p>

                            <p class="mb-1 site-link">
                                <strong>URL :</strong>
                                {$site.url|default:''|escape}
                            </p>

                            <p class="mb-0">
                                <strong>Description :</strong>
                                {$site.description|default:''|escape}
                            </p>
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <a class="btn btn-outline-dark" href="{$site.url|default:'#'|escape}" target="_blank">Visiter</a>
                            <a class="btn btn-primary-custom" href="index.php?page=site&action=update&id={$site.id|escape}">Modifier</a>
                            <a class="btn btn-danger-custom" href="#" onclick="sup({$site.id|escape}); return false;">Supprimer</a>
                        </div>
                    </div>
                </article>
            </div>
        {/foreach}
    {else}
        <div class="col-12">
            <div class="card card-custom p-4">
                <p class="mb-0">Vous n’avez encore ajouté aucun site.</p>
            </div>
        </div>
    {/if}
</div>

<script>
function sup(id) {
    if (window.confirm('Voulez-vous vraiment supprimer ce site ?')) {
        window.location.replace('index.php?page=site&action=delete&id=' + id);
    }
}
</script>
