<template>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Box v-for="Listing in Listings"  :key="Listing.id">
           <div>
            <Link :href="route('Listing.show',Listing.id)">
                <Price :price="Listing.price" class="text-2xl"/>
                 <ListingSpace :Listing="Listing" class="text-lg"/>
               <ListingAddress :Listing="Listing"  class="text-gray-500"/>
        </Link>
           </div>
            <div>
                <!-- <Link :href="`/Listing/${Listing.id}/edit`">Edit</Link> -->
                <Link :href=" route('Listing.edit',{Listing:Listing.id})">Edit</Link>

            </div>
              <div>
                   <!-- <Link :href="`/Listing/${Listing.id}`" method="DELETE" as="button">Delete</Link> -->
                   <Link :href="route('Listing.destroy',{Listing:Listing.id})" method="DELETE" as="button">Delete</Link>


              </div>
    </Box>
    </div>
</template>
<script setup>
   ListingAddress
  import { Link } from '@inertiajs/vue3';
import ListingAddress from '@/components/ListingAddress.vue';
import ListingSpace from '@/components/ListingSpace.vue';
import Box from '@/components/UI/Box.vue';
import Price from '@/components/Price.vue';
 defineProps({
   Listings:Array
 })
</script>
