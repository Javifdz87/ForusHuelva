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

          </div>
          <DataTable :value="subs" stripedRows :paginator="true" :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]"
            tableStyle="min-width: 50rem" :filters="filters"
      :globalFilterFields="['client.name', 'client.email', 'importe', 'date_pay', 'observation']">
            <Column field="id" header="Id" sortable style="width: 5%"></Column>
            <Column field="client.name" header="Nombre" sortable style="width: 11%"></Column>
            <Column field="client.email" header="Email" sortable style="width: 11%"></Column>
            <Column field="importe" header="Importe" sortable style="width: 8%"></Column>
            <Column field="status" header="Estado" sortable style="width: 8%"></Column>
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
            <template #header>
        <div class="flex justify-content-end">
            <InputText v-model="filters['global'].value" placeholder="Keyword Search" />
        </div>
      </template>
      <template #empty>No hay clientes encontrados.</template>
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
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="id" placeholder="name@example.com"
                v-model="selectedSub.id" readonly />
              <label for="floatingInput">Id</label>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="email" placeholder="name@example.com"
                v-model="selectedSub.client.email" readonly />
              <label for="floatingInput">Email</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="name" placeholder="name@example.com"
                v-model="selectedSub.client.name" readonly />
              <label for="floatingInput">Nombre</label>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="importe" placeholder="name@example.com"
                v-model="selectedSub.importe" readonly />
              <label for="floatingInput">Importe</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="name" placeholder="name@example.com"
                v-model="selectedSub.date_end" readonly />
              <label for="floatingInput">Fecha expiración</label>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="importe" placeholder="name@example.com"
                v-model="selectedSub.status" readonly />
              <label for="floatingInput">Estado</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="date_pay" placeholder="name@example.com"
                v-model="selectedSub.date_pay" readonly />
              <label for="floatingInput">Pagado</label>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="observation" placeholder="name@example.com"
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
                <form @submit.prevent="editarSub">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="email" placeholder="name@example.com"
                    v-model="selectedSub.client.email" readonly />
                        <label for="cliente">Email</label>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" placeholder="name@example.com"
                v-model="selectedSub.client.name" readonly />
                        <label for="nombre">Nombre</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
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
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" placeholder="name@example.com" v-model="importe"
                          id="importe" required readonly />
                        <label for="floatingInput">Importe</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-floating mb-3">
                        <select v-model="selectedSub.status" id="status" class="form-control"
                          placeholder="name@example.com" required>
                          <option value="" disabled selected>Elige el estado de suscripción</option>
                          <option value="activa">Activa</option>
                          <option value="cancelada">Cancelada</option>
                        </select>
                        <label for="floatingInput">Estado</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                      <button type="submit" class="btn btn-warning btn-block w-100">Editar Suscripción</button>
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
import InputText from 'primevue/inputtext'

const router = useRouter();
const toast = useToast();
const importe = ref('');
const name = ref('');
const nombre = ref('');
const observation = ref('');
const clientes = ref([]);
const clienteSeleccionado = ref('');
const date_end = ref(''); // Variable para la fecha de caducidad

const filters = ref({ global: { value: '' } });

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
};

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
const selectedSub = ref({
  id: '',
  client: {
    name: '',
    email: ''
  },
  importe: '',
  date_pay: '',
  observation: ''
});

const showError = (message) => {
  toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
};

const showSuccess = (message) => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: message || 'Todo está en orden', life: 3000 });
};

const obtenerSubs = async () => {
  try {
    const respuesta = await api.get('/subfees');
    subs.value = respuesta.data;
  } catch (error) {
    console.error(error);
  }
};

const selectSub = (subs) => {
  selectedSub.value = subs;
  if (subs.importe !== undefined) {
    importe.value = subs.importe;
  } else {
    importe.value = ''; // Puedes establecer un valor predeterminado si no hay importe definido en la suscripción
  }
  if (subs.client && subs.client.name !== undefined && subs.client.email !== undefined) {
    selectedSubInfo.value.name = subs.client.name;
    selectedSubInfo.value.email = subs.client.email;
  } else {
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
      showSuccess('Suscripción eliminada correctamente.');
    } else {
      showError('Error al eliminar el cliente.');
    }
  } catch (error) {
    showError('Error al eliminar el cliente.');
    console.error('Error al eliminar el cliente:', error);
  }
};

const editarSub = async () => {
  try {
    const response = await api.put(`/subfees/${selectedSub.value.id}`, {
      importe: importe.value,
      date_pay: selectedSub.value.date_pay,
      observation: observation.value, // Cambiado a selectedSub.observation
      status: selectedSub.value.status,
      // Puedes agregar más campos si los necesitas, como cliente_id, etc.
    });

    if (response.status === 200) {
      showSuccess('Suscripción actualizada correctamente.');
      cerrarModalEditar();
      obtenerSubs();
    } else {
      showError('Error al editar la suscripción.');
    }
  } catch (error) {
    showError('Error al editar la suscripción.');
    console.error('Error al editar la suscripción:', error);
  }
};


const cerrarModalEditar = () => {
  const editarSubModal = document.getElementById("editarSub");
  const closeButton = editarSubModal.querySelector('[data-bs-dismiss="modal"]');
  closeButton.click();
};

const cerrarModalBorrar = () => {
  const borrarSubModal = document.getElementById("eliminar");
  const closeButton = borrarSubModal.querySelector('[data-bs-dismiss="modal"]');
  closeButton.click();
};


const obtenerClientes = async () => {
  try {
    const respuesta = await api.get('/clientes');
    clientes.value = respuesta.data;
  } catch (error) {
    console.log(error);
  }
};


onMounted(() => {
  obtenerClientes();
  obtenerSubs();
});
</script>

