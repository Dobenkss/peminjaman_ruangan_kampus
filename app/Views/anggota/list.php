<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Member List Page &mdash; MangEak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Member</h1>
    </div>

    <div class="section-body">
    </div>
</section>

<div class="card">
    <div class="card-header">
        <h4>Daftar Member</h4>
    </div>
    <div class="card-body col">
        <div class="table-responsive">
            <table class="table table-striped table-md">
                <tbody>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                    <?php if (!empty($anggota)) : ?>
                        <?php foreach ($anggota as $key => $ang) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $ang['username']; ?></td>
                                <td><?= $ang['nama']; ?></td>
                                <td><?= $ang['email']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5">Tidak ada pengguna dengan peran anggota.</td>
                        </tr>
                    <?php endif; ?>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection() ?>