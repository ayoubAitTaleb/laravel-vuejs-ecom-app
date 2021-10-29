<template>
    <div class="col-md-6 form-group">        
        <textarea class="form-control" name="content" v-model="commentData.content" cols="3" rows="2" placeholder="add comment"></textarea>
        <button @click="commentStore" class="btn btn-success btn-sm my-2">add comment</button>
    </div>
</template>
<script>
    export default {
        props: ['userid', 'itemid'],
        data() {
            return {
                commentData: {
                    content: '',
                    approve: 0,
                    user_id: this.userid,
                    item_id: this.itemid
                }
            }
        },
        methods: {
            commentStore(){
                axios.post(this.itemid +'/comment/store', this.commentData)
                .then((Response)=>{
                    this.commentData.content = ''
                })
                .catch((errors)=>{
                    console.log(errors)
                })
            }
        }
    }
</script>
