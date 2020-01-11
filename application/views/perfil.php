<?php include 'assets/inc/header.php'; ?>
<?php include 'assets/inc/navbar.php'; ?>
<div class="position">
    <div class="container">
        <div class="card cardCustom">
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name" name="name" type="text">
                            <label for="name">Nome</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">email</i>
                            <input id="email" name="email" type="email">
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
                    <button type="submit" id="editBtn" class="right waves-effect waves-light btn deep-purple">Salvar</button>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'assets/inc/footer.php'; ?>
<?php include 'assets/inc/scripts.php'; ?>
