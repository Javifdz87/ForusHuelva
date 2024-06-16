<template>
  <div>
    <Toast />

    <DataTable :value="rent" stripedRows :paginator="true" :rows="5">
      <Column field="court.name" header="Pista" sortable style="width: 20%"></Column>
      <Column field="sport.sport" header="Deporte" sortable style="width: 20%"></Column>
      <Column field="date_day" header="Fecha de Juego" sortable style="width: 20%"></Column>
      <Column field="date_time" header="Hora" sortable style="width: 15%"></Column>
      <Column header="Resultado" sortable style="width: 10%">
        <template #body="slotProps">
          {{ slotProps.data.result || '- -' }}
        </template>
      </Column>
      <Column header="Operaciones" style="width: 15%">
        <template #body="slotProps">
          <div class="btn-group dropend" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
              aria-expanded="false">...</button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              <li>
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalNewResult"
                  @click="selectRent(slotProps.data)">Añadir Resultado</button>
              </li>
              <li>
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDeleteResult"
                  @click="selectRent(slotProps.data)">Eliminar</button>
              </li>
              <li>
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalViewResult"
                  @click="selectRent(slotProps.data)">Ver resultado</button>
              </li>
              <li>
                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditResult"
                  @click="selectRent(slotProps.data)">Modificar resultado</button>
              </li>
            </ul>
          </div>

        </template>

      </Column>
      <template #empty>No se han encontrado resultados.</template>

    </DataTable>

    <!-- Modal Registrar resultados -->
    <div class="modal fade" id="modalNewResult" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Resultado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <Toast />
              <div class="row justify-content-center m-3">
                <ResultadosComponent :rentId="selectedRent.id" :team1="selectedRent.team_a" :team2="selectedRent.team_b"
                  :result="selectedRent.result" :description="selectedRent.description" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Ver resultado -->
    <div class="modal fade" id="modalViewResult" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h5 class="modal-title text-light" id="staticBackdropLabel">Ver resultado</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <Toast />
              <div class="row justify-content-center text-center m-3">
                <div class="col-12">
                  <div class="row mb-3">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <h2 class="mb-0">Team 1</h2>
                      <label for="team1_name" class="mb-0">
                        <ul class="list-unstyled" v-if="hasComma(selectedRent.team_a)">
                          <li v-for="item in splitByComma(selectedRent.team_a)" :key="item">{{ item }}</li>
                        </ul>
                        <h5 v-else>{{ selectedRent.team_a }}</h5>
                      </label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <h3>{{ selectedRent.result || '- -' }}</h3>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <h2 class="mb-0">Team 2</h2>
                      <label for="team2_name" class="mb-0">
                        <ul class="list-unstyled" v-if="hasComma(selectedRent.team_b)">
                          <li v-for="item in splitByComma(selectedRent.team_b)" :key="item">{{ item }}</li>
                        </ul>
                        <h5 v-else>{{ selectedRent.team_b }}</h5>
                      </label>
                    </div>
                  </div>
                  <hr>
                  <h2 class="mb-3">Descripción</h2>
                  <p>{{ selectedRent.description }}</p>
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
  </div>

  <!-- Modal Eliminar Alquiler -->
  <div class="modal fade" id="modalDeleteResult" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
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
          <button type="button" class="btn btn-danger" @click="deleteResult">Si</button>
        </div>
      </div>
    </div>
  </div>


<!-- Modal Editar Resultados -->
<div class="modal fade" id="modalEditResult" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Resultado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <Toast />
          <div class="row justify-content-center m-3">
            <form @submit.prevent="editResult" class="text-center">
              <!-- Sección Deporte -->
              <div class="row">
                <div class="col-lg-12">
                  <h2>Editar Resultado</h2>
                </div>
              </div>
              <div id="team-rows">
                <div class="row mb-3">
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <textarea class="form-control" name="teamA" id="teamA" cols="30" rows="3"></textarea>
                      <label for="teamA">Team A</label>
                    </div>
                  </div>
                  <div class="col-lg-4 align-self-center text-center">
                    <label>vs</label>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <textarea class="form-control" name="teamB" id="teamB" cols="30" rows="3"></textarea>
                      <label for="teamB">Team B</label>
                    </div>
                  </div>
                </div>
              </div>
              
              <hr>
              <!-- Sección Resultado -->
              <div class="row justify-content-center mb-3">
                <div class="col-lg-3 ">
                  <label for="resultadoA">Team A</label>
                </div>
                <div class="col-lg-3">
                  <input type="text" class="form-control" v-model="resultA" id="resultadoA" placeholder="" />
                </div>
                <div class="col-lg-3">
                  <label for="resultadoB">Team B</label>
                </div>
                
              </div>
              <hr>
              <!-- Sección Descripción -->
              <div class="row justify-content-center mb-3">
                <div class="col-lg-12">
                  <h2>Descripción</h2>
                </div>
                <div class="col-lg-12">
                  <div class="form-floating mb-3">
                    <textarea class="form-control" v-model="description" id="description" cols="30" rows="5"></textarea>
                    <label for="description">Descripción</label>
                  </div>
                </div>
              </div>
              <!-- Botón para crear resultado -->
              <div class="row">
                <div class="col-lg-12 mb-3">
                  <button type="submit" class="btn btn-primary btn-block w-100">Editar Resultado</button>
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
import { ref, onMounted, watch } from 'vue';
import { defineProps } from 'vue';
import { useToast } from 'primevue/usetoast';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import Toast from 'primevue/toast';
import ResultadosComponent from '@/components/ResultadosComponent.vue';

