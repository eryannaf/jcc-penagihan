<form id="createForm">
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Inventaris</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="createBrand">Merk Laptop</label>
                <input type="text" class="form-control" id="createBrand" name="brand">
            </div>
            <div class="form-group">
                <label for="createSeri">Seri Laptop</label>
                <input type="text" class="form-control" id="createSeri" name="seri">
            </div>
            <div class="form-group">
                <label for="createDetail">Detail</label>
                <textarea class="form-control" id="createDetail" name="detail"></textarea>
            </div>
            <div class="form-group">
                <label for="createHarga">Harga</label>
                <input type="text" class="form-control price" id="createHarga" name="harga">
            </div>
            <div class="form-group">
                <label for="createStok">Stok</label>
                <input type="number" class="form-control" id="createStok" name="stok">
            </div>
            <div class="form-group">
                <label for="createStok">Image</label>
                <input type="file" class="form-control" id="createStok" name="image">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="createSubmit">Save changes</button>
        </div>
        </div>
    </div>
    </div>
</form>
