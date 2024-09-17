<form
    action="{{ route('comics.destroy', $fumetto) }}"
    method="POST"
    onsubmit="return confirm('Sei sicuro di voler eliminare {{$fumetto->title}}?')">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>


