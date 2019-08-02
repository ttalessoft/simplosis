<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cadastro de Grupos Cliente/Fornecedor
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/admin/cliforgrupo/listar">Grupos</a></li>
      <li class="active"><a href="/admin/cliforgrupo/novo">Novo</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Novo Grupo</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/cliforgrupo/novo" method="POST">
            <div class="box-body">
              <div class="form-group col-md-8">
                <label for="name">Nome do Grupo</label>
                <input type="text" class="form-control" id="name" name="grupo" placeholder="Digite o nome do Grupo"
                  required>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->