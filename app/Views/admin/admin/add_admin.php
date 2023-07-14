<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Add Admin Page &mdash; MangEak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('admin') ?>"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Admin</h1>
    </div>

    <div class="section-body">
    </div>
</section>

<div class="card">
    <div class="card-header">
        <h4>Add Admin</h4>
    </div>
    <div class="card-body col">
        <form action="/admin/store" method="post" autocomplete="off">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required autofocus>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
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