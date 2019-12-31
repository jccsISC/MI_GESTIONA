<template>
    <div class="micardBeca" data-toggle="modal" data-target="#addBeca">
        <label for="tipoBeca"><b>Interna:</b></label>
        <label for="tipoBeca">Manutención</label>
    </div>
</template>

<script>
    export default {
    
    }
</script>

<style>
    .top-space{
        margin-top: 20px;
    }

        .micardBeca{
            width: 95%;
            height: 25px;
            background-color: white;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.4);
            border-radius: 3px;
            transition: 0.5s;
            border: 1px solid rgb(211, 211, 211);
            margin-top: 5px;
            margin-left: 3%;
            text-align: left;
            text-indent: 5px ;  
            font-size: .75em;       
        }


        .micardBeca:hover{
            /*box-shadow: 1px 5px 10px  rgba(0,0,0,0.2);*/
            box-shadow: 0 2px 4px 0 rgb(167, 11, 11)
        }
   

</style>