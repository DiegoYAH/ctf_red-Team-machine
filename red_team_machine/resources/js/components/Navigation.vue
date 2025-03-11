<template>
    <nav :class="['navbar navbar-expand-lg navbar-light fixed-top', userRoleClass]">
      <div class="container">
        <a class="navbar-brand" href="/home/">
          <div class="logo"></div>
          Avengers Server
        </a>
        <div :class="['collapse', { 'show': isNavbarOpen }]" class="navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/home/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" :href="'/profile/' + userData.id">Profile</a>
            </li>
            <li class="nav-item" v-if="userData.role === 'admin'">
              <a class="nav-link" :href="'/informesClinicos/' + userData.id">Avengers List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logout/">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    props: ['userData'],
    data() {
      return {
        isNavbarOpen: false
      };
    },
    methods: {
      toggleNavbar() {
        this.isNavbarOpen = !this.isNavbarOpen;
      }
    },
    computed: {
      userRoleClass() {
        // Retorna la clase correspondiente al rol del usuario
        return this.userData.role === 'user' ? 'navbar-user' :
            this.userData.role === 'admin' ? 'navbar-admin' :
              '';
      }
    },
    mounted() {
      console.log(this.userData);
    }
  };
  </script>
  
  <style></style>
  