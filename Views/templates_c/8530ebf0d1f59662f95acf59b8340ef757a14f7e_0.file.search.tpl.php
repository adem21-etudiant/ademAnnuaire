<?php
/* Smarty version 4.1.0, created on 2026-04-28 19:59:34
  from 'C:\Users\ademr\OneDrive\Documents\annuaire_tp_final\Views\templates\Site\search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f0f586b0f9c9_82582949',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8530ebf0d1f59662f95acf59b8340ef757a14f7e' => 
    array (
      0 => 'C:\\Users\\ademr\\OneDrive\\Documents\\annuaire_tp_final\\Views\\templates\\Site\\search.tpl',
      1 => 1777399151,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f0f586b0f9c9_82582949 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="mb-4">
    <p class="page-title mb-1"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['vue']->value['titre'] ?? null)===null||$tmp==='' ? 'Recherche de sites' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
    <p class="mb-0"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['vue']->value['description'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
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
                value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['vue']->value['keyword'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>
" 
                placeholder="Ex : sport, manga, foot, actualités..."
            >
        </div>

        <div class="col-md-4">
            <label for="category_id" class="form-label">Catégorie</label>
            <select class="form-select" name="category_id" id="category_id">
                <option value="">Toutes les catégories</option>

                <?php if ((isset($_smarty_tpl->tpl_vars['vue']->value['categories']))) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
                        <option value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['cat']->value['id'], ENT_QUOTES, 'ISO-8859-1', true);?>
" 
                            <?php if ((isset($_smarty_tpl->tpl_vars['vue']->value['selectedCategory'])) && $_smarty_tpl->tpl_vars['vue']->value['selectedCategory'] == $_smarty_tpl->tpl_vars['cat']->value['id']) {?>selected<?php }?>>
                            <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['cat']->value['libelle'], ENT_QUOTES, 'ISO-8859-1', true);?>

                        </option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
            </select>
        </div>

        <div class="col-md-2 d-flex align-items-end">
            <button class="btn btn-primary-custom w-100" type="submit">Rechercher</button>
        </div>
    </form>
</div>

<div class="row g-4">
    <?php if ((isset($_smarty_tpl->tpl_vars['vue']->value['sites'])) && count($_smarty_tpl->tpl_vars['vue']->value['sites']) > 0) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['sites'], 'site');
$_smarty_tpl->tpl_vars['site']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['site']->value) {
$_smarty_tpl->tpl_vars['site']->do_else = false;
?>
            <div class="col-12 col-lg-6">
                <article class="card card-custom p-4 h-100">
                    <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                        <h2 class="h4 mb-0"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['site']->value['titre'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>
</h2>

                        <span class="badge badge-status">
                            <?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['site']->value['category_name'] ?? null)===null||$tmp==='' ? 'Sans catégorie' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>

                        </span>
                    </div>

                    <p class="site-link text-muted mb-2">
                        <?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['site']->value['url'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>

                    </p>

                    <p class="mb-3">
                        <?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['site']->value['description'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>

                    </p>

                    <a 
                        class="btn btn-primary-custom mt-auto" 
                        href="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['site']->value['url'] ?? null)===null||$tmp==='' ? '#' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>
" 
                        target="_blank"
                    >
                        Visiter le site
                    </a>
                </article>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
        <div class="col-12">
            <div class="card card-custom p-4">
                <p class="mb-0">Aucun site ne correspond à votre recherche.</p>
            </div>
        </div>
    <?php }?>
</div><?php }
}
