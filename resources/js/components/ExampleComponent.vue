<template>
    <div class="container">
        <p @click="loadUsers">click me for users</p>
        <h3 v-for="user in users" v-bind:key="user.id">{{ user.name }}</h3>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                users: [],
            }
        },
        methods: {
            loadUsers: function(){
                let comp = this;
                let ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function(){
                    if(ajax.status == 200 && ajax.readyState == 4){
                        let jsonData = JSON.parse(this.responseText);
                        comp.users = jsonData.users;
                    }
                }
                ajax.open('GET', 'http://http://35.223.188.43:8080/get-users', true);
                ajax.send();
            }
        }
    }
</script>
