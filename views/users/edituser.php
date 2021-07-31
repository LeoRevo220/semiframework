<div class="container mt-4">
    <div class="row">
      <div class="offset-4 col-md-4">
        <h1 class="mb-3">Editar Usuario</h1>
          <form method="post" class="mb-4">
              <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese su nombre" aria-describedby="helpId" value="<?php echo $user->getName()?>">
              </div>
              <div class="form-group">
                <label for="lastname">Apellido:</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Ingrese su nombre" aria-describedby="helpId" value="<?php echo $user->getLastName()?>">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Ingrese su email" aria-describedby="helpId" value="<?php echo $user->getEmail()?>">
              </div>
              <input type="hidden" name="id" value="<?php echo $user->getId()?>">
              <button type="submit" class="btn btn-primary">Editar Usuario</button>
          </form>
        <?php if(isset($args["result"]) && $args["result"] == true):?>
          <div class="alert alert-success" role="alert">
            <strong>success</strong>
          </div>
        <?php elseif(isset($args["result"]) && $args["result"] == false):?>
          <div class="alert alert-danger" role="alert">
            <strong>An error has ocurred.</strong>
          </div>  
        <?php endif?>
      </div>  
    </div>

</div>