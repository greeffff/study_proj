<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Динамичные графики chartjs vue-chartjs</div>
                    <div class="card-body">
                        <line-chart
                            :chart-data="data" :height="100"
                            :options="{responsive: true, maintainAspectRation: true}"
                        ></line-chart>
                        <input type="checkbox" v-model="realtime"> realtime
                        <input type="text" v-model="label">
                        <input type="text" v-model="sale">
                        <button @click="sendData" class="btn btn-success">send data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LineChart from './LineChart'
    export default {
        components:{
            LineChart,
        },
        data:function(){
            return{
                data: [],
                realtime: false,
                label: '',
                sale: 500,
            }
        },
        mounted(){
            var socket = io('http://study.ru:3000');
            socket.on('chart-channel:App\\Events\\RealTimeChartEvent',function (data) {
                this.data = data.result; // т.к в Events public $result;
            }.bind(this));
            // this.update()
        },
        methods:{
            // update:function () {
            //     axios.get('/vue/chartSocket/get').then(response =>{
            //         this.data = response.data;
            //     });
            // },
            sendData:function () {
                axios({
                    method:'get',
                    url:'/vue/chartSocket/get',
                    params:{label:this.label, sale:this.sale, realtime:this.realtime}
                }).then(response =>{
                    this.data = response.data;
                });
            }
        }

    }
</script>
