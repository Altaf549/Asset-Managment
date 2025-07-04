<!DOCTYPE html>
<html>
<head>
    <title>Employee Management - Shopping Admin</title>
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
            <?= view('admin/templates/sidebar', ['page' => 'employee']) ?>
            <div class="col-md-9 col-lg-10 main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Employee Management</h2>
                    <button class="btn btn-primary" onclick="openCreateModal()">
                        <i class="fas fa-plus"></i> Add Employee
                    </button>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-container">
                            <table id="employeeTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Employee Name</th>
                                    <th>Employee ID</th>
                                    <th>Joining Date</th>
                                    <th>Create Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
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
    <?= view('employees/modal') ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
    let employeeTable;
    let currentPage = 1;
    let totalPages = 1;
    let initialized = false;

    $(document).ready(function() {
        initializeTable();
        loadEmployees();
    });

    function initializeTable() {
        if (initialized) return;
        
        employeeTable = $('#employeeTable').DataTable({
            pageLength: 10, // Show all records
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            paging: true, // Disable pagination
            language: {
                paginate: {
                    previous: '<i class="fas fa-chevron-left">',
                    next: '<i class="fas fa-chevron-right">'
                }
            },
            initComplete: function() {
                initialized = true;
                // Remove any custom pagination container if it exists
                $('#customPagination').remove();
            }
        });
    }

    function loadEmployees() {
        $.ajax({
            url: '<?= base_url('admin/employee/getAllEmployees') ?>',
            method: 'GET',
            success: function(response) {
                // Clear table body
                employeeTable.clear();
                
                // Update the table with new data
                response.data.forEach((employee, index) => {
                    const statusToggle = `
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" 
                                id="status_${employee.id}" 
                                ${employee.isActive ? 'checked' : ''}
                                onclick="toggleStatus(${employee.id})">
                        </div>
                    `;

                    const actions = `
                        <button class="btn btn-sm btn-warning me-2" 
                            onclick="editEmployee(${employee.id})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" 
                            onclick="deleteEmployee(${employee.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;

                    employeeTable.row.add([
                        index + 1, // Use sequential index as SL No.
                        employee.emp_name,
                        employee.emp_id,
                        formatDate(employee.joining_date).toLocaleString(),
                        formatDate(employee.created_at).toLocaleString(),
                        statusToggle,
                        actions
                    ]);
                });
                employeeTable.draw();
            }
        });
    }

    function openCreateModal() {
        $('#employeeId').val('');
        $('#emp_name').val('');
        $('#emp_id').val('');
        $('#isActive').prop('checked', true);
        $('#joining_date').val('');
        $('#joining_date').attr('max', getTodayDate());
        $('#employeeModal').modal('show');
    }

    function editEmployee(id) {
        $.ajax({
            url: `<?= base_url('admin/employee/') ?>${id}`,
            method: 'GET',
            success: function(employee) {
                $('#employeeId').val(employee.id);
                $('#emp_name').val(employee.emp_name);
                $('#emp_id').val(employee.emp_id);
                $('#joining_date').val(employee.joining_date);
                $('#joining_date').attr('max', getTodayDate());
                $('#isActive').prop('checked', employee.isActive);
                $('#employeeModal').modal('show');
            }
        });
    }

    function saveEmployee() {
        const data = {
            emp_name: $('#emp_name').val(),
            emp_id: $('#emp_id').val(),
            joining_date: $('#joining_date').val(),
            isActive: $('#isActive').is(':checked') ? 'yes' : 'no'
        };

        const url = $('#employeeId').val() ? `<?= base_url('admin/employee/update/') ?>${$('#employeeId').val()}` : '<?= base_url('admin/employee/create') ?>';

        $.ajax({
            url: url,
            method: $('#employeeId').val() ? 'POST' : 'POST',
            data: data,
            success: function(response) {
                if (response.success) {
                    $('#employeeModal').modal('hide');
                    loadEmployees();
                    alert(response.message);
                } else {
                    alert('Failed to save employee');
                }
            }
        });
    }

    function toggleStatus(id) {
        $.ajax({
            url: `<?= base_url('admin/employee/toggle-status/') ?>${id}`,
            method: 'POST',
            success: function(response) {
                if (response.success) {
                    loadEmployees();
                    alert(response.message);
                } else {
                    alert('Failed to update status');
                }
            }
        });
    }

    function deleteEmployee(id) {
        if (confirm('Are you sure you want to delete this employee?')) {
            $.ajax({
                url: `<?= base_url('admin/employee/delete/') ?>${id}`,
                method: 'DELETE',
                success: function(response) {
                    if (response.success) {
                        loadEmployees();
                        alert(response.message);
                    } else {
                        alert('Failed to delete employee');
                    }
                }
            });
        }
    }

    function formatDate(dateString) {
        if (!dateString) return '';
        const date = new Date(dateString);
        if (date.toString() === 'Invalid Date') {
            // Handle MySQL date format (YYYY-MM-DD)
            const parts = dateString.split('-');
            if (parts.length === 3) {
                return `${parts[2]}/${parts[1]}/${parts[0]}`;
            }
            return dateString;
        }
        return date.toLocaleDateString();
    }

    function getTodayDate() {
        const today = new Date();
        return today.toISOString().split('T')[0];
    }



    </script>
</body>
</html>
