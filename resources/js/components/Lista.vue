<template>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Categoria</th>
      <th scope="col">Autor</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Fecha Lanzamiento</th>
      <th scope="col">Disponibilidad</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="libro in libros" :key="libro.id">
      <td>{{ libro.categoria.nombre }}</td>
      <td>{{ libro.autor }}</td>
      <td>{{ libro.nombre }}</td>
      <td>{{ libro.precio }}</td>
      <td>{{ libro.fecha_lanzamiento }}</td>
      <td>{{ libro.rentado ? 'Disponible' : 'No disponible' }}</td>
      <td>
        <button type="button" class="btn btn-success me-1" @click="editar(libro.id)">Editar</button>
        <button type="button" class="btn btn-danger me-1" @click="eliminar(libro.id)">Eliminar</button>
        </td>
    </tr>
  </tbody>
</table>
</template>

<script>
  import axios from 'axios';

  export default {
    props: ['categoria', 'actualizar'],
    data() {
      return {
        libros: [],
      };
    },
    created() {
      this.listarLibros();
      console.log('categoria ' , this.seleccionarCategoria);
    },
    methods: {
      listarLibros() {
        axios.get('http://localhost:8000/api/libro')
          .then(response => {
            this.libros = response.data;
            console.log(this.libros);
          })
          .catch(error => {
            console.error(error);
          });
      },
      listarLibrosPorCategoria(id) {
        axios.get('http://localhost:8000/api/listar-libros-disponibles', {
            params: {
              categoria_id: id
            }
          })
          .then(response => {
            this.libros = response.data.data;
            console.log('response ', this.libros);
          })
          .catch(error => {
            console.error(error);
          });
      },
      editar(id) {
        let libro = this.libros.filter(e => e.id === id);
        this.$emit('data-libro', libro);
      },
      eliminar(id) {
        axios.delete(`http://localhost:8000/api/libro/${id}`)
          .then(response => {
            this.listarLibros();
            alert(response.data.mensaje);
          })
          .catch(error => {
            console.error(error);
          });
      }
    },
    watch: {
      categoria(id) {
        this.listarLibrosPorCategoria(id);
        console.log('categoria actualizada: ', id);
      },
      actualizar(val) {
        if (val) {
          this.listarLibros();
        }
      }
    }
  };
</script>