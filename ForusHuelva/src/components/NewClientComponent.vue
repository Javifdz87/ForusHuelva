<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <h2>Forus Huelva</h2>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        
      </div>
    </div>

  </nav>
      <Toast />

    <div class="container mt-5">
      <div class="table-responsive-vertical p-4">
      <h1>Registrar Nuevo Cliente</h1>
      </div>
      <form @submit.prevent="registrarCliente">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" placeholder="name@example.com" v-model="name"
                      required />
                    <label for="floatingInput">Nombre</label>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="last_name" placeholder="name@example.com"
                      v-model="last_Name" required />
                    <label for="floatingInput">Apellidos</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" v-model="email"
                      required />
                    <label for="floatingInput">Email</label>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="dni" placeholder="name@example.com" v-model="dni" maxlength="9"
                      required />
                    <label for="floatingInput">DNI</label>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                  <div class="form-floating mb-3">
                    <input type="phone" class="form-control" id="phone" placeholder="name@example.com" v-model="phone"
                      required maxlength="9" />
                    <label for="floatingInput">Teléfono</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="town" placeholder="name@example.com" v-model="town"
                      required />
                    <label for="floatingInput">Localidad</label>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="postal_code" placeholder="name@example.com"
                      v-model="postal_code" required maxlength="5" />
                    <label for="floatingInput">Código Postal</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
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
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="address" placeholder="name@example.com"
                      v-model="address" required />
                    <label for="floatingInput">Dirección</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="bank_account" placeholder="name@example.com"
                      v-model="bank_account" required />
                    <label for="floatingInput">Cuenta corriente</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" placeholder="name@example.com"
                      v-model="password" required />
                    <label for="floatingInput">Contraseña</label>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-12 mb-3">
                  <button type="submit" class="btn btn-primary btn-block w-100">
                    Registrar Cliente
                  </button>
                  <router-link to="/" class="d-block mt-3 text-center">Volver</router-link>

                </div>
              </div>
            </form>
    </div>
  </template>
  
  <script setup>
  import api from '@/services/service'
  import { ref, onMounted } from 'vue'
  import Button from 'primevue/button'
  import { useToast } from 'primevue/usetoast'
  import Toast from 'primevue/toast'
  
  const toast = useToast()
  const provincias = ref([])
  
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
  
  
  const obtenerProvincias = async () => {
    try {
      const respuesta = await api.get('/provinces')
      console.log(respuesta.data)
      provincias.value = respuesta.data
    } catch (error) {
      console.log(error)
    }
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
      await api.post('/clientes', data)
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
      showSuccess()

    } catch (error) {
      showError()
      console.error(error)
    }
  }
  

  
  onMounted(obtenerProvincias)
  
  </script>
  