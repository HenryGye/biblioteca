<template>
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Gestionar libro</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3">
            <div class="col-12">
              <input type="text" class="form-control" placeholder="Autor" v-model="autor">
            </div>
            <div class="col-12">
              <input type="text" class="form-control" placeholder="Nombre" v-model="nombre">
            </div>
            <div class="col-12">
              <input type="number" class="form-control" placeholder="Precio" v-model="precio">
            </div>
            <div class="col-12">
              <input type="date" class="form-control" placeholder="fecha nacimiento" v-model="fecha_lanzamiento">
            </div>
            <div class="col-md-12">
              <ConsultarLibro :categoriaSeleccionada="categoriaSeleccionada" @categoria="obtenerCategoria"/>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cerrar-modal">Cancelar</button>
          <button type="button" class="btn btn-primary" @click="guardar">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import ConsultarLibro from './ConsultarLibro.vue';
  export default {
    props: ['data'],
    components: {
      ConsultarLibro,
    },
    data() {
      return {
        id: null,
        categoria_id: null,
        autor: null,
        nombre: null,
        precio: null,
        fecha_lanzamiento: null,
        rentado: null,
        categoriaSeleccionada: null
      };
    },
    methods: {
      guardar() {
        console.log('guardar ', this.$data);
        if (this.id ===  null) {
          axios.post('http://localhost:8000/api/libro', {
            categoria_id: +this.categoria_id,
            autor: this.autor,
            nombre: this.nombre,
            precio: this.precio,
            fecha_lanzamiento: this.fecha_lanzamiento,
            rentado: true,
          })
          .then(response => {
            this.libros = response.data.libro;
            this.$emit('data-enviada');
            alert(response.data.mensaje);
            document.getElementById('cerrar-modal').click();
          })
          .catch(error => {
            console.error(error);
          });
        } else {
          axios.put(`http://localhost:8000/api/libro/${this.id}`, {
            categoria_id: +this.categoria_id,
            autor: this.autor,
            nombre: this.nombre,
            precio: this.precio,
            fecha_lanzamiento: this.fecha_lanzamiento,
            rentado: false,
          })
          .then(response => {
            this.libros = response.data.libro;
            this.$emit('data-enviada');
            alert(response.data.mensaje);
            document.getElementById('cerrar-modal').click();
          })
          .catch(error => {
            console.error(error);
          });
        }
        this.resetear();
      },
      obtenerCategoria(v) {
        this.categoria_id = v;
      },
      resetear() {
        Object.assign(this.$data, this.$options.data());
      }
    },
    watch: {
      data(data) {
        console.log('modal abierto ', data[0]);
        this.id = data[0].id;
        this.categoria_id = +data[0].categoria_id;
        this.autor = data[0].autor;
        this.nombre = data[0].nombre;
        this.precio = data[0].precio;
        this.fecha_lanzamiento = data[0].fecha_lanzamiento;
        this.categoriaSeleccionada = data;
        document.getElementById('abrir-modal').click();
      }
    }
  };
</script>