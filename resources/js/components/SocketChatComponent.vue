``
<template>

    <div class="container">
      <div class="row">
     <div class="from-group">
       <textarea rows="8" readonly="" class="form-control">{{dataMessages.join('n')}}</textarea>
     </div>
     <div class="input-group mb-3">
       <input type="text" class="form-control" v-model="message">
       <div class="input-group-append">
         <button @click="sendMessage" class="btn" type="button">Отправить</button>

       </div>

     </div>




    </div>
  </div>
</template>




<script>

    export default {
      data: function() {
return {
 dataMessages: [],
 message: "",
}

},

  mounted() {
    var socket = io('http://test2:3000');

    socket.on("news-action:App\\Events\\NewMessage", function(data) {
      this.dataMessages.push(data.message);
    }.bind(this));

  },
  methods: {
  sendMessage: function() {

    axios({
      method: 'get',
      url: '/start/send-message',
      params: {message: this.message}
    })
    .then((response) => {
    this.message = "";

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
