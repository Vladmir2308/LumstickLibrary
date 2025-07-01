<script setup lang="ts">
import SidebarArea from "@/Components/Admin/Sidebar/SidebarArea.vue";
import HeaderArea from "@/Components/Admin/Header/HeaderArea.vue";
import AlertWarning from "@/Components/Admin/Alerts/AlertWarning.vue";
import AlertSuccess from "@/Components/Admin/Alerts/AlertSuccess.vue";
import Alert from "@/Components/Admin/Alerts/Alert.vue";
import {provide, ref} from "vue";

</script>

<template>
  <!-- ===== Page Wrapper Start ===== -->
  <div class="flex h-screen overflow-hidden">
    <!-- ===== Sidebar Start ===== -->
    <SidebarArea />
    <!-- ===== Sidebar End ===== -->

    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
      <!-- ===== Header Start ===== -->
      <HeaderArea />
      <!-- ===== Header End ===== -->

      <!-- ===== Main Content Start ===== -->
      <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
          <slot></slot>
        </div>

      </main>
      <!-- ===== Main Content End ===== -->

    </div>
  </div>
  <!-- ===== Page Wrapper End ===== -->


</template>
