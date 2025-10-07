<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Productos</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="form">
      <?php include "php/menu_productos.php"; ?>
      
      <div class="tab-content">
        <div id="alta">
            
          <h1>Ingresar nuevo Producto</h1>
          
          <form action="#" method="post">
    
          <div class="field-wrap">
            <label>
              Descripción<span class="req">*</span>
            </label>
            <input type="text" name="descripcion" required autocomplete="off"/>
          </div>
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Precio<span class="req">*</span>
              </label>
              <input type="text" name="precio" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
             
            </div>
          </div>
          
          <button type="submit" name="guardar" class="button button-block"/>Guardar</button>
         
          </form>

        </div>
        
        <div id="listado">   
          <h1>Productos disponibles</h1>
          <!-- Espacio destinado para mostrar una tabla de registros --> 
        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
