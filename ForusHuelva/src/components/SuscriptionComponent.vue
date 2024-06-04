<template>
  <div>
    <div class="row mt-5">
      <Toast />

      <div class="col-lg-8 offset-lg-2 mt-5">
        <div class="table-responsive-vertical p-3">

          <div class="row">
            <div class="d-flex justify-content-center">
              <h2>
                Lista Suscripciones
              </h2>
            </div>

          </div>
          <DataTable :value="subs" stripedRows :paginator="true" :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]"
            tableStyle="min-width: 50rem" :filters="filters"
      :globalFilterFields="['client.name', 'client.email', 'importe', 'date_pay', 'observation']">
            <Column field="id" header="Id" sortable style="width: 5%"></Column>
            <Column field="client.name" header="Nombre" sortable style="width: 11%"></Column>
            <Column field="client.email" header="Email" sortable style="width: 11%"></Column>
            <Column field="importe" header="Importe" sortable style="width: 8%"></Column>
            <Column field="status" header="Estado" sortable style="width: 8%"></Column>
            <Column field="observation" header="Tipo de pago" sortable style="width: 13%"></Column>
            <Column header="Operaciones" style="width: 18%">
              <template #body="slotProps">
                <Button class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar"
                  @click="selectSub(slotProps.data)">
                  X
                </Button>
                <Button class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#vista"
                  @click="selectSub(slotProps.data)">
                  O
                </Button>
                
              </template>
            </Column>
            <template #header>
        <div class="flex justify-content-end">
            <InputText v-model="filters['global'].value" placeholder="Keyword Search" />
        </div>
      </template>
      <template #empty>No hay suscripciones encontrados.</template>
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
            <button type="button" class="btn btn-danger" @click="deleteSub">Si</button>
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
        <h5 class="modal-title text-light" id="staticBackdropLabel">Vista Sub</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="id" placeholder="name@example.com"
                v-model="selectedSub.id" readonly />
              <label for="floatingInput">Id</label>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="email" placeholder="name@example.com"
                v-model="selectedSub.client.email" readonly />
              <label for="floatingInput">Email</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="name" placeholder="name@example.com"
                v-model="selectedSub.client.name" readonly />
              <label for="floatingInput">Nombre</label>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="importe" placeholder="name@example.com"
                v-model="selectedSub.importe" readonly />
              <label for="floatingInput">Importe</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="name" placeholder="name@example.com"
                v-model="selectedSub.date_end" readonly />
              <label for="floatingInput">Fecha expiración</label>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="importe" placeholder="name@example.com"
                v-model="selectedSub.status" readonly />
              <label for="floatingInput">Estado</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="date_pay" placeholder="name@example.com"
                v-model="selectedSub.date_pay" readonly />
              <label for="floatingInput">Pagado</label>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="observation" placeholder="name@example.com"
                v-model="selectedSub.observation" readonly />
              <label for="floatingInput">Observación</label>
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
import InputText from 'primevue/inputtext'

const router = useRouter();
const toast = useToast();
const importe = ref('');

const observation = ref('');
const clientes = ref([]);
const date_end = ref(''); // Variable para la fecha de caducidad

const filters = ref({ global: { value: '' } });


const selectedSubInfo = ref({
  name: '',
  email: ''
});

const subs = ref([]);
const selectedSub = ref({
  id: '',
  client: {
    name: '',
    email: ''
  },
  importe: '',
  date_pay: '',
  observation: ''
});

const showError = (message) => {
  toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
};

const showSuccess = (message) => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: message || 'Todo está en orden', life: 3000 });
};

const getSubs = async () => {
  try {
    const respuesta = await api.get('/subfees');
    subs.value = respuesta.data;
  } catch (error) {
    console.error(error);
  }
};

const selectSub = (subs) => {
  selectedSub.value = subs;
  if (subs.importe !== undefined) {
    importe.value = subs.importe;
  } else {
    importe.value = ''; // Puedes establecer un valor predeterminado si no hay importe definido en la suscripción
  }
  if (subs.client && subs.client.name !== undefined && subs.client.email !== undefined) {
    selectedSubInfo.value.name = subs.client.name;
    selectedSubInfo.value.email = subs.client.email;
  } else {
    selectedSubInfo.value.name = '';
    selectedSubInfo.value.email = '';
  }
};

const deleteSub = async () => {
  try {
    if (!selectedSub.value) {
      console.error('No hay cliente seleccionado para eliminar.');
      return;
    }

    const idSub = selectedSub.value.id;
    const response = await api.delete(`/subfees/${idSub}`);

    if (response.status === 204) {
      subs.value = subs.value.filter(cliente => cliente.id !== idSub);
      clseModalDelete();
      showSuccess('Suscripción eliminada correctamente.');
    } else {
      showError('Error al eliminar el cliente.');
    }
  } catch (error) {
    showError('Error al eliminar el cliente.');
    console.error('Error al eliminar el cliente:', error);
  }
};


const clseModalDelete = () => {
  const borrarSubModal = document.getElementById("eliminar");
  const closeButton = borrarSubModal.querySelector('[data-bs-dismiss="modal"]');
  closeButton.click();
};


const getClients = async () => {
  try {
    const respuesta = await api.get('/clients');
    clientes.value = respuesta.data;
  } catch (error) {
    console.log(error);
  }
};


onMounted(() => {
  getClients();
  getSubs();
});
</script>

