<body style="min-height:calc(100vh - 83px) !important;">
    <div class="login-wrapper" style="min-height:calc(100vh - 83px) !important;">
      <div class="login-left">
        <canvas id="canvas"></canvas>
        <div class="h1">MadeiraMadeira</div>
      </div>
      <div class="login-right">
        <h1>GitHubTags</h1>
        <ul id="tabs-swipe-demo" class="tabs">
          <li class="tab col s6"><a  href="#login" class="active titleCss">LOGIN</a></li>
          <!-- <li class="tab col s6"><a class=" titleCss" href="#contato">Contato</a></li> -->
        </ul>
        <div class="tabs-content carousel carousel-slider">
    <!-- ===================LOGIN ============ -->
          <form action="">
            <div id="login" class=" carousel-item active" 
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
        </div>
      </div>
    </div>
