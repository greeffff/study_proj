<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Принимаем значения Ajax (axios)</div>

                    <div class="card-body">
                        <button :class="{ 'btn-success' : is_refresh, 'btn-primary' : !is_refresh}" class="btn" @click="update">Обновить {{id}}</button>
                        <span class="badge badge-primary mb-1" v-if="is_refresh"></span>
                        <table class="table">
                            <thead>
                                <th>Наименоание</th>
                                <th>URL</th>
                            </thead>
                            <tbody>
                                <tr v-for="data in ajaxSend">
                                    <td>{{data.title}}</td>
                                    <td>{{data.url}}</td>
                                </tr>
                            </tbody>
                        </table>
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
                ajaxSend: [],
                is_refresh: false,
                id: 0,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            update:function () {
                this.is_refresh = true;
                axios.get('/vue/sendDataAjax/get').then(response =>{
                    this.ajaxSend = response.data;
                    this.is_refresh = false;
                    this.id++;
                });
            }
        }

    }
</script>
