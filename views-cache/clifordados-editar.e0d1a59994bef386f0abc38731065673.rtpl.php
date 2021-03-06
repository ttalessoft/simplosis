<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lista de Clientes
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Clientes</a></li>
      <li class="active"><a href="/admin/clifordados/novo">Cadastrar</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Editar Cliente</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="/admin/clifordados/editar" method="post" enctype="multipart/form-data">

            <!-- Tipo Pessoa -->
            <div class="box-body">
              <div class="form-group col-md-12">
                <label>
                  <input type="radio" id="cli_tipo_f" name="tipo_pe" class="" value="f">
                  Pessoa física
                </label>
                <label>
                  <input type="radio" id="cli_tipo_j" name="tipo_pe" class="" value="j">
                  Pessoa jurídica
                </label>

              </div>

              <div id="dados">

                <div id="dados_pf">
                  <!-- nome -->
                  <div class="form-group col-md-4">
                    <label for="cli_nome">Nome</label>
                    <input type="text" class="form-control" id="cli_nome" name="cli_nome" placeholder="Nome">
                  </div>

                  <!-- cpf -->
                  <div class="form-group col-md-4">
                    <label for="cli_cpf">Cpf</label>
                    <input type="text" class="form-control" id="cli_cpf" name="cli_cpf"
                      data-inputmask="'mask': ['999.999.999-99', '999.999.999-99']" data-mask
                      placeholder="000.000.000-00">
                  </div>

                  <!-- data nascimento -->
                  <div class="form-group col-md-4">
                    <label>Nascimento</label>
                    <div class="form-group">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="cli_data_nascimento"
                          placeholder="00/00/0000">
                      </div>
                    </div>
                  </div>

                </div>

                <div id="dados_pj">
                  <!-- razao social -->
                  <div class="form-group col-md-4">
                    <label for="cli_razao_social">Razão Social</label>
                    <input type="text" class="form-control" id="cli_razao_social" name="cli_razao_social"
                      placeholder="Razão Social">
                  </div>

                  <!-- cnpj -->
                  <div class="form-group col-md-4">
                    <label for="cli_cnpj">Cnpj</label>
                    <input type="text" class="form-control" id="cli_cnpj" name="cli_cnpj"
                      data-inputmask="'mask': ['99.999.999/9999-99', '99.999.999/9999-99']" data-mask
                      placeholder="00.000.000/0000-00">
                  </div>

                  <!-- ie -->
                  <Div class="form-group col-md-4">
                    <label for="cli_ie">Ins. Est.</label>
                    <input type="text" class="form-control" id="cli_ie" name="cli_ie"
                      data-inputmask="'mask': ['999999999999', '999999999999']" data-mask placeholder="000000000000">
                  </Div>

                </div>

                <!-- celular -->
                <div class="form-group col-md-6">
                  <label>Celular</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <input type="text" class="form-control"
                      data-inputmask="'mask': ['(99) 99999-9999', '+055 (99) 99999-9999']" data-mask name="cli_celular"
                      placeholder="(00) 00000-0000">
                  </div>
                </div>

                <!-- fixo -->
                <div class="form-group col-md-6">
                  <label>Fixo</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <input type="text" class="form-control"
                      data-inputmask="'mask': ['(99) 9999-9999', '+055 (99) 9999-9999']" data-mask name="cli_fixo"
                      placeholder="(00) 0000-0000">
                  </div>
                </div>

                <!-- email -->
                <div class="form-group col-md-12">
                  <label for="cli_email">E-Mail</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" placeholder="Email">
                  </div>
                </div>

                <!-- grupo -->
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label>Grupo</label>
                    <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">Sem grupo</option>
                      <option></option>
                      <option></option>
                      <option></option>
                      <option></option>
                      <option></option>
                    </select>
                  </div>
                </div>

                <div class="row">

                </div>

                <!-- cep -->
                <div class="form-group col-md-4">
                  <label>Cep</label>
                  <div class="input-group">
                    <input type="text" class="form-control" data-inputmask="'mask': ['99.999-999', '99.999-999']"
                      data-mask name="cli_cep" placeholder="00.000-000">
                    <div class="input-group-addon">
                      <a class="btn-sm" href="#">
                        <i class="fa fa-map-signs"> Buscar</i>
                      </a>
                    </div>
                  </div>
                </div>

                <!-- separador -->
                <div class="row">

                </div>

                <!-- logradouro -->
                <div class="form-group col-md-8">
                  <label for="cli_logradouro">Logradouro</label>
                  <input type="text" id="cli_logradouro" name="cli_logradouro" class="form-control">
                </div>

                <!-- número-->
                <div class="form-group col-md-4">
                  <label for="cli_logradouro">Número</label>
                  <input type="text" id="cli_numero" name="cli_numero" class="form-control">
                </div>

                <!-- bairro -->
                <div class="form-group col-md-6">
                  <label for="cli_bairro">Bairro</label>
                  <input type="text" id="cli_bairro" name="cli_bairro" class="form-control">
                </div>

                <!-- Uf -->
                <div class="form-group col-md-2">
                  <div class="form-group">
                    <label>Uf</label>
                    <select class="form-control select2" style="width: 100%;">
                      <option selected="selected">Uf</option>
                      <?php $counter1=-1;  if( isset($ufs) && ( is_array($ufs) || $ufs instanceof Traversable ) && sizeof($ufs) ) foreach( $ufs as $key1 => $value1 ){ $counter1++; ?>
                      <option value="<?php echo htmlspecialchars( $value1["idstate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["state"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <!-- cidade -->
                <div class="form-group col-md-4">
                  <label for="cli_cidade">Cidade</label>
                  <input type="text" id="cli_cidade" name="cli_cidade" class="form-control">
                </div>

                <!-- obs -->
                <div class="box-body col-md-12">
                  <label for="cli_obs">Observações</label>
                  <textarea class="textarea" placeholder="Digite algo sobre o cliente..."
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                    id="cli_obs" name="cli_obs"></textarea>
                </div>

              </div>

            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-default pull-right">Voltar</button>
              <button type="submit" class="btn btn-success pull-left">Salvar</button>
            </div>
          </form>
        </div>
        <!-- /.col (right) -->
      </div>
    </div>
</div>
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->