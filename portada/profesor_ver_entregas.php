<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "p25");

$id_profesor = $_SESSION['id_cuenta'];
$id_tarea = isset($_GET['id_tarea']) ? intval($_GET['id_tarea']) : 0;

$tarea = mysqli_fetch_assoc($resT);

$resEst = mysqli_query($conexion, $sqlEst);
$estudiantes = [];

$sqlEnt = "SELECT * FROM entrega WHERE tarea_id_tarea='$id_tarea'";
$resEnt = mysqli_query($conexion, $sqlEnt);
$entregas = [];

$exts = ["pdf", "jpg", "jpeg", "png", "gif", "webp", "docx", "xlsx", "txt", "zip"];
$dir = "./media/";

include "cabecera.php";
?>
<style>
#contenedor-tarea-entregas {
    max-width: 1240px;
    width: 94%;
    margin: 28px auto 0 auto;
    padding: 0 0 0 0;
    box-sizing: border-box;
}
#bloque-resumen-titulo {
    width: 100%;
    margin: 0;
    margin-bottom: 0;
    padding: 0;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    position: relative;
}

#titulo-tarea-entregas {
    font-size: 2.7rem;
    font-family: Arial, sans-serif;
    color: #43207c;
    font-weight: bold;
    margin: 0 0 8px 0;
    letter-spacing: 0.5px;
    word-break: break-word;
    line-height: 1.12;
    text-align: left;
    display: block;
}

#fila-cajas-boton {
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 0;
    gap: 8px;
}

#contenedor-cajas-resumen {
    display: flex;
    flex-direction: row;
    gap: 18px;
}
.caja-resumen {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 2px 8px #0002;
    border: 2px solid #d8d7e6;
    min-width: 140px;
    min-height: 70px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 16px 24px 14px 24px;
    transition: box-shadow 0.19s;
}
.caja-resumen h3 {
    font-size: 1.17rem;
    color: #5c5959;
    font-family: Arial;
    font-weight: 700;
    margin: 0 0 8px 0;
}
.caja-resumen .numero {
    font-size: 2.4rem;
    color: #583d9c;
    font-family: Arial Black, Arial, sans-serif;
    font-weight: bold;
    margin: 0;
    line-height: 1;
}
.btn-volver {
  background:#3c328f;
  color:#fff;
  padding:10px 26px;
  border:none;
  border-radius:10px;
  text-decoration:none;
  font-size:17px;
  display:inline-block;
  min-width: 0;
  text-align: center;
  font-family: inherit;
  font-weight: bold;
  transition: background 0.18s;
  box-shadow: 0 2px 8px #0001;
  z-index: 2;
  align-self: flex-end;
  margin-left: 24px;
}
.btn-volver:hover { background:#5743c6; }

@media (max-width: 1300px){
    #contenedor-tarea-entregas { max-width: 99vw; width: 99vw; }
}
@media (max-width: 900px){
    #contenedor-tarea-entregas { width: 99vw; }
    #titulo-tarea-entregas { font-size: 1.45rem; }
    #contenedor-cajas-resumen { gap: 10px; }
    .caja-resumen { min-width: 90px; font-size: 13px; padding: 8px 7px 7px 7px;}
    .btn-volver { font-size: 15px; padding:7px 11px; }
}
@media (max-width: 650px){
    #contenedor-tarea-entregas { width: 100vw; padding: 0;}
    #fila-cajas-boton { flex-direction: column; align-items: stretch; gap: 8px;}
    .btn-volver { margin-left: 0; margin-top: 13px;}
}

#caja-tareas-estudiantes {
    width: 100%;
    margin: 18px auto 60px auto;
    display: flex;
    flex-wrap: wrap;
    gap: 40px 20px;
    justify-content: flex-start;
    align-items: flex-start;
    min-height: 120px;
    box-sizing: border-box;
}

