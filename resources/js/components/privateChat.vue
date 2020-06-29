<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Чат</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <select id="" class="form-control" v-model="userSelect" multiple>
                                    <option v-for="user in users" :value="'private-channel.' + user.id">{{user.email}}</option>
                                </select>
                            </div>
                            <div class="col-sm-8">
                                <textarea class="form-control" style="width: 100%; height: 200px">{{messages.join('\n')}}</textarea>
                            </div>
                        </div>
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
                userSelect: [],
                users: [],
            }
        },
        mounted() {
            var socket = io('http://study.ru:3000');
            socket.on('private-channel.'+ this.user.id +':App\\Events\\PrivateChat',function (data) {
                this.messages.push(data.data.login+':'+data.data.message);
                console.log(data.data.login);
            }.bind(this));
            this.userList();
        },
        props:[
            'user'
        ],
        methods:{
            sendMessage:function () {
                if(this.userSelect.length == 0){
                    alert('Выберите пользователя');
                    return false;
                }
                axios({
                    method:'get',
                    url:'/vue/privateChatSend',
                    params:{channels: this.userSelect, login: this.user.email, message: this.sendMes},
                }).then(response =>{
                    this.messages.push(this.user.email+':'+this.sendMes);
                    this.sendMes ='';
                    // this.messages.push(response.message);
                })
            },
            userList: function () {
                axios.get('/users').then(response =>{
                    this.users = response.data;
                })
            }
        }
    }
</script>
