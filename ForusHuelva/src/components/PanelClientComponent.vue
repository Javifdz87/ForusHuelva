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
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modalQR">Codigo QR</a>
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
              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalAccount">Ver Perfil</a></li>
              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalMyRent  ">Tus Alquileres</a></li>
              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalBank">Cambiar Pago</a></li>
              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalPassword">Cambiar Contraseña</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <router-link to="/" class="nav-link text-danger">Cerrar Sesión</router-link>
          </li>

        </ul>
      </div>
    </div>

  </nav>

  <div class="container py-5 mt-5 " id="nosotros">
    <Toast />

    <div class="bg-white p-3 rounded-4" id="box">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h1 class="display-1">Bienvenido: {{ clientes.name }}</h1>
        </div>
      </div>

      <div class="row mt-5" id="planes" v-if="!isActive">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h2 class="display-5">Nuestros planes de suscripción</h2>
          <p class="lead">Si aún no tienes un plan de suscripción es tan fácil como pulsar un botón.</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Subscripción 3 meses</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">59,99€</h6>
                <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
                <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning"
                    data-bs-toggle="modal" data-bs-target="#modalSub" id="precio1">Pagar</button></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Subscripción 6 meses</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">105,99€</h6>
                <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
                <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning"
                    data-bs-toggle="modal" data-bs-target="#modalSub">Pagar</button></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Subscripción 12 meses</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">219,99€</h6>
                <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
                <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning"
                    data-bs-toggle="modal" data-bs-target="#modalSub">Pagar</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div v-else>
        <h2 class="display-5">¡Ya eres socio!</h2>
        <p class="lead">Gracias por ser parte de nuestra comunidad.</p>
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
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>



      </div>


    </div>

    <div class="row mt-5" id="pistas">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white p-3 rounded-4">
        <h4 class="display-5">Puede alquilar nuestras pistas facilmente pulsando abajo.</h4>
        <p class="lead">Si eres socio se le aplicará un descuento.</p>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" data-bs-toggle="modal" data-bs-target="#modalRent">
            <div class="card text-bg-dark">
              <img
                src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/padel.jpg"
                class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Padel</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" data-bs-toggle="modal" data-bs-target="#modalRent">
            <div class="card text-bg-dark">
              <img
                src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/tenis.jpg"
                class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Tenis</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" data-bs-toggle="modal" data-bs-target="#modalRent">
            <div class="card text-bg-dark">
              <img
                src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/sala.jpg"
                class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Futbol Sala</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" data-bs-toggle="modal" data-bs-target="#modalRent">
            <div class="card text-bg-dark">
              <img
                src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/siete.jpg"
                class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Futbol 7</h5>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="row mt-5" id="calendario">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white p-3 rounded-4">
    <h2 class="display-5">Calendario.</h2>
    <div class="dropdown">
      <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        Deporte
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" @click="selectSport">
        <li><a class="dropdown-item" data-sport-id="1">Padel</a></li>
        <li><a class="dropdown-item" data-sport-id="2">Tenis</a></li>
        <li><a class="dropdown-item" data-sport-id="3">Futbol sala</a></li>
        <li><a class="dropdown-item" data-sport-id="4">Futbol 7</a></li>
      </ul>
    </div>
    <div class="d-flex justify-content-center mt-3">
      <div class="calendar-container">
        <FullCalendar :options="calendarOptions" />
      </div>
    </div>
  </div>
