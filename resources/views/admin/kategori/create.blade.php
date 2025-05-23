<form id="addKategoriForm">
    @csrf
    <div class="modal-header border-0 pb-1">
        <h5 class="modal-title">Tambah Kategori Baru</h5>
        <button type="button" class="btn btn-sm btn-icon btn-trigger" data-bs-dismiss="modal">
            <em class="icon ni ni-cross"></em>
        </button>
    </div>
    <div class="modal-body pt-0">
        <div class="form-group">
            <label for="kategoriName" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="kategoriName" name="name"
                placeholder="Contoh: Desain, Teknologi, Keuangan" required>
        </div>
    </div>
    <div class="modal-footer border-0 pt-0">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#addKategoriForm').submit(function(e) {
            e.preventDefault();

            let form = $(this);
            let submitBtn = form.find('button[type="submit"]');
            let nameInput = form.find('input[name="name"]');
            let kategoriName = nameInput.val();

            $.ajax({
                url: "{{ route('kategoris.store') }}",
                method: "POST",
                data: {
                    name: kategoriName,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {
                    submitBtn.prop('disabled', true).text('Menyimpan...');
                },
                success: function(res) {
                    if (res.success) {
                        // Tambahkan ke dropdown kategori (single select)
                        let newOption = new Option(res.kategori.name, res.kategori
                            .kategori_id, true, true);
                        $('select[name="kategori"]').append(newOption).trigger('change');

                        nameInput.val('');
                        $('#addKategoriModal').modal('hide');
                    }
                },
                error: function() {
                    alert('Gagal menambahkan kategori.');
                },
                complete: function() {
                    submitBtn.prop('disabled', false).text('Simpan');
                }
            });
        });
    });
</script>
