<?php $this->load->view('includes/header'); ?>

<div class="container mt-5">        
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Update Case</h4>
                </div> 
                <div class="card-body">
                <form method="post" action="<?= base_url('cases/edit/'.$cases['caseTypeID']); ?>">
                        <div class="mb-4">
                            <label for="caseName" class="form-label">Case Name</label>
                            <input type="text" name="caseName" value="<?= htmlspecialchars($cases['caseName'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter case name" class="form-control" id="caseName" required>
                        </div>
                        <div class="mb-4">
                            <label for="type" class="form-label">Case Type</label>
                            <select name="type" class="form-select" id="type" required>
                                <option value="" disabled>Select a type</option>
                                <?php if (!empty($types)): ?>
                                    <?php foreach ($types as $type): ?>
                                        <option selected value="<?= htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?>"><?= htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?></option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="" disabled>No types available</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="cost" class="form-label">Cost</label>
                            <input type="number" class="form-control" name="cost" value="<?= htmlspecialchars($cases['cost'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter cost" id="cost" required>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" value="<?= htmlspecialchars($cases['price'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Enter price" id="price" required>
                        </div>
                        <div class="mb-4">
                        <label for="recDate" class="form-label">recived Date</label>
                        <input type="date" class="form-control" name="recDate" placeholder="Enter case reciving date" id="recDate" required>
                        </div>
                        <div class="mb-4">
                            <label for="ComDate" class="form-label">Completion Date</label>
                            <input type="date" class="form-control" name="ComDate" placeholder="Enter case completion date" id="ComDate" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">Update Case</button>
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