<!-- Extends layout -->
<?= $this->extend('layout/main'); ?>
<?= $this->section('Judul'); ?>
Profile
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

<!-- Section content -->
<!-- Section content -->
<?= $this->section('isi'); ?>

<?php if ($profile) : ?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="ktp-photo">
                        <img src="<?= base_url('uploads/' . $profile['foto']); ?>" class="card-img-top" alt="<?= $profile['first_name']; ?>">
                    </div>
                </div>
                <div class="col-8">
                    <h5 class="card-title"><?= $profile['first_name'] . ' ' . $profile['last_name']; ?></h5>
                    <p class="card-text"><strong>Email:</strong> <?= $profile['email']; ?></p>
                    <p class="card-text"><strong>Phone:</strong> <?= $profile['phone_number']; ?></p>
                    <p class="card-text"><strong>Address:</strong> <?= $profile['address']; ?></p>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#profileModal">Edit Data</button>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <p>No profile data found.</p>
    <button class="btn btn-primary" data-toggle="modal" data-target="#profileModal">Tambah Data</button>
<?php endif; ?>


<!-- Modal Edit -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('/profile/saveProfile'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Silahkan Lengkapi Profil Anda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $profile['first_name'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $profile['last_name'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $profile['email'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $profile['phone_number'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" required><?= $profile['address'] ?? ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>