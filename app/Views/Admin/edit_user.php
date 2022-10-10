<?= $this->extend("layouts/default") ?>

<?= $this->section("title"); ?>Editare utilizator<?= $this->endSection() ?>


<?= $this->section("content"); ?>

<div class="d-flex flex-column border border-secondary border-opacity-50 rounded my-5 mx-auto col-10 col-sm-6 col-lg-4 col-xl-3">
        <p class="bg-secondary bg-opacity-10 text-center fs-5 p-2">Editează</p>
        <form method="post" action="/admin/edit_user/<?= $user->id; ?>" class="d-flex flex-column align-items-center">
            <div class="d-flex flex-column mx-5 mb-3 col-10">
                <label for="name" class="form-label mb-2">Numele</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name"
                    value="<?= $user->name; ?>"
                    placeholder="Numele" 
                    class="p-2 rounded border border-secondary border-opacity-50 form-control" 
                />
            </div>
            <div class="d-flex flex-column mx-5 mb-3 col-10">
                <label for="email" class="form-label mb-2">Adresa de email</label>
                <input 
                    type="text" 
                    id="email" 
                    name="email"
                    value="<?= $user->email; ?>"
                    placeholder="Adresa de email" 
                    class="p-2 rounded border border-secondary border-opacity-50 form-control" 
                />
            </div>
            <div class="d-flex flex-row mx-5 mb-3 col-10">
                <input 
                    type="checkbox" 
                    id="isAdmin" 
                    name="isAdmin"
                    class="p-2 rounded border border-secondary border-opacity-50 form-check-input" 
                    <?php if($user->isAdmin) echo "checked"; ?>
                />
                <label for="email" class="form-label ms-2">Admin</label>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Actualizează</button>
        </form>
    </div>

<?= $this->endSection() ?>