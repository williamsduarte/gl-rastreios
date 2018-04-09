<template>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Total de categorias já atreladas: <strong>{{ done }}</strong> de 1374</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="post" action="/post/category">
    <div class="box-body">
      <CategoriesTracking @totalDone="done = $event" />
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
      csrf_token: '',
      done: 0
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
