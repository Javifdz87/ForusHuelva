<template>
    <div class="container">
        <Toast />
        <div class="row justify-content-center m-3">
            <form @submit.prevent="createRent">
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
                            <input type="text" class="form-control" id="import" :value="calculatedImporte" placeholder="Precio" readonly />
                            <label for="floatingInput">Precio</label>
                        </div>
                        <!-- Debugging output for isActive -->
                        <div v-if="isActive" class="text-success">Suscripción activa: Precio reducido</div>
                        <div v-else class="text-warning">Suscripción inactiva: Precio normal</div>
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
import { ref, defineProps, watch, onMounted, computed } from 'vue';
import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast";

const props = defineProps({
    email: String,
    name: String,
    id: String
});

const isActive = ref(false);

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
const rent = ref([]);

const showError = (message) => {
    toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
};
const showSuccess = (message) => {
    toast.add({ severity: 'success', summary: 'Correcto', detail: message || 'Todo está en orden', life: 3000 });
};

const getRents = async () => {
    try {
        const respuesta = await api.get('/rentfees');
        rent.value = respuesta.data;
    } catch (error) {
        console.error(error);
    }
};

// Función para crear un nuevo alquiler
const createRent = async () => {
    // Validar el formulario antes de proceder
    if (!validarFormulario()) {
        showError('Por favor, corrige los errores del formulario.');
        return;
    }
    try {
        // Obtener la fecha actual en formato YYYY-MM-DD
        const currentDate = new Date().toISOString().split('T')[0];

        // Realizar una solicitud a la API para crear un nuevo alquiler
        await api.post('/rentfees', {
            importe: calculatedImporte.value,      // Importe calculado del alquiler
            date_pay: currentDate,                // Fecha de pago (fecha actual)
            date_day: date_day.value,             // Fecha del día del alquiler
            date_time: timeSeleccionado.value,    // Hora seleccionada del alquiler
            client_id: localId.value,             // ID del cliente
            court_id: pistaSeleccionada.value,    // ID de la pista seleccionada
            sport_id: DeporteSeleccionado.value,  // ID del deporte seleccionado
        });

        // Cerrar el modal de creación de alquiler
        cerrarModalCrear();
        // Mostrar mensaje de éxito
        showSuccess('Se ha creado correctamente.');

        // Limpiar los campos del formulario
        date_day.value = '';
        date_time.value = '';
        clienteSeleccionado.value = '';
        DeporteSeleccionado.value = '';
        timeSeleccionado.value = '';
        pistaSeleccionada.value = '';

        // Actualizar la lista de alquileres
        getRents();
    } catch (error) {
        showError('Error al crear el alquiler.');
        console.error(error);
    }
};


const getClients = async (email) => {
    try {
        const respuesta = await api.get(`/clients/${email}`);
        console.log('Datos del cliente:', respuesta.data);
        clientes.value = respuesta.data;
        if (clientes.value.id) {
            await getSub(clientes.value.id);
        }
    } catch (error) {
        console.log(error);
    }
};

// Función para obtener la lista de pistas desde la API
const getCourts = async () => {
    try {
        // Realizar una solicitud a la API para obtener las pistas
        const respuesta = await api.get('/courts');
        // Almacenar las pistas en una variable reactiva
        pistas.value = respuesta.data;
    } catch (error) {
        // Manejar cualquier error que ocurra durante la obtención de las pistas
        console.log(error);
    }
};

const getHours = async (sportId) => {
    try {
        console.log('Obteniendo horarios para el deporte con ID:', sportId);
        const respuesta = await api.get(`/times/${sportId}`);
        console.log('Respuesta de la API para los horarios:', respuesta.data);
        if(Array.isArray(respuesta.data)) {
            times.value = respuesta.data;
        } else {
            console.error('La respuesta de la API no es un array:', respuesta.data);
        }
    } catch (error) {
        console.error('Error al obtener los horarios:', error);
    }
};



// Función para obtener la lista de deportes desde la API
const getSports = async () => {
    try {
        // Realizar una solicitud a la API para obtener los deportes
        const respuesta = await api.get('/sports');
        // Almacenar los deportes en una variable reactiva
        sports.value = respuesta.data;
    } catch (error) {
        // Manejar cualquier error que ocurra durante la obtención de los deportes
        console.log(error);
    }
};

// Función para actualizar la lista de pistas filtradas según el deporte seleccionado
const actualizarPistas = () => {
    // Filtrar las pistas que coinciden con el deporte seleccionado
    filteredPistas.value = pistas.value.filter(pista => pista.sport_id === DeporteSeleccionado.value);
    getHours(DeporteSeleccionado.value); // Corrección aquí
};

// Función para actualizar la lista de horarios disponibles según las reservas existentes
const actualizarHorasDisponibles = () => {
    // Filtrar los horarios que están disponibles (no reservados)
    filteredTimes.value = times.value.filter(time => {
        // Verificar si la hora no está reservada para la fecha y pista seleccionada
        const horaDisponible = !rent.value.some(rentItem => {
            return rentItem.date_day === date_day.value && rentItem.date_time === time.date_time 
            && rentItem.court_id === pistaSeleccionada.value;
        });
        return horaDisponible;
    });
};


const cerrarModalCrear = () => {
    const createRentModal = document.getElementById('modalRent');
    const closeButton = createRentModal.querySelector('[data-bs-dismiss="modal"]');
    closeButton.click();
};

const getSub = async (clienteId) => {
    try {
        const respuesta = await api.get(`/subfees/${clienteId}`);
        console.log('Datos de suscripción:', respuesta.data);
        const sub = respuesta.data;
        const isActiveSubscription = sub.status === 'activa' || (sub.status === 'cancelada' && sub.date_end >= new Date().toISOString().split('T')[0]);
        console.log('Estado de suscripción:', isActiveSubscription);
        isActive.value = isActiveSubscription;
    } catch (error) {
        console.log(error);
    }
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

const calculatedImporte = computed(() => {
    return isActive.value ? 8 : 12;
});

onMounted(() => {
    if (localEmail.value) {
        getClients(localEmail.value);
    }
    getRents();
    getCourts();
    getSports();
});
</script>
