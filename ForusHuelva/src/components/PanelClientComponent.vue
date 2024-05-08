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
              <a class="nav-link" href="#">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Planes</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Servicios
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Gimnasio</a></li>
                <li><a class="dropdown-item" href="#">Pistas deportivas</a></li>
              </ul>
            </li>
            <li class="nav-item">
  
          <a class="nav-link" href="#">Usuario</a>
          </li>
            <li class="nav-item">
              <router-link to="/" class="nav-link text-danger">Cerrar Sesión</router-link>
            </li>
            
          </ul>
        </div>
      </div>
  
    </nav>
  
    <div class="container py-5 mt-5">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="display-1">Forus Huelva</h1>
          <h2 class="display-4">¿Quiénes somos?</h2>
  
          <p class="lead">Bienvenido al gimnasio más grande de toda la provincia, con pistas y una amplia sala
            de entrenamiento.</p>
        </div>
      </div>
  
  
      <div class="row py-5">
        <div class="col-lg-12">
          <h2 class="display-4">Elija que pistas quiere alquilar.</h2>
          <div class="row">
            <div class="col-lg-3">
              <div class="card text-bg-dark">
                <img src="/img/padel.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Padel</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card text-bg-dark">
                <img src="/img/tenis.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Tenis</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card text-bg-dark">
                <img src="/img/sala.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Futbol Sala</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card text-bg-dark">
                <img src="/img/siete.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Futbol 7</h5>
                </div>
              </div>
            </div>
  
          </div>
        </div>
      </div>
  
      <div class="row py-5">
        <div class="col-lg-12">
          <h2 class="display-4">Más actividades dentro del recinto</h2>
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
  
  
      <div class="row py-5">
        <div class="col-lg-12">
          <h2 class="display-4">Nuestros planes de subscripción</h2>
          <p class="lead">Tenemos una variedad de planes para adaptarse a tus necesidades.</p>
        </div>
        <div class="row">
          <div class="col-lg-4 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Subscripción 3 meses</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">59,99€</h6>
                <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
                <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" id="precio1">Pagar</button></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Subscripción 6 meses</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">105,99€</h6>
                <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
                <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Pagar</button>
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
                <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Pagar</button></a>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Revisa tus datos y verifica la compra</h5>
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
                        <input type="input" class="form-control" id="email" v-model="email" placeholder="email"
                          required />
                        <label for="cliente">Email</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="nombre" v-model="name" placeholder="Nombre"
                          required />
                        <label for="nombre">Nombre</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <select v-model="observation" id="subscription" class="form-control"
                          placeholder="name@example.com" required @change="updateImporte">
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
                        <input type="number" class="form-control" placeholder="name@example.com" v-model="importe"
                          id="importe" required readonly />
                        <label for="floatingInput">Importe</label>
                      </div>
                    </div>
                  </div>

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
        <button type="button" class="btn btn-warning">Pagar</button>
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
  import NewClientComponent from '../components/NewClientComponent.vue';
  
  const observation = ref('')
  const importe = ref('')
  const name = ref('')
  const email = ref('')


  const toast = useToast()

  const updateImporte = () => {
  var subscription = observation.value;

  switch (subscription) {
    case "3 meses":
      importe.value = 59.99; // Valor para 3 meses
      break;
    case "6 meses":
      importe.value = 105.99; // Valor para 6 meses
      break;
    case "12 meses":
      importe.value = 219.99; // Valor para 12 meses
      break;
    default:
      importe.value = ""; // Valor predeterminado si no se selecciona nada
  }
}
const showError = () => {
  toast.add({ severity: 'error', summary: 'Error', detail: 'Algo no ha salido como se esperaba', life: 3000 });
};
const showSuccess = () => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: 'Todo esta en orden', life: 3000 });
};

const crearSub = async () => {
  try {
    const currentDate = new Date().toISOString().split('T')[0];

    await api.post('/subfees', {
      importe: importe.value,
      date_pay: currentDate, // Establecer la fecha actual
      observation: observation.value,
      email: email.value // Asignar el ID del cliente
    });

    cerrarModalCrear();
    showSuccess();
    importe.value = ''; // Vaciar el campo de importe
    name.value = ''; // Reiniciar el estado
    observation.value = ''; // Vaciar el campo de observaciones
    email.value = ''; // Reiniciar el cliente seleccionado
    obtenerSubs();
  } catch (error) {
    showError();
    console.error(error);
  }
};


  </script>
  