<template>
    <div class="container mt-5">
      <form @submit.prevent="registerClient">
        <div class="mb-3">
          <label for="inputNombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="inputNombre" v-model="userData.name" required>
        </div>
        <div class="mb-3">
          <label for="inputApellidos" class="form-label">Apellidos</label>
          <input type="text" class="form-control" id="inputApellidos" v-model="userData.apellidos" required>
        </div>
        <div class="mb-3">
          <label for="inputApellidos" class="form-label">DNI</label>
          <input type="text" class="form-control" id="inputApellidos" v-model="userData.apellidos" required>
        </div>
        <div class="mb-3">
          <label for="inputEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail" v-model="userData.email" required>
        </div>
        <div class="mb-3">
          <label for="inputPhone" class="form-label">Teléfono</label>
          <input type="tel" class="form-control" id="inputPhone" v-model="userData.telefono">
        </div>
        <div class="mb-3">
          <label for="inputPoblacion" class="form-label">Población</label>
          <input type="text" class="form-control" id="inputPoblacion" v-model="userData.poblacion">
        </div>
        <div class="mb-3">
          <label for="inputCodigoPostal" class="form-label">Código Postal</label>
          <input type="text" class="form-control" id="inputCodigoPostal" v-model="userData.codigoPostal">
        </div>
        <div class="mb-3">
          <label for="inputProvincia" class="form-label">Provincia</label>
          <input type="text" class="form-control" id="inputProvincia" v-model="userData.provincia">
        </div>
        <div class="mb-3">
          <label for="inputDireccion" class="form-label">Dirección</label>
          <input type="text" class="form-control" id="inputDireccion" v-model="userData.direccion">
        </div>
        <div class="mb-3">
          <label for="inputCuentaBancaria" class="form-label">Cuenta Bancaria</label>
          <input type="text" class="form-control" id="inputCuentaBancaria" v-model="userData.cuentaBancaria">
        </div>
        <div class="mb-3">
          <label for="inputContraseña" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="inputContraseña" v-model="userData.contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import api from '@/services/service';
  import { ref } from 'vue';
  
  const userData = ref({
    name: '',
    apellidos: '',
    email: '',
    telefono: '',
    poblacion: '',
    codigoPostal: '',
    provincia: '',
    direccion: '',
    cuentaBancaria: '',
  });
  
  const registerClient = async () => {
    try {
      const response = await api.post('/clientes', userData.value);
      console.log('Usuario registrado:', response.data);
      // Aquí podrías redirigir al usuario a otra página o mostrar un mensaje de éxito
    } catch (error) {
      console.error('Error al registrar usuario:', error.response.data);
      // Aquí podrías mostrar un mensaje de error al usuario
    }
  };
  
  </script>
  