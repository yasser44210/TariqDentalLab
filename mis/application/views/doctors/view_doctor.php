<?php $this->load->view('includes/header'); ?>

<div class="container mt-5">
    <h4>Doctor Details</h4>
    <div class="card mt-3">
        <div class="card-body">
            <p><strong>ID:</strong> <?= $doctor['ID']; ?></p>
            <p><strong>Name:</strong> <?= $doctor['Name']; ?></p>
            <p><strong>Phone:</strong> <?= $doctor['Phone']; ?></p>
            <p><strong>Email:</strong> <?= $doctor['email']; ?></p>
        </div>
    </div>
    <a href="<?= base_url('cases/add/'.$doctor['ID']); ?>" class="btn btn-secondary mt-3">Assign Case</a>
    <a href="<?= base_url('doctors/index'); ?>" class="btn btn-primary mt-3">Back to List</a>
</div>

<?php $this->load->view('includes/footer'); ?>
