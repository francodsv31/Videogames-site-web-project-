<!DOCTYPE html>
<html lang="es">

<?php 
    require "header.php";
    require "filtro.php";
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    ?>

<body>

    <?php
            foreach($fprArray as $prod){ 
            if($prod['codigo'] == $_GET['prod']){
						break;
					}
				}
    ?>

    <main>
        <?php 
        if(isset($_POST['comentar'])){
        $data = $_POST;
        unset($data['comentar']);
        $fecha = new DateTime();
        $indexComentario = $fecha->format('YmdHisu');
        $data['fecha'] = date('d/m/Y H:i:s');
        
        if(file_exists('archivosjson/comentarios.json')){
            $comentarioJson = file_get_contents('archivosjson/comentarios.json');
            $comentarioArray = json_decode($comentarioJson,true);
        }else{
            $comentarioArray = array();
        }
        
        $comentarioArray[$indexComentario] = $data;
        $fco = fopen('archivosjson/comentarios.json','w');
        fwrite($fco,json_encode($comentarioArray));
        fclose($fco);
        } 
 ?>
        <section>
            <div class="container" id="cuerpodetalle">
                <div class="row">
                    <div class="col-sm-12">

                        <h1 class="tituloseccioncontacto"><img src="imagenes/iconos/iconodetalle65.jpg" alt="Icono detalle tamaño 65" width="65" height="65" class="img-fluid rounded-circle"><?php echo $prod['titulo']; ?></h1>
                    </div>
                </div>

                <div id=carouseldetalle class="container">
                    <div class="container mt-3 d-xs-block">
                        <div id="micarousel" class="carousel slide" data-ride="carousel">

                            <ul class="carousel-indicators">
                                <li data-target="#micarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#micarousel" data-slide-to="1"></li>
                                <li data-target="#micarousel" data-slide-to="2"></li>
                            </ul>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="imagenes/<?php echo $prod['codigo']. '/carouseln1.jpg' ?>" alt="Detalle 1 del juego" width="1000" height="500">
                                </div>
                                <div class="carousel-item">
                                    <img src="imagenes/<?php echo $prod['codigo']. '/carouseln2.jpg' ?>" alt="Detalle 2 del juego" width="1000" height="500">
                                </div>
                                <div class="carousel-item">
                                    <img src="imagenes/<?php echo $prod['codigo']. '/carouseln3.jpg' ?>" alt="Detalle 3 del juego" width="1000" height="500">
                                </div>
                            </div>

                            <a class="carousel-control-prev" href="#micarousel" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#micarousel" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>

                        </div>

                        <h2><?php echo $prod['titulo']; ?></h2>
                        <p><?php echo $prod['descripcioncompleta']; ?>
                        </p>
                        <div class="container">
                            <div class="detalletodos">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <p><img src="imagenes/iconos/iconocalificacion50.png" alt="Icono calificación" width="50" height="50">Calificación: <?php echo $prod['calificacion'] . "/5"; ?></p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <p><img src="imagenes/iconos/iconogenero50.png" alt="Icono género" width="50" height="50">Género: <?php 
                        
                            foreach(getDataFileArray('archivosjson/generos.json') as $generito){
                                if($generito['id'] == $prod['genero']){
                                    echo $generito['nombre']. "<br />"; } } ?></p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <p><img src="imagenes/iconos/iconoplataforma50.png" alt="Icono plataforma" width="50" height="50">Plataforma: <?php 
 
                            foreach(getDataFileArray('archivosjson/plataformas.json') as $plataformita){
                                if($plataformita['id'] == $prod['plataforma']){
                                    echo $plataformita['nombre']. "<br />"; } } ?></p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <p><img src="imagenes/iconos/iconofecha50.png" alt="Icono fecha de lanzamiento" width="50" height="50">Fecha de Lanzamiento: <?php echo $prod['fechadelanzamiento']; ?></p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <p><img src="imagenes/iconos/iconostock50.png" alt="Icono stock" width="50" height="50">Stock: <?php echo $prod['stock'] . " unidades disponibles"; ?></p>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <p><img src="imagenes/iconos/iconodesarrollador50.png" alt="Icono desarrollador" width="50" height="50">Desarrollado por: <?php echo $prod['desarrollador'];  ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <section>
            <div class="container listadodivcards">
                <h3>¿Te gustó este juego? ¡No te pierdas los siguientes!</h3>
                <div class="row">
                    <?php
                    $cantidad = 0;
                    foreach ($fprArray as $productito){
                    if($prod['genero'] == $productito['genero']){
                        if($prod['titulo'] != $productito['titulo']){
                            $cantidad++;
							if($cantidad == 5) break; 
					?>

                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4">
                        <article class="card cardmini">
                            <a href="detalleproductos.php?prod=<?php echo $productito['codigo']?>"><img src="imagenes/<?php echo $productito['codigo']. '/caratulamin.jpg' ?>" alt="Carátula <?php echo $productito['titulo'] ?>" width="290" height="365" class="img-fluid"></a>
                            <a href="detalleproductos.php?prod=<?php echo $productito['codigo']?>">
                                <h4><?php echo $productito['titulo'] . "<br />"; ?></h4>
                            </a>
                            <div class="visualcardmini">
                                <p><?php echo ucfirst(substr($productito['descripcioncompleta'],0,65)); ?><a href="detalleproductos.php?prod=<?php echo $productito['codigo']?>"> Ver más...</a></p>

                                <p class="listadogenero">Género: <?php 
                        
                            foreach(getDataFileArray('archivosjson/generos.json') as $generito){
                                if($generito['id'] == $productito['genero']){
                                    echo $generito['nombre']. "<br />"; } } ?></p>

                                <p class="listadoplataforma"><?php 
                            
                            foreach(getDataFileArray('archivosjson/plataformas.json') as $plataformita){
                                if($plataformita['id'] == $productito['plataforma']){
                                    echo $plataformita['nombre']. "<br />"; } } ?></p>

                                <a href=#stophere>
                                    <p class="listadoprecio"><img src="imagenes/iconos/iconocomprablanco.png" alt="Icono compra blanco" width="20" height="20" class="img-fluid float-left"><?php echo "$".$productito['precio'] . "<br />"; ?></p>
                                </a>
                            </div>
                        </article>
                    </div>
                    <?php
                            }
                        }    
                    }
                    ?>
                </div>
            </div>
        </section>
        <section>

            <div class="container listadodivcards">

                <h3 class="comentariosconicono"><img src="imagenes/iconos/iconocomentarios65.jpg" alt="Icono comentarios tamaño 65" width="65" height="65" class="img-fluid rounded-circle"> COMENTARIOS</h3>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <article>
                            <form action="" method="post">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <h4>¡Valora el juego!</h4>
                                            <div class="control-group">
                                                <p class="clasificacion">
                                                    <input id="radio1" type="radio" name="calificacion" value="5">
                                                    <label for="radio1">★</label>
                                                    <input id="radio2" type="radio" name="calificacion" value="4">
                                                    <label for="radio2">★</label>
                                                    <input id="radio3" type="radio" name="calificacion" value="3">
                                                    <label for="radio3">★</label>
                                                    <input id="radio4" type="radio" name="calificacion" value="2">
                                                    <label for="radio4">★</label>
                                                    <input id="radio5" type="radio" name="calificacion" value="1">
                                                    <label for="radio5">★</label>
                                                </p>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="control-group">
                                                        Email: <input type="email" placeholder="email" class="input-xlarge" name="email" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="control-group">
                                                        <br>
                                                        <textarea rows="5" cols="40" id="textarea" class="input-xlarge" name="descripcion"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" class="input-xlarge" name="codproducto" value="<?php echo $_GET['prod'] ?>" />
                                            <button type="submit" name="comentar" class="button">Comentar</button>

                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </article>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    
                    
                    <?php
                                $existeComentario = false;
								if (file_exists('archivosjson/comentarios.json')) { //json
									$comentarioJson = file_get_contents('archivosjson/comentarios.json'); //json
									$comentarioArray = json_decode($comentarioJson, true);
									krsort($comentarioArray);
									$cantidad = 0;
									foreach ($comentarioArray as $comentario) {
										if ($comentario['codproducto'] == $_GET['prod']) {
											$existeComentario = true;
											$cantidad++;
											if ($cantidad == 11) break;
								?>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <article class="card cardcomentarios">
                            <p class="clasificacion" id="estrella"><?php 
                                if(isset($comentario['calificacion'])){
                                    switch($comentario['calificacion']){
                                        case 1 : echo '★';
                                       break;
                                        case 2 : echo '★★';
                                       break;
                                        case 3 : echo '★★★';
                                       break;
                                        case 4 : echo '★★★★';
                                       break;
                                        case 5 : echo '★★★★★';
                                       break;
                           } }else{
                                  echo 'ฅ^•ﻌ•^ฅ';  
                                }
                                ?></p>
                            <p class="fechacomentarios"><?php echo $comentario['fecha']; ?></p>
                            <p class="emailcomentarios"><?php echo $comentario['email']; ?></p>
                            <p class="pcomentarios"><?php echo $comentario['descripcion']; ?></p>

                        </article>
                    </div>

                    <?php }
					   }
					}
                            if ($existeComentario == false){?>
                    <p> ¡Deja tu opinión en un comentario!</p>
                    <?php } ?>

                </div>
            </div>
        </section>
    </main>

    <?php  
    require "footer.php";
?>

</body>

</html>
