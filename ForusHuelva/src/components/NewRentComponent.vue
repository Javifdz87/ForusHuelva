<template>
    <div class="container">
        <Toast />
        <div class="row justify-content-center m-3">
            <form @submit.prevent="crearAlquiler">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="email_rent" v-model="localEmail" placeholder="email" readonly />
                            <label for="cliente">Email</label>
                            <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nombre_rent" v-model="localName" placeholder="Nombre" readonly />
                            <label for="nombre">Nombre</label>
                            <div v-if="errors.name" class="text-danger">{{ errors.name }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <select id="sport" v-model="DeporteSeleccionado" @change="actualizarPistas" class="form-select">
                                <option value="" disabled selected>Selecciona un deporte</option>
                                <option v-for="sport in sports" :key="sport.id" :value="sport.id">
                                    {{ sport.sport }}
                                </option>
                            </select>
                            <label for="floatingInput">Deporte</label>
                            <div v-if="errors.DeporteSeleccionado" class="text-danger">{{ errors.DeporteSeleccionado }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="fechaInicio" v-model="date_day" placeholder="Elije el dia de juego" />
                            <label for="fechaInicio">Elije el día de juego</label>
                            <div v-if="errors.date_day" class="text-danger">{{ errors.date_day }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <select id="pista" v-model="pistaSeleccionada" @change="actualizarHorasDisponibles" class="form-select">
                                <option value="" disabled selected>Selecciona una pista</option>
                                <option v-for="pista in filteredPistas" :key="pista.id" :value="pista.id">
                                    {{ pista.name }}
                                </option>
                            </select>
                            <label for="floatingInput">Pista</label>
                            <div v-if="errors.pistaSeleccionada" class="text-danger">{{ errors.pistaSeleccionada }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <select id="time" v-model="timeSeleccionado" class="form-select">
                                <option value="" disabled selected>Selecciona una hora</option>
                                <option v-for="time in filteredTimes" :key="time.id" :value="time.date_time">
                                    {{ time.date_time }}
                                </option>
                            </select>
                            <label for="floatingInput">Hora</label>
                            <div v-if="errors.timeSeleccionado" class="text-danger">{{ errors.timeSeleccionado }}</div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="import" value="12" placeholder="email" readonly />
                          <label for="floatingInput">Precio</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                        <button type="submit" class="btn btn-primary btn-block w-100">Crear Alquiler</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

  
  
  <script setup>
  import api from '@/services/service';
  import { ref, defineProps, watch, onMounted } from 'vue';
  import Toast from 'primevue/toast';
  import { useToast } from "primevue/usetoast";
  
  const props = defineProps({
      email: String,
      name: String,
      id: String
  });
  
  const localEmail = ref(props.email);
  const localName = ref(props.name);
  const localId = ref(props.id);
  
  watch(() => props.email, (newVal) => {
      localEmail.value = newVal;
  });
  
  watch(() => props.name, (newVal) => {
      localName.value = newVal;
  });
  
  watch(() => props.id, (newVal) => {
      localId.value = newVal;
  });
  
  const toast = useToast();
  const importe = ref(12);
  const date_day = ref('');
  const date_time = ref('');
  const clientes = ref([]);
  const pistas = ref([]);
  const times = ref([]);
  const sports = ref([]);
  const clienteSeleccionado = ref('');
  const DeporteSeleccionado = ref('');
  const filteredPistas = ref([]);
  const filteredTimes = ref([]);
  const timeSeleccionado = ref('');
  const pistaSeleccionada = ref('');
  const rent = ref([]); // Definir rent aquí
  
  const showError = (message) => {
      toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
  };
  const showSuccess = (message) => {
      toast.add({ severity: 'success', summary: 'Correcto', detail: message || 'Todo está en orden', life: 3000 });
  };
  
  const obtenerRents = async () => {
      try {
          const respuesta = await api.get('/rentfees');
          rent.value = respuesta.data;
      } catch (error) {
          console.error(error);
      }
  };
  
  const crearAlquiler = async () => {
    if (!validarFormulario()) {
        showError('Por favor, corrige los errores del formulario.');
        return;
    }
      try {
          const currentDate = new Date().toISOString().split('T')[0];
  
          await api.post('/rentfees', {
              importe: 12,
              date_pay: currentDate,
              date_day: date_day.value,
              date_time: timeSeleccionado.value,
              client_id: localId.value,
              court_id: pistaSeleccionada.value,
              sport_id: DeporteSeleccionado.value,

          });
  
          cerrarModalCrear();
          showSuccess('Se ha creado correctamente.');
          date_day.value = '';
          date_time.value = '';
          clienteSeleccionado.value = '';
          DeporteSeleccionado.value = '';
          timeSeleccionado.value = '';
          pistaSeleccionada.value = '';
  
          obtenerRents();
      } catch (error) {
          showError('Error al crear el alquiler.');
          console.error(error);
      }
  };
  
  const obtenerClientes = async () => {
      try {
          const respuesta = await api.get('/clientes');
          clientes.value = respuesta.data;
      } catch (error) {
          console.error(error);
      }
  };
  
  const obtenerPistas = async () => {
      try {
          const respuesta = await api.get('/courts');
          pistas.value = respuesta.data;
      } catch (error) {
          console.log(error);
      }
  };
  
  const obtenerHoras = async () => {
      try {
          const respuesta = await api.get('/times');
          times.value = respuesta.data;
      } catch (error) {
          console.log(error);
      }
  };
  
  const obtenerDeportes = async () => {
      try {
          const respuesta = await api.get('/sports');
          sports.value = respuesta.data;
      } catch (error) {
          console.log(error);
      }
  };
  
  
  const actualizarPistas = () => {
      filteredPistas.value = pistas.value.filter(pista => pista.sport_id === DeporteSeleccionado.value);
  };
  
  const actualizarHorasDisponibles = () => {
      filteredTimes.value = times.value.filter(time => {
          const horaDisponible = !rent.value.some(rentItem => {
              return rentItem.date_day === date_day.value && rentItem.date_time === time.date_time && rentItem.court_id === pistaSeleccionada.value;
          });
          return horaDisponible;
      });
  };
  
  const cerrarModalCrear = async () => {
      const crearAlquilerModal = document.getElementById('modalRent');
      const closeButton = crearAlquilerModal.querySelector('[data-bs-dismiss="modal"]');
      closeButton.click();
  };

  const errors = ref({
        email: '',
        name: '',
        DeporteSeleccionado: '',
        date_day: '',
        pistaSeleccionada: '',
        timeSeleccionado: ''
});

const validarFormulario = () => {
    let valid = true;
    errors.value = {
        email: '',
        name: '',
        DeporteSeleccionado: '',
        date_day: '',
        pistaSeleccionada: '',
        timeSeleccionado: ''
    };

    if (!localEmail.value) {
        errors.value.email = 'El campo Email no puede estar vacío.';
        valid = false;
    }
    if (!localName.value) {
        errors.value.name = 'El campo Nombre no puede estar vacío.';
        valid = false;
    }
    if (!DeporteSeleccionado.value) {
        errors.value.DeporteSeleccionado = 'Debes seleccionar un deporte.';
        valid = false;
    }
    if (!date_day.value) {
        errors.value.date_day = 'Debes seleccionar una fecha.';
        valid = false;
    }
    if (!pistaSeleccionada.value) {
        errors.value.pistaSeleccionada = 'Debes seleccionar una pista.';
        valid = false;
    }
    if (!timeSeleccionado.value) {
        errors.value.timeSeleccionado = 'Debes seleccionar una hora.';
        valid = false;
    }

    return valid;
};

  
  onMounted(() => {
      obtenerClientes();
      obtenerRents();
      obtenerPistas();
      obtenerHoras();
      obtenerDeportes();
  });
  </script>