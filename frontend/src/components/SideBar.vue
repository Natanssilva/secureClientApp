<template>
  <el-radio-group v-model="isCollapse" style="margin-bottom: 20px">
    <el-radio-button :value="false">Expand</el-radio-button>
    <el-radio-button :value="true">Collapse</el-radio-button>
  </el-radio-group>

  <el-menu
    default-active="2"
    class="menu-secure el-menu-vertical-demo"
    :collapse="isCollapse"
    @open="handleOpen"
    @close="handleClose"
  >
    <el-sub-menu index="1">
      <template #title>
        <el-icon><HomeFilled /></el-icon>
        <span>Home</span>
      </template>
      <el-menu-item-group>
        <el-menu-item index="1-1">Pedidos</el-menu-item>
      </el-menu-item-group>
      <el-menu-item-group>
        <el-menu-item index="1-2">Clientes</el-menu-item>
      </el-menu-item-group>
     
    </el-sub-menu>
   
    <el-sub-menu index="2">
      <template #title>
        <el-icon color="#409efc"><DataAnalysis /></el-icon>
        <span class="text-cyan-50">Gráficos</span>
      </template>
      <el-menu-item-group>
        <el-menu-item index="2-1">Pedidos</el-menu-item>
      </el-menu-item-group>
      <el-menu-item-group>
        <el-menu-item index="2-2">Clientes</el-menu-item>
      </el-menu-item-group>
    </el-sub-menu> 
    
    <el-sub-menu index="3">
      <template #title>
        <el-icon><Setting /></el-icon>
        <span class="text-cyan-50">Configurações</span>
      </template>
      <el-menu-item-group>
        <el-menu-item index="3-1">Conta</el-menu-item>
      </el-menu-item-group>
    </el-sub-menu> 
  </el-menu>
</template>

<script lang="ts" setup>
import { ref } from 'vue'
import { HomeFilled, DataAnalysis, Setting } from '@element-plus/icons-vue'

const isCollapse = ref(true)

const handleOpen = (key: string, keyPath: string[]) => {
  console.log(key, keyPath)
}

const handleClose = (key: string, keyPath: string[]) => {
  console.log(key, keyPath)
}
</script>

<style>
/* Estilos para o menu expandido (sem a classe .el-menu--collapse) */
.el-menu-vertical-demo:not(.el-menu--collapse) {
  width: 200px;
  min-height: 100vh;
}

/* Estilos para o menu colapsado */
.el-menu-vertical-demo.el-menu--collapse {
  width: 64px; /* largura do menu colapsado */
  min-height: 100vh;
}
</style>
