<?php
    include "header.php";
?>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title">Inline forms</h4>
        <form class="form-inline" action="tablePaiement.php" method="POST">
            <label for="inlineFormInputName2">date entre : </label>
            <input type="date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="dateMin">
            <label for="inlineFormInputName2"> et </label>
            <input type="date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="dateMax">
            <button type="submit" class="btn btn-gradient-primary mb-2">Valider</button>
        </form>
<?php
    include "footer.php";
?>