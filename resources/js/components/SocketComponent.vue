``
<template>

  <div class="container">
      <div class="row">

          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th>Наименование</th>
                  <th>ЮРЛ</th>

                </tr>
              </thead>
            <tbody>
              <tr v-for="games in data">
                <td>{{games.title}}</td>
                <td>{{games.sort}}</td>

              </tr>

            </tbody>

            </table>
             <input type="checkbox" v-model="realtime">realtime
             <input type="text" v-model="title">
             <input type="text" v-model="sale">
             <button @click="sendData"></button>
          </div>
      </div>
  </div>
</template>




<script>

    export default {
      data: function() {
return {
  data: [],
  realtime:false,
  title: "",
  sale:500
}

},

  mounted() {
    var socket = io('http://test2:3000');

    socket.on("news-action:App\\Events\\NewEvent", function(data) {
      this.data = data.result;
    }.bind(this));
      this.update()
  },
  methods: {
    update: function() {

  axios.get('/start/socket-chart').then((response
  ) => {

  console.log(response)
  this.ajaxgames = response.data


  });

},

sendData: function() {

  axios({
    method: 'get',
    url: '/start/socket-chart',
    params: {title: this.title, sale: this.sale, realtime: this.realtime}
  }).then((response
  ) => {

  console.log(response)
  this.ajaxgames = response.data


  });
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
