<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        Фильтры
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <input type="text" v-model="name" placeholder="По имени" class="form-control">
                                </div>
                                <div class="row">
                                    <input type="text" v-model="population" placeholder="Население >" class="form-control">
                                </div>
                                <div class="row">
                                    <input type="checkbox" v-model="indep" class="form-check-input" > Независимая территория
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary" @click="filter">Поиск</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Поиск
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4" v-for="country in result">
                                    <div class="card">
                                        <div class="card-header">
                                            {{country.Name}}
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                Насаеление: {{country.Population}}
                                            </div>
                                            <div class="row">
                                                Назависимая территория :<h6 v-if="country.IndepYear == null">Нет</h6>
                                                                        <h6 v-else>{{country.IndepYear}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data:function(){
            return{
                name: '',
                population: '',
                indep: false,
                result: []
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
          filter: function () {
              axios({
                  method:'POST',
                  url:'/filter/abstruct_filter',
                  params:{name : this.name, population: this.population, indep : this.indep}
              }).then(response =>{
                  this.result = response.data;
                  console.log(this.result.data[1].Name);
              })
          }
        }
    }
</script>
