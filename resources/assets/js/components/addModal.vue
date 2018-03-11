<template>
<div id="">
  <div class="modal" :class='openModal'>
    <div class="modal-background"></div>
    <div class="modal-content">
      <!-- Any other Bulma elements you want -->
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
  </div>
</div>
</template>
<script>
export default {
  props: ['openModal'],
  name: "",
  data: () => ({

  })
}
</script>
<style lang="scss" scoped>
</style>
