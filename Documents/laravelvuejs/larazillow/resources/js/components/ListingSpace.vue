<template>
    <div>
        <span class="font-bold">{{ Listing.beds }}</span>
        bds <span class="text-gray-400">| </span>
        <span class="font-bold">{{ Listing.baths }}</span>
        ba <span class="text-gray-400">| </span>
        <span class="font-bold">{{ Listing.area }}</span> m²

        {{ Listing.baths }} ba</div>
</template>
<script setup>
defineProps({
    Listing:Object
})
</script>
