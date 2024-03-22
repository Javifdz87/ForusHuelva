<template>
  <div class="container">
    <Toast />

    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title text-center">Iniciar sesión</h2>
            <form @submit.prevent="login">
              <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico:</label>
                <input type="email" id="email" v-model="email" class="form-control" required />
                <!-- Aquí se mostrarán los errores si los hay -->
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" id="password" v-model="password" class="form-control" required />
                <!-- Aquí se mostrarán los errores si los hay -->
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
              </div>
              email: admin@gmail.com <br>
              contraseña: admin

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import api from '@/services/service';
import { useRouter } from 'vue-router';
import { ref } from 'vue';
import { useToast } from 'primevue/usetoast'
import Toast from 'primevue/toast'

const toast = useToast()
const email = ref('');
const password = ref('');
const router = useRouter();

const showError = () => {
  toast.add({
    severity: 'error',
    summary: 'Error',
    detail: 'No coinciden los datos',
    life: 3000
  })
}

async function login() {
  try {
    console.log('Datos de inicio de sesión:', { email: email.value, password: password.value });

    const response = await api.post('/login', {
      email: email.value,
      password: password.value
    });

    console.log('Respuesta del servidor:', response);

    if (response.status === 200) {
      console.log('Inicio de sesión exitoso');
      if (router) {
        router.push('/home');
      }
    }
  } catch (error) {
    console.error('Error al iniciar sesión:', error);
    showError();
  }
}
</script>
