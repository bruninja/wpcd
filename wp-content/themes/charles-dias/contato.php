<?php get_header(); ?>

<div class="row">

  <!-- Article main content -->
  <article class="col-sm-9 maincontent">
    <header class="page-header">
      <h1 class="page-title">Entre em contato</h1>
    </header>
    <br>
      <form>
        <div class="row">
          <div class="col-sm-4">
            <input class="form-control" type="text" placeholder="Nome">
          </div>
          <div class="col-sm-4">
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="col-sm-4">
            <input class="form-control" type="text" placeholder="Fone">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <textarea placeholder="Digite sua mensagem aqui..." class="form-control" rows="9"></textarea>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-6"></div>
          <div class="col-sm-6 text-right">
            <input class="btn btn-action" type="submit" value="Enviar Mensagem">
          </div>
        </div>
      </form>
  </article>
  <!-- /Article -->

  <!-- Sidebar -->
  <aside class="col-sm-3 sidebar sidebar-right">

    <div class="widget">
      <h4>Endereço</h4>
      <address>
        Ed. Century Multiempresarial, Sala 211
        <br>
        Av. dos Holandeses, Qd 11a, Lote 14
        <br>
        São Marcos, São Luís-MA
        <br>
        CEP:65075-650
      </address>
      <h4>Fone:</h4>
      <address>
        (98) 3199-1212 | (98) 3304-1211
      </address>
    </div>

  </aside>
  <!-- /Sidebar -->

</div>
</div>	<!-- /container -->

<section class="container-full top-space">
<div id="map"></div>
</section>

<?php get_footer(); ?>