</div>

    <div class="row mt-5" id="gimnasio">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white p-3 rounded-4">
        <h2 class="display-5">Donde nos encontramos.</h2>
        <div class="d-flex justify-content-center mt-3">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6350.340466500009!2d-6.929387224559852!3d37.26739014122577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd11cffddb41cb6d%3A0xc873cb6b6671193d!2sForus%20Huelva%20(C.D.%20El%20Saladillo)!5e0!3m2!1ses!2ses!4v1716971215139!5m2!1ses!2ses"
            width="800" height="450" style="border:1;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <p>&copy; 2024 Forus Huelva. Todos los derechos reservados.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Modales -->

  <!-- Modal cancelar -->
  <div class="modal fade" id="cancelar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-light" id="staticBackdropLabel">¿Quieres cancelar la suscripción?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Si cancelas ahora la suscripción tendras acceso hasta el: <br> {{ subs.date_end }}.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <button type="button" class="btn btn-danger" @click="cancelSub">Si</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Rent -->
  <div class="modal fade" id="modalRent" tabindex="-1" aria-labelledby="modalRent" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Alquiler</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <NewRentComponent :id="clientes.id" :name="clientes.name" :email="clientes.email" />
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Sub -->
  <div class="modal fade" id="modalSub" tabindex="-1" aria-labelledby="modalSub" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSub">Revisa tus datos y verifica la compra</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <NewSubComponent :id="clientes.id" :name="clientes.name" :email="clientes.email" @subscriptionCreated="handleSubscriptionCreated"/>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Contraseña -->
  <div class="modal fade" id="modalPassword" tabindex="-1" aria-labelledby="modalSub" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSub">Modificar contraseña</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form @submit.prevent="editPassword">

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" v-model="password" id="password_pass" required />
                    <label for="floatingInput">Nueva Contraseña</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" v-model="new_password" id="new_password_pass"
                      required />
                    <label for="floatingInput">Repita la contraseña</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                  <button type="submit" class="btn btn-primary btn-block w-100">Nueva Contraseña</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Perfil -->
  <div class="modal fade" id="modalAccount" tabindex="-1" aria-labelledby="modalSub" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSub">Ver Perfil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="dni_account" placeholder="name@example.com"
                    v-model="clientes.dni" readonly />
                  <label for="floatingInput">DNI</label>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="name_account" placeholder="name@example.com"
                    v-model="clientes.name" readonly />
                  <label for="floatingInput">Nombre</label>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="last_Name_account" placeholder="name@example.com"
                    v-model="clientes.last_Name" readonly />
                  <label for="floatingInput">Apellido</label>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" id="email_account" placeholder="name@example.com"
                    v-model="clientes.email" readonly />
                  <label for="floatingInput">Email</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" id="phone_account" placeholder="name@example.com"
                    v-model="clientes.phone" readonly />
                  <label for="floatingInput">Telefóno</label>
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="town_account" placeholder="name@example.com"
                    v-model="clientes.town" readonly />
                  <label for="floatingInput">Localidad</label>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="postal_code_account" placeholder="name@example.com"
                    v-model="clientes.postal_code" readonly />
                  <label for="floatingInput">Codigo Postal</label>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="province_account" placeholder="name@example.com"
                    v-model="clientes.province" readonly />
                  <label for="floatingInput">Provincia</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" id="address_account" placeholder="name@example.com"
                    v-model="clientes.address" readonly />
                  <label for="floatingInput">Dirección</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" id="bank_account_account" placeholder="name@example.com"
                    v-model="clientes.bank_account" readonly />
                  <label for="floatingInput">Cuenta Bancaria</label>
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="importe" placeholder="name@example.com"
                    v-model="subs.importe" readonly />
                  <label for="floatingInput">Importe</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="observation" placeholder="name@example.com"
                    v-model="subs.observation" readonly />
                  <label for="floatingInput">Observación</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" id="date_pay" placeholder="name@example.com"
                    v-model="subs.date_pay" readonly />
                  <label for="floatingInput">Pagado</label>
                </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" id="name" placeholder="name@example.com"
                    v-model="subs.date_end" readonly />
                  <label for="floatingInput">Fecha expiración</label>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-1">
                  <input type="text" class="form-control" id="importe" placeholder="name@example.com"
                    v-model="subs.status" readonly />
                  <label for="floatingInput">Estado</label>
                </div>
              </div>

            </div>
            <div class="row">
              <router-link to="#" class="d-block mt-3 text-center" data-bs-toggle="modal"
                data-bs-target="#modalSub">Modificar suscripción</router-link>
              <router-link to="#" class="d-block mt-3 text-center text-danger" data-bs-toggle="modal"
                data-bs-target="#cancelar">Cancelar suscripción</router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Bank account -->
  <div class="modal fade" id="modalBank" tabindex="-1" aria-labelledby="modalSub" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSub">Editar Cuenta Bancaria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form @submit.prevent="editarBankAccount">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" v-model="clientes.bank_account" readonly />
                    <label for="floatingInput">Antigua Cuenta Bancaria</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" v-model="new_bank_account" required />
                    <label for="floatingInput">Nueva Cuenta Bancaria</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" v-model="password" required />
                    <label for="floatingInput">Contraseña</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                  <button type="submit" class="btn btn-primary btn-block w-100">Modificar Cuenta Bancaria</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Modal código QR -->
