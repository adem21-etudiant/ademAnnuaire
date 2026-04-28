<?php
/* Smarty version 4.1.0, created on 2026-04-28 22:01:23
  from 'C:\Users\ademr\OneDrive\Documents\annuaire_tp_final\Views\templates\Auth\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f1121307ba18_25592253',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3dbdfe410843af9b5f256ba090b14616a34a7f02' => 
    array (
      0 => 'C:\\Users\\ademr\\OneDrive\\Documents\\annuaire_tp_final\\Views\\templates\\Auth\\login.tpl',
      1 => 1777406186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f1121307ba18_25592253 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card card-custom p-4">
            <p class="page-title mb-1"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['titre'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>
            <p class="mb-4"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['description'], ENT_QUOTES, 'ISO-8859-1', true);?>
</p>

            <?php if ((isset($_smarty_tpl->tpl_vars['vue']->value['error']))) {?>
                <div class="alert alert-danger"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['vue']->value['error'], ENT_QUOTES, 'ISO-8859-1', true);?>
</div>
            <?php }?>

            <form action="index.php?page=auth&action=login" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary-custom" type="submit">Se connecter</button>
                    <a class="btn btn-outline-dark" href="index.php?page=auth&action=register">Créer un compte</a>
                </div>
            </form>
        </div>
    </div>
</section>
<?php }
}
