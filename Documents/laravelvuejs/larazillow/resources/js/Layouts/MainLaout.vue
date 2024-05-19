<template>
    <div>
      <Link href="/Listing">Listing</Link>
      <Link href="/Listing/create">Listing create</Link>
      <!-- <div v-if="flashMessage" class="success">
        {{ flashMessage }}
      </div> -->
      <slot></slot>
    </div>
  </template>

  <script setup>
  import { ref, computed } from 'vue';
  import { Link, usePage } from '@inertiajs/vue3';

  const page = usePage()
  const flashMessage = computed(() => page.props.value.flash.success,);
  </script>

  <style scoped>
  .success {
    background-color: green;
    color: white;
    padding: 10px;
    border-radius: 5px;
  }
  </style>
