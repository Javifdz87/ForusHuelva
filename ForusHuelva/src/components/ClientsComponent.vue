<template>
  <div class="mt-5">
    <Toast />

    <div class="row mt-5">
      <div class="col-lg-8 offset-lg-2 mt-5">
        <div class="table-responsive-vertical p-3">
          <div class="row">
            <div class="d-flex justify-content-center">
              <h2>Lista Clientes</h2>
            </div>

          </div>

          <DataTable selectionMode="single" :value="clients" stripedRows :paginator="true" :rows="5"
            :rowsPerPageOptions="[5, 10, 20, 50]" tableStyle="min-width: 50rem" :filters="filters"
            :globalFilterFields="['name', 'last_Name', 'dni', 'phone', 'town', 'address']">
            <Column field="name" header="Nombre" sortable style="width: 14%"></Column>
            <Column field="last_Name" header="Apellidos" sortable style="width: 14%"></Column>
            <Column field="dni" header="DNI" sortable style="width: 14%"></Column>
            <Column field="phone" header="Teléfono" sortable style="width: 14%"></Column>
            <Column field="town" header="Localidad" sortable style="width: 14%"></Column>
            <Column field="address" header="Dirección" sortable style="width: 14%"></Column>
            <Column header="Operaciones" style="width: 16%">
              <template #body="slotProps">
                <Button class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar"
                  @click="selectClient(slotProps.data)">
                  X
                </Button>

                <Button class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#vista"
                  @click="selectClient(slotProps.data)">
                  O
                </Button>
                <Button class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#editClient"
                  @click="selectClient(slotProps.data)">
                  M
                </Button>
                <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">:</button>
                  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><Button class="dropdown-item m-1" data-bs-toggle="modal" data-bs-target="#modalSub"
                        @click="selectClient(slotProps.data)">Añadir Suscripción</Button></li>
                    <li><Button class="dropdown-item m-1" data-bs-toggle="modal" data-bs-target="#modalRent"
                        @click="selectClient(slotProps.data)">Añadir Alquiler</Button></li>
                  </ul>
                </div>
              </template>
            </Column>
            <template #header>
              <div class="clearfix">
                <InputText v-model="filters['global'].value" placeholder="Keyword Search" class="float-start" />
                <button class="btn btn-success float-end" type="button" data-bs-toggle="modal"
                  data-bs-target="#dardealta">
                  Dar de Alta
                </button>
              </div>

            </template>
            <template #empty>No hay clientes encontrados.</template>
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
            <button type="button" class="btn btn-danger" @click="deleteClient">Si</button>
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
            <h5 class="modal-title text-light" id="staticBackdropLabel">Vista de Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="id" placeholder="name@example.com"
                    v-model="selectedClient.id" readonly />
                  <label for="floatingInput">Id Cliente</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="dni" placeholder="name@example.com"
                    v-model="selectedClient.dni" readonly />
                  <label for="floatingInput">DNI</label>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="vista_name" placeholder="name@example.com"
                    v-model="selectedClient.name" readonly />
                  <label for="floatingInput">Nombre</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="vista_last_Name" placeholder="name@example.com"
                    v-model="selectedClient.last_Name" readonly />
                  <label for="floatingInput">Apellido</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="vista_email" placeholder="name@example.com"
                    v-model="selectedClient.email" readonly />
                  <label for="floatingInput">Email</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="vista_phone" placeholder="name@example.com"
                    v-model="selectedClient.phone" readonly />
                  <label for="floatingInput">Telefóno</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="vista_town" placeholder="name@example.com"
                    v-model="selectedClient.town" readonly />
                  <label for="floatingInput">Localidad</label>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="vista_postal_code" placeholder="name@example.com"
                    v-model="selectedClient.postal_code" readonly />
                  <label for="floatingInput">Codigo Postal</label>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="vista_province" placeholder="name@example.com"
                    v-model="selectedClient.province" readonly />
                  <label for="floatingInput">Provincia</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="vista_address" placeholder="name@example.com"
                    v-model="selectedClient.address" readonly />
                  <label for="floatingInput">Dirección</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="vista_bank_account" placeholder="name@example.com"
                    v-model="selectedClient.bank_account" readonly />
                  <label for="floatingInput">Cuenta Bancaria</label>
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

    <!-- Modal Nuevo cliente -->
    <div class="modal fade" id="dardealta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <Toast />

              <div class="row justify-content-center m-3">
                <form @submit.prevent="createClient">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="crear_name" placeholder="name@example.com"
                          v-model="name" />
                        <label for="floatingInput">Nombre</label>
                        <div v-if="errors.name" class="text-danger">{{ errors.name }}</div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="crear_last_name" placeholder="name@example.com"
                          v-model="last_Name" />
                        <label for="floatingInput">Apellidos</label>
                        <div v-if="errors.last_Name" class="text-danger">{{ errors.last_Name }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="crear_email" placeholder="name@example.com"
                          v-model="email" />
                        <label for="floatingInput">Email</label>
                        <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="crear_dni" placeholder="name@example.com"
                          v-model="dni" maxlength="9" />
                        <label for="floatingInput">DNI</label>
                        <div v-if="errors.dni" class="text-danger">{{ errors.dni }}</div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                      <div class="form-floating mb-3">
                        <input type="phone" class="form-control" id="crear_phone" placeholder="name@example.com"
                          v-model="phone" maxlength="9" />
                        <label for="floatingInput">Teléfono</label>
                        <div v-if="errors.phone" class="text-danger">{{ errors.phone }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="crear_town" placeholder="name@example.com"
                          v-model="town" />
                        <label for="floatingInput">Localidad</label>
                        <div v-if="errors.town" class="text-danger">{{ errors.town }}</div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="crear_postal_code" placeholder="name@example.com"
                          v-model="postal_code" maxlength="5" />
                        <label for="floatingInput">Código Postal</label>
                        <div v-if="errors.postal_code" class="text-danger">{{ errors.postal_code }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                      <div class="form-floating mb-3">
                        <select id="province" class="form-select" v-model="province">
                          <option value="" disabled selected>Selecciona una provincia</option>
                          <option v-for="provincia in provincias" :key="provincia.cod" :value="provincia.nombre">
                            {{ provincia.nombre }}
                          </option>
                        </select>
                        <label for="province">Provincias</label>
                        <div v-if="errors.province" class="text-danger">{{ errors.province }}</div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="crear_address" placeholder="name@example.com"
                          v-model="address" />
                        <label for="floatingInput">Dirección</label>
                        <div v-if="errors.address" class="text-danger">{{ errors.address }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="crear_bank_account" placeholder="name@example.com"
                          v-model="bank_account" maxlength="16" />
                        <label for="floatingInput">Cuenta corriente</label>
                        <div v-if="errors.bank_account" class="text-danger">{{ errors.bank_account }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="crear_password" placeholder="name@example.com"
                          v-model="password" />
                        <label for="floatingInput">Contraseña</label>
                        <div v-if="errors.password" class="text-danger">{{ errors.password }}</div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                      <button type="submit" class="btn btn-primary btn-block w-100">
                        Registrar Cliente
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal editar Cliente -->
    <div class="modal fade" id="editClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-warning">
            <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center m-3">
              <form @submit.prevent="editClient">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="editar_name" placeholder="Nombre"
                        v-model="selectedClient.name" required />
                      <label for="name">Nombre</label>

                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="editar_last_name" placeholder="Apellidos"
                        v-model="selectedClient.last_Name" required />
                      <label for="last_name">Apellidos</label>

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="editar_email" placeholder="Email"
                        v-model="selectedClient.email" required />
                      <label for="email">Email</label>

                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="editar_dni" placeholder="DNI"
                        v-model="selectedClient.dni" maxlength="9" required />
                      <label for="dni">DNI</label>

                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="editar_phone" placeholder="Teléfono"
                        v-model="selectedClient.phone" maxlength="9" required />
                      <label for="phone">Teléfono</label>

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="editar_town" placeholder="Localidad"
                        v-model="selectedClient.town" required />
                      <label for="town">Localidad</label>

                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="editar_postal_code" placeholder="Código Postal"
                        v-model="selectedClient.postal_code" maxlength="5" required />
                      <label for="postal_code">Código Postal</label>

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-floating mb-3">
                      <select id="editar_province" class="form-select" v-model="selectedClient.province" required>
                        <option value="" disabled selected>Selecciona una provincia</option>
                        <option v-for="provincia in provincias" :key="provincia.cod" :value="provincia.nombre">
                          {{ provincia.nombre }}
                        </option>
                      </select>
                      <label for="province">Provincias</label>

                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="editar_address" placeholder="Dirección"
                        v-model="selectedClient.address" required />
                      <label for="address">Dirección</label>

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                    <button type="submit" class="btn btn-warning btn-block w-100">Editar Cliente</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal Añadir Suscripción -->
    <div class="modal fade" id="modalSub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Añadir Suscripción Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <NewSubComponent :id="selectedClient.id" :name="selectedClient.name" :email="selectedClient.email" />
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Añadir Alquiler -->
    <div class="modal fade" id="modalRent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Añadir Alquiler Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <NewRentComponent :id="selectedClient.id" :name="selectedClient.name" :email="selectedClient.email" />

          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script setup>
import api from '@/services/service'
import { ref, onMounted } from 'vue'
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
import Button from 'primevue/button'
import { useToast } from 'primevue/usetoast'
import Toast from 'primevue/toast'
import InputText from 'primevue/inputtext'

import NewRentComponent from '@/components/NewRentComponent.vue';
import NewSubComponent from '@/components/NewSubComponent.vue';


const toast = useToast()
const clients = ref([])
const provincias = ref([])
const filters = ref({ global: { value: '' } })


const selectedClient = ref({})
const name = ref('')
const last_Name = ref('')
const dni = ref('')
const email = ref('')
const phone = ref('')
const town = ref('')
const postal_code = ref('')
const province = ref('')
const bank_account = ref('')
const address = ref('')
const password = ref('')

const showError = (message) => {
  toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
};

const showSuccess = (message) => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: message || 'Todo está en orden', life: 3000 });
};

const getClients = async () => {
  try {
    const respuesta = await api.get('/clients')
    console.log(respuesta.data)
    clients.value = respuesta.data
    getProvinces();
  } catch (error) {
    console.log(error)
  }
}

const getProvinces = async () => {
  try {
    const respuesta = await api.get('/provinces')
    console.log(respuesta.data)
    provincias.value = respuesta.data
  } catch (error) {
    console.log(error)
  }
}

const selectClient = (cliente) => {
  selectedClient.value = { ...cliente }
  console.log(selectedClient.value)
}


const deleteClient = async () => {
  try {
    if (!selectedClient.value) {
      console.error('No hay cliente seleccionado para eliminar.')
      return
    }

    const idCliente = selectedClient.value.id
    console.log(idCliente)
    const response = await api.delete(`/clients/${idCliente}`)

    if (response.status === 204) {
      clients.value = clients.value.filter((cliente) => cliente.id !== idCliente)
      closeModalDelete()
      showSuccess('Se ha eliminado correctamente')
    } else {
      console.error('Error al eliminar el cliente.')
      showError('Error al eliminar el cliente')
    }
  } catch (error) {
    showError('Error al eliminar al cliente')

    console.error('Error al eliminar el cliente:', error)
  }
}

const editClient = async () => {

  try {
    if (!selectedClient.value) {
      console.error('No hay cliente seleccionado para editar.');
      return;
    }

    // Convertir phone y postal_code a números enteros
    const phoneValue = parseInt(selectedClient.value.phone, 10);
    const postalCodeValue = parseInt(selectedClient.value.postal_code, 10);

    // Verificar si la conversión fue exitosa
    if (isNaN(phoneValue) || isNaN(postalCodeValue)) {
      throw new Error('El formato de phone o postal_code no es válido');
    }

    const idCliente = selectedClient.value.id;
    const data = {
      name: selectedClient.value.name,
      last_Name: selectedClient.value.last_Name,
      dni: selectedClient.value.dni,
      email: selectedClient.value.email,
      phone: phoneValue, // Usar el valor convertido
      town: selectedClient.value.town,
      postal_code: postalCodeValue, // Usar el valor convertido
      province: selectedClient.value.province,
      address: selectedClient.value.address,
    };

    console.log('Datos a enviar:', data);

    const response = await api.put(`/clients/${idCliente}`, data); // Enviar `data` en la solicitud `PUT`

    if (response.status === 200) {
      console.log('Cliente actualizado correctamente.');

      // Limpiar los campos del formulario
      selectedClient.value = {
        name: '',
        last_Name: '',
        dni: '',
        email: '',
        phone: '',
        town: '',
        postal_code: '',
        province: '',
        address: ''
      };

      closeModalEdit(); // Cerrar el modal de edición
      showSuccess('Editado Correctamente'); // Mostrar mensaje de éxito
      getClients(); // Actualizar la lista de clients
    } else {
      console.error('Error al editar el cliente.');
      showError('Error al editar el cliente'); // Mostrar mensaje de error
    }
  } catch (error) {
    console.error('Error al editar el cliente:', error);
    showError('Error al editar el cliente'); // Mostrar mensaje de error
  }
};


const closeModalEdit = async () => {
  const editClientModal = document.getElementById('editClient')
  const closeButton = editClientModal.querySelector('[data-bs-dismiss="modal"]')
  closeButton.click()
}

const closeModalDelete = async () => {
  const borrarClienteModal = document.getElementById('eliminar')
  const closeButton = borrarClienteModal.querySelector('[data-bs-dismiss="modal"]')
  closeButton.click()
}

const createClient = async () => {
  if (!validateForm()) {
    showError('Por favor, corrige los errores del formulario.')
    return
  }
  try {
    // Convertir phone y postal_code a números enteros
    const phoneValue = parseInt(phone.value)
    const postalCodeValue = parseInt(postal_code.value)

    // Verificar si la conversión fue exitosa
    if (isNaN(phoneValue) || isNaN(postalCodeValue)) {
      throw new Error('El formato de phone o postal_code no es válido')
    }

    // Construir el objeto de datos a enviar
    const data = {
      name: name.value,
      last_Name: last_Name.value,
      dni: dni.value,
      email: email.value,
      phone: phoneValue, // Usar el valor convertido
      town: town.value,
      postal_code: postalCodeValue, // Usar el valor convertido
      province: province.value,
      bank_account: bank_account.value,
      address: address.value,
      password: password.value,

    }

    console.log('Datos a enviar:', data)

    // Realizar la solicitud POST
    await api.post('/clients', data)
    name.value = ''
    last_Name.value = ''
    dni.value = ''
    email.value = ''
    phone.value = ''
    town.value = ''
    postal_code.value = ''
    province.value = ''
    bank_account.value = ''
    address.value = ''
    password.value = ''
    closeModalCreate()
    showSuccess('Registrado cliente correctamente')

    // Actualizar la lista de clients después de la creación
    getClients()
  } catch (error) {
    showError('Error al crear el cliente')
    console.error(error)
  }
}

const closeModalCreate = async () => {
  const crearClienteModal = document.getElementById('dardealta')
  const closeButton = crearClienteModal.querySelector('[data-bs-dismiss="modal"]')
  closeButton.click()
}

// Objeto reactivo para almacenar los mensajes de error de validación
const errors = ref({
  name: '',
  last_Name: '',
  dni: '',
  email: '',
  phone: '',
  town: '',
  postal_code: '',
  province: '',
  bank_account: '',
  address: '',
  password: ''
})

// Función para validar el formulario
const validateForm = () => {
  // Variable para determinar si el formulario es válido
  let valid = true

  // Reiniciar los mensajes de error
  errors.value = {
    name: '',
    last_Name: '',
    dni: '',
    email: '',
    phone: '',
    town: '',
    postal_code: '',
    province: '',
    bank_account: '',
    address: '',
    password: ''
  }

  if (!name.value) {
    errors.value.name = 'El campo Nombre no puede estar vacío.'
    valid = false
  }

  if (!last_Name.value) {
    errors.value.last_Name = 'El campo Apellidos no puede estar vacío.'
    valid = false
  }

  if (!dni.value) {
    errors.value.dni = 'El campo DNI no puede estar vacío.'
    valid = false
  }

  if (!email.value) {
    errors.value.email = 'El campo de correo electrónico no puede estar vacío.'
    valid = false
  } else if (!/\S+@\S+\.\S+/.test(email.value)) {
    errors.value.email = 'El correo electrónico debe ser una dirección de correo válida.'
    valid = false
  }

  if (!phone.value) {
    errors.value.phone = 'El campo Teléfono no puede estar vacío.'
    valid = false
  }

  if (!town.value) {
    errors.value.town = 'El campo Localidad no puede estar vacío.'
    valid = false
  }

  if (!postal_code.value) {
    errors.value.postal_code = 'El campo Código Postal no puede estar vacío.'
    valid = false
  } else {
    // Verificar si el código postal comienza con el código de la provincia seleccionada
    const selectedProvince = provincias.value.find(p => p.nombre === province.value)
    if (selectedProvince && !postal_code.value.startsWith(selectedProvince.cod)) {
      errors.value.postal_code = `El código postal debe comenzar con ${selectedProvince.cod} para la provincia seleccionada.`
      valid = false
    }
  }

  if (!province.value) {
    errors.value.province = 'El campo Provincia no puede estar vacío.'
    valid = false
  }

  if (!bank_account.value) {
    errors.value.bank_account = 'El campo Cuenta Corriente no puede estar vacío.'
    valid = false
  }

  if (!address.value) {
    errors.value.address = 'El campo Dirección no puede estar vacío.'
    valid = false
  }

  if (!password.value) {
    errors.value.password = 'El campo Contraseña no puede estar vacío.'
    valid = false
  }

  // Devolver si el formulario es válido o no
  return valid
}


onMounted(getClients)

</script>
