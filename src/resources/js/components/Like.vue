<template>
    <div class="container">
        <button v-if="!liked" type="submit" class="btn btn-primary" @click="like(postId)">LGTM{{likeCount}}</button>
        <button v-if="liked" type="submit" class="btn btn-primary" @click="unlike(postId)">LGTM済み{{likeCount}}</button>
    </div>
</template>

<script>
    export default {
        props:{
            postId:{
                type: Number,
                default: 0
            },
            userId:{
                type: Number,
                default: 0
            },
            defaultLiked:{
                type: Boolean,
                default: false
            },
            defaultCount:{
                type: Number,
                default: 0
            },
        },
        data(){
            return{
            liked:false,
            likeCount:0
            }
        },
        created(){
            this.liked = this.defaultLiked
            this.likeCount = this.defaultCount
        },
        mounted(){
            console.log(this.postId,this.userId)
        },
        methods: {
            like(postId){
                let url = '/api/posts/'+postId+'/like'
                axios.post(url,{user_id:this.userId})
                    .then(res => {
                        this.liked = true
                        this.likeCount = res.data.likeCount
                    })
                    .catch(error => {
                        alert(error)
                    })
            },
            unlike(postId){
                let url = '/api/posts/'+postId+'/unlike'

                axios.post(url,{user_id:this.userId})
                    .then(res => {
                        this.liked = false
                        this.likeCount = res.data.likeCount
                    })
                    .catch(error => {
                        alert(error)
                    })
        },
    }
    }
</script>
