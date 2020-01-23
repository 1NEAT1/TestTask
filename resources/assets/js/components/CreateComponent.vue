<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Введите любые данные для отправки</div>
                    <div class="panel-body">
                        <div class="alert alert-success" role="alert" v-if="this.success">
                            Ваш ключ: <a :href="'/show/key=' + url">{{ url }}</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="form-group">
                                <input class="form-control" v-model="data" v-model.trim="data" placeholder="Данные">
                                <span class="text-danger" v-if="errors.data">{{ errors.data[0] }}</span>
                            </div>
                            <button @click.prevent="addData()" class="form-control mt">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return{
                data: '',
                success: false,
                url: '',
                errors: [],
            }
        },
        methods: {
            addData: function(){
                this.errors = [];
                var formData = new FormData();
                formData.append('data', this.data);

                axios.post('/', formData).then(response => {
                    if(response.status === 200){
                        this.success = true;
                        this.url = response.data;
                    }
                    this.data = '';
                }).catch(error => {
                    this.errors = error.response.data.errors;
                });
            },
        },
    }
</script>
