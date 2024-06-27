<!-- Extends layout -->
<?= $this->extend('layout/main'); ?>
<?= $this->section('Judul'); ?>
Lapangan
<style>
    .card {
        transition: transform 0.2s;
        cursor: pointer;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .ktp-photo {
        border: 2px solid #333;
        border-radius: 5px;
        padding: 5px;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('isi'); ?>
<?php if ($fields) : ?>
    <?php
    // Fungsi untuk format Rupiah
    function formatRupiah($number)
    {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }
    ?>
    <div class="row">
        <?php foreach ($fields as $field) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('uploads/' . $field['foto']); ?>" class="card-img-top" alt="<?= $field['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $field['name']; ?></h5>
                        <p class="card-text"><?= $field['description']; ?></p>
                        <p class="card-text"><?= $field['location']; ?></p>
                        <p class="card-text"><?= formatRupiah($field['price_per_hour']); ?></p>
                        <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#addReservationModal<?= $field['id']; ?>">
                            Pesan Sekarang
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah Reservasi -->
            <div class="modal fade" id="addReservationModal<?= $field['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addReservationModalLabel<?= $field['id']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addReservationModalLabel<?= $field['id']; ?>">Tambah Reservasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('/reservasi/store'); ?>" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="field_id" value="<?= $field['id']; ?>">
                                <input type="hidden" name="user_id" value="<?= session()->get('user_id'); ?>"> <!-- Asumsikan user_id disimpan dalam session -->
                                <div class="form-group">
                                    <label for="reservation_date">Tanggal Reservasi</label>
                                    <input type="date" class="form-control" id="reservation_date" name="reservation_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="start_time">Waktu Mulai</label>
                                    <input type="time" class="form-control" id="start_time" name="start_time" required>
                                </div>
                                <div class="form-group">
                                    <label for="end_time">Waktu Selesai</label>
                                    <input type="time" class="form-control" id="end_time" name="end_time" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambah Reservasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <p>No fields found.</p>
<?php endif; ?>


<?= $this->endSection(); ?>