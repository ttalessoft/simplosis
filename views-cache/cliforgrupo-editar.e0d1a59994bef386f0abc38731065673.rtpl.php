<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Editar - Grupo Cliente/Fornecedor
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Editar</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/cliforgrupo/editar/<?php echo htmlspecialchars( $cliforgrupo["idcliforgru"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="grupo">Nome do Grupo</label>
                <input type="text" class="form-control" id="grupo" name="grupo" placeholder="Digite o nome da categoria"
                  value="<?php echo htmlspecialchars( $cliforgrupo["grupo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->