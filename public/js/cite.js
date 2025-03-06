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
      var id_cita = document.getElementById("id_cita");
      id_cita.value = id;
      var descripcion = document.getElementById("descripcion");
      descripcion.innerHTML = response.data["descripcion"] || "Sin Dato";

      var codigo = document.getElementById("codigo");
      codigo.innerHTML = response.data["codigo"] || "Sin Dato";
      var razon_social = document.getElementById("razon_social");
      razon_social.innerHTML = response.data.customer.Razon_Social || "Sin Dato";

      var hora_cita = document.getElementById("hora_cita");
      var hora_cita_update = document.getElementById("hora_cita_update");

      hora_cita.innerHTML = response.data["hora"] || "Sin Dato";
      hora_cita_update.value = response.data["hora"] || "Sin Dato";


      var motivo = document.getElementById("motivo_cita");
      motivo.innerHTML = response.data["motivo"] || "Sin Dato";

      var manzana = document.getElementById("manzana");
      manzana.innerHTML = response.data["manzana"] || "Sin Dato";

      var fecha_cita = document.getElementById("fecha_cita");
      var fecha_cita_update = document.getElementById("fecha_cita_update");
      fecha_cita_update.value = response.data["fecha"] || "Sin Dato";
      fecha_cita.innerHTML = response.data["fecha"] || "Sin Dato";

      var encargado = document.getElementById("encargado");
      encargado.innerHTML = response.data["generado"] || "Sin Dato";
      var lote = document.getElementById("lote");
      lote.innerHTML = response.data["lote"] || "Sin Dato";
      var dni = document.getElementById("dni");
      dni.innerHTML = response.data.customer["DNI"] || "Sin Dato";
      var hora_creada = document.getElementById("hora_creada");
      hora_creada.innerHTML = response.data["horag"] || "Sin Dato";
      var tipo = document.getElementById("tipo_cita");
      tipo.innerHTML = response.data["tipo"] || "Sin Dato";
      var fecha_repro = document.getElementById("fecha_repro");
      fecha_repro.innerHTML = response.data["fecha_repro"] || "Sin Dato";
      var telefono = document.getElementById("telefono");
      telefono.innerHTML = response.data.customer["Telefono"] || "Sin Dato";
      var fecha_creada = document.getElementById("fecha_creada");
      fecha_creada.innerHTML = response.data["fechag"] || "Sin Dato";
      var hora_repro = document.getElementById("hora_repro");
      hora_repro.innerHTML = response.data["hora_repro"] || "Sin Dato";

      var archivo = document.getElementById("archivo");
      if (!response.data["archivo"]) {
        archivo.innerHTML = "No hay archivo disponible";
      } else {
        archivo.innerHTML =
          "<a target='_blank' href='https://atenciones.aybarsac.com/php/ver_pdf.php?file=" +
          response.data["archivo"] +
          "'>Ver Archivo</a> ";
      }

      var comentarios = response.data.comment;
      var comentariosHTML = '';
      if (Array.isArray(comentarios) && comentarios.length > 0) {
        // Agregar el título una sola vez
        comentariosHTML += `
            <label for="control-label" style="color: #000; margin-bottom: 2vh; margin-top: 2vh;">Historial de respuestas al Cliente (Ordenado desde el más reciente)</label>
        `;

        // Generar el HTML para cada comentario
        comentarios.forEach(function(comentario) {
          // Determinar la clase del badge según el estado
          var badgeClass = "";
          switch (comentario.estado) {
            case "Pendiente":
              badgeClass = "text-bg-success";
              break;
            case "Proceso":
              badgeClass = "text-bg-primary";
              break;
            case "Atendido":
              badgeClass = "text-bg-info";
              break;
            case "Observado":
              badgeClass = "text-bg-danger";
              break;
            case "Finalizado":
              badgeClass = "text-bg-light";
              break;
            case "Cerrado":
              badgeClass = "text-bg-dark";
              break;
            default:
              badgeClass = "text-bg-secondary"; // Clase por defecto
              break;
          }

          comentariosHTML += `
                <div class="col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex" style="justify-content: space-between;">
                                <p class="card-subtitle mb-2 d-flex align-items-center">
                                    <i class="ti ti-calendar me-1 fs-5"></i> ${comentario.fecha}
                                </p>
                                <p class="card-subtitle mb-2 d-flex align-items-center">
                                    <span class="mb-1 badge ${badgeClass}">${comentario.estado}</span>
                                </p>
                                <p class="card-subtitle mb-2 d-flex align-items-center">
                                    <i class="ti ti-clock-hour-3 me-1 fs-5"></i> ${comentario.hora}
                                </p>
                            </div>
                            <p class="card-text pt-2">${comentario.comentario}</p>
                            <div class="comment-image-container text-center">
                                ${
                                  comentario.archivo
                                    ? `
                                    ${
                                      comentario.archivo.toLowerCase().endsWith(".pdf")
                                        ? `
                                        <a href="php/ver_archivothree.php?file=${comentario.archivo}" target="_blank">
                                            <img class="mb-3" src="imagen/documento.png" width="200" height="200" alt="Documento PDF">
                                        </a>
                                    `
                                        : `
                                        <a href="php/ver_imagenthree.php?file=${comentario.archivo}" target="_blank">
                                            <img class="mb-3" src="php/ver_imagenthree.php?file=${
                                              comentario.archivo
                                            }" width="300" height="200" alt="Imagen">
                                        </a>
                                    `
                                    }
                                `
                                    : ""
                                }
                            </div>
                            <div class="d-flex" style="justify-content: space-between;">
                                <button class="btn btn-primary btn-sm"
                                 onclick=commentNotify('${comentario.id_comentario}','${comentario.id_cita}')>Enviar Correo</button>

                            </div>
                        </div>
                    </div>
                </div>`;
        });
      } else {
        comentariosHTML = '<div class="col-12"><p>No se encontraron comentarios.</p></div>';
      }

      // Colocar el HTML en el contenedor deseado
      $("#comentariosContainer").html(comentariosHTML); // Asegúrate de tener un contenedor con este ID
    })
    .catch(function(response) {
      //handle error
      console.log(response);
    });
}
function citeEdit_all(id) {
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
        var id_cita = document.getElementById("id_cita");
        id_cita.value = id;
        var descripcion = document.getElementById("descripcion");
        descripcion.innerHTML = response.data["descripcion"] || "Sin Dato";

        var codigo = document.getElementById("codigo");
        codigo.innerHTML = response.data["codigo"] || "Sin Dato";
        var razon_social = document.getElementById("razon_social");
        razon_social.innerHTML = response.data.customer.Razon_Social || "Sin Dato";

        var hora_cita = document.getElementById("hora_cita");
        var hora_cita_update = document.getElementById("hora_cita_update");

        hora_cita.innerHTML = response.data["hora"] || "Sin Dato";
        hora_cita_update.value = response.data["hora"] || "Sin Dato";


        var motivo = document.getElementById("motivo_cita");
        motivo.innerHTML = response.data["motivo"] || "Sin Dato";

        var manzana = document.getElementById("manzana");
        manzana.innerHTML = response.data["manzana"] || "Sin Dato";

        var fecha_cita = document.getElementById("fecha_cita");
        var fecha_cita_update = document.getElementById("fecha_cita_update");
        fecha_cita_update.value = response.data["fecha"] || "Sin Dato";
        fecha_cita.innerHTML = response.data["fecha"] || "Sin Dato";

        var encargado = document.getElementById("encargado");
        encargado.innerHTML = response.data["generado"] || "Sin Dato";
        var lote = document.getElementById("lote");
        lote.innerHTML = response.data["lote"] || "Sin Dato";
        var dni = document.getElementById("dni");
        dni.innerHTML = response.data.customer["DNI"] || "Sin Dato";
        var hora_creada = document.getElementById("hora_creada");
        hora_creada.innerHTML = response.data["horag"] || "Sin Dato";
        var tipo = document.getElementById("tipo_cita");
        tipo.innerHTML = response.data["tipo"] || "Sin Dato";
        var fecha_repro = document.getElementById("fecha_repro");
        fecha_repro.innerHTML = response.data["fecha_repro"] || "Sin Dato";
        var telefono = document.getElementById("telefono");
        telefono.innerHTML = response.data.customer["Telefono"] || "Sin Dato";
        var fecha_creada = document.getElementById("fecha_creada");
        fecha_creada.innerHTML = response.data["fechag"] || "Sin Dato";
        var hora_repro = document.getElementById("hora_repro");
        hora_repro.innerHTML = response.data["hora_repro"] || "Sin Dato";

        var archivo = document.getElementById("archivo");
        if (!response.data["archivo"]) {
          archivo.innerHTML = "No hay archivo disponible";
        } else {
          archivo.innerHTML =
            "<a target='_blank' href='https://atenciones.aybarsac.com/php/ver_pdf.php?file=" +
            response.data["archivo"] +
            "'>Ver Archivo</a> ";
        }

        var comentarios = response.data.comment;
        var comentariosHTML = '';
        if (Array.isArray(comentarios) && comentarios.length > 0) {
          // Agregar el título una sola vez
          comentariosHTML += `
              <label for="control-label" style="color: #000; margin-bottom: 2vh; margin-top: 2vh;">Historial de respuestas al Cliente (Ordenado desde el más reciente)</label>
          `;

          // Generar el HTML para cada comentario
          comentarios.forEach(function(comentario) {
            // Determinar la clase del badge según el estado
            var badgeClass = "";
            switch (comentario.estado) {
              case "Pendiente":
                badgeClass = "text-bg-success";
                break;
              case "Proceso":
                badgeClass = "text-bg-primary";
                break;
              case "Atendido":
                badgeClass = "text-bg-info";
                break;
              case "Observado":
                badgeClass = "text-bg-danger";
                break;
              case "Finalizado":
                badgeClass = "text-bg-light";
                break;
              case "Cerrado":
                badgeClass = "text-bg-dark";
                break;
              default:
                badgeClass = "text-bg-secondary"; // Clase por defecto
                break;
            }

            comentariosHTML += `
                  <div class="col-md-6 col-lg-12">
                      <div class="card">
                          <div class="card-body">
                              <div class="d-flex" style="justify-content: space-between;">
                                  <p class="card-subtitle mb-2 d-flex align-items-center">
                                      <i class="ti ti-calendar me-1 fs-5"></i> ${comentario.fecha}
                                  </p>
                                  <p class="card-subtitle mb-2 d-flex align-items-center">
                                      <span class="mb-1 badge ${badgeClass}">${comentario.estado}</span>
                                  </p>
                                  <p class="card-subtitle mb-2 d-flex align-items-center">
                                      <i class="ti ti-clock-hour-3 me-1 fs-5"></i> ${comentario.hora}
                                  </p>
                              </div>
                              <p class="card-text pt-2">${comentario.comentario}</p>
                              <div class="comment-image-container text-center">
                                  ${
                                    comentario.archivo
                                      ? `
                                      ${
                                        comentario.archivo.toLowerCase().endsWith(".pdf")
                                          ? `
                                          <a href="php/ver_archivothree.php?file=${comentario.archivo}" target="_blank">
                                              <img class="mb-3" src="imagen/documento.png" width="200" height="200" alt="Documento PDF">
                                          </a>
                                      `
                                          : `
                                          <a href="php/ver_imagenthree.php?file=${comentario.archivo}" target="_blank">
                                              <img class="mb-3" src="php/ver_imagenthree.php?file=${
                                                comentario.archivo
                                              }" width="300" height="200" alt="Imagen">
                                          </a>
                                      `
                                      }
                                  `
                                      : ""
                                  }
                              </div>

                          </div>
                      </div>
                  </div>`;
          });
        } else {
          comentariosHTML = '<div class="col-12"><p>No se encontraron comentarios.</p></div>';
        }

        // Colocar el HTML en el contenedor deseado
        $("#comentariosContainer").html(comentariosHTML); // Asegúrate de tener un contenedor con este ID
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
      // var contentdiv = document.getElementById("mycontent");
      // contentdiv.innerHTML = response.data;
      //carga pdf- csv - excel
      // datatable_load();
      console.log(response.data);
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


function commentNotify(id_comentario,id_cita) {
    var formData = new FormData(document.getElementById("cite"));
      formData.append("id_comentario", id_comentario);
      formData.append("id_cita", id_cita);
      axios({
        method: "post",
        url: "../commentNotify",
        data: formData,
        headers: {
          "Content-Type": "multipart/form-data"
        }
      })
        .then(function(response) {
          //carga pdf- csv - excel

          alert("Enviado correctamente");
        })
        .catch(function(response) {
          //handle error
          console.log(response);
        });

  }
  function commentStore() {
    var formData = new FormData(document.getElementById("comment_form"));
    let fecha_cita_update =document.getElementById("fecha_cita_update").value;
    let hora_cita_update =document.getElementById("hora_cita_update").value;
    let id_cita =document.getElementById("id_cita").value;
      formData.append("fecha", fecha_cita_update);
      formData.append("hora", hora_cita_update);
      formData.append("id_cita", id_cita);
      axios({
        method: "post",
        url: "../commentStore",
        data: formData,
        headers: {
          "Content-Type": "multipart/form-data"
        }
      })
        .then(function(response) {
          //carga pdf- csv - excel

          alert("Agregado correctamente");
          citeEdit(id_cita);
          console.log(response);
        })
        .catch(function(response) {
          //handle error
          console.log(response);
        });

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
