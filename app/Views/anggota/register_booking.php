<?= $this->extend('partial/template') ?>

<?= $this->section('title') ?>
<title>Form Peminjaman &mdash; MangEak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('booking/list') ?>"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Form Peminjaman</h1>
    </div>
    <div class="card">
        <div class="card-header">
            <h4><?= $room['ruangan']; ?></h4>
        </div>
        <div class="card-body col">
            <form action="<?= site_url('booking/register/store'); ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label>Tanggal Peminjaman</label>
                    <input type="text" class="form-control datepicker" name="date_request" required>
                </div>
                <div class="form-group">
                    <label>Waktu Mulai</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control timepicker" name="start_time" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Waktu Selesai</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control timepicker" name="end_time" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tujuan">Tujuan</label>
                    <textarea id="tujuan" name="tujuan" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="no_wa">Nomor WhatsApp</label>
                    <input type="text" id="no_wa" name="no_wa" class="form-control" required>
                </div>
                <input type="hidden" name="room_id" value="<?= $room['id']; ?>">
                <button type="submit" class="btn btn-primary" id="bmit-button">Submit</button>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ?>