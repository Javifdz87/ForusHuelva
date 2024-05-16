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
          <p class="lead">Tenemos una variedad de planes para adaptarse a tus necesidades.</p>
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
                <img src="/images/padel.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Padel</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3" data-bs-toggle="modal" data-bs-target="#modalRent">
              <div class="card text-bg-dark">
                <img src="/images/tenis.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Tenis</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3" data-bs-toggle="modal" data-bs-target="#modalRent">
              <div class="card text-bg-dark">
                <img src="/images/sala.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Futbol Sala</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3" data-bs-toggle="modal" data-bs-target="#modalRent">
              <div class="card text-bg-dark">
                <img src="/images/siete.jpg" class="card-img" alt="...">
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
      <div class="modal-dialog modal-lg"> <!-- Ajusta la clase modal-dialog -->
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalRent">Nuevo Alquiler</h5>
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
                        <input type="input" class="form-control" id="email" v-model="email" placeholder="name@example.com"
                          readonly />
                        <label for="cliente">Email</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="nombre" v-model="nombre" placeholder="name@example.com"
                          readonly />
                        <label for="nombre">Nombre</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <select v-model="status" class="form-control" placeholder="name@example.com" required>
                          <option value="" disabled selected>Elige el deporte</option>
                          <option value="cobrada">Padel</option>
                          <option value="a cuenta">Futbol Sala</option>
                          <option value="liquidada">Futbol Sala 7</option>
                          <option value="anulada">Tenis</option>
                        </select>
                        <label for="floatingInput">Deporte</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="fechaInicio" placeholder="name@example.com"
                           required />
                        <label for="fechaInicio">Elije el dia de juego</label>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <select v-model="status" class="form-control" placeholder="name@example.com" required>
                          <option value="" disabled selected>Elige la Hora</option>
                          <option value="10:00">10:00</option>
                          <option value="11:00">11:00</option>
                          <option value="12:00">12:00</option>
                          <option value="13:00">13:00</option>
                          <option value="14:00">14:00</option>
                          <option value="15:00">15:00</option>
                          <option value="16:00">16:00</option>
                          <option value="17:00">17:00</option>
                          <option value="18:00">18:00</option>
                          <option value="19:00">19:00</option>
                          <option value="20:00">20:00</option>
                          <option value="21:00">21:00</option>
                          <option value="22:00">22:00</option>
                        </select>
                        <label for="floatingInput">Hora</label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" placeholder="name@example.com" v-model="importe"
                          readonly />
                        <label for="floatingInput">Importe</label>
                      </div>
                    </div>
                  </div>                  

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-floating mb-3">
                        <select v-model="status" class="form-control" placeholder="name@example.com" required>
                          <option value="" disabled selected>Elige pista</option>
                          
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
      client_id: email.value // Asignar el ID del cliente
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
  