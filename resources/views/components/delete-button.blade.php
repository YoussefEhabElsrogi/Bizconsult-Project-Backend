<form action="{{ $href }}" method="POST" class="d-inline" id="deleteForm-{{ $id }}">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger"onclick="confirmDelete({{ $id }})">
        <i class="fe fe-24 fe-trash-2"></i>
    </button>
</form>
