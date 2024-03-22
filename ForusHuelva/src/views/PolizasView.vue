<template>
    <NavComponent/>
    <PolizasComponent/>
  </template>
  
  <script>
  import NavComponent from '@/components/NavComponent.vue';
  import PolizasComponent from '@/components/PolizasComponent.vue';
  
  export default{
  name: 'polizasTable',
  components: {
    NavComponent,
    PolizasComponent
}
  }
  </script>