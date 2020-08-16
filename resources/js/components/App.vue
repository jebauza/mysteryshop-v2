<template>
  <div>

    <!-- Navbar -->
    <Navbar :web_path="web_path"></Navbar>

    <!-- Main Sidebar Container -->
    <Sidebar :web_path="web_path"></Sidebar>

    <!-- Content Wrapper. Contains page content -->
    <Content></Content>

    <!-- main-footer -->
    <Footer></Footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>

  </div>
</template>

<script>
import Navbar from './layouts/Navbar';
import Sidebar from './layouts/Sidebar';
import Content from './layouts/Content';
import Footer from './layouts/Footer';

export default {
    props: ['web_path'],

    components: {Navbar, Sidebar, Content, Footer},

    data() {
        return {
          checked: false,
          title: 'Check me'
        }
    },
}
</script>

<style>

</style>
