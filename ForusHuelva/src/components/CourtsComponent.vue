<template>
  <div>
    <div class="row mt-5">
      <Toast />

      <div class="col-lg-8 offset-lg-2">
        <div class="table-responsive-vertical p-3">

          <div class="row">
            <div class="d-flex justify-content-center">
              <h2>
                Lista Pistas
              </h2>
            </div>
          </div>
          <DataTable :value="courts" stripedRows :paginator="true" :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]"
            tableStyle="min-width: 50rem">
            <Column field="id" header="Id" sortable style="width: 25%"></Column>
            <Column field="name" header="Nombre" sortable style="width: 25%"></Column>
            <Column field="sport" header="Email" sortable style="width: 25%"></Column>
            <Column header="Operaciones" style="width: 25%">
              <template #body="slotProps">
                <Button class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar"
                  @click="selectPoliza(slotProps.data)">
                  X
                </Button>
                <Button class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#vista"
                  @click="selectPoliza(slotProps.data)">
                  O
                </Button>
                <Button class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#editarPoliza"
                  @click="selectPoliza(slotProps.data)">
                  M
                </Button>
              </template>
            </Column>
          </DataTable>


        </div>

      </div>
    </div>

    <!-- Modales -->

    <!-- Modal Eliminar -->
    <div class="modal fade" id="eliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h5 class="modal-title text-light" id="staticBackdropLabel">¿Quieres Eliminar?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">Se va a eliminar toda la fila.</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger" @click="eliminarPoliza">Si</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Vista -->
    <div class="modal fade" id="vista" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h5 class="modal-title text-light" id="staticBackdropLabel">Vista Poliza</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="id" placeholder="name@example.com"
                    v-model="selectedPoliza.id" readonly />
                  <label for="floatingInput">Id de la póliza</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="start_date" placeholder="name@example.com"
                    v-model="selectedPoliza.start_date" readonly />
                  <label for="floatingInput">Fecha de Inicio</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <!-- Campo Nombre -->
                <div class="form-floating mb-3" v-if="selectedPoliza.client && selectedPoliza.client.name !== undefined">
                  <input type="text" class="form-control" id="nombre" placeholder="name@example.com"
                    v-model="selectedPoliza.client.name" readonly />
                  <label for="floatingInput">Nombre</label>
                </div>
              </div>
              <div class="col-lg-6">
                <!-- Campo Email -->
                <div class="form-floating mb-3" v-if="selectedPoliza.client && selectedPoliza.client.email !== undefined">
                  <input type="email" class="form-control" id="email" placeholder="name@example.com"
                    v-model="selectedPoliza.client.email" readonly />
                  <label for="floatingInput">Email</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="importe" placeholder="name@example.com"
                    v-model="selectedPoliza.importe" readonly />
                  <label for="floatingInput">Importe</label>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="pagado" placeholder="name@example.com"
                    v-model="selectedPoliza.monto" readonly />
                  <label for="floatingInput">Cantidad Pagada</label>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="resto" placeholder="name@example.com"
                    v-model="selectedPoliza.rest" readonly />
                  <label for="floatingInput">Resto del Pago</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="status" placeholder="name@example.com"
                    v-model="selectedPoliza.status" readonly />
                  <label for="floatingInput">Estado de la poliza</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="observation" placeholder="name@example.com"
                    v-model="selectedPoliza.observation" readonly />
                  <label for="floatingInput">Observaciones</label>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Nueva Sub -->
    <div class="modal fade" id="dardealta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg"> <!-- Ajusta la clase modal-dialog -->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nueva Poliza</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <Toast />

              <div class="row justify-content-center m-3">
                <form @submit.prevent="crearPoliza">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <select id="cliente" v-model="clienteSeleccionado" @change="actualizarNombre" class="form-select">
                          <option value="" disabled selected>Selecciona un cliente</option>
                          <option v-for="cliente in clientes" :key="cliente.id" :value="cliente.id">
                            {{ cliente.email }}
                          </option>
                        </select>
                        <label for="cliente">Email</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="nombre" v-model="nombre" placeholder="Nombre"
                          required />
                        <label for="nombre">Nombre</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" placeholder="name@example.com" v-model="importe"
                          required />
                        <label for="floatingInput">Importe</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="fechaInicio" placeholder="name@example.com"
                          v-model="start_date" required />
                        <label for="fechaInicio">Fecha de Inicio</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-7">
                      <div class="form-floating mb-3">
                        <select v-model="status" class="form-control" placeholder="name@example.com" required>
                          <option value="" disabled selected>Elige el estado de la tarea</option>
                          <option value="cobrada">cobrada</option>
                          <option value="a cuenta">a cuenta</option>
                          <option value="liquidada">liquidada</option>
                          <option value="anulada">anulada</option>
                          <option value="pre anulada">pre anulada</option>
                        </select>
                        <label for="floatingInput">Estado</label>
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="form-floating mb-3">
                        <input type="text" v-model="observation" class="form-control" placeholder="name@example.com" />
                        <label for="floatingInput">Observaciones</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 mb-3">
                      <button type="submit" class="btn btn-primary btn-block w-100">Crear Póliza</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal editar Cliente -->
    <div class="modal fade" id="editarPoliza" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-warning">
            <h5 class="modal-title" id="exampleModalLabel">Editar Poliza</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row justify-content-center m-3">
                <h2 class="card-title text-center mb-4">Editar Poliza</h2>

                <form @submit.prevent="editarPoliza">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="importe" placeholder="name@example.com"
                          v-model="selectedPoliza.importe" required />
                        <label for="floatingInput">Importe</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="start_date" placeholder="name@example.com"
                          v-model="selectedPoliza.start_date" required />
                        <label for="floatingInput">Fecha de Inicio</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-7">
                      <div class="form-floating mb-3">
                        <select name="" class="form-control" id="status" placeholder="name@example.com"
                          v-model="selectedPoliza.status" required>
                          <option value="cobrada">cobrada</option>
                          <option value="a cuenta">a cuenta</option>
                          <option value="liquidada">liquidada</option>
                          <option value="anulada">anulada </option>
                          <option value="pre anulada">pre anulada </option>


                        </select>
                        <label for="floatingInput">Estado</label>
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="observation" placeholder="name@example.com"
                          v-model="selectedPoliza.observation" />
                        <label for="floatingInput">Observaciones</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 mb-3">
                      <button type="submit" class="btn btn-warning btn-block w-100">Editar Poliza</button>

                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</template>

