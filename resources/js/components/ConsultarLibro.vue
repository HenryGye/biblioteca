<template>
  <div class="form-floating w-100">
  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" @change="seleccionarCategoria">
    <option value selected disabled>Seleccionar categoria</option>
    <option :value="categoria.id" v-for="categoria in categorias" :key="categoria.id">{{ categoria.nombre }}</option>
  </select>
</div>
</template>

<script>
  import axios from 'axios';

  export default {
    data() {
      return {
        categorias: []
      };
    },
    created() {
      this.listarCategorias();
    },
    methods: {
      listarCategorias() {
        axios.get('http://localhost:8000/api/categoria')
          .then(response => {
            this.categorias = response.data;
            console.log(this.listarCategorias);
          })
          .catch(error => {
            console.error(error);
          });
      },
      seleccionarCategoria(e) {
        this.$emit('categoria', e.target.value);
      }
    }
  };
</script>