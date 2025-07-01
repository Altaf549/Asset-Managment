<!-- Create/Edit Modal -->
<div class="modal fade" id="employeeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add/Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="employeeForm">
                    <input type="hidden" id="employeeId">
                    <div class="mb-3">
                        <label for="emp_name" class="form-label">Employee Name</label>
                        <input type="text" class="form-control" id="emp_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="emp_id" class="form-label">Employee ID</label>
                        <input type="text" class="form-control" id="emp_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="isActive" class="form-label">Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="isActive" checked>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveEmployee()">Save</button>
            </div>
        </div>
    </div>
</div>
