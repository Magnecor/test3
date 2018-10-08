``
<template>

  <div class="container">
      <div class="row">


          <div class="well">
 <form>
   <div class="form-group">
     <label for="firstname">first name</label>
     <input type="text" class="form-control" id="firstname" placeholder="firstname" v-model="formData.firstname">

   </div>
   <div class="form-group">
     <label for="lasttname">first name</label>
     <input type="text" class="form-control" id="lastname" placeholder="lastname" v-model="formData.lastname">

   </div>
   <div class="form-group">
     <label for="url">Blog</label>
     <input type="text" class="form-control" id="url" placeholder="url" v-model="formData.url">

   </div>
   <div class="form-group">
     <label for="badge">badge personal</label>
    <textarea name="name" id="badge" rows="6" cols="100" v-model="formData.badge"></textarea>

   </div>
   <div class="form-group">
     <label for="book">book</label>
     <input type="text" class="form-control" id="book" placeholder="book" v-model="formData.bookisbn">

   </div>
   <div class="form-group">
     <label for="techno">Techno</label>
     <input type="text" class="form-control" id="techno" placeholder="techno" v-model="formData.technologies">

   </div>
<button type="submit" class="btn btn-default" @click.prevent="submit">
  submit
</button>

 </form>

 <div class="well" v-if="showDetails">
   <h3>Dear {{ fullname }}</h3>
   <p v-html="formData.badge"></p>
    <p>My blog is <a class="" :href="formData.url">here</a></p>
   <div v-if="loading">Данные загружаются </div>
   <div v-else-if="!loading">
     <p>
        <h4>My favourite book {{ book.title }} </h4>
        <img :src="book.url" alt="">
      </p>
   </div>
    <p>
      My Techno
      <ul>
        <li v-for="tech in mytechno">{{ tech }}</li>
      </ul>
    </p>
 </div>
 <div class="well" v-else>
   <h3>Нажми кнопку чтоб показать результаты</h3>

 </div>
          </div>
      </div>

  </div>

</template>




<script>




    export default {

data: function() {

return {
    formData: {
    firstname: '',
    lastname: '',
    url: "http://",
    badge: "",
    bookisbn: "",
    technologies: ""

  },
   showDetails:false,
   book: {
     title: [],
     url: ""
   },
   loading:true,
   errored: false

}

},


  methods: {
  submit() {
    this.showDetails = true
  }


            },

  computed: {
     fullname() {

       return this.formData.firstname + ' ' + this.formData.lastname
     },
     mytechno() {
       return this.formData.technologies.split(',');
     }

            },

  filters:  {

            },
  watch: {
   "formData.bookisbn": function () {
     axios.get('/start/get-json')
       .then(response => {
         this.book.title = response.data
         console.log(this.book.title)
       }).
         catch(error => {
        console.log(error);
        this.errored = true;
        })
         .finally(() => (this.loading = false));



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
