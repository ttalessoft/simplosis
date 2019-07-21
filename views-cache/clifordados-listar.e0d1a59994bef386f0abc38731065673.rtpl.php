<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lista de Clientes
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="/admin/clifordados/listar">Clientes</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">


    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">

          <div class="box-header">
            <a href="/admin/clifordados/novo" class="btn btn-success">Novo</a>
          </div>

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Tipo?</th>
                  <th class="text-center">Cliente/Fornecedor?</th>
                  <th>Nome/Razão Social</th>
                  <th>CPF/CNPJ</th>
                  <th>Grupos Cliente</th>
                  <th>Cidade - Uf</th>
                  <th class="text-center">Menu</th>
                </tr>
              </thead>
              <tbody>
                <?php $counter1=-1;  if( isset($clifordados) && ( is_array($clifordados) || $clifordados instanceof Traversable ) && sizeof($clifordados) ) foreach( $clifordados as $key1 => $value1 ){ $counter1++; ?>

                <tr>
                  <td style="text-align: center;"><?php echo htmlspecialchars( $value1["idclifor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td class="text-center"><?php echo retornoSigla($value1["tipo_pe"]); ?></td>
                  <td class="text-center"><?php echo retornoSigla($value1["tipo_cf"]); ?></td>
                  <td><?php echo htmlspecialchars( $value1["nome_rs"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["cpf_cnpj"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["grupo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td><?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                  <td style="text-align: center;">
                    <a href="/admin/clifordados/editar/<?php echo htmlspecialchars( $value1["idclifor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i
                        class="fa fa-edit"></i>
                      Editar</a>
                    <a href="/admin/clifordados/<?php echo htmlspecialchars( $value1["idclifor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/excluir"
                      onclick="return confirm('Deseja realmente excluir este registro?')"
                      class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                  </td>
                </tr>
                <?php } ?>

              </tbody>
              <tfoot>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Tipo?</th>
                  <th class="text-center">Cliente/Fornecedor?</th>
                  <th>Nome/Razão Social</th>
                  <th>CPF/CNPJ</th>
                  <th>Grupos Cliente</th>
                  <th>Cidade - Uf</th>
                  <th class="text-center">Menu</th>
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