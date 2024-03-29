<template>
  <div class="mt-5">
    <Toast />

    <div class="row mt-5">
      <div class="col-lg-8 offset-lg-2">
        <div class="table-responsive-vertical p-3">
          <div class="row">
            <div class="d-flex justify-content-center">
              <h2>Lista Clientes</h2>
            </div>
            <div class="d-flex justify-content-end">
              <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#dardealta">
                Dar de Alta
              </button>
            </div>
          </div>

          <DataTable selectionMode="single" :value="clientes" stripedRows :paginator="true" :rows="5"
            :rowsPerPageOptions="[5, 10, 20, 50]" tableStyle="min-width: 50rem">
            <Column field="name" header="Nombre" sortable style="width: 14%"></Column>
            <Column field="last_Name" header="Apellidos" sortable style="width: 14%"></Column>
            <Column field="phone" header="Teléfono" sortable style="width: 14%"></Column>
            <Column field="town" header="Localidad" sortable style="width: 14%"></Column>
            <Column field="address" header="Dirección" sortable style="width: 14%"></Column>
            <Column field="province" header="Provincia" sortable style="width: 14%"></Column>
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
                <Button class="btn btn-warning m-1" data-bs-toggle="modal" data-bs-target="#editarCliente"
                  @click="selectClient(slotProps.data)">
                  M
                </Button>
              </template>
            </Column>
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
            <button type="button" class="btn btn-danger" @click="eliminarCliente">Si</button>
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
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="id" placeholder="name@example.com"
                    v-model="selectedClient.id" />
                  <label for="floatingInput">Id Cliente</label>
                </div>
              </div>
              
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="name" placeholder="name@example.com"
                    v-model="selectedClient.name" />
                  <label for="floatingInput">Nombre</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="last_Name" placeholder="name@example.com"
                    v-model="selectedClient.last_Name" />
                  <label for="floatingInput">Apellido</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="email" placeholder="name@example.com"
                    v-model="selectedClient.email" />
                  <label for="floatingInput">Email</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="phone" placeholder="name@example.com"
                    v-model="selectedClient.phone" />
                  <label for="floatingInput">Telefóno</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="town" placeholder="name@example.com"
                    v-model="selectedClient.town" />
                  <label for="floatingInput">Localidad</label>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="postal_code" placeholder="name@example.com"
                    v-model="selectedClient.postal_code" />
                  <label for="floatingInput">Codigo Postal</label>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="province" placeholder="name@example.com"
                    v-model="selectedClient.province" />
                  <label for="floatingInput">Provincia</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="address" placeholder="name@example.com"
                    v-model="selectedClient.address" />
                  <label for="floatingInput">Dirección</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="bank_account" placeholder="name@example.com"
                    v-model="selectedClient.bank_account" />
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

    <!-- Modal Nueva cliente -->
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
            <form @submit.prevent="registrarCliente">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" placeholder="name@example.com" v-model="name"
                      required />
                    <label for="floatingInput">Nombre</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="last_name" placeholder="name@example.com"
                      v-model="last_Name" required />
                    <label for="floatingInput">Apellidos</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-7">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" v-model="email"
                      required />
                    <label for="floatingInput">Email</label>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="form-floating mb-3">
                    <input type="phone" class="form-control" id="phone" placeholder="name@example.com" v-model="phone"
                      required maxlength="9" />
                    <label for="floatingInput">Teléfono</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="town" placeholder="name@example.com" v-model="town"
                      required />
                    <label for="floatingInput">Localidad</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="postal_code" placeholder="name@example.com"
                      v-model="postal_code" required maxlength="5" />
                    <label for="floatingInput">Código Postal</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <select id="province" class="form-select" v-model="province" required>
                      <option value="" disabled selected>Selecciona una provincia</option>
                      <option v-for="provincia in provincias" :key="provincia.cod" :value="provincia.nombre">
                        {{ provincia.nombre }}
                      </option>
                    </select>
                    <label for="province">Provincias</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="address" placeholder="name@example.com"
                      v-model="address" required maxlength="5" />
                    <label for="floatingInput">Dirección</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="bank_account" placeholder="name@example.com"
                      v-model="bank_account" required />
                    <label for="floatingInput">Cuenta corriente</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 mb-3">
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
    <div class="modal fade" id="editarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-warning">
            <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center m-3">
              <h2 class="card-title text-center mb-4">Editar Cliente</h2>
              <form @submit.prevent="editarCliente">
                <div class="row">
                  <div class="col-lg-3">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="name" placeholder="name@example.com"
                        v-model="selectedClient.name" required />
                      <label for="floatingInput">Nombre</label>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="last_name" placeholder="name@example.com"
                        v-model="selectedClient.last_Name" required />
                      <label for="floatingInput">Apellidos</label>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="email" placeholder="name@example.com"
                        v-model="selectedClient.email" required />
                      <label for="floatingInput">Email</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <input type="phone" class="form-control" id="phone" placeholder="name@example.com"
                        v-model="selectedClient.phone" required maxlength="9" />
                      <label for="floatingInput">Teléfono</label>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="town" placeholder="name@example.com"
                        v-model="selectedClient.town" required />
                      <label for="floatingInput">Localidad</label>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="postal_code" placeholder="name@example.com"
                        v-model="selectedClient.postal_code" maxlength="5" />
                      <label for="floatingInput">Código Postal</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="province" placeholder="name@example.com"
                        v-model="selectedClient.province" required />
                      <label for="floatingInput">Provincia</label>
                    </div>
                  </div>

                  <div class="col-lg-8">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="address" placeholder="name@example.com"
                        v-model="selectedClient.address" maxlength="5" />
                      <label for="floatingInput">Dirección</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="bank_account" placeholder="name@example.com"
                        v-model="selectedClient.bank_account" required />
                      <label for="floatingInput">Cuenta Corriente</label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <button type="submit" class="btn btn-warning btn-block w-100">
                      Editar Cliente
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
</template>

