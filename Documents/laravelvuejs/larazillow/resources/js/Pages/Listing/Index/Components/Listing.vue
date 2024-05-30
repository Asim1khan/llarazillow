<template>
       <Box >
           <div>
            <Link :href="route('Listing.show',Listing.id)">
                <div class="flex items-center gap-1">


                <Price :price="Listing.price" class="text-2xl font-bold"/>
                 <div class="text-xs text-gray-500">
                    <Price :price="monthlayPaymen"/>pm
                 </div>
            </div>
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
</template>

<script setup>
  import { Link } from '@inertiajs/vue3';
import ListingAddress from '@/components/ListingAddress.vue';
import ListingSpace from '@/components/ListingSpace.vue';
import Box from '@/components/UI/Box.vue';
import Price from '@/components/Price.vue';
import  {useMonthlyPayment} from '@/Composables/useMonthlyPayment'

const props=defineProps({
    Listing:Object
})

const{monthlayPaymen}=useMonthlyPayment(props.Listing.price,2.5,25)

</script>
