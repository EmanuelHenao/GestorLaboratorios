<div class="modal-body">
  <div class="page-wrapper p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
      <div class="card card-1">
        <div class="card-body">
          <form action="" method="POST" onsubmit="return validarLogin();">
            <?php
            if(isset($errorLogin)){
              echo "<i style='color: red;'>*".$errorLogin."</i>";
            }
            ?>
            <div class="input-group">
              <input class="input--style-1" type="number" placeholder="Código" name="codigo" id="codigo">
            </div>
            <div class="row row-space">
              <div class="input-group">
                <input type="password" name="pass" id="pass" class="input--style-1" placeholder="Contraseña">
              </div>
            </div>
            <div class="p-t-20">
              <button class="btn btn--radius btn--green" type="submit">Entrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
