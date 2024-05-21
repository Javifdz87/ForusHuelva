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
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#nosotros">Rutinas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#nosotros">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#planes">Planes</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Servicios
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#gimnasio">Gimnasio</a></li>
                <li><a class="dropdown-item" href="#pistas">Pistas deportivas</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ajustes
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Ver Perfil</a></li>
                <li><a class="dropdown-item" href="#">Cambiar Pago</a></li>
                <li><a class="dropdown-item" href="#">Cambiar Contraseña</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <router-link to="/" class="nav-link text-danger">Cerrar Sesión</router-link>
            </li>
            
          </ul>
        </div>
      </div>
  
    </nav>
  
    <div class="container py-5 mt-5" id="nosotros">
      <div class="row">
        <div class="col-lg-12" >
          <h1 class="display-1">Bienvenido Usuario</h1>
        </div>
      </div>

      <div class="row py-5" id="planes">
        <div class="col-lg-12">
          <h2 class="display-5">Nuestros planes de suscripción</h2>
          <p class="lead">Si aún no tienes un plan de suscripción es tan facil como pulsar un botón.</p>
        </div>
        <div class="row">
          <div class="col-lg-4 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Subscripción 3 meses</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">59,99€</h6>
                <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
                <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalSub" id="precio1">Pagar</button></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Subscripción 6 meses</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">105,99€</h6>
                <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
                <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalSub">Pagar</button>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Subscripción 12 meses</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">219,99€</h6>
                <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
                <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalSub">Pagar</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
  
  
      <div class="row py-5" id="gimnasio">
        <div class="col-lg-12">
          <h2 class="display-5">Más actividades dentro del recinto con nuestra suscripción.</h2>
          <ul class="list-group">
            <li class="list-group-item">Boxeo</li>
            <li class="list-group-item">Natación</li>
            <li class="list-group-item">Sala de entrenamiento</li>
            <li class="list-group-item">Aquafitness</li>
            <li class="list-group-item">Yoga</li>
            <li class="list-group-item">Ciclo Indoor</li>
            <li class="list-group-item">Pilates</li>
            <li class="list-group-item">Body Pump</li>
          </ul>
        </div>
  
      </div>
  
      <div class="row py-5" id="pistas">
        <div class="col-lg-12">
          <h4 class="display-5">Puede alquilar nuestras pistas facilmente pulsando abajo.</h4>
          <div class="row">
            <div class="col-lg-3" data-bs-toggle="modal" data-bs-target="#modalRent">
              <div class="card text-bg-dark">
                <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/padel.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Padel</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3" data-bs-toggle="modal" data-bs-target="#modalRent">
              <div class="card text-bg-dark">
                <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/tenis.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Tenis</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3" data-bs-toggle="modal" data-bs-target="#modalRent">
              <div class="card text-bg-dark">
                <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/sala.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Futbol Sala</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3" data-bs-toggle="modal" data-bs-target="#modalRent">
              <div class="card text-bg-dark">
                <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/siete.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Futbol 7</h5>
                </div>
              </div>
            </div>
  
          </div>
        </div>
      </div>
    </div>
  
    <footer class="bg-dark text-white py-4 text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p>Síguenos en redes sociales:</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a href="#">Facebook</a></li>
              <li class="list-inline-item"><a href="#">Twitter</a></li>
              <li class="list-inline-item"><a href="https://www.instagram.com/forus_es/?hl=es">Instagram</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <p>&copy; 2024 Forus Huelva. Todos los derechos reservados.</p>
          </div>
        </div>
      </div>
    </footer>

        <!-- Modales -->
        <div class="modal fade" id="modalRent" tabindex="-1" aria-labelledby="modalRent" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Alquiler</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <Toast />
          <div class="row justify-content-center m-3">
            <form @submit.prevent="crearAlquiler">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="email_sub" v-model="email" placeholder="email" required />
                    <label for="cliente">Email</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre_sub" v-model="nombre" placeholder="Nombre" required />
                    <label for="nombre">Nombre</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <select id="sport" v-model="DeporteSeleccionado" @change="actualizarHorasYPistas" class="form-select">
                      <option value="" disabled selected>Selecciona un deporte</option>
                      <option v-for="sport in sports" :key="sport.id" :value="sport.id">
                        {{ sport.sport }}
                      </option>
                    </select>
                    <label for="floatingInput">Deporte</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="fechaInicio" v-model="date_day" placeholder="Elije el dia de juego" required />
                    <label for="fechaInicio">Elije el día de juego</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <select id="time" v-model="timeSeleccionado" class="form-select">
                      <option value="" disabled selected>Selecciona una hora</option>
                      <option v-for="time in filteredTimes" :key="time.id" :value="time.date_time">
                        {{ time.date_time }}
                      </option>
                    </select>
                    <label for="floatingInput">Hora</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" placeholder="Importe" v-model="importe_rent" value="12" readonly />
                    <label for="floatingInput">Importe</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-floating mb-3">
                    <select id="pista" v-model="pistaSeleccionada" class="form-select">
                      <option value="" disabled selected>Selecciona una pista</option>
                      <option v-for="pista in filteredPistas" :key="pista.id" :value="pista.id">
                        {{ pista.name }}
                      </option>
                    </select>
                    <label for="floatingInput">Pista</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 mb-3">
                  <button type="submit" class="btn btn-primary btn-block w-100">Crear Póliza</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <div class="modal fade" id="modalSub" tabindex="-1" aria-labelledby="modalSub" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSub">Revisa tus datos y verifica la compra</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <Toast />
          <div class="row justify-content-center m-3">
            <form @submit.prevent="crearSub">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" v-model="email" placeholder="email" required />
                    <label for="cliente">Email</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nombre" v-model="name" placeholder="Nombre" required />
                    <label for="nombre">Nombre</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <select v-model="observation" id="subscription" class="form-control" required @change="updateImporte">
                      <option value="" disabled selected>Elige el tipo de suscripción</option>
                      <option value="3 meses">3 meses</option>
                      <option value="6 meses">6 meses</option>
                      <option value="12 meses">12 meses</option>
                    </select>
                    <label for="floatingInput">Estado</label>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" v-model="importe" id="importe" required readonly />
                    <label for="floatingInput">Importe</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" v-model="bank_account" placeholder="Cuenta Bancaria" readonly />
                    <label for="floatingInput">Cuenta Bancaria</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" v-model="password" id="password" required />
                    <label for="floatingInput">Password</label>
                  </div>
                </div>
              </div>
              <input type="hidden" v-model="date_end" />
              <div class="row">
                <div class="col-lg-12 mb-3">
                  <button type="submit" class="btn btn-primary btn-block w-100">Crear Suscripción</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-warning">Pagar</button>
      </div>
    </div>
  </div>
