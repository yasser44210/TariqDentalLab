<?php $this->load->view('includes/header'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h4>Doctors List</h4>
        </div>
        <div class="col-md-4">
            <?= form_open('doctors/search', ['method' => 'post']); ?>
            <div class="input-group">
                <input type="text" name="searchQuery" class="form-control" placeholder="Search Doctors..." required>
                <button class="btn btn-primary">Search</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <div class="card mt-3">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php foreach ($doctors as $doctor): ?>
                    <tr>
                        <td><?= $doctor['ID']; ?></td>
                        <td>
                            <a href="<?= base_url('doctors/view/'.$doctor['ID']); ?>"><?= $doctor['Name']; ?></a>
                        </td>
                        <td><?= $doctor['Phone']; ?></td>
                        <td><?= $doctor['email']; ?></td>
                        <td>
                            <a href="<?= base_url('doctors/edit/'.$doctor['ID']); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?= base_url('doctors/delete/'.$doctor['ID']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                            <!-- <a href="<?= base_url('cases/add/'.$doctor['ID']); ?>" class="btn btn-secondary btn-sm">Assign Case</a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <?= $pagination; ?>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>
