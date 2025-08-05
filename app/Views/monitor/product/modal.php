<!-- Create/Edit Modal -->
<div class="modal fade" id="monitorModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add/Edit Monitor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="monitorForm">
                    <input type="hidden" id="monitorId">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="asset_id" class="form-label">Asset ID</label>
                                <input type="text" class="form-control" id="asset_id" required>
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
                                <label for="resolution" class="form-label">Resolution</label>
                                <input type="text" class="form-control" id="resolution" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <select class="form-select select2" id="type" name="type" required>
                                    <option value="">Select Type</option>
                                    <option value="hdmi">HDMI</option>
                                    <option value="vga">VGA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveMonitor()">Save</button>
            </div>
        </div>
    </div>
</div>
