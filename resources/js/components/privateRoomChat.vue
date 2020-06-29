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
                            <input type="text" class="form-control" v-model="sendMes" @keyup.enter="sendMessage" @keydown="typingEvent">
                            <span v-if="isActive">{{isActive.name}} набирает сообщение</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
          'room','user',
        ],
        data:function(){
            return{
                messages: [],
                sendMes: '',
                isActive: false,
                typingTimer:false,
            }
        },
        computed:{
          channel(){
              return window.Echo.private('room.' + this.room.id);
          }
        },
        mounted() {
            this.channel
                .listen('PrivateEchoChat',({data})=>{
                    this.messages.push(data.message);
                    this.isActive = false;
                    console.log(data);
                }).listenForWhisper('typing',(e)=>{
                    this.isActive = e;
                    if(this.typingTimer) clearTimeout(this.typingTimer);
                    this.typingTimer = setTimeout(() => {
                        this.isActive = false;
                    },2000);
            });
            console.log('Component mounted.')
        },
        methods:{
            sendMessage:function () {
                axios.post('/vue/privateEcho-send',{message: this.sendMes, room_id: this.room.id});
                this.messages.push(this.sendMes);
                this.sendMes = '';
            },
            typingEvent:function () {
                this.channel.whisper('typing',{
                    name: this.user.name
                });
            }
        }
    }
</script>
