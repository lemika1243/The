<?php
    include "header.php";
    include "../Function/function_get.php";
    $min=$_POST["dateMin"];
    $max=$_POST["dateMax"];
    $listPaiement=listePay($min,$max);
?>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title">Inline forms</h4>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Striped Table</h4>
                <p class="card-description"> Add class <code>.table-striped</code>
                </p>
                <table class="table table-striped">
                <thead>
                    <th> nom </th>
                    <th> poids </th>
                    <th> bonus </th>
                    <th> minus </th>
                    <th> paiement </th>

                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($listPaiement); $i++) { ?>
                        <tr>
                        <td> <?= $listPaiement[$i]["nom"] ?> </td>
                        <td>
                            <?= $listPaiement[$i]["sommeCueilli"] ?>
                            </div>
                        </td>
                        <td> <?= $listPaiement[$i]["bonus"] ?> </td>
                        <td> <?= $listPaiement[$i]["mallus"] ?> </td>
                        <td> <?= $listPaiement[$i]["paiement"] ?> </td>
                        </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
            </div>
<?php
    include "footer.php";
?>