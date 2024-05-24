<template>
    <div class="container">
        <Toast />

        <div class="row justify-content-center m-3">
            <form @submit.prevent="crearSub">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="email" v-model="localEmail" placeholder="email"
                                readonly />
                            <label for="cliente">Email</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nombre" v-model="localName" placeholder="Nombre"
                                readonly />
                            <label for="nombre">Nombre</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <select v-model="observation" id="subscription" class="form-control"
                                required @change="updateImporte">
                                <option value="" disabled selected>Elige el tipo de suscripción</option>
                                <option value="3 meses">3 meses</option>
                                <option value="6 meses">6 meses</option>
                                <option value="12 meses">12 meses</option>
                            </select>
                            <label for="floatingInput">Estado</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" v-model="importe"
                                id="importe" required readonly />
                            <label for="floatingInput">Importe</label>
                        </div>
                    </div>
                </div>
                <input type="hidden" v-model="date_end" />

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                        <button type="submit" class="btn btn-primary btn-block w-100">Crear Suscripción</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref, defineProps, watch, onMounted } from 'vue';
import { useToast } from "primevue/usetoast";
import Toast from 'primevue/toast';
import api from '@/services/service';

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
const importe = ref('');
const observation = ref('');
const date_end = ref(''); // Variable para la fecha de caducidad

const updateImporte = () => {
    const subscription = observation.value;

    switch (subscription) {
        case "3 meses":
            importe.value = 59.99; // Valor para 3 meses
            calculateExpiryDate(3);
            break;
        case "6 meses":
            importe.value = 105.99; // Valor para 6 meses
            calculateExpiryDate(6);
            break;
        case "12 meses":
            importe.value = 219.99; // Valor para 12 meses
            calculateExpiryDate(12);
            break;
        default:
            importe.value = ""; // Valor predeterminado si no se selecciona nada
    }
};

const calculateExpiryDate = (months) => {
    const currentDate = new Date();
    currentDate.setMonth(currentDate.getMonth() + months);
    date_end.value = currentDate.toISOString().split('T')[0];
};

const showError = (message) => {
    toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
};

const showSuccess = (message) => {
    toast.add({ severity: 'success', summary: 'Correcto', detail: message || 'Todo está en orden', life: 3000 });
};

const verificarSuscripcionActiva = async (client_id) => {
    try {
        const response = await api.get(`/subfees?status=activo`);
        const suscripcionesActivasCliente = response.data.filter(sub => sub.client_id === client_id);
        return suscripcionesActivasCliente.length > 0;
    } catch (error) {
        console.error('Error al verificar suscripción activa:', error);
        return false;
    }
};

const crearSub = async () => {
    try {
        const currentDate = new Date().toISOString().split('T')[0];
        const status = "activo";

        const tieneSuscripcionActiva = await verificarSuscripcionActiva(localId.value);
        if (tieneSuscripcionActiva) {
            showError('El cliente ya tiene una suscripción activa.');
            return;
        }

        const subscriptionData = {
            importe: importe.value,
            date_pay: currentDate,
            date_end: date_end.value,
            observation: observation.value,
            client_id: localId.value,
            status: status
        };

        // Logging the data before sending it to the API
        console.log('Data to be inserted:', subscriptionData);

        await api.post('/subfees', subscriptionData);

        cerrarModalCrear();
        showSuccess('Suscripción creada exitosamente.');
        importe.value = '';
        observation.value = '';
        date_end.value = '';
    } catch (error) {
        showError('Error al crear la suscripción.');
        console.error('Error al crear la suscripción:', error);
    }
};

const cerrarModalCrear = () => {
    const crearSubModal = document.getElementById('dardealta');
    const closeButton = crearSubModal.querySelector('[data-bs-dismiss="modal"]');
    closeButton.click();
};
</script>
