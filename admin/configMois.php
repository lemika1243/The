<?php
include "header.php";
?>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title">Inline forms</h4>
        <form class="form-inline" action="">
            <div class="form-group">
                <label for="exampleFormControlSelect3">Select variete de the</label>
                <select class="form-control form-control-sm" id="exampleFormControlSelect3" name="the">
                <option>the1</option>
                <option>the2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>
            <div class="form-check mx-sm-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Janvier </label>
            </div>
            <div class="form-check mx-sm-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Janvier </label>
            </div>
            <div class="form-check mx-sm-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Fevrier </label>
            </div>
            <div class="form-check mx-sm-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Mars </label>
            </div>
            <div class="form-check mx-sm-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Avril </label>
            </div>
            <div class="form-check mx-sm-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Mais </label>
            </div>
            <div class="form-check mx-sm-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Juin </label>
            </div>
            <div class="form-check mx-sm-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Juillet </label>
            </div>
            <div class="form-check mx-sm-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Auot </label>
            </div>
            <div class="form-check mx-sm-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Septembre </label>
            </div>
            <div class="form-check mx-sm-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Octobre </label>
            </div><div class="form-check mx-sm-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Novembre </label>
            </div><div class="form-check mx-sm-2">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" checked> Decembre </label>
            </div>
            <button type="submit" class="btn btn-gradient-primary mb-2">Valider</button>
        </form>
<?php
    include "footer.php";
?>