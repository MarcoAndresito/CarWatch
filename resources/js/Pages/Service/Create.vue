<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetFormSection from "@/Jetstream/FormSection.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import JetButton from "@/Jetstream/Button.vue";

const form = useForm({
  name: "",
  description: "",
  price: 0,
  offer: true,
  discount: 0,
  disable: true,
});

const newService = () => {
  form.post(route("service.store"));
};
</script>

<template>
  <AppLayout>
    <div class="max-w-7xl mx-auto py-10 px-8">
      <JetFormSection @submitted="newService">
        <template #title>Nuevo servicio</template>
        <template #description>Formulario para crear nuevo servicio</template>
        <template #form>
          <div class="col-span-6">
            <JetLabel for="name" value="Nombre" />
            <JetInput
              id="name"
              type="text"
              v-model="form.name"
              class="mt-1 block w-full"
            />
          </div>
          <div class="col-span-6">
            <JetLabel for="description" value="Descripcion" />
            <JetInput
              id="description"
              type="text"
              v-model="form.description"
              class="mt-1 block w-full"
            />
          </div>
          <div class="col-span-6">
            <JetLabel for="price" value="Precio" />
            <JetInput
              id="price"
              type="number"
              v-model="form.price"
              class="mt-1 block w-full"
            />
          </div>
          <div class="col-span-3">
            <JetLabel for="offer" value="Oferta" />
            <JetCheckbox id="offer" v-model:checked="form.offer" name="offer" />
          </div>
          <div class="col-span-3">
            <JetLabel for="discount" value="Descuento" />
            <JetInput
              id="discount"
              type="number"
              v-model="form.discount"
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