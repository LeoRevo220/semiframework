<div class="container mt-4">
    <?php if(count($allUsers) > 0):?> 
    <h1>Todos los usuarios.</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($allUsers as $key => $value):?>
                <tr>
                    <th scope="row"><?php echo $key+1?></th>
                    <td><?php echo $value["Nombre"]?></td>
                    <td><?php echo $value["Apellido"]?></td>
                    <td><?php echo $value["Email"]?></td>
                    <td>
                        <div class="d-flex">
                            <a href="<?php echo "/semiframework/".UsersController::ROUTE."/".UsersController::EDIT_USER."/".$value["Id"]?>" class="btn btn-primary mr-3">Editar</a>
                            <form action="<?php echo "/semiframework/".UsersController::ROUTE."/".UsersController::DELETE?>" method="post">
                                <input type="hidden" name="deleteId" value="<?php echo $value["Id"]?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form> 
                        </div>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <?php else:?>
        <h1>No hay usuarios registrados</h1>
    <?php endif?>    
</div>