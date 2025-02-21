function citeStore() {
  var formData = new FormData(document.getElementById("cite"));
  axios({
    method: "post",
    url: "../citeStore",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      //handle success
      var contentdiv = document.getElementById("mycontent");
      contentdiv.innerHTML = response.data;
      //carga pdf- csv - excel
      datatable_load();
      alert("Registrado Correctamente");
    })
    .catch(function(response) {
      //handle error
      console.log(response);
    });
}

function citeEdit(id) {
  var formData = new FormData(document.getElementById("cite_filter"));
  formData.append("id", id);
  axios({
    method: "post",
    url: "../citeEdit",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      //handle success
      //var contentdiv = document.getElementById("mycontent");

      var descripcion = document.getElementById("descripcion");
      descripcion.innerHTML = response.data["descripcion"];

      var codigo = document.getElementById("codigo");
      codigo.innerHTML = response.data["codigo"];
      var razon_social = document.getElementById("razon_social");
      razon_social.innerHTML = response.data["razon_social"];
      var hora_cita = document.getElementById("hora_cita");
      hora_cita.innerHTML = response.data["hora_cita"];
      var motivo = document.getElementById("motivo");
      motivo.innerHTML = response.data["motivo"];
      var manzana = document.getElementById("manzana");
      manzana.innerHTML = response.data["manzana"];
      var fecha_cita = document.getElementById("fecha_cita");
      fecha_cita.innerHTML = response.data["fecha_cita"];
      var encargado = document.getElementById("encargado");
      encargado.innerHTML = response.data["encargado"];
      var lote = document.getElementById("lote");
      lote.innerHTML = response.data["lote"];
      var dni = document.getElementById("dni");
      dni.innerHTML = response.data["dni"];
      var hora_creada = document.getElementById("hora_creada");
      hora_creada.innerHTML = response.data["hora_creada"];
      var tipo = document.getElementById("tipo");
      tipo.innerHTML = response.data["tipo"];
      var fecha_repro = document.getElementById("fecha_repro");
      fecha_repro.innerHTML = response.data["fecha_repro"];
      var telefono = document.getElementById("telefono");
      telefono.innerHTML = response.data["telefono"];
      var fecha_creada = document.getElementById("fecha_creada");
      fecha_creada.innerHTML = response.data["fecha_creada"];
      var hora_repro = document.getElementById("hora_repro");
      hora_repro.innerHTML = response.data["hora_repro"];

    })
    .catch(function(response) {
      //handle error
      console.log(response);
    });
}

function citeUpdate() {
  var formData = new FormData(document.getElementById("cite"));
  axios({
    method: "post",
    url: "../citeUpdate",
    data: formData,
    headers: {
      "Content-Type": "multipart/form-data"
    }
  })
    .then(function(response) {
      //handle success
      var contentdiv = document.getElementById("mycontent");
      contentdiv.innerHTML = response.data;
      //carga pdf- csv - excel
      datatable_load();
      alert("Modificado Correctamente");
    })
    .catch(function(response) {
      //handle error
      console.log(response);
    });
}

function citeDestroy(id) {
  if (confirm("¿Quieres eliminar este registro?")) {
    var formData = new FormData(document.getElementById("cite"));
    formData.append("id", id);
    axios({
      method: "post",
      url: "../citeDestroy",
      data: formData,
      headers: {
        "Content-Type": "multipart/form-data"
      }
    })
      .then(function(response) {
        //handle success
        var contentdiv = document.getElementById("mycontent");
        contentdiv.innerHTML = response.data;
        //carga pdf- csv - excel
        datatable_load();
        alert("Eliminado Correctamente");
      })
      .catch(function(response) {
        //handle error
        console.log(response);
      });
  }
}

function citeFilter() {
    var formData = new FormData(document.getElementById("cite_filter"));

    let pathArray = window.location.pathname.split('/');

// Obtiene el último segmento de la URL
    let estado = pathArray[pathArray.length - 1];
    alert(estado);

    formData.append("estado", estado);
        axios({
          method: "post",
          url: "../citeFilter",
          data: formData,
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
          .then(function(response) {
            //handle success
            var contentdiv = document.getElementById("mycontent");

            contentdiv.innerHTML = response.data;
            //carga pdf- csv - excel
            datatable_load();

          })
          .catch(function(response) {
            //handle error
            console.log(response);
          });
      }
