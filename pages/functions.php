<?php

/**
 * function to show all values of a given array by table format
 * 
 * @param array $array
 */
function showArray($array) {
    foreach ($array as $index => $place) {
        ?>
        <h2>Vivienda numero <?php echo $index + 1 ?></h2>
        <table class="table">
            <tr>
                <th>Data</th>
                <th>Value</th>
            </tr>
            <?php
            foreach ($place as $key => $data) {
                ?>
                <tr>
                    <td class="td"> <?php echo $key ?> </td>
                    <?php
                    if ($key == 'photo') {
                        ?>
                        <td class="td">
                            <div class="container__image">
                                <img class="image" src="../assets/images/<?php echo $data ?>">
                            </div>
                        </td>
                        <?php
                    } else {
                        ?>
                        <td class="td"> <?php echo $data ?></td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
}

/**
 * function to remove element by index form an array given both as parameter
 * 
 * @param number $n
 * @param array $places
 */
function deletePlace($n, &$places) {
    unset($places[$n - 1]);
    $places = array_values($places);
}

/**
 * function to show a form to pick new values up to modify and send back to gestionarVivienda.php
 * 
 * @param int $index index for a specific place in places array
 */
function showModifyMenu($index,&$places) {
    ?>
    <form action="../pages/gestionatViviendas.php" method="post">
        <h2>Rellene los campos con los nuevos valores para cada atributo</h2>
        <div class="w-50 mb-3">
            <label for="newPrice" class="form-label">Nuevo valor para precio</label>
            <input type="number" name='newPrice' class="form-control" id="newPrice" aria-describedby="emailHelp">
            <label for="newZone" class="form-label">Nuevo valor para zona</label>
            <select class="form-select form-select-sm" name="newZone" aria-label="Small select example">
                <option disabled selected>Zona</option>
                <option value="Centro">Centro</option>
                <option value="Sur">Sur</option>
                <option value="Norte">Norte</option>
                <option value="Este">Este</option>
                <option value="Oeste">Oeste</option>
            </select>
            <input type="hidden" name='indexPlace' value="<?php echo $index ?>" class="form-control" id="indexPlace" aria-describedby="emailHelp">
            <!--HIDDEN INPUT-->
            <input class="form-check-input mt-0"  name="places" type="hidden" value="<?php echo base64_encode(serialize($places)) ?>" aria-label="Checkbox for following text input">

            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
        <p class="form-label">* Los atributos que usted deje en blanco tomaran el valor que tenian por defecto</p>
    </form>
    <?php
}

/**
 * functin to change diferent values if are not empty to a specific elemento from $places array
 * 
 * @param number $index
 * @param number $newPrice
 * @param text $newZone
 * @param array $places
 */
function modifyPlace($index, $newPrice, $newZone, &$places) {
    if (!empty($newPrice)) {
        $places[$index - 1]['price'] = $newPrice;
    }
    if (!empty($newZone)) {
        $places[$index - 1]['zone'] = $newZone;
    }
}

/**
 * function to sort an array of arrays by a paramters in the order given as parameter
 * 
 * @param array $places
 * @param string $parameter
 * @param boolean $order
 */
function sortingByParameter(&$places, $parameter, $order = true) {
    //DECLARE AUX VARIBALE TO CHANGE VALUES AS FOLLOWS
    $aux;
    if ($order) {
        for ($j = 0; $j < count($places) - 1; $j++) {
            for ($i = 0; $i < count($places) - 1; $i++) {
                if ($places[$i][$parameter] > $places[$i + 1][$parameter]) {
                    $aux = $places[$i];
                    $places[$i] = $places[$i + 1];
                    $places[$i + 1] = $aux;
                }
            }
        }
    } else {
        for ($j = 0; $j < count($places) - 1; $j++) {
            for ($i = 0; $i < count($places) - 1; $i++) {
                if ($places[$i][$parameter] < $places[$i + 1][$parameter]) {
                    $aux = $places[$i];
                    $places[$i] = $places[$i + 1];
                    $places[$i + 1] = $aux;
                }
            }
        }
    }
}
?>