</div>
  </template>
  
<script setup>
  import api from '@/services/service';
  import { useRouter } from 'vue-router';
  import { ref, onMounted } from 'vue';

  import { useToast } from 'primevue/usetoast'
  import Toast from 'primevue/toast'
  
  const observation = ref('');
  const importe = ref('');
  const name = ref('');
  const email = ref('');
  const password = ref('');
  const bank_account = ref('');
  const date_end = ref(''); // Variable para la fecha de caducidad
  const importe_rent = ref('');

  const date_day = ref('');
const date_time = ref('');
const clientes = ref([]);
const pistas = ref([]);
const times = ref([]);
const sports = ref([]);
const DeporteSeleccionado = ref('');
const nombre = ref('');
const filteredPistas = ref([]);
const filteredTimes = ref([]);
const timeSeleccionado = ref('');
const pistaSeleccionada = ref('');
  
  const toast = useToast();
  
  const updateImporte = () => {
    var subscription = observation.value;
  
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
  
  const showError = () => {
    toast.add({ severity: 'error', summary: 'Error', detail: 'Algo no ha salido como se esperaba', life: 3000 });
  };
  
  const showSuccess = () => {
    toast.add({ severity: 'success', summary: 'Correcto', detail: 'Todo esta en orden', life: 3000 });
  };
  
  const calculateExpiryDate = (months) => {
    const currentDate = new Date();
    currentDate.setMonth(currentDate.getMonth() + months);
    date_end.value = currentDate.toISOString().split('T')[0];
  };
  
  const verifyClient = async (email, password) => {
    try {
      const response = await api.post('/client', { email, password });
      if (response.data.success) {
        return response.data.clientId;
      } else {
        showError();
        return null;
      }
    } catch (error) {
      showError();
      console.error(error);
      return null;
    }
  };
  
  const crearSub = async () => {
    try {
      const clientId = await verifyClient(email.value, password.value);
      if (!clientId) return;
  
      const currentDate = new Date().toISOString().split('T')[0];
      const status = "activo";
  
      await api.post('/subfees', {
        importe: 1,
        date_pay: currentDate, // Establecer la fecha actual
        date_end: date_end.value, // Establecer la fecha de caducidad calculada
        observation: observation.value,
        client_id: clientId, // Asignar el ID del cliente
        status: status // Establecer el estado como "activo"
      });
  
      cerrarModalCrear();
      showSuccess();
      importe.value = ''; // Vaciar el campo de importe
      name.value = ''; // Reiniciar el estado
      observation.value = ''; // Vaciar el campo de observaciones
      clienteSeleccionado.value = ''; // Reiniciar el cliente seleccionado
      date_end.value = ''; // Reiniciar la fecha de caducidad
    } catch (error) {
      showError();
      console.error(error);
    }
  };

  const crearAlquiler = async () => {
  try {
    const currentDate = new Date().toISOString().split('T')[0];

    await api.post('/rentfees', {
      importe: 12,
      date_pay: currentDate,
      date_day: date_day.value,
      date_time: timeSeleccionado.value,
      client_id: 1,
      court_id: pistaSeleccionada.value
    });

    cerrarModalCrear();
    showSuccess();
    date_day.value = '';
    date_time.value = '';
    clienteSeleccionado.value = '';
    nombre.value = '';
    DeporteSeleccionado.value = '';
    timeSeleccionado.value = '';
    pistaSeleccionada.value = '';

    obtenerRents();
  } catch (error) {
    showError();
    console.error(error);
  }
};

const obtenerPistas = async () => {
  try {
    const respuesta = await api.get('/courts')
    pistas.value = respuesta.data
  } catch (error) {
    console.log(error)
  }
}

const obtenerHoras = async () => {
  try {
    const respuesta = await api.get('/times')
    times.value = respuesta.data
  } catch (error) {
    console.log(error)
  }
}

const obtenerDeportes = async () => {
  try {
    const respuesta = await api.get('/sports')
    sports.value = respuesta.data
  } catch (error) {
    console.log(error)
  }
}

const actualizarHorasYPistas = () => {
  filteredPistas.value = pistas.value.filter(pista => pista.sport_id === DeporteSeleccionado.value);
  filteredTimes.value = times.value.filter(time => time.sport_id === DeporteSeleccionado.value);
};

const cerrarModalCrear = async () => {
  const crearAlquilerModal = document.getElementById('dardealta')
  const closeButton = crearAlquilerModal.querySelector('[data-bs-dismiss="modal"]')
  closeButton.click()
}


onMounted(() => {
  obtenerPistas();
  obtenerHoras();
  obtenerDeportes();
});
  </script>