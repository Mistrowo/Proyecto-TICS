<?php 
session_start();
include_once("header.php")
?>

    
<main>
  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <img src="img/logo.jfif" width="65" height="70" class="me-2" viewBox="0 0 118 94" role="img">
        <h3>UwUDP Simulator</h3>
      </a>
    </header>

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Calcular Jubilacion Automatica Programada</h1>
        <p class="col-md-8 fs-4">Acá podras ver la fortuna que ganaras mes a mes cuando te jubiles, solo tienes que poner los datos pedidos y se calculara por ti.</p>
        <button class="btn btn-primary btn-lg" type="button" ><a href="Option1.php" style="color:white"> Presiona Aquí </a></button>
      </div>
    </div>

    <div class="row align-items-md-stretch">
      <div class="col-md-6">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
          <h2>Jubilacion de monto Particular</h2>
          <p>Acá se puede consultar cuanto APV necesitas para tener una pension digna.</p>
          <button class="btn btn-outline-light" type="button"><a href="Option2.php" style="color:white"> Presiona Aquí </a></button>
        </div>
      </div>
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light border rounded-3">
          <h2>Donaciones</h2>
          <p>Done aquí para ayudar que este proyecto cresca y pagar la Universidad Diego Portales tambien, gracias de antemano.</p>
          <button class="btn btn-outline-secondary" type="button">Dona AQUI</button>
        </div>
      </div>
    </div>

    <footer class="pt-3 mt-4 text-muted border-top">
     UwUDP Company&copy; 2021
    </footer>
  </div>
</main>


    
  </body>
</html>