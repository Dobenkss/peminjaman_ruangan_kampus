<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Add Room Page &mdash; MangEak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('rooms') ?>"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Ruangan</h1>
    </div>

    <div class="section-body">
    </div>
</section>

<div class="card">
    <div class="card-header">
        <h4>Add Ruangan</h4>
    </div>
    <div class="card-body col">
        <form action="/rooms/store" method="post" autocomplete="off" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Ruangan</label>
                <input type="text" name="ruangan" class="form-control" required autofocus>
            </div>
            <div class="form-group">
                <label>Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Fasilitas</label>
                <textarea class="form-control" name="fasilitas"></textarea>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control-file" required>
            </div>
            <div>
                <button class="btn btn-success" type="submit"><i class="fas fa-paper-plane"></i>Submit</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
            </div>
        </form>
    </div>
</div>
</div>
<?= $this->endSection() ?>