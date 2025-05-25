<form id="formInputNilai" method="POST" action="{{ route('nilai.store', $alternatif->alternatif_id) }}">
    @csrf

    <div class="modal-header">
        <h5 class="modal-title">Input Nilai untuk: {{ $alternatif->lowongan->title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
    </div>

    <div class="modal-body">
        @foreach ($kriterias as $kriteria)
            <div class="mb-3">
                <label class="form-label">{{ $kriteria->nama }}</label>
                <select name="nilai[{{ $kriteria->kriteria_id }}]" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    @foreach ($skorKriterias[$kriteria->kriteria_id] as $skor)
                        <option value="{{ $skor->nilai }}">{{ $skor->parameter }} ({{ $skor->nilai }})</option>
                    @endforeach
                </select>
            </div>
        @endforeach
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Nilai</button>
    </div>
</form>
<script>
    // Pastikan handler ini di-trigger setelah modal dimuat
    $(document).on('submit', '#formInputNilai', function(e) {
        e.preventDefault();

        let form = $(this);
        let actionUrl = form.attr('action');
        let formData = form.serialize();

        $.ajax({
            url: actionUrl,
            method: 'POST',
            data: formData,
            success: function(response) {
                $('#modalInputNilai').modal('hide');
                form.trigger("reset");
                alert('Nilai berhasil disimpan.');
                location.reload(); // Bisa diganti fetch atau datatable redraw
            },
            error: function(xhr) {
                alert('Gagal menyimpan nilai. Cek kembali input.');
                console.error(xhr.responseText);
            }
        });
    });
</script>
