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
                <a href="admin.php"><button type="button" class="btn btn-success">Administrador</button></a>
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
                  <a class="nav-link active" href="./pages/club.html">CLUB</a>
                </li>
                <li class="nav-item px-4">
                  <a class="nav-link active" href="../pages/socio.php">SOCIO</a>
                </li>
                <li class="nav-item px-4">
                  <a class="nav-link active" href="../pages/reserva-de-canchas.html">RESERVAS DE CANCHA</a>
                </li>
                <li class="nav-item px-4">
                  <a class="nav-link active" href="./pages/contacto.html">CONTACTO</a>
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

    <main>
        <h1 id="header" class="text-center mt-4"></h1>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Aquí va el formulario de reservas -->
                    <form class="row g-3 mt-3" name="nuevo socio" method="POST" autocomplete="off" action="../php/registro_reserva.php">  <!--aqui abre el form-->
                        <div class="col-md-2">
                            <p class="text-white"><strong>¿Sos socio?</strong></p>
                        </div>
                        <input type="hidden" name="deporte" id="deporte">
                        <div class="form-check col-md-1">
                            <input class="form-check-input" type="radio" name="radiosocio" id="flexRadioDefault1" value="si">
                            <label class="form-check-label" for="flexRadioDefault1">SI</label>
                        </div>
                        <div class="form-check col-md-1">
                            <input class="form-check-input" type="radio" name="radiosocio" id="flexRadioDefault2" value="no" checked>
                            <label class="form-check-label" for="flexRadioDefault2">NO</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="nrsocio" class="form-control input" id="nrsocio" placeholder="Nº">
                        </div>
                        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" pattern="[a-zA-Z\s]+" id="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="apellido" pattern="[a-zA-Z\s]+" id="apellido" placeholder="Apellido" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="tipo-de-documento" class="form-label">Tipo de documento</label>
                            <select name="tipo_documento" class="form-select" id="tipo-de-documento" aria-label="Default select example">
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
                            <select name="genero" class="form-select" id="sexo" aria-label="Default select example">
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
                        <div class="col-md-6 mt-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="correo" class="form-control" id="email" placeholder="Email" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="fecha-de-nacimiento" class="form-label">Fecha de nacimiento</label>
                            <input type="date" name="fecha_nac" class="form-control" id="fecha-de-nacimiento" required>
                        </div>
                        <!-- selector para diferentes deportes -->
                        <div class="col-md-4 mt-3" id="selectFutbol">
                            <label for="numero-cancha" class="form-label">Numero de cancha</label>
                            <select name="nrdecancha" class="form-select" aria-label="Default select example">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-3 d-none" id="selectSingle">
                            <label for="numero-cancha" class="form-label">Numero de cancha</label>
                            <select name="nrdecancha" class="form-select" aria-label="Default select example">
                                <option value="1" selected>1</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-3">
                        <label for="sexo" class="form-label">Horario inicio</label>
                            <select name="horario_inic" class="form-select" id="sexo" aria-label="Default select example">
                                <option value="7:00" selected>7:00</option>
                                <option value="8:00">8:00</option>
                                <option value="9:00">9:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                                <option value="18:00">18:00</option>
                                <option value="19:00">19:00</option>
                                <option value="20:00">20:00</option>
                                <option value="21:00">21:00</option>
                                <option value="22:00">22:00</option>
                                <option value="23:00">23:00</option>
                                
                                <?php
                                /*  require("../php/conexion.php");
                                    $sql="SELECT ID, Descripcion from genero" ;
                                    $resultado = $conexion->query($sql);
                                    while ($valores = mysqli_fetch_array($resultado)) {
                                        echo '<option value ="'.$valores['ID'].'">'.$valores['Descripcion'].'</option>';
                                    }   */
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 mt-3">
                        <label for="sexo" class="form-label">Horario final</label>
                            <select name="horario_fin" class="form-select" id="sexo" aria-label="Default select example">
                                <option value="8:00" selected>8:00</option>
                                <option value="9:00">9:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                                <option value="18:00">18:00</option>
                                <option value="19:00">19:00</option>
                                <option value="20:00">20:00</option>
                                <option value="21:00">21:00</option>
                                <option value="22:00">22:00</option>
                                <option value="23:00">23:00</option>
                                <option value="00:00">00:00</option>
                                
                                <?php
                                /*  require("../php/conexion.php");
                                    $sql="SELECT ID, Descripcion from genero" ;
                                    $resultado = $conexion->query($sql);
                                    while ($valores = mysqli_fetch_array($resultado)) {
                                        echo '<option value ="'.$valores['ID'].'">'.$valores['Descripcion'].'</option>';
                                    }   */
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="fecha-de-nacimiento" class="form-label">Dia de reserva</label>
                            <input type="date" name="fecha_rese" class="form-control" id="fecha-de-nacimiento" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" name="telefono" pattern="[0-9]+" class="form-control" id="telefono" placeholder="Teléfono" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="direccion" class="form-label">Localidad</label>
                            <input type="text" name="localidad" pattern="[a-zA-Z\s]+" class="form-control" id="direccion" placeholder="Localidad" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="direccion" class="form-label">Calle</label>
                            <input type="text" name="calle" pattern="[a-zA-Z\s]+" class="form-control" id="direccionca" placeholder="Nombre de calle o Av" required>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="direccion" class="form-label">Altura</label>
                            <input type="text" name="altura" pattern="[0-9]+" class="form-control" id="direccionalt" placeholder="Altura" required>
                        </div>
                        <div class="row mt-4 justify-content-center">
                            <div class="col-auto">
                                <input type="submit" name="reservar" class="btn btn-success" value="Reservar">
                            </div>
                            <div class="col-auto">
                                <input type="reset" name="cancelar_reserva" class="btn btn-danger" value="Cancelar">
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
    </main>
        <!--aqui va el script de buscar datos del socio-->
    <script>
            $(document).ready(function(){
                $('#nrsocio').on('input', function(){
                    var nrsocio = $(this).val();
                    if(nrsocio.length > 0){
                        $.ajax({
                            url: '../php/buscar_datos.php',
                            method: 'GET',
                            data: {nrsocio: nrsocio},
                            dataType: 'json',
                            success: function(data){
                                if (data && Object.keys(data).length > 0) {
                                    $('#nombre').val(data.Nombre);
                                    $('#apellido').val(data.Apellido);
                                    $('#tipo-de-documento').val(data.id_tipo_de_documento);
                                    $('#numero').val(data.Numero_Documento);
                                    $('#sexo').val(data.id_genero);
                                    $('#email').val(data.Email);
                                    $('#fecha-de-nacimiento').val(data.fecha_nac);
                                    $('#telefono').val(data.telefono);
                                    $('#direccion').val(data.Localidad);
                                    $('#direccionca').val(data.Calle);
                                    $('#direccionalt').val(data.Altura);
                                    
                                } 
                                else {
                                    $('#nombre').val('');
                                    $('#apellido').val('');
                                    $('#tipo-de-documento').val('');
                                    $('#numero').val('');
                                    $('#sexo').val('');
                                    $('#email').val('');
                                    $('#fecha-de-nacimiento').val('');
                                    $('#telefono').val('');
                                    $('#direccion').val('');
                                    $('#direccionca').val('');
                                    $('#direccionalt').val('');
                                }
                            }
                        });

                    } else {
                            $('#nombre').val('');
                            $('#apellido').val('');
                            $('#tipo-de-documento').val('');
                            $('#numero').val('');
                            $('#sexo').val('');
                            $('#email').val('');
                            $('#fecha-de-nacimiento').val('');
                            $('#telefono').val('');
                            $('#direccion').val('');
                            $('#direccionca').val('');
                            $('#direccionalt').val('');
                        }
                });
            });
        </script>
   
    <script>
        // Función para obtener el valor del parámetro 'deporte' de la URL
        function getDeporteFromURL() {
            const params = new URLSearchParams(window.location.search);
            return params.get('deporte');
        }

            // Función para actualizar el título de la página con el nombre del deporte
        function actualizarTituloDeporte() {
            const deporte = getDeporteFromURL();
            if (deporte) {
                const header = document.getElementById('header');
                header.textContent = deporte.toUpperCase();

                // Mapear el nombre del deporte al ID correspondiente
                const deporteMap = {
                    "futbol": 1,
                    "voley": 2,
                    "hockey": 3,
                    "basquet": 4,
                };

                // Asignar el valor del ID del deporte al campo oculto
                const deporteInput = document.getElementById('deporte');
                deporteInput.value = deporteMap[deporte.toLowerCase()];
            }
        }

        // Función para habilitar o deshabilitar el input de número de socio
        function toggleNrsocioInput() {
            const radioSi = document.getElementById('flexRadioDefault1');
            const radioNo = document.getElementById('flexRadioDefault2');
            const nrsocioInput = document.getElementById('nrsocio');

            if (radioSi.checked) {
                nrsocioInput.disabled = false;
            } 
            else if (radioNo.checked) {
                nrsocioInput.disabled = true;
                nrsocioInput.value = '';
            }
        }

        // Agregar event listeners a los botones de radio
        document.getElementById('flexRadioDefault1').addEventListener('change', toggleNrsocioInput);
        document.getElementById('flexRadioDefault2').addEventListener('change', toggleNrsocioInput);

        // Llamar a la función para actualizar el título al cargar la página
        window.onload = function() {
            actualizarTituloDeporte();
            toggleNrsocioInput();
        };

        // Obtener parámetros de la URL
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const deporte = urlParams.get('deporte');
        document.getElementById('header').innerText = deporte;
        document.getElementById('deporte').value = deporte;

        // Mostrar/ocultar selectores basados en el deporte
        const selectFutbol = document.getElementById('selectFutbol');
        const selectSingle = document.getElementById('selectSingle');

        if (deporte.toLowerCase() === 'futbol') {
            selectFutbol.classList.remove('d-none');
            selectSingle.classList.add('d-none');
        } else {
            selectFutbol.classList.add('d-none');
            selectSingle.classList.remove('d-none');
        }

        // Habilitar/Deshabilitar campo de número de socio
        const radioSocioSi = document.getElementById('flexRadioDefault1');
        const radioSocioNo = document.getElementById('flexRadioDefault2');
        const nrSocioInput = document.getElementById('nrsocio');

        radioSocioSi.addEventListener('change', () => {
            nrSocioInput.disabled = !radioSocioSi.checked;
        });

        radioSocioNo.addEventListener('change', () => {
            nrSocioInput.disabled = radioSocioNo.checked;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzG6LR1Knn8eJ2z9ndiN8QwI1xzC1H6wXH7xR6A9dakt" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-qljovkHYa/Q5PoF6NHTQQ1/2e6bJVjy3Eds5DZjw+grc5mrbLU5S8e1moP6KTKP6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>