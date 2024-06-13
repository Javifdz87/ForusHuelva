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
            <h5 class="modal-title" id="exampleModalLabel">Añadir Alquiler Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center m-3">
            <form @submit.prevent="editRent">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="email_rent" placeholder="email" readonly />
                            <label for="cliente">Email</label>
                            <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nombre_rent" placeholder="Nombre" readonly />
                            <label for="nombre">Nombre</label>
                            <div v-if="errors.name" class="text-danger">{{ errors.name }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <select id="sport" v-model="DeporteSeleccionado" @change="actualizarPistas" class="form-select">
                                <option value="" disabled selected>Selecciona un deporte</option>
                                <option v-for="sport in sports" :key="sport.id" :value="sport.id">
                                    {{ sport.sport }}
                                </option>
                            </select>
                            <label for="floatingInput">Deporte</label>
                            <div v-if="errors.DeporteSeleccionado" class="text-danger">{{ errors.DeporteSeleccionado }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="fechaInicio" v-model="date_day" @change="actualizarHorasDisponibles" placeholder="Elije el dia de juego" />
                            <label for="fechaInicio">Elije el día de juego</label>
                            <div v-if="errors.date_day" class="text-danger">{{ errors.date_day }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <select id="pista" v-model="pistaSeleccionada" @change="actualizarHorasDisponibles" class="form-select">
                                <option value="" disabled selected>Selecciona una pista</option>
                                <option v-for="pista in filteredPistas" :key="pista.id" :value="pista.id">
                                    {{ pista.name }}
                                </option>
                            </select>
                            <label for="floatingInput">Pista</label>
                            <div v-if="errors.pistaSeleccionada" class="text-danger">{{ errors.pistaSeleccionada }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <select id="time" v-model="timeSeleccionado" class="form-select">
                                <option value="" disabled selected>Selecciona una hora</option>
                                <option v-for="time in filteredTimes" :key="time.id" :value="time.date_time">
                                    {{ time.date_time }}
                                </option>
                            </select>
                            <label for="floatingInput">Hora</label>
                            <div v-if="errors.timeSeleccionado" class="text-danger">{{ errors.timeSeleccionado }}</div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                        <button type="submit" class="btn btn-primary btn-block w-100">Modificar Alquiler</button>
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
import InputText from 'primevue/inputtext'

import Tag from 'primevue/tag';
import { useRouter } from 'vue-router';
const toast = useToast();
const importe = ref(12);
const filters = ref({ global: { value: '' } })



const clientes = ref([]);
const pistas = ref([]);
const times = ref([]);
const sports = ref([]);




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
  }
};

const selectRent = (rent) => {
  selectedRent.value = rent;
  if (rent.client && rent.client.name && rent.client.email && rent.sport && rent.sport.name && rent.court && rent.court.name) {
    selectedRentInfo.value.name = rent.client.name;
    selectedRentInfo.value.email = rent.client.email;
    selectedRentInfo.value.sport = rent.sport.name;
    selectedRentInfo.value.court = rent.court.name;
  } else {
    selectedRentInfo.value.name = '';
    selectedRentInfo.value.email = '';
    selectedRentInfo.value.sport = '';
    selectedRentInfo.value.court = '';
  }
};
const editRent = async () => {

try {
  if (!selectedClient.value) {
    console.error('No hay alquiler seleccionado para editar.');
    return;
  }

  const idCliente = selectedClient.value.id;
  const data = {
    name: selectedClient.value.name,
    last_Name: selectedClient.value.last_Name,
    dni: selectedClient.value.dni,
    email: selectedClient.value.email,
    phone: phoneValue, // Usar el valor convertido
    town: selectedClient.value.town,
    postal_code: postalCodeValue, // Usar el valor convertido
    province: selectedClient.value.province,
    address: selectedClient.value.address,
  };

  console.log('Datos a enviar:', data);

  const response = await api.put(`/clients/${idCliente}`, data); // Enviar `data` en la solicitud `PUT`

  if (response.status === 200) {
    console.log('Cliente actualizado correctamente.');

    // Limpiar los campos del formulario
    selectedClient.value = {
      name: '',
      last_Name: '',
      dni: '',
      email: '',
      phone: '',
      town: '',
      postal_code: '',
      province: '',
      address: ''
    };

    closeModalEdit(); // Cerrar el modal de edición
    showSuccess('Editado Correctamente'); // Mostrar mensaje de éxito
    getClients(); // Actualizar la lista de clients
  } else {
    console.error('Error al editar el cliente.');
    showError('Error al editar el cliente'); // Mostrar mensaje de error
  }
} catch (error) {
  console.error('Error al editar el cliente:', error);
  showError('Error al editar el cliente'); // Mostrar mensaje de error
}
};


const deleteRent = async () => {
  try {
    if (!selectedRent.value) {
      console.error('No hay cliente seleccionado para eliminar.');
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

const closeModalDelete = async () => {
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
  }
};

const getCourts = async () => {
  try {
    const respuesta = await api.get('/courts');
    pistas.value = respuesta.data;
  } catch (error) {
    console.log(error);
  }
};

const getHours = async () => {
  try {
    const respuesta = await api.get('/times');
    times.value = respuesta.data;
  } catch (error) {
    console.log(error);
  }
};

const getSports = async () => {
  try {
    const respuesta = await api.get('/sports');
    sports.value = respuesta.data;
  } catch (error) {
    console.log(error);
  }
};


const errors = ref({
    email: '',
    name: '',
    DeporteSeleccionado: '',
    date_day: '',
    pistaSeleccionada: '',
    timeSeleccionado: ''
});

const validarFormulario = () => {
    let valid = true;
    errors.value = {
        email: '',
        name: '',
        DeporteSeleccionado: '',
        date_day: '',
        pistaSeleccionada: '',
        timeSeleccionado: ''
    };

    if (!localEmail.value) {
        errors.value.email = 'El campo Email no puede estar vacío.';
        valid = false;
    }
    if (!localName.value) {
        errors.value.name = 'El campo Nombre no puede estar vacío.';
        valid = false;
    }
    if (!DeporteSeleccionado.value) {
        errors.value.DeporteSeleccionado = 'Debes seleccionar un deporte.';
        valid = false;
    }
    if (!date_day.value) {
        errors.value.date_day = 'Debes seleccionar una fecha.';
        valid = false;
    }
    if (!pistaSeleccionada.value) {
        errors.value.pistaSeleccionada = 'Debes seleccionar una pista.';
        valid = false;
    }
    if (!timeSeleccionado.value) {
        errors.value.timeSeleccionado = 'Debes seleccionar una hora.';
        valid = false;
    }

    return valid;
};



onMounted(() => {
  getClients();
  getRents();
  getCourts();
  getHours();
  getSports();
});
</script>