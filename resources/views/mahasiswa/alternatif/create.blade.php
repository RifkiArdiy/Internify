<form id="formTambahAlternatif" method="POST" action="{{ route('alternatif.store') }}">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="tambahAlternatifModalLabel">Tambah Alternatif</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
    </div>

    <div class="modal-body">
        <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswa->mahasiswa_id }}">

        <p><strong>Mahasiswa:</strong> {{ $mahasiswa->user->name }}</p>

        <label for="lowongan_id">Pilih Lowongan (Multiple)</label>
        <select name="lowongan_id[]" id="lowongan_id" class="form-select js-select2" multiple="multiple" required>
            @foreach ($lowongans as $low)
                <option value="{{ $low->lowongan_id }}">{{ $low->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        // Init Select2
        $('.js-select2').select2({
            dropdownParent: $('#tambahAlternatifModal'),
            width: '100%',
            placeholder: 'Pilih lowongan',
            allowClear: true
        });


        // Handle submit form via AJAX
        $('#formTambahAlternatif').on('submit', function(e) {
            e.preventDefault();
            let form = $(this);
            let url = "{{ route('alternatif.store') }}";
            let data = form.serialize();

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(response) {
                    $('#modalTambahAlternatif').modal('hide');
                    form.trigger("reset");
                    $('.js-select2').val(null).trigger('change');
                    location.reload(); // bisa diganti dengan fetch data
                },
                error: function(xhr) {
                    alert('Gagal menyimpan. Cek kembali input.');
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
