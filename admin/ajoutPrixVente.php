<?php
    include "header.php";
    include "../Function/function_get.php";

    $the = getThe();

?>

<script type="text/javascript" src="../assets/js/vanilla.js"></script> 
<script type="text/javascript">
    
    window.addEventListener("load", function () {

        function fillData(){

          var xhr = getXhr();
          xhr.onreadystatechange  = function() 
          { 
             if(xhr.readyState  == 4){
                if(xhr.status  == 200) {
                  var info = JSON.parse(xhr.responseText);

                  prix.setAttribute("value",info.prixVente) ;
                
                } 
            }
          };

          //XMLHttpRequest.open(method, url, async)
          xhr.open("POST", "traitement/getTheById.php",  false); 
          xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
          //XMLHttpRequest.send(body)
          xhr.send('id='+encodeURIComponent(document.getElementById("idThe").value));
        }
        //fillData();

  
        var input = document.getElementById("idThe");
        var prix = document.getElementById("prixVente");
        fillData();
        input.addEventListener('change', function(){ 
            fillData();
;        });
    });

</script>

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title"></h4>
        <form class="form-inline" action="traitement/updateThe.php" method="get">
            <div class="form-group">
                <label for="exampleFormControlSelect3">Select The</label>
                <select class="form-control form-control-sm" id="idThe" name="idThe">
                    <?php for($i = 0 ; $i<count($the) ; $i++) {  ?>
                        <option value="<?php echo($the[$i]['id']); ?>"><?php echo($the[$i]['nom']); ?></option>
              
                <?php } ?></select>
            </div>
            
            <label for="inlineFormInputName2">prixVente</label>
            <input type="number" class="form-control mb-2 mr-sm-2" id="prixVente" name="prixVente" >
            <button type="submit" class="btn btn-gradient-primary mb-2">Valider</button>
        </form>
<?php
    include "footer.php";
?>