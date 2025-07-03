<!DOCTYPE html>
<html>
<head>
    <title>Unassigned Laptops - Shopping Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('css/admin.css') ?>" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .table-container {
            overflow-x: auto;
            margin-bottom: 20px;
        }
        .table {
            min-width: 100%;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <?= view('admin/templates/sidebar', ['page' => 'laptop']) ?>
            <div class="col-md-9 col-lg-10 main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Unassigned Laptops</h2>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="unassignedLaptopsTable" class="table table-striped table-hover" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL No.</th>
                                        <th>Asset ID</th>
                                        <th>Serial Number</th>
                                        <th>Model Name</th>
                                        <th>Manufacturer</th>
                                        <th>Screen Size</th>
                                        <th>RAM</th>
                                        <th>RAM Model</th>
                                        <th>RAM FSB</th>
                                        <th>SSD</th>
                                        <th>Hard Disk</th>
                                        <th>Processor Company</th>
                                        <th>Processor</th>
                                        <th>Processor Generation</th>
                                        <th>Motherboard</th>
                                        <th>Motherboard Model</th>
                                        <th>Assigned To</th>
                                        <th>Emp ID</th>
                                        <th>Assign Date</th>
                                        <th>Assign Status</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be loaded via AJAX -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        let unassignedLaptopsTable;
        let currentPage = 1;
        let totalPages = 1;
        let initialized = false;
        let employeesData = [];

        function formatDate(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            return date.toLocaleDateString();
        }

        $(document).ready(function() {
            initializeTable()
            loadUnassignedLaptops();
        });

        function initializeTable() {
            if (initialized) return;
            
            unassignedLaptopsTable = new DataTable('#unassignedLaptopsTable', {
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

        function loadUnassignedLaptops() {
            $.ajax({
                url: '<?= base_url('admin/laptop/unassigned/getAllUnassignedLaptops') ?>',
                method: 'GET',
                success: function(response) {
                    unassignedLaptopsTable.clear();
                    response.data.forEach((laptop, index) => {
                        const statusToggle = `
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" 
                                    id="status_${laptop.id}" 
                                    ${laptop.assign_status === 'yes' ? 'checked' : ''}
                                    disabled>
                            </div>
                        `;

                        unassignedLaptopsTable.row.add([
                            index + 1,
                            laptop.asset_id || '',
                            laptop.serial_number || '',
                            laptop.model_name || '',
                            laptop.manufacturer || '',
                            laptop.screen_size || '',
                            laptop.ram || '',
                            laptop.ram_model || '',
                            laptop.ram_fsb || '',
                            laptop.ssd || '',
                            laptop.hard_disk || '',
                            laptop.processor_company || '',
                            laptop.processor || '',
                            laptop.processor_generation || '',
                            laptop.motherboard || '',
                            laptop.motherboard_model || '',
                            laptop.assigned_to || '',
                            laptop.emp_id || '',
                            formatDate(laptop.assign_date),
                            statusToggle,
                            formatDate(laptop.created_at)
                        ]);
                    });
                    unassignedLaptopsTable.draw();
                },
                error: function(xhr, status, error) {
                    console.error('Error loading assigned laptops:', error);
                }
            });
        }
    </script>
</body>
</html>
