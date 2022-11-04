<form id="createForm">
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
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
                <label for="createName">Nama Member</label>
                <select name="member_id" id="createName" class="form-control">
                    <option value="" selected disabled>Pilih Member</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="createMerk">Merk Laptop</label>
                <select name="inventaris_id" id="createMerk" class="form-control">
                    <option value="" selected disabled>Pilih Laptop</option>
                    @foreach ($inventaris as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="createPinjam">Tanggal Peminjaman</label>
                <input type="date" class="form-control" id="createPinjam" name="pinjam">
            </div>
            <div class="form-group">
                <label for="createBalik">Tanggal Pengembalian</label>
                <input type="date" class="form-control" id="createBalik" name="balik">
            </div>
            <div class="form-group">
                <label for="createTotal">Total Biaya</label>
                <input type="number" class="form-control" id="createTotal" name="total">
            </div>
            {{-- <div class="form-group">
                <label for="createStatus">Status</label>
                <input type="text" class="form-control" id="createStatus" name="status"></textarea>
            </div> --}}
            <div class="form-group">
                <label for="createQuantity">Quantity</label>
                <input type="number" class="form-control" id="createQuantity" name="quantity"></textarea>
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
