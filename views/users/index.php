<div class="container mt-4">
    <h1 class="mb-3">Agregar Usuario</h1>
    <?php if(isset($args["result"]) && $args["result"] == true):?>
    <div class="alert alert-success" role="alert">
      <strong>El usuario ha sido añadido correctamente</strong>
    </div>
  <?php elseif(isset($args["result"]) && $args["result"] == false):?>
    <div class="alert alert-danger" role="alert">
      <strong>An error has ocurred.</strong>
    </div>  
  <?php endif?>
    <form method="post" class="mb-4 mt-3">
        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" name="name" id="" class="form-control" placeholder="Ingrese su nombre" aria-describedby="helpId">
        </div>
        <div class="form-group">
          <label for="lastname">Apellido:</label>
          <input type="text" name="lastname" id="" class="form-control" placeholder="Ingrese su apellido" aria-describedby="helpId">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name="email" id="email" class="form-control" placeholder="Ingrese su email" aria-describedby="helpId">
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>

</div>