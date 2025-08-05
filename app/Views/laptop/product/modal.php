<!-- Create/Edit Modal -->
<div class="modal fade" id="laptopModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add/Edit Laptop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="laptopForm">
                    <input type="hidden" id="laptopId">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="asset_id" class="form-label">Asset ID</label>
                                <input type="text" class="form-control" id="asset_id" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="serial_number" class="form-label">Serial Number</label>
                                <input type="text" class="form-control" id="serial_number" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="model_name" class="form-label">Model Name</label>
                                <input type="text" class="form-control" id="model_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="manufacturer" class="form-label">Manufacturer</label>
                                <input type="text" class="form-control" id="manufacturer" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="screen_size" class="form-label">Screen Size</label>
                                <input type="text" class="form-control" id="screen_size" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="ram" class="form-label">RAM</label>
                                <input type="text" class="form-control" id="ram" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="ram_model" class="form-label">RAM Model</label>
                                <input type="text" class="form-control" id="ram_model" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="ram_fsb" class="form-label">RAM FSB</label>
                                <input type="text" class="form-control" id="ram_fsb" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="ssd" class="form-label">SSD</label>
                                <input type="text" class="form-control" id="ssd" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="hard_disk" class="form-label">Hard Disk</label>
                                <input type="text" class="form-control" id="hard_disk" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="processor_company" class="form-label">Processor Company</label>
                                <input type="text" class="form-control" id="processor_company" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="processor" class="form-label">Processor</label>
                                <input type="text" class="form-control" id="processor" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="processor_generation" class="form-label">Processor Generation</label>
                                <input type="text" class="form-control" id="processor_generation" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="motherboard" class="form-label">Motherboard</label>
                                <input type="text" class="form-control" id="motherboard" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="motherboard_model" class="form-label">Motherboard Model</label>
                                <input type="text" class="form-control" id="motherboard_model" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveLaptop()">Save</button>
            </div>
        </div>
    </div>
</div>
