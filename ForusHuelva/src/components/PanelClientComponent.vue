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
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalAccount">Ver Perfil</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalBank">Cambiar Pago</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalPassword">Cambiar Contraseña</a></li>
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
          <h1 class="display-1">Bienvenido {{ clientes.name }}</h1>
        </div>
      </div>

      <div class="row py-5" id="planes" v-if="!isActive">
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
            <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalSub" id="precio1">Pagar</button></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Subscripción 6 meses</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">105,99€</h6>
            <p class="card-text">El pago se realizará en el momento que se acabe la subscripción.</p>
            <a href="#" class="card-link"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalSub">Pagar</button></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 d-flex justify-content-center">
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
  <div v-else>
    <h2 class="display-5">¡Ya eres socio!</h2>
    <p class="lead">Gracias por ser parte de nuestra comunidad.</p>
  </div>
  
  
      <div class="row py-5" id="gimnasio">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h4 class="display-5">Puede alquilar nuestras pistas facilmente pulsando abajo.</h4>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" data-bs-toggle="modal" data-bs-target="#modalRent">
              <div class="card text-bg-dark">
                <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/padel.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Padel</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" data-bs-toggle="modal" data-bs-target="#modalRent">
              <div class="card text-bg-dark">
                <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/tenis.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Tenis</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" data-bs-toggle="modal" data-bs-target="#modalRent">
              <div class="card text-bg-dark">
                <img src="https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/img/sala.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title">Futbol Sala</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6" data-bs-toggle="modal" data-bs-target="#modalRent">
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

      <div class="row py-5" id="gimnasio">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h2 class="display-5">Donde nos encontramos.</h2>
          <div class="d-flex justify-content-center mt-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6350.340466500009!2d-6.929387224559852!3d37.26739014122577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd11cffddb41cb6d%3A0xc873cb6b6671193d!2sForus%20Huelva%20(C.D.%20El%20Saladillo)!5e0!3m2!1ses!2ses!4v1716971215139!5m2!1ses!2ses" width="800" height="450" style="border:1;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
    <!-- Modal Rent -->
        <div class="modal fade" id="modalRent" tabindex="-1" aria-labelledby="modalRent" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Alquiler</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <NewRentComponent :id="clientes.id" :name="clientes.name" :email="clientes.email"/>
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
        <NewSubComponent :id="clientes.id" :name="clientes.name" :email="clientes.email"/>
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
                    <input type="password" class="form-control" v-model="new_password" id="new_password_pass" required />
                    <label for="floatingInput">Repita la contraseña</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                  <button type="submit" class="btn btn-primary btn-block w-100">Nueva Contraseña</button>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Modal Perfil -->
    <div class="modal fade" id="modalAccount" tabindex="-1" aria-labelledby="modalSub" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSub">Ver Perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="dni_account" placeholder="name@example.com"
                    v-model="clientes.dni" readonly/>
                  <label for="floatingInput">DNI</label>
                </div>
              </div>
              
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="name_account" placeholder="name@example.com"
                    v-model="clientes.name" readonly/>
                  <label for="floatingInput">Nombre</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="last_Name_account" placeholder="name@example.com"
                    v-model="clientes.last_Name" readonly/>
                  <label for="floatingInput">Apellido</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="email_account" placeholder="name@example.com"
                    v-model="clientes.email" readonly/>
                  <label for="floatingInput">Email</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="phone_account" placeholder="name@example.com"
                    v-model="clientes.phone" readonly/>
                  <label for="floatingInput">Telefóno</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="town_account" placeholder="name@example.com"
                    v-model="clientes.town" readonly/>
                  <label for="floatingInput">Localidad</label>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="postal_code_account" placeholder="name@example.com"
                    v-model="clientes.postal_code" readonly/>
                  <label for="floatingInput">Codigo Postal</label>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="province_account" placeholder="name@example.com"
                    v-model="clientes.province" readonly/>
                  <label for="floatingInput">Provincia</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="address_account" placeholder="name@example.com"
                    v-model="clientes.address" readonly/>
                  <label for="floatingInput">Dirección</label>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="bank_account_account" placeholder="name@example.com"
                    v-model="clientes.bank_account" readonly/>
                  <label for="floatingInput">Cuenta Bancaria</label>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
                    <input type="text" class="form-control" v-model="password" required />
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
  </template>
  
  <script setup>
  import api from '@/services/service';
  import { useRouter } from 'vue-router';
  import { ref, onMounted, watch } from 'vue';
  import { defineProps } from 'vue';
  import { useToast } from 'primevue/usetoast';
  import Toast from 'primevue/toast';
  import NewSubComponent from '@/components/NewSubComponent.vue';
  import NewRentComponent from '@/components/NewRentComponent.vue';
  
  const new_password = ref('');
  const name = ref('');
  const email = ref('');
  const password = ref('');
  const bank_account = ref('');
  const new_bank_account = ref(''); 
  const dni = ref('');
  const last_Name = ref('');
  const phone = ref('');
  const town = ref('');
  const postal_code = ref('');
  const province = ref('');
  const address = ref('');
  
  const pistas = ref([]);
  const times = ref([]);
  const sports = ref([]);
  const clientes = ref([]);
  const subs = ref([]);
  
  const props = defineProps({
    email: String,
    name: String,
    id: String
  });
  
  const isActive = ref(false);

  const localEmail = ref(props.email);
  
  watch(() => props.email, (newVal) => {
    localEmail.value = newVal;
    obtenerCliente(newVal);
  });
  
  const toast = useToast();
  
  const showError = () => {
    toast.add({ severity: 'error', summary: 'Error', detail: 'Algo no ha salido como se esperaba', life: 3000 });
  };
  
  const showSuccess = () => {
    toast.add({ severity: 'success', summary: 'Correcto', detail: 'Todo está en orden', life: 3000 });
  };
  
  const obtenerPistas = async () => {
    try {
      const respuesta = await api.get('/courts');
      pistas.value = respuesta.data;
    } catch (error) {
      console.log(error);
    }
  };
  
  const obtenerHoras = async () => {
    try {
      const respuesta = await api.get('/times');
      times.value = respuesta.data;
    } catch (error) {
      console.log(error);
    }
  };
  
  const obtenerDeportes = async () => {
    try {
      const respuesta = await api.get('/sports');
      sports.value = respuesta.data;
    } catch (error) {
      console.log(error);
    }
  };
  
  const editarContraseña = async () => {
    try {
      const respuesta = await api.put('/clients');
      // Aquí falta lógica, pero no está claro lo que se pretende hacer con la respuesta.
    } catch (error) {
      console.log(error);
    }
  };
  
  const editarBankAccount = async () => {
    try {
      const respuesta = await api.get('/clients');
      // Aquí falta lógica, pero no está claro lo que se pretende hacer con la respuesta.
    } catch (error) {
      console.log(error);
    }
  };
  
  const obtenerCliente = async (email) => {
    try {
      const respuesta = await api.get(`/clientes/${email}`);
      console.log(respuesta.data);
      clientes.value = respuesta.data;
      if (clientes.value.id) {
        obtenerSub(clientes.value.id);
      }
    } catch (error) {
      console.log(error);
    }
  };
  
  const obtenerSub = async (clienteId) => {
  try {
    const respuesta = await api.get(`/subfees/${clienteId}`);
    subs.value = respuesta.data;
    isActive.value = subs.value.status === 'activa';
  } catch (error) {
    console.log(error);
  }
};
  
  onMounted(() => {
    obtenerPistas();
    obtenerHoras();
    obtenerDeportes();
    if (localEmail.value) {
      obtenerCliente(localEmail.value);
    }
  });
  </script>
  