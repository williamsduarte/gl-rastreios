<template>
  <div class="form-group">
    <h1>{{ subcategory.name }}</h1>
    <h4>Categoria principal: <strong>{{ category.name }}</strong> </h4>
  </div>
</template>

<script>
  export default {

    data() {
      return {
        category: [],
        subcategory: []
      }
    },
    created() {

      let self = this;

      axios.get('/get/subcategory/tracking')
        .then(function (response) {
          self.subcategory = response.data;
          self.category = response.data.category;
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