<div class="modal fade" id="modalQR" tabindex="-1" aria-labelledby="modalQR" aria-hidden="true" ref="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSub">Codigo QR</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container d-flex justify-content-center align-items-center p-5">
            <div class="" v-if="!isActive">
              Necesitas una suscripción.
            </div>
            <div v-else>
              <img :src="qrCodeUrl" alt="Código QR" v-if="qrCodeUrl"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Gestion del Alquiler -->
<div class="modal fade" id="modalMyRent" tabindex="-1" aria-labelledby="modalQR" aria-hidden="true" ref="modal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSub">Tus Alquileres</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <DataTable :value="rent" stripedRows :paginator="false" :rows="5" :rowsPerPageOptions="[5, 10, 20, 50]"
            tableStyle="min-width: 50rem" :filters="filters"
      :globalFilterFields="['court.sport_id', 'date_day', 'date_time']">
            <Column field="importe" header="Importe" sortable style="width: 8%"></Column>
            <Column field="date_pay" header="Dia de Pago" sortable style="width: 14%"></Column>
            <Column field="court.name" header="Pista" sortable style="width: 14%"></Column>
            <Column field="sport.sport" header="Deporte" sortable style="width: 14%"></Column>
            <Column field="date_day" header="Fecha de Juego" sortable style="width: 18%"></Column>
            <Column field="date_time" header="Hora Alquiler" sortable style="width: 14%"></Column>
            <Column header="Operaciones" style="width: 18%">
              <template #body="slotProps">
                <Button class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar"
                  @click="selectRent(slotProps.data)">
                  X
                </Button>
                <Button class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#edit"
                  @click="selectRent(slotProps.data)">
                  M
                </Button>
              </template>
            </Column>
            <template #header>
        <div class="flex justify-content-end">
            <InputText v-model="filters['global'].value" placeholder="Keyword Search" />
        </div>
      </template>
      <template #empty>No hay alquileres encontrados.</template>
          </DataTable>
          </div>
        </div>
      </div>
  </div>
</template>

<script setup>
import api from '@/services/service';
import { useRouter } from 'vue-router';
import { ref, onMounted, watch, nextTick  } from 'vue';
import { defineProps } from 'vue';
import { useToast } from 'primevue/usetoast';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext'

import FullCalendar from '@fullcalendar/vue3'
import timeGridPlugin from '@fullcalendar/timegrid'
import bootstrapPlugin from '@fullcalendar/bootstrap';

import Toast from 'primevue/toast';
import NewSubComponent from '@/components/NewSubComponent.vue';
import NewRentComponent from '@/components/NewRentComponent.vue';

const calendarOptions = ref({
  plugins: [timeGridPlugin, bootstrapPlugin],
  initialView: 'timeGridWeek',
  columnHeaderFormat: {
    weekday: 'short', // Mostrar solo el día de la semana abreviado
    month: 'numeric',
    day: 'numeric'
  },
  slotLabelFormat: {
    hour: 'numeric',
    minute: '2-digit',
    omitZeroMinute: false,
    meridiem: false
  },
  slotDuration: '00:20:00',
  slotMinTime: '09:00:00',
  slotMaxTime: '24:00:00',
  allDaySlot: false,
  themeSystem: 'bootstrap5', // Agregamos el tema de Bootstrap 5
  height: 'auto', // Ajustar automáticamente la altura del calendario
  eventTimeFormat: { hour: '2-digit', minute: '2-digit', meridiem: false }, // Formato de hora de los eventos
  eventDisplay: 'block', // Mostrar eventos en bloque para una mejor visualización
  eventBackgroundColor: '#0d6efd', // Color de fondo de los eventos
  eventTextColor: '#f747fff' // Color del texto de los eventos
});


const new_password = ref('');

const password = ref('');
const new_bank_account = ref('');

const filters = ref({ global: { value: '' } })


const pistas = ref([]);
const times = ref([]);
const sports = ref([]);
const clientes = ref([]);
const subs = ref([]);
const rent = ref([]);