<script setup>
import api from '@/services/service'
import { ref, onMounted } from 'vue'
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
import Button from 'primevue/button'
import { useToast } from 'primevue/usetoast'
import Toast from 'primevue/toast'

const toast = useToast()
const clientes = ref([])
const provincias = ref([])

const selectedClient = ref({})
const name = ref('')
const last_Name = ref('')
const email = ref('')
const phone = ref('')
const town = ref('')
const postal_code = ref('')
const province = ref('')
const bank_account = ref('')
const address = ref('')

const showSuccess = () => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: 'Todo esta en orden', life: 3000 })
}

const showError = () => {
  toast.add({
    severity: 'error',
    summary: 'Error',
    detail: 'Algo no ha salido como se esperaba',
    life: 3000
  })
}

const obtenerClientes = async () => {
  try {
    const respuesta = await api.get('/clientes')
    console.log(respuesta.data)
    clientes.value = respuesta.data
    obtenerProvincias();
  } catch (error) {
    console.log(error)
  }
}

const obtenerProvincias = async () => {
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


const eliminarCliente = async () => {
  try {
    if (!selectedClient.value) {
      console.error('No hay cliente seleccionado para eliminar.')
      return
    }

    const idCliente = selectedClient.value.id
    console.log(idCliente)
    const response = await api.delete(`/clientes/${idCliente}`)

    if (response.status === 204) {
      clientes.value = clientes.value.filter((cliente) => cliente.id !== idCliente)
      cerrarModalBorrar()
      showSuccess()
    } else {
      console.error('Error al eliminar el cliente.')
      showError()
    }
  } catch (error) {
    showError()

    console.error('Error al eliminar el cliente:', error)
  }
}

const editarCliente = async () => {
  try {
    if (!selectedClient.value) {
      console.error('No hay cliente seleccionado para editar.')
      return
    }

    const idCliente = selectedClient.value.id
    const response = await api.put(`/clientes/${idCliente}`, selectedClient.value)

    if (response.status === 200) {
      console.log('Cliente actualizado correctamente.')
      showSuccess()
      cerrarModalEditar()
      // Actualizar la lista de clientes después de la edición
      obtenerClientes()
    } else {
      showError()

      console.error('Error al editar el cliente.')
    }
  } catch (error) {
    showError()

    console.error('Error al editar el cliente:', error)
  }
}

const cerrarModalEditar = async () => {
  const editarClienteModal = document.getElementById('editarCliente')
  const closeButton = editarClienteModal.querySelector('[data-bs-dismiss="modal"]')
  closeButton.click()
}

const cerrarModalBorrar = async () => {
  const borrarClienteModal = document.getElementById('eliminar')
  const closeButton = borrarClienteModal.querySelector('[data-bs-dismiss="modal"]')
  closeButton.click()
}

const registrarCliente = async () => {
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
      email: email.value,
      phone: phoneValue, // Usar el valor convertido
      town: town.value,
      postal_code: postalCodeValue, // Usar el valor convertido
      province: province.value,
      bank_account: bank_account.value,
      address: address.value,

    }

    console.log('Datos a enviar:', data)

    // Realizar la solicitud POST
    await api.post('/clientes', data)
    name.value = ''
    last_Name.value = ''
    email.value = ''
    phone.value = ''
    town.value = ''
    postal_code.value = ''
    province.value = ''
    bank_account.value = ''
    address.value = ''
    cerrarModalCrear()
    showSuccess()

    // Actualizar la lista de clientes después de la creación
    obtenerClientes()
  } catch (error) {
    showError()
    console.error(error)
  }
}

const cerrarModalCrear = async () => {
  const crearClienteModal = document.getElementById('dardealta')
  const closeButton = crearClienteModal.querySelector('[data-bs-dismiss="modal"]')
  closeButton.click()
}


onMounted(obtenerClientes)

</script>
