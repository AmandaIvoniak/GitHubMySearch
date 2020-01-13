<?php include 'assets/inc/header.php'; ?>
<?php include 'assets/inc/navbar.php'; ?>
<div class="position">
    <div class="card z-depth-0 cardCustom">
        <form>
            <div class="row">
                <div class="col s6">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">search</i>
                        <input id="search" type="text">
                        <label for="search">Pesquisar por repositório</label>
                    </div>
                </div>
                <div class="col s2">
                    <p>
                        <label style=" top:30px; position:absolute;">
                            <input type="checkbox"/>
                            <span>Estrelas</span>
                        </label>
                    </p>
                </div>
                <div class="col s2">
                    <p>
                        <label>
                            <input name="data" type="radio" checked/>
                            <span>Desc</span>
                        </label>
                        <label>
                            <input name="data" type="radio"/>
                            <span>Asc</span>
                        </label>
                    </p>
                </div>
                <div class="col s2">
                    <div class="input-field col s12">
                        <button type="submit" id="editBtn" class="right waves-effect waves-light btn deep-purple">Salvar</button>
                    </div>    
                </div>
            </div>
        </form>                
    </div>
    <div class="cardCustom">
        <ul class="collection">
            <li class="collection-item avatar">
                <i class="material-icons circle">folder</i>    
                <!-- <img src="images/yuna.jpg" alt="" class="circle"> -->
                <div class="row">
                    <div class="col s6">
                        <span class="title">Nome projeto</span>
                        <p>Descrição</p>
                        <i class="material-icons">grade</i>
                    </div>
                    <div class="col s6">
                        <p class="right" >Ultima atualização</p>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="chips chips-autocomplete"></div>
                    </div>
                    <div class="col s6">
                        <a class="btn-floating btn-large waves-effect waves-light purple right">
                        <i class="material-icons">check</i></a>
                    </div>
                </div>                
            </li>
            <li class="collection-item avatar">
                <i class="material-icons circle">folder</i>    
                <!-- <img src="images/yuna.jpg" alt="" class="circle"> -->
                <div class="row">
                    <div class="col s6">
                        <span class="title">Nome projeto</span>
                        <p>Descrição</p>
                        <i class="material-icons">grade</i>
                    </div>
                    <div class="col s6">
                        <p class="right" >Ultima atualização</p>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="chips chips-autocomplete"></div>
                    </div>
                    <div class="col s6">
                        <a class="btn-floating btn-large waves-effect waves-light purple right">
                        <i class="material-icons">check</i></a>
                    </div>
                </div>                
            </li><li class="collection-item avatar">
                <i class="material-icons circle">folder</i>    
                <!-- <img src="images/yuna.jpg" alt="" class="circle"> -->
                <div class="row">
                    <div class="col s6">
                        <span class="title">Nome projeto</span>
                        <p>Descrição</p>
                        <i class="material-icons">grade</i>
                    </div>
                    <div class="col s6">
                        <p class="right" >Ultima atualização</p>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="chips chips-autocomplete"></div>
                    </div>
                    <div class="col s6">
                        <a class="btn-floating btn-large waves-effect waves-light purple right">
                        <i class="material-icons">check</i></a>
                    </div>
                </div>                
            </li><li class="collection-item avatar">
                <i class="material-icons circle">folder</i>    
                <!-- <img src="images/yuna.jpg" alt="" class="circle"> -->
                <div class="row">
                    <div class="col s6">
                        <span class="title">Nome projeto</span>
                        <p>Descrição</p>
                        <i class="material-icons">grade</i>
                    </div>
                    <div class="col s6">
                        <p class="right" >Ultima atualização</p>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="chips chips-autocomplete"></div>
                    </div>
                    <div class="col s6">
                        <a class="btn-floating btn-large waves-effect waves-light purple right">
                        <i class="material-icons">check</i></a>
                    </div>
                </div>                
            </li>
        </ul>
    </div>
</div>
<?php include 'assets/inc/footer.php'; ?>
<?php include 'assets/inc/scripts.php'; ?>