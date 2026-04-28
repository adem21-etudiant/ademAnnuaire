<?php
/* Smarty version 4.1.0, created on 2026-04-28 22:01:25
  from 'C:\Users\ademr\OneDrive\Documents\annuaire_tp_final\Views\templates\Auth\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f112154d27d0_56244498',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a185cc21fe2c77985ddad0ed50cb1f4f5077ca3' => 
    array (
      0 => 'C:\\Users\\ademr\\OneDrive\\Documents\\annuaire_tp_final\\Views\\templates\\Auth\\register.tpl',
      1 => 1777406186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f112154d27d0_56244498 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card card-custom p-4">
            <p class="page-title mb-1"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['titre'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
            <p class="mb-4"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['description'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>

            <?php if ((isset($_smarty_tpl->tpl_vars['vue']->value['errors'])) && count($_smarty_tpl->tpl_vars['vue']->value['errors']) > 0) {?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vue']->value['errors'], 'error');
$_smarty_tpl->tpl_vars['error']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->do_else = false;
?>
                            <li><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'ISO-8859-1', true);?>
</li>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            <?php }?>

            <form action="index.php?page=auth&action=register" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" id="email" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['vue']->value['old_email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" required>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary-custom" type="submit">S’inscrire</button>
                    <a class="btn btn-outline-dark" href="index.php?page=auth&action=login">J’ai déjà un compte</a>
                </div>
            </form>
        </div>
    </div>
</section>
<?php }
}
