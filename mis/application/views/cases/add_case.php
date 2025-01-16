<?php $this->load->view('includes/header'); ?>
<div class="container mt-5">

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white text-center">
                <h4>Add New Case</h4>
            </div>
            <div class="card-body">
                    <form method="post" action="<?php echo base_url('cases/add'); ?>">
                    <div class="mb-4">
                        <label for="caseName" class="form-label">Case Name</label>
                        <input type="text" name="caseName" placeholder="Enter case name" class="form-control" id="caseName" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="type" class="form-label">Case Type</label>
                        <select name="type" class="form-select" id="type" required>
                            <option value="" disabled selected>Select a type</option>
                            <?php foreach ($types as $type): ?>
                                <option value="<?= htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?>">
                                    <?= htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="cost" class="form-label">Cost</label>
                        <input type="number" class="form-control" name="cost" placeholder="Enter cost" id="cost" required>
                    </div>
                    <div class="mb-4">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Enter price" id="price" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">Add Case</button>
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