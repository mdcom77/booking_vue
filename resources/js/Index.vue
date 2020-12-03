<template>
  <div>
    <nav class="navbar bg-white border-bottom navbar-light">
      <router-link class="navbar-brand mr-auto" :to="{name: 'home'}">LaravelBnb</router-link>
      <router-link class="btn nav-button" :to="{name: 'bookable', params: { id:1 } }">Bookable</router-link>
    </nav>

    <div class="container mt-4 mb-4 pr-4 pl-4">
      <router-view :key="$route.fullPath"></router-view>
    </div>
  </div>
</template>