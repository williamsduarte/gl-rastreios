<template>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Refatoração de Categorias Atreladas</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Categorias Atreladas</th>
          <th>Categorias do Guia Localiza</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody v-for="subcat in subcatArray">
        <tr v-bind:data-js="subcat.id">
          <td>{{ subcat.name }}</td>
          <td v-if="subcat.catguia">{{ subcat.catguia.name }}</td>
          <td v-else>...</td>
          </td>
          <td>
            <i class="fa fa-thumbs-up fa-2x text-success" @click="fncSuccess(subcat)" title="OK!"></i>
            <i class="fa fa-thumbs-down fa-2x text-danger" @click="fncRefactory(subcat)" title="Refazer!"></i>
          </td>
        </tr>
      </tbody>

    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</template>

<script>
export default {

  data() {
    return {
      csrf_token: '',
      done: 0,
      subcatArray: []
    }
  },
  methods: {

    updateCombo: () => {

      this.options = [];
      this.getCategories(this)

    },
    getCategories: (self) => {

      axios.get('/get/subcategories/refactory')
        .then(function (response) {
          self.subcatArray = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    fncSuccess: (sub) => {
      if (confirm(`Confirma a CONCLUSÃO para ${sub.name}?`)) {

        $('[data-js="' + sub.id + '"]').fadeToggle('1000', function () {

          axios.post('/post/subcategories/refactory', {
              id: sub.id,
              done: 2
            })
            .then(function (response) {
              console.log('conclusão: ' + id)
              $(this).hide()
            })
            .catch(function (error) {
              console.log(error);
            });

        });

      }

    },
    fncRefactory: (sub) => {
      if (confirm(`Confirma a REFATORACÃO para ${sub.name}?`)) {

        $('[data-js="' + sub.id + '"]').fadeToggle('1000', function () {

          axios.post('/post/subcategories/refactory', {
              id: sub.id,
              done: 0
            })
            .then(function (response) {
              console.log('Refatoração: ' + sub.id)
              $(this).hide()
            })
            .catch(function (error) {
              console.log(error);
            });

        });

      }
    }

  },
  created() {

    this.getCategories(this)

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

i.fa {
  cursor: pointer;
}
</style>