.tarjeta_estudiante{
    background: rgb(220, 221, 222);
    border: 2px solid #949393;
    border-radius: 18px;
    min-height: 300px;
    max-width: 260px;
    width: 100%;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    position: relative;
    transition: box-shadow 0.18s;
    padding: 13px 10px 13px 10px;
    gap: 4px;
    margin: 0;
    flex: 0 1 220px;
}
.cajita_let{
    width: 30px;
    height: 30px;
    padding: 2px;
    background-color:rgb(127, 80, 230) ;
    color: #f9f9f9;
    border-radius: 50%;
    font-family: arial;
    font-size: 1.3rem;
    margin-left: 2px;
    margin-top: 2px;
    margin-bottom: 0px;
    cursor: pointer;
    font-weight: bold;
    border:none;
    display: inline-block;
    text-align: center;
    box-shadow: 0 1px 6px #aaa1;
    vertical-align: middle;
}
.nom_estudiante{
  margin-left: 40px;
  margin-top: -27px;
  font-family: arial;
  font-size: 1.09rem;
  color: #524f4f;
  font-weight: bold;
  margin-bottom: 2px;
  vertical-align: middle;
  line-height: 1.1;
}
.espacio_archivo{
  margin-left: 40px;
  margin-top: 3px;
  background: #fff;
  border: 1.5px solid #949393;
  border-radius: 10px;
  min-height: 18px;
  min-width: 60px;
  padding: 3px 6px;
  font-size: 0.98rem;
  color: #583d9c;
  display: inline-block;
  box-shadow: 0 1px 4px #aaa1;
}
.num_archivos{
  margin-left: 40px;
  font-family: arial;
  font-size: 0.93rem;
  color: #524f4f;
  margin-top: 2px;
  line-height: 1;
}
.dato_entregado{
  margin-left: 40px;
  font-family: arial;
  font-size: 0.93rem;
  color:  #25a41cff;
  margin-top: 2px;
  font-weight: bold;
  line-height: 1;
}
.dato_noentregado{
  margin-left: 40px;
  font-family: arial;
  font-size: 0.93rem;
  color: #b00;
  margin-top: 2px;
  font-weight: bold;
  line-height: 1;
}
.nota_box{
  margin-left: 40px;
  margin-top: 4px;
  font-size: 0.98rem;
  color: #3c328f;
  font-family: arial;
  font-weight: bold;
  display: flex;
  align-items: center;
  gap:7px;
  line-height: 1;
}
.btn-asignar {
  background: #2196f3;
  color: #fff;
  border: none;
  border-radius: 7px;
  padding: 2px 8px;
  font-size: 0.93rem;
  cursor: pointer;
  text-decoration: none;
  margin-left: 0;
  transition: background 0.18s;
}
.btn-asignar:hover { background:#1976d2; }
</style>

<div id="contenedor-tarea-entregas">
    <div id="bloque-resumen-titulo">
        <div id="titulo-tarea-entregas"><?= htmlspecialchars($tarea['titulo']) ?></div>
        <div id="fila-cajas-boton">
            <div id="contenedor-cajas-resumen">
              <?php
                $total_estudiantes = count($estudiantes);
                $total_entregados = 0;
                $total_evaluados = 0;
                }
              ?>
              <div class="caja-resumen">
                <h3>Entregado</h3>
                <div class="numero"><?= $total_entregados ?></div>
              </div>
              <div class="caja-resumen">
                <h3>Asignado</h3>
                <div class="numero"><?= $total_estudiantes ?></div>
              </div>
              <div class="caja-resumen">
                <h3>Evaluado</h3>
                <div class="numero"><?= $total_evaluados ?></div>
              </div>
            </div>
            <a class="btn-volver" href="tareas-formulario.php?id=<?= urlencode($id_clase) ?>">&larr; Tareas</a>
        </div>
    </div>
    <main id="caja-tareas-estudiantes">
        $id_est = $est['id_cuenta'];
        $entrego = isset($entregas[$id_est]) ? $entregas[$id_est] : null;
        $archivo = null;
<<<<<<< HEAD
        if ($entrego) {
          // ✅ corregido: $id_tareas (con "s")
          $nombreBase = "Entrega-$id_est-$id_tarea";
          foreach ($exts as $e) {
            if (file_exists($dir . $nombreBase . "." . $e)) {
              $archivo = $dir . $nombreBase . "." . $e;
              break;
            }
        }
      ?>
      <section class="tarjeta_estudiante">
        <button class="cajita_let"><?= strtoupper(substr(trim($est['usuario']),0,1)) ?></button>
        <p class="nom_estudiante"><?= htmlspecialchars($est['usuario']) ?></p>
        <div class="espacio_archivo">
              $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
              }
              <span style="color:#b00;">Sin archivo</span>
        </div>
        <p class="num_archivos">
          <?= $archivo ? "1 archivo adjunto" : "0 archivos adjuntos" ?>
        </p>
          <p class="dato_entregado">Entregó</p>
          <p class="dato_noentregado">No entregó</p>
        <div class="nota_box">
          <?php if ($entrego): ?>
            <?php if (is_null($entrego['nota'])): ?>
              <!-- ✅ corregido: id_tareas -->
              <a class="btn-asignar" href="profesor_calificar.php?id_entrega=<?= urlencode($entrego['id_entrega']) ?>&id_tarea=<?= urlencode($id_tarea) ?>">Asignar</a>
            <?php else: ?>
              Nota: <?= htmlspecialchars($entrego['nota']) ?>
            Nota: -
        </div>
        <div style="height:1px;"></div>
      </section>
      <?php endforeach; ?>
    </main>
</div>

<style>
#contenedor-tarea-entregas {
    max-width: 1240px;
    width: 94%;
    margin: 28px auto 0 auto;
    padding: 0 0 0 0;
    box-sizing: border-box;
}
#bloque-resumen-titulo {
    width: 100%;
    margin: 0;
    margin-bottom: 0;
    padding: 0;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    position: relative;
}

#titulo-tarea-entregas {
    font-size: 2.7rem;
    font-family: Arial, sans-serif;
    color: #43207c;
    font-weight: bold;
    margin: 0 0 8px 0;
    letter-spacing: 0.5px;
    word-break: break-word;
    line-height: 1.12;
    text-align: left;
    display: block;
}

#fila-cajas-boton {
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 0;
    gap: 8px;
}

