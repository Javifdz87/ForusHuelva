<template>
  <div class="container mt-5">
    <Toast />

    <h2>Selección de Cliente y Pólizas</h2>
    <div class="row g-3">
      <div class="col-md-4">
        <label for="rangoId" class="form-label">Rango de ID del Cliente:</label>
        <div class="card flex justify-content-center">
          <Slider v-model="rangoId" range :max="100" class="w-14rem" />
          <div class="mt-2">{{ rangoId }}</div>
        </div>
      </div>
      <div class="col-md-4">
        <label for="fechaInicio" class="form-label">Fecha de Inicio:</label>
        <input type="date" id="fechaInicio" v-model="fechaInicio" class="form-control">
      </div>
      <div class="col-md-4">
        <label for="fechaFin" class="form-label">Fecha de Fin:</label>
        <input type="date" id="fechaFin" v-model="fechaFin" class="form-control">
      </div>
      <div class="col-12">
        <Button @click="generarListado" class="btn btn-primary">Generar Listado</Button>
      </div>
    </div>

    <div v-if="filteredPolizas.length > 0">
      <h3>Listado de Clientes con Pólizas</h3>
      <DataTable :value="filteredPolizas" stripedRows :paginator="true" :rows="20" :rowsPerPageOptions="[5, 10, 20, 50]"
                 tableStyle="min-width: 50rem">
        <Column field="client.id" header="#" sortable style="width: 12%"></Column>
        <Column field="client.name" header="Nombre" sortable style="width: 12%"></Column>
        <Column field="client.email" header="Email" sortable style="width: 12%"></Column>
        <Column field="importe" header="Importe" sortable style="width: 12%"></Column>
        <Column field="start_date" header="Fecha Inicio" sortable style="width: 12%"></Column>
        <Column field="status" header="Estado" sortable style="width: 12%">
          <template #body="{data}">
            <Tag :value="data.status" :severity="getSeverity(data.status)" />
        </template></Column>
        <Column field="observation" header="Observaciones" sortable style="width: 12%"></Column>
        
      </DataTable>
    </div>
    <div v-else>
      <p>No hay clientes con pólizas disponibles en las fechas indicadas.</p>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import Slider from 'primevue/slider';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import api from '@/services/service';
import Tag from 'primevue/tag';
import { useToast } from 'primevue/usetoast'
import Toast from 'primevue/toast'

const rangoId = ref([0, 100]);
const fechaInicio = ref('');
const fechaFin = ref('');
const filteredPolizas = ref([]);

const toast = useToast()
const showError = () => {
  toast.add({
    severity: 'error',
    summary: 'Error',
    detail: 'Algo no ha salido como se esperaba',
    life: 3000
  })
}

const getSeverity = (status) => {
  switch (status) {
    case 'cobrada':
      return 'success';
    case 'a cuenta':
      return 'warning';
    case 'liquidada':
      return 'info';
    case 'anulada':
    case 'pre anulada':
      return 'danger';
    default:
      return 'primary';
  }
};

const generarListado = async () => {
  console.log('Rango ID:', rangoId.value);
  console.log('Fecha de Inicio:', fechaInicio.value);
  console.log('Fecha de Fin:', fechaFin.value);

  if (!fechaInicio.value || !fechaFin.value) {
    showError();
        return;
  }

  try {
    const respuesta = await api.get('/polizas');
    const polizas = respuesta.data;

    // Filtrar las pólizas según las fechas y el rango de ID del cliente especificados
    const polizasFiltradas = polizas.filter(poliza => 
      poliza.start_date >= fechaInicio.value &&
      poliza.start_date <= fechaFin.value &&
      poliza.client.id >= rangoId.value[0] &&
      poliza.client.id <= rangoId.value[1]
    );

    // Asignar las pólizas filtradas a filteredPolizas.value
    filteredPolizas.value = polizasFiltradas;
    console.log(filteredPolizas);
  } catch (error) {
    console.log(error);
  }
};
</script>
