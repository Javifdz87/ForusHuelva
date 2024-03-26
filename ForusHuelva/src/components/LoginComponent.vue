<template>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Forus Huelva</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Servicios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Gimnasio</a></li>
                            <li><a class="dropdown-item" href="#">Pistas deportivas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
          </div>

    </nav>

    <div class="container py-5">
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
                <h2 class="display-4">Para disfrutar de todo el contenido de nuestro gimnasio deberás registrarte</h2>
            </div>
            <div class="accordion" id="accordionExample">
                
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Crear Cuenta
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Name</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">last Name</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Población</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Codigo postal</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Provincia</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Dirección</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Cuenta bancaria</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                             
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                           
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      ¿Ya tienes cuenta?
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <Toast />

                      <div class="row justify-content-center mt-5">
                        <div class="col-md-6">
                              <h2 class="card-title text-center">Iniciar sesión</h2>
                              <form @submit.prevent="login">
                                <div class="mb-3">
                                  <label for="email" class="form-label">Correo electrónico:</label>
                                  <input type="email" id="email" v-model="email" class="form-control" required />
                                  <!-- Aquí se mostrarán los errores si los hay -->
                                </div>
                                <div class="mb-3">
                                  <label for="password" class="form-label">Contraseña:</label>
                                  <input type="password" id="password" v-model="password" class="form-control" required />
                                  <!-- Aquí se mostrarán los errores si los hay -->
                                </div>
                                <div class="mb-3">
                                  <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                                </div>
                  
                              </form>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>


        <div class="row py-5">
            <div class="col-lg-12">
                <h2 class="display-4">Contamos con alquiler de equipamiento deportivo</h2>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card text-bg-dark">
                            <img src="./icons/misiones.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay">
                              <h5 class="card-title">Padel</h5>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-bg-dark">
                            <img src="./icons/misiones.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay">
                              <h5 class="card-title">Tenis</h5>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-bg-dark">
                            <img src="./icons/misiones.jpg" class="card-img" alt="...">
                            <div class="card-img-overlay">
                              <h5 class="card-title">Futbol Sala</h5>
                            </div>
                          </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card text-bg-dark">
                            <img src="./icons/misiones.jpg" class="card-img" alt="...">
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
                
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="card text-bg-dark">
                        <img src="./icons/misiones.jpg" class="card-img" alt="...">
                        <div class="card-img-overlay">
                          <h5 class="card-title">Boxeo</h5>
                        </div>
                      </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-bg-dark">
                        <img src="./icons/misiones.jpg" class="card-img" alt="...">
                        <div class="card-img-overlay">
                          <h5 class="card-title">Natación</h5>
                        </div>
                      </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-bg-dark">
                        <img src="./icons/misiones.jpg" class="card-img" alt="...">
                        <div class="card-img-overlay">
                          <h5 class="card-title">Clases Tenis</h5>
                        </div>
                      </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-bg-dark">
                        <img src="./icons/misiones.jpg" class="card-img" alt="...">
                        <div class="card-img-overlay">
                          <h5 class="card-title">Card title</h5>
                        </div>
                      </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="card text-bg-dark">
                        <img src="./icons/misiones.jpg" class="card-img" alt="...">
                        <div class="card-img-overlay">
                          <h5 class="card-title">Card title</h5>
                        </div>
                      </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-bg-dark">
                        <img src="./icons/misiones.jpg" class="card-img" alt="...">
                        <div class="card-img-overlay">
                          <h5 class="card-title">Card title</h5>
                        </div>
                      </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-bg-dark">
                        <img src="./icons/misiones.jpg" class="card-img" alt="...">
                        <div class="card-img-overlay">
                          <h5 class="card-title">Card title</h5>
                        </div>
                      </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-bg-dark">
                        <img src="./icons/misiones.jpg" class="card-img" alt="...">
                        <div class="card-img-overlay">
                          <h5 class="card-title">Card title</h5>
                        </div>
                      </div>
                </div>
                
            </div>
        </div>


        <div class="row py-5">
            <div class="col-lg-12">
                <h2 class="display-4">Nuestros planes de subscripción</h2>
                <p class="lead">Tenemos una variedad de planes para adaptarse a tus necesidades.</p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Subscripción 3 meses</h5>
                          <h6 class="card-subtitle mb-2 text-body-secondary">59,99€</h6>
                          <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
                          <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning">Pagar</button></a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Subscripción 6 meses</h5>
                          <h6 class="card-subtitle mb-2 text-body-secondary">105,99€</h6>
                          <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
                          <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning">Pagar</button>
                          </a>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">Subscripción 12 meses</h5>
                          <h6 class="card-subtitle mb-2 text-body-secondary">219,99€</h6>
                          <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
                          <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning">Pagar</button></a>
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
                        <li class="list-inline-item"><a href="#">Instagram</a></li>
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
</template>

<script setup>
import api from '@/services/service';
import { useRouter } from 'vue-router';
import { ref } from 'vue';
import { useToast } from 'primevue/usetoast'
import Toast from 'primevue/toast'

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
