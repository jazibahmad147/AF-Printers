
<!-- Modal -->
<div class="modal fade" id="form_expenses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Expenses</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="./includes/add_expenses.php" method="post">
        <!-- <form action="./includes/DBOperation.php"> -->
                <div class="form-group">
                <label>Date</label>
                    <input type="date" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <div class="form-group">
                    <label>Expense</label>
                    <!-- <div class="autocomplete"> -->
                        <input id="expense" class="form-control" type="text" name="expense" autocomplete="off" placeholder="Enter expense name...">
                        <small id="expense_error" class="form-text text-muted"></small>
                    <!-- </div> -->
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <!-- <div class="autocomplete"> -->
                        <input id="description" class="form-control" type="text" name="description" autocomplete="off" placeholder="Enter expense description...">
                        <small id="description_error" class="form-text text-muted"></small>
                    <!-- </div> -->
                </div>
                <div class="form-group">
                <label>Amount</label>
                    <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount in Rs.">
                    <small id="amount_error" class="form-text text-muted"></small>
                </div>
                <button type="submit" name="add_expense" class="btn btn-primary">Insert</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
