
<template>

  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <input type="text" :value="msg" @input="changeMess">мы это видим
            <h1> {{ mess}}</h1>
            <table class="table">
              <thead>
                <tr>
                  <th>Наименование</th>
                  <th>ЮРЛ</th>

                </tr>
              </thead>
            <tbody>
              <tr v-for="games in vuegames">
                <td>{{games.title}}</td>
                <td>{{games.sort}}</td>

              </tr>
            </tbody>

            </table>
          </div>
      </div>
  </div>
</template>




<script>
    export default {
      props: [
        'vuegames',
        'vueservers',
        'msg'
      ],

      data: function() {

      return {

        mess: ''

      }
},

        mounted() {
            this.update()
        },
        methods: {
          update: function() {
            console.log(this.vuegames);
            console.log(this.vueservers);
          },

          changeMess (event)
          {
            this.mess = event.target.value;
            this.$emit('messChange', this.mess)
          }
        }



    }




</script>
