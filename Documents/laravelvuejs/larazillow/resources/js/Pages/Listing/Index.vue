<template>
     <Filter :filters="filters"/>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Listing v-for="Listing in Listings.data"  :key="Listing.id" :Listing="Listing" />

    </div>
    <div v-if="Listings.data.length" class="w-full flex justify-center mt-4 mb-4">
       <Pagination :links="Listings.links"/>
    </div>
</template>
<script setup>
  import Pagination from '@/components/UI/Pagination.vue';
import Listing from '@/Pages/Listing/Index/Components/Listing.vue';
import Filter from './Index/Components/Filter.vue';
 defineProps({
   Listings:Object,
   filters:Object

 })
</script>
