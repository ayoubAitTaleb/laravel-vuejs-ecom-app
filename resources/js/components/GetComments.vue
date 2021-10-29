<template>
    <div class="col-md-6">
        <ul class="list-group">
            <li class="list-group-item active" aria-current="true">latest comments</li>
            <li class="list-group-item" v-for="(comment, index) in comments" :key="index">
                <h5>{{comment.user.name}}</h5>
                <p>{{comment.content}}</p>
            </li>
            <br>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['userid', 'itemid'],
        data() {
            return {
                comments: {}
            }
        },
        methods: {
            getComments() {
                axios.get('getComments/' + this.itemid)
                .then((Response)=>{
                    this.comments = Response.data
                })
                .catch((errors)=>{
                    console.log(errors)
                })
            }
        },
        mounted() {
            this.getComments()
            this.interval = setInterval(function() {
                this.getComments()
            }.bind(this), 500)
        }
    }
</script>
