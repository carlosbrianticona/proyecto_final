<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLUB SOCIAL Y DEPORTIVO SAN CARLOS</title>
    <script src="https://kit.fontawesome.com/bfbcf1faa2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="conteiner">
            <div class="inicio px-4">
                <a href="../index.html">
                    <img src="../img/1.png" alt="emblema" class="img">
                </a>
                <h4 class="texto">CLUB SOCIAL Y DEPORTIVO SAN CARLOS</h4>
            </div>
            <nav>
                <ul class="nav-link">
                    <li><a href="#">TIENDA</a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                </ul>
            </nav>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="../pages/admin.php"><button type="button" class="btn btn-success">Administrador</button></a>
                <select name="idioma" id="idioma">
                    <option value="español">Español</option>
                    <option value="ingles">Ingles</option>
                    <option value="otros idiomas">Otros idiomas...</option>
                </select> 
          </div>
        </div>
        <nav class="navbar navbar-expand-lg bg-success navbar-dark">

            <div class="container">
            <div class="collapse navbar-collapse">
        
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item px-4">
                    <a class="nav-link active" href="../pages/club.html">CLUB</a>
                </li>
                <li class="nav-item px-4">
                    <a class="nav-link active" href="../pages/socio.php">SOCIO</a>
                </li>
                <li class="nav-item px-4">
                    <a class="nav-link active" href="../pages/reserva-de-canchas.html">RESERVAS DE CANCHA</a>
                </li>
                <li class="nav-item px-4">
                    <a class="nav-link active" href="../pages/contacto.html">CONTACTO</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">DEPORTES</a>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="dropdown-item">Futbol</a></li>
                        <li><a href="#" class="dropdown-item">Voley</a></li>
                        <li><a href="#" class="dropdown-item">Basquet</a></li>
                        <li><a href="#" class="dropdown-item">Natacion</a></li>
                        <li><a href="#" class="dropdown-item">Hockey</a></li>
                    </ul>
                </li>
                </ul>
            </div>
            
            </div>
        </nav>
    </header>
    <section>
        <h2 class="text-center p-4 text-white">Hacete socio y se parte de nuestra familia</h2>
    </section>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-4">
                            <p class="text-white">Por favor completa los datos <strong>:</strong></p>
                        </div>
                    </div>
                    <form class="row g-3 mt-3" name="nuevo socio" method="POST" autocomplete="off" action="../php/registro_ing_socio.php">  <!--aqui abre el form-->
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombresocio" pattern="[a-zA-Z\s]+" id="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="apellidosocio" pattern="[a-zA-Z\s]+" id="apellido" placeholder="Apellido" required>
                        </div>  
                            <div class="col-md-4 mt-3">
                                <label for="tipo-de-documento" class="form-label">Tipo de documento</label>
                                <select  name="tipo_documento" class="form-select" id="tipo-de-documento" aria-label="Default select example">
                                    <?php
                                        require("../php/conexion.php");
                                        $sql="SELECT ID, Descripcion from tipo_documento" ;
                                        $resultado = $conexion->query($sql);
                                        while ($valores = mysqli_fetch_array($resultado)) {
                                            echo '<option value ="'.$valores['ID'].'">'.$valores['Descripcion'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="numero" class="form-label">Número</label>
                                <input type="text" name="nr_documento" pattern="[0-9]+" class="form-control" id="numero" placeholder="Nº" required>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="sexo" class="form-label">Sexo</label>
                                <select  name="genero" class="form-select" id="sexo" aria-label="Default select example">
                                     <?php
                                        require("../php/conexion.php");
                                        $sql="SELECT ID, Descripcion from genero" ;
                                        $resultado = $conexion->query($sql);
                                        while ($valores = mysqli_fetch_array($resultado)) {
                                            echo '<option value ="'.$valores['ID'].'">'.$valores['Descripcion'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="correo" class="form-control" id="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="fecha-de-nacimiento" class="form-label">Fecha de nacimiento</label>
                            <input type="date" name="fecha_nac" class="form-control" id="fecha-de-nacimiento" required>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" name="telefono" pattern="[0-9]+" class="form-control" id="telefono" placeholder="Teléfono" required>
                        </div>
                        <div class="col-md-6">
                            <label for="direccion" class="form-label">Localidad</label>
                            <input type="text" name="localidad" pattern="[a-zA-Z\s]+" class="form-control" id="direccion"  placeholder="Localidad" required>
                        </div>
                        <div class="col-md-6">
                            <label for="direccion" class="form-label">Calle</label>
                            <input type="text" name="calle" pattern="[a-zA-Z\s]+" class="form-control" id="direccion"  placeholder="Nombre de calle o Av" required>
                        </div>
                        <div class="col-md-6">
                            <label for="direccion" class="form-label">Altura</label>
                            <input type="text" name="altura" pattern="[0-9]+" class="form-control" id="direccion"  placeholder="Altura" required>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <div class="col-auto">
                                <input type="submit" name="registrar" class="btn btn-success" value="Aceptar">
                            </div>
                            <div class="col-auto">
                                <input type="reset" name="cancelar_regist" class="btn btn-danger" value="Cancelar">
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>