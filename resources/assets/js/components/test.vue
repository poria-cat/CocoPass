<template>
<h1>{{msg}}</h1>
 <li v-for="item in items">
    {{ item.message }}
  </li>
</template>
<script>
  export default {
   data:function(){
   return {
   items: [
         { message: 'Foo' },
         { message: 'Bar' }
       ]
   }
   }
    }
</script>