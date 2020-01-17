<?php include 'assets/inc/header.php'; ?>
<?php include 'assets/inc/navbar.php'; ?>
<div class="position">
    <div class="row">        
        <div class="col s12">
            <div class="cardCustom">
                <ul class="collection with-header" style="overflow: initial;" id="reportByTag">
                <li class="collection-header">
                    <h5>Suas Tags</h5>
                      <div class="row">
                        <div class="input-field col s11" >
                          <select multiple id="selectTag" style="width: calc(100% - 66px); margin: 0 10px 0 0;">
                          </select>
                          <label>Selecione as tags desejadas</label>
                        </div>
                        <div class="input-field col s1">
                          <a onclick="searchTag();" id="searchTag" class="waves-effect waves-light btn purple">
                            <i class="material-icons">search</i>
                          </a>
                        </div>
                      </div>                    
                  </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include 'assets/inc/footer.php'; ?>
<?php include 'assets/inc/scripts.php'; ?>