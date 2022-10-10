<?= $this->extend("layouts/default") ?>

<?= $this->section("title"); ?>Acasă<?= $this->endSection() ?>


<?= $this->section("content"); ?>

    <div class="container mt-5">
        <h1>Welcome</h1>
        <div class="mt-3">
            <button onclick="location.href='/user/register'" class="btn btn-primary">Înregistrează-te</button>
            <button onclick="location.href='/user/login'" class="btn btn-primary">Autentifică-te</button>
        </div>
    </div>

<?= $this->endSection() ?>