const selectedTable = ref('history'); // Estado para la tabla seleccionada


const cliente = ref([]);
const rent = ref([]);

const props = defineProps({
  email: String,
  name: String,
  id: String
});

const localName = ref(props.name);
const localId = ref(props.id);
const localEmail = ref(props.email);

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

watch(() => props.name, (newVal) => {
  localName.value = newVal;
});

watch(() => props.id, (newVal) => {
  localId.value = newVal;
});

watch(() => props.email, (newVal) => {
  localEmail.value = newVal;
  getClients(newVal);
});

const selectedRent = ref({
  id: '',
  team_a: '',
  team_b: '',
  result: '',
  description: ''
});

const showError = (message) => {
  toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
};

const showSuccess = (message) => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: message || 'Todo está en orden', life: 3000 });
};

const selectRent = (rent) => {
  selectedRent.value = { ...rent }
}

const toast = useToast();

const getClients = async (email) => {
  try {
    const respuesta = await api.get(`/clients/${email}`);
    cliente.value = respuesta.data;
    if (cliente.value && cliente.value.id) {
      getRents(cliente.value.id);
    } else {
    }
  } catch (error) {
    console.error('Error en getClients:', error);
  }
};

const getRents = async (clienteId) => {
  try {
    const respuesta = await api.get(`/rentfees/${clienteId}`);
    
    // Filter rents where date_day is before today
    const today = new Date();
    rent.value = respuesta.data.filter(rental => {
      const rentDate = new Date(rental.date_day);
      return rentDate < today;
    });
    
  } catch (error) {
    console.error('Error en getRents:', error);
  }
};



const deleteResult = async () => {
  try {
    const data = {
      team_a: '',
      team_b: '',
      result: '',
      description: ''
    };

    await api.put(`/rentfees/${selectedRent.value.id}`, data);

    showSuccess('Resultado eliminado correctamente');
    getRents();
    closeModalDelete();
  } catch (error) {
    console.error(error);
    showError('Hubo un problema al eliminar el resultado.');
  }
};


const closeModalDelete = async () => {
  const borrarClienteModal = document.getElementById('modalDeleteResult')
  const closeButton = borrarClienteModal.querySelector('[data-bs-dismiss="modal"]')
  closeButton.click()
}

const splitByComma = (text) => {
  return text.split(',').map(item => item.trim());
};

const hasComma = (text) => {
  if (!text) return false; // Si el texto es null, undefined o vacío, retornar falso
  return text.includes(',');
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



const getSports = async () => {
  try {
    const respuesta = await api.get('/sports');
    sports.value = respuesta.data;
  } catch (error) {
    console.error(error);
    showError('Hubo un problema al cargar los deportes.');
  }
};


const actualizarHorasDisponibles = () => {
  filteredTimes.value = times.value.filter(time => {
    const horaDisponible = !rent.value.some(rentItem => {
      return rentItem.date_day === date_day.value && rentItem.date_time === time.date_time && rentItem.court_id === pistaSeleccionada.value;
    });
    return horaDisponible;
  });
};




const players = ref([{ id: 1, teamA: '', teamB: '' }, { id: 2, teamA: '', teamB: '' }]);
const resultadoA = ref('');
const resultadoB = ref('');
const description = ref('');



const editResult = async () => {
  const teamA = players.value.map(player => player.teamA).join(', ');
  const teamB = players.value.map(player => player.teamB).join(', ');
  const result = `${resultadoA.value} - ${resultadoB.value}`;

  const data = {
    team_a: teamA,
    team_b: teamB,
    result: result,
    description: description.value,
  };

  try {
    // Utilizar el ID del alquiler almacenado localmente
    const response = await api.put(`/rentfees/${localRentId.value}`, data);
    if (response.status === 200) {
      // Limpiar campos después de crear el resultado
      players.value = [{ id: 1, teamA: '', teamB: '' }, { id: 2, teamA: '', teamB: '' }];
      resultadoA.value = '';
      resultadoB.value = '';
      description.value = '';

      showSuccess('Resultado actualizado correctamente.');
      closeModalEdit();
    } else {
      showError('Error al actualizar el resultado.');
    }
  } catch (error) {
    console.error('Error al actualizar el resultado:', error);
    showError('Error al actualizar el resultado.');
  }
};

const closeModalEdit = async () => {
  const borrarClienteModal = document.getElementById('modalEditResult')
  const closeButton = borrarClienteModal.querySelector('[data-bs-dismiss="modal"]')
  closeButton.click()
}

onMounted(() => {
  getRents();
  getCourts();
  getSports();
});


onMounted(() => {
  if (localEmail.value) {
    getClients(localEmail.value);
  }
});
</script>
