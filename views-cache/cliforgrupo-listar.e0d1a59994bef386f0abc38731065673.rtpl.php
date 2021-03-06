<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lista de Grupos de Clientes/Fornecedores
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="/admin/cliforgrupo/listar">Grupos</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">


    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">

          <div class="box-header">
            <a href="/admin/cliforgrupo/novo" class="btn btn-success">Novo</a>
          </div>

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="text-align: center;">#</th>
                  <th>Descrição</th>
                  <th style="text-align: center;">Menu</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter1=-1;  if( isset($cliforgrupos) && ( is_array($cliforgrupos) || $cliforgrupos instanceof Traversable ) && sizeof($cliforgrupos) ) foreach( $cliforgrupos as $key1 => $value1 ){ $counter1++; ?>

                <tr>
                  <td style="text-align: center;"><?php echo htmlspecialchars( $value1["idcliforgru"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo tirarAcentos(utf8_encode($value1["grupo"])); ?></td>
                  <td style="text-align: center;">
                    <a href="/admin/cliforgrupo/editar/<?php echo htmlspecialchars( $value1["idcliforgru"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i
                        class="fa fa-edit"></i>
                      Editar</a>
                    <a href="/admin/cliforgrupo/<?php echo htmlspecialchars( $value1["idcliforgru"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/excluir"
                      onclick="return confirm('Deseja realmente excluir este registro?')"
                      class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                  </td>
                </tr>
                <?php } ?>

              </tbody>
              <tfoot>
                <tr>
                  <th style="text-align: center;">#</th>
                  <th>Descrição</th>
                  <th style="text-align: center;">Menu</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->