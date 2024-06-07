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
      <form @submit.prevent="createClient">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="crear_name" placeholder="name@example.com" v-model="name" />
                    <label for="floatingInput">Nombre</label>
                    <div v-if="errors.name" class="text-danger">{{ errors.name }}</div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="crear_last_name" placeholder="name@example.com" v-model="last_Name" />
                    <label for="floatingInput">Apellidos</label>
                    <div v-if="errors.last_Name" class="text-danger">{{ errors.last_Name }}</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="crear_email" placeholder="name@example.com" v-model="email" />
                    <label for="floatingInput">Email</label>
                    <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="crear_dni" placeholder="name@example.com" v-model="dni" maxlength="9"/>
                    <label for="floatingInput">DNI</label>
                    <div v-if="errors.dni" class="text-danger">{{ errors.dni }}</div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                  <div class="form-floating mb-3">
                    <input type="phone" class="form-control" id="crear_phone" placeholder="name@example.com" v-model="phone" maxlength="9" />
                    <label for="floatingInput">Teléfono</label>
                    <div v-if="errors.phone" class="text-danger">{{ errors.phone }}</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="crear_town" placeholder="name@example.com" v-model="town" />
                    <label for="floatingInput">Localidad</label>
                    <div v-if="errors.town" class="text-danger">{{ errors.town }}</div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="crear_postal_code" placeholder="name@example.com" v-model="postal_code" maxlength="5" />
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
                    <input type="text" class="form-control" id="crear_address" placeholder="name@example.com" v-model="address" />
                    <label for="floatingInput">Dirección</label>
                    <div v-if="errors.address" class="text-danger">{{ errors.address }}</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="crear_bank_account" placeholder="name@example.com" v-model="bank_account" maxlength="16"/>
                    <label for="floatingInput">Cuenta corriente</label>
                    <div v-if="errors.bank_account" class="text-danger">{{ errors.bank_account }}</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="crear_password" placeholder="name@example.com" v-model="password" />
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
                  <router-link to="/" class="d-block mt-3 text-center">Volver</router-link>
                </div>
              </div>
            </form>
    </div>
  </template>

  <script setup>
  import api from '@/services/service'
  import { ref, onMounted } from 'vue'
  import { useRouter } from 'vue-router';
  import Button from 'primevue/button'
  import { useToast } from 'primevue/usetoast'
  import Toast from 'primevue/toast'
  
  const toast = useToast()
  const provincias = ref([])
  const router = useRouter();

  
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
  
  
  const getProvinces = async () => {
    try {
      const respuesta = await api.get('/provinces')
      console.log(respuesta.data)
      provincias.value = respuesta.data
    } catch (error) {
      console.log(error)
    }
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
      showSuccess('Cliente registrado correctamente.')
      router.push('/');


    } catch (error) {
      showError('Error al crear el cliente.')
      console.error(error)
    }
  }

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
  
  const validateForm = () => {
  let valid = true
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
  return valid
}

  
  onMounted(getProvinces)
  
  </script>
  