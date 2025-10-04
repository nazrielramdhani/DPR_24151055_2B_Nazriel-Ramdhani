<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Login<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-center align-items-center vh-10">
    <div class="card shadow p-4" style="width: 22rem;">
        <h3 class="text-center mb-4">Login</h3>
        <form method="post" action="/login">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>