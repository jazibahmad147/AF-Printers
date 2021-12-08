<!-- Modal -->
<div class="modal fade" id="form_clients" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form id="client_form" onsubmit="return false">
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control" name="company_name" id="company_name" oninput="this.value = this.value.toUpperCase()" placeholder="Enter Company Name">
                    <small id="company_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                <label>Client Name</label>
                    <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Enter Client Name">
                    <small id="client_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                <label>Contact Number</label>
                    <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Enter Contact Number">
                    <small id="contact_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                <label>Old Balance</label>
                    <input type="text" class="form-control" name="old_balance" id="old_balance" placeholder="Mention Old Balance">
                    <small id="balance_error" class="form-text text-muted"></small>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>