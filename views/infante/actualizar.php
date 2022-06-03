<h2 class="admin__titulo">Actualizar infante</h2>
<main class="contenedor">
    <form action="" class="formulario" method="POST" enctype="multipart/form-data">
    <?php include __DIR__ . '/formulario.php'?>
    <?php
        include_once __DIR__ . '/../autenticacion/alertas.php'; 
        // debuguear($alertas);
        ?>
    <div class="space_center">
        <a href="/infantes/administrador" class="btn" >Volver</a>
        <input type="submit" value="Actualizar" id="actualizarInfante" class="btn-enviar">
    </div>

    </form>
</main>
<?php 
$script=
    "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='../build/JS/proveedores.js'></script>";
?>
