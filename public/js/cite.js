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
      descripcion.innerHTML = response.data["descripcion"]|| "Sin Dato";

      var codigo = document.getElementById("codigo");
      codigo.innerHTML = response.data["codigo"]|| "Sin Dato";
      var razon_social = document.getElementById("razon_social");
      razon_social.innerHTML = response.data.customer.Razon_Social || "Sin Dato";;

      var hora_cita = document.getElementById("hora_cita");
      hora_cita.innerHTML = response.data["hora"]|| "Sin Dato";
      var motivo = document.getElementById("motivo_cita");
      motivo.innerHTML = response.data["motivo"]|| "Sin Dato";

      var manzana = document.getElementById("manzana");
      manzana.innerHTML = response.data["manzana"] || "Sin Dato";
      var fecha_cita = document.getElementById("fecha_cita");
      fecha_cita.innerHTML = response.data["fecha"]|| "Sin Dato";
      var encargado = document.getElementById("encargado");
      encargado.innerHTML = response.data["generado"]|| "Sin Dato";
      var lote = document.getElementById("lote");
      lote.innerHTML = response.data["lote"] || "Sin Dato";
      var dni = document.getElementById("dni");
      dni.innerHTML = response.data.customer["DNI"]|| "Sin Dato";
      var hora_creada = document.getElementById("hora_creada");
      hora_creada.innerHTML = response.data["horag"]|| "Sin Dato";
      var tipo = document.getElementById("tipo_cita");
      tipo.innerHTML = response.data["tipo"]|| "Sin Dato";
      var fecha_repro = document.getElementById("fecha_repro");
      fecha_repro.innerHTML = response.data["fecha_repro"] || "Sin Dato";
      var telefono = document.getElementById("telefono");
      telefono.innerHTML = response.data.customer["Telefono"]|| "Sin Dato";
      var fecha_creada = document.getElementById("fecha_creada");
      fecha_creada.innerHTML = response.data["fechag"]|| "Sin Dato";
      var hora_repro = document.getElementById("hora_repro");
      hora_repro.innerHTML = response.data["hora_repro"]|| "Sin Dato";

      var archivo = document.getElementById("archivo");
      if (!response.data["archivo"]){
        archivo.innerHTML ="No hay archivo disponible";
      }
      else{
        archivo.innerHTML = "<a target='_blank' href='"+response.data["archivo"] + "'>Ver Archivo</a> ";

      }
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

function filterMotivoArea(select) {
  var id = select.value;

  var formData = new FormData(document.getElementById("cite_filter"));
  formData.append("id", id);

  axios
    .post("../filterMotivoArea", formData, {
      headers: {
        "Content-Type": "multipart/form-data"
      }
    })
    .then(function(response) {
      var motivoSelect = document.getElementById("motivo");
      motivoSelect.innerHTML = ""; // Limpiar opciones previas

      if (response.data.length > 0) {
        // Agregar opción fija "Todos"
        var optionTodos = document.createElement("option");
        optionTodos.value = "";
        optionTodos.textContent = "Todos";
        motivoSelect.appendChild(optionTodos);

        response.data.forEach(function(item) {
          var option = document.createElement("option");
          option.value = item.nombre_motivo;
          option.textContent = item.nombre_motivo;
          motivoSelect.appendChild(option);
        });
      } else {
        var option = document.createElement("option");
        option.value = "";
        option.textContent = "Todos";
        motivoSelect.appendChild(option);
      }
    })
    .catch(function(error) {
      console.error("Error en la solicitud AJAX:", error);
    });
}
