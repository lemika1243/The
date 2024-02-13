<?php
    include "header.php";
    include "../Function/function_get.php";
    $the = getThe();
    $mois = getMois();
?>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title">Choix Mois</h4>
        <form class="form-inline" action="traitement/insertConfiguration.php">
            <div class="row"> 
                <?php for ($i=0; $i <count($mois) ; $i++) { ?>
                    <div class="form-check mx-sm-2">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name ="choix[]" value = "<?php echo($i+1) ?>"> <?php echo($mois[$i]) ?> </label>
                    </div>
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-gradient-primary mb-2">Valider</button>
        </form>
<?php
    include "footer.php";
?>