<div class="modal fade" id="HabilidadEditar<?php echo $Habilidades['idhabilidad']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 m-auto" id="exampleModalLabel">Modificar Tecnologia</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

     <form method="post" action="../Controlador/Control-habilidades.php" enctype="multipart/form-data">
        <input name="idhabilidad" value="<?php echo $Habilidades['idhabilidad']?>" type="hidden">
        <div class="form-group">
            <label for="imagenHabilidad">Imagen de la tecnologia</label>
            <input type="file" class="form-control" name="imagenHabilidad" >
        </div>
        

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="accion" value="actualizarHabilidad" class="btn btn-primary">Guardar</button>
      </div>

      </form>

    </div>
  </div>
</div>

<script src="../js/proyecto.js"></script>
