<template>
    <div class="container divPrin">

        <h4 class="text-center">Maestro: Juan Francisco Beltran</h4>
        <div class="midiv text-center">
            <label>Ciclo escolar</label>
            <select name="" id="">
                <option value="">FEB - JUL</option>
                <option value="">AGO - ENE</option>
            </select>

            <label class="ml-5">Fecha</label>
            <input type="date"><br>

            
            <label>Parcial</label>
            <select name="" id="">
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
            </select>

            <label>Materia</label>
            <select name="" id="">
                <option value="">Matemáticas</option>
                <option value="">Informática</option>
                <option value="">Ecuaciones diferenciales</option>
                <option value="">Calculo integral</option>
            </select>
        </div>

        <!-- <div id="accordion">
            <div>
                <div class="card-header p-0" :id="'heading'+ key">
                    <button class="carreraSelect" data-toggle="collapse" :data-target="'#collapse'+ key" aria-expanded="false" :aria-controls="'collapse'+ key">
                        INGENIERIA EN SISTEMAS
                    </button>
                </div>
                <div :id="'collapse'+ key" :class="['collapse'] " :aria-labelledby="'heading'+ key" data-parent="#accordion">
                    <div id="accordion1">
                        <div>
                            <div class="card-header p-0" :id="'heading'+ key">
                                <button class="btnSelectAlumn" data-toggle="collapse" :data-target="'#collapse'+ key" aria-expanded="false" :aria-controls="'collapse'+ key">
                                    INFORMÁTICA 1
                                </button>
                            </div>
                            <div :id="'collapse'+ key" :class="['collapse'] " :aria-labelledby="'heading'+ key" data-parent="#accordion1">
                                 
                                 <div>
                                    <div class="card-header p-0" :id="'heading'+ key">
                                        <button class="btnSelectAlumn" data-toggle="collapse" :data-target="'#collapse'+ key" aria-expanded="false" :aria-controls="'collapse'+ key">
                                            INFORMÁTICA 2
                                        </button>
                                    </div>
                                    <div :id="'collapse'+ key" :class="['collapse'] " :aria-labelledby="'heading'+ key" data-parent="#accordion">
                                          <table class="table table-striped table-hover contentTable table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Grupos</th>
                                                    <th>Unidad</th>
                                                    <th colspan="2">Nombre del ALumno</th>
                                                    <th>Inasistencias</th>
                                                    <th>Día</th>
                                                </tr>
                                            </thead>
                                                    
                                            <tbody>
                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">3 A</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">3 C</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">2 K</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">1 K</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">6 B</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card-header p-0" :id="'heading'+ key">
                                <button class="btnSelectAlumn" data-toggle="collapse" :data-target="'#collapse'+ key" aria-expanded="false" :aria-controls="'collapse'+ key">
                                    INFORMÁTICA 2
                                </button>
                            </div>
                            <div :id="'collapse'+ key" :class="['collapse'] " :aria-labelledby="'heading'+ key" data-parent="#accordion">
                            
                            </div>
                        </div>
                        <div>
                            <div class="card-header p-0" :id="'heading'+ key">
                                <button class="btnSelectAlumn" data-toggle="collapse" :data-target="'#collapse'+ key" aria-expanded="false" :aria-controls="'collapse'+ key">
                                    INFORMÁTICA 3
                                </button>
                            </div>
                            <div :id="'collapse'+ key" :class="['collapse'] " :aria-labelledby="'heading'+ key" data-parent="#accordion">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="panel-group p-0 m-0" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default m-0">
                <div class="panel-heading m-0" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <button class="carreraSelect p-2" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            INFORMÁTICA
                        </button>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <div class="panel-group" id="sub-accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="subHeadingOne">
                                <h4 class="panel-title">
                                    <button class="w-100" role="button" data-toggle="collapse" data-parent="#sub-accordion" href="#collapseSubOne" aria-expanded="true" aria-controls="collapseSubOne">
                                        Grupo 3 A
                                    </button>
                                </h4>
                                </div>
                                <div id="collapseSubOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subHeadingOne">
                                    <div class="panel-body">
                                        <table class="table table-striped table-hover contentTable table table-sm">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Nombre del ALumno</th>
                                                    <th colspan="2">Faltas</th>
                                                </tr>
                                            </thead>
                                                    
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm" style="color:white;"><i class="fas fa-plus"></i></button>
                                                        <label>1</label>
                                                        <button class="btn bg-danger btn-sm" style="color:white;"><i class="fas fa-minus"></i></button>
                                                    </td>
                                                </tr>
                                                
                                                 <tr>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm" style="color:white;"><i class="fas fa-plus"></i></button>
                                                        <label>1</label>
                                                        <button class="btn bg-danger btn-sm" style="color:white;"><i class="fas fa-minus"></i></button>
                                                    </td>
                                                </tr>
                                               
                                                <tr>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm" style="color:white;"><i class="fas fa-plus"></i></button>
                                                        <label>1</label>
                                                        <button class="btn bg-danger btn-sm" style="color:white;"><i class="fas fa-minus"></i></button>
                                                    </td>
                                                </tr>
                                               
                                                <tr>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm" style="color:white;"><i class="fas fa-plus"></i></button>
                                                        <label>1</label>
                                                        <button class="btn bg-danger btn-sm" style="color:white;"><i class="fas fa-minus"></i></button>
                                                    </td>
                                                </tr>
                                               
                                                <tr>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm" style="color:white;"><i class="fas fa-plus"></i></button>
                                                        <label>1</label>
                                                        <button class="btn bg-danger btn-sm" style="color:white;"><i class="fas fa-minus"></i></button>
                                                    </td>
                                                </tr>
                                               
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="subHeadingTwo">
                                <h4 class="panel-title">
                                    <button class="collapsed w-100" role="button" data-toggle="collapse" data-parent="#sub-accordion" href="#collapseSubTwo" aria-expanded="false" aria-controls="collapseSubTwo">
                                        Grupo 3 B
                                    </button>
                                </h4>
                                </div>
                                <div id="collapseSubTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSubTwo">
                                <div class="panel-body">
                                    <table class="table table-striped table-hover contentTable table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Grupos</th>
                                                    <th>Unidad</th>
                                                    <th colspan="2">Nombre del ALumno</th>
                                                    <th>Inasistencias</th>
                                                    <th>Día</th>
                                                </tr>
                                            </thead>
                                                    
                                            <tbody>
                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">3 A</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">3 C</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">2 K</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">1 K</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">6 B</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">6 B</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">6 B</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">6 B</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">6 B</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">6 B</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">6 B</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>

                                                <tr>
                                                    <td style="background: #800000; color:white; text-align: center;">6 B</td>
                                                    <td>
                                                        <select name="" id="">
                                                            <option value="">1</option>
                                                            <option value="">2</option>
                                                            <option value="">3</option>
                                                            <option value="">4</option>
                                                            <option value="">5</option>
                                                            <option value="">6</option>
                                                        </select>
                                                    </td>
                                                    <td colspan="2">Julio Cesar Camacho Silva</td>
                                                    <td><input type="number" step="0.0" min="0"></td>
                                                    <td><input type="date"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="panel panel-default m-0">
                <div class="panel-heading m-0" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <button class="carreraSelect p-2 m-0" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        INFORMÁTICA
                    </button>
                </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body m-0">
                    <div class="panel-group" id="sub-accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="subHeadingOne">
                        <h4 class="panel-title">
                            <button class="w-100" role="button" data-toggle="collapse" data-parent="#sub-accordion" href="#collapseSubOne" aria-expanded="true" aria-controls="collapseSubOne">
                                Grupo 1 A Fecha: 13/02/2020 Parcial: 1
                            </button>
                        </h4>
                        </div>
                        <div id="collapseSubOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="subHeadingOne">
                            <div class="panel-body">
                                <table class="table table-striped table-hover contentTable table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Grupos</th>
                                            <th>Unidad</th>
                                            <th colspan="2">Nombre del ALumno</th>
                                            <th>Inasistencias</th>
                                            <th>Día</th>
                                        </tr>
                                    </thead>
                                            
                                    <tbody>
                                        <tr>
                                            <td style="background: #800000; color:white; text-align: center;">3 A</td>
                                            <td>
                                                <select name="" id="">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                </select>
                                            </td>
                                            <td colspan="2">Julio Cesar Camacho Silva</td>
                                            <td><input type="number" step="0.0" min="0"></td>
                                            <td><input type="date"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td style="background: #800000; color:white; text-align: center;">3 C</td>
                                            <td>
                                                <select name="" id="">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                </select>
                                            </td>
                                            <td colspan="2">Julio Cesar Camacho Silva</td>
                                            <td><input type="number" step="0.0" min="0"></td>
                                            <td><input type="date"></td>
                                        </tr>

                                        <tr>
                                            <td style="background: #800000; color:white; text-align: center;">2 K</td>
                                            <td>
                                                <select name="" id="">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                </select>
                                            </td>
                                            <td colspan="2">Julio Cesar Camacho Silva</td>
                                            <td><input type="number" step="0.0" min="0"></td>
                                            <td><input type="date"></td>
                                        </tr>

                                        <tr>
                                            <td style="background: #800000; color:white; text-align: center;">1 K</td>
                                            <td>
                                                <select name="" id="">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                </select>
                                            </td>
                                            <td colspan="2">Julio Cesar Camacho Silva</td>
                                            <td><input type="number" step="0.0" min="0"></td>
                                            <td><input type="date"></td>
                                        </tr>

                                        <tr>
                                            <td style="background: #800000; color:white; text-align: center;">6 B</td>
                                            <td>
                                                <select name="" id="">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                </select>
                                            </td>
                                            <td colspan="2">Julio Cesar Camacho Silva</td>
                                            <td><input type="number" step="0.0" min="0"></td>
                                            <td><input type="date"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="subHeadingTwo">
                        <h4 class="panel-title">
                            <button class="collapsed w-100" role="button" data-toggle="collapse" data-parent="#sub-accordion" href="#collapseSubTwo" aria-expanded="false" aria-controls="collapseSubTwo">
                                Grupo 3 B Fecha: 13/02/2020 Parcial: 2
                            </button>
                        </h4>
                        </div>
                        <div id="collapseSubTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSubTwo">
                        <div class="panel-body">
                            <table class="table table-striped table-hover contentTable table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Grupos</th>
                                            <th>Unidad</th>
                                            <th colspan="2">Nombre del ALumno</th>
                                            <th>Inasistencias</th>
                                            <th>Día</th>
                                        </tr>
                                    </thead>
                                            
                                    <tbody>
                                        <tr>
                                            <td style="background: #800000; color:white; text-align: center;">3 A</td>
                                            <td>
                                                <select name="" id="">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                </select>
                                            </td>
                                            <td colspan="2">Julio Cesar Camacho Silva</td>
                                            <td><input type="number" step="0.0" min="0"></td>
                                            <td><input type="date"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td style="background: #800000; color:white; text-align: center;">3 C</td>
                                            <td>
                                                <select name="" id="">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                </select>
                                            </td>
                                            <td colspan="2">Julio Cesar Camacho Silva</td>
                                            <td><input type="number" step="0.0" min="0"></td>
                                            <td><input type="date"></td>
                                        </tr>

                                        <tr>
                                            <td style="background: #800000; color:white; text-align: center;">2 K</td>
                                            <td>
                                                <select name="" id="">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                </select>
                                            </td>
                                            <td colspan="2">Julio Cesar Camacho Silva</td>
                                            <td><input type="number" step="0.0" min="0"></td>
                                            <td><input type="date"></td>
                                        </tr>

                                        <tr>
                                            <td style="background: #800000; color:white; text-align: center;">1 K</td>
                                            <td>
                                                <select name="" id="">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                </select>
                                            </td>
                                            <td colspan="2">Julio Cesar Camacho Silva</td>
                                            <td><input type="number" step="0.0" min="0"></td>
                                            <td><input type="date"></td>
                                        </tr>

                                        <tr>
                                            <td style="background: #800000; color:white; text-align: center;">6 B</td>
                                            <td>
                                                <select name="" id="">
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                </select>
                                            </td>
                                            <td colspan="2">Julio Cesar Camacho Silva</td>
                                            <td><input type="number" step="0.0" min="0"></td>
                                            <td><input type="date"></td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Collapsible Group Item #2
                    </a>
                </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
                </div>
            </div> -->
        </div>

        <div class="pbtn">
            <button type="button" class="miBtn">
                <i class="far fa-save"></i> Guardar
            </button>
        </div>
    </div>
