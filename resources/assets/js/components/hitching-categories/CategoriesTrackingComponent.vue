<template>
  <div>
     <div class="form-group">
        <h3>Categorias: {{ category.name }}</h3>
      </div>
      <div class="form-group">
        <p class="help-block">Subcategorias:                 
          <ul>
            <li v-for="subcategory in subcategories">{{ subcategory.name }}</li>
          </ul>          
          </p>
      </div>
  </div>
</template>

<script>
  export default {

    data() {
      return {
        category: [],
        subcategories: []
      }
    },
    created() {

      let self = this;

      axios.get('/get/category/tracking')
        .then(function (response) {
          self.category = response.data;
          self.subcategories = response.data.subcategories;
        })
        .catch(function (error) {
          console.log(error);
        });
        
    },
    methods: {
      agroupSubcategory() {

        console.log(this.subcategories);

        let subsPush = [];
        subsPush.push( this.subcategories.name );

        return subsPush;
      }
    },
    mounted() {
         //console.log(this.subcategories);
    }
  }
</script>
