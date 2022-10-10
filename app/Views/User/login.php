<?= $this->extend("layouts/default") ?>

<?= $this->section("title"); ?>Logare<?= $this->endSection() ?>


<?= $this->section("content"); ?>

    <div class="d-flex flex-column border border-secondary border-opacity-50 rounded my-5 mx-auto col-10 col-sm-6 col-lg-4 col-xl-3">
        <p class="bg-secondary bg-opacity-10 text-center fs-5 p-2">Autentifică-te acum</p>
        <form method="post" action="/user/login" class="d-flex flex-column align-items-center">
            <div class="d-flex flex-column mx-5 mb-3 col-10">
                <label for="email" class="form-label mb-2">Adresa ta de email</label>
                <input 
                    type="text" 
                    id="email" 
                    name="email"
                    placeholder="Adresa ta de email" 
                    class="p-2 rounded border border-secondary border-opacity-50 form-control" 
                />
            </div>
            <div class="d-flex flex-column mx-5 mb-3 col-10">
                <label for="password" class="form-label mb-2">Parola</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password"
                    placeholder="Parola ta" 
                    class="p-2 rounded border border-secondary border-opacity-50 form-control" 
                />
            </div>
            <button type="submit" class="btn btn-primary mb-3">Autentifică-te</button>
            <?php if(isset($validation)):?>
                <div class="text-danger mb-3"><?= $validation; ?></div>
            <?php endif;?>
        </form>
    </div>

<?= $this->endSection() ?>