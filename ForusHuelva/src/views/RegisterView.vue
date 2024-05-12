<template>
    <NavComponent/>
    <RegisterComponent/>
  </template>

<script>
import NavComponent from '@/components/NavComponent.vue';
import RegisterComponent from '@/components/RegisterComponent.vue';

export default{
name: 'register',
components: {
  NavComponent,
    RegisterComponent
}
}

</script>