const qrCodeUrl = ref('');


const props = defineProps({
  email: String,
  name: String,
  id: String
});

const isActive = ref(false);


console.log('Id del cliente:', clientes);

const localEmail = ref(props.email);

watch(() => props.email, (newVal) => {
  localEmail.value = newVal;
  getClients(newVal);
});

// Filtrar las pistas ocupadas de la base de datos de alquileres
const getOccupiedSlots = () => {
  const events = [];
  rent.value.forEach(rent => {
    const event = {
      title: `Deporte: ${rent.sport.sport} - ${rent.court.name}`, // Concatenar el nombre del deporte y la pista en el título del evento
      start: rent.date_day + 'T' + rent.date_time, // Concatenar la fecha y hora de inicio
      backgroundColor: '#dc3545', // Color de fondo del evento
      borderColor: '#dc4000', // Color del borde del evento
      textColor: '#ffffff' // Color del texto del evento
    };
    events.push(event);
  });
  console.log('Eventos:', events); // Agregar console.log para verificar los eventos
  return events;
};

// Actualizar los eventos del calendario con las pistas ocupadas
watch(rent, () => {
  const events = getOccupiedSlots();
  calendarOptions.value.events = events;
  console.log('Eventos actualizados:', events); // Agregar console.log para verificar los eventos actualizados
});

// Actualizar los eventos del calendario con las pistas ocupadas
watch(rent, () => {
  const events = getOccupiedSlots();
  calendarOptions.value.events = events;
});

const toast = useToast();

const showError = (message) => {
  toast.add({ severity: 'error', summary: 'Error', detail: message || 'Algo no ha salido como se esperaba', life: 3000 });
};

const showSuccess = (message) => {
  toast.add({ severity: 'success', summary: 'Correcto', detail: message || 'Todo está en orden', life: 3000 });
};

const getCourts = async () => {
  try {
    const respuesta = await api.get('/courts');
    pistas.value = respuesta.data;
  } catch (error) {
    console.log(error);
  }
};

const handleSubscriptionCreated = () => {
    getSub(clientes.value.id);
};


const getSports = async () => {
  try {
    const respuesta = await api.get('/sports');
    sports.value = respuesta.data;
  } catch (error) {
    console.log(error);
  }
};

// Función para cancelar una suscripción
const cancelSub = async () => {
  try {
    // Datos que se enviarán a la API para cancelar la suscripción
    const data = {
      status: 'cancelada'
    };

    // Realizar una solicitud PUT a la API para actualizar el estado de la suscripción del cliente
    const response = await api.put(`/subfees/${clientes.value.id}`, data);

    // Verificar si la respuesta de la API es exitosa
    if (response.status === 200) {
      // Si la respuesta es exitosa, imprimir mensaje en la consola y mostrar notificación de éxito
      showSuccess('Suscripción cancelada correctamente.');

      // Refrescar los datos de suscripción del cliente
      getSub(clientes.value.id);
    } else {
      // Si la respuesta no es exitosa, imprimir mensaje de error en la consola y mostrar notificación de error
      console.error('Error al editar el status.');
      showError('Error al editar el status.');
    }
  } catch (error) {
    // Manejar cualquier error que ocurra durante la solicitud a la API
    console.error('Error al editar el status:', error.message);
    showError('Error al editar el status.');
  }
};



const editPassword = async () => {
  try {
    if (password.value !== new_password.value) {
      throw new Error('Las contraseñas no coinciden');
    }

    const data = {
      password: new_password.value
    };

    console.log('Datos a enviar:', data);

    const response = await api.put(`/resource/${localEmail.value}`, data);

    if (response.status === 200) {
      console.log('Contraseña actualizada correctamente.');

      // Limpiar los campos del formulario
      password.value = '';
      new_password.value = '';
      closeModalPassword();
      getClients(localEmail.value);
      showSuccess('Contraseña actualizada correctamente.'); // Mostrar mensaje de éxito
    } else {
      console.error('Error al editar la contraseña.');
      showError('Error al editar la contraseña.'); // Mostrar mensaje de error
    }
  } catch (error) {
    console.error('Error al editar la contraseña:', error.message);
    showError('No coinciden las contraseñas'); // Mostrar mensaje de error
  }
};


