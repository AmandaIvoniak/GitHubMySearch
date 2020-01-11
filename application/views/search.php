<?php include 'assets/inc/header.php'; ?>
<?php include 'assets/inc/navbar.php'; ?>
<div class="position">
    <div class="container">
        <div class="card">
            <form>
                <div class="row">
                    <div class="col s8">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="search" type="text">
                            <label for="search">Pesquisar por repositório</label>
                        </div>
                    </div>
                    <div class="col s2">
                        <p>
                            <label style=" top:30%; position:absolute;">
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
                </div>
            </form>                
        </div>
    </div>
</div>
<?php include 'assets/inc/footer.php'; ?>
<?php include 'assets/inc/scripts.php'; ?>