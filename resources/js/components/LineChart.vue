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
            }
        },
        mounted(){
            this.update()
        },
        methods:{
            update:function () {
                axios.get('/vue/chartAjax/get').then(response =>{
                    this.data = response.data;
                });
            }
        }

    }
</script>
