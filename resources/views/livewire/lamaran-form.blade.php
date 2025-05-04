<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <label>Lowongan Magang</label>
            <select wire:model="lowongan_id" class="form-control">
                <option value="">Pilih lowongan</option>
                @foreach($lowongans as $lowongan)
                    <option value="{{ $lowongan->lowongan_id }}">
                        {{ $lowongan->title }} - {{ $lowongan->company->name }}
                    </option>
                @endforeach
            </select>
            @error('lowongan_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <input type="hidden" wire:model="mahasiswa_id" value="{{ auth()->user()->mahasiswa->mahasiswa_id }}">

        <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
    </form>
</div>
