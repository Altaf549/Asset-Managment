<div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignModalLabel">Assign Laptop</h5>
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
                            <input type="date" class="form-control" id="assignDate" name="assignDate" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Assign Status</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="assignStatus" name="assignStatus" checked>
                            <label class="form-check-label" for="assignStatus">Active</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="assignLaptop()">Assign</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initialize select2 for searchable dropdowns
    $('.select2').select2();
    
    // Load employee data
    loadEmployees();
    
    // Load asset data
    loadAssets();
});

function loadEmployees() {
    $.ajax({
        url: '<?= base_url('admin/employee/getAllEmployees') ?>',
        method: 'GET',
        success: function(response) {
            const employeeSelect = $('#employeeName');
            employeeSelect.empty();
            employeeSelect.append('<option value="">Select Employee</option>');
            
            response.forEach(employee => {
                employeeSelect.append(`
                    <option value="${employee.id}">${employee.name}</option>
                `);
            });
        }
    });
}

function loadAssets() {
    $.ajax({
        url: '<?= base_url('admin/laptop/product/getAvailableAssets') ?>',
        method: 'GET',
        success: function(response) {
            const assetSelect = $('#assetId');
            assetSelect.empty();
            assetSelect.append('<option value="">Select Asset</option>');
            
            response.forEach(asset => {
                assetSelect.append(`
                    <option value="${asset.id}">${asset.asset_id}</option>
                `);
            });
        }
    });
}

// Handle employee selection change
$('#employeeName').change(function() {
    const selectedEmployeeId = $(this).val();
    if (selectedEmployeeId) {
        $.ajax({
            url: '<?= base_url('admin/employee/getEmployeeById') ?>/' + selectedEmployeeId,
            method: 'GET',
            success: function(response) {
                $('#employeeId').val(response.employee_id);
            }
        });
    } else {
        $('#employeeId').val('');
    }
});

function assignLaptop() {
    const formData = {
        employee_id: $('#employeeId').val(),
        asset_id: $('#assetId').val(),
        assign_date: $('#assignDate').val(),
        assign_status: $('#assignStatus').is(':checked') ? 1 : 0
    };

    $.ajax({
        url: '<?= base_url('admin/laptop/product/assignLaptop') ?>',
        method: 'POST',
        data: formData,
        success: function(response) {
            if (response.success) {
                $('#assignModal').modal('hide');
                loadLaptops(); // Refresh the laptop list
                showNotification('success', 'Laptop assigned successfully');
            } else {
                showNotification('error', 'Failed to assign laptop');
            }
        }
    });
}

function showNotification(type, message) {
    const notification = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    $('.notifications').append(notification);
}
</script>
