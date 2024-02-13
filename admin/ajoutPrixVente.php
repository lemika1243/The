<?php
include "header.php";
?>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title">Inline forms</h4>
        <form class="form-inline" action="">
            <div class="form-group">
                <label for="exampleFormControlSelect3">Select The</label>
                <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="the">
                <option>Cueilleur1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>
            
            <label for="inlineFormInputName2">prixVente</label>
            <input type="number" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="prixVente" value=0>
            <button type="submit" class="btn btn-gradient-primary mb-2">Valider</button>
        </form>
<?php
    include "footer.php";
?>