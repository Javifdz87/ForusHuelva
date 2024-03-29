<template>
    <NavComponent/>
    <RentComponent/>
  </template>
  
  <script>
  import NavComponent from '@/components/NavComponent.vue';
  import RentComponent from '@/components/RentComponent.vue';
  
  export default{
  name: 'rentTable',
  components: {
    NavComponent,
    RentComponent
}
  }
  </script>