#contenedor-cajas-resumen {
    display: flex;
    flex-direction: row;
    gap: 18px;
}
.caja-resumen {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 2px 8px #0002;
    border: 2px solid #d8d7e6;
    min-width: 140px;
    min-height: 70px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 16px 24px 14px 24px;
    transition: box-shadow 0.19s;
}
.caja-resumen h3 {
    font-size: 1.17rem;
    color: #5c5959;
    font-family: Arial;
    font-weight: 700;
    margin: 0 0 8px 0;
}
.caja-resumen .numero {
    font-size: 2.4rem;
    color: #583d9c;
    font-family: Arial Black, Arial, sans-serif;
    font-weight: bold;
    margin: 0;
    line-height: 1;
}
.btn-volver {
  background:#3c328f;
  color:#fff;
  padding:10px 26px;
  border:none;
  border-radius:10px;
  text-decoration:none;
  font-size:17px;
  display:inline-block;
  min-width: 0;
  text-align: center;
  font-family: inherit;
  font-weight: bold;
  transition: background 0.18s;
  box-shadow: 0 2px 8px #0001;
  z-index: 2;
  align-self: flex-end;
  margin-left: 24px;
}
.btn-volver:hover { background:#5743c6; }

@media (max-width: 1300px){
    #contenedor-tarea-entregas { max-width: 99vw; width: 99vw; }
}
@media (max-width: 900px){
    #contenedor-tarea-entregas { width: 99vw; }
    #titulo-tarea-entregas { font-size: 1.45rem; }
    #contenedor-cajas-resumen { gap: 10px; }
    .caja-resumen { min-width: 90px; font-size: 13px; padding: 8px 7px 7px 7px;}
    .btn-volver { font-size: 15px; padding:7px 11px; }
}
@media (max-width: 650px){
    #contenedor-tarea-entregas { width: 100vw; padding: 0;}
    #fila-cajas-boton { flex-direction: column; align-items: stretch; gap: 8px;}
    .btn-volver { margin-left: 0; margin-top: 13px;}
}

#caja-tareas-estudiantes {
    width: 100%;
    margin: 18px auto 60px auto;
    display: flex;
    flex-wrap: wrap;
    gap: 40px 20px;
    justify-content: flex-start;
    align-items: flex-start;
    min-height: 120px;
    box-sizing: border-box;
}

.tarjeta_estudiante{
    background: rgb(220, 221, 222);
    border: 2px solid #949393;
    border-radius: 18px;
    min-height: 300px;
    max-width: 260px;
    width: 100%;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    position: relative;
    transition: box-shadow 0.18s;
    padding: 13px 10px 13px 10px;
    gap: 4px;
    margin: 0;
    flex: 0 1 220px;
}
.cajita_let{
    width: 30px;
    height: 30px;
    padding: 2px;
    background-color:rgb(127, 80, 230) ;
    color: #f9f9f9;
    border-radius: 50%;
    font-family: arial;
    font-size: 1.3rem;
    margin-left: 2px;
    margin-top: 2px;
    margin-bottom: 0px;
    cursor: pointer;
    font-weight: bold;
    border:none;
    display: inline-block;
    text-align: center;
    box-shadow: 0 1px 6px #aaa1;
    vertical-align: middle;
}
.nom_estudiante{
  margin-left: 40px;
  margin-top: -27px;
  font-family: arial;
  font-size: 1.09rem;
  color: #524f4f;
  font-weight: bold;
  margin-bottom: 2px;
  vertical-align: middle;
  line-height: 1.1;
}
.espacio_archivo{
  margin-left: 40px;
  margin-top: 3px;
  background: #fff;
  border: 1.5px solid #949393;
  border-radius: 10px;
  min-height: 18px;
  min-width: 60px;
  padding: 3px 6px;
  font-size: 0.98rem;
  color: #583d9c;
  display: inline-block;
  box-shadow: 0 1px 4px #aaa1;
}
.num_archivos{
  margin-left: 40px;
  font-family: arial;
  font-size: 0.93rem;
  color: #524f4f;
  margin-top: 2px;
  line-height: 1;
}
.dato_entregado{
  margin-left: 40px;
  font-family: arial;
  font-size: 0.93rem;
  color:  #25a41cff;
  margin-top: 2px;
  font-weight: bold;
  line-height: 1;
}
.dato_noentregado{
  margin-left: 40px;
  font-family: arial;
  font-size: 0.93rem;
  color: #b00;
  margin-top: 2px;
  font-weight: bold;
  line-height: 1;
}
.nota_box{
  margin-left: 40px;
  margin-top: 4px;
  font-size: 0.98rem;
  color: #3c328f;
  font-family: arial;
  font-weight: bold;
  display: flex;
  align-items: center;
  gap:7px;
  line-height: 1;
}
.btn-asignar {
  background: #2196f3;
  color: #fff;
  border: none;
  border-radius: 7px;
  padding: 2px 8px;
  font-size: 0.93rem;
  cursor: pointer;
  text-decoration: none;
  margin-left: 0;
  transition: background 0.18s;
}
.btn-asignar:hover { background:#1976d2; }
</style>
