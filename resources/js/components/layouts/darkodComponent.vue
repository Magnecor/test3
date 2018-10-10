
<template>
  <div class="row">
    <div class="alert alert-success" role="alert">
      {{ itog }}
    </div>


  <div class="input-group mb-3">
  <input type="text" class="form-control" v-model="sert_title" placeholder="Введите подарочный код">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" id="" @click="addSert">Добавить</button>
  </div>
</div>
<h2>Добавленные коды:</h2>
<div class="input-group mb-3" v-for="(sert, index) in serts" :id="index">
  <div class="input-group-prepend">
   <label class="input-group-text">{{ vklad_save[index] }}</label>
 </div>
 <div class="input-group-prepend">
  <label class="input-group-text">{{ nominal_save[index] }}</label>
</div>
<input type="text" class="form-control" :value="sert" :placeholder="sert" readonly >
<div class="input-group-append">
  <button class="btn btn-outline-secondary" type="button" :id="index" @click="delsert">Удалить</button>
</div>
</div>

  </div>


</div>
</template>




<script>




    export default {

      props: [
    'vklad',
    'nominal'
   ],


data: function() {

return {
sert_title: '',
serts: [],
vklad_save: [],
nominal_save: [],
summa: '',
order: []
}

},
created() {

  },

  methods: {
    addSert() {
  this.order.push(this.vklad, this.sert_title, this.nominal)
  this.vklad_save.push(this.vklad)
  this.serts.push(this.sert_title)
  this.nominal_save.push(this.nominal)
  this.$emit('spisokkodov', this.order);
  console.log(this.serts)
  console.log(this.vklad_save)
  console.log(this.nominal_save)
  console.log(this.order)


},
delsert()
{
  this.serts.splice(event.target.id, 1);
  this.vklad_save.splice(event.target.id, 1);
  this.nominal_save.splice(event.target.id, 1);
  this.order.splice((event.target.id * 3), 3);
  this.$emit('spisokkodov', this.order);
  console.log(this.serts)
  console.log(this.vklad_save)
  console.log(this.nominal_save)
  console.log(this.order)

}





            },

  computed: {
itog() {
  var summ = 0;
for(var i = 0; i < this.nominal_save.length; i++){
    summ += this.nominal_save[i];
}
  return summ
}


            },

  filters:  {

            },
  watch: {

  }



    }




</script>
