<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>{$vue.titre|default:'Annuaire de site web'}</title>
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
                        {if $sessionUser}
                            <li class="nav-item"><a class="nav-link" href="index.php?page=site&action=list">Mes sites</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=categorie&action=list">Catégories</a></li>
                        {/if}
                    </ul>
                    <div class="d-flex gap-2">
                        {if $sessionUser}
                            <span class="align-self-center fw-bold">{$sessionUser.email|escape}</span>
                            <a class="btn btn-dark" href="index.php?page=auth&action=logout">Déconnexion</a>
                        {else}
                            <a class="btn btn-outline-dark" href="index.php?page=auth&action=login">Connexion</a>
                            <a class="btn btn-primary-custom" href="index.php?page=auth&action=register">Inscription</a>
                        {/if}
                    </div>
                </div>
            </div>
        </nav>

        <main class="container pb-5">
            {include file=$tpl}
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
