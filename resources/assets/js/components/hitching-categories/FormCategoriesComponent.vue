<template>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Categorias Rastreios</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post" action="/post/category">
      <div class="box-body">        
        <CategoriesTracking />
        <CategoriesGL class="marginTop" />
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Atrelar Categoria</button>
      </div>
      <input type="hidden" name="_token" id="csrf-token" v-bind:value="csrf_token" />

    </form>
  </div>
</template>

<script>

  let CategoriesGL = require('./CategoriesGuiaLocalizaComponent.vue')
  let CategoriesTracking = require('./CategoriesTrackingComponent.vue')

  export default {
    components: {
      CategoriesGL,
      CategoriesTracking
    },
    data() {
      return {
        csrf_token: ''
      }
    },
    mounted() {
      let token = document.head.querySelector('meta[name="csrf-token"]');
      this.csrf_token = token.content;      

    }
  }
</script>

<style scoped>
  .marginTop {
    margin-top: 20px;
  }
</style>
