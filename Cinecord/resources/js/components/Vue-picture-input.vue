<template>
<div class="hello">    
    <picture-input 
    ref="pictureInput"
    width="600" 
    height="600" 
    margin="16" 
    accept="image/jpeg,image/png" 
    size="10" 
    button-class="btn"
    :custom-strings="{
        upload: '<h1>Bummer!</h1>',
        drag: 'Drag a 😺 GIF or GTFO'
    }"
    @change="onChange">
    </picture-input>
</div>
</template>