<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
         <Box class="md: col-span-7 flex items-center-w-full">
            <div class="w-full text-center font-medium text-gray-500">No Image</div>
         </Box>
            <div class="md: col-span-5 flex flex-col gap-4">
               <Box>
                <template #header>
                    Basic Info
                </template>
                <Price :price="Listing.price" class="text-2xl"/>
                 <ListingSpace :Listing="Listing" class="text-lg"/>
               <ListingAddress :Listing="Listing"  class="text-gray-500"/>
            </Box>
            <Box>
                <template #header>
                    Offer
                </template>
                Make In Offere
            </Box>
            </div>
         </div>
</template>
<script setup>
import ListingAddress from '@/components/ListingAddress.vue';
import Price from '@/components/Price.vue';
import ListingSpace from '@/components/ListingSpace.vue';
 import Box from '@/components/UI/Box.vue';
   defineProps({
   Listing:Object

})
</script>
