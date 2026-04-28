<?php
/* Smarty version 4.1.0, created on 2026-04-28 22:01:05
  from 'C:\Users\ademr\OneDrive\Documents\annuaire_tp_final\Views\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_69f11201e17ae4_58076249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9f02ab78b841425a569986410a6566284867bda' => 
    array (
      0 => 'C:\\Users\\ademr\\OneDrive\\Documents\\annuaire_tp_final\\Views\\templates\\index.tpl',
      1 => 1777406186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f11201e17ae4_58076249 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['vue']->value['titre'] ?? null)===null||$tmp==='' ? 'Annuaire de site web' ?? null : $tmp);?>
</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            :root {
                --beige: #fcf5e4;
                --jaune: #edb217;
                --noir: #212121;
                --rouge: #f4143f;
            }
            body {
                background: var(--beige);
                color: var(--noir);
                font-family: Arial, Helvetica, sans-serif;
            }
            .navbar-custom {
                background: var(--jaune);
                box-shadow: 0 2px 10px rgba(0,0,0,.08);
            }
            .navbar-custom .nav-link,
            .navbar-custom .navbar-brand {
                color: var(--noir) !important;
                font-weight: 700;
            }
            .hero {
                background: linear-gradient(135deg, rgba(237,178,23,.18), rgba(252,245,228,1));
                border-radius: 22px;
                padding: 2rem;
                margin-bottom: 2rem;
                border: 1px solid rgba(33,33,33,.08);
            }
            .card-custom {
                background: #fff;
                border: none;
                border-radius: 18px;
                box-shadow: 0 8px 24px rgba(0,0,0,.08);
            }
            .btn-primary-custom {
                background: var(--jaune);
                color: var(--noir);
                border: none;
                font-weight: 700;
            }
            .btn-primary-custom:hover {
                background: #d39c10;
                color: var(--noir);
            }
            .btn-danger-custom {
                background: var(--rouge);
                color: white;
                border: none;
                font-weight: 700;
            }
            .btn-danger-custom:hover {
                background: #d10f36;
                color: white;
            }
            .page-title {
                font-size: 2rem;
                font-weight: 800;
                margin-bottom: .5rem;
            }
            .section-title {
                font-size: 1.25rem;
                font-weight: 700;
            }
            .site-link {
                word-break: break-word;
            }
            .badge-status {
                background: rgba(237,178,23,.18);
                color: var(--noir);
                font-weight: 700;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-custom mb-4">
            <div class="container">
                <a class="navbar-brand" href="index.php">Les Pages Orange</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?page=site&action=search">Rechercher</a></li>
                        <?php if ($_smarty_tpl->tpl_vars['sessionUser']->value) {?>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=site&action=list">Mes sites</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=categorie&action=list">Catégories</a></li>
                        <?php }?>
                    </ul>
                    <div class="d-flex gap-2">
                        <?php if ($_smarty_tpl->tpl_vars['sessionUser']->value) {?>
                            <span class="align-self-center fw-bold"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['sessionUser']->value['email'], ENT_QUOTES, 'ISO-8859-1', true);?>
</span>
                            <a class="btn btn-dark" href="index.php?page=auth&action=logout">Déconnexion</a>
                        <?php } else { ?>
                            <a class="btn btn-outline-dark" href="index.php?page=auth&action=login">Connexion</a>
                            <a class="btn btn-primary-custom" href="index.php?page=auth&action=register">Inscription</a>
                        <?php }?>
                    </div>
                </div>
            </div>
        </nav>

        <main class="container pb-5">
            <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['tpl']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </main>

        <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    </body>
</html>
<?php }
}
