<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Чат</div>
                    <div class="card-body">
                        <textarea class="form-control" style="width: 100%; height: 500px">{{messages.join('\n')}}</textarea>
                        <div class="row">
                            <div class="form-group">
                        <input type="text" v-model="login" class="form-control">
                        <input type="text" v-model="sendMes" class="form-control">
                        </div>
                        </div>
                        <div class="row">
                            <button @click="sendMessage" class="btn btn-success">Отправить</button>
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
            return {
                login: '',
                sendMes: '',
                messages: [],
            }
        },
        mounted() {
            var socket = io('http://study.ru:3000');
            socket.on('chart-channel:App\\Events\\NewMessage',function (data) {
                this.messages.push(data.user+':'+data.message);
            }.bind(this));
        },
        methods:{
            sendMessage:function () {
                axios({
                    method:'get',
                    url:'/vue/chat/sendMessage',
                    params:{login: this.login, message: this.sendMes},
                }).then(response =>{
                    this.sendMes ='';
                    // this.messages.push(response.message);
                })
            }
        }
    }
</script>
