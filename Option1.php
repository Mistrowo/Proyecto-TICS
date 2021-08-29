<?php 
session_start();
include_once("header.php");
?>
<!doctype html>
  <head>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
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
  <main>
    <div class="py-5 text-center">
      <?php
      if(isset($_POST['Ahorro'])){
        if($_POST['Ahorro'] > 0 && $_POST['Sueldo'] > 0){
      ?>
      
         <a href="index.php"> <img src="img/logo2.jfif" width="100" height="70" class="me-2" viewBox="0 0 118 94" role="img"></a>
         <?php
      }else{
      ?>
    <a href="index.php"> <img src="img/logo.jfif" width="65" height="70" class="me-2" viewBox="0 0 118 94" role="img"></a>
    <?php } ?>
    <?php
      }else{
      ?>
    <a href="index.php"> <img src="img/logo.jfif" width="65" height="70" class="me-2" viewBox="0 0 118 94" role="img"></a>
    <?php } ?>
      <h2>Calculadora Jubilacion Automatica Programada</h2>
      <p class="lead">Complete los datos pedidos para poder mostrarle su posible futura pension.</p>
    </div>
    <!--Revisa si hay datos ingresados y muestra resultados si hay-->
<?php
  if(isset($_POST['Ahorro'])){
    #Revisar si se pusieron bien los saldos, en el caso contrario necesitara reingresarlos
    if($_POST['Ahorro'] > 0 && $_POST['Sueldo'] > 0){ 
      #Se incluye la parte de calculos y da los resultados
      $pensionX = FALSE;
      include_once("calculos.php");
      ?>
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Resultados</span>
          <span class="badge bg-primary rounded-pill">2</span>
        </h4>
        <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">AFP</h6>
              <small class="text-muted">Seleccionado</small>
            </div>
            <span class="text-muted"><?php echo $_POST['AFP'] ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Tipo de Fondo</h6>
              <small class="text-muted">Seleccionado</small>
            </div>
            <span class="text-muted"><?php echo $Fondos[$_POST['Fondo']] ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Pension Mensual</h6>
              <small class="text-muted">Al jubirlarse</small>
            </div>
            <span class="text-muted"><?php echo (int)$pension; ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">APV</h6>
              <small class="text-muted">Dinero adicional</small>
            </div>
            <span class="text-muted">$0</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Monto Total al Jubilarse</span>
            <strong><?php echo (int)$total_ahorro; ?></strong>
          </li>
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
<?php
      }else{
        ?> <h4>Ingrese los datos correctamente</h4> <?php
        } } ?>


      <!--Pedir datos al usuario -->
        <h4 class="mb-3"> Datos </h4>
        <form method="POST" action="Option1.php">
          <div class="row g-3">
            <div class="col-12">
              <label for="firstName" class="form-label">Ahorro Actual en AFP</label>
              <input name="Ahorro" type="number" class="form-control" placeholder="Ingrese Monto" value="" required>
            </div>

            <div class="col-12">
              <label for="firstName" class="form-label">Sueldo Actual</label>
              <input name="Sueldo" type="number" class="form-control" placeholder="Ingrese Sueldo" value="" required>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label">AFP</label>
                <select name="AFP" class="custom-select" required>
                  <option selected value="">Elegir...*</option>
                  <option value="capital">Capital</option>
                  <option value="provida">ProVida</option>
                  <option value="cuprum">Cuprum</option>
                  <option value="habitat">Habitat</option>
                  <option value="planvital">PlanVital</option>
                  <option value="sistema">Sistema</option>
                </select>
            </div>
            
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Tipo de Fondo</label>
                <select name="Fondo" class="custom-select" required>
                  <option selected value="">Elegir...*</option>
                  <option value="0">A</option>
                  <option value="1">B</option>
                  <option value="2">C</option>
                  <option value="3">D</option>
                  <option value="4">E</option>
                </select>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label">Sexo</label>
                <select name="Sexo" class="custom-select" required> 
                  <option selected value="">Elegir...*</option>
                  <option value="Femenino">Femenino</option>
                  <option value="Masculino">Masculino</option>
                </select>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label">Edad</label>
                <select name="Edad" class="custom-select" required>
                  <option selected value="">Elegir...*</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                  <option value="32">32</option>
                  <option value="33">33</option>
                  <option value="34">34</option>
                  <option value="35">35</option>
                  <option value="36">36</option>
                  <option value="37">37</option>
                  <option value="38">38</option>
                  <option value="39">39</option>
                  <option value="40">40</option>
                  <option value="41">41</option>
                  <option value="42">42</option>
                  <option value="43">43</option>
                  <option value="44">44</option>
                  <option value="45">45</option>
                  <option value="46">46</option>
                  <option value="47">47</option>
                  <option value="48">48</option>
                  <option value="49">49</option>
                  <option value="50">50</option>
                  <option value="51">51</option>
                  <option value="52">52</option>
                  <option value="53">53</option>
                  <option value="54">54</option>
                  <option value="55">55</option>
                  <option value="56">56</option>
                  <option value="57">57</option>
                  <option value="58">58</option>
                  <option value="59">59</option>
                  <option value="60">60</option>
                  <option value="61">61</option>
                  <option value="62">62</option>
                  <option value="63">63</option>
                  <option value="64">64</option>
                  <option value="65">65</option>
                </select>
            </div>
<br>
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continuar</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2021 UwUDP Company</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="info.php">Informacion</a></li>
    </ul>
  </footer>
</div>


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

      <script src="form-validation.js"></script>
  </body>
</html>