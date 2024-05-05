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
                <img src="./icons/padel.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Padel</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card text-bg-dark">
                <img src="./icons/tenis.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Tenis</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card text-bg-dark">
                <img src="./icons/sala.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Futbol Sala</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card text-bg-dark">
                <img src="./icons/siete.jpg" class="card-img" alt="...">
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
            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="id" placeholder="name@example.com" readonly />
                  <label for="floatingInput">Id Cliente</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                    <select id="" class="form-select" required>
                      <option value="" disabled selected>Selecciona tu precio</option>
                      <option value="59,99">59,99€</option>
                      <option value="105.99">105,99€</option>
                      <option value="219.99">219,99€</option>

                    </select>
                    <label for="province">Provincias</label>
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="name" placeholder="name@example.com" readonly />
                  <label for="floatingInput">Nombre</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="last_Name" placeholder="name@example.com" readonly />
                  <label for="floatingInput">Apellido</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="email" placeholder="name@example.com" readonly />
                  <label for="floatingInput">Email</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="phone" placeholder="name@example.com" readonly />
                  <label for="floatingInput">Telefóno</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="town" placeholder="name@example.com"/>
                  <label for="floatingInput">Localidad</label>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="postal_code" placeholder="name@example.com"/>
                  <label for="floatingInput">Codigo Postal</label>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="province" placeholder="name@example.com" />
                  <label for="floatingInput">Provincia</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="address" placeholder="name@example.com" />
                  <label for="floatingInput">Dirección</label>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="bank_account" placeholder="name@example.com"/>
                  <label for="floatingInput">Cuenta Bancaria</label>
                </div>
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
  
  const toast = useToast()

  </script>
  