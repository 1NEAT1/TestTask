<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ваши отправленные данные</div>
                    <div class="panel-body">
                        Вы отправили: {{ info.data }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'info'
        ],
    }
</script>
