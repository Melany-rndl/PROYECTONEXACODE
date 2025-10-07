<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['id_cuenta'])) { header("Location: Logueo.php"); exit(); }

if (!isset($conexion) || !$conexion) {
    $conexion = mysqli_connect("localhost", "root", "", "p25");
}
$id_cuenta = $_SESSION['id_cuenta'];
$obtener_rol = mysqli_query($conexion, "SELECT rol FROM cuenta WHERE id_cuenta='$id_cuenta'");
$rol = ($row = mysqli_fetch_assoc($obtener_rol)) ? $row['rol'] : '';

$materias_menu = [];
$sql_materias = "SELECT clase.id_clase, clase.nombre 
    FROM clase 
    JOIN cuenta_has_clase ON clase.id_clase = cuenta_has_clase.clase_id_clase 
    WHERE cuenta_has_clase.cuenta_id_cuenta = '$id_cuenta'
    ORDER BY clase.nombre ASC";
$res_materias = mysqli_query($conexion, $sql_materias);
while ($row = mysqli_fetch_assoc($res_materias)) {
    $materias_menu[] = $row;
}
?>
<style>
header{
    border-bottom: 2px solid #666565;
    background: white;
    grid-area: pag;
    font-size: 26px;
    color: #4e4c7f;
    text-shadow: 2px 2px 4px #797878;
    position: relative;
    z-index: 10;
}
.nexaclass-move-right {
    margin-left: 90px;
}
nav{
    padding: 20px;
    display: flex;
    justify-content: left;
    gap: 20px;
    flex-direction: row reverse;
    margin-left: 90px;
}
.botonesuperior, .boton-superior-menu{
    background: white;
    border: none;
    font-family: Arial;
    font-size: 18px;
    color: #4e4c7f;
    cursor: pointer;
}
#estudiante{
    background:white;
    border: 2px solid rgb(107, 46, 134);
    border-radius: 5px;
    padding: 8px;
    font-size: 17px;
    position: absolute;
    margin-left: 1100px;
    margin-top: 10px;
    cursor: pointer;
    color: rgb(107, 46, 134);
}
#mas, #accion-profesor-btn{
    background:white ;
    color: #3f3e57;
    border: none;
    font-size: 50px;
    position: absolute;
    margin-left: 1350px;
    cursor: pointer;  
}
#let{
    width: 40px;
    height: 40px;
    padding: 10px;
    background:rgb(70, 130, 208);
    border: rgb(70, 130, 208);
    color: #f9f9f9;
    border-radius: 50%;
    font-size: 18px;
    position: absolute;
    margin-left: 1250px;
    margin-top: 10px;
    cursor: pointer;
}
.menu-lateral-btn {
    background: white;
    border: none;
    font-size: 27px;
    color: #3f3e57;
    cursor: pointer;
    margin: 15px 0 0 18px;
    border-radius: 7px;
    padding: 4px 13px 3px 10px;
    transition: background 0.13s;
    position: absolute;
    left: 0;
    top: 0;
    z-index: 1300;
}
.menu-lateral-btn:hover {
    background: #e7e7f6;
}
.menu-lateral-panel {
    display: none;
    flex-direction: column;
    align-items: flex-start;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    min-width: 240px;
    max-width: 92vw;
    width: 280px;
    background: #fff;
    box-shadow: 2px 0 18px #0003;
    border-right: 2px solid #b6b3d6;
    border-radius: 0 18px 18px 0;
    z-index: 3000;
    padding: 0 0 12px 0;
    animation: panelSlideIn 0.18s;
}
.menu-lateral-panel.visible {
    display: flex;
}
@keyframes panelSlideIn {
    from { transform: translateX(-50px); opacity: 0.15; }
    to { transform: translateX(0); opacity: 1; }
}
.menu-lateral-caja {
    width: 100%;
    margin-top: 22px;
    border-radius: 10px;
    background: #f8f8fa;
    box-shadow: 0 2px 12px #0001;
    padding: 17px 0 6px 0;
    display: flex;
    flex-direction: column;
    align-items: stretch;
    margin-bottom: 6px;
}
.menu-lateral-titulo {
    width: 100%;
    padding: 0 0 13px 22px;
    font-size: 1.12em;
    color: #3c328f;
    font-family: Arial, sans-serif;
    font-weight: bold;
    border-bottom: 1.5px solid #d2d2ef;
    background: none;
    margin-bottom: 0.7em;
    letter-spacing: 0.7px;
}
.menu-lateral-lista {
    width: 100%;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 2px;
}
.menu-lateral-link {
    text-decoration: none;
    color: #3c328f;
    font-family: Arial, sans-serif;
    font-size: 1.07em;
    padding: 11px 8px 11px 32px;
    margin: 0 0 2px 0;
    border-radius: 6px;
    border-left: 4px solid #e3e3ef;
    background: none;
    transition: background 0.13s, color 0.14s, border-left 0.14s;
    font-weight: 500;
    box-sizing: border-box;
}
.menu-lateral-link:hover,
.menu-lateral-link:focus {
    background: #e5eaff;
    color: #43207c;
    border-left: 4px solid #3c328f;
}
.menu-lateral-sin-clases {
    color: #a3a3b0;
    font-size: 15px;
    padding: 9px 0 9px 32px;
    margin-top: 12px;
    font-family: Arial;
}
@media(max-width: 500px){
    .menu-lateral-panel {
        width: 94vw;
        min-width: 0;
        max-width: 99vw;
        border-radius: 0 10px 10px 0;
        padding: 0 0 10px 0;
    }
    .menu-lateral-caja { margin-top: 10px; padding: 10px 0 4px 0; }
    .menu-lateral-titulo { padding-left: 14px; font-size: 1em; }
    .menu-lateral-link { font-size: 0.97em; padding-left: 18px; }
}
</style>

