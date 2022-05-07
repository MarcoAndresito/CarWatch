<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetButton from "@/Jetstream/Button.vue";

defineProps({
  services: Array,
});

const form = useForm({
  filter: "",
});

const search = () => {
  form.get(route("service.index"));
};
</script>

<template>
  <AppLayout>
    <div class="max-w-7xl mx-auto py-10 px-8">
      <div class="grid grid-cols-3 gap-6">
        <div class="col-span-1">
          <h1 class="text-3xl text-gray-900 font-bold mb-5">
            Listado de Servicios
          </h1>
          <Link
            :href="route('service.create')"
            class="px-5 py-2 bg-green-400 hover:bg-green-600 font-bold rounded"
          >
            Nuevo
          </Link>
        </div>
        <div class="col-span-2 bg-white p-5 rounded">
          <table class="w-full mt-5">
            <tr class="text-2xl bg-gray-800 text-gray-100">
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Ver</th>
              <th>Editar</th>
            </tr>
            <tr v-for="service in services" v-bind:key="service.id">
              <td>{{ service.name }}</td>
              <td>{{ service.description }}</td>
              <td>{{ service.price }}</td>
              <td>
                <Link
                  :href="route('service.show', service.id)"
                  as="button"
                  class="
                    px-5
                    py-2
                    bg-blue-400
                    hover:bg-blue-600
                    font-bold
                    rounded
                  "
                >
                  Ver
                </Link>
              </td>
              <td>
                <Link
                  :href="route('service.edit', service.id)"
                  class="
                    px-5
                    py-2
                    bg-gray-400
                    hover:bg-gray-600
                    font-bold
                    rounded
                  "
                >
                  Editar
                </Link>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </AppLayout>
</template>