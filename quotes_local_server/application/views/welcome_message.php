
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Checkout example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/checkout/">

    <!-- Bootstrap core CSS -->
<link href="assets/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="https://getbootstrap.com/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <h2>Quotes Gallery</h2>
    <p class="lead">Pemrograman Perangkat Bergerak<br>IT Telkom Purwokerto</p>
  </div>

  <div class="row">
    <div class="col-md-12 order-md-1">
      <h4 class="mb-3">Registrasi Akun</h4>
      <form class="needs-validation" action="index.php/welcome/do_insert" method="post" novalidate>

        <div class="mb-3">
          <label for="address">Nama Lengkap</label>
          <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
        </div>

        <div class="mb-3">
          <label for="address2">NIM<span class="text-muted"></span></label>
          <input type="text" class="form-control" name="nim" placeholder="NIM" required>
        </div>

          <div class="mb-3">
            <label for="country">Kelas</label>
            <select class="custom-select d-block w-100" name="class_id" required>
              <option value="">Choose...</option>
			  <?php 
			  	foreach($class as $row){
					echo "<option value='".$row["class_id"]."'>".$row["name"]."</option>";
				  };
			  ?>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Daftar</button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<script src="assets/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script></body>
</html>