<button class="menu-lateral-btn" onclick="toggleMenuLateral()" title="Ver clases">☰</button>
<div class="menu-lateral-panel" id="menuLateralPanel">
    <div class="menu-lateral-caja">
        <div class="menu-lateral-titulo">Mis clases</div>
        <div class="menu-lateral-lista">
            <?php if(empty($materias_menu)): ?>
                <span class="menu-lateral-sin-clases">No tienes clases</span>
            <?php else: ?>
                <?php foreach($materias_menu as $materia): ?>
                    <a href="clase-Formulario.php?id=<?= $materia['id_clase'] ?>" class="menu-lateral-link"><?= htmlspecialchars($materia['nombre']) ?></a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<header id="pag">
    <strong class="nexaclass-move-right">NEXA CLASS</strong>
    <a href="Cuenta.php" id="estudiante">
        👤<span id="es"><?= htmlspecialchars(strtoupper($rol)); ?></span>
    </a>
    <button id="let" onclick="window.location.href='Cerrar-Sesion.php';">E</button>
    <?php if($rol === 'profesor'): ?>
        <div style="display:inline-block; position:absolute; margin-left:1350px; top:0;">
            <div id="menu-accion-profesor" style="position:absolute;right:-10px;top:35px;z-index:9;display:none; background:#fff; border:1px solid #ccc; border-radius:7px;">
                <a href="Seleccionar-Accion-Profesor.php" style="display:block;padding:10px 18px;color:#444;text-decoration:none;">Crear/Unirse a clase</a>
            </div>
        </div>
    <?php endif; ?>
    <nav>
        <?php
        if (isset($enlaces_cabecera) && is_array($enlaces_cabecera) && count($enlaces_cabecera) > 0):
            foreach($enlaces_cabecera as $enlace): ?>
                <button class="botonesuperior" onclick="window.location.href='<?= htmlspecialchars($enlace['url']) ?>'"><?= htmlspecialchars($enlace['texto']) ?></button>
        <?php endforeach;
        else: ?>
            <button class="botonesuperior" onclick="window.location.href='Pagina-Principal.php'">Inicio</button>
            <button class="botonesuperior" onclick="window.location.href='Pagina-Principal.php'">Mis cursos</button>
        <?php endif; ?>
    </nav>
</header>
<script>
function toggleMenuLateral() {
    var panel = document.getElementById("menuLateralPanel");
    panel.classList.toggle("visible");
}
document.addEventListener("click", function(e) {
    var panel = document.getElementById("menuLateralPanel");
    var btn = document.querySelector(".menu-lateral-btn");
    if (panel && panel.classList.contains("visible") && !panel.contains(e.target) && e.target !== btn) {
        panel.classList.remove("visible");
    }
});
</script>
<section id="iz">
    
    <button class="iconomenu">☰</button>
    <div id="menuMaterias" class="menu-materias oculto">
        <hr>
        <?php if(is_array($materias_menu)): ?>
            <?php foreach($materias_menu as $materia): ?>
                <div><span class="mensajemenu"><strong><?= htmlspecialchars($materia); ?></strong></span></div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</section>

