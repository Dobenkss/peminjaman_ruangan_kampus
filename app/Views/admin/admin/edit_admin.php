<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Edit Admin Page &mdash; MangEak</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('admin') ?>"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Admin</h1>
    </div>

    <div class="section-body">
    </div>
</section>

<div class="card">
    <div class="card-header">
        <h4>Edit Admin</h4>
    </div>
    <div class="card-body col">
        <form action="/admin/update/<?= $admin['id'] ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="<?= $admin['username'] ?>">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" value="<?= $admin['nama'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?= $admin['email'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
