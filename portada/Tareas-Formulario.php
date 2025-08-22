<?php
session_start();
if (!isset($_SESSION['id_cuenta'])) { header("Location: Logueo.php"); exit(); }
$conexion = mysqli_connect("localhost", "root", "", "p25");
if (!$conexion) die("Error de conexión");
$id_cuenta = $_SESSION['id_cuenta'];
$id_clase = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id_clase <= 0) { echo "Clase no encontrada."; exit(); }

$sql = "SELECT clase.*, cuenta.usuario AS profesor, clase.id_profesor 
        FROM clase
        JOIN cuenta ON clase.id_profesor = cuenta.id_cuenta
        JOIN cuenta_has_clase chc ON clase.id_clase = chc.clase_id_clase
        WHERE clase.id_clase = '$id_clase' AND chc.cuenta_id_cuenta = '$id_cuenta'";
$res = mysqli_query($conexion, $sql);
$clase = mysqli_fetch_assoc($res);
if (!$clase) { echo "No tienes acceso a esta clase."; exit(); }
$soy_profesor = ($clase['id_profesor'] == $id_cuenta);


$sql_pub = "SELECT publicacion.id_publicacion, asunto AS titulo, contenido AS contenido, fecha, cuenta.usuario AS autor
            FROM publicacion
            JOIN cuenta ON publicacion.cuenta_id_cuenta = cuenta.id_cuenta
            WHERE publicacion.clase_id_clase = '$id_clase'
            ORDER BY publicacion.fecha DESC";
$res_pub = mysqli_query($conexion, $sql_pub);
$publicaciones = [];
while ($row = mysqli_fetch_assoc($res_pub)) {
    $publicaciones[] = $row;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Publicaciones - <?= htmlspecialchars($clase['nombre']); ?> - Nexa Classroom</title>
  <link rel="stylesheet" href="Clases.css">
  <style>
    .publicaciones-lista {
      display: flex;
      flex-direction: column;
      gap: 1.3rem;
      margin: 2.5rem auto;
      max-width: 700px;
    }
    .publicacion-card {
      background: var(--blanco, #fff);
      border-radius: 13px;
      box-shadow: 0 2px 6px rgba(50,115,255,0.08);
      padding: 1.2rem 1.7rem;
      display: flex;
      flex-direction: column;
      cursor: pointer;
      transition: box-shadow .2s, transform .2s;
      border-left: 6px solid var(--celeste, #5096ff);
      text-decoration: none;
    }
    .publicacion-card:hover {
      box-shadow: 0 4px 20px rgba(50,115,255,0.18);
      transform: translateY(-2px) scale(1.015);
      border-left: 8px solid var(--azul, #3273ff);
    }
    .publicacion-titulo {
      font-size: 1.15rem;
      font-weight: bold;
      color: var(--azul, #3273ff);
      margin-bottom: 0.1em;
    }
    .publicacion-info {
      font-size: 0.92rem;
      color: #888;
      margin-bottom: 0.25em;
    }
    .publicacion-contenido-preview {
      font-size: 1.02rem;
      color: #222;
      white-space: pre-line;
      overflow: hidden;
      text-overflow: ellipsis;
      max-height: 3.7em;
      margin-bottom: 0.18em;
    }
    .no-publicaciones {
      text-align: center;
      font-size: 1.15rem;
      color: #3d3d3d;
      background: #f3f7ff;
      border-radius: 16px;
      padding: 2.3em 1em;
      margin: 2.5em auto;
      max-width: 500px;
      box-shadow: 0 1px 7px rgba(50,115,255,0.06);
    }
    .crear-publicacion-btn {
      display: inline-block;
      background: var(--azul, #3273ff);
      color: #fff;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      padding: 0.7em 1.6em;
      font-size: 1.06rem;
      margin: 2.1em auto 0 auto;
      cursor: pointer;
      transition: background .2s, box-shadow .2s;
      box-shadow: 0 2px 7px rgba(50,115,255,0.07);
      text-decoration: none;
    }
    .crear-publicacion-btn:hover {
      background: var(--morado, #235bf5);
      box-shadow: 0 4px 12px rgba(35,91,245,0.12);
    }
    @media (max-width: 800px) {
      .publicaciones-lista { max-width: 98vw; }
      .no-publicaciones { max-width: 95vw; }
    }
  </style>
</head>
<body>
  <header>
    <h1>Nexa Classroom</h1>
    <button class="menu-toggle" type="button" onclick="toggleMenu()">☰</button>
  </header>
  <nav id="mainMenu">
    <a href="Clase-Formulario.php?id=<?= $id_clase ?>">Tablero</a>
    <a href="Tareas-Formulario.php?id=<?= $id_clase ?>">Publicaciones</a>
    <a href="#">Personas</a>
    <a href="#">Calificaciones</a>
    <a href="Pagina-Principal.php">Volver a cursos</a>
  </nav>
  <div class="hero">
    <span class="class-color <?= $clase['nombre'] ?>"></span>
    <span style="font-size:1.5rem;vertical-align:middle;"><?= htmlspecialchars($clase['nombre']) ?></span>
    <p><?= htmlspecialchars($clase['profesor']) ?></p>
  </div>
  <div class="container">
    <?php if ($soy_profesor): ?>
      <a href="Formulario-Crear-Publicacion.php?id=<?= $id_clase ?>" class="crear-publicacion-btn">+ Crear publicación</a>
    <?php endif; ?>
    <?php if (count($publicaciones) == 0): ?>
      <div class="no-publicaciones">
        No hay publicaciones aún para esta clase.
      </div>
    <?php else: ?>
      <div class="publicaciones-lista">
        <?php foreach($publicaciones as $pub): ?>
          <a href="Publicacion.php?id=<?= $pub['id_publicacion'] ?>" class="publicacion-card">
            <div class="publicacion-titulo"><?= htmlspecialchars($pub['titulo']) ?></div>
            <div class="publicacion-info">Por <?= htmlspecialchars($pub['autor']) ?> | <?= date("d/m/Y H:i", strtotime($pub['fecha'])) ?></div>
            <div class="publicacion-contenido-preview">
              <?= htmlspecialchars(mb_strimwidth($pub['contenido'], 0, 130, (mb_strlen($pub['contenido']) > 130 ? '...' : ''))) ?>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
  <footer>
    © 2025 Nexa Classroom. Todos los derechos reservados.
  </footer>
<script>
function toggleMenu() {
  var menu = document.getElementById('mainMenu');
  menu.classList.toggle('active');
}
</script>
</body>
</html>