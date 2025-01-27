<?php $this->load->view('includes/header'); ?>

<div class="container mt-5">
    <h4>Search Results for "<?= htmlspecialchars($searchQuery); ?>"</h4>
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
                <?php if (!empty($doctors)): ?>
                    <?php foreach ($doctors as $doctor): ?>
                        <tr>
                            <td><?= $doctor['ID']; ?></td>
                            <td><?= $doctor['Name']; ?></td>
                            <td><?= $doctor['Phone']; ?></td>
                            <td><?= $doctor['email']; ?></td>
                            <td>
                                <a href="<?= base_url('doctors/edit/'.$doctor['ID']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="<?= base_url('doctors/delete/'.$doctor['ID']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                                <!-- <a href="<?= base_url('cases/add/'.$doctor['ID']); ?>" class="btn btn-secondary btn-sm">Assign Case</a> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No results found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>
