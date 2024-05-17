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
            <div class="d-flex justify-content-end">
              <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#dardealta">
                Nuevo Alquiler
              </button>
            </div>
          </div>
          <DataTable :value="rent" stripedRows :paginator="true" :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]"
            tableStyle="min-width: 50rem">
            <Column field="id" header="Id" sortable style="width: 12%"></Column>
            <Column field="client.name" header="Nombre" sortable style="width: 14%"></Column>
            <Column field="client.email" header="Email" sortable style="width: 14%"></Column>
            <Column field="sport.sport" header="Deporte" sortable style="width: 14%"></Column>
            <Column field="date_day" header="Fecha de Juego" sortable style="width: 14%"></Column>
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
                <Button class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#editarPoliza"
                  @click="selectRent(slotProps.data)">
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
                     readonly />
                  <label for="floatingInput">Id</label>
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="start_date" placeholder="name@example.com"
                     readonly />
                  <label for="floatingInput">Nombre</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="id" placeholder="name@example.com"
                     readonly />
                  <label for="floatingInput">Importe</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="start_date" placeholder="name@example.com"
                     readonly />
                  <label for="floatingInput">Pagado</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="id" placeholder="name@example.com"
                   readonly />
                  <label for="floatingInput">Hora de Alquiler</label>
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

<!-- Modal Nueva Rent -->
<div class="modal fade" id="dardealta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Alquiler</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <Toast />
          <div class="row justify-content-center m-3">
            <form @submit.prevent="crearAlquiler">
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
                    <input type="text" class="form-control" id="nombre" v-model="nombre" placeholder="Nombre" required />
                    <label for="nombre">Nombre</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <select id="sport" v-model="DeporteSeleccionado" @change="actualizarHorasYPistas" class="form-select">
                      <option value="" disabled selected>Selecciona un deporte</option>
                      <option v-for="sport in sports" :key="sport.id" :value="sport.id">
                        {{ sport.sport }}
                      </option>
                    </select>
                    <label for="floatingInput">Deporte</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="fechaInicio" v-model="date_day" placeholder="Elije el dia de juego" required />
                    <label for="fechaInicio">Elije el día de juego</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <select id="time" v-model="timeSeleccionado" class="form-select">
                      <option value="" disabled selected>Selecciona una hora</option>
                      <option v-for="time in filteredTimes" :key="time.id" :value="time.date_time">
                        {{ time.date_time }}
                      </option>
                    </select>
                    <label for="floatingInput">Hora</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" placeholder="Importe" v-model="importe" readonly />
                    <label for="floatingInput">Importe</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-floating mb-3">
                    <select id="pista" v-model="pistaSeleccionada" class="form-select">
                      <option value="" disabled selected>Selecciona una pista</option>
                      <option v-for="pista in filteredPistas" :key="pista.id" :value="pista.id">
                        {{ pista.name }}
                      </option>
                    </select>
                    <label for="floatingInput">Pista</label>
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
const toast = useToast();
const importe = ref(12);
const date_day = ref('');
const date_time = ref('');
const clientes = ref([]);
const pistas = ref([]);
const times = ref([]);
const sports = ref([]);
const clienteSeleccionado = ref('');
const DeporteSeleccionado = ref('');
const nombre = ref('');
const filteredPistas = ref([]);
const filteredTimes = ref([]);
const timeSeleccionado = ref('');
const pistaSeleccionada = ref('');



const selectedRentInfo = ref({
  name: '',
  email: ''
});

const rent = ref([]);
const selectedRent = ref({});

const showError = () => {
  toast.add({ severity: 'error', summary: 'Error', detail: 'Algo no ha salido como se esperaba', life: 3000 });
};
const showSuccess = () => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: 'Todo esta en orden', life: 3000 });
};


const obtenerRents = async () => {
  try {
    const respuesta = await api.get('/rentfees');
    rent.value = respuesta.data;

  } catch (error) {
    console.error(error);
  }
}


const selectRent = (rent) => {
  selectedRent.value = subs;
  // Verificar si la información del cliente está definida
  if (rent.client && rent.client.name !== undefined && rent.client.email !== undefined && rent.sport && rent.sport.sport !== undefined) {
    selectedRentInfo.value.name = rent.client.name;
    selectedRentInfo.value.email = rent.client.email;
    selectedRentInfo.value.sport = rent.sport.sport;
  } else {
    // Si la información del cliente no está definida, restablecer la variable selectedRentInfo
    selectedRentInfo.value.name = '';
    selectedRentInfo.value.email = '';
    selectedRentInfo.value.sport = '';
  }
};



const eliminarPoliza = async () => {
  try {
    if (!selectedPoliza.value) {
      console.error('No hay cliente seleccionado para eliminar.');
      return;
    }

    const idPoliza = selectedPoliza.value.id;
    const response = await api.delete(`/rent/${idPoliza}`);

    if (response.status === 204) {

      rent.value = rent.value.filter(cliente => cliente.id !== idPoliza);
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

const crearAlquiler = async () => {
  try {
    const currentDate = new Date().toISOString().split('T')[0];

    await api.post('/rentfees', {
      importe: 12,
      date_pay: currentDate,
      date_day: date_day.value,
      date_time: timeSeleccionado.value,
      client_id: clienteSeleccionado.value,
      court_id: pistaSeleccionada.value
    });

    cerrarModalCrear();
    showSuccess();
    date_day.value = '';
    date_time.value = '';
    clienteSeleccionado.value = '';
    nombre.value = '';
    DeporteSeleccionado.value = '';
    timeSeleccionado.value = '';
    pistaSeleccionada.value = '';

    obtenerRents();
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
  }
}

const obtenerPistas = async () => {
  try {
    const respuesta = await api.get('/courts')
    pistas.value = respuesta.data
  } catch (error) {
    console.log(error)
  }
}

const obtenerHoras = async () => {
  try {
    const respuesta = await api.get('/times')
    times.value = respuesta.data
  } catch (error) {
    console.log(error)
  }
}

const obtenerDeportes = async () => {
  try {
    const respuesta = await api.get('/sports')
    sports.value = respuesta.data
  } catch (error) {
    console.log(error)
  }
}

const actualizarNombre = () => {
  const cliente = clientes.value.find((cli) => cli.id === clienteSeleccionado.value)
  nombre.value = cliente ? cliente.name : ''
}

const actualizarHorasYPistas = () => {
  filteredPistas.value = pistas.value.filter(pista => pista.sport_id === DeporteSeleccionado.value);
  filteredTimes.value = times.value.filter(time => time.sport_id === DeporteSeleccionado.value);
};

const cerrarModalCrear = async () => {
  const crearAlquilerModal = document.getElementById('dardealta')
  const closeButton = crearAlquilerModal.querySelector('[data-bs-dismiss="modal"]')
  closeButton.click()
}


onMounted(() => {
  obtenerClientes();
  obtenerRents();
  obtenerPistas();
  obtenerHoras();
  obtenerDeportes();
});
</script>
