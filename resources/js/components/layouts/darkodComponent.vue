
<template>
  <div class="row">
    <div class="alert alert-success" role="alert">
      {{ itog }}
    </div>

  <div class="input-group mb-3">

    <input type="text" class="form-control" placeholder="Ваш игровой ник" v-model="nick_clienta">
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
nick_clienta: '',
sert_title: '',
serts: [],
vklad_save: [],
nominal_save: [],
summa: ''
}

},
created() {

  },

  methods: {
    addSert() {
  this.vklad_save.push(this.vklad)
  this.serts.push(this.sert_title)
  this.nominal_save.push(this.nominal)
  console.log(this.serts)
  console.log(this.vklad_save)
  console.log(this.nominal_save)

},
delsert()
{
  this.serts.splice(event.target.id, 1);
  this.vklad_save.splice(event.target.id, 1);
  this.nominal_save.splice(event.target.id, 1);

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
