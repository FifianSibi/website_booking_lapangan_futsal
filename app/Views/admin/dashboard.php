<!-- Extends layout -->
<?= $this->extend('layoutadmin/main'); ?>

<!-- Section title -->
<?= $this->section('Judul'); ?>
Dashboard
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

<?= $this->endSection('Judul'); ?>

<!-- Section content -->
<?= $this->section('isi'); ?>
<div class="row">
    <div class="col-md-3">
        <div class="card mb-3">
            <img src="<?= base_url() ?>/img/User-Profile-Transparent.png" class="card-img-top" alt="Profile Image">
            <div class="card-body">
                <h5 class="card-title"><b>Profile</b></h5>
                <p class="card-text">Kelola Profil.</p>
                <a href="/adminprofile" class="btn btn-primary"><i class="fas fa-users"></i>=====></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3">
            <img src="<?= base_url() ?>/img/reservasi.png" class="card-img-top" alt="Profile Image">
            <div class="card-body">
                <h5 class="card-title"><b>Reservasi</b></h5>
                <p class="card-text">Kelola Reservasi</p>
                <a href="/adminreservasi" class="btn btn-primary"><i class="fa fa fa-file"></i> =====></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mb-3">
            <img src="<?= base_url() ?>uploads/lapangan1.png" class="card-img-top" alt="Profile Image">
            <div class="card-body">
                <h5 class="card-title"><b>Lapangan</b></h5>
                <p class="card-text">Kelola Lapangan.</p>
                <a href="/adminlapangan" class="btn btn-primary"><i class="fa fas fa-futbol">
                        <h5>=====></h5>
                    </i></a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('isi'); ?>