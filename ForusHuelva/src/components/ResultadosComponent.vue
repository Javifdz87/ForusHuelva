<template>
  <div>
    <form @submit.prevent="addResult" class="text-center">
      <!-- Sección Deporte -->
      <div class="row">
        <div class="col-lg-12">
          <h2>Añadir Resultado</h2>
        </div>
      </div>
      <div id="team-rows">
        <div v-for="player in players" :key="player.id" class="row">
          <div class="col-lg-4">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" v-model="player.teamA" :placeholder="'Jugador ' + player.id + ' - Team A'" />
              <label :for="'player' + player.id">Jugador {{ player.id }} - Team A</label>
            </div>
          </div>
          <div class="col-lg-4 align-self-center">
            <label>vs</label>
          </div>
          <div class="col-lg-4">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" v-model="player.teamB" :placeholder="'Jugador ' + player.id + ' - Team B'" />
              <label :for="'player' + player.id">Jugador {{ player.id }} - Team B</label>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-12">
          <button type="button" class="btn btn-secondary" @click="addPlayer">Añadir jugador</button>
        </div>
      </div>
      <hr>
      <!-- Sección Resultado -->
      <div class="row justify-content-center">
        <div class="col-lg-3 align-self-center">
          <label for="resultadoA">Team A</label>
        </div>
        <div class="col-lg-3">
          <input type="text" class="form-control" v-model="resultadoA" placeholder="Resultado Team A" />
        </div>
        <div class="col-lg-3">
          <input type="text" class="form-control" v-model="resultadoB" placeholder="Resultado Team B" />
        </div>
        <div class="col-lg-3 align-self-center">
          <label for="resultadoB">Team B</label>
        </div>
      </div>
      <hr>
      <!-- Sección Descripción -->
      <div class="row justify-content-center mb-3">
        <div class="col-lg-12">
          <h2>Descripción</h2>
        </div>
        <div class="col-lg-12">
          <textarea class="form-control" v-model="description"></textarea>
        </div>
      </div>
      <!-- Botón para crear resultado -->
      <div class="row">
        <div class="col-lg-12 mb-3">
          <button type="submit" class="btn btn-primary btn-block w-100">Crear Resultado</button>
        </div>
      </div>
    </form>
  </div>
</template>

<script setup>
import api from '@/services/service';
import { ref, watch } from 'vue';
import { useToast } from 'primevue/usetoast';
import { defineProps } from 'vue';

// Estado inicial de los jugadores
const players = ref([{ id: 1, teamA: '', teamB: '' }, { id: 2, teamA: '', teamB: '' }]);
const resultadoA = ref('');
const resultadoB = ref('');
const description = ref('');

// Recibir la propiedad rentId del componente padre
const props = defineProps({
  rentId: String // Ajusta el tipo según sea necesario
});

// Almacenar el ID del alquiler en una referencia local
const localRentId = ref(props.rentId);

// Observar cambios en la propiedad rentId
watch(() => props.rentId, (newVal) => {
  localRentId.value = newVal;
});

const toast = useToast();

const showError = (message) => {
  toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
};

const showSuccess = (message) => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: message || 'Todo está en orden', life: 3000 });
};

const addPlayer = () => {
  const newPlayerId = players.value.length + 1;
  players.value.push({ id: newPlayerId, teamA: '', teamB: '' });
};

const addResult = async () => {
  const teamA = players.value.map(player => player.teamA).join(', ');
  const teamB = players.value.map(player => player.teamB).join(', ');
  const result = `${resultadoA.value} - ${resultadoB.value}`;

  const data = {
    team_a: teamA,
    team_b: teamB,
    result: result,
    description: description.value,
  };

  try {
    // Utilizar el ID del alquiler almacenado localmente
    const response = await api.put(`/rentfees/${localRentId.value}`, data);
    if (response.status === 200) {
      // Limpiar campos después de crear el resultado
      players.value = [{ id: 1, teamA: '', teamB: '' }, { id: 2, teamA: '', teamB: '' }];
      resultadoA.value = '';
      resultadoB.value = '';
      description.value = '';

      showSuccess('Resultado actualizado correctamente.');
      closeModalCreate();
    } else {
      showError('Error al actualizar el resultado.');
    }
  } catch (error) {
    console.error('Error al actualizar el resultado:', error);
    showError('Error al actualizar el resultado.');
  }
};

const closeModalCreate = async () => {
  const borrarClienteModal = document.getElementById('modalNewResult');
  const closeButton = borrarClienteModal.querySelector('[data-bs-dismiss="modal"]');
  closeButton.click();
};
</script>
