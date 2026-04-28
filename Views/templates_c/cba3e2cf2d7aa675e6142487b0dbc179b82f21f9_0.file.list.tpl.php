<?php
/* Smarty version 4.1.0, created on 2026-04-28 22:01:06
  from 'C:\Users\ademr\OneDrive\Documents\annuaire_tp_final\Views\templates\Accueil\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f112020b1df0_96217084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cba3e2cf2d7aa675e6142487b0dbc179b82f21f9' => 
    array (
      0 => 'C:\\Users\\ademr\\OneDrive\\Documents\\annuaire_tp_final\\Views\\templates\\Accueil\\list.tpl',
      1 => 1777406186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f112020b1df0_96217084 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\ademr\\OneDrive\\Documents\\annuaire_tp_final\\libs\\smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<section class="hero">
    <p class="page-title"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['titre'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
    <p class="lead mb-4"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['description'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
    <div class="d-flex flex-wrap gap-2">
        <a class="btn btn-primary-custom" href="index.php?page=site&action=search">Rechercher un site</a>
        <?php if ($_smarty_tpl->tpl_vars['sessionUser']->value) {?>
            <a class="btn btn-dark" href="index.php?page=site&action=list">Gérer mes sites</a>
        <?php } else { ?>
            <a class="btn btn-outline-dark" href="index.php?page=auth&action=login">Se connecter</a>
        <?php }?>
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
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['cat']->value['libelle'], ENT_QUOTES, 'ISO-8859-1', true);?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
        <?php if (count($_smarty_tpl->tpl_vars['vue']->value['sites']) > 0) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['sites'], 'site');
$_smarty_tpl->tpl_vars['site']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['site']->value) {
$_smarty_tpl->tpl_vars['site']->do_else = false;
?>
                <div class="col-md-6 col-lg-4">
                    <article class="card card-custom h-100 p-3">
                        <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                            <h3 class="h5 mb-0"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['titre'], ENT_QUOTES, 'ISO-8859-1', true);?>
</h3>
                            <span class="badge badge-status"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['site']->value['category_name'] ?? null)===null||$tmp==='' ? 'Sans cat�gorie' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>
</span>
                        </div>
                        <p class="text-muted site-link small mb-2"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['url'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
                        <p class="mb-3"><?php echo htmlspecialchars((string)smarty_modifier_truncate($_smarty_tpl->tpl_vars['site']->value['description'],120), ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
                        <a class="btn btn-primary-custom mt-auto" href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['url'], ENT_QUOTES, 'ISO-8859-1', true);?>
" target="_blank">Visiter le site</a>
                    </article>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
            <div class="col-12">
                <div class="card card-custom p-4">
                    <p class="mb-0">Aucun site n’est encore publié dans l’annuaire.</p>
                </div>
            </div>
        <?php }?>
    </div>
</section>
<?php }
}
