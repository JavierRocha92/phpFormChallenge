<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicios UT3_4_3</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/styles.css">

    </head>
    <body>
        <div>
            <h1>Ejercicio UT3_4_3 FORMULARIOS 2DAW </h1>
            <div class="info">
                <p><strong>Nombre: </strong>Javier Rocha Gómez</p>
                <p><strong>Curso: </strong>2ºDAW</p>
                <p><strong>Módulo: </strong> Desaarrollo web en entorno servidor</p>
            </div>
        </div>
        <!--        ITEM LIST TO CHOOSE BETWEEN EJERCICIO TO SEE-->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <!--                EJERCICIO 3 BUTTON-->
                <button class="nav-link" id="ejercicio3" data-bs-toggle="tab" data-bs-target="#ejercicio3-tab-pane" type="button" role="tab" aria-controls="ejercicio3-tab-pane" aria-selected="false">Ejercicio3</button>
            </li>
          
        </ul>
        <!--END LIST-->
        <div class="tab-content" id="myTabContent">
            <!--            EJERCICIO 3 CONTAINER TEXT--> 
            <div class="tab-pane show active" id="ejercicio3-tab-pane" role="tabpanel" aria-labelledby="ejercicio3" tabindex="0">
          <?php
          //CREATE MAIN ARRAY IF NOT EXISTS
                if (!isset($places) && !isset($_POST['places'])){
                    $places = [];
                    
                }
                if(isset($_POST['places'])){
                    $places = unserialize(base64_decode($_POST['places']));
                    
                }
          ?>
                <!--                TITLE-->
                <h1>Ejercicio 3</h1>
                <!--HEADER-->
                <header class="d-flex justify-content-between p-3">
                    <!--TITLE CONTAINER-->
                    <div class="header__title">
                        <!--TITLE-->
                        <h2 class="title">
                            Oferta de Alquiler de Vivienda
                        </h2>
                        <h3 class="subtitle">
                            Introduzca los datos de la vivienda
                        </h3>
                    </div>
                    <!--LOGO CONTAINER-->
                    <div class="logo">
                        <img class="img" src="./assets/images/favicon.png">
                    </div>
                </header>
                <!--MAIN-->
                <main class="p-3">
                    <!--FORM-->
                    <form class="form" method="post" action="http://localhost/ejerciciosUT3_4/pages/viviendas.php">
                        <!--INPUT TYPE-->
                        <div class="mb-3 d-flex">
                            <select class="form-select form-select-sm" name="type" aria-label="Small select example">
                                <option disabled selected>Tipo de vivienda</option>
                                <option value="Adosado">Adosado</option>
                                <option value="Familiar">Casa</option>
                                <option value="Piso">Piso</option>
                                <option value="Habitacion">Habitacion</option>
                                <option value="Chale">Chalé</option>
                            </select>
                            <!--INPUT ZONE-->
                            <select class="form-select form-select-sm" name="zone" aria-label="Small select example">
                                <option disabled selected>Zona</option>
                                <option value="Centro">Centro</option>
                                <option value="Sur">Sur</option>
                                <option value="Norte">Norte</option>
                                <option value="Este">Este</option>
                                <option value="Oeste">Oeste</option>
                            </select>
                        </div>

                        <!--INPUT ADDRESS-->
                        <div class="mb-3">
                            <label for="address" class="form-label">Direccion</label>
                            <input type="text" name='address' class="form-control" id="address" aria-describedby="emailHelp">
                        </div>
                        <!--RADIO BUTTONS-->
                        <label class="form-label mr-2">Habitaciones</label>
                        <div class="d-flex">

                            <!--RADIO BUTTON 1-->
                            <div class="form-check m-1">
                                <input class="form-check-input" type="radio" name="rooms" value="1" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    1
                                </label>
                            </div>
                            <!--RADIO BUTTON 2-->
                            <div class="form-check m-1">
                                <input class="form-check-input" type="radio" name="rooms" value="2" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    2
                                </label>
                            </div>
                            <!--RADIO BUTTON 3-->
                            <div class="form-check m-1">
                                <input class="form-check-input" type="radio" name="rooms" value="3" id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault3">
                                    3
                                </label>
                            </div>
                            <!--RADIO BUTTON 4-->
                            <div class="form-check m-1">
                                <input class="form-check-input" type="radio" name="rooms" value="4" id="flexRadioDefault4">
                                <label class="form-check-label" for="flexRadioDefault4">
                                    4
                                </label>
                            </div>
                        </div>
                        <!--INPUT PRICE-->
                        <div class="w-50 mb-3">
                            <label for="price" class="form-label">Precio</label>
                            <input type="number" name='price' class="form-control" id="price" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Elige una foto para cargarla</label>
                            <input type="file" name='photo' accept=".jpg, .jpeg, .png" class="form-control" id="photo" aria-describedby="emailHelp">

                        </div>
                        <!--CHECK BOXES-->
                        <label class="form-label">Extras</label>
                        <div class="d-flex">
                            <!--CHECK BOX 1-->
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" name="checkList[]" type="checkbox" value="Garaje" aria-label="Checkbox for following text input">
                                    <label class="form-label">Garaje</label>
                                </div>

                            </div>
                            <!--CHECK BOX 2-->
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" name="checkList[]" type="checkbox" value="Trastero" aria-label="Checkbox for following text input">
                                    <label class="form-label">Trastero</label>
                                </div>

                            </div>
                            <!--CHECK BOX 3-->
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0"  name="checkList[]" type="checkbox" value="Piscina" aria-label="Checkbox for following text input">
                                    <label class="form-label">Piscina</label>
                                </div>

                            </div>
                            <!--CHECK BOX 4-->
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0"  name="checkList[]" type="checkbox" value="Jardin" aria-label="Checkbox for following text input">
                                    <label class="form-label">Jardin</label>
                                </div>

                            </div>
                        </div>
                        <!--BUTTON TP CHOOSE A FILE-->
                        <!--TEXT AREA-->
                        <label for="floatingTextarea">Observaciones</label>
                        <div class="form-floating">
                            <textarea class="form-control" name="textarea" id="floatingTextarea"></textarea>
                        </div>
                        <!--HIDDEN INPUT-->
                        <!--SEND MAIN ARRAY BY HIDDEN INPUT THROUGH FORM-->
                        <input class="form-check-input mt-0"  name="places" type="hidden" value="<?php echo base64_encode(serialize($places)) ?>" aria-label="Checkbox for following text input">
                                    
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        
                    </form>
                    <form action="http://localhost/ejerciciosUT3_4/pages/gestionatViviendas.php" method="post">
                        <input class="form-check-input mt-0"  name="places" type="hidden" value="<?php echo base64_encode(serialize($places)) ?>" aria-label="Checkbox for following text input">
                        <button class="btn btn-primary" type="submit">Gestionar viviendas</button>
                    </form>
                    <!--END FORM-->
                </main>
                <!--END MAIN-->
            </div>
        </div>
    </body>
</html>

