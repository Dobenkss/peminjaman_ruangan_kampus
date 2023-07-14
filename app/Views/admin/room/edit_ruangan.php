<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Edit Room Page &mdash; MangEak</title>
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
        <h4>Edit Ruangan</h4>
    </div>
    <div class="card-body col">
        <form action="/rooms/update/<?= $room['id'] ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Ruangan</label>
                <input type="text" name="ruangan" class="form-control" value="<?= $room['ruangan'] ?>">
            </div>
            <div class="form-group">
                <label>Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control" value="<?= $room['kapasitas'] ?>">
            </div>
            <div class="form-group">
                <label>Fasilitas</label>
                <input type="textarea" name="fasilitas" class="form-control" value="<?= $room['fasilitas'] ?>">
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            <div>
                <button class="btn btn-success" type="submit"><i class="fas fa-paper-plane"></i>Save</button>
            </div>
        </form>
    </div>
</div>
</div>
<?= $this->endSection() ?>