<button type="button" onclick="edit({{ $id }})" class="btn btn-secondary">Edit</button>

<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-danger" onclick="editStatus({{$id}})">Status</button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#" onclick="deleteData({{ $id }})">Hapus</a>
      </div>
</div>
{{-- <button type="button" onclick="deleteData({{ $id }})" class="btn btn-danger">Delete</button> --}}
