function ConfirmarEliminar(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'mr-2 btn btn-danger'
        },
        buttonsStyling: false,
        timer: null
    });

    swalWithBootstrapButtons.fire({
        title: '¿Estás seguro que quieres eliminar?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'No, cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
                title: 'Eliminado',
                text: 'Tu archivo ha sido eliminado.',
                icon: 'success',
                showConfirmButton: false,
                timer: 1000
            }).then(() => {
                window.location.href = '../vista/proyecto.php';
            });

            const formData = new FormData();
            formData.append('accion', 'eliminarProyecto');
            formData.append('idProyecto', id);

            fetch('../Controlador/Control-proyecto.php', {
                method: 'POST',
                body: formData
            });
        } 
    });
}

function ConfirmarCrear() {
    const formData = new FormData($('#Form')[0]); 
  
    formData.append('accion', 'CrearProyecto');
  
    fetch('../Controlador/Control-proyecto.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (response.ok) {  
        Swal.fire({
          position: 'top-center',
          icon: 'success',
          title: 'Nuevo Proyecto creado exitosamente',
          showConfirmButton: false,
          timer: 1500
        });
        setTimeout(() => {
          window.location.href = '../vista/proyecto.php';
        }, 1500);
      } 
    });
  }
  


function crearHabilidad(){
    const formData = new FormData();
    formData.append('accion', 'CrearHabilidad');

    fetch('../Controlador/Control-habilidades.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {  
            Swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Nueva tecnologia creado exitosamente',
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(() => {
                window.location.href = '../vista/habilidades.php';
            }, 1500);
        } 
    });
}



function EliminarHabilidad(id) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'mr-2 btn btn-danger'
        },
        buttonsStyling: false,
        timer: null
    });

    swalWithBootstrapButtons.fire({
        title: '¿Estás seguro que quieres eliminar?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'No, cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
                title: 'Eliminado',
                text: 'Tu archivo ha sido eliminado.',
                icon: 'success',
                showConfirmButton: false,
                timer: 1000
            }).then(() => {
                window.location.href = '../vista/habilidades.php';
            });

            const formData = new FormData();
            formData.append('accion', 'eliminarHabilidad');
            formData.append('idhabilidad', id);

            fetch('../Controlador/Control-habilidades.php', {
                method: 'POST',
                body: formData
            });
        } 
    });
}



