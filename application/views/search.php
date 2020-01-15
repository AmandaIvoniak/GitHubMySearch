<?php include 'assets/inc/header.php'; ?>
<?php include 'assets/inc/navbar.php'; ?>
<div class="position">
    <div class="card z-depth-0 cardCustom">
        <form id="searchForm">
            <div class="row">
                <div class="col s6">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">search</i>
                        <input id="search" name="search" type="text" required>
                        <label for="search">Pesquisar por repositório</label>
                    </div>
                </div>
                <div class="col s2">
                    <p>
                        <label style=" top:30px; position:absolute;">
                            <input name="sort" value='stars' type="checkbox"/>
                            <span>Estrelas</span>
                        </label>
                    </p>
                </div>
                <div class="col s2">
                    <p>
                        <label style="">
                            <input name="order" type="radio" value='DESC' checked/>
                            <span>Desc</span>
                        </label>
                        <label style=" ">
                            <input name="order" type="radio" value='ASC'/>
                            <span>Asc</span>
                        </label>
                    </p>
                </div>
                <div class="col s2">
                    <div class="input-field col s12">
                        <button type="submit" id="searchBtn" class="right waves-effect waves-light btn deep-purple">Salvar</button>
                    </div>    
                </div>
            </div>
        </form>                
    </div>
    <div class="cardCustom">
        <ul class="collection">
            <div id="listSearch"></div>
        </ul>
    </div>
    <a id="addRepository" class="hide center btn-floating btn-large waves-effect waves-light purple">
    <i class="material-icons">add</i></a>
</div>
<?php include 'assets/inc/footer.php'; ?>
<?php include 'assets/inc/scripts.php'; ?>