
<template>

  <div class="container-fluid">
   


    <h1 >Выберите игру:</h1> <br><br>
      <div class="row">
        <div
        class="h2 col-sm list-group-item list-group-item-action"
        :id="game.id"
        :title="game.title"
         v-for="game in listgames"
         @click="selectgame">


         {{ game.title }}
       </div>

     <serversselect-component :select_game="select_game" :games_id="games_id" :sel_game="sel_game" :listservers="listservers"></serversselect-component>

        </div>




  </div>

</template>




<script>




export default {



data: function() {

return {
listgames: [],
listservers: [],
select_game: '',
games_id: '',
sel_game: false,

}

},
created() {
    this.getGames();
  },

  methods: {
    getGames() {
      axios.get('/start/get-jsongames')
        .then(response => {
          this.listgames = response.data;
          console.log(response)
        })
        axios.get('/start/get-jsonserv')
          .then(response => {
            this.listservers = response.data;
            console.log(response)
          })

    },
selectgame(value) {
      this.select_game = event.target.title  // присвоили название выбранной игры переменной select_game чтоб выводить вместе с игрой в selected()
      this.games_id = event.target.id  // присовили ид игры в перменную games_id
      this.sel_game = true

    },



            },

  computed: {


            },

  filters:  {

            },
  watch: {

  }



    }




</script>