<script setup>
import api from '@/services/service';
import { ref, onMounted } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import { useToast } from "primevue/usetoast";
import Toast from 'primevue/toast';
import Tag from 'primevue/tag';
import { useRouter } from 'vue-router';
const router = useRouter();
const toast = useToast();
const importe = ref('')
const monto = ref(0.0)
const rest = ref('') // Declarar rest como una referencia independiente
const start_date = ref('')
const status = ref('')
const observation = ref('')
const clientes = ref([])
const clienteSeleccionado = ref('')
const nombre = ref('') // Modelo para el nombre

const selectedPolizaInfo = ref({
  name: '',
  email: ''
});


const courts = ref([]);
const selectedPoliza = ref({});
const cantidadPagar = ref(0);

const showError = () => {
  toast.add({ severity: 'error', summary: 'Error', detail: 'Algo no ha salido como se esperaba', life: 3000 });
};
const showSuccess = () => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: 'Todo esta en orden', life: 3000 });
};


const obtenerCourts = async () => {
  try {
    const respuesta = await api.get('/courts');
    courts.value = respuesta.data;

  } catch (error) {
    console.error(error);
  }
}



const selectPoliza = (poliza) => {
  selectedPoliza.value = poliza;
  // Verificar si la información del cliente está definida
  if (poliza.client && poliza.client.name !== undefined && poliza.client.email !== undefined) {
    selectedPolizaInfo.value.name = poliza.client.name;
    selectedPolizaInfo.value.email = poliza.client.email;
  } else {
    // Si la información del cliente no está definida, restablecer la variable selectedPolizaInfo
    selectedPolizaInfo.value.name = '';
    selectedPolizaInfo.value.email = '';
  }
};

const eliminarPoliza = async () => {
  try {
    if (!selectedPoliza.value) {
      console.error('No hay cliente seleccionado para eliminar.');
      return;
    }

    const idPoliza = selectedPoliza.value.id;
    const response = await api.delete(`/polizas/${idPoliza}`);

    if (response.status === 204) {

      polizas.value = polizas.value.filter(cliente => cliente.id !== idPoliza);
      cerrarModalBorrar();
      showSuccess();

    } else {
      showError();

      console.error('Error al eliminar el cliente.');
    }
  } catch (error) {
    showError();

    console.error('Error al eliminar el cliente:', error);
  }
};

