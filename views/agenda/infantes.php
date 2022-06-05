<?php 
// debuguear($_SESSION);
?>

<main class="contenedor inicio">
    <h2 class="text-center titulo__login">Infantes registrados</h1>
    <div class="space_between">
        <a href="/inicio" class="btn_primario">Inicio</a>
        <a href="/registrar-infante" class="btn_primario">Registrar infante</a>
        <!-- <a href="/cita" class="btn_secundario">Agendar cita</a> -->
    </div>
    <?php if(count($infantes)===0):?>
        <p>No hay infantes registrados</p>
    <?php else:?>
    <table class="lista">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Genero</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($infantes as $infante) : ?>
                <tr>
                    <td><?php echo $infante->nombre ." ". $infante->apellidoPat ." ". $infante->apellidoMat?></td>
                    <td><?php echo $infante->sexo =="1"?'Hombre':'Mujer' ?></td>
                    <td>
                    <?php
                            $edad= getAge($infante->fechaNacimiento);
                            echo $edad;
                            ?>        
                    </td>
                    <!-- <td>
                        <div class="dos_columnas">
                            <div class="form_ajustar">
                                <a href="/infante/actualizar?id=<?php echo $infante->id; ?>" class="form_ajustar__btn amarillo" ><i class="fa-solid fa-eye"></i></a>
                            </div>
                            <div class="form_ajustar">
                                <a href="/infante/actualizar?id=<?php echo $infante->id; ?>" class="form_ajustar__btn amarillo" ><i class="fa-solid fa-pen"></i></a>
                            </div>       
                         
                        </div>          
                    </td> -->
                </tr>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif;?>
    
</main>

