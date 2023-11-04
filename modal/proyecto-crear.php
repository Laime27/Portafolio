<div class="modal fade" id="PortafolioCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 m-auto" id="exampleModalLabel">Crear Nuevo Proyecto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" id="Form" action="../Controlador/Control-proyecto.php" enctype="multipart/form-data">

        <div class="form-group">
            <label for="imagenProyecto">Imagen de Fondo</label>
            <input type="file" class="form-control" name="imagenProyecto" >
        </div>
        <div class="form-group">
            <label for="TituloProyecto">Título de tu Proyecto</label>
            <input  class="form-control" name="TituloProyecto">
        </div>
        <div class="form-group">
            <label for="ContenidoProyecto">Descripción</label>
            <textarea class="form-control"  name="ContenidoProyecto" oninput="limitarCaracteres(this, 250)" ></textarea>
            <p id="contador-caracteres">250 caracteres restantes</p>
        </div>
        <div class="form-group">
            <label for="dominioProyecto">Enlace de tu Dominio o Página Web</label>
            <input class="form-control"  name="dominioProyecto">
        </div>
        <div class="form-group">
            <label for="githubProyecto">Enlace del GitHub del Proyecto</label>
            <input class="form-control"  name="githubProyecto">
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" onclick="ConfirmarCrear()" class="btn btn-primary">Crear</button>
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

  <script src="../js/proyecto.js"></script>