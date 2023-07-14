<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Booking Page &mdash; MangEak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Peminjaman</h1>
    </div>

    <div class="section-body">
    </div>
</section>

<div class="card">
    <div class="card-header">
        <h4>Daftar Peminjaman</h4>
    </div>
    <div class="card-body col">
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <tr>
                    <th>No</th>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Nomor WhatsApp</th>
                    <th>Tujuan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php if (!empty($bookings)) : ?>
                    <?php foreach ($bookings as $key => $booking) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $booking['ruangan']; ?></td>
                            <td><?= $booking['date_request']; ?></td>
                            <td><?= $booking['start_time']; ?></td>
                            <td><?= $booking['end_time']; ?></td>
                            <td><?= $booking['no_wa']; ?></td>
                            <td><?= $booking['tujuan']; ?></td>
                            <td>
                                <?php if ($booking['status'] === 'pending') : ?>
                                    <div class="badge badge-secondary"><?= $booking['status']; ?></div>
                                <?php elseif ($booking['status'] === 'approved') : ?>
                                    <div class="badge badge-success"><?= $booking['status']; ?></div>
                                <?php elseif ($booking['status'] === 'rejected') : ?>
                                    <div class="badge badge-danger"><?= $booking['status']; ?></div>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if ($booking['status'] === 'pending') : ?>
                                     <a href="#" class="btn btn-sm btn-success update-status approved" onclick="return confirmAction('Apakah Anda yakin ingin approve peminjaman ini?', this)" data-href="/booking/update-status/<?= $booking['id'] ?>/approved" target="_blank">
                                        <i class="fas fa-check-circle"></i>
                                        Approve
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger update-status rejected" onclick="return confirmAction('Apakah Anda yakin ingin reject peminjaman ini?', this)" data-href="/booking/update-status/<?= $booking['id'] ?>/rejected" target="_blank">
                                        <i class="fas fa-times-circle"></i>
                                        Reject
                                    </a>
                                <?php else : ?>
                                    <span class="btn btn-sm btn-secondary disabled"><?= $booking['status']; ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7">Belum ada peminjaman ruangan.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>