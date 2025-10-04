<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $this->renderSection('title') ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="/dashboard">DPRApp</a>
      <div class="d-flex">
        <?php if (session()->has('user')): ?>
          <a href="/logout" class="btn btn-outline-light">Logout</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <!-- Main content -->
  <div class="container">
    <?= $this->renderSection('content') ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>