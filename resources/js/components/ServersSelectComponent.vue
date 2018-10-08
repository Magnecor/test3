
<template>

  <div class="container-fluid">
      <br><br>  <h1>Выберите сервер:</h1> <br><br>
       <div class="row" v-if="sel_game">
         <div class="dropdown">
   <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      {{server_title}}
   </a>
 <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">



     <a class="dropdown-item" v-if="games_id == server.games_id"
     v-for="server in listservers"
     :id="server.id"
     :title="server.title"
     @click="selectserv">   {{ server.title }}</a>

 </div>




  </div>
        </div>
  <br><br>
        <div class="row" v-if="sertdar">
          <div
          class="h2 col-sm list-group-item list-group-item-action"
          @click="selectdar" id="1">
           Хочу подарить код
         </div>
         <div
         class="h2 col-sm list-group-item list-group-item-action"
         @click="selectdar" id="2">
          Хочу подарить адену
        </div>

   </div>


    <br><br>  <h1>Выберите ваш сертификат:</h1> <br><br>

<div class="row" v-if="sel_serv">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Время активации</th>
        <th scope="col">Код 300</th>
        <th scope="col">Код 500</th>
        <th scope="col">Код 3000</th>
      </tr>
    </thead>
    <tbody
    v-for="server in listservers"
    v-if="servers_id == server.id"
    >

    <tr   v-if="sel_darkod == 1">
        <th scope="row">Быстрая</th>
        <td @click="selectkods" :id="server.vk_300" > {{ server.vk_300}}</td>
         <td @click="selectkods" :id="server.vk_500"> {{ server.vk_500}}</td>
           <td @click="selectkods" :id="server.vk_3000"> {{ server.vk_3000}}</td>
      </tr>
      <tr   v-if="sel_darkod == 1">
        <th scope="row">Ожидание</th>
        <td @click="selectkods" :id="server.vk_3001"> {{ server.vk_3001}}</td>
         <td @click="selectkods" :id="server.vk_5001"> {{ server.vk_5001}}</td>
           <td @click="selectkods" :id="server.vk_30001"> {{ server.vk_30001}}</td>

      </tr>


      <tr v-if="sel_darkod == 2">
        <th scope="row">Быстрая</th>
        <td @click="selectkods" :id="server.vk1_300" > {{ server.vk1_300}}</td>
         <td @click="selectkods" :id="server.vk2_500"> {{ server.vk2_500}}</td>
           <td @click="selectkods" :id="server.vk3_3000"> {{ server.vk3_3000}}</td>
      </tr>
      <tr v-if="sel_darkod == 2">
        <th scope="row">Ожидание</th>
        <td @click="selectkods" :id="server.vk1_3001"> {{ server.vk1_3001}}</td>
         <td @click="selectkods" :id="server.vk2_5001"> {{ server.vk2_5001}}</td>
           <td @click="selectkods" :id="server.vk3_30001"> {{ server.vk3_30001}}</td>

      </tr>

    </tbody>
  </table>


  <darkod-component v-if="sel_darkod == 1"> </darkod-component>
  <daraden-component else> </daraden-component>

        </div>

<br><br>
<div class="row">

 <h2>{{ selected }}</h2>

</div>


  </div>

</template>




<script>




    export default {
      name:'games-component',
      props: [
      'listservers',
     'select_game',
     'games_id',
     'sel_game'

   ],


data: function() {

return {
listgames: [],
select_serv: '',
select_kod: '',
servers_id: '',
sel_serv: false,
sertdar: false,
sel_darkod: '',
server_title: 'Выберите сервер'
}

},


  methods: {


selectserv(value) {
      this.select_serv = event.target.title  // присвоили название выбранной игры переменной select_game чтоб выводить вместе с игрой в selected()
      this.server_title = event.target.title
      this.servers_id = event.target.id  // присовили ид род сервера в перменную servers_id
      this.sertdar = true
      console.log(this.select_serv)
       console.log(this.servers_id)

  },


  selectdar(value) {
   if (event.target.id == 1) this.sel_darkod = 1
   else this.sel_darkod = 2
  this.sel_serv = true
   console.log(this.sel_darkod)

 },


selectkods(value) {

 this.select_kod = event.target.id
 console.log('Нажали на код' + this.select_kod)

  }


            },

  computed: {

  selected() {

    return this.select_game + ' - ' + this.select_serv + ' - ' + this.select_kod

   }
            },

  filters:  {

            },
  watch: {

  }



    }




</script>
