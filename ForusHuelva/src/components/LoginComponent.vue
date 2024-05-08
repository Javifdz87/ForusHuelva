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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
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
            <a class="nav-link" href="#">Cuenta</a>
          </li>
          <li class="nav-item">
            <router-link to="/PanelClient" class="nav-link">Usuario</router-link>
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
        <h2 class="display-4">Contamos con alquiler de equipamiento deportivo</h2>
        <div class="row">
          <div class="col-lg-3">
            <div class="card text-bg-dark" data-bs-toggle="modal" data-bs-target="#modalLogin">
              <img src="/img/padel.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Padel</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card text-bg-dark" data-bs-toggle="modal" data-bs-target="#modalLogin">
              <img src="/img/tenis.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Tenis</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card text-bg-dark" data-bs-toggle="modal" data-bs-target="#modalLogin">
              <img src="/img/sala.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Futbol Sala</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="card text-bg-dark" data-bs-toggle="modal" data-bs-target="#modalLogin">
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
              <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalLogin">Pagar</button></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Subscripción 6 meses</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary">105,99€</h6>
              <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
              <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalLogin">Pagar</button>
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
              <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalLogin">Pagar</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row py-5">
      <div class="col-lg-12">
        <hr>
      </div>
      <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                  <h2 class="card-title text-center mb-3">Iniciar sesión</h2>
                  <form @submit.prevent="login">
                    <div class="mb-3">
                      <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com"
                          v-model="email"/>
                        <label for="floatingInput">Email</label>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" placeholder="name@example.com"
                          v-model="password"/>
                        <label for="floatingInput">Contraseña</label>
                      </div>

                    </div>
                    <div class="mb-3">

                      <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
          <router-link to="/newclient" class="d-block mt-3 text-center">¿Aún no tienes cuenta?</router-link>
          <p class="text-muted">Credenciales de prueba:<br> Email: admin@gmail.com <br> Contraseña: admin</p>

                    </div>

                  </form>

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

  <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title" id="exampleModalLabel">Inicio de sesion necesario</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Necesitas Iniciar Sesión para poder usar esta opción.</p>
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

const toast = useToast()
const email = ref('');
const password = ref('');
const router = useRouter();

const showError = () => {
  toast.add({
    severity: 'error',
    summary: 'Error',
    detail: 'No coinciden los datos',
    life: 3000
  })
}

async function login() {
  try {
    console.log('Datos de inicio de sesión:', { email: email.value, password: password.value });

    const response = await api.post('/login', {
      email: email.value,
      password: password.value
    });

    console.log('Respuesta del servidor:', response);

    if (response.status === 200) {
      console.log('Inicio de sesión exitoso');
      if (router) {
        router.push('/home');
      }
    }
  } catch (error) {
    console.error('Error al iniciar sesión:', error);
    showError();
  }
}
</script>
