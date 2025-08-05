<!DOCTYPE html>
<html>
<head>
    <title>Other Asset Management - Shopping Admin</title>
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
            <?= view('admin/templates/sidebar', ['page' => 'otherAsset']) ?>
            <div class="col-md-9 col-lg-10 main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Other Asset Management</h2>
                    <button class="btn btn-primary" onclick="openCreateModal()">
                        <i class="fas fa-plus"></i> Add Other Asset
                    </button>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-container">
                            <table id="otherAssetTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Asset ID</th>
                                    <th>Other Asset Name</th>
                                    <th>Count</th>
                                    <th>Create Date</th>
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
    <?= view('otherAsset/modal') ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
    let otherAssetTable;
    let currentPage = 1;
    let totalPages = 1;
    let initialized = false;

    $(document).ready(function() {
        initializeTable();
        loadOtherAsset();
    });

    function initializeTable() {
        if (initialized) return;
        
        otherAssetTable = $('#otherAssetTable').DataTable({
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

    function loadOtherAsset() {
        $.ajax({
            url: '<?= base_url('admin/other-asset/getAllOtherAsset') ?>',
            method: 'GET',
            success: function(response) {
                // Clear table body
                otherAssetTable.clear();
                
                // Update the table with new data
                response.data.forEach((otherAsset, index) => {
                    const statusToggle = `
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" 
                                id="status_${otherAsset.id}" 
                                ${otherAsset.isActive ? 'checked' : ''}
                                onclick="toggleStatus(${otherAsset.id})">
                        </div>
                    `;

                    const actions = `
                        <button class="btn btn-sm btn-warning me-2" 
                            onclick="editOtherAsset(${otherAsset.id})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" 
                            onclick="deleteOtherAsset(${otherAsset.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;

                    otherAssetTable.row.add([
                        index + 1, // Use sequential index as SL No.
                        otherAsset.asset_id,
                        otherAsset.name,
                        otherAsset.count,
                        formatDate(otherAsset.created_at).toLocaleString(),
                        actions
                    ]);
                });
                otherAssetTable.draw();
            }
        });
    }

    function openCreateModal() {
        $('#otherAssetId').val('');
        $('#name').val('');
        $('#asset_id').val('');
        $('#count').val('');
        $('#otherAssetModal').modal('show');
    }

    function editOtherAsset(id) {
        $.ajax({
            url: `<?= base_url('admin/other-asset/') ?>${id}`,
            method: 'GET',
            success: function(otherAsset) {
                $('#otherAssetId').val(otherAsset.id);
                $('#name').val(otherAsset.name);
                $('#asset_id').val(otherAsset.asset_id);
                $('#count').val(otherAsset.count);
                $('#otherAssetModal').modal('show');
            }
        });
    }

    function saveOtherAsset() {
        const data = {
            name: $('#name').val(),
            asset_id: $('#asset_id').val(),
            count: $('#count').val(),
        };

        const url = $('#otherAssetId').val() ? `<?= base_url('admin/other-asset/update/') ?>${$('#otherAssetId').val()}` : '<?= base_url('admin/other-asset/create') ?>';

        $.ajax({
            url: url,
            method: $('#otherAssetId').val() ? 'POST' : 'POST',
            data: data,
            success: function(response) {
                if (response.success) {
                    $('#otherAssetModal').modal('hide');
                    loadOtherAsset();
                    alert(response.message);
                } else {
                    alert('Failed to save other asset');
                }
            }
        });
    }

    function deleteOtherAsset(id) {
        if (confirm('Are you sure you want to delete this other asset?')) {
            $.ajax({
                url: `<?= base_url('admin/other-asset/delete/') ?>${id}`,
                method: 'DELETE',
                success: function(response) {
                    if (response.success) {
                        loadOtherAsset();
                        alert(response.message);
                    } else {
                        alert('Failed to delete other asset');
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
    </script>
</body>
</html>
