<h2 class="noticias__titulo">Noticias</h2>
<main class="noticias contenedor">
    <div class="noticias__grid">
        <?php foreach ($noticias as $noticia):?>
        <section class="notice">
            <div class="notice__mask">
                <img src="/build/img/<?php echo $noticia->urlImagen?>">
            </div>
            <div class="notice__contenido">
                <h3><?php echo $noticia->titulo?></h3> 
                <div class="notice__meta">
                    <p class="notice__fuente"><span>Fuente: </span> <?php echo $noticia->fuente?></p>
                    <p class="notice__fecha"><span> Fecha: </span><?php echo $noticia->fecha?></p>
                </div>
                <p class="notice__descripcion"><?php echo $noticia->descripcion?></p>
                <div class="centrar">            
                    <a class="notice__btn" href="<?php echo $noticia->url?>">Leer más</a>
                </div>
            </div>           
        </section>
        <?php endforeach;?>
    </div>   
</main>
<?php 
// debuguear($noticias)
?>