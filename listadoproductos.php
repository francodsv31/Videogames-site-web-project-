<!DOCTYPE html>
<html lang="es">

<?php 
    require "header.php";
    require "filtro.php";
?>

<body>

    <main>
        <section>

            <div class="container listadodivcards">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="tituloseccion"><img src="imagenes/iconos/iconocatalogo65.jpg" alt="Icono catálogo tamaño 65" width="65" height="65" class="img-fluid rounded-circle"> CATÁLOGO DE PRODUCTOS</h1>
                    </div>
                </div>

                <div class="row">

                    <?php 
                    foreach($fprArray as $productito){ 
					$flagPrint = true;
					if(!empty($_GET['plataformas'])  AND $flagPrint ){
						if($_GET['plataformas'] == $productito['plataforma']){
							$flagPrint = true;
						}else{
							$flagPrint = false;
						}
					}
					if(!empty($_GET['generos']) AND $flagPrint){
						if($_GET['generos'] == $productito['genero']){
							$flagPrint = true;
						}else{
							$flagPrint = false;
						}
					}
					
					if($flagPrint){ ?>

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
