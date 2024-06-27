<!-- Extends layout -->
<?= $this->extend('layoutadmin/main'); ?>

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
            <th scope="col">Aksi</th>
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
                            <form action="<?= base_url('reservasi/confirm/' . $reservation['id']) ?>" method="post" class="d-inline">
                                <button type="submit" class="btn btn-success btn-sm">Confirm</button>
                            </form>
                            <form action="<?= base_url('reservasi/cancel/' . $reservation['id']) ?>" method="post" class="d-inline">
                                <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                            </form>
                        <?php elseif ($reservation['status'] == 'confirmed') : ?>
                            <button class="btn btn-success btn-sm" disabled>Confirmed</button>
                        <?php elseif ($reservation['status'] == 'canceled') : ?>
                            <button class="btn btn-danger btn-sm" disabled>Canceled</button>
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