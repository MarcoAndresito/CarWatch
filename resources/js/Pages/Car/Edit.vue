<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetFormSection from "@/Jetstream/FormSection.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import JetButton from "@/Jetstream/Button.vue";

const data = defineProps({
  car: Object,
});

const form = useForm({
  registration: data.car.registration,
  type: data.car.type,
  name: data.car.name,
  nit: data.car.nit,
});

const update = () => {
  form.post(route("car.store"));
};
</script>

<template>
  <AppLayout>
    <div class="max-w-7xl mx-auto py-10 px-8">
      <JetFormSection @submitted="update">
        <template #title>Editar vehiculo</template>
        <template #description>Formulario para crear editar vehiculo</template>
        <template #form>
          <div class="col-span-6">
            <JetLabel for="registration" value="Placa del vehiculo" />
            <JetInput
              id="registration"
              type="text"
              v-model="form.registration"
              class="mt-1 block w-full"
            />
          </div>
          <div class="col-span-6">
            <JetLabel for="type" value="Tipo de vehiculo" />
            <JetInput
              id="type"
              type="text"
              v-model="form.type"
              class="mt-1 block w-full"
            />
          </div>
          <div class="col-span-6">
            <JetLabel for="name" value="Nombre del conductor" />
            <JetInput
              id="name"
              type="text"
              v-model="form.name"
              class="mt-1 block w-full"
            />
          </div>
          <div class="col-span-6">
            <JetLabel for="nit" value="Nit del conductor" />
            <JetInput
              id="nit"
              type="text"
              v-model="form.nit"
              class="mt-1 block w-full"
            />
          </div>
        </template>
        <template #actions>
          <JetButton>Guardar</JetButton>
        </template>
      </JetFormSection>
    </div>
  </AppLayout>
</template>