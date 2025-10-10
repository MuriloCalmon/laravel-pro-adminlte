<div class="card">
    <form action="{{ route('user.updateProfile', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-header">
            Perfil
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Tipo de pessoa</label>
                <select class="form-control @error('type') is-invalid @enderror" name="type" id="">
                    @foreach (['PF', 'PJ'] as $type)
                        <option value="{{ $type }}"
                            {{ (old('type') ?? $user->profile->type ?? '') === $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label">Endereço</label>
                <input type="address" name="address" class="form-control @error('address') is-invalid @enderror"
                    value="{{ old('address') ?? $user->profile->address }}">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>


    </form>
</div>