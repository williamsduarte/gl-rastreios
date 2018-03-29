<template>
  <div class="form-group">
    <h1>{{ subcategory.name }}</h1>
    <h4>Categoria principal: <strong>{{ category.name }}</strong> </h4>
    <input type="hidden" name="subcategory_id" v-bind:value="subcategory_id">
    <input type="hidden" name="category_id" v-bind:value="category_id">

  </div>
</template>

<script>
  export default {

    data() {
      return {
        category: [],
        subcategory: [],
        category_id: '',
        subcategory_id: ''
      }
    },
    created() {

      let self = this;

      axios.get('/get/subcategory/tracking')
        .then(function (response) {
          
          self.subcategory = response.data;
          self.subcategory_id = response.data.id;

          self.category = response.data.category;
          self.category_id = response.data.category.id;

        })
        .catch(function (error) {
          console.log(error);
        });      

    },  
    mounted() {
         //console.log(this.subcategories);
    }
  }
</script>
