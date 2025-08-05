<!-- Create/Edit Modal -->
<div class="modal fade" id="otherAssetModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add/Edit Other Asset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="otherAssetForm">
                    <input type="hidden" id="otherAssetId">
                    <div class="mb-3">
                        <label for="asset_id" class="form-label">Asset ID</label>
                        <input type="text" class="form-control" id="asset_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="count" class="form-label">count</label>
                        <input type="text" class="form-control" id="count" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveOtherAsset()">Save</button>
            </div>
        </div>
    </div>
</div>
