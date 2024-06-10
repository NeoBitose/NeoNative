<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="shortcut icon" href="public/img/nn.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  
</head>
<body>
<section class="d-flex justify-content-center align-items-center" style="min-height: 100vh;background-color: hsl(0, 0%, 96%)">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            The best offer <br />
            <span class="text-secondary">for your business</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
            quibusdam tempora at cupiditate quis eum maiores libero
            veritatis? Dicta facilis sint aliquid ipsum atque?
          </p>
          <a href="/">
              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary btn-lg btn-block mb-4 align-items-center">
                Learn More
              </button>
            </a>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card border-0">
            <div class="card-body py-5 px-md-5">
              <form action="login" method="post"> 
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <h1 class="text-secondary text-center mb-5 fw-bold">Login</h1>
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="text" name="username" id="form3Example3" class="form-control" />
                  <label class="form-label" for="form3Example3">Username</label>
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="password" name="password" id="form3Example4" class="form-control" />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary btn-lg btn-block mb-4 align-items-center">
                    Sign In
                  </button>                
                </div>
                <p class="text-center">Belum punya akun ? <a href="register" class="text-secondary">Daftar</a></p>              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
</body>
</html>