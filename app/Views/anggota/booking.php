<?= $this->extend('partial/template') ?>

<?= $this->section('title') ?>
<title>Room List &mdash; MangEak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Room List</h1>
    </div>
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="row">
            <?php foreach ($rooms as $room) : ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= $room['ruangan']; ?></h4>
                            <div class="card-header-action">
                                <a href="<?= site_url('booking/register/' . $room['id']); ?>" class="btn btn-primary">Reservation Now!</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-2 text-muted">Kapasitas : <?= $room['kapasitas']; ?></div>
                            <div class="mb-2 text-muted">Fasilitas : <?= $room['fasilitas']; ?></div>
                            <div class="chocolat-parent">
                                <a href="<?= $room['image']; ?>" class="chocolat-image" title="Just an example">
                                    <div data-crop-image="285">
                                        <img alt="image" src="<?= base_url('public/uploads/rooms/' . $room['image']); ?>" class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </s <?= $this->endSection() ?>