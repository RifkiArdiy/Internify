<form method="POST" action="{{ route('benefits.store') }}">
    @csrf
    <div class="modal-header border-0 pb-1">
        <h5 class="modal-title" id="addBenefitModalLabel">Tambah benefit Baru</h5>
        <button type="button" class="btn btn-sm btn-icon btn-trigger" data-bs-dismiss="modal">
            <em class="icon ni ni-cross"></em>
        </button>
    </div>
    <div class="modal-body pt-0">
        <div class="form-group">
            <label for="benefitName" class="form-label">Nama benefit</label>
            <input type="text" class="form-control" id="benefitName" name="name"
                placeholder="Contoh: Leadership benefit" required>
        </div>
    </div>
    <div class="modal-footer border-0 pt-0">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        // Modal submit via AJAX
        $('#addBenefitModal form').submit(function(e) {
            e.preventDefault();
            let form = $(this);
            let submitBtn = form.find('button[type="submit"]');
            let nameInput = form.find('input[name="name"]');
            let benefitName = nameInput.val();

            $.ajax({
                url: "{{ route('benefits.store') }}",
                method: "POST",
                data: {
                    name: benefitName,
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {
                    submitBtn.prop('disabled', true).text('Menyimpan...');
                },
                success: function(res) {
                    if (res.success) {
                        // Tambahkan ke select
                        let newOption = new Option(res.benefit.name, res.benefit.id, true,
                            true);
                        $('select[name="benefits[]"]').append(newOption).trigger('change');

                        // Reset form & tutup modal
                        nameInput.val('');
                        $('#addBenefitModal').modal('hide');
                    }
                },
                error: function(err) {
                    alert('Gagal menambahkan benefit.');
                },
                complete: function() {
                    submitBtn.prop('disabled', false).text('Simpan');
                }
            });
        });
    });
</script>
