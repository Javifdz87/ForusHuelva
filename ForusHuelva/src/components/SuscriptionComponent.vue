<template>
  <div>
    <div class="row mt-5">
      <Toast />

      <div class="col-lg-8 offset-lg-2 mt-5">
        <div class="table-responsive-vertical p-3">

          <div class="row">
            <div class="d-flex justify-content-center">
              <h2>
                Lista Suscripciones
              </h2>
            </div>
            <div class="d-flex justify-content-end">
              <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#dardealta">
                Nueva Suscripción
              </button>
            </div>
          </div>
          <DataTable :value="subs" stripedRows :paginator="true" :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]"
            tableStyle="min-width: 50rem">
            <Column field="id" header="Id" sortable style="width: 5%"></Column>
            <Column field="client.name" header="Nombre" sortable style="width: 11%"></Column>
            <Column field="client.email" header="Email" sortable style="width: 11%"></Column>
            <Column field="importe" header="Importe" sortable style="width: 8%"></Column>
            <Column field="date_pay" header="Pagado" sortable style="width: 8%"></Column>
            <Column field="observation" header="Tipo de pago" sortable style="width: 13%"></Column>
            <Column header="Operaciones" style="width: 18%">
              <template #body="slotProps">
                <Button class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar"
                  @click="selectSub(slotProps.data)">
                  X
                </Button>
                <Button class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#vista"
                  @click="selectSub(slotProps.data)">
                  O
                </Button>
                <Button class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#editarSub"
                  @click="selectSub(slotProps.data)">
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
            <button type="button" class="btn btn-danger" @click="eliminarSub">Si</button>
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
            <h5 class="modal-title text-light" id="staticBackdropLabel">Vista Sub</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="id" placeholder="name@example.com"
                    v-model="selectedSub.id" readonly />
                  <label for="floatingInput">Id</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" placeholder="name@example.com"
                    v-model="selectedSub.email" readonly />
                  <label for="floatingInput">Email</label>
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="start_date" placeholder="name@example.com"
                    v-model="selectedSub.name" readonly />
                  <label for="floatingInput">Nombre</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="id" placeholder="name@example.com"
                    v-model="selectedSub.importe" readonly />
                  <label for="floatingInput">Importe</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="start_date" placeholder="name@example.com"
                    v-model="selectedSub.date_pay" readonly />
                  <label for="floatingInput">Pagado</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="id" placeholder="name@example.com"
                    v-model="selectedSub.observation" readonly />
                  <label for="floatingInput">Observación</label>
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
            <h5 class="modal-title" id="exampleModalLabel">Nueva Suscripción</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <Toast />

              <div class="row justify-content-center m-3">
                <form @submit.prevent="crearSub">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <select id="cliente" v-model="clienteSeleccionado" @change="actualizarNombre"
                          class="form-select">
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
                        <input type="input" class="form-control" id="nombre" v-model="name" placeholder="Nombre"
                          required />
                        <label for="nombre">Nombre</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <select v-model="observation" id="subscription" class="form-control"
                          placeholder="name@example.com" required @change="updateImporte">
                          <option value="" disabled selected>Elige el tipo de suscripción</option>
                          <option value="3 meses">3 meses</option>
                          <option value="6 meses">6 meses</option>
                          <option value="12 meses">12 meses</option>
                        </select>
                        <label for="floatingInput">Estado</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" placeholder="name@example.com" v-model="importe"
                          id="importe" required readonly />
                        <label for="floatingInput">Importe</label>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" v-model="date_end" />
                  

                  <div class="row">
                    <div class="col-lg-12 mb-3">
                      <button type="submit" class="btn btn-primary btn-block w-100">Crear Suscripción</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal editar Suscripción -->
    <div class="modal fade" id="editarSub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-warning">
            <h5 class="modal-title" id="exampleModalLabel">Editar Sub</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row justify-content-center m-3">
                <h2 class="card-title text-center mb-4">Editar Sub</h2>

                <form @submit.prevent="editarSub">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <select id="cliente" v-model="clienteSeleccionado" @change="actualizarNombre"
                          class="form-select">
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
                        <input type="input" class="form-control" id="nombre" v-model="name" placeholder="Nombre"
                          required />
                        <label for="nombre">Nombre</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <select v-model="observation" id="subscription" class="form-control"
                          placeholder="name@example.com" required @change="updateImporte">
                          <option value="" disabled selected>Elige el tipo de suscripción</option>
                          <option value="3 meses">3 meses</option>
                          <option value="6 meses">6 meses</option>
                          <option value="12 meses">12 meses</option>
                        </select>
                        <label for="floatingInput">Estado</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" placeholder="name@example.com" v-model="importe"
                          id="importe" required readonly />
                        <label for="floatingInput">Importe</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 mb-3">
                      <button type="submit" class="btn btn-primary btn-block w-100">Editar Suscripción</button>
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
const name = ref('')
const observation = ref('')
const clientes = ref([])
const clienteSeleccionado = ref('')
const date_end = ref(''); // Variable para la fecha de caducidad


