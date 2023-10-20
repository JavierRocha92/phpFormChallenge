<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicios UT3_4</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">

    </head>
    <body>
        <div>
            <h1>Ejercicio UT3_4 FORMULARIOS 2DAW </h1>
            <div class="info">
                <p><strong>Nombre: </strong>Javier Rocha Gómez</p>
                <p><strong>Curso: </strong>2ºDAW</p>
                <p><strong>Módulo: </strong> Desaarrollo web en entorno servidor</p>
            </div>
        </div>
        <!--        ITEM LIST TO CHOOSE BETWEEN EJERCICIO TO SEE-->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <!--                EJERCICIO 1 BUTTON-->
                <button class="nav-link active" id="ejercicio1" data-bs-toggle="tab" data-bs-target="#ejercicio1-tab-pane" type="button" role="tab" aria-controls="ejercicio1-tab-pane" aria-selected="true">Ejercicio1</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!--            EJERCICIO 1 CONTAINER TEXT-->
            <div class="tab-pane fade show active" id="ejercicio1-tab-pane" role="tabpanel" aria-labelledby="ejercicio1" tabindex="0">
                <!--                TITLE-->
                <h1>Ejercicio 1</h1>
                <?php
                //USIGN FUNCTION REQUIRE TO IMPORT FILE WITH FUNCTIONS
                require '../pages/functions.php';
                //CONDITIONAL TO STORAGE DIFERENTS $_POST VALUES IS THOSE EXIST
                if (isset($_POST['places'])) {
                    $places = unserialize(base64_decode($_POST['places']));
                }
                if (isset($_POST['option'])) {
                    $option = htmlspecialchars($_POST['option']);
                }
                if (isset($_POST['indexDelete'])) {
                    //STORAGE INTO $INDEX POST VALUE AND FILTER IT
                    $index = htmlspecialchars($_POST['indexDelete']);
                    //CALLING FUNCTION TO REMOVE AN ELEMENT 
                    deletePlace($index, $places);
                }
                if (isset($_POST['indexModify'])) {
                    //STORAGE INTO $INDEX POST VALUE AND FILTER IT
                    $index = htmlspecialchars($_POST['indexModify']);
                    //CALLINF FUNCTION TO REMOVE AN ELEMENT 
                    showModifyMenu($index, $places);
                }
                if (isset($_POST['newZone']) && isset($_POST['newPrice']) && isset($_POST['indexPlace'])) {
                    //STORAGE INTO $INDEX POST VALUE AND FILTER IT
                    $newPrice = htmlspecialchars($_POST['newPrice']);
                    $newZone = htmlspecialchars($_POST['newZone']);
                    $indexPlace = htmlspecialchars($_POST['indexPlace']);
                    //CALLINF FUNCTION TO REMOVE AN ELEMENT 
                    modifyPlace($indexPlace, $newPrice, $newZone, $places);
                }
                ?>
                <h2>¿Que opcion quieres realizar?</h2>
                <!--BEGIN MAIN FORM-->
                <form class="d-flex flex-column w-25" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <!--SHOW PLACES-->
                    <button type="submit" name="option" value="1" class="btn btn-primary">Ver listado de viviendas</button>
                    <!--SORTING BY ZONE-->
                    <button type="submit" name="option" value="2" class="btn btn-primary">Ordenar por zona</button>
                    <!--GROUP BUTTON-->
                    <div class="d-flex flex-column m-3">
                        <p>Ordenar por:</p>
                        <!--SORTING BY PRICE-->
                        <button type="submit" name="option" value="3" class="btn btn-primary">Precio maximo de alquiler</button>
                        <!--SORTING BY ROOMS-->
                        <button type="submit" name="option" value="4" class="btn btn-primary">Numero minimi de habitaciones</button>
                    </div>
                    <!--DELETE A PLACE-->
                    <button type="submit" name="option" value="5" class="btn btn-primary">Eliminar una vivienda</button>
                    <!--MODIFY A PLACE-->
                    <button type="submit" name="option" value="6" class="btn btn-primary">Modificar zona o precio de una vivienda</button>
                    <!--HIDDEN INPUT-->
                    <input class="form-check-input mt-0"  name="places" type="hidden" value="<?php echo base64_encode(serialize($places)) ?>" aria-label="Checkbox for following text input">

                </form>
                <!--END MAIN FORM-->
                <?php
//                CONDITINAL TO CHECK WHICH BUTTONS WAS PUSHED
                if (isset($option)) {
                    switch ($option) {
//                        SHOW ALL PLACES
                        case 1:
                            showArray($places);
                            break;
                        case 2:
//                         SORTING BY ZONE ASCENDANT
                            sortingByParameter($places, 'zone');
                            showArray($places);
                            break;
                        case 3:
//                            SORTING BY PRICE DESCENDANT
                            sortingByParameter($places, 'price', false);
                            showArray($places);
                            break;
                        case 4:
//                            SORTING BY NUMBER OF ROOMS ASCENDANT
                            sortingByParameter($places, 'rooms');
                            showArray($places);
                            break;
                        case 5:
//                            DELETE A ESPECIFIC PLACE
                            showArray($places);
                            ?>
                            <!--FORM TO SEND INDEX FOR DELETING ELEMENT-->
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="w-50 mb-3">
                                    <label for="index" class="form-label">Indica que vivienda desea borrar</label>
                                    <input type="number" name='indexDelete' class="form-control" id="indexDelete" aria-describedby="emailHelp">
                                    <!--HIDDEN INPUT-->
                                    <input class="form-check-input mt-0"  name="places" type="hidden" value="<?php echo base64_encode(serialize($places)) ?>" aria-label="Checkbox for following text input">

                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </form>
                            <!--END FORM-->
                            <?php
                            break;
                        case 6:
//                            MODIFY PRICE AND/OR ZONE TO A SPECIFIC PLACE
                            showArray($places);
                            ?>
                            <!--FORM TO PICK A PLACE TO MODIFY-->
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="w-50 mb-3">
                                    <label for="index" class="form-label">Indica que vivienda desea modificar</label>
                                    <input type="number" name='indexModify' class="form-control" id="indexModify" aria-describedby="emailHelp">
                                    <!--HIDDEN INPUT-->
                                    <input class="form-check-input mt-0"  name="places" type="hidden" value="<?php echo base64_encode(serialize($places)) ?>" aria-label="Checkbox for following text input">

                                    <button type="submit" class="btn btn-primary">Enviar</button>

                                </div>
                            </form>
                            <!--END FORM-->
                            <?php
                            break;
                    }
                }
                ?>
                <!--FORM TO COME BACK TO INDEX-->
                <<form action="http://localhost/ejerciciosUT3_4/index.php" method="post">
                    <!--HIDDEN INPUT-->
                    <input class="form-check-input mt-0"  name="places" type="hidden" value="<?php echo base64_encode(serialize($places)) ?>" aria-label="Checkbox for following text input">
                    <button type="submit" class="btn btn-primary">Volver al inicio</button>
                </form>

            </div>
        </div>
    </body>
</html>