const editarBankAccount = async () => {
  try {
    const data = {
      new_bank_account: new_bank_account.value,  // Asegúrate de usar el campo correcto que espera el backend
      password: password.value
    };

    const response = await api.put(`/bankAccount/${localEmail.value}`, data);  // Elimina '/bank-account' si no es necesario

    if (response.status === 200) {
      showSuccess('Cuenta bancaria actualizada correctamente.');
      new_bank_account.value = '';
      password.value = '';
      closeModalBank();
      getSub(clientes.value.id); // Refrescar datos de suscripción
      getClients(localEmail.value);
    } else {
      showError('Error al actualizar la cuenta bancaria.');
    }
  } catch (error) {
    console.error('Error al actualizar la cuenta bancaria:', error.message);
    showError('Error al actualizar la cuenta bancaria.');
  }
};


// Función para obtener los detalles del cliente por su email
const getClients = async (email) => {
  try {
    // Realizar una solicitud a la API para obtener los detalles del cliente por su email
    const respuesta = await api.get(`/clients/${email}`);
    console.log(respuesta.data);
    // Almacenar los detalles del cliente en una variable reactiva
    clientes.value = respuesta.data;
    // Verificar si se obtuvo algún cliente
    if (clientes.value.id) {
      // Si se obtuvo un cliente, obtener sus suscripciones y alquileres
      getSub(clientes.value.id);
      getRents(clientes.value.id);
    }
  } catch (error) {
    console.log(error);
  }
};

// Función para obtener las suscripciones de un cliente por su ID
const getSub = async (clienteId) => {
  try {
    // Realizar una solicitud a la API para obtener las suscripciones del cliente por su ID
    const respuesta = await api.get(`/subfees/${clienteId}`);
    console.log('Datos de suscripción:', respuesta.data);
    // Almacenar las suscripciones en una variable reactiva
    subs.value = respuesta.data;
    // Obtener la última suscripción del cliente
    const sub = respuesta.data;
    // Verificar si la suscripción está activa
    const isActiveSubscription = sub.status === 'activa' || (sub.status === 'cancelada' && sub.date_end >= getCurrentDate());
    // Almacenar el estado de la suscripción activa en una variable reactiva
    isActive.value = isActiveSubscription;
    // Obtener el código QR correspondiente a la suscripción
    getQRCode();
  } catch (error) {
    console.log(error);
  }
};



const getCurrentDate = () => {
  const currentDate = new Date().toISOString().split('T')[0];
  return currentDate;
};

const closeModalPassword = async () => {
  const editarRentModal = document.getElementById("modalPassword");
  const closeButton = editarRentModal.querySelector('[data-bs-dismiss="modal"]');
  closeButton.click();
};

const closeModalBank = async () => {
  const editarRentModal = document.getElementById("modalBank");
  const closeButton = editarRentModal.querySelector('[data-bs-dismiss="modal"]');
  closeButton.click();
};

// Función para obtener un código QR desde la API
const getQRCode = async () => {
  try {
    // Realizar una solicitud a la API para generar el código QR
    const response = await api.get('/generate-qr', { responseType: 'blob' });

    // Crear una URL a partir del blob recibido en la respuesta
    const url = URL.createObjectURL(response.data);

    // Almacenar la URL del código QR en una variable reactiva
    qrCodeUrl.value = url;

  } catch (error) {
    console.error('Error al generar el código QR:', error);
  }
};


const getRents = async (clienteId) => {
  try {
    const respuesta = await api.get(`/rentfees/${clienteId}`);
    rent.value = respuesta.data;
    console.log('Alquileres:', rent); // Agregar console.log para verificar los alquileres
  } catch (error) {
    console.error(error);
  }
};

const selectSport = async (event) => {
  const sportId = event.target.getAttribute('data-sport-id');
  await getRentsSport(sportId);
};

const getRentsSport = async (sportId) => {
  try {
    const respuesta = await api.get(`/calendar/${sportId}`);
    rent.value = respuesta.data;
    console.log('Alquileres:', rent);
  } catch (error) {
    console.error(error);
  }
};




onMounted(() => {
  getCourts();
  getSports();
  if (localEmail.value) {
    getClients(localEmail.value);
  }
  const events = getOccupiedSlots();
  calendarOptions.value.events = events;
});
 
</script>