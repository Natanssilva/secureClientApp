<template>

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
        <el-icon color="#E6E6FA"><DataAnalysis /></el-icon>
        <span >Gráficos</span>
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
        <span >Configurações</span>
      </template>
      <el-menu-item-group>
        <el-menu-item index="3-1">Conta</el-menu-item>
      </el-menu-item-group>
    </el-sub-menu> 
  </el-menu>

  <div class="arrow-button bttn-menu" :style="arrowButtonStyle">
    <span @click="toggleMenu">
      <el-icon :component="iconName"><iconName></iconName></el-icon>
    </span>
  </div>
</template>

<script  setup>
import { ref, computed  } from 'vue'
import { HomeFilled, DataAnalysis, Setting, ArrowRight, ArrowLeft } from '@element-plus/icons-vue'

const isCollapse = ref(true)

const handleOpen = (key, keyPath) => {
  // console.log(key, keyPath)
}

const handleClose = (key, keyPath) => {
  // console.log(key, keyPath)
}

const toggleMenu = () => {
  isCollapse.value = !isCollapse.value
}

const arrowButtonStyle = computed(() => {
  return {
    left: isCollapse.value ? '55px' : '195px', 
    transition: 'left 0.49s ease', 
  }
});

const iconName = computed(() => {
  return isCollapse.value ? ArrowRight : ArrowLeft // Define o ícone com base no estado de isCollapse
})
</script>

<style>

.el-menu-vertical-demo:not(.el-menu--collapse) {
  width: 200px;
  min-height: 100vh;
}


.el-menu-vertical-demo.el-menu--collapse {
  width: 64px; 
  min-height: 100vh;
}

.arrow-button {
  position: fixed;
  left: 50px; 
  top: 50%;
  transform: translateY(-50%);
  padding: 8px;
  border-radius: 0 25px 25px 0;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}

</style>
