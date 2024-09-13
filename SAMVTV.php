<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SAMVTV - E.P.E.T. N°5</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
       <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-dark bg-dark">
            <h1 class="navbar-brand ps-3">Sistema Automatizado de Mensajería de la Verificación Técnica Vehícular</h1>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                <br>
                <br>
<?php
include("php/conection.php");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$query = "SELECT verificaciones.fecha, verificaciones.patente, clientes.nombre, clientes.num_tel, clientes.email 
          FROM verificaciones 
          INNER JOIN clientes ON verificaciones.id_cliente = clientes.id";
$result = mysqli_query($conexion, $query);
if ($result->num_rows > 0) {
    echo "<table class='table-pc'>";
    echo "<thead><tr><th>Fecha</th><th>Patente</th><th>Nombre</th><th>Número de Teléfono</th><th>Email</th></tr></thead>";
    echo "<tbody>";
    while ($fila = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila["fecha"]) . "</td>";
        echo "<td>" . htmlspecialchars($fila["patente"]) . "</td>";
        echo "<td>" . htmlspecialchars($fila["nombre"]) . "</td>";
        echo "<td>" . htmlspecialchars($fila["num_tel"]) . "</td>";
        echo "<td>" . htmlspecialchars($fila["email"]) . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No se encontraron resultados";
}
$conexion->close();
?>
                        <div class="panel bg-panel">
                            <form class="horizontal-form">
                                <div class="form-group">
                                    <label for="date">Fecha:</label>
                                    <input type="date" id="date" name="date" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="patente">Patente:</label>
                                    <input type="text" id="patente" name="patente" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <input type="text" id="name" name="name" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="tel" id="telefono" name="telefono" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="email">Correo Electrónico:</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                                <br>
                                <div class="form-group submit-group">
                                    <button type="submit">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
