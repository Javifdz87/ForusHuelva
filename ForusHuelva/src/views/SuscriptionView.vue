<template>
    <NavComponent/>
    <SuscriptionComponent/>
  </template>
  
  <script>
  import NavComponent from '@/components/NavComponent.vue';
  import SuscriptionComponent from '@/components/SuscriptionComponent.vue';
  
  export default{
  name: 'suscriptionTable',
  components: {
    NavComponent,
    SuscriptionComponent
}
  }
  </script>