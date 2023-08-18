<template>
  <select class="form-select my-2" id="floatingSelect" aria-label="Floating label select example" @change="seleccionarCategoria">
    <option :value="value" selected disabled>{{ seleccionado ? seleccionado.nombre : 'Seleccionar categoria' }}</option>
    <option :value="categoria.id" v-for="categoria in categorias" :key="categoria.id">{{ categoria.nombre }}</option>
  </select>
</template>

<script>
  import axios from 'axios';

  export default {
    props: ['categoriaSeleccionada'],
    data() {
      return {
        categorias: [],
        seleccionado: null,
        value: ""
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
    },
    watch: {
      categoriaSeleccionada(data) {
        this.seleccionado = data[0].categoria;
        this.value = data[0].categoria.id;
        console.log('this.seleccionado ', this.seleccionado);
      }
    }
  };
</script>