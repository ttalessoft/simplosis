<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cadastro de Cidades
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="/admin/cities">Cidades</a></li>
      <li class="active"><a href="/admin/cities/create">Cadastrar</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Nova Cidade</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/cities/create" method="post">
            <div class="box-body">
              <div class="form-group col-md-8">
                <label for="name">Nome da cidade</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome da Cidade">
              </div>
              <div class="form-group col-md-4">
                <label>Uf</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Uf</option>
                  <option>AC</option>
                  <option>AL</option>
                  <option>AM</option>
                  <option>AP</option>
                  <option>BA</option>
                  <option>CE</option>
                  <option>DF</option>
                  <option>ES</option>
                  <option>GO</option>
                  <option>MA</option>
                  <option>MG</option>
                  <option>MS</option>
                  <option>MT</option>
                  <option>PA</option>
                  <option>PB</option>
                  <option>PE</option>
                  <option>PI</option>
                  <option>PR</option>
                  <option>RJ</option>
                  <option>RN</option>
                  <option>RO</option>
                  <option>RR</option>
                  <option>RS</option>
                  <option>SC</option>
                  <option>SE</option>
                  <option>SP</option>
                  <option>TO</option>
                </select>
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