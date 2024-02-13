<?php
    include "header.php";
    include "../Function/function_get.php";
    $cueilleur = getCueilleur();
?>
<script type="text/javascript" src="../assets/js/vanilla.js"></script> 
<script type="text/javascript">
    
    window.addEventListener("load", function () {

        function fillData(){

          var xhr = getXhr();
          xhr.onreadystatechange  = function() 
          { 
                console.log("here");
             if(xhr.readyState  == 4){
                if(xhr.status  == 200) {
                  var info = JSON.parse(xhr.responseText);

                  dateEmbauche.setAttribute("value",info.dateEmbauche) ;
                  console.log(dateEmbauche);
                  salaire.value = info.salaire;
                  poidMin.value = info.poidsMinimal;
                  bonus.value = info.bonus;
                  mallus.value = info.mallus; 

                } 
            }
          };

          //XMLHttpRequest.open(method, url, async)
          xhr.open("POST", "traitement/getCueilleurById.php",  false); 
          xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
          //XMLHttpRequest.send(body)
          xhr.send('id='+encodeURIComponent(document.getElementById("idcueilleur").value));
        }
        //fillData();

  
        var input = document.getElementById("idcueilleur");
        console.log(input);
        var dateEmbauche =  document.getElementById("dateEmbauche") ;
        var salaire = document.getElementById("salaire");
        var poidMin = document.getElementById("poidMin") ;
        var bonus = document.getElementById("bonus");
        var mallus = document.getElementById("malus");
        fillData();
        input.addEventListener('change', function(){ 
            fillData()
;        });
    });

</script>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title">Inline forms</h4>
        <form class="form-inline" action="traitement/updateCueilleur.php" method="get">
            <div class="form-group">
                <label for="exampleFormControlSelect3">Select Cueillleur</label>
                <select class="form-control form-control-sm" id="idcueilleur" name="idcueilleur">
                    <?php  for($i = 0; $i<count($cueilleur) ;$i++) {?>
                        <option value="<?php echo($cueilleur[$i]['id']) ?>"> <?php echo($cueilleur[$i]['nom']) ?> </option>
                    <?php } ?>
                </select>
            </div>
            <label for="inlineFormInputName2">Date Embauche</label>
            <input type="date" class="form-control mb-2 mr-sm-2" id="dateEmbauche" name="dateEmbauche">
            <label for="inlineFormInputName3">Salaire</label>
            <input type="number" class="form-control mb-2 mr-sm-2" id="salaire" name="salaire" >
            <label for="inlineFormInputName2">Point minimale</label>
            <input type="number" class="form-control mb-2 mr-sm-2" id="poidMin" name="poidMin" >
            <label for="inlineFormInputName2">bonus</label>
            <input type="number" class="form-control mb-2 mr-sm-2" id="bonus" name="bonus" >
            <label for="inlineFormInputName2">malus</label>
            <input type="number" class="form-control mb-2 mr-sm-2" id="malus" name="malus" >
            
            <button type="submit" class="btn btn-gradient-primary mb-2">Valider</button>
        </form>
<?php
    include "footer.php";
?>