<template>
<div class="form-group">
  <h4>Categoria: <strong>{{ category.name }}</strong> </h4>
  <h1><span style="font-size:18px;"> Atrelar por: </span><span style="color: #d31717">{{ subcategory.name }}</span></h1>
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
      subcategory_id: '',
      total: ''
    }
  },
  methods: {

    totalData(self) {

      axios.get('/get/subcategory/total')
        .then(function (response) {
          self.$emit('totalDone', response.data);
        })
        .catch(function (error) {
          console.log(error);
        });

    },

    listAll(self) {

      axios.get('/get/subcategory/tracking')
        .then(function (response) {

          self.subcategory = response.data;
          self.subcategory_id = response.data.id;
          if(response.data.category) {
            self.category = response.data.category;
            self.category_id = response.data.category.id;
          }          

        })
        .catch(function (error) {
          console.log(error);
        });
    }

  },
  created() {
    this.totalData(this);
    this.listAll(this);
  },
  mounted() {
    //console.log(this.subcategories);
  }
}
</script>
