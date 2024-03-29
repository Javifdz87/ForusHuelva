<template>
    <NavComponent/>
    <SubscriptionComponent/>
  </template>
  
  <script>
  import NavComponent from '@/components/NavComponent.vue';
  import SubscriptionComponent from '@/components/SubscriptionComponent.vue';
  
  export default{
  name: 'subscriptionTable',
  components: {
    NavComponent,
    SubscriptionComponent
}
  }
  </script>