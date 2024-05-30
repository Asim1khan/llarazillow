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
                    Monthly Payment
                </template>
                  <div>
                     <label class="label"> Interest Rate ({{ interestRate }} %)</label>
                      <input v-model.number="interestRate" type="range" min="0.1" max="30" step="0.1" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"/>
                      <label class="label"> duration ({{ duration }} Years)</label>
                      <input v-model.number="duration" type="range" min="3" max="35" step="1" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"/>
                                <div class="text-gray-600 dark:text-gray-300 mt-2">
                                    <div class="text-gray-400"> Your Monthlay Payment</div>
                                       <Price :price="monthlayPaymen" class="text-3xl"/>
                                </div>
                                <div class="mt-2 text-gray-500">
                                    <div class="flex justify-between">
                                        <div>Total Paid</div>
                                        <div>
                                            <Price :price="totalPaid" class="font-bold"/>
                                        </div>
                                    </div>

                                    <div class="flex justify-between">
                                        <div>Principal Paid</div>
                                        <div>
                                            <Price :price="Listing.price" class="font-bold"/>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div>Interest Paid</div>
                                        <div>
                                            <Price :price="totalInterest" class="font-bold"/>
                                        </div>
                                    </div>
                                </div>
                    </div>
            </Box>
            </div>
         </div>
</template>
<script setup>
import ListingAddress from '@/components/ListingAddress.vue';
import Price from '@/components/Price.vue';
import ListingSpace from '@/components/ListingSpace.vue';
 import Box from '@/components/UI/Box.vue';
 import {ref} from 'vue'
 import  {useMonthlyPayment} from '@/Composables/useMonthlyPayment'

 const interestRate=ref( 2.5)
 const duration=ref(25)
 const props =   defineProps({
   Listing:Object

})



const{monthlayPaymen,totalPaid,totalInterest}=useMonthlyPayment(props.Listing.price,interestRate,duration)


</script>
