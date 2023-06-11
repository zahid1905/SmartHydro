<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="navbar text-bg-primary navbar-expand-lg bg-black" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.html">
                  <img src="../img/logo.svg" alt="Logo" width="40" height="34" class="d-inline-block align-text-top">
                  SmartHydro Lab
                </a>
                <button class="navbar-toggler " style="color: black" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon "></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <div class="d-grid gap-3 d-lg-block justify-content-center d-xl-flex justify-content-xl-end ms-auto">
                    <button class="btn btn-outline-success text-light border-0" style="width: 120px" type="button" onclick="window.location.href='../index.html'">Inicio</button>
                    <button class="btn btn-outline-success text-light border-0" style="width: 120px" type="button" onclick="window.location.href='./planes.html'">Regístrate</button>
                    <button class="btn btn-outline-success text-light border-0" style="width: 120px" type="button" onclick="window.location.href='./acerca_de.html'">Acerca de</button>
                    <button class="btn btn-outline-success text-light border-0 active" style="width: 120px" type="button" onclick="window.location.href='./login.html'">Cerrar sesión</button>
                  </div>
                </div>
              </div>
        </nav> 
    </header>
    <main>
      <div class="container">
        <div class="card-title p-2 m-3">
          <div class="row">
            <div class="col-3">
              <h class="h4">Cultivos</h>
              <hr class="border border-success opacity-100 border-3  rounded-2">
            </div>
          </div>
        </div>
        <div class="card p-3 border-0 rounded-4 m-3 ps-5 ms-5">
          <div class="row justify-content-evenly">

          <!--planta 1-->
            <div class="col">
              <div class="card text-center border-success rounded-3 border-2 m-2" style="max-width: 9rem;">
                <div class="card-header bg-success border-0 p-0">
                  <p class="fs-5 fw-medium text-light">Planta 1</p>
                </div>
                <div class="card-body">
                  <img class="d-inline-block align-text-top" src="../img/snesor.png" alt="Logo" width="50" height="40"/>
                </div>
                <div class="card-footer bg-success">
                  <button type="button" id="abir_bomba1" class="btn btn-outline-light ps-3 pe-3"  onclick="window.location.href='./dashboard-1.php'">
                    Abrir
                  </button>
                </div>      
              </div>
            </div>  

            <!---planta 2-->
            <div class="col">
              <div class="card text-center border-success rounded-3 border-2 m-2" style="max-width: 9rem;">
                <div class="card-header bg-success border-0 p-0">
                  <p class="fs-5 fw-medium text-light">Planta 2</p>
                </div>
                <div class="card-body">
                  <img class="d-inline-block align-text-top" src="../img/snesor.png" alt="Logo" width="50" height="40"/>
                </div>
                <div class="card-footer bg-success">
                  <button type="button" id="abir_bomba1" class="btn btn-outline-light ps-3 pe-3"  onclick="window.location.href='./dashboard-2.php'">
                    Abrir
                  </button>
                </div>      
              </div>
            </div> 

            <!---planta 2-->
            <div class="col">
              <div class="card text-center border-success rounded-3 border-2 m-2" style="max-width: 9rem;">
                <div class="card-header bg-success border-0 p-0">
                  <p class="fs-5 fw-medium text-light">Planta 3</p>
                </div>
                <div class="card-body">
                  <img class="d-inline-block align-text-top" src="../img/snesor.png" alt="Logo" width="50" height="40"/>
                </div>
                <div class="card-footer bg-success">
                  <button type="button" id="abir_bomba1" class="btn btn-outline-light ps-3 pe-3"  onclick="no_definido()">
                    Abrir
                  </button>
                </div>      
              </div>
            </div>

            <!---planta 2-->
            <div class="col">
              <div class="card text-center border-success rounded-3 border-2 m-2" style="max-width: 9rem;">
                <div class="card-header bg-success border-0 p-0">
                  <p class="fs-5 fw-medium text-light">Planta 4</p>
                </div>
                <div class="card-body">
                  <img class="d-inline-block align-text-top" src="../img/snesor.png" alt="Logo" width="50" height="40"/>
                </div>
                <div class="card-footer bg-success">
                  <button type="button" id="abir_bomba1" class="btn btn-outline-light ps-3 pe-3"  onclick="no_definido()">
                    Abrir
                  </button>
                </div>      
              </div>
            </div>
          </div>
        </div>
        <div class="card-title m-2">
          <div class="row">
            <div class="col-3">
              <h class="h4">Estimaciones</h>
              <hr class="border border-success opacity-100 border-3  rounded-2">
            </div>
          </div>
        </div>
        <div class="row row-cols-2 justify-content-evenly m-4">
          <div class="col">
            <div class="card border-success">
              <div class="fw-medium card-header text-light bg-success text-center">Agua requerida</div>
              <div class="card m-2 p-2"><canvas id="myChart"></canvas></div>
            </div>
          </div>
        </div>
      </div>
    </main>

    
    <footer>
      <div class="container-fluid text-bg-primary">
        <div class="row bg-black">
          <div class="col-6">
            <div class="row offset-1">
                <div class="col-6" style="font-size: 20px">
                  SmartHydro Lab®
                </div>
                <div class="w-100"></div>
                <div class="col-7">
                  <p class>
                    Av. de las Ciencias #5055, El carrizal, Querétaro, Qro.</br>
                    Tel: +52 4427854 123</br>
                    e-mail: smarthydro.labs@smarthydro.com</br>
                </div>
            </div>
          </div>
          <div class="col-3 offset-3">
              <p style="font-size: 20px">Encuentranos en:</p>
              <div class="row">
                <div class="col-auto">
                  <a href="http://www.facebook.com" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook text-success" viewBox="0 0 16 16">
                      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg>
                  </a>
                </div>
                <div class="col-auto">
                  <a href="http://www.instagram.com" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-instagram text-success" viewBox="0 0 16 16">
                      <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                  </a>
                </div>
                <div class="col-auto">
                  <a href="https://mx.linkedin.com/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-linkedin text-success" viewBox="0 0 16 16">
                      <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                    </svg>
                  </a>
                </div>
                <div class="col-auto">
                  <a href="http://www.tiktok.com" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-tiktok text-success" viewBox="0 0 16 16">
                      <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
                    </svg>
                  </a>
                </div>
                <div class="col-auto">
                  <a href="https://wa.link/8kngzm" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-whatsapp text-success" viewBox="0 0 16 16">
                      <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                    </svg>
                  </a>
                </div>
                <div class="col-auto">
                  <a href="mailto:smarthydro.labs@smarthydro.com?Subject=Quiero%20adquirir%20sus%20servicios" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope-at-fill text-success" viewBox="0 0 16 16">
                      <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z"/>
                      <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z"/>
                    </svg>
                  </a>
                </div>
              </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="../js/estados-actuadores.js"></script>
    <script src="../js/grafica_agua.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>