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
            <a class="nav-link active" aria-current="page" href="/">Home</a>
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
          
        </ul>
      </div>
    </div>

  </nav>

  <div class="container py-5 mt-5" id="nosotros">
    <Toast />
    <div class="row mt-5">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white p-3 rounded-4">
        <h1 class="display-1">Forus Huelva</h1>
        <h2 class="display-4">¿Quiénes somos?</h2>

        <p class="lead">Bienvenido al gimnasio más grande de toda la provincia, con pistas y una amplia sala
          de entrenamiento. <br> Primero tendras que iniciar sesión para empezar a usar nuestra aplicación, tenemos una forma muy facil de crear un nuevo usuario.</p>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <hr>
      </div>
      <div class="row justify-content-center mt-5">
                <div class="col-md-6 bg-white p-3 rounded-4">
                  <h2 class="card-title text-center mb-3">Iniciar sesión</h2>
                  <form @submit.prevent="login">
                    <div class="mt-3">
                      <div class="form-floating mb-4">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com"
                          v-model="email"/>
                        <label for="floatingInput">Email</label>
                        <div v-if="errors.email" class="text-danger">{{ errors.email }}</div>

                      </div>
                    </div>
                    <div class="mb-4">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" placeholder="name@example.com"
                          v-model="password"/>
                        <label for="floatingInput">Contraseña</label>
                        <div v-if="errors.password" class="text-danger">{{ errors.password }}</div>

                      </div>

                    </div>
                    <div class="mb-3">

                      <button type="submit" class="btn btn-primary  btn-block w-100">Iniciar sesión</button>
                      <router-link to="/newclient" class="d-block mt-3 text-center">¿Aún no tienes cuenta?</router-link>

                    </div>

                  </form>

                </div>
              </div>
    </div>
    <hr class="mt-5">

    <div class="row mt-5" id="pistas">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white p-3 rounded-4" >
        <h2 class="display-4">Contamos con alquiler de equipamiento deportivo</h2>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="card text-bg-dark" data-bs-toggle="modal" data-bs-target="#modalLogin">
              <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/padel.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Padel</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="card text-bg-dark" data-bs-toggle="modal" data-bs-target="#modalLogin">
              <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/tenis.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Tenis</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="card text-bg-dark" data-bs-toggle="modal" data-bs-target="#modalLogin">
              <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/sala.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Futbol Sala</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="card text-bg-dark" data-bs-toggle="modal" data-bs-target="#modalLogin">
              <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/siete.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Futbol 7</h5>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="row mt-5" id="gimnasio">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white p-3 rounded-4">
        <h2 class="display-4">Más actividades dentro del recinto</h2>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
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
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/padel.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/sala.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/tenis.jpg" class="d-block w-100" alt="...">
    </div>
              </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        </div>
        </div>
        
        
        
      </div>


    </div>


    <div class="row mt-5" id="planes">
      <div class="bg-white p-3 rounded-4">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h2 class="display-4">Nuestros planes de subscripción</h2>
        <p class="lead">Tenemos una variedad de planes para adaptarse a tus necesidades.</p>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 d-flex justify-content-center">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Subscripción 3 meses</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary">59,99€</h6>
              <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
              <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalLogin">Pagar</button></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 d-flex justify-content-center">
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
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 d-flex justify-content-center">
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

    </div>

    <div class="row mt-5" id="lugar">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white p-3 rounded-4">
        <h2 class="display-5">Donde nos encontramos.</h2>
        <div class="row">
          <div class="mt-3 col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="row">
              <div class="col-lg-6">
                <h2 class="display-6">Dirección</h2>
                <p class="">Avda. de Honduras, s/n 21007 Huelva</p>

              </div>
              <div class="col-lg-6">
                <h2 class="display-6">Horario</h2>
                <p class="">Lunes a Viernes: 7:00 a 23:00 <br> Sábados, domingos y festivos: 9:00 a 21:00</p>

              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <h2 class="display-6">Teléfono</h2>
                <p class="">959270115</p>

              </div>
              <div class="col-lg-6">
                <h2 class="display-6">Email</h2>
                <p class="">infohuelva@forus.es</p>

              </div>
            </div>
            


        </div>
        <div class="d-flex justify-content-center mt-3 col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6350.340466500009!2d-6.929387224559852!3d37.26739014122577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd11cffddb41cb6d%3A0xc873cb6b6671193d!2sForus%20Huelva%20(C.D.%20El%20Saladillo)!5e0!3m2!1ses!2ses!4v1716971215139!5m2!1ses!2ses"
            width="800" height="450" style="border:1;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        </div>
        
      </div>
    </div>
    
  </div>
  

  
  <footer class="bg-dark text-white py-4 text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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

const showError = (message) => {
    toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
};

const showSuccess = (message) => {
    toast.add({ severity: 'success', summary: 'Correcto', detail: message || 'Todo está en orden', life: 3000 });
};

async function login() {
  if (!validateForm()) {
    showError('Por favor, corrige los errores del formulario.')
    return
  }
  try {
    // Hacemos una solicitud de inicio de sesión a la API
    const response = await api.post('/login', {
      email: email.value, // Obtenemos el valor del campo de correo electrónico
      password: password.value // Obtenemos el valor del campo de contraseña
    });

    // Si la respuesta es exitosa (status 200)
    if (response.status === 200) {
      // Mostramos un mensaje de éxito
      showSuccess('Inicio de sesión exitoso');

      // Si el usuario tiene un rol de 1 ( 1 es el rol de administrador)
      if (response.data.user.role === 1) {
        // Redirigimos a la página de inicio del administrador
        router.push('/home');
      } else {
        // Redirigimos a la página del panel del cliente y pasamos el correo electrónico como parámetro
        router.push({ name: 'panelClient', params: { email: email.value } });
      }
    }
  } catch (error) {
    // Si ocurre un error al iniciar sesión, lo mostramos en la consola
    console.error('Error al iniciar sesión:', error);
    // Mostramos un mensaje de error al usuario
    showError('El email o la contraseña no son correctas.');
  }
}


// Objeto reactivo para almacenar los mensajes de error de validación
const errors = ref({
  name: '',
  last_Name: '',
  dni: '',
  email: '',
  phone: '',
  town: '',
  postal_code: '',
  province: '',
  bank_account: '',
  address: '',
  password: ''
})

// Función para validar el formulario
const validateForm = () => {
  // Variable para determinar si el formulario es válido
  let valid = true

  // Reiniciar los mensajes de error
  errors.value = {
    email: '',
    password: ''
  }


  if (!email.value) {
    errors.value.email = 'El campo de correo electrónico no puede estar vacío.'
    valid = false
  } else if (!/\S+@\S+\.\S+/.test(email.value)) {
    errors.value.email = 'El correo electrónico debe ser una dirección de correo válida.'
    valid = false
  }


  if (!password.value) {
    errors.value.password = 'El campo Contraseña no puede estar vacío.'
    valid = false
  }

  // Devolver si el formulario es válido o no
  return valid
}

</script>
