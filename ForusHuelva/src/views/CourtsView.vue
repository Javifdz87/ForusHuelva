<template>
  <NavComponent/>
  <CourtsComponent/>
</template>

<script>
import NavComponent from '@/components/NavComponent.vue';
import CourtsComponent from '../components/CourtsComponent.vue';

export default{
name: 'courtsTable',
components: {
  NavComponent,
  CourtsComponent
}
}
</script>

