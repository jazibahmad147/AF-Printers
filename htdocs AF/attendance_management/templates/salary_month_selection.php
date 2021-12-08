
<!-- Modal -->
<div class="modal fade" id="form_salary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Select Month and Year</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="./manage_salary.php" method="post">
        <!-- <form action="./includes/DBOperation.php"> -->
        <div class="form-group">
            <label for="month">Select Month</label>
            <select name="month" id="month" style="width:100%; height:30px;" required>
                <option>JANUARY</option>
                <option>FEBURARY</option>
                <option>MARCH</option>
                <option>APRAIL</option>
                <option>MAY</option>
                <option>JUNE</option>
                <option>JULY</option>
                <option>AUGUST</option>
                <option>SEPTEMBER</option>
                <option>OCTOBER</option>
                <option>NOVEMBER</option>
                <option>DECEMBER</option>
            </select>
        </div>
        <div class="form-group">
            <label for="year">Select Year</label>
            <select name="year" id="year" style="width:100%; height:30px;" required>
                <option>2019</option>
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
                <option>2023</option>
            </select>
        </div>
                <!-- <div class="form-group">
                <label>Enter Month</label>
                    <input type="text" class="form-control" name="month" id="month" placeholder="Select Month">
                    <small id="amount_error" class="form-text text-muted"></small>
                </div> -->
                <button type="submit" name="select" class="btn btn-primary">Select</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
