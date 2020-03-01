<template>
<div>
	<h1>ユーザ一覧</h1>
  <router-link class="btn btn-primary" :to="`/user/create`">作成</router-link>
	<ul>
		<li v-for="(user,index) in users" v-bind:key="user.id" class="mb-1">
			{{ user.name}} 
			<router-link class="btn btn-success" :to="`/user/${user.id}`">詳細</router-link>
			<router-link class="btn btn-primary" :to="`/user/${user.id}/edit`">更新</router-link>
			<span class="btn btn-danger" @click="userDelete(index, user.id)">削除</span>
		</li>
	</ul>
</div>
</template>
<script>
	export default {
		data(){
			return{
				users:[],
			}
		},
		methods:{
			userDelete(index, id){
				axios.delete('/api/user/' + id)
				     .then(response => {
				     	this.users.slice(id, 1)
				     })
				     .catch(error => console.log(error));
			},
		},
		created(){
			axios.get('/api/user')
				.then(response=>{
					this.users = response.data.users;
				})
				.catch(error => {
					console.log(error)
				});
		}
	}
</script>