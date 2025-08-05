<div class="modal fade" id="unassignModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="unassignModalLabel">Unassign Mouse</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="unassignForm">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="unassignAssetId" class="form-label">Asset ID</label>
                            <select class="form-select select2" id="unassignAssetId" name="assetId" required>
                                <option value="">Select Asset</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="unassignEmployeeName" class="form-label">Employee Name</label>
                            <input type="text" class="form-control" id="unassignEmployeeName" name="employeeName" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="unassignEmployeeId" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="unassignEmployeeId" name="employeeId" readonly>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="unassignMouseBtn" onclick="unassignMouse()">Unassign</button>
            </div>
        </div>
    </div>
</div>
