<!DOCTYPE html>
<html>
<head>
    <title>MAC Product Management - Shopping Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('css/admin.css') ?>" rel="stylesheet">
    <!-- DataTables CDN -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .stats-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .table-container {
            overflow-x: auto;
            margin-bottom: 20px;
        }
        .table {
            min-width: 100%;
            white-space: nowrap;
        }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin: 24px 0;
        }
        .page-item {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            color: #495057;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .page-item.active {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: white;
        }
        .page-item.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        .page-item:first-child,
        .page-item:last-child {
            width: 80px;
            padding: 0 12px;
        }
        .page-item:first-child {
            content: '←';
        }
        .page-item:last-child {
            content: '→';
        }
        .page-item:hover:not(.disabled) {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?= view('admin/templates/sidebar', ['page' => 'mac']) ?>
            <div class="col-md-9 col-lg-10 main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>MAC Product Management</h2>
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary me-2" onclick="openCreateModal()">
                            <i class="fas fa-plus"></i> Add MAC
                        </button>
                        <button class="btn btn-success me-2" onclick="openAssignModal()">
                            <i class="fas fa-user-plus"></i> Assign
                        </button>
                        <button class="btn btn-danger" onclick="openUnassignModal()">
                            <i class="fas fa-user-minus"></i> Unassign
                        </button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="macTable" class="table table-striped table-hover" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Asset ID</th>
                                    <th>Cabinet Name</th>
                                    <th>Serial Number</th>
                                    <th>RAM</th>
                                    <th>RAM Model</th>
                                    <th>RAM FSB</th>
                                    <th>SSD</th>
                                    <th>Hard Disk</th>
                                    <th>Processor Company</th>
                                    <th>Processor</th>
                                    <th>Motherboard</th>
                                    <th>Motherboard Model</th>
                                    <th>Assigned To</th>
                                    <th>Emp ID</th>
                                    <th>Assign Date</th>
                                    <th>Assign Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= view('mac/product/modal') ?>
    <?= view('mac/product/assign_modal') ?>
    <?= view('mac/product/unassign_modal') ?>

    <!-- jQuery (before Select2) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Select2 CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        let macTable;
        let currentPage = 1;
        let totalPages = 1;
        let initialized = false;
        let employeesData = [];

        // Function to update employee ID field
        function updateEmployeeIdField(employeeId) {
            $('#employeeId').val(employeeId || '');
            const selectedText = $('#employeeName option:selected').text();
            $('#employeeNameText').val(selectedText);
        }

        // Initialize employee dropdown
        function initializeEmployeeDropdown() {
            const employeeSelect = $('#employeeName');
            employeeSelect.empty().append('<option value="">Select Employee</option>');
            
            employeesData.forEach(employee => {
                if (employee.is_active === 'yes') {
                    employeeSelect.append(
                        $('<option>', {
                            value: employee.emp_id,
                            text: employee.emp_name
                        })
                    );
                }
            });

            employeeSelect.select2({
                placeholder: "Select Employee",
                dropdownParent: $('#assignModal'),
                width: '100%'
            });

            // Update employee ID when selection changes
            employeeSelect.on('change', function() {
                const selectedEmployeeId = $(this).val();
                updateEmployeeIdField(selectedEmployeeId);
            });
        }

        $(document).ready(function() {
            initializeTable();
            loadMACs();
        });

        function initializeTable() {
            if (initialized) return;
            
            macTable = $('#macTable').DataTable({
                pageLength: 10,
                lengthChange: false,
                searching: true,
                ordering: true,
                info: true,
                paging: true,
                scrollX: true,
                scrollCollapse: true,
                language: {
                    paginate: {
                        previous: '<i class="fas fa-chevron-left">',
                        next: '<i class="fas fa-chevron-right">'
                    }
                },
                initComplete: function() {
                    initialized = true;
                }
            });
        }

        function openAssignModal() {
            const employeeSelect = $('#employeeName');
            const assetSelect = $('#assetId');

            // Reset both selects
            employeeSelect.empty().append('<option value="">Select Employee</option>');
            assetSelect.empty().append('<option value="">Select Asset</option>');

            // Destroy Select2 if already initialized (to avoid duplicate UI)
            if ($.fn.select2) {
                if (employeeSelect.hasClass("select2-hidden-accessible")) {
                    employeeSelect.select2('destroy');
                }
                if (assetSelect.hasClass("select2-hidden-accessible")) {
                    assetSelect.select2('destroy');
                }
            }

            // Fetch employee data
            $.ajax({
                url: '<?= base_url('admin/employee/getAllEmployees') ?>',
                method: 'GET',
                success: function(response) {
                    employeesData = response.data;
                    initializeEmployeeDropdown();
                },
                error: function() {
                    alert('Failed to load employees data');
                }
            });

            // Fetch asset data
            $.ajax({
                url: '<?= base_url('admin/mac/product/getAllUnassignMACProducts') ?>',
                method: 'GET',
                success: function(response) {
                    response.data.forEach(asset => {
                        assetSelect.append(
                            $('<option>', {
                                value: asset.id,
                                text: asset.asset_id
                            })
                        );
                    });

                    // ✅ Initialize Select2 after data loaded
                    assetSelect.select2({
                        placeholder: "Select Asset",
                        dropdownParent: $('#assignModal'),
                        width: '100%'
                    });
                },
                error: function() {
                    alert('Failed to load assets data');
                }
            });
            $('#assignModal').modal('show');

            // Show modal
            // const modal = new bootstrap.Modal(document.getElementById('assignModal'));
            // modal.show();
        }


        function loadMACs() {
            $.ajax({
                url: '<?= base_url('admin/mac/product/getAllMACProducts') ?>',
                method: 'GET',
                success: function(response) {
                    macTable.clear();
                    response.data.forEach((mac, index) => {
                        const statusToggle = `
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" 
                                    id="status_${mac.id}" 
                                    ${mac.assign_status === 'yes' ? 'checked' : ''}
                                    disabled>
                            </div>
                        `;

                        const actions = `
                            <button class="btn btn-sm btn-warning me-2" 
                                onclick="editMAC(${mac.id})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" 
                                onclick="deleteMAC(${mac.id})">
                                <i class="fas fa-trash"></i>
                            </button>
                        `;

                        macTable.row.add([
                            index + 1,
                            mac.asset_id || '',
                            mac.cabinet_name || '',
                            mac.serial_number || '',
                            mac.ram || '',
                            mac.ram_model || '',
                            mac.ram_fsb || '',
                            mac.ssd || '',
                            mac.hard_disk || '',
                            mac.processor_company || '',
                            mac.processor || '',
                            mac.motherboard || '',
                            mac.motherboard_model || '',
                            mac.assigned_to || '',
                            mac.emp_id || '',
                            formatDate(mac.assign_date),
                            statusToggle,
                            formatDate(mac.created_at),
                            actions
                        ]);
                    });
                    macTable.draw();
                }
            });
        }

        function formatDate(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            return date.toLocaleDateString();
        }

        function openCreateModal() {
            $('#macId').val('');
            $('#macForm')[0].reset();
            $('#macModal').modal('show');
        }

        function editMAC(id) {
            $.ajax({
                url: '<?= base_url('admin/mac/product/') ?>' + id,
                method: 'GET',
                success: function(response) {
                    $('#macId').val(response.id);
                    $('#asset_id').val(response.asset_id);
                    $('#cabinet_name').val(response.cabinet_name);
                    $('#serial_number').val(response.serial_number);
                    $('#screen_size').val(response.screen_size);
                    $('#ram').val(response.ram);
                    $('#ram_model').val(response.ram_model);
                    $('#ram_fsb').val(response.ram_fsb);
                    $('#ssd').val(response.ssd);
                    $('#hard_disk').val(response.hard_disk);
                    $('#processor_company').val(response.processor_company);
                    $('#processor').val(response.processor);
                    $('#motherboard').val(response.motherboard);
                    $('#motherboard_model').val(response.motherboard_model);
                    $('#assigned_to').val(response.assigned_to);
                    $('#emp_id').val(response.emp_id);
                    $('#assign_date').val(response.assign_date);
                    $('#assign_status').prop('checked', response.assign_status === 'yes');
                    $('#macModal').modal('show');
                }
            });
        }

        function saveMAC() {
            const id = $('#macId').val();
            const url = id ? '<?= base_url('admin/mac/product/updateMACProduct/') ?>' + id : '<?= base_url('admin/mac/product/createMACProduct') ?>';
            const method = id ? 'POST' : 'POST';

            $.ajax({
                url: url,
                method: method,
                data: {
                    asset_id: $('#asset_id').val(),
                    cabinet_name: $('#cabinet_name').val(),
                    serial_number: $('#serial_number').val(),
                    ram: $('#ram').val(),
                    ram_model: $('#ram_model').val(),
                    ram_fsb: $('#ram_fsb').val(),
                    ssd: $('#ssd').val(),
                    hard_disk: $('#hard_disk').val(),
                    processor_company: $('#processor_company').val(),
                    processor: $('#processor').val(),
                    motherboard: $('#motherboard').val(),
                    motherboard_model: $('#motherboard_model').val(),
                    assigned_to: $('#assigned_to').val(),
                    emp_id: $('#emp_id').val(),
                    assign_date: $('#assign_date').val(),
                    assign_status: $('#assign_status').is(':checked') ? 'yes' : 'no'
                },
                success: function(response) {
                    if (response.success) {
                        $('#macModal').modal('hide');
                        loadMACs();
                        toastr.success('MAC ' + (id ? 'updated' : 'created') + ' successfully');
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        }

        function deleteMAC(id) {
            if (confirm('Are you sure you want to delete this mac?')) {
                $.ajax({
                    url: '<?= base_url('admin/mac/product/deleteMACProduct/') ?>' + id,
                    method: 'DELETE',
                    success: function(response) {
                        if (response.success) {
                            loadMACs();
                            toastr.success('MAC deleted successfully');
                        } else {
                            toastr.error(response.message);
                        }
                    }
                });
            }
        }

        function toggleStatus(id) {
            $.ajax({
                url: '<?= base_url('admin/mac/product/updateMACProduct/') ?>' + id,
                method: 'POST',
                data: {
                    assign_status: $('#status_' + id).is(':checked') ? 'yes' : 'no'
                },
                success: function(response) {
                    if (!response.success) {
                        toastr.error(response.message);
                        loadMACs();
                    }
                }
            });
        }
        function assignMAC() {
            // Validate all required fields
            const employeeName = $('#employeeNameText').val();
            const assetId = $('#assetId').val();
            const assignDate = $('#assignDate').val();
            const assignStatus = $('#assignStatus').is(':checked');

            if (!employeeName || !assetId || !assignDate) {
                alert('Please fill in all required fields:\n\n' +
                    (!employeeName ? '• Employee Name\n' : '') +
                    (!assetId ? '• Asset ID\n' : '') +
                    (!assignDate ? '• Assign Date\n' : ''));
                return;
            }

            // Prepare data
            const data = {
                employeeName: employeeName,
                employee_id: $('#employeeId').val(),
                asset_id: assetId,
                assign_date: assignDate,
                assign_status: assignStatus ? 'yes' : 'no'
            };

            // Make AJAX call
            $.ajax({
                url: '<?= base_url('admin/mac/product/assignMAC') ?>',
                method: 'POST',
                data: data,
                success: function(response) {
                    if (response.success) {
                        // Reset form and hide modal
                        $('#assignForm')[0].reset();
                        $('#assignModal').modal('hide');
                        loadMACs(); // Refresh the table
                    } else {
                        let errorMessage = response.message || 'Failed to assign mac';
                        if (response.errors) {
                            errorMessage = 'Validation errors:\n\n' + 
                                Object.values(response.errors).join('\n');
                        }
                        alert(errorMessage);
                    }
                },
                error: function(xhr, status, error) {
                    let errorMessage = 'Error occurred while assigning mac';
                    try {
                        const errorData = JSON.parse(xhr.responseText);
                        if (errorData.message) {
                            errorMessage = errorData.message;
                        } else if (errorData.errors) {
                            errorMessage = 'Validation errors:\n\n' + 
                                Object.values(errorData.errors).join('\n');
                        }
                    } catch (e) {
                        // Use default message if parsing fails
                    }
                    alert(errorMessage);
                }
            });
        }

        // Function to open unassign modal
        function openUnassignModal() {
            const assetSelect = $('#unassignAssetId');
            
            assetSelect.empty().append('<option value="">Select Asset</option>');

            // Destroy Select2 if already initialized (to avoid duplicate UI)
            if ($.fn.select2) {
                if (assetSelect.hasClass("select2-hidden-accessible")) {
                    assetSelect.select2('destroy');
                }
            }
            // Fetch asset data
            $.ajax({
                url: '<?= base_url('admin/mac/product/getAllAssignMACProducts') ?>',
                method: 'GET',
                success: function(response) {
                    response.data.forEach(asset => {
                        assetSelect.append(
                            $('<option>', {
                                value: asset.id,
                                text: asset.asset_id,
                                'data-emp_id': asset.emp_id,
                                'data-emp_name': asset.assigned_to
                            })
                        );
                    });

                    // ✅ Initialize Select2 after data loaded
                    assetSelect.select2({
                        placeholder: "Select Asset",
                        dropdownParent: $('#unassignModal'),
                        width: '100%'
                    });
                    // Update employee ID when selection changes
                    assetSelect.on('change', function() {
                        var selected = $(this).find(':selected');

                        var empName = selected.data('emp_name');
                        var empId = selected.data('emp_id');
                        $('#unassignEmployeeName').val(empName || '');
                        $('#unassignEmployeeId').val(empId || '');
                    });
                },
                error: function() {
                    alert('Failed to load assets data');
                }
            });
            $('#unassignModal').modal('show');
        }

        // Function to handle unassign mac
        function unassignMAC() {
            const assetId = $('#unassignAssetId').val();

            if (!assetId) {
                alert('Please fill in all required fields:\n\n' +
                    (!assetId ? '• Asset ID\n' : ''));
                return;
            }

            if (!confirm('Are you sure you want to unassign this asset?')) {
                return;
            }

            // Prepare data
            const data = {
                asset_id: assetId
            };

            // Make AJAX call
            $.ajax({
                url: '<?= base_url('admin/mac/product/unassignMAC') ?>',
                method: 'POST',
                data: data,
                success: function(response) {
                    if (response.success) {
                        // Reset form and hide modal
                        $('#unassignForm')[0].reset();
                        $('#unassignModal').modal('hide');
                        loadMACs(); // Refresh the table
                    } else {
                        let errorMessage = response.message || 'Failed to unassign asset';
                        if (response.errors) {
                            errorMessage = 'Validation errors:\n\n' + 
                                Object.values(response.errors).join('\n');
                        }
                        alert(errorMessage);
                    }
                },
                error: function(xhr, status, error) {
                    let errorMessage = 'Error occurred while unassigning asset';
                    try {
                        const errorData = JSON.parse(xhr.responseText);
                        if (errorData.message) {
                            errorMessage = errorData.message;
                        } else if (errorData.errors) {
                            errorMessage = 'Validation errors:\n\n' + 
                                Object.values(errorData.errors).join('\n');
                        }
                    } catch (e) {
                        // Use default message if parsing fails
                    }
                    alert(errorMessage);
                }
            });
        }

    </script>
</body>
</html>
