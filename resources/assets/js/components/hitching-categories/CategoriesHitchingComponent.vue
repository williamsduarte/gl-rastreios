<template>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Categorias Rastreios</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
      <div class="box-body">        
        <CategoriesTracking />
        <CategoriesGL />
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Atrelar Categoria</button>
      </div>
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
    }
  }
</script>
