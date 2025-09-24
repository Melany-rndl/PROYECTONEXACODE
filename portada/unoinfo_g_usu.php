<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<style>
body{
    display: grid;
    grid-template-rows: 95px 450px 450px;
    grid-template-columns:4% 94%;
    grid-template-areas:
        "iz pag"
        "iz cuenta"
        "iz cuadro";
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

/* Secciones generales */
#cuenta {
    grid-area: cuenta;
    background-color: white;
    padding: 40px 20px;
}

#letra {
    width: 70px;
    height: 70px;
    background-color: rgb(127, 80, 230);
    color: #f9f9f9;
    border-radius: 50%;
    font-size: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

#mensaje_b {
    font-size: 32px;
    color: #3d3d3d;
    margin-bottom: 10px;
}

#mensaje_lar {
    font-size: 25px;
    color: #585858;
    line-height: 1.5;
}

/* Cuadros */
#cuadro {
    grid-area: cuadro;
    display: grid;
    grid-template-columns: 45% 45%;
    gap: 60px;
    padding: 20px;
}

#cuadro_uno, #cuadro_dos {
    border: 3px solid rgb(86, 59, 98);
    background-color: white;
    border-radius: 50px;
    padding: 20px;
    transition: all 0.3s ease;
}

#cuadro_uno:hover, #cuadro_dos:hover {
    height: 360px;
    box-shadow: 7px 3px 4px #9980b8ff;
}

.priv {
    font-size: 28px;
    color: rgb(86, 59, 98);
    margin-bottom: 15px;
}

.m {
    font-size: 25px;
    color: #585858;
    margin-bottom: 20px;
}

.div {
    font-size: 20px;
    color: #608cb4;
    border-top: 3px solid #608cb4;
    padding-top: 10px;
}


@media (max-width: 768px) {
    body {
        grid-template-rows: auto auto auto;
        grid-template-columns: 100%;
        grid-template-areas:
            "pag"
            "cuenta"
            "cuadro";
    }

    #cuenta {
        padding: 20px;
        text-align: center;
    }

    #letra {
        width: 60px;
        height: 60px;
        font-size: 40px;
        margin: 0 auto 15px;
    }

    #mensaje_b {
        font-size: 24px;
        margin: 0 auto 10px;
    }

    #mensaje_lar {
        font-size: 16px;
        max-width: 90%;
        margin: 0 auto;
    }

    #cuadro {
        grid-template-columns: 100%;
        grid-template-rows: auto auto;
        gap: 20px;
        padding: 10px;
    }

    #cuadro_uno, #cuadro_dos {
        width: 90%;
        margin: 0 auto;
        padding: 15px;
    }

    .priv {
        font-size: 20px;
        margin-left: 0;
    }

    .m {
        font-size: 16px;
        margin-left: 0;
    }

    .div {
        font-size: 18px;
        margin-left: 0;
    }
}
</style>
</head>
<body>
<header id="pag">
    <?php include ("dis_cabezera.php")?>
</header>

<section id="iz">
    <?php include ("dis_menu.php")?>
    <div id="menuLateral"></div>
</section>

<section id="cuenta">
    <p id="letra">E</p>
    <p id="mensaje_b">Te damos la bienvenida, Nombre de la persona</p>
    <p id="mensaje_lar">Gestiona tu información, privacidad y seguridad para mejorar tu experiencia como usuario</p>
</section>

<main id="cuadro">
    <section id="cuadro_uno">
        <p class="priv">Privacidad y personalización</p>
        <p class="m">Consulta los datos de almacenamiento en tu cuenta y elige qué actividad se debe guardar para personalizar tu experiencia</p>
        <p class="div">Gestionar tus datos y privacidad</p>
    </section>

    <section id="cuadro_dos">
        <p class="priv">Ten tu cuenta protegida</p>
        <p class="m">La revisión de seguridad ha comprobado tu cuenta y no ha encontrado ninguna acción recomendada</p>
        <p class="div">Ver detalles</p>
    </section>
</main>
</body>
</html>