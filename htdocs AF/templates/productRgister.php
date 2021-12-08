<!-- Modal -->
<div class="modal fade" id="form_products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form id="product_form" onsubmit="return false">
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name">
                    <small id="p_error" class="form-text text-muted"></small>
                </div>
                <!-- <div class="form-group">
                    <label>Parent Category </label>
                    <select class="form-control" id="parent_cat" name="parent_cat">
                    </select>
                    <small id="cat_error" class="form-text text-muted"></small>
                </div> -->
                
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>