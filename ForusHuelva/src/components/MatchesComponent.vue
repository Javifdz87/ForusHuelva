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

const selectRent = (rent) => {
  selectedRent.value = { ...rent }
  console.log(selectedRent.value)
}

const toast = useToast();

const getClients = async (email) => {
  try {
    console.log(`Buscando cliente con email: ${email}`);
    const respuesta = await api.get(`/clients/${email}`);
    console.log('Respuesta de getClients:', respuesta.data);
    cliente.value = respuesta.data;
    if (cliente.value && cliente.value.id) {
      console.log('Cliente encontrado:', cliente.value);
      getRents(cliente.value.id);
    } else {
      console.log('No se encontró ningún cliente con ese email.');
    }
  } catch (error) {
    console.error('Error en getClients:', error);
  }
};

const getRents = async (clienteId) => {
  try {
    console.log(`Buscando alquileres para el cliente con ID: ${clienteId}`);
    const respuesta = await api.get(`/rentfees/${clienteId}`);
    console.log('Respuesta de getRents:', respuesta.data);
    rent.value = respuesta.data;
    console.log('Alquileres cargados:', rent.value);
  } catch (error) {
    console.error('Error en getRents:', error);
  }
};

const splitByComma = (text) => {
  return text.split(',').map(item => item.trim());
};

const hasComma = (text) => {
  if (!text) return false; // Si el texto es null, undefined o vacío, retornar falso
  return text.includes(',');
};


onMounted(() => {
  if (localEmail.value) {
    getClients(localEmail.value);
  }
});
</script>
