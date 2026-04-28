<section class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card card-custom p-4">
            <p class="page-title mb-1">{$vue.titre|escape}</p>
            <p class="mb-4">{$vue.description|escape}</p>

            {if isset($vue.error)}
                <div class="alert alert-danger">{$vue.error|escape}</div>
            {/if}

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
