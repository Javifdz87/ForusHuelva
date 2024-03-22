<template>
  <NavComponent/>
  <ClientsComponent/>
</template>

<script>
import NavComponent from '@/components/NavComponent.vue';
import ClientsComponent from '@/components/ClientsComponent.vue';

export default{
name: 'clientsTable',
components: {
  NavComponent,
    ClientsComponent
}
}
</script>

