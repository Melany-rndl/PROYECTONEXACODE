<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['id_cuenta'])) {
    header("Location: Logueo.php");
    exit();
}

if (!isset($rol)) {
    if (!isset($conexion)) {
        $conexion = mysqli_connect("localhost", "root", "", "p25");
    }
    $id_cuenta = $_SESSION['id_cuenta'];
    $obtener_rol = mysqli_query($conexion, "SELECT rol FROM cuenta WHERE id_cuenta='$id_cuenta'");
    $rol = ($row = mysqli_fetch_assoc($obtener_rol)) ? $row['rol'] : '';
}

if (!isset($materias_menu)) {
    $materias_menu = [];
}
?>
<style>
    body{
        display: grid;
        grid-template-rows: 80px 200px 50px 400px 60px;
        grid-template-columns: 6% 94% ;
        grid-template-areas:
        "iz pag "
        "iz cero "
        "iz espacio"
        "iz caja";
        gap:10px
    }
    @media(max-width:500px){
        body{
            grid-template-rows: 50px 100px 200px 10px;
            grid-template-columns: 30% 50% 20%;
            grid-template-areas:
            "iz pag"
            "iz cero"
            "iz espacio"
            "iz caja";
        }
    }
    header{
        border-bottom: 2px solid #666565;
        background: white;
        grid-area: pag;
        font-size: 26px;
        color: #4e4c7f;
        text-shadow: 2px 2px 4px #797878;
        position: relative;
    }
    nav{
        padding: 20px;
        display: flex;
        justify-content: left;
        gap: 20px;
        flex-direction: row reverse;
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
        background:rgb(70, 130, 208) ;
        border: rgb(70, 130, 208);
        color: #f9f9f9;
        border-radius: 50%;
        font-size: 18px;
        position: absolute;
        margin-left: 1250px;
        margin-top: 10px;
        cursor: pointer;
    }
    #espacio{ grid-area: espacio; }
    h2{ color: #42334d; font-family: arial; }
    .botonesuperior{
        background: white;
        border:none;
        font-family: Arial;
        font-size: 18px;
        color: #4e4c7f;
        cursor: pointer;
    }
    #iz{ grid-area: iz; }
    .iconomenu{
        background: white;
        border: none;
        font-size: 25px;
        color: #3f3e57;
        cursor: pointer;
    }
    .menu-materias {
        margin-top: 10px;
        display: flex;
        flex-direction: column;
        gap: 32px;
        font-family: Arial;
        font-size: 16px;
        color: #3f3e57;
    }
    .oculto { display: none; }
    .visible { display: flex; }
    .mensajemenu{
        font-family: arial;
        font-size: 18px;
        color: #3a3a48;
        cursor: pointer;
        border-radius: 10px;
        background: #d8daea;
        padding: 10px;
    }
    #Bienvenida-NexaClass{
        grid-area: cero;
        background: linear-gradient(to right, #3c328f, #3a57a8 , #4c86d1);
        border-radius: 16px;
    }
    h1{ color: white; font-family: arial; margin-top: 25px; margin-left: 15px; font-size: 40px; }
    #mensaje{ color: white; font-family: arial; margin-left: 15px; font-size: 20px; }
    #botonuno{
        color: #0d61d6;
        margin-left: 15px;
        background: white;
        border:none;
        border-radius: 5px;
        font-size: 15px;
        padding: 9px;
        cursor: pointer;
    }
    #botondos{
        color: white;
        background: linear-gradient(to right, #3c328f, #3a57a8);
        border: 2px solid white;
        border-radius: 5px;
        font-size: 15px;
        padding: 9px;
        margin-left: 15px;
        cursor: pointer;
    }
    #caja{
        grid-area: caja;
        display: grid;
        grid-template-rows: 250px 250px 250px ;
        grid-template-columns: 20% 20% 20% 20%;
        grid-template-areas:
        "uno dos tres mun"
        "cuatro cinco seis mdo"
        "siete ocho nueve mtre";
        gap: 70px;
    }
    @media(max-width:350px){
        #caja{
            display: grid;
            grid-template-rows: repeat(12, 80px);
            grid-template-columns: 100%;
            grid-template-areas:
            "uno"
            "dos"
            "tres"
            "mun"
            "cuatro"
            "cinco"
            "seis"
            "mdo"
            "siete"
            "ocho"
            "nueve"
            "mtre";
            gap: 200px;
        }
    }
    #uno, #dos, #tres, #cuatro, #cinco, #seis, #siete, #ocho, #nueve, #mun, #mdo, #mtre{
        background: white;
        border: 2px solid #949393;
        border-radius: 16px;
    }
    .cajitas{
        padding: 50px;
        margin: 0px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
    .celeste { background: linear-gradient(to bottom,  #6eb8c2,  #5ea1aa , #3e6d72); }
    .azul {  background: linear-gradient(to bottom, #679dcf, #92c0e6 , #2a578f); }
    .morado { background: linear-gradient(to bottom,  #b091d3, #b68fd6 , #633f7e); }
    .verde{ background: linear-gradient(to bottom,  #99b75e, #a1c777 , #435331); }
    .verdeO { background: linear-gradient(to bottom,  #7f9f70, #749a62 , #3d5632);}
    .naranja { background: linear-gradient(to bottom,  #efb36d, #eabc87 , #bc7a2e); }
    .amarillo { background: linear-gradient(to bottom,  #f9df82, #f3db84 ,#eec834); }
    .rosa { background: linear-gradient(to bottom,  #e9a0d7,#f2a9e0, #c967b2); }
    .nomcajita{
        color:white;
        font-family: arial;
        position:absolute;
        margin-top: 20px;
        font-size: 18px;
    }
    .contenidocajsup{
        font-size: 25px;
        color: #4e4c7f;
        font-family: arial;
    }
    .contenidocaja{
        font-size: 15px;
        margin-top: 5px;
        font-family: arial;
        color: #5b5a7b;
    }
    .c{
        border:none;
        background: white;
        cursor: pointer;
        position:relative;
    }
    .edit-btn {
        position: absolute;
        top: 10px;
        right: 12px;
        background: #f5f5f5;
        border: 1px solid #bbb;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        font-size: 18px;
        color: #4e4c7f;
        cursor: pointer;
        z-index: 2;
        transition: background 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }
    .edit-btn:hover { background: #e1e4f2; }
</style>

<header id="pag">
    <strong>NEXA CLASS</strong>
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
        <button class="botonesuperior" onclick="window.location.href='Pagina-Principal.php'">Inicio</button>
        <button class="botonesuperior" onclick="window.location.href='Pagina-Principal.php'">Mis cursos</button>
    </nav>
</header>
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
