<template>
  <div class="form-group">
    <label>Selecione a categoria do GuiaLocaliza</label>
    <button v-on:click.stop.prevent="updateCombo">Atualizar Combo</button>
    <select class="form-control select2" required name="category_gl" style="width: 100%;">
      <option selected="selected" value="">Selecione</option>
      <option v-for="option in options" v-bind:value="option.id">
        {{ option.name }}
      </option>
    </select>
  </div>
</template>

<script>
  export default {

    data() {
      return {
        options : []
      }
    },
    methods: {

      updateCombo: function (event) {


        let self = this;
        self.options = [];

        axios.get('/get/categories')
          .then(function (response) {
            self.options = response.data;
          })
          .catch(function (error) {
            console.log(error);
          });



      }      
        
    },
    created(){

      let self = this;

      axios.get('/get/categories')
        .then(function (response) {
          self.options = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });

    },
    mounted() {

      jQuery( document ).ready(function() {
          jQuery('.select2').select2();        
      });
        
    }
  }
</script>
