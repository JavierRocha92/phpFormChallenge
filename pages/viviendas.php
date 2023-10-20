<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicios UT3_3</title>
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
                <!--FILTER IF INPUT_POST EXIST OR NOT-->
                <?php
                if (isset($_POST['places'])) {
                    $places = unserialize(base64_decode($_POST['places']));
                }
                $keysPlace = ['type', 'zone', 'address', 'rooms', 'price', 'photo', 'checkList', 'textarea'];
//                var_dump($_POST);
                echo '<br>';
//                CREATE AN ARRAY TO STORAGE SPECIFIC PLACE VALUES
                $place = [];
//                DECLARE VARIBALE TO COUNT ITERATIONS FROM FOR EACH
                $iterator = 0;
//                var_dump($_POST);
//                CONDITIONAL TO CHECK IF $_POST EXISTS OR NOT
                if (isset($_POST)) {
//                    FOR EACH TO ITERATE ALL VALUES FROM $_POST
                    foreach ($_POST as $key => $value) {
                        if ($key != 'places') {

//                        CONDITIONAL TO CHECK IF $KEY IS EQUALS TO VALUE INS THIS INDEX ON $KEYPLACES
                            if ($key == $keysPlace[$iterator]) {
                                //CONDITIONAL TO CHECK IF VALUE IS OR NOT AN ARRAY
                                if (is_array($value)) {
                                    //DECLARE VARIBALE TO STORAGE ALL VALUES IN IT SEPARATED BY COMMAS
                                    $amount = '';
                                    foreach ($value as $data) {
                                        $amount .= $data . ' ';
                                    }
                                    $value = $amount;
                                }
//                            IF MATCHES ASSIGN VALUE INTO $PLACE ARRAY
                                $place [$keysPlace[$iterator]] = $value;
                            } else {
//                            IF NOT MATCHES ASSIGN EMPTY VALUES UNTIL $KEY MATCHES AGAIN
                                while ($key != $keysPlace[$iterator]) {
                                    $place [$keysPlace[$iterator]] = '';
                                    $iterator++;
                                }
//                            OUTSIDE WHILE LOOP ASSIGN NEW VALUE INTO $PLACE ARRAY
                                $place [$keysPlace[$iterator]] = $value;
                            }
//                        INCREASE ITERATOR
                            $iterator++;
                        }
                    }
                    echo 'este es elarray individual';
                    echo '<br>';
                    print_r($place);
                    //CALLING ARRAY IF EXISTS, IF NOT CREATE A NEW ARRAY
                    if (isset($places)) {
                        //INSERT ARRAY PLACE INTO PLACES ARRAY
                        array_push($places, $place);
                    }
                   
                }
                ?>
                <h2>La insercion de los datos se ha realizado con exito</h2>

                <!--FORM-->
                <form class="form" method="post" action="http://localhost/ejerciciosUT3_4/index.php">
                    <!--SEND MAIN ARRAY BY HIDDEN INPUT THROUGH FORM-->
                    <input class="form-check-input mt-0"  name="places" type="hidden" value="<?php echo base64_encode(serialize($places)); ?>" aria-label="Checkbox for following text input">

                    <!--BUTTON TO GO TO INDEX-->
                    <button class="btn btn-primary" type="submit" href="../index.php">Volver al index</a>
                </form>
            </div>
        </div>
    </body>
</html>