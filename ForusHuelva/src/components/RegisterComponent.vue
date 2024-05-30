<template>
    <div class="container mt-5">
      <Toast />

      <div class="row justify-content-center ">
        <div class="col-md-6 mt-5">
          <h1 class="text-center mb-4">Registro Administrador</h1>
          <form @submit.prevent="registerUser">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
              <label for="name" class="form-label">Nombre:</label>
              <input type="text" id="name" v-model="userData.name" class="form-control" required>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" id="email" v-model="userData.email" class="form-control" required>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
              <label for="password" class="form-label">Contraseña:</label>
              <input type="password" id="password" v-model="userData.password" class="form-control" required>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-grid">
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
            </div>
           
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import api from '@/services/service'
  import { ref } from 'vue';
  import { useToast } from 'primevue/usetoast'

  import Toast from 'primevue/toast';

  const toast = useToast();


  const showError = (message) => {
    toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
};

const showSuccess = (message) => {
    toast.add({ severity: 'success', summary: 'Correcto', detail: message || 'Todo está en orden', life: 3000 });
};

  const userData = ref({
    name: '',
    email: '',
    password: '',
    role: 1
  });
  
  const registerUser = async () => {
    try {
      const response = await api.post('/register', userData.value);
      console.log('Usuario registrado:', response.data);
      showSuccess('Administrador creado correctamente');

      // Aquí podrías redirigir al usuario a otra página o mostrar un mensaje de éxito
    } catch (error) {
      console.error('Error al registrar usuario:', error.response.data);
      showError('Error al crear administrador');

      // Aquí podrías mostrar un mensaje de error al usuario
    }
  };
  </script>
  