<template>
  <div>
    <div class="container mt-5">
    <Toast />
    <div class="table-responsive-vertical p-5">
    <div class="row">
      <div class="d-flex justify-content-center">
      <h2>Selección de Cliente y Suscripciones</h2>
    </div>
    </div>
    </div>
    
    <div class="row g-3">
      <div class="col-lg-4 col-md-4 col-sm-4">
        <label for="rangoId" class="form-label">Rango de ID del Cliente:</label>
        <div class="card flex justify-content-center">
          <Slider v-model="rangoId" range :max="100" class="w-14rem" />
          <div class="mt-2">{{ rangoId }}</div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <label for="estado" class="form-label">Estado</label>
        <select id="estado" v-model="estado" class="form-control">
          <option value="" disabled selected>Elige el estado de Suscripción</option>
          <option value="activa">Activo</option>
          <option value="cancelada">Cancelado</option>
        </select>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <label for="tipoSuscripcion" class="form-label">Suscripción</label>
        <select id="tipoSuscripcion" v-model="tipoSuscripcion" class="form-control">
          <option value="" disabled selected>Elige el tipo de suscripción</option>
          <option value="3 meses">3 meses</option>
          <option value="6 meses">6 meses</option>
          <option value="12 meses">12 meses</option>
        </select>
      </div>
    </div>
    <div class="row g-3 mt-3">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <label for="fechaInicio" class="form-label">Fecha de Inicio:</label>
        <input type="date" id="fechaInicio" v-model="fechaInicio" class="form-control">
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <label for="fechaFin" class="form-label">Fecha de Fin:</label>
        <input type="date" id="fechaFin" v-model="fechaFin" class="form-control">
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <Button @click="generateList" class="btn btn-primary">Generar Listado</Button>
      </div>
    </div>

    <div v-if="filteredSuscripciones.length > 0">
      <h3>Listado de Clientes con Suscripciones</h3>
      <DataTable
        :value="filteredSuscripciones"
        stripedRows
        :paginator="true"
        :rows="5"
        :rowsPerPageOptions="[5, 10, 20, 50]"
        tableStyle="min-width: 50rem"
        :filters="filters"
        :globalFilterFields="['client.name', 'client.email', 'importe', 'date_pay', 'observation']"
      >
        <template #header>
          <div class="flex justify-content-end">
            <InputText v-model="filters['global'].value" placeholder="Keyword Search" />
          </div>
        </template>
        <Column field="id" header="Id" sortable style="width: 5%"></Column>
        <Column field="client.name" header="Nombre" sortable style="width: 11%"></Column>
        <Column field="client.email" header="Email" sortable style="width: 11%"></Column>
        <Column field="date_pay" header="Fecha pago" sortable style="width: 11%"></Column>
        <Column field="date_end" header="Fecha Fin" sortable style="width: 11%"></Column>
        <Column field="importe" header="Importe" sortable style="width: 8%"></Column>
        <Column field="status" header="Estado" sortable style="width: 8%">
          <template #body="{ data }">
            <Tag :value="data.status" :severity="getSeverity(data.status)" />
          </template>
        </Column>
        <Column field="observation" header="Tipo de pago" sortable style="width: 13%"></Column>
        <template #empty>No hay clientes encontrados.</template>
      </DataTable>
    </div>
    <div v-else>
      <p>No hay clientes con suscripciones disponibles en las fechas indicadas.</p>
    </div>
  </div>
  </div>

  
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Slider from 'primevue/slider';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import api from '@/services/service';
import Tag from 'primevue/tag';
import { useToast } from 'primevue/usetoast';
import Toast from 'primevue/toast';
import InputText from 'primevue/inputtext';

const rangoId = ref([0, 100]);
const estado = ref('');
const tipoSuscripcion = ref('');
const fechaInicio = ref('');
const fechaFin = ref('');
const filteredSuscripciones = ref([]);
const filters = ref({ global: { value: '' } });

const toast = useToast();
const showError = (message) => {
    toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
};


const generateList = async () => {
  // Verificar si las fechas de inicio y fin están definidas
  if (!fechaInicio.value || !fechaFin.value) {
    // Mostrar un mensaje de error si las fechas no están definidas
    showError('Error, tienes que definir las fechas');
    return;
  }

  try {
    // Obtener las suscripciones desde la API
    const respuesta = await api.get('/subfees');
    const suscripciones = respuesta.data;

    // Filtrar las suscripciones según los criterios especificados
    const suscripcionesFiltradas = suscripciones.filter(suscripcion => 
      suscripcion.date_pay >= fechaInicio.value && // La fecha de pago es mayor o igual a la fecha de inicio
      suscripcion.date_pay <= fechaFin.value &&   // La fecha de pago es menor o igual a la fecha de fin
      suscripcion.client.id >= rangoId.value[0] &&  // El ID del cliente está dentro del rango especificado
      suscripcion.client.id <= rangoId.value[1] &&
      (estado.value === '' || suscripcion.status === estado.value) &&  // El estado coincide con el especificado o está vacío
      // El tipo de suscripción coincide con el especificado o está vacío
      (tipoSuscripcion.value === '' || suscripcion.observation === tipoSuscripcion.value) 
    );

    // Almacenar las suscripciones filtradas en una variable reactiva
    filteredSuscripciones.value = suscripcionesFiltradas;
  } catch (error) {
    // Mostrar un mensaje de error si ocurre un error al generar la lista
    console.log(error);
    showError('Error al generar la lista');
  }
};


const getSeverity = (status) => {
  switch (status) {
    case 'activa':
      return 'success';
    case 'cancelada':
      return 'danger';
    default:
      return null;
  }
};


const getSubs = async () => {
  try {
    const respuesta = await api.get('/subfees');
    filteredSuscripciones.value = respuesta.data;
  } catch (error) {
    console.error(error);
  }
};

onMounted(() => {
  getSubs();
});
</script>
