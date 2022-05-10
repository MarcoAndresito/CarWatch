<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetActionSection from "@/Jetstream/ActionSection.vue";
import JetDangerButton from "@/Jetstream/DangerButton.vue";
import JetSecondaryButton from "@/Jetstream/SecondaryButton.vue";
import JetDialogModal from "@/Jetstream/DialogModal.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const modal = ref(false);

const showModal = () => {
  modal.value = true;
};

const hideModal = () => {
  modal.value = false;
};

const deleteService = () => {
  const form = useForm();
  form.delete(route("service.destroy", data.service.id));
};

const data = defineProps({
  service: Object,
});
</script>

<template>
  <AppLayout>
    <div class="max-w-7xl mx-auto py-10 px-8">
      <JetActionSection>
        <template #title>Servicio</template>
        <template #description>mostrar servicio</template>
        <template #content>
          <p>Nombre: {{ service.name }}</p>
          <p>Descripcion: {{ service.description }}</p>
          <p>Precio: {{ service.price }} bs.</p>

          <p v-if="service.offer == 1">
            En Oferta, con: {{ service.discount }} bs, de descuento!
          </p>

          <p v-if="service.offer != 1">sin descuento</p>

          <div class="mt-5">
            <JetDangerButton @click="showModal"> Eliminar </JetDangerButton>
          </div>

          <JetDialogModal :show="modal" @close="hideModal">
            <template #title>Eliminar</template>
            <template #content>Estas seguro de eliminar el servicio</template>
            <template #footer>
              <JetSecondaryButton @click="hideModal">
                Cerrar
              </JetSecondaryButton>
              <JetDangerButton @click="deleteService">
                Si, Eliminar
              </JetDangerButton>
            </template>
          </JetDialogModal>
        </template>
      </JetActionSection>
    </div>
  </AppLayout>
</template>