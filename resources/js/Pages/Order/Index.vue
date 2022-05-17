<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  orders: Array,
});
</script>

<template>
  <AppLayout>
    <div class="max-w-7xl mx-auto py-10 px-8">
      <div class="grid grid-cols-3 gap-6">
        <div class="col-span-1">
          <h1 class="text-3xl text-gray-900 font-bold mb-5">
            Listado de ordenes de servicio
          </h1>
          <Link
            :href="route('order.create')"
            class="px-5 py-2 bg-green-400 hover:bg-green-600 font-bold rounded"
          >
            Nuevo
          </Link>
        </div>
        <div class="col-span-2 bg-white p-5 rounded">
          <table class="w-full mt-5">
            <tr class="text-2xl bg-gray-800 text-gray-100">
              <th>Fecha</th>
              <th>Placa</th>
              <th>Nombre conductor</th>
              <th>Codigo Empleado</th>
              <th>Pdf</th>
            </tr>
            <tr v-for="order in orders" v-bind:key="order.id">
              <td class="text-center">
                {{ new Date(order.created_at).toLocaleDateString() }}
              </td>
              <td class="text-center">{{ order.registration }}</td>
              <td class="text-center">{{ order.name }}</td>
              <td class="text-center">{{ order.user_id }}</td>
              <td class="text-center">
                <a :href="route('order.dpf', order.id)">Descargar Pdf</a>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </AppLayout>
</template>