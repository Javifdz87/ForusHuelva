<template>
    <NavComponent />
    <SearchComponent />
</template>

<script>
import SearchComponent from '@/components/SearchComponent.vue'
import NavComponent from '@/components/NavComponent.vue';

export default {
    name: 'search',
    components: {
        NavComponent,
        SearchComponent
    }
}

</script>