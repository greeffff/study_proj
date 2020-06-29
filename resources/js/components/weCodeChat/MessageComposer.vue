<template>
    <div class="composer">
        <textarea v-model="message" @keydown.enter="send" placeholder="Enter message..."></textarea>
    </div>
</template>

<script>
    export default {
        data:function(){
            return{
                message: '',
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
          send:function () {
              if(this.message ===''){
                  return 0;
              }
              this.$emit('send',this.message);
              this.message = '';
          }
        },
    }
</script>
<style lang="scss" scoped>
    .composer textarea {
        width: 96%;
        margin: 10px;
        resize: none;
        border-radius: 3px;
        border: 1px solid lightgray;
        padding: 6px;
    }
</style>
