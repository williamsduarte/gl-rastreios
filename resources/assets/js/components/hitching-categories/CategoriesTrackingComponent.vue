<template>
  <div>
     <div class="form-group">
        <h3>Categorias: teste</h3>
      </div>
      <div class="form-group">
        <p class="help-block">Subcategorias: teste</p>
      </div>
  </div>
</template>

<script>
  export default {

    data() {
      return {
        options : []
      }
    },
    created() {

      let self = this;

      // axios.get('/get/categories')
      //   .then(function (response) {
      //     self.options = response.data;
      //   })
      //   .catch(function (error) {
      //     console.log(error);
      //   });
        
    },
    mounted() {
         
    }
  }
</script>
