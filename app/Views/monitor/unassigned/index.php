<!DOCTYPE html>
<html>
<head>
    <title>Unassigned Monitors - Shopping Admin</title>
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
            <?= view('admin/templates/sidebar', ['page' => 'monitor']) ?>
            <div class="col-md-9 col-lg-10 main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Unassigned Monitors</h2>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="unassignedMonitorsTable" class="table table-striped table-hover" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL No.</th>
                                        <th>Asset ID</th>
                                        <th>Manufacturer</th>
                                        <th>Screen Size</th>
                                        <th>Resolution</th>
                                        <th>Type</th>
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
        let unassignedMonitorsTable;
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
            loadUnassignedMonitors();
        });

        function initializeTable() {
            if (initialized) return;
            
            unassignedMonitorsTable = new DataTable('#unassignedMonitorsTable', {
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

        function loadUnassignedMonitors() {
            $.ajax({
                url: '<?= base_url('admin/monitor/unassigned/getAllUnassignedMonitors') ?>',
                method: 'GET',
                success: function(response) {
                    unassignedMonitorsTable.clear();
                    response.data.forEach((monitor, index) => {
                        const statusToggle = `
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" 
                                    id="status_${monitor.id}" 
                                    ${monitor.assign_status === 'yes' ? 'checked' : ''}
                                    disabled>
                            </div>
                        `;

                        unassignedMonitorsTable.row.add([
                            index + 1,
                            monitor.asset_id || '',
                            monitor.manufacturer || '',
                            monitor.screen_size || '',
                            monitor.resolution || '',
                            monitor.type || '',
                            monitor.assigned_to || '',
                            monitor.emp_id || '',
                            formatDate(monitor.assign_date),
                            statusToggle,
                            formatDate(monitor.created_at)
                        ]);
                    });
                    unassignedMonitorsTable.draw();
                },
                error: function(xhr, status, error) {
                    console.error('Error loading assigned monitors:', error);
                }
            });
        }
    </script>
</body>
</html>
