
<!-- Modal -->
<div class="modal fade" id="form_discount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Extra Discount</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="./includes/extra_discount.php" method="post">
        <!-- <form action="./includes/DBOperation.php"> -->
                <div class="form-group">
                <label>Date</label>
                    <input type="date" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <div class="form-group">
                    <label>Company Name</label>
                    <!-- <div class="autocomplete"> -->
                        <input id="cust_name" class="form-control" type="text" name="cust_name" oninput="this.value = this.value.toUpperCase()" autocomplete="off" placeholder="Search Company...">
                        <small id="company_error" class="form-text text-muted"></small>
                    <!-- </div> -->
                </div>
                <div class="form-group">
                <label>Amount</label>
                    <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Payed Amount in Rs.">
                    <small id="amount_error" class="form-text text-muted"></small>
                </div>
                <button type="submit" name="add_discount" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
