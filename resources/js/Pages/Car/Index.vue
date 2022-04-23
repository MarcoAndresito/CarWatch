<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
defineProps({
  cars: Array,
});
</script>

<template>
  <AppLayout>
    <h1>Listado de Autos</h1>
    <pre>{{ cars }}</pre>
    <p>hola!</p>
  </AppLayout>
</template>