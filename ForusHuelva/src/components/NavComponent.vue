<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="/home"><h2>Forus Huelva</h2></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link to="/clientsTable" class="nav-link">Clientes</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/suscriptionTable" class="nav-link">Subscripciones</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/rentTable" class="nav-link">Alquileres</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/courtsTable" class="nav-link">Pistas</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/search" class="nav-link">Filtrar Clientes</router-link>
          </li>
        </ul>
      </div>
      <div class="ml-auto">
        <router-link to="/" class="nav-link text-danger">Cerrar Sesión</router-link>
      </div>
    </div>
  </nav>
</template>

<script>

</script>
<style>
body {
  overflow-x: hidden;
}
</style>
