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
          {{ slotProps.data.result ? slotProps.data.result : '- -' }}
        </template>
      </Column>
      <Column header="Operaciones" style="width: 15%">
        <template #body="slotProps">
          <div class="btn-group dropend" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
              data-bs-toggle="dropdown" aria-expanded="false">...</button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" >
              <li>
                <button class="dropdown-item m-1" data-bs-toggle="modal" data-bs-target="#modalNewResult"
                  @click="selectRent(slotProps.data)">Añadir Resultado</button>
              </li>
              <li>
                <button class="dropdown-item m-1" data-bs-toggle="modal" data-bs-target="#modalDeleteResult"
                  @click="selectRent(slotProps.data)">Eliminar</button>
              </li>
              <li>
                <button class="dropdown-item m-1" data-bs-toggle="modal" data-bs-target="#modalViewResult"
                  @click="selectRent(slotProps.data)">Ver resultado</button>
              </li>
              <li>
                <button class="dropdown-item m-1" data-bs-toggle="modal" data-bs-target="#modalEditResult"
                  @click="selectRent(slotProps.data)">Modificar Alquiler</button>
              </li>
            </ul>
          </div>
        </template>
      </Column>
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
              <ResultadosComponent :rentId="selectedRent.id" :team1="selectedRent.team_a" :team2="selectedRent.team_b" :result="selectedRent.result" :description="selectedRent.description"/>
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

const selectRent = (rent) => {
  selectedRent.value = { ...rent }
  console.log(selectedRent.value)
}


const toast = useToast();

const showError = (message) => {
  toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
};

const showSuccess = (message) => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: message || 'Todo está en orden', life: 3000 });
};

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



onMounted(() => {
  if (localEmail.value) {
    getClients(localEmail.value);
  }
});
</script>
