<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body, html {
      height: 100%;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }

    .custom-card {
      width: 70%;
      max-width: 400px;
    }
    .custom-button {
      /* Estilos personalizados aquí */
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      text-decoration: none;
    }

    .custom-button:hover {
      /* Estilos para cuando el botón está en hover */
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card custom-card">
      <div class="card-body">
        <h2 class="card-title mb-4">Iniciar sesión</h2>
        <form action="menu.php" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Usuario:</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
  
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
        
          <a href="<?php echo base_url();?>menu" class="custom-button">Iniciar sesión</a>

          
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
