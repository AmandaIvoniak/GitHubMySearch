<?php include 'assets/inc/header.php'; ?>

    <div class="login-wrapper">      
      <div class="login-left">
        <canvas id="canvas"></canvas>
        <div class="h1">GitHubMySearch</div>
      </div>
      <div class="login-right">
        <h4>GitHubMySearch</h4>
        <ul id="tabs-swipe-demo" class="tabs">
          <li class="tab col s6"><a  href="#login" class="active titleCss">LOGIN</a></li>
          <li class="tab col s6"><a  href="#register" class="active titleCss">CADASTRO</a></li>
        </ul>
        <div class="tabs-content carousel carousel-slider">
          <!-- ===================LOGIN ============ -->
          <form action="" id="login">
            <div  class=" carousel-item active" 
            style="z-index: 0; opacity: 1; visibility: visible;">
              <div class="form-group">
                <input type="text" name="email" id="email" placeholder="E-mail" required>
                <label for="email">E-mail</label>    
              </div>
              <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Senha" required>
                <label for="password">Senha</label>    
              </div>
              <div class="button-area">
                <button type="submit" id="logarBtn" class="btn btn-secondary white">Login</button>
              </div>
            </div>
          </form>
          <!-- ===================Cadastro ============ -->
          <form action="" id="register" >
            <div class="carousel-item active" 
            style="z-index: 0; opacity: 1; visibility: visible;">
            <div class="form-group">
                <input type="text" name="name_user" id="name_user" placeholder="Nome" required>
                <label for="name_user">Nome</label>    
              </div>
              <div class="form-group">
                <input type="text" name="email" id="email" placeholder="E-mail" required>
                <label for="email">E-mail</label>    
              </div>
              <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Senha" required>
                <label for="password">Senha</label>    
              </div>
              <div class="form-group">
                <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Senha Novamente" required>
                <label for="passwordConfirm">Senha Novamente</label>    
              </div>
              <div class="button-area">
                <button type="submit" id="registerBtn" class="btn btn-secondary white">Cadastrar!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
<?php include 'assets/inc/scripts.php'; ?>
