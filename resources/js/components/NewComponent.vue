``
<template>

  <div class="container">
      <div class="row">


          <div class="col-md-12">
            <h1> {{ name }}</h1>
          <h2> {{userInfo}}</h2>
      <a :href="url">link</a>
      <button type="button" name="button" @click="changeName">Сменить имя</button>
   <br> <hr>
   Add book: <input v-model="currentBook" type="text" name="" value=""> <button @click="addBook" type="button" name="button">Add book</button>
      <br>
      <br>
    <div v-if="books.length > 0">   Появились книги
        <ul>
          <li v-for="book in books"> {{book}}</li>
        </ul>
      </div>

          </div>
      </div>

  </div>

</template>




<script>




    export default {

data: function() {

return {
    url: 'http://google.com',
    name: 'Max',
    age: 33,
    currentBook: 'Vuejs book',
    books: []

}

},


  methods: {
    changeName() {
      this.name = 'Nick'
    },

    addBook()   {
      this.books.push(this.currentBook);
    }


            },

  computed: {
       userInfo() {
         return this.name + "is" + this.age;
       }

            },

  filters:  {

            },
  watch: {
    name() {
      if (this.name = 'Nick') alert(this.name)
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
