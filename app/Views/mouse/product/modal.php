<!-- Create/Edit Modal -->
<div class="modal fade" id="mouseModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add/Edit Mouse</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="mouseForm">
                    <input type="hidden" id="mouseId">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="asset_id" class="form-label">Asset ID</label>
                                <input type="text" class="form-control" id="asset_id" required>
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
                                <label for="mouse_type" class="form-label">Mouse Type</label>
                                <select class="form-select select2" id="mouse_type" name="mouse_type" required>
                                    <option value="">Select Type</option>
                                    <option value="wired">Wired</option>
                                    <option value="bluetooth">Blutooth</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveMouse()">Save</button>
            </div>
        </div>
    </div>
</div>
