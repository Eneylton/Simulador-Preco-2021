</section>
</div>
<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Eneylton Barros</a>.</strong>
    eneylton@hotmail.com.
    <div class="float-right d-none d-sm-inline-block">
      <b>Versão </b> 2021
    </div>
  </footer>

  

</div>

<script>
$(document).ready(function(){
 
 $('#status').bootstrapToggle({
  on: 'Noite',
  off: 'Dia',
  onstyle: 'success',
  offstyle: 'danger'
 });

 $('#status').change(function(){
  if($(this).prop('checked'))
  {
   $('#status').val('Noite');
  }
  else
  {
   $('#status').val('Dia');
  }
 });

 $('#insert_data').on('submit', function(event){
  event.preventDefault();

 if($('#status').val() != '')
  {
var status=$('#status').val();


   $.ajax({
	   
    url:"index.php",
    method:"POST",
    data:$(this).serialize(),
    success:function(data){
		
     if(data == 'done')
     {
      $('#insert_data')[0].reset();
      $('#status').bootstrapToggle('on');
      alert("Data Inserted");
     }
    }
   });
}
 });

});
</script>


<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/chart.js/Chart.min.js"></script>
<script src="assets/plugins/sparklines/sparkline.js"></script>
<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="assets/dist/js/adminlte.js"></script>
<script src="assets/dist/js/demo.js"></script>
<script src="assets/dist/js/pages/dashboard.js"></script>
</body>
</html>
