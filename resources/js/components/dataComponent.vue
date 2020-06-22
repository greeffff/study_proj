<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Вывод входящих данных</div>

                    <div class="card-body">
                        <button class="btn btn-success" @click="output_many">Вывести полученные (Массив)</button>
                        <button class="btn btn-success" @click="output">Вывести полученные (Одиночные)</button>
                        <table class="table table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Email</th>
                            </thead>
                            <tbody>
                            <!-- если массив -->
                            <tr v-for="data in arraySend">
                                <td>{{data.id}}</td>
                                <td>{{data.name}}</td>
                                <td>{{data.email}}</td>
                            </tr>
                            <tr>
                                <td>{{dataSend.id}}</td>
                                <td>{{dataSend.name}}</td>
                                <td>{{dataSend.email}}</td>
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
        props:[
            'urldata',
            'arraydata'
        ],
        data(){
            return {
                dataSend: [],
                arraySend: [],
            }
        },
        methods:{
            output: function () {
                this.dataSend = this.urldata;
                console.log(this.dataSend)
            },
            output_many: function () {
                this.arraySend = this.arraydata;
            }
        }

    }
</script>
