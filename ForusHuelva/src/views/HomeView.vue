<template>
  <NavComponent/>
  <HomeComponent/>
</template>

<script>
import NavComponent from '@/components/NavComponent.vue';
import HomeComponent from '@/components/HomeComponent.vue';

export default{
name: 'polizasTable',
components: {
  NavComponent,
  HomeComponent
}
}
</script>
