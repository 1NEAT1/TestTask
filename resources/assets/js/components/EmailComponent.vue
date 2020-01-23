<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Введите любые данные для отправки</div>
                    <div class="panel-body">
                        <div class="alert alert-success" role="alert" v-if="this.success">
                            {{ message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form>
                            <div class="form-group">
                                <input class="form-control" v-model="email" v-model.trim="email"  placeholder="Ваш Email">
                                <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" v-model="data" v-model.trim="data"  placeholder="Данные">
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
                email: '',
                success: false,
                message: 'Данные отправлены на указаную почту',
                url: '',
                errors: []
            }
        },
        methods: {
            addData: function(){
                this.errors = [];
                var formData = new FormData();
                formData.append('data', this.data);
                formData.append('email', this.email);
                axios.post('/createEmail', formData).then(response => {
                    if(response.status === 200){
                        this.success = true;
                        this.url = response.data;
                    }
                    this.data = '';
                    this.email = '';
                }).catch(error => {
                    this.errors = error.response.data.errors;
                });
            },
        },
    }
</script>