const editarPoliza = async () => {
  try {
    const idPoliza = selectedPoliza.value.id;
    const response = await api.put(`/polizas/${idPoliza}`, {
      importe: selectedPoliza.value.importe,
      start_date: selectedPoliza.value.start_date,
      status: selectedPoliza.value.status,
      observation: selectedPoliza.value.observation
    });

    if (response.status === 200) {
      console.log('Póliza actualizada correctamente.');
      showSuccess();
      cerrarModalEditar();
      obtenerCourts();
    } else {
      showError();

      console.error('Error al editar la póliza.');
    }
  } catch (error) {
    showError();

    console.error('Error al editar la póliza:', error);
  }
};
const pagarImporte = async () => {
  try {
    if (!selectedPoliza.value || !selectedPoliza.value.importe) {
      console.error('Seleccione una póliza y especifique el importe a pagar.');
      return;
    }

    const idPoliza = selectedPoliza.value.id;

    // Obtener el importe proporcionado desde el formulario
    const importePagado = cantidadPagar.value;

    // Obtener la información de la póliza desde la base de datos
    const response = await api.get(`/polizas/${idPoliza}`);
    const poliza = response.data;

    // Calcular el nuevo monto pagado
    const nuevoMonto = poliza.monto + importePagado;

    // Calcular el nuevo resto
    const nuevoResto = poliza.importe - nuevoMonto;

    // Actualizar la información de la póliza en la base de datos
    const responseUpdate = await api.put(`/polizas/${idPoliza}`, {
      monto: nuevoMonto,
      rest: nuevoResto,
      status: nuevoResto <= 0 ? 'cobrada' : 'a cuenta' // Actualizar el estado
    });

    if (responseUpdate.status === 200) {
      console.log('Póliza actualizada correctamente.');
      // Limpiar el valor de cantidadPagar después de pagar
      cantidadPagar.value = 0;
      // Actualizar la lista de pólizas
      showSuccess();
      cerrarCollapse();

      obtenerCourts();
    } else {
      console.error('Error al actualizar la póliza.');
    }
  } catch (error) {
    console.error('Error al pagar la póliza:', error);
  }
};

const cerrarModalEditar = async () => {
  const editarPolizaModal = document.getElementById("editarPoliza");
  const closeButton = editarPolizaModal.querySelector(
    '[data-bs-dismiss="modal"]'
  );
  closeButton.click();
};

const cerrarModalBorrar = async () => {
  const borrarPolizaModal = document.getElementById("eliminar");
  const closeButton = borrarPolizaModal.querySelector(
    '[data-bs-dismiss="modal"]'
  );
  closeButton.click();
};

const crearPoliza = async () => {
  try {
    rest.value = importe.value;

    await api.post('/polizas', {
      importe: importe.value,
      monto: monto.value,
      rest: rest.value,
      start_date: start_date.value,
      status: status.value,
      observation: observation.value,
      client_id: clienteSeleccionado.value
    });

    cerrarModalCrear();
    showSuccess();
    importe.value = ''; // Vaciar el campo de importe
    monto.value = 0.0; // Reiniciar el monto a 0
    rest.value = ''; // Vaciar el campo de resto
    start_date.value = ''; // Reiniciar la fecha de inicio
    status.value = ''; // Reiniciar el estado
    observation.value = ''; // Vaciar el campo de observaciones
    clienteSeleccionado.value = ''; // Reiniciar el cliente seleccionado
    nombre.value = ''; // Reiniciar el nombre
    // Llamar a la función para obtener las pólizas después de crear una nueva póliza
    obtenerCourts();
  } catch (error) {
    showError();
    console.error(error);
  }
};

const obtenerClientes = async () => {
  try {
    const respuesta = await api.get('/clientes')
    clientes.value = respuesta.data
  } catch (error) {
    console.log(error)
  }
}

const actualizarNombre = () => {
  const cliente = clientes.value.find((cli) => cli.id === clienteSeleccionado.value)
  nombre.value = cliente ? cliente.name : ''
}

const cerrarModalCrear = async () => {
  const crearPolizaModal = document.getElementById('dardealta')
  const closeButton = crearPolizaModal.querySelector('[data-bs-dismiss="modal"]')
  closeButton.click()
}

const cerrarCollapse = async () => {
  const collapseElement = document.getElementById("collapseEdit");
  const collapse = new bootstrap.Collapse(collapseElement);
  collapse.hide();
};

onMounted(() => {
  obtenerClientes();
  obtenerCourts();
});
</script>
