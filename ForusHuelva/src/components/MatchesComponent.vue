<template>
  <div>
    <Toast />
    <DataTable :value="rent" stripedRows :paginator="true" :rows="5"
      tableStyle="min-width: 50rem">
      <Column field="court.name" header="Pista" sortable style="width: 20%"></Column>
      <Column field="sport.sport" header="Deporte" sortable style="width: 20%"></Column>
      <Column field="date_day" header="Fecha de Juego" sortable style="width: 20%"></Column>
      <Column field="match.result" header="Resultado" sortable style="width: 20%"></Column>
      <Column header="Operaciones" style="width: 20%">
        <template #body="slotProps">
          <Button class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#vista"
            @click="selectMatch(slotProps.data)">
            O
          </Button>
          <Button class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#vista"
            @click="selectMatch(slotProps.data)">
            M
          </Button>
          <Button class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#vista"
            @click="selectMatch(slotProps.data)">
            X
          </Button>
        </template>
      </Column>
    </DataTable>
  </div>
</template>

<script setup>
import api from '@/services/service';
import { ref, onMounted, watch, nextTick } from 'vue';
import { defineProps } from 'vue';
import { useToast } from 'primevue/usetoast';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import Toast from 'primevue/toast';

const cliente = ref([]);
const rent = ref([]);
const match = ref([]);


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

const selectMatch = (match) => {
  selectedCourt.value = { ...match };
};

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
      getRents(cliente.value.id); // Obtener la suscripción del cliente
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
      getMatches(rent.value.id);
    console.log('Alquileres cargados:', rent.value);
  } catch (error) {
    console.error('Error en getRents:', error);
  }
};

const getMatches = async (rentId) => {
  try {
    const respuesta = await api.get(`/matches/${rentId}`);
    console.log('Respuesta de getRents:', respuesta.data);
      match.value = respuesta.data;
      getMatches(rent.value.id);
    console.log('Alquileres cargados:', rent.value);
  } catch (error) {
    console.error('Error en getRents:', error);
  }
};


onMounted(() => {
  if (localEmail.value) {
    getClients(localEmail.value); // Asegurarse de que se llama a getClients con el email del prop
  }
});
</script>


