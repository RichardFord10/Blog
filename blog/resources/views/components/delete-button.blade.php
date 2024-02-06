<div>
    <form action="{{ route('$entityType.destroy', $entity->id) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-trash"></i> Delete
        </button>
    </form>
</div>