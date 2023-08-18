<template>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 w-100">Gestión libros</span>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="abrir-modal">Crear</button>
      <ConsultarLibro @categoria="obtenerCategoria"/>
      <Lista :categoria="categoria" :actualizar="actualizarLista" @data-libro="dataLibro" />
    </div>  
  </nav>
  <FormularioModal :data="libro" @data-enviada="dataEnviada" />
</template>

<script>
import Lista from './Lista.vue';
import ConsultarLibro from './ConsultarLibro.vue';
import FormularioModal from './FormularioModal.vue';

export default {
  components: {
    Lista,
    ConsultarLibro,
    FormularioModal
  },
  data() {
    return {
      categoria: null,
      actualizarLista: false,
      libro: null,
    };
  },
  methods: {
    obtenerCategoria(v) {
      this.categoria = v;
    },
    dataEnviada(v) {
      this.actualizarLista = true;
    },
    dataLibro(v) {
      this.libro = v;
    }
  }
};
</script>