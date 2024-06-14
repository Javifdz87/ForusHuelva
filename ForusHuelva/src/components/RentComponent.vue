<template>
  <div>
    <div class="row mt-5">
      <Toast />
      <div class="col-lg-8 offset-lg-2 mt-5">
        <div class="table-responsive-vertical p-3">
          <div class="row">
            <div class="d-flex justify-content-center">
              <h2>
                Lista Alquileres
              </h2>
            </div>
          </div>
          <DataTable :value="rent" stripedRows :paginator="true" :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]"
            tableStyle="min-width: 50rem" :filters="filters"
      :globalFilterFields="['client.name', 'client.email', 'court.sport_id', 'date_day', 'date_time']">
            <Column field="id" header="Id" sortable style="width: 8%"></Column>
            <Column field="client.name" header="Nombre" sortable style="width: 14%"></Column>
            <Column field="client.email" header="Email" sortable style="width: 14%"></Column>
            <Column field="sport.sport" header="Deporte" sortable style="width: 14%"></Column>
            <Column field="date_day" header="Fecha de Juego" sortable style="width: 18%"></Column>
            <Column field="date_time" header="Hora Alquiler" sortable style="width: 14%"></Column>
            <Column header="Operaciones" style="width: 18%">
              <template #body="slotProps">
                <Button class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar"
                  @click="selectRent(slotProps.data)">
                  X
                </Button>
                <Button class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#vista"
                  @click="selectRent(slotProps.data)">
                  O
                </Button>
                <Button class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#modalEditRent"
                  @click="selectRent(slotProps.data)">
                  M
                </Button>
              </template>
            </Column>
            <template #header>
        <div class="flex justify-content-end">
            <InputText v-model="filters['global'].value" placeholder="Keyword Search" />
        </div>
      </template>
      <template #empty>No hay alquileres encontrados.</template>
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
            <button type="button" class="btn btn-danger" @click="deleteRent">Si</button>
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
        <h5 class="modal-title text-light" id="staticBackdropLabel">Vista Alquiler</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <Toast />
          <div class="row justify-content-center m-3">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="email" v-model="selectedRent.client.email" placeholder="email" readonly />
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nombre" v-model="selectedRent.client.name" placeholder="Nombre" readonly />
                  <label for="nombre">Nombre</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="deporte" v-model="selectedRent.court.sport_id" placeholder="deporte" readonly />
                  <label for="deporte">Deporte</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="fechaInicio" v-model="selectedRent.date_day" placeholder="Elije el día de juego" readonly />
                  <label for="fechaInicio">Elije el día de juego</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="hora" v-model="selectedRent.date_time" placeholder="hora" readonly />
                  <label for="hora">Hora</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="importe" v-model="selectedRent.importe" placeholder="Importe" readonly />
                  <label for="importe">Importe</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="pista" v-model="selectedRent.court.name" placeholder="Pista" readonly />
                  <label for="pista">Pista</label>
                </div>
              </div>
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

<!-- Modal Editar Alquiler -->
<div class="modal fade" id="modalEditRent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Alquiler</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center m-3">
          <form @submit.prevent="editRent">
            <!-- Email y Nombre del Cliente -->
            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="email_rent" v-model="selectedRent.client.email" placeholder="Email" readonly />
                  <label for="email_rent">Email</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nombre_rent" v-model="selectedRent.client.name" placeholder="Nombre" readonly />
                  <label for="nombre_rent">Nombre</label>
                </div>
              </div>
            </div>
            <!-- Deporte y Fecha de Juego -->
            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <select id="sport" v-model="selectedRent.sport_id" @change="actualizarPistas" class="form-select">
                    <option value="" disabled selected>Selecciona un deporte</option>
                    <option v-for="sport in sports" :key="sport.id" :value="sport.id">{{ sport.sport }}</option>
                  </select>
                  <label for="sport">Deporte</label>
                  <div v-if="errors.DeporteSeleccionado" class="text-danger">{{ errors.DeporteSeleccionado }}</div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="date" class="form-control" id="fechaInicio" v-model="selectedRent.date_day" @change="actualizarHorasDisponibles" placeholder="Elije el día de juego" />
                  <label for="fechaInicio">Elije el día de juego</label>
                  <div v-if="errors.date_day" class="text-danger">{{ errors.date_day }}</div>
                </div>
              </div>
            </div>
            <!-- Pista y Hora -->
            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <select id="pista" v-model="selectedRent.court.id" @change="actualizarHorasDisponibles" class="form-select">
                    <option value="" disabled selected>Selecciona una pista</option>
                    <option v-for="pista in filteredPistas" :key="pista.id" :value="pista.id">{{ pista.name }}</option>
                  </select>
                  <label for="pista">Pista</label>
                  <div v-if="errors.pistaSeleccionada" class="text-danger">{{ errors.pistaSeleccionada }}</div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <select id="time" v-model="selectedRent.date_time" class="form-select">
                    <option value="" disabled selected>Selecciona una hora</option>
                    <option v-for="time in filteredTimes" :key="time.id" :value="time.date_time">{{ time.date_time }}</option>
                  </select>
                  <label for="time">Hora</label>
                  <div v-if="errors.timeSeleccionado" class="text-danger">{{ errors.timeSeleccionado }}</div>
                </div>
              </div>
            </div>
            <!-- Botón para editar alquiler -->
            <div class="row">
              <div class="col-lg-12">
                <div class="form-floating mb-3">
                  <button type="submit" class="btn btn-primary btn-block">Modificar Alquiler</button>
                </div>
              </div>
            </div>
          </form>
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
import InputText from 'primevue/inputtext';
import { useRouter } from 'vue-router';

const toast = useToast();

const importe = ref(12);
const filters = ref({ global: { value: '' } });

const clientes = ref([]);
const pistas = ref([]);
const times = ref([]);
const sports = ref([]);
const DeporteSeleccionado = ref('');
const filteredPistas = ref([]);
const filteredTimes = ref([]);
const timeSeleccionado = ref('');
const pistaSeleccionada = ref('');
const date_day = ref('');

const selectedRentInfo = ref({
  name: '',
  email: '',
});

const rent = ref([]);
const selectedRent = ref({
  id: '',
  client: {
    email: '',
    name: ''
  },
  court: {
    id: '',
    name: ''
  },
  date_day: '',
  date_time: '',
  sport_id: '',
  importe: ''
});

const showError = (message) => {
  toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
};

const showSuccess = (message) => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: message || 'Todo está en orden', life: 3000 });
};

const getRents = async () => {
  try {
    const respuesta = await api.get('/rentfees');
    rent.value = respuesta.data;
  } catch (error) {
    console.error(error);
    showError('Hubo un problema al cargar los alquileres.');
  }
};

const selectRent = (rent) => {
  selectedRent.value = rent;
  actualizarPistas();
  actualizarHorasDisponibles();
};

const editRent = async () => {
  if (!validarFormulario()) {
    showError('Por favor, corrige los errores del formulario.');
    return;
  }

  try {
    const data = {
      date_day: selectedRent.value.date_day,
      date_time: selectedRent.value.date_time,
      court_id: selectedRent.value.court.id,
      sport_id: selectedRent.value.sport_id,
    };

    await api.put(`/rentfees/${selectedRent.value.id}`, data);
  
    showSuccess('Alquiler editado correctamente');
    getRents();
  } catch (error) {
    console.error(error);
    showError('Hubo un problema al editar el alquiler.');
  }
};

const deleteRent = async () => {
  try {
    if (!selectedRent.value) {
      console.error('No hay alquiler seleccionado para eliminar.');
      return;
    }

    const idRent = selectedRent.value.id;
    const response = await api.delete(`/rentfees/${idRent}`);

    if (response.status === 204) {
      rent.value = rent.value.filter(cliente => cliente.id !== idRent);
      closeModalDelete();
      showSuccess('Alquiler eliminado correctamente.');
    } else {
      showError('Error al eliminar el Alquiler.');
      console.error('Error al eliminar el Alquiler.');
    }
  } catch (error) {
    showError('Error al eliminar el Alquiler');
    console.error('Error al eliminar el Alquiler:', error);
  }
};

const closeModalDelete = () => {
  const borrarRentModal = document.getElementById("eliminar");
  const closeButton = borrarRentModal.querySelector('[data-bs-dismiss="modal"]');
  closeButton.click();
};

const getClients = async () => {
  try {
    const respuesta = await api.get('/clients');
    clientes.value = respuesta.data;
  } catch (error) {
    console.error(error);
    showError('Hubo un problema al cargar los clientes.');
  }
};

const getCourts = async () => {
  try {
    const respuesta = await api.get('/courts');
    pistas.value = respuesta.data;
  } catch (error) {
    console.error(error);
    showError('Hubo un problema al cargar las pistas.');
  }
};

const getHours = async (sportId) => {
  try {
    const respuesta = await api.get(`/times/${sportId}`);
    times.value = respuesta.data;
    actualizarHorasDisponibles();
  } catch (error) {
    console.error(error);
    showError('Hubo un problema al cargar los horarios.');
  }
};

const getSports = async () => {
  try {
    const respuesta = await api.get('/sports');
    sports.value = respuesta.data;
  } catch (error) {
    console.error(error);
    showError('Hubo un problema al cargar los deportes.');
  }
};

const actualizarPistas = () => {
  filteredPistas.value = pistas.value.filter(pista => pista.sport_id === selectedRent.value.sport_id);
  getHours(selectedRent.value.sport_id);
};

const actualizarHorasDisponibles = () => {
  filteredTimes.value = times.value.filter(time => {
    const horaDisponible = !rent.value.some(rentItem => {
      return rentItem.date_day === selectedRent.value.date_day && rentItem.date_time === time.date_time && rentItem.court_id === selectedRent.value.court.id;
    });
    return horaDisponible;
  });
};

const errors = ref({
  DeporteSeleccionado: '',
  date_day: '',
  pistaSeleccionada: '',
  timeSeleccionado: ''
});

const validarFormulario = () => {
  let valid = true;
  errors.value = {
    DeporteSeleccionado: '',
    date_day: '',
    pistaSeleccionada: '',
    timeSeleccionado: ''
  };

  if (!selectedRent.value.sport_id) {
    errors.value.DeporteSeleccionado = 'Debes seleccionar un deporte.';
    valid = false;
  }
  if (!selectedRent.value.date_day) {
    errors.value.date_day = 'Debes seleccionar una fecha.';
    valid = false;
  }
  if (!selectedRent.value.court.id) {
    errors.value.pistaSeleccionada = 'Debes seleccionar una pista.';
    valid = false;
  }
  if (!selectedRent.value.date_time) {
    errors.value.timeSeleccionado = 'Debes seleccionar una hora.';
    valid = false;
  }

  return valid;
};

onMounted(() => {
  getRents();
  getCourts();
  getSports();
});
</script>