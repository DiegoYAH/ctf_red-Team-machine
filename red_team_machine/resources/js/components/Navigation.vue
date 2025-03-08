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
              <a class="nav-link" href="/home/">Inici</a>
            </li>
            <li class="nav-item" v-if="userData.rol === 'paciente'">
              <a class="nav-link" :href="'/agenda/' + userData.id">Agenda</a>
            </li>
            <li class="nav-item" v-if="userData.rol === 'paciente'">
              <a class="nav-link" :href="'/informesClinicos/' + userData.id">Resultats</a>
            </li>
            <li class="nav-item" v-if="userData.rol === 'paciente'">
              <a class="nav-link" :href="'/solicitudes/'">Solicituts</a>
            </li>
            <li class="nav-item" v-if="userData.rol === 'paciente'">
              <a class="nav-link" :href="'/notificaciones/' + userData.id">Notificacions</a>
            </li>
            <li class="nav-item" v-if="userData.rol === 'admin'">
              <a class="nav-link" :href="'/tareas/'">Tasques</a>
            </li>
            <li class="nav-item" v-if="userData.rol === 'admin'">
              <a class="nav-link" :href="'/buscadorMedico/agendaMedico/'">Agenda dels metges</a>
            </li>
            <li class="nav-item" v-if="userData.rol === 'medico'">
              <a class="nav-link" href="/buscadorPacientes/crearCita">Crear cita</a>
            </li>
            <li class="nav-item" v-if="userData.rol === 'medico'">
              <a class="nav-link" href="/buscadorPacientes/resultadosPaciente">Resultats pacients</a>
            </li>
            <li class="nav-item" v-if="userData.rol === 'medico'">
              <a class="nav-link" href="/buscadorPacientes/agendaPaciente">Agenda pacients</a>
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
      // userRoleClass() {
      //   // Retorna la clase correspondiente al rol del usuario
      //   return this.userData.rol === 'paciente' ? 'navbar-paciente' :
      //     this.userData.rol === 'medico' ? 'navbar-medico' :
      //       this.userData.rol === 'admin' ? 'navbar-admin' :
      //         '';
      // }
    },
    mounted() {
      console.log(this.userData);
    }
  };
  </script>
  
  <style></style>
  