</template>

<script>
    import bus from '../../event-bus';

    export default {
        data() {
            return {
                alumnos: [],
                loading: true,
                
            }
        },
        created() {
            // axios.get('/trabajosocial?tipo=justificantes').then(res => {
            //     this.alumnos = res.data.data;
            //     this.fechaInicio = res.data.fechas.Inicio;
            //     this.fechaFinal = res.data.fechas.Fin;
            //     this.semana = res.data.fechas.Semana;
            //     this.loading = false;
            // });

            axios.get('registrarFaltas').then(res => {
                 console.log(res.data);
            });
        },
        methods: {

            seleccionarAlumno(alumno) {
                console.log('click');
                bus.$emit('alumnoSeleccionado', alumno);               
            }
        }
    }
</script>
   
<style>

    .midiv{
        width: 50%;
        margin-right: auto;
        margin-left: auto;
        border: 1px solid rgb(223, 223, 223);
        border-radius: 3px;
        padding: 10px;
        margin-bottom: 10px;
    }
    
    .pbtn{
        position: fixed;
        right: 7%;
        bottom: 20%;
    }

    .carreraSelect {
        width: 100%;
        background: #800000;
        color: white;
        outline: none;
        font-size: 16px;
        border: 1px solid #800000;
        padding: 5px;
        margin: 0;
        transition: 0.4s;
        /* box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4); */
    }

    .carreraSelect:hover{
        background: white;
        color: #800000;
        border: 1px solid #800000;
        transition: 0.6s;
        /* box-shadow: 0 2px 4px 0 rgb(167, 11, 11); */
    }



</style>