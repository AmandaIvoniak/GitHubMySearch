<?php include 'assets/inc/header.php'; ?>
<?php include 'assets/inc/navbar.php'; ?>
<div class="position">
    <div class="row">
        <div class="col s12 m6">
            <div class="card cardCustom ">
                <ul class="collection with-header" id="tagList">   
                  <li class="collection-header">
                    <h5>Suas Tags</h5>
                    <input type="text" id="inputTag" placeholder="Tag..." style="width: calc(100% - 66px); margin: 0 10px 0 0;">
                    <a id="registerTag" class="waves-effect waves-light btn">
                      <i class="material-icons">add</i>
                    </a>
                  </li>
                </ul>
            </div>            
        </div>
        <div class="col s6 m6">
            <div class="card cardCustom">
                <ul class="collection with-header" id="reportByTag">
                    <li class="collection-header"><h4>Relatórios de repositório</h4></li>
                    <li class="collection-item truncate">
                      <div>NOME DA TAG                        
                          <p class="truncate">
                          PROJETO, PROJETO, PROJETO, PROJETO, PORJEssssss ssssssssssssssss
                          </p >
                       
                      </div>
                    </li>
                    <li class="collection-item truncate"><div>Nome do projeto<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item truncate"><div>Nome do projeto<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                    <li class="collection-item truncate"><div>Nome do projeto<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include 'assets/inc/footer.php'; ?>
<?php include 'assets/inc/scripts.php'; ?>