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

const deleteCar = () => {
  const form = useForm();
  form.delete(route("car.destroy", data.car.id));
};

const data = defineProps({
  car: Object,
});
</script>

<template>
  <AppLayout>
    <div class="max-w-7xl mx-auto py-10 px-8">
      <JetActionSection>
        <template #title>Vehiculo</template>
        <template #description>mostrar</template>
        <template #content>
          <p>placa: {{ car.registration }}</p>
          <p>tipo: {{ car.type }}</p>
          <p>nombre: {{ car.name }}</p>
          <p>nit: {{ car.nit }}</p>

          <div class="mt-5">
            <JetDangerButton @click="showModal"> Eliminar </JetDangerButton>
          </div>

          <JetDialogModal :show="modal" @close="hideModal">
            <template #title>Eliminar</template>
            <template #content>Estas seguro de eliminar el vehiculo</template>
            <template #footer>
              <JetSecondaryButton @click="hideModal">
                Cerrar
              </JetSecondaryButton>
              <JetDangerButton @click="deleteCar">
                Si, Eliminar
              </JetDangerButton>
            </template>
          </JetDialogModal>
        </template>
      </JetActionSection>
    </div>
  </AppLayout>
</template>