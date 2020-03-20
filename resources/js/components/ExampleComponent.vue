<template>
  <div class="container">
    <p @click="loadUsers">click me for users</p>
    <h3 v-for="user in users" v-bind:key="user.id">{{ user.name }}</h3>
    <p></p>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      users: []
    };
  },
  methods: {
    loadUsers: function() {

      let comp = this;
      let ajax = new XMLHttpRequest();
      ajax.onreadystatechange = function() {
        if (ajax.status == 200 && ajax.readyState == 4) {
          let jsonData = this.responseText.replace("\'", '"');
            let jsonObj = JSON.parse(jsonData);
          comp.users = JSON.parse(jsonObj);
            console.log(jsonObj);
        }
      };
      ajax.open("GET", "/get-users", true);
      ajax.send();
    }
  }
};
</script>
