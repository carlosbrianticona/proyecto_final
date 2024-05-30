<?php
include("../php/conexion.php");
include("../php/validarsesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLUB SOCIAL Y DEPORTIVO SAN CARLOS</title>
    <script src="https://kit.fontawesome.com/bfbcf1faa2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/admin.css">
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
        <div class= " d-md-flex justify-content-md-end">
            <i class="fa-solid fa-user icono"></i>   
            <a class="btn btn-success" href="../php/cerrarsesion.php">Cerrar sesion</a>
        </div>
    </div>
    </header> 
<main>
    <div class="d-flex justify-content-center posicion-buscar">
        <label class="texto-dni" for="nombre">DNI:</label>
	    <input type="text" name= "nombre" id= "nombre" placeholder="Nº de DNI">
        <button type="button" class="btn btn-success btn-buscar">Buscar</button>
    </div>

    <div class="container">
        <form class="row g-3 mt-3">
            <div class="col-1">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="intInput" placeholder="Nº">
            </div>
            <div class="col-3">
                <label for="dni" class="form-label">Nº Documento</label>
                <input type="text" class="form-control" id="intInput" placeholder="Nº de DNI">
            </div>
            <div class="col-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="charInput" placeholder="Apellido">
            </div>
            <div class="col-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="charInput" placeholder="Nombre">
            </div>
            <div class="col-2">
                <label for="socio" class="form-label">Nº de socio</label>
                <input type="text" class="form-control" id="intInput" placeholder="Nº de socio">
            </div>
            <div class="col-1">
                <label for="actividad" class="form-label">Activo s/n</label>
                <input type="text" class="form-control" id="charInput" placeholder="s/n">
            </div>
            <div class="col-2">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="intInput" placeholder="Telefono">
            </div>
            <div class="col-2">
                <label for="fecha-de-nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="intInput">
            </div>
            <div class="col-2">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-control" name="sexo" id="sexo">
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select> 
            </div>
            <div class="col-2">
                <label for="direccion" class="form-label">Direccion</label>
                <input type="text" class="form-control" id="charInput" placeholder="Direccion">
            </div>
            <div class="col-2">
                <label for="id-de-reserva" class="form-label">ID de reserva</label>
                <input type="text" class="form-control" id="intInput" placeholder="ID de reserva">
            </div>

            <button type="button" class="btn btn-success col-2 btn-guardar-cambios mt-5">Guardar cambios</button>
        </form>
        
    </div>
    <div class="container">
        <h3>DEPORTE</h3>
        <form class="row g-3 mb-3">
            <div class="col-2">
                <label for="id" class="form-label">ID-Deporte</label>
                <input type="text" class="form-control" id="intInput" placeholder="Nº">
            </div>
            <div class="col-1">
                <label for="actividad" class="form-label">Activo s/n</label>
                <input type="text" class="form-control" id="charInput" placeholder="S/N">
            </div>
            <button type="button" class="btn btn-success col-2 mt-5">Guardar cambios</button>
        </form>
    </div>
    <div class="container">
        <h3 class="mt-4">DEPORTE-CANCHA-HORA</h3>
        <form class="row g-3 mb-3">
            <div class="col-2">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="intInput" placeholder="Nº">
            </div>
            <div class="col-1">
                <label for="actividad" class="form-label">Activo s/n</label>
                <input type="text" class="form-control" id="charInput" placeholder="S/N">
            </div>
            <button type="button" class="btn btn-success col-2 mt-5">Buscar</button>
        </form>
    </div>
    <div class="container mb-5">
        <h3 class="mt-4">RESERVA</h3>
        <form class="row g-3 mb-3">
            <div class="col-1">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="intInput" placeholder="Nº">
            </div>
            <button type="button" class="btn btn-success col-1 mt-5">Buscar</button>
        </form>
        <form class="row g-3">
        <div class="col-1">
            <label for="actividad" class="form-label">Activo s/n</label>
            <input type="text" class="form-control" id="charInput" placeholder="S/N">
        </div>
        <div class="col-2">
            <label for="id-persona" class="form-label">ID-Persona</label>
            <input type="text" class="form-control" id="charInput" placeholder="Nº">
        </div>
        <div class="col-3">
            <label for="id-deporte-cancha-hora" class="form-label">ID-Deporte-Cancha-Hora</label>
            <input type="text" class="form-control" id="charInput" placeholder="Nº">
        </div>
        <div class="col-2">
            <label for="fecha-de-reserva" class="form-label">Fecha-de-Reserva</label>
            <input type="date" class="form-control">
        </div>
        <div class="col-2">
            <label for="abono-reserva" class="form-label">Abono-Reserva</label>
            <input type="text" class="form-control" id="intInput" placeholder="$">
        </div>
        <button type="button" class="btn btn-success col-2 mt-5">Guarda cambios</button>
    </div>
    </form>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>