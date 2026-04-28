<section class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card card-custom p-4">
            <p class="page-title mb-1">{$vue.titre|escape}</p>
            <p class="mb-4">{$vue.description|escape}</p>

            {if isset($vue.errors) && $vue.errors|@count > 0}
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        {foreach from=$vue.errors item=error}
                            <li>{$error|escape}</li>
                        {/foreach}
                    </ul>
                </div>
            {/if}

            <form action="index.php?page=auth&action=register" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" id="email" value="{$vue.old_email|default:''}" required>
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
