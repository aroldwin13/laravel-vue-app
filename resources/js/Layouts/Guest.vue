<script setup>
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div>
      <div class="background-image">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
          <div>
            <Link href="/">
              <BreezeApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
          </div>
  
          <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <slot />
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <style scoped>
  .background-image {
    background-image: url('https://upcdn.io/FW25bhR/raw/mmsubg.png');
    background-size: cover;
    background-repeat: no-repeat;
    /* Adjust other background properties as needed */
  }
  </style>
  
