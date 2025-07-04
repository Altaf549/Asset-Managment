<div class="modal fade" id="assignModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignModalLabel">Assign MAC</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="assignForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="employeeName" class="form-label">Employee Name</label>
                            <select class="form-select select2" id="employeeName" name="employeeName" required>
                                <option value="">Select Employee</option>
                            </select>
                            <input type="hidden" id="employeeNameText" name="employeeNameText">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="employeeId" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="employeeId" name="employeeId" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="assetId" class="form-label">Asset ID</label>
                            <select class="form-select select2" id="assetId" name="assetId" required>
                                <option value="">Select Asset</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="assignDate" class="form-label">Assign Date</label>
                            <input type="date" class="form-control" id="assignDate" name="assignDate" max="<?= date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Assign Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="assignStatus" name="assignStatus" checked disabled>
                            <label class="form-check-label" for="assignStatus">Active</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="assignMAC()">Assign</button>
            </div>
        </div>
    </div>
</div>
