<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetFormSection from "@/Jetstream/FormSection.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import JetButton from "@/Jetstream/Button.vue";

const data = defineProps({
  service: Object,
});

const form = useForm({
  name: data.service.name,
  description: data.service.description,
  price: data.service.price,
  offer: data.service.offer == 1 ? true : false,
  discount: data.service.discount,
  disable: data.service.disable == 1 ? true : false,
});

const update = () => {
  form.put(route("service.update", data.service.id));
};
</script>

<template>
  <AppLayout>
    <div class="max-w-7xl mx-auto py-10 px-8">
      <JetFormSection @submitted="update">
        <template #title>Editar servicio</template>
        <template #description>Formulario para editar servicio</template>
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
            <JetCheckbox
              id="offer"
              v-model:checked="form.offer"
              name="Oferta"
            />
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
          <JetButton>Guardar Cambios</JetButton>
        </template>
      </JetFormSection>
    </div>
  </AppLayout>
</template>