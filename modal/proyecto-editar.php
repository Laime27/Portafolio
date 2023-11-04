<div class="modal fade" id="PortafolioEditar<?php echo $Portafolio["idproyecto"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 m-auto" id="exampleModalLabel">Modificar Proyecto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="../Controlador/Control-proyecto.php" enctype="multipart/form-data">

          <input type="hidden" value="<?php echo $Portafolio["idproyecto"] ?>" name="idProyecto">

          <div class="form-group">
            <label for="imagenProyecto">Imagen de Fondo</label>
            <div class="m-2"><img src="../img/<?php echo $Portafolio["proyectoImagen"] ?>" width="80" height="80" class="img-fluid"></div>
            <input type="file" class="form-control" name="imagenProyecto">
          </div>
          <div class="form-group">
            <label for="TituloProyecto">Título de tu Proyecto</label>
            <input class="form-control" name="TituloProyecto" value="<?php echo $Portafolio["tituloProyecto"] ?>">
          </div>
          <div class="form-group">
            <label for="ContenidoProyecto">Descripción</label>
            <textarea class="form-control" name="ContenidoProyecto" oninput="limitarCaracteres(this, 250)"><?php echo $Portafolio["contenidoProyecto"] ?></textarea>
            <p id="contador-caracteres">250 caracteres restantes</p>
          </div>
          <div class="form-group">
            <label for="dominioProyecto">Enlace de tu Dominio o Página Web</label>
            <input class="form-control" name="dominioProyecto" value="<?php echo $Portafolio["dominio"] ?>">
          </div>
          <div class="form-group">
            <label for="githubProyecto">Enlace del GitHub del Proyecto</label>
            <input class="form-control" name="githubProyecto" value="<?php echo $Portafolio["github"] ?>">
          </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="accion" value="actualizarProyecto">Guardar</button>

      </div>

      </form>

    </div>
  </div>
</div>



<script>
  function limitarCaracteres(element, maxChars) {
    if (element.value.length > maxChars) {
      element.value = element.value.substring(0, maxChars);
    }
    var caracteresRestantes = maxChars - element.value.length;
    document.getElementById("contador-caracteres").textContent = caracteresRestantes + " caracteres restantes";
  }
</script>