<?php $this->load->view('includes/header'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h5>Doctors List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone number</th>
                                <th>Email address</th>
                                <th style="width: 30%;">Actions</th> <!-- Set wider width for Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($doctors)): ?>
                            <?php foreach ($doctors as $doctor): ?>
                                <tr>
                                    <td><?= htmlspecialchars($doctor['ID'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($doctor['Name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($doctor['Phone'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?= htmlspecialchars($doctor['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td style="white-space: nowrap;"> <!-- Ensure buttons stay on one line -->
                                        <a href="<?= base_url('doctors/edit/'.$doctor['ID']); ?>" class="btn btn-primary btn-sm me-2">Edit</a>
                                        <a href="<?= base_url('doctors/delete/'.$doctor['ID']); ?>" onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-danger btn-sm me-2">Delete</a>
                                        <!-- <a href="<?= base_url('doctors/view/'.$doctor['ID']); ?>" class="btn btn-info btn-sm me-2">View</a> -->
                                        <a href="<?= base_url('doctors/assign_case/'.$doctor['ID']); ?>" class="btn btn-success btn-sm">Assign Case</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No data found</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>

                    <!-- Flash messages -->
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success mt-3" role="alert">
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer'); ?>
