
<template>

  <div class="container-fluid">
      <br><br>  <h1>Выберите сервер:</h1> <br><br>
       <div class="row">
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
        <div class="row">
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

<div class="row">
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
        <td @click="selectkods" :id="1" :abbr="server.vk_300"> {{ server.vk_300}}</td>
         <td @click="selectkods" :id="2" :abbr="server.vk_500"> {{ server.vk_500}}</td>
           <td @click="selectkods" :id="3" :abbr="server.vk_3000"> {{ server.vk_3000}}</td>
      </tr>
      <tr   v-if="sel_darkod == 1">
        <th scope="row">Ожидание</th>
        <td @click="selectkods" :id="11" :abbr="server.vk_3001"> {{ server.vk_3001}}</td>
         <td @click="selectkods" :id="22" :abbr="server.vk_5001"> {{ server.vk_5001}}</td>
           <td @click="selectkods" :id="33" :abbr="server.vk_30001"> {{ server.vk_30001}}</td>

      </tr>


      <tr v-if="sel_darkod == 2">
        <th scope="row">Быстрая</th>
        <td @click="selectkods" :id="4" :abbr="server.vk1_300"> {{ server.vk1_300}}</td>
         <td @click="selectkods" :id="5" :abbr="server.vk2_500"> {{ server.vk2_500}}</td>
           <td @click="selectkods" :id="6" :abbr="server.vk3_3000"> {{ server.vk3_3000}}</td>
      </tr>
      <tr v-if="sel_darkod == 2">
        <th scope="row">Ожидание</th>
        <td @click="selectkods" :id="44" :abbr="server.v1_3001"> {{ server.vk1_3001}}</td>
         <td @click="selectkods" :id="55" :abbr="server.vk2_5001"> {{ server.vk2_5001}}</td>
           <td @click="selectkods" :id="66" :abbr="server.vk3_30001"> {{ server.vk3_30001}}</td>

      </tr>

    </tbody>
  </table>
  <div class="input-group mb-3">

    <input type="text" class="form-control" placeholder="Ваш игровой ник" v-model.lazy="nick_clienta">
  </div>

  <darkod-component v-show="sel_darkod == 1" :vklad="vklad" :nominal="nominal" @spisokkodov="spisokkodov"> </darkod-component>
  <daraden-component else> </daraden-component>

        </div>

<br><br>
<div class="row">

 <h2>{{ selected }}</h2>

</div>

<div class="row">
  <div
  class="h2 col-sm list-group-item list-group-item-action"
  @click="sendserver">
  Отправить заказ
 </div>


  </div>





  </div>



</template>




<script>




    export default {
      name:'games-component',   //listservers: {default: function() {return }}

      props: [
      'listservers',
     'select_game',
     'games_id',
     'sel_game'

   ],


data: function() {

return {
listgames: [],
nick_clienta: '',
select_serv: '',
servers_id: '',
sel_serv: false,
sertdar: false,
sel_darkod: 1,
server_title: 'Выберите сервер',
nominal: '',
vklad: ''

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
 this.vklad = event.target.id
 this.nominal = parseInt(event.target.abbr)
 console.log('Нажали на код' + this.vklad + ' ' + 'его стоимость ' + parseInt(event.target.abbr))

},
spisokkodov(order, nick_clienta) {
  alert(order, nick_clienta)
},

sendserver() {
  var event = {
    nick_clienta: "Michael"
  };
  var a1 = JSON.stringify(event);
  console.log(a1)
  axios.get('/order/get-jsonorder', {
    a1
  }).then((res) => {
  console.log(res.data)
}).catch((err) => {
  console.log(err)
})

}


            },


  computed: {

  selected() {

    return this.select_game + ' - ' + this.select_serv + ' - ' + this.vklad + ' - ' +  this.nick_clienta

   }
            },

  filters:  {

            },
  watch: {

  }



    }




</script>
