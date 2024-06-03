<template>
    <div class="container">
        <Toast />
        <div class="row justify-content-center m-3">
            <form @submit.prevent="createSub">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="email_sub" v-model="localEmail" placeholder="email" readonly />
                            <label for="cliente">Email</label>
                            <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nombre_sub" v-model="localName" placeholder="Nombre" readonly />
                            <label for="nombre">Nombre</label>
                            <div v-if="errors.name" class="text-danger">{{ errors.name }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <select v-model="observation" id="subscription" class="form-control" @change="updateImporte">
                                <option value="" disabled selected>Elige el tipo de suscripción</option>
                                <option value="3 meses">3 meses</option>
                                <option value="6 meses">6 meses</option>
                                <option value="12 meses">12 meses</option>
                            </select>
                            <label for="floatingInput">Estado</label>
                            <div v-if="errors.observation" class="text-danger">{{ errors.observation }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" v-model="importe" id="importe" readonly />
                            <label for="floatingInput">Importe</label>
                            <div v-if="errors.importe" class="text-danger">{{ errors.importe }}</div>
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
import { ref, defineProps, watch } from 'vue';
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

const emit = defineEmits(['subscriptionCreated']);


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
const date_end = ref('');

const errors = ref({
    email: '',
    name: '',
    observation: '',
    importe: ''
});

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

const validateForm = () => {
    let valid = true;
    errors.value = {
        email: '',
        name: '',
        observation: '',
        importe: ''
    };

    if (!localEmail.value) {
        errors.value.email = 'El campo Email no puede estar vacío.';
        valid = false;
    }
    if (!localName.value) {
        errors.value.name = 'El campo Nombre no puede estar vacío.';
        valid = false;
    }
    if (!observation.value) {
        errors.value.observation = 'El campo Estado no puede estar vacío.';
        valid = false;
    }
    if (!importe.value) {
        errors.value.importe = 'El campo Importe no puede estar vacío.';
        valid = false;
    }

    return valid;
};

const createSub = async () => {
    if (!validateForm()) {
        showError('Por favor, corrige los errores del formulario.');
        return;
    }

    try {
        const currentDate = new Date().toISOString().split('T')[0];
        const status = "activa";

        const suscripcionExistente = await verifySub(localId.value);

        if (suscripcionExistente && suscripcionExistente.status === 'activa') {
            showError('El cliente ya tiene una suscripción activa.');
            return;
        } else if (suscripcionExistente && suscripcionExistente.status === 'cancelada' && suscripcionExistente.date_end >= currentDate) {
            showError('El cliente tiene una suscripción cancelada que aún no ha expirado.');
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

        if (suscripcionExistente && suscripcionExistente.status === 'cancelada' && suscripcionExistente.date_end < currentDate) {
            // Si la suscripción existente está cancelada y ha expirado, actualiza la suscripción existente
            await api.put(`/subfees/${localId.value}`, subscriptionData);
            showSuccess('Suscripción actualizada exitosamente.');
        } else {
            // Si no existe ninguna suscripción activa, crea una nueva
            await api.post('/subfees', subscriptionData);
            showSuccess('Suscripción creada exitosamente.');
        }
        emit('subscriptionCreated'); // Emitir evento cuando la suscripción se cree


        closeModalCreate();
        importe.value = '';
        observation.value = '';
        date_end.value = '';
    } catch (error) {
        showError('Error al crear o actualizar la suscripción.');
        console.error('Error al crear o actualizar la suscripción:', error);
    }
};

const verifySub = async (client_id) => {
    try {
        const response = await api.get(`/subfees?client_id=${client_id}`);
        return response.data.find(sub => sub.client_id === client_id);
    } catch (error) {
        console.error('Error al verificar suscripción existente:', error);
        return null;
    }
};

const closeModalCreate = () => {
    const createSubModal = document.getElementById('modalSub');
    const closeButton = createSubModal.querySelector('[data-bs-dismiss="modal"]');
    closeButton.click();
};
</script>