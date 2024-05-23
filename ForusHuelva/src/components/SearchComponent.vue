<template>
  <div class="container mb-5">
    <Toast />
    <div class="row mt-5">
      <h2>Selección de Cliente y Suscripciones</h2>
    </div>
    <div class="row g-3 mt-3">
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
          <option value="activo">Activo</option>
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
        <Button @click="generarListado" class="btn btn-primary">Generar Listado</Button>
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
        <Column field="date_end" header="Fecha Fin" sortable style="width: 11%"></Column>
        <Column field="date_pay" header="Fecha pago" sortable style="width: 11%"></Column>
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
const showError = () => {
  toast.add({
    severity: 'error',
    summary: 'Error',
    detail: 'Algo no ha salido como se esperaba',
    life: 3000
  });
};

const generarListado = async () => {
  console.log('Rango ID:', rangoId.value);
  console.log('Estado:', estado.value);
  console.log('Tipo de Suscripción:', tipoSuscripcion.value);
  console.log('Fecha de Inicio:', fechaInicio.value);
  console.log('Fecha de Fin:', fechaFin.value);

  if (!fechaInicio.value || !fechaFin.value) {
    showError();
    return;
  }

  try {
    const respuesta = await api.get('/subfees');
    const suscripciones = respuesta.data;

    // Filtrar las suscripciones según las fechas, el estado, el tipo de suscripción y el rango de ID del cliente especificados
    const suscripcionesFiltradas = suscripciones.filter(suscripcion => 
      suscripcion.date_pay >= fechaInicio.value &&
      suscripcion.date_pay <= fechaFin.value &&
      suscripcion.client.id >= rangoId.value[0] &&
      suscripcion.client.id <= rangoId.value[1] &&
      (estado.value === '' || suscripcion.status === estado.value) &&
      (tipoSuscripcion.value === '' || suscripcion.observation === tipoSuscripcion.value)
    );

    // Asignar las suscripciones filtradas a filteredSuscripciones.value
    filteredSuscripciones.value = suscripcionesFiltradas;
    console.log(filteredSuscripciones.value);
  } catch (error) {
    console.log(error);
    showError();
  }
};

const getSeverity = (status) => {
  switch (status) {
    case 'activo':
      return 'success';
    case 'cancelada':
      return 'danger';
    default:
      return null;
  }
};

const selectSub = (subs) => {
  // Lógica para seleccionar suscripción (puedes adaptar esto según tu implementación)
  console.log('Seleccionar suscripción:', subs);
};

const obtenerSubs = async () => {
  try {
    const respuesta = await api.get('/subfees');
    filteredSuscripciones.value = respuesta.data;
  } catch (error) {
    console.error(error);
  }
};

onMounted(() => {
  obtenerSubs();
});
</script>
