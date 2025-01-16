<?php $this->load->view('includes/header'); ?>

<div class="container mt-5">
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white text-center">
                <h4>Add New Doctor</h4>
            </div>
            <div class="card-body">
                    <form method="post" action="<?php echo base_url('doctors/add'); ?>">
                    <div class="mb-4">
                        <label for="Name" class="form-label">Doctor Name</label>
                        <input type="text" name="Name" placeholder="Enter your name" class="form-control" id="Name" required>
                    </div>
                    <div class="mb-4">
                        <label for="Phone" class="form-label">Phone</label>
                        <input type="number" class="form-control" name="Phone" placeholder="Enter your phone number" id="Phone" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter your email address" id="email" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">Add Doctor</button>
                    </div>
                </form>
                
                <!-- Flash Messages -->
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success mt-3" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>

<?php $this->load->view('includes/footer'); ?>