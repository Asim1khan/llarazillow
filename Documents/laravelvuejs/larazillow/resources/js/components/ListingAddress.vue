<template>
    <span>
        {{ Listing.street }} {{ Listing.street_nr }}, {{ Listing.city }}, for $ {{ Listing.price }}

    </span>

</template>

   <script setup>
      defineProps({
        Listing:Object,
      })
</script>
