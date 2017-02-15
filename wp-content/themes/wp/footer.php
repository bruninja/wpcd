<div id="rodape">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-xs-5">
        <br />
        <br />
        <a href="#">
          <img alt="Charle Dias Advogados" src="<?php echo get_template_directory_uri(); ?>/res/img/charles-dias.png" class="img-responsive" />
        </a>
      </div>
      <div class="col-md-8 col-xs-7">
        <div id="endereco">
          <p>
            Ed. Century Multiempresarial, Sala 211 <br /> Av. dos Holandeses, Qd 11a, Lote 14 <br />
            São Marcos, São Luís-MA <br />
            CEP:65075-650<br />
          </p>
          <p>
            Telefone: (98) 3199-1212 | (98) 3304-1211<br />
            E-mail: <a href="mailto:contato@charlesdias.adv.br">contato@charlesdias.adv.br</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div id="direitos">
    <div class="container">
      <p class="text-center">Copyright 2017 © ▪ CHARLES DIAS ADVOGADOS ▪ Todos os direitos reservados</p>
    </div>
  </div>
</div>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/res/script/respond.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/res/script/modernizr.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/res/script/flexslider.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $('.flexslider').flexslider({
    animation: "slide",
    directionNav: true,
    start: function (slider) {
      $('body').removeClass('loading');
    }
  });


});
</script>

</body>

</html>
