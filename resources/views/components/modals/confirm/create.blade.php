<form id="createForm">
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Tambah Confirm</h5>
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
                <label for="createDetail">Keterangan</label>
                <textarea class="form-control" id="createDetail" name="keterangan"></textarea>
            </div>

            <div class="form-group">
                <label for="createImage">Gambar Confirm</label>
                <input type="file" id="createImage" name="image" class="form-control"
                    required data-allowed-file-extensions="jpg png"
                    data-max-file-size-preview="3M"
                    data-max-file-size="3M">
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
