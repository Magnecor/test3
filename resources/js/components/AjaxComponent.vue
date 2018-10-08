``
<template>

  <div class="container">
      <div class="row">


          <div class="col-md-12">

            <p><input type="text" v-model="newmess"></p>
                  <p>{{ newmess }}</p> <hr>
       <hr>
            <prob-component :msg="newmess" @messChange="newmess = $event"></prob-component>   <hr>


         <hr>
        <div class="h1" @mouseover="changetext">
        <p>{{ text }}</p>
        <p :class="styleCSS">Цвет:{{ styleCSS}}</p>
        <input type="text" v-on:input="styleCSS = $event.target.value">
        </div>

            <table class="table">
              <thead>
                <tr>
                  <th @click="title='Новый вариант по клику'">{{ title }}</th>
                  <th @mouseover="sort='Навели мышку'">{{ sort }}</th>

                </tr>  <hr>
                <p v-if="show">Текст который мы будем скрывать</p>
                <p v-else> {{ showMess}}</p>
                <p v-show="show">Текст скрывается, но не удалется из DOM</p>
                  <button type="button" @click="show =!show">Показать Скрыть</button>
                <hr>
                  <p v-show="show">{{ message | lowercase }}</p>
                <ul>
                  <li v-for="(games, i) in ajaxgames">{{i}} - {{ games.title }}</li>
                </ul>  <hr>


                <input type="number" v-on:input="increment ($event.target.value)">
                <p>{{ value }}</p>
                <p><input type="number" :value="doubleValue"></p>
                <p>{{ newValue }}</p>



              </thead>

            <tbody>
              <tr v-for="games in ajaxgames" :value="games.id" :key="games.id">
                <td>{{games.title}}</td>
                <td>{{games.sort}}</td>

              </tr>
              <tr v-for="servers in ajaxservers" :value="servers.id">
                <td>{{servers.title}}</td>
                <td>{{servers.sort}}</td>
              </tr>
            </tbody>

            </table>
          </div>
      </div>

  </div>

</template>




<script>




    export default {
name:'ajax-component',

data: function() {

return {

  title:'Название игры',
  sort:'Сортировка',
  text:'Тут будет меняться текст',
  styleCSS: '',
  value: 1,
  doubleValue: 1,
  show:true,
  message: 'helloVV ',
  mess: '',
  newmess: 'Передача в другой компонент',
  ajaxgames: [],
  ajaxservers: []
}

},
created() {
    this.getAllPosts();
  },

  methods: {
    getAllPosts() {
      axios.get('/start/get-json')
        .then(response => {
          this.ajaxgames = response.data;
          console.log(response)
        })

        axios.get('/start/get-jsonserv')
          .then(response => {
            this.ajaxservers = response.data;
            console.log(response)
          })

    },
    changetext () {
       this.text = 'Изменяем текс из функции changetext'
    },

    increment (value) {
          this.value = value
          this.doubleValue = value * 2
          if (value = 6) alert('Число 6')
    }




  },

  computed: {
    newValue () {
      return this.value * 3

    },
    showMess () {
    return this.message.toUpperCase ();

    }


  },

  filters: {
    lowercase (value) {
      return value.toLowerCase ()
    }
  }





    }




</script>











mounted() {
    this.update()
},
methods: {
  update: function() {
    this.is_refresh = true
axios.get('/start/get-json').then((response
) => {

console.log(response)
this.ajaxgames = response.data
this.is_refresh = false
this.id++

});

  }
}
