<?php include 'assets/inc/header.php'; ?>
<?php include 'assets/inc/navbar.php'; ?>
<div class="position ">
    <div class="card cardCustom">
        <div class="row">
            <form class="col s12" id="formEdit">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input placeholder="Placeholder" id="name_user" name="name_user" type="text">
                        <label for="name_user">Nome</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">email</i>
                        <input  placeholder="Placeholder" id="email" name="email" type="email">
                        <label for="email">E-Mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">lock</i>
                        <input id="password" name="password" type="password">
                        <label for="password">Senha</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">lock</i>
                        <input id="passwordConfirm" name="passwordConfirm" type="password">
                        <label for="passwordConfirm">Senha Novamente</label>
                    </div>
                </div>                   
                <div class="input-field col s12">
                <button type="submit" id="" class="editBtn right waves-effect waves-light btn deep-purple">Salvar</button>
                </div>                    
            </form>
        </div>
    </div>
    <div class='row'>
        <div class="col s12 m7">
            <div class=" cardCustom ">
                <ul class="collection with-header" id="tagList">   
                <li class="collection-header">
                    <h5>Suas Tags</h5>
                    <input type="text" id="inputTag" placeholder="Tag..." style="width: calc(100% - 66px); margin: 0 10px 0 0;">
                    <a id="registerTag" class="waves-effect waves-light btn purple">
                        <i class="material-icons">add</i>
                    </a>
                </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include 'assets/inc/footer.php'; ?>
<?php include 'assets/inc/scripts.php'; ?>
