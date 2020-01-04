<template>
    
    <div class="col centrar">
        <button type="button" class="top-space d-block mx-auto" data-toggle="modal" data-target="#verDepencencias">
        Dependencias
        </button>
        
        <ver-dependencias></ver-dependencias>
    </div>

</template>

<script>
    export default {
    
    }
</script>

<style>
    .top-space{
        width: 120px;
        margin-top: 10px;
        padding: 15;
        font-size: 12px;
        color: white;
        background: rgb(167, 11, 11);
        border: 1px solid rgb(167, 11, 11);
        border-radius: 4px;
        outline: none;
    }

    .top-space:hover{
        background: white;
        color: rgb(167, 11, 11);
        border: solid 1px rgb(167, 11, 11);
    }

    .top-space:focus{
        background: green;
        border: 1px solid green;
        outline: none;
        box-shadow: 0 0 8px 0 dodgerblue;
    }

    .centrar{
        display: flex;
        align-items: center;
    }
</style>