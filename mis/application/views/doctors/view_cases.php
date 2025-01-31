?>
<?php $this->load->view('includes/header'); ?>
<div class="container mt-5">
    <h4>Doctor: <?= $doctor['Name']; ?></h4>
    <h5>Assigned Cases</h5>
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>Case Name</th>
                <th>Type</th>
                <th>Cost</th>
                <th>Price</th>
                <th>Received Date</th>
                <th>Completion Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($cases)): ?>
                <?php foreach ($cases as $case): ?>
                    <tr>
                        <td><?= $case['caseName']; ?></td>
                        <td><?= $case['type']; ?></td>
                        <td><?= $case['cost']; ?></td>
                        <td><?= $case['price']; ?></td>
                        <td><?= $case['RecDate']; ?></td>
                        <td><?= $case['ComDate']; ?></td>
                        <td><?= $case['caseStatus']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7">No cases assigned yet</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h5>Assign New Case</h5>
    <?= form_open('doctors/assign_case'); ?>
        <input type="hidden" name="doctorID" value="<?= $doctor['ID']; ?>">
        <div class="form-group">
            <label>Case Type</label>
            <select name="caseTypeID" class="form-control" required>
                <option value="">Select Case</option>
                <?php foreach ($all_cases as $case): ?>
                    <option value="<?= $case['caseTypeID']; ?>"> <?= $case['caseName']; ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Assign Case</button>
    <?= form_close(); ?>
</div>
<?php $this->load->view('includes/footer'); ?>
