<!-- Extends layout -->
<?= $this->extend('layoutadmin/main'); ?>
<?= $this->section('Judul'); ?>
Lapangan <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah Lapangan</button>

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
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $field['id']; ?>">Edit</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $field['id']; ?>">Hapus</button>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Lapangan -->
            <div class="modal fade" id="editModal<?= $field['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $field['id']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel<?= $field['id']; ?>">Edit Lapangan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('/lapangan/update'); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?= $field['id']; ?>">
                                <div class="form-group">
                                    <label for="name">Nama Lapangan</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $field['name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control" id="description" name="description" required><?= $field['description']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="location">Lokasi</label>
                                    <input type="text" class="form-control" id="location" name="location" value="<?= $field['location']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="price_per_hour">Harga per Jam</label>
                                    <input type="number" class="form-control" id="price_per_hour" name="price_per_hour" value="<?= $field['price_per_hour']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control-file" id="foto" name="foto">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Konfirmasi Hapus Lapangan -->
            <div class="modal fade" id="deleteModal<?= $field['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $field['id']; ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel<?= $field['id']; ?>">Hapus Lapangan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus lapangan ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a href="<?= base_url('/lapangan/delete/' . $field['id']); ?>" class="btn btn-danger">Hapus</a>
                        </div>
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

<!-- Modal Tambah Lapangan -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Lapangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('/lapangan/store'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Lapangan</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="location">Lokasi</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="price_per_hour">Harga per Jam</label>
                        <input type="number" class="form-control" id="price_per_hour" name="price_per_hour" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>