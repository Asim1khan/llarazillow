<template>
    <div v-for="Listing in Listings"  :key="Listing.id">
           <div>
            <Link :href="`/Listing/${Listing.id}`">
               <ListingAddress :Listing="Listing"></ListingAddress>
        </Link>
           </div>
            <div>
                <Link :href="`/Listing/${Listing.id}/edit`">Edit</Link>
            </div>
              <div>
                   <Link :href="`/Listing/${Listing.id}`" method="DELETE" as="button">Delete</Link>

              </div>
    </div>
</template>
<script setup>
   ListingAddress
  import { Link } from '@inertiajs/vue3';
import ListingAddress from '../../components/ListingAddress.vue';
 defineProps({
   Listings:Array
 })
</script>
