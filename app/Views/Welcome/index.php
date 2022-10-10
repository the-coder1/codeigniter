<?= $this->extend("layouts/default") ?>

<?= $this->section("title"); ?>Bine ai venit<?= $this->endSection() ?>


<?= $this->section("content"); ?>

    <div class="container mt-5">
        <h1>Welcome <?php if(isset($name)){ echo $name; } ?></h1>
    </div>

<?= $this->endSection() ?>