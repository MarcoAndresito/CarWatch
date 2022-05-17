<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import JetFormSection from "@/Jetstream/FormSection.vue";

const aux1 = ref(null);
const aux2 = ref(null);

defineProps({
  services: Array,
});

const form = useForm({
  registration: "",
  carrito: [],
});

const newOrder = () => {
  form.post(route("order.store"));
};

const addDetail = () => {
  const detail = {
    service_id: aux1.value.value,
    price: aux2.value.value,
  };
  form.carrito.push(detail);
  aux1.value.value = "";
  aux2.value.value = "";
};
</script>

<template>
  <AppLayout>
    <div class="max-w-7xl mx-auto py-10 px-8">
      <JetFormSection @submitted="newOrder">
        <template #title>Nueva orden de servicio</template>
        <template #description>
          Formulario para crear nueva oren de servicio
        </template>
        <template #form>
          <!-- placa del vehiculo -->
          <div class="col-span-6">
            <label
              for="registration"
              class="block font-medium text-sm text-gray-700"
            >
              placa del vehiculo
            </label>
            <input
              id="registration"
              type="text"
              v-model="form.registration"
              class="
                border-gray-300
                focus:border-indigo-300
                focus:ring
                focus:ring-indigo-200
                focus:ring-opacity-50
                rounded-md
                shadow-sm
                mt-1
                block
                w-full
              "
            />
          </div>

          <!-- mini formulario para agregar nuevo elemento al carrito -->
          <div class="col-span-3">
            <!-- aux1 -->
            <select class="rounded w-full" ref="aux1">
              <option
                v-for="service in services"
                :key="service.id"
                :value="service.id"
              >
                {{ service.name }}
              </option>
            </select>
          </div>
          <div class="col-span-2">
            <!-- aux2 -->
            <input type="number" class="rounded w-full" ref="aux2" />
          </div>
          <div class="col-span-1">
            <!-- button -->
            <button
              type="button"
              class="bg-blue-500 rounded p-1 hover:bg-blue-700"
              @click="addDetail()"
            >
              Agregar
            </button>
          </div>

          <!-- mostrar carrito -->
          <div class="col-span-6">
            <table class="w-full ring-1">
              <tr>
                <th>servicio</th>
                <th>precio</th>
              </tr>
              <tr v-for="detail in form.carrito" :key="detail.service_id">
                <th>{{ detail.service_id }}</th>
                <th>{{ detail.price }}</th>
              </tr>
            </table>
          </div>
        </template>
        <template #actions>
          <button type="submit">Guardar</button>
        </template>
      </JetFormSection>
    </div>
  </AppLayout>
</template>
