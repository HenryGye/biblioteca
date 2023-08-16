<template>
  <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1 w-100">Gestión libros</span>
    <div class="w-100"><button type="button" class="btn btn-primary m-2">Crear</button></div>
    <ConsultarLibro @categoria="obtenerCategoria"/>
    <Lista :categoria="categoria" />
  </div>  
</nav>
</template>

<script>
import Lista from './Lista.vue';
import ConsultarLibro from './ConsultarLibro.vue';

export default {
  components: {
    Lista,
    ConsultarLibro
  },
  data() {
    return {
      categoria: null
    };
  },
  methods: {
    obtenerCategoria(v) {
      this.categoria = v;
    }
  }
};
</script>