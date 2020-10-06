<template>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
            <img :src="web_path + '/img/AdminLTELogo.png'" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img :src="web_path + '/img/user2-160x160.jpg'" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2" id="sidebar_menu">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <router-link :to="{path: '/users'}" :class="['nav-link', isActive('/users') ? 'active' : '']">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{path: '/enterprises'}" :class="['nav-link', isActive('/enterprises') ? 'active' : '']">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Enterprises</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{path: '/clients'}" :class="['nav-link', isActive('/clients') ? 'active' : '']">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>Clients</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{path: '/establishment-types'}" :class="['nav-link', isActive('/establishment-types') ? 'active' : '']">
                            <i class="nav-icon fas fa-store"></i>
                            <p>Establishment types</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{path: '/establishments'}" :class="['nav-link', isActive('/establishments') ? 'active' : '']">
                            <i class="nav-icon fas fa-store"></i>
                            <p>Establishment</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{path: '/indicators'}" :class="['nav-link', isActive('/indicators') ? 'active' : '']">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Indicators</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{path: '/group/indicators'}" :class="['nav-link', isActive('/group/indicators') ? 'active' : '']">
                            <i class="nav-icon fas fa-layer-group"></i>
                            <p>Indicators groups</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{path: '/surveys'}" :class="['nav-link', isActive('/surveys') ? 'active' : '']">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Surveys</p>
                        </router-link>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

</template>

<script>
export default {
    props: ['web_path'],
    methods: {
        isActive(path_url) {
            return this.currentPage.indexOf(path_url) === 0;
        }
    },
    computed: {
        currentPage() {
            return this.$route.path;
        }
    },
}

</script>

<style>

</style>
