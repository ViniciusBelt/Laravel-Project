</div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ URL::asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ URL::asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ URL::asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ URL::asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ URL::asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ URL::asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ URL::asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ URL::asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ URL::asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ URL::asset('dist/js/pages/dashboard.js') }}"></script>
    
    <!-- Modal nova Solicitação -->
    <div class="modal fade" id="novaSolicitacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body" style="text-align: center">
                  <h4>Nova Solicitação</h4>
                  <div class="col" style="text-align: center">
                      <form action="/" method="post">
                          @csrf
                          <div class="form-group">
                              <label for="title" style="float: left;">Tipo de Solicitação</label>
                              <input type="text" class="form-control" id="tipo_solicitacao" name="tipo_solicitacao" placeholder="Tipo de Solicitação" maxlength="50">
                          </div>
                          <div class="form-group">
                              <label for="title" style="float: left;">Cliente</label>
                              <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Cliente" maxlength="50">
                          </div>
                          <div class="form-group">
                              <label for="title" style="float: left;">Solicitante</label>
                              <input type="text" class="form-control" id="solicitante" name="solicitante" placeholder="Solicitante" maxlength="50">
                          </div>
                          <div class="form-group">
                              <label for="title" style="float: left;">CPF/CNPJ/ID</label>
                              <input type="text" class="form-control" id="cpf_cnpj_id" name="cpf_cnpj_id" placeholder="CPF/CNPJ/ID" maxlength="14">
                          </div>
                          <div class="form-group">
                              <label for="title" style="float: left;">Data de Vencimento</label>
                              <input type="date" class="form-control" id="data_aprovacao" name="data_aprovacao" placeholder="Data de Vencimento">
                          </div>
                          <?php
                              $data = date('Y-m-d'); 
                          ?>
                          <input type="hidden" name="id_etapa" value="1" id="id_etapa" name="id_etapa">
                          <input type="hidden" name="data_solicitacao" value="<?php echo $data ?>" id="data_solicitacao" name="data_solicitacao">
                          <input type="submit" class="btn btn-primary" value="Salvar Solicitação">
                      </form>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              </div>
          </div>
      </div>
  </div>
  </body>
</html>
