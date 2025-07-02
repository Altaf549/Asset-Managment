<!DOCTYPE html>
<html>
<head>
    <title>Laptop Product Management - Shopping Admin</title>
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
            <?= view('admin/templates/sidebar', ['page' => 'laptop']) ?>
            <div class="col-md-9 col-lg-10 main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Laptop Product Management</h2>
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary me-2" onclick="openCreateModal()">
                            <i class="fas fa-plus"></i> Add Laptop
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
                            <table id="laptopTable" class="table table-striped table-hover" style="width: 100%;">
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
    <?= view('laptop/product/modal') ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
    let laptopTable;
    let currentPage = 1;
    let totalPages = 1;
    let initialized = false;

    $(document).ready(function() {
        initializeTable();
        loadLaptops();
    });

    function initializeTable() {
        if (initialized) return;
        
        laptopTable = $('#laptopTable').DataTable({
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

    function loadLaptops() {
        $.ajax({
            url: '<?= base_url('admin/laptop/product/getAllLaptopProducts') ?>',
            method: 'GET',
            success: function(response) {
                laptopTable.clear();
                response.data.forEach((laptop, index) => {
                    const statusToggle = `
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" 
                                id="status_${laptop.id}" 
                                ${laptop.assign_status === 'yes' ? 'checked' : ''}
                                disabled>
                        </div>
                    `;

                    const actions = `
                        <button class="btn btn-sm btn-warning me-2" 
                            onclick="editLaptop(${laptop.id})">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" 
                            onclick="deleteLaptop(${laptop.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;

                    laptopTable.row.add([
                        index + 1,
                        laptop.asset_id,
                        laptop.serial_number,
                        laptop.model_name,
                        laptop.manufacturer,
                        laptop.screen_size,
                        laptop.ram,
                        laptop.ram_model,
                        laptop.ram_fsb,
                        laptop.ssd,
                        laptop.hard_disk,
                        laptop.processor_company,
                        laptop.processor,
                        laptop.processor_generation,
                        laptop.motherboard,
                        laptop.motherboard_model,
                        laptop.assigned_to,
                        laptop.emp_id,
                        formatDate(laptop.assign_date),
                        statusToggle,
                        formatDate(laptop.created_at),
                        actions
                    ]);
                });
                laptopTable.draw();
            }
        });
    }

    function formatDate(dateString) {
        if (!dateString) return '';
        const date = new Date(dateString);
        return date.toLocaleDateString();
    }

    function openCreateModal() {
        $('#laptopId').val('');
        $('#laptopForm')[0].reset();
        $('#laptopModal').modal('show');
    }

    function editLaptop(id) {
        $.ajax({
            url: '<?= base_url('admin/laptop/product/') ?>' + id,
            method: 'GET',
            success: function(response) {
                $('#laptopId').val(response.id);
                $('#asset_id').val(response.asset_id);
                $('#serial_number').val(response.serial_number);
                $('#model_name').val(response.model_name);
                $('#manufacturer').val(response.manufacturer);
                $('#screen_size').val(response.screen_size);
                $('#ram').val(response.ram);
                $('#ram_model').val(response.ram_model);
                $('#ram_fsb').val(response.ram_fsb);
                $('#ssd').val(response.ssd);
                $('#hard_disk').val(response.hard_disk);
                $('#processor_company').val(response.processor_company);
                $('#processor').val(response.processor);
                $('#processor_generation').val(response.processor_generation);
                $('#motherboard').val(response.motherboard);
                $('#motherboard_model').val(response.motherboard_model);
                $('#assigned_to').val(response.assigned_to);
                $('#emp_id').val(response.emp_id);
                $('#assign_date').val(response.assign_date);
                $('#assign_status').prop('checked', response.assign_status === 'yes');
                $('#laptopModal').modal('show');
            }
        });
    }

    function saveLaptop() {
        const id = $('#laptopId').val();
        const url = id ? '<?= base_url('admin/laptop/product/updateLaptopProduct/') ?>' + id : '<?= base_url('admin/laptop/product/createLaptopProduct') ?>';
        const method = id ? 'POST' : 'POST';

        $.ajax({
            url: url,
            method: method,
            data: {
                asset_id: $('#asset_id').val(),
                serial_number: $('#serial_number').val(),
                model_name: $('#model_name').val(),
                manufacturer: $('#manufacturer').val(),
                screen_size: $('#screen_size').val(),
                ram: $('#ram').val(),
                ram_model: $('#ram_model').val(),
                ram_fsb: $('#ram_fsb').val(),
                ssd: $('#ssd').val(),
                hard_disk: $('#hard_disk').val(),
                processor_company: $('#processor_company').val(),
                processor: $('#processor').val(),
                processor_generation: $('#processor_generation').val(),
                motherboard: $('#motherboard').val(),
                motherboard_model: $('#motherboard_model').val(),
                assigned_to: $('#assigned_to').val(),
                emp_id: $('#emp_id').val(),
                assign_date: $('#assign_date').val(),
                assign_status: $('#assign_status').is(':checked') ? 'yes' : 'unassigned'
            },
            success: function(response) {
                if (response.success) {
                    $('#laptopModal').modal('hide');
                    loadLaptops();
                    toastr.success('Laptop ' + (id ? 'updated' : 'created') + ' successfully');
                } else {
                    toastr.error(response.message);
                }
            }
        });
    }

    function deleteLaptop(id) {
        if (confirm('Are you sure you want to delete this laptop?')) {
            $.ajax({
                url: '<?= base_url('admin/laptop/product/deleteLaptopProduct/') ?>' + id,
                method: 'DELETE',
                success: function(response) {
                    if (response.success) {
                        loadLaptops();
                        toastr.success('Laptop deleted successfully');
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        }
    }

    function toggleStatus(id) {
        $.ajax({
            url: '<?= base_url('admin/laptop/product/updateLaptopProduct/') ?>' + id,
            method: 'POST',
            data: {
                assign_status: $('#status_' + id).is(':checked') ? 'yes' : 'no'
            },
            success: function(response) {
                if (!response.success) {
                    toastr.error(response.message);
                    loadLaptops();
                }
            }
        });
    }
    </script>
</body>
</html>
