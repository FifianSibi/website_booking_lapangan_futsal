<!-- Extends layout -->
<?= $this->extend('layout/main'); ?>

<?= $this->section('Judul'); ?>
Reservasi
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

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal Reservasi</th>
            <th scope="col">Jam Mulai</th>
            <th scope="col">Jam Selesai</th>
            <th scope="col">Status</th>
            <th scope="col">Pesan</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($reservations)) : ?>
            <?php foreach ($reservations as $index => $reservation) : ?>
                <tr>
                    <th scope="row"><?= $index + 1; ?></th>
                    <td><?= $reservation['reservation_date']; ?></td>
                    <td><?= $reservation['start_time']; ?></td>
                    <td><?= $reservation['end_time']; ?></td>
                    <td><?= ucfirst($reservation['status']); ?></td>
                    <td>
                        <?php if ($reservation['status'] == 'pending') : ?>
                            Harap segera melakukan pembayaran di tempat
                        <?php elseif ($reservation['status'] == 'confirmed') : ?>
                            Reservasi anda sudah disetujui. Selamat bermain!
                        <?php elseif ($reservation['status'] == 'cancelled') : ?>
                            Reservasi anda di batalkan. Silahkan buat reservasi kembali
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="7">No reservations found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection(); ?>