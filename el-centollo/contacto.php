<?php
// Incluimos el archivo puente para conectar a la base de datos
include("conexion.php");

// Creamos una variable para guardar un mensaje de éxito o error en la pantalla
$mensaje_alerta = "";

// Si la persona le da clic al botón de enviar formulario...
if (isset($_POST['enviar_contacto'])) {
    // Recogemos lo que escribió en las cajitas de texto de forma segura
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $mensaje = mysqli_real_escape_string($conexion, $_POST['mensaje']);

    // Creamos la orden de SQL para guardar en la tabla 'contacto'
    $consulta = "INSERT INTO contacto (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";
    
    // Le decimos a XAMPP que ejecute la orden
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        $mensaje_alerta = "<div class='alerta-exito'>¡Mensaje enviado con éxito! Se guardó en la base de datos de El Centollo.</div>";
    } else {
        $mensaje_alerta = "<div class='alerta-error'>Hubo un error al guardar los datos.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Centollo - Contacto</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <header class="header-principal">
        <div class="logo-contenedor">
            <img src="imagenes/logo-centollo.png" alt="Logo El Centollo" class="logo">
            <h1 class="titulo-restaurante">El Centollo</h1>
        </div>
    </header>

    <nav class="barra-navegacion">
        <ul>
            <li><a href="menu.html">Menú</a></li>
            <li><a href="contacto.php" class="active">Contacto</a></li>
            <li><a href="ubicacion.html">Ubicación</a></li>
            <li><a href="reservas.php">Reservas</a></li>
        </ul>
    </nav>

    <main class="contenedor-contacto">
        
        <section class="banner-contacto">
            <h2>Contacto</h2>
            <p>Ante cualquier duda, sugerencia o evento especial, por favor póngase en contacto con nosotros. En El Centollo estamos para servirle.</p>
        </section>

        <section class="columnas-contacto">
            <div class="columna">
                <h3>Atención al cliente</h3>
                <p>Lunes a sábado de 11:30 a 22:00 horas.</p>
                <p>Domingos de 11:30 a 18:00 horas.</p>
                <p>Festivos: Consultar horarios especiales.</p>
            </div>
            
            <div class="columna">
                <h3>Datos de contacto</h3>
                <p><strong>Dirección:</strong> Carrera 1 #93-50 Chicó Alto, Bogotá</p>
                <p><strong>Teléfono:</strong> (57) 316 690 0508</p>
                <p><strong>Email:</strong> <span class="email-verde">contacto@elcentollo.com.co</span></p>
            </div>
        </section>

        <section class="formulario-seccion">
            <div class="tarjeta-formulario">
                <img src="imagenes/logo-centollo.png" alt="Logo El Centollo" class="logo-formulario">
                
                <h2>Formulario de Contacto</h2>
                <p class="subtitulo-form">Escríbenos y resolveremos tus dudas a la brevedad</p>

                <?php echo $mensaje_alerta; ?>

                <form action="contacto.php" method="POST">
                    <div class="grupo-campo">
                        <label for="nombre">Nombre Completo <span class="obligatorio">*</span></label>
                        <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" required>
                    </div>

                    <div class="grupo-campo">
                        <label for="email">Correo Electrónico <span class="obligatorio">*</span></label>
                        <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
                    </div>

                    <div class="grupo-campo">
                        <label for="mensaje">Mensaje o Sugerencia <span class="obligatorio">*</span></label>
                        <textarea id="mensaje" name="mensaje" placeholder="Escribe aquí tu mensaje..." rows="4" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;"></textarea>
                    </div>

                    <button type="submit" name="enviar_contacto" class="btn-enviar">Enviar Mensaje</button>
                </form>
            </div>
        </section>

    </main>

<footer class="pie-pagina-instructor">
    <div class="footer-banner-negro">
        <div class="bloque-beneficio">
            <img src="imagenes/fooder1.png" alt="Desde 1911" class="icono-footer-beneficio">
            <span class="sub-verde">TRADICIÓN</span>
            <strong class="tit-blanco">MÁS DE 20 AÑOS</strong>
            <p class="txt-gris">Ofreciendo el mejor sabor y frescura del mar en Bogotá.</p>
        </div>
        <div class="bloque-beneficio">
            <img src="imagenes/fooder2.png" alt="Directo de Lonja" class="icono-footer-beneficio">
            <span class="sub-verde">EL PRODUCTO MÁS FRESCO</span>
            <strong class="tit-blanco">CALIDAD PREMIUM</strong>
            <p class="txt-gris">Mariscos y pescados seleccionados con los más altos estándares.</p>
        </div>
        <div class="bloque-beneficio">
            <img src="imagenes/fooder3.png" alt="Recetas Únicas" class="icono-footer-beneficio">
            <span class="sub-verde">SABOR ARTESANAL</span>
            <strong class="tit-blanco">RECETAS PROPIAS</strong>
            <p class="txt-gris">Descubre el toque secreto de nuestras cazuelas y paellas.</p>
        </div>
    </div>

    <div class="footer-contacto-social">
        <div class="datos-contacto-texto">
            <p class="linea-contacto"><img src="./imagenes/ubicacion.png" alt="Ubicación" class="mini-icono"> Carrera 1 #93-50 Chicó Alto, Bogotá (I.E.D. Entre Nubes S.O)</p>
            <p class="linea-contacto"><img src="./imagenes/telefono.png" alt="Teléfono" class="mini-icono"> Tel: (57) 316 690 0508</p>
            <p class="linea-contacto"><img src="./imagenes/correo.png" alt="Email" class="mini-icono"> servicioalcliente@elcentollo.com.co</p>
        </div>
        <div class="redes-cuadradas">
            <a href="#" class="btn-red-img"><img src="imagenes/facebook (1).png" alt="Facebook"></a>