<form id="editForm">
    <div class="modal" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Invoice</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="editName">Nama Member</label>
                <input type="text" class="form-control" id="editName" name="name">
            </div>
            <div class="form-group">
                <label for="editMerk">Merk Laptop</label>
                <input type="text" class="form-control" id="editMerk" name="merk">
            </div>
            <div class="form-group">
                <label for="editPinjam">Tanggal Peminjaman</label>
                <input type="date" class="form-control" id="editPinjam" name="pinjam">
            </div>
            <div class="form-group">
                <label for="editBalik">Tanggal Pengembalian</label>
                <input type="date" class="form-control" id="editBalik" name="balik">
            </div>
            <div class="form-group">
                <label for="editTotal">Total Biaya</label>
                <input type="number" class="form-control" id="editTotal" name="total">
            </div>
            <div class="form-group">
                <label for="editStatus">Status</label>
                <input type="text" class="form-control" id="editStatus" name="status"></textarea>
            </div>
            <div class="form-group">
                <label for="editQuantity">Quantity</label>
                <input type="number" class="form-control" id="editQuantity" name="quantity"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="editSubmit">Save changes</button>
        </div>
        </div>
    </div>
    </div>
</form>
