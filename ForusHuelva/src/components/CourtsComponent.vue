<template>
  <div>
    <div class="row mt-5">
      <Toast />

      <div class="col-lg-8 offset-lg-2 mt-5">
        <div class="table-responsive-vertical p-3">

          <div class="row">
            <div class="d-flex justify-content-center">
              <h2>
                Lista Pistas
              </h2>
            </div>
          </div>
          <DataTable :value="courts" stripedRows :paginator="true" :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]"
            tableStyle="min-width: 50rem">
            <Column field="id" header="Id" sortable style="width: 25%"></Column>
            <Column field="name" header="Nombre" sortable style="width: 25%"></Column>
            <Column field="sport" header="Deporte" sortable style="width: 25%"></Column>
            <Column header="Operaciones" style="width: 25%">
              <template #body="slotProps">
                <Button class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#vista"
                  @click="selectPoliza(slotProps.data)">
                  O
                </Button>
                
              </template>
            </Column>
          </DataTable>


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
              <div class="col-lg-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="importe" placeholder="name@example.com"
                    v-model="selectedPoliza.id" readonly />
                  <label for="floatingInput">ID</label>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="pagado" placeholder="name@example.com"
                    v-model="selectedPoliza.name" readonly />
                  <label for="floatingInput">Nombre de la Pista</label>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="resto" placeholder="name@example.com"
                    v-model="selectedPoliza.sport" readonly />
                  <label for="floatingInput">Deporte</label>
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
import { ref, onMounted } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import { useToast } from "primevue/usetoast";
import Toast from 'primevue/toast';
import Tag from 'primevue/tag';
import { useRouter } from 'vue-router';
const toast = useToast();


const selectedPolizaInfo = ref({
  name: '',
  email: ''
});


const courts = ref([]);
const selectedPoliza = ref({});

const showError = () => {
  toast.add({ severity: 'error', summary: 'Error', detail: 'Algo no ha salido como se esperaba', life: 3000 });
};
const showSuccess = () => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: 'Todo esta en orden', life: 3000 });
};


const obtenerCourts = async () => {
  try {
    const respuesta = await api.get('/courts');
    courts.value = respuesta.data;

  } catch (error) {
    console.error(error);
  }
}



const selectPoliza = (poliza) => {
  selectedPoliza.value = poliza;
  // Verificar si la información del cliente está definida
  if (poliza.client && poliza.client.name !== undefined && poliza.client.email !== undefined) {
    selectedPolizaInfo.value.name = poliza.client.name;
    selectedPolizaInfo.value.email = poliza.client.email;
  } else {
    // Si la información del cliente no está definida, restablecer la variable selectedPolizaInfo
    selectedPolizaInfo.value.name = '';
    selectedPolizaInfo.value.email = '';
  }
};

const eliminarPoliza = async () => {
  try {
    if (!selectedPoliza.value) {
      console.error('No hay cliente seleccionado para eliminar.');
      return;
    }

    const idPoliza = selectedPoliza.value.id;
    const response = await api.delete(`/polizas/${idPoliza}`);

    if (response.status === 204) {

      polizas.value = polizas.value.filter(cliente => cliente.id !== idPoliza);
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


const cerrarModalBorrar = async () => {
  const borrarPolizaModal = document.getElementById("eliminar");
  const closeButton = borrarPolizaModal.querySelector(
    '[data-bs-dismiss="modal"]'
  );
  closeButton.click();
};

onMounted(() => {
  obtenerCourts();
});
</script>