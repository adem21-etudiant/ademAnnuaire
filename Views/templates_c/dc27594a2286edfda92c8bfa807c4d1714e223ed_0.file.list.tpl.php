<?php
/* Smarty version 4.1.0, created on 2026-04-28 22:01:56
  from 'C:\Users\ademr\OneDrive\Documents\annuaire_tp_final\Views\templates\Site\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f11234aa2ea4_83064760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc27594a2286edfda92c8bfa807c4d1714e223ed' => 
    array (
      0 => 'C:\\Users\\ademr\\OneDrive\\Documents\\annuaire_tp_final\\Views\\templates\\Site\\list.tpl',
      1 => 1777406186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f11234aa2ea4_83064760 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
    <div>
        <p class="page-title mb-1"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['vue']->value['titre'] ?? null)===null||$tmp==='' ? 'Mes sites' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
        <p class="mb-0"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['vue']->value['description'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
    </div>
    <a class="btn btn-primary-custom" href="index.php?page=site&action=add">Ajouter un site</a>
</section>

<div class="row g-4">
    <?php if ((isset($_smarty_tpl->tpl_vars['vue']->value['sites'])) && count($_smarty_tpl->tpl_vars['vue']->value['sites']) > 0) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['sites'], 'site');
$_smarty_tpl->tpl_vars['site']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['site']->value) {
$_smarty_tpl->tpl_vars['site']->do_else = false;
?>
            <div class="col-12">
                <article class="card card-custom p-4">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                        <div>
                            <h2 class="h4 mb-1"><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['site']->value['titre'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>
</h2>

                            <p class="mb-1">
                                <strong>Catégorie :</strong>
                                <?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['site']->value['category_name'] ?? null)===null||$tmp==='' ? 'Sans catégorie' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>

                            </p>

                            <p class="mb-1 site-link">
                                <strong>URL :</strong>
                                <?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['site']->value['url'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>

                            </p>

                            <p class="mb-0">
                                <strong>Description :</strong>
                                <?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['site']->value['description'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>

                            </p>
                        </div>

                        <div class="d-flex gap-2 flex-wrap">
                            <a class="btn btn-outline-dark" href="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['site']->value['url'] ?? null)===null||$tmp==='' ? '#' ?? null : $tmp), ENT_QUOTES, 'ISO-8859-1', true);?>
" target="_blank">Visiter</a>
                            <a class="btn btn-primary-custom" href="index.php?page=site&action=update&id=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['id'], ENT_QUOTES, 'ISO-8859-1', true);?>
">Modifier</a>
                            <a class="btn btn-danger-custom" href="#" onclick="sup(<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['site']->value['id'], ENT_QUOTES, 'ISO-8859-1', true);?>
); return false;">Supprimer</a>
                        </div>
                    </div>
                </article>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
        <div class="col-12">
            <div class="card card-custom p-4">
                <p class="mb-0">Vous n’avez encore ajouté aucun site.</p>
            </div>
        </div>
    <?php }?>
</div>

<?php echo '<script'; ?>
>
function sup(id) {
    if (window.confirm('Voulez-vous vraiment supprimer ce site ?')) {
        window.location.replace('index.php?page=site&action=delete&id=' + id);
    }
}
<?php echo '</script'; ?>
>
<?php }
}
