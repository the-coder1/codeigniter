<?= $this->extend("layouts/default") ?>

<?= $this->section("title"); ?>Bine ai venit<?= $this->endSection() ?>


<?= $this->section("content"); ?>

    <div class="container mt-5">
        <h1>Welcome <?php if(isset($name)){ echo $name; } ?></h1>
        
        <button onclick="location.href='/admin/add_user'" class="btn btn-outline-primary btn-sm mt-5">Adaugă</button>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NUME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">ROL</th>
                    <th scope="col">ACȚIUNI</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user) { ?>
                    <tr>
                        <th scope="row"><?= $user->id ?></th>
                        <td><?= $user->name ?></td>
                        <td><?= $user->email ?></td>
                        <td><?php if ($user->isAdmin) { echo "manager"; } else { echo "operator"; }  ?></td>
                        <td>
                            <button onclick="location.href='/admin/edit_user/<?= $user->id; ?>'" class="btn btn-outline-primary btn-sm">Editează</button>
                            <button onclick="location.href='/admin/delete_user/<?= $user->id; ?>'" class="btn btn-outline-danger btn-sm">Șterge</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?= $this->endSection() ?>