<!DOCTYPE html>
<html lang="es">


<body>

    <?php 
    require "header.php";
    require "filtro.php";
?>

    <main>
        <section>

            <div class="container mt-3 d-xs-block">
                <div id="micarousel" class="carousel slide" data-ride="carousel">

                    <ul class="carousel-indicators">
                        <li data-target="#micarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#micarousel" data-slide-to="1"></li>
                        <li data-target="#micarousel" data-slide-to="2"></li>
                    </ul>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="imagenes/carouselinicio1.jpg" alt="Ultimo lanzamiento" width="1000" height="500">
                        </div>
                        <div class="carousel-item">
                            <img src="imagenes/carouselinicio2.jpg" alt="Próximos lanzamientos" width="1000" height="500">
                        </div>
                        <div class="carousel-item">
                            <img src="imagenes/carouselinicio3.jpg" alt="El más vendido" width="1000" height="500">
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#micarousel" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#micarousel" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>

            <div id="iniciogrillaimg" class="container">
                <div class="row">
                    <div class="col-4 inicioimagen">
                        <img src="imagenes/grilla1.jpg" alt="Juego 1 en grilla de imágenes" width="400" height="250" class="img-fluid">
                    </div>
                    <div class="col-4 inicioimagen">
                        <img src="imagenes/grilla2.jpg" alt="Juego 2 en grilla de imágenes" width="400" height="250" class="img-fluid">
                    </div>
                    <div class="col-4 inicioimagen">
                        <img src="imagenes/grilla3.jpg" alt="Juego 3 en grilla de imágenes" width="400" height="250" class="img-fluid">
                    </div>
                    <div class="col-4 inicioimagen">
                        <img src="imagenes/grilla4.jpg" alt="Juego 4 en grilla de imágenes" width="400" height="250" class="img-fluid">
                    </div>
                    <div class="col-4 inicioimagen">
                        <img src="imagenes/grilla5.jpg" alt="Juego 5 en grilla de imágenes" width="400" height="250" class="img-fluid">
                    </div>
                    <div class="col-4 inicioimagen">
                        <img src="imagenes/grilla6.jpg" alt="Juego 6 en grilla de imágenes" width="400" height="250" class="img-fluid">
                    </div>
                    <div class="col-4 inicioimagen">
                        <img src="imagenes/grilla7.jpg" alt="Juego 7 en grilla de imágenes" width="400" height="250" class="img-fluid">
                    </div>
                    <div class="col-4 inicioimagen">
                        <img src="imagenes/grilla8.jpg" alt="Juego 8 en grilla de imágenes" width="400" height="250" class="img-fluid">
                    </div>
                    <div class="col-4 inicioimagen">
                        <img src="imagenes/grilla9.jpg" alt="Juego 9 en grilla de imágenes" width="400" height="250" class="img-fluid">
                    </div>
                </div>
            </div>

        </section>

        <section>

            <div class="container listadodivcards">

                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="tituloseccion"><img src="imagenes/iconos/iconodestacados65.jpg" alt="Icono destacados tamaño 65" width="65" height="65" class="img-fluid rounded-circle"> Destacados</h1>
                    </div>
                </div>

                <div class="row">

                    <?php foreach ($fprArray as $productito) { 
                    
                    if($productito['destacado']) { ?>

                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                        <article class="card">
                            <a href="detalleproductos.php?prod=<?php echo $productito['codigo']?>"><img src="imagenes/<?php echo $productito['codigo']. '/caratula.jpg' ?>" alt="Carátula <?php echo $productito['titulo'] ?>" width="580" height="730" class="img-fluid"></a>
                            <h2><a href="detalleproductos.php?prod=<?php echo $productito['codigo']?>"><?php echo $productito['titulo'] . "<br />"; ?></a></h2>
                            <div class="visualcard">
                            <p><?php echo ucfirst(substr($productito['descripcioncompleta'],0,125)); ?><a href="detalleproductos.php?prod=<?php echo $productito['codigo']?>"> Ver más...</a></p>

                            <p class="listadogenero">Género: <?php 
                        
                            
                        foreach(getDataFileArray('archivosjson/generos.json') as $generito){
                                if($generito['id'] == $productito['genero']){
                                    echo $generito['nombre']. "<br />"; } } ?></p>

                            <p class="listadoplataforma"><?php 
                        
                        foreach(getDataFileArray('archivosjson/plataformas.json') as $plataformita){
                                if($plataformita['id'] == $productito['plataforma']){
                                    echo $plataformita['nombre']. "<br />"; } } ?></p>
                            <a href=#stophere>
                                <p class="listadoprecio"><img src="imagenes/iconos/iconocomprablanco.png" alt="Icono compra blanco" width="25" height="25" class="img-fluid float-left"><?php echo "$".$productito['precio'] . "<br />"; ?></p>
                            </a>
                            </div>
                        </article>
                    </div>

                    <?php 
                            }
                        }
                    ?>

                </div>
            </div>

        </section>

    </main>

    <?php  
    require "footer.php";
?>


</body>

</html>
