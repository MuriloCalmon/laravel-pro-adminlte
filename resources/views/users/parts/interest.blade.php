<div class="card mt-3 mb-3">
    <form action="{{ route('user.updateInterests', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-header">
            Interesses
        </div>
        <div class="card-body">
            @foreach (['Esportes', 'Tecnologia', 'Música', 'Viagens'] as $interest)
                <div class="form-check">
                    <input class="form-check-input @error('interests') is-invalid @enderror" type="checkbox"
                        value="{{ $interest }}" name="interests[][name]" @checked(in_array($interest, $user->interest->pluck('name')->toArray()))>
                    <label class="form-check-label">
                        {{ $interest }}
                    </label>

                    @if($loop->last)
                        @error('interests')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    @endif
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </form>
</div>