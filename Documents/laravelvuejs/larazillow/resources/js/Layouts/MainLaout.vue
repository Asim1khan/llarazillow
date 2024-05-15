<template>
      <Link href="/">Index page</Link>
      <Link href="/show">Show</Link>
      <div>The Page With time {{ timer }}</div>

<slot></slot>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import {ref} from 'vue'
const timer= ref(0)
setInterval(()=>timer.value++,1000);
</script>