const updateImporte = () => {
  var subscription = observation.value;

  switch (subscription) {
    case "3 meses":
      importe.value = 59.99; // Valor para 3 meses
      calculateExpiryDate(3);
      break;
    case "6 meses":
      importe.value = 105.99; // Valor para 6 meses
      calculateExpiryDate(6);
      break;
    case "12 meses":
      importe.value = 219.99; // Valor para 12 meses
      calculateExpiryDate(12);
      break;
    default:
      importe.value = ""; // Valor predeterminado si no se selecciona nada
  }
}

const calculateExpiryDate = (months) => {
  const currentDate = new Date();
  currentDate.setMonth(currentDate.getMonth() + months);
  date_end.value = currentDate.toISOString().split('T')[0];
};

const selectedSubInfo = ref({
  name: '',
  email: ''
});


const subs = ref([]);
const selectedSub = ref({});

const showError = () => {
  toast.add({ severity: 'error', summary: 'Error', detail: 'Algo no ha salido como se esperaba', life: 3000 });
};
const showSuccess = () => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: 'Todo esta en orden', life: 3000 });
};


const obtenerSubs = async () => {
  try {
    const respuesta = await api.get('/subfees');
    subs.value = respuesta.data;

  } catch (error) {
    console.error(error);
  }
}



const selectSub = (subs) => {
  selectedSub.value = subs;
  // Verificar si la información del cliente está definida
  if (subs.client && subs.client.name !== undefined && subs.client.email !== undefined) {
    selectedSubInfo.value.name = subs.client.name;
    selectedSubInfo.value.email = subs.client.email;
  } else {
    // Si la información del cliente no está definida, restablecer la variable selectedSubInfo
    selectedSubInfo.value.name = '';
    selectedSubInfo.value.email = '';
  }
};

const eliminarSub = async () => {
  try {
    if (!selectedSub.value) {
      console.error('No hay cliente seleccionado para eliminar.');
      return;
    }

    const idSub = selectedSub.value.id;
    const response = await api.delete(`/subfees/${idSub}`);

    if (response.status === 204) {

      subs.value = subs.value.filter(cliente => cliente.id !== idSub);
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

const editarSub = async () => {
  try {
    const currentDate = new Date().toISOString().split('T')[0];

    const idSub = selectedSub.value.id;
    const response = await api.put(`/subfees/${idSub}`, {
      importe: importe.value,
      date_pay: currentDate, // Establecer la fecha actual
      observation: observation.value,
      client_id: clienteSeleccionado.value // Asignar el ID del cliente
    });

    if (response.status === 200) {
      console.log('Póliza actualizada correctamente.');
      showSuccess();
      cerrarModalEditar();
      obtenerSubs();
    } else {
      showError();

      console.error('Error al editar la póliza.');
    }
  } catch (error) {
    showError();

    console.error('Error al editar la póliza:', error);
  }
};


const cerrarModalEditar = async () => {
  const editarSubModal = document.getElementById("editarSub");
  const closeButton = editarSubModal.querySelector(
    '[data-bs-dismiss="modal"]'
  );
  closeButton.click();
};

const cerrarModalBorrar = async () => {
  const borrarSubModal = document.getElementById("eliminar");
  const closeButton = borrarSubModal.querySelector(
    '[data-bs-dismiss="modal"]'
  );
  closeButton.click();
};

const crearSub = async () => {
  try {
    const currentDate = new Date().toISOString().split('T')[0];
    const status = "activo";


    await api.post('/subfees', {
      importe: importe.value,
      date_pay: currentDate, // Establecer la fecha actual
      date_end: date_end.value, // Establecer la fecha de caducidad calculada
      observation: observation.value,
      client_id: clienteSeleccionado.value, // Asignar el ID del cliente
      status: status // Establecer el estado como "activo"
    });

    cerrarModalCrear();
    showSuccess();
    importe.value = ''; // Vaciar el campo de importe
    name.value = ''; // Reiniciar el estado
    observation.value = ''; // Vaciar el campo de observaciones
    clienteSeleccionado.value = ''; // Reiniciar el cliente seleccionado
    date_end.value = ''; // Reiniciar la fecha de caducidad
    obtenerSubs();
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
  const crearSubModal = document.getElementById('dardealta')
  const closeButton = crearSubModal.querySelector('[data-bs-dismiss="modal"]')
  closeButton.click()
}


onMounted(() => {
  obtenerClientes();
  obtenerSubs();
});
</script>
