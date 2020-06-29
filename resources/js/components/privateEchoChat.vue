<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Супер чат</div>
                    <div class="card-body">
                        <div class="row">
                            <textarea class="form-control" rows="10" readonly>{{messages.join('\n')}}</textarea>
                        </div>
                        <div class="row">
                            <input type="text" class="form-control" v-model="sendMes" @keyup.enter="sendMessage">
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
                messages: [],
                sendMes: '',
            }
        },
        mounted() {
            window.Echo.private('room.2')
                .listen('PrivateEchoChat',({data})=>{
                    this.messages.push(data.message);
                    console.log(data);
                });
            console.log('Component mounted.')
        },
        methods:{
            sendMessage:function () {
                axios.post('/vue/privateEcho-send',{message: this.sendMes, room_id:2});
                this.messages.push(this.sendMes);
                this.sendMes = '';
            }
        }
    }
</script>
