<!-- Create/Edit Modal -->
<div class="modal fade" id="phoneModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add/Edit Phone</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="phoneForm">
                    <input type="hidden" id="phoneId">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="asset_id" class="form-label">Asset ID</label>
                                <input type="text" class="form-control" id="asset_id" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="serial_number" class="form-label">Serial Number</label>
                                <input type="text" class="form-control" id="serial_number" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="device_type" class="form-label">Device Type</label>
                                <select class="form-select select2" id="device_type" name="device_type" required>
                                    <option value="">Select Type</option>
                                    <option value="android">Android</option>
                                    <option value="iphone">iPhone</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="model" class="form-label">Model</label>
                                <input type="text" class="form-control" id="model" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="manufacturer" class="form-label">Manufacturer</label>
                                <input type="text" class="form-control" id="manufacturer" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="screen_size" class="form-label">Screen Size</label>
                                <input type="text" class="form-control" id="screen_size" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="ram" class="form-label">RAM</label>
                                <input type="text" class="form-control" id="ram" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="storage" class="form-label">Storage</label>
                                <input type="text" class="form-control" id="storage" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="os" class="form-label">OS</label>
                                <input type="text" class="form-control" id="os" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="savePhone()">Save</button>
            </div>
        </div>
    </div>
</div>
