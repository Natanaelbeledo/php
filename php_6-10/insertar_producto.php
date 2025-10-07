<?php
$host = "localhost";
$user = "root";
$password = "root";
$dbname = "lecasabe_conexionprueba";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = floatval($_POST['precio']);
    $descripcion = $_POST['descripcion'];

    if (strlen($descripcion) > 255) {
        $descripcion = substr($descripcion, 0, 255);
    }

    $stmt = $conn->prepare("INSERT INTO producto (nombre, precio, descripcion) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $nombre, $precio, $descripcion);

    if ($stmt->execute()) {
        $mensaje = "Producto insertado correctamente.";
    } else {
        $mensaje = "Error al insertar: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Formulario de Producto</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    form { max-width: 400px; margin: auto; }
    label { display: block; margin-top: 15px; margin-bottom: 5px; font-weight: bold; }
    input[type="text"], input[type="number"], textarea { width: 100%; padding: 8px; box-sizing: border-box; }
    .botones { margin-top: 20px; display: flex; justify-content: space-between; }
    button { padding: 10px 20px; font-size: 16px; }
    .cancelar { background-color: #ccc; border: none; }
    .guardar { background-color: #4CAF50; color: white; border: none; }
    .mensaje { max-width: 400px; margin: 20px auto; padding: 10px; background-color: #e7f3fe; border: 1px solid #2196F3; color: #0b4f8a; }
  </style>
</head>
<body>

  <h2>Formulario de Producto</h2>

  <?php if ($mensaje): ?>
    <div class="mensaje"><?php echo htmlspecialchars($mensaje); ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required />

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" step="0.01" required />

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" rows="4" maxlength="255" required></textarea>

    <div class="botones">
      <button type="reset" class="cancelar">Cancelar</button>
      <button type="submit" class="guardar">Guardar</button>
    </div>
  </form>

</body>
</html>