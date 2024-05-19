<template>
    <div>
         <ListingAddress :Listing="Listing"></ListingAddress>
    </div>
</template>
<script setup>
import ListingAddress from '../../components/ListingAddress.vue';

   defineProps({
   Listing:Object

})
</script>
