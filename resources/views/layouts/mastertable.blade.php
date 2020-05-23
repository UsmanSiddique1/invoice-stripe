<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script type="text/javascript">
    function goBack(){
    window.history.back()
  }
  </script>
  <style type="text/css">
    .badge{
      font-size: 90% !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('Partials.nav')
@include('Partials.sidebar')

@yield('content')
@include('Partials.footer')


</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


$(document).ready(function(){



  $('#unit').change(function(){

    var unit = $('#unit option:selected').text();
    if (unit == 'Kilogram') {
      var kg = '';
      kg += "<div class='form-group kg'> <label>Quantity in KG</label><select name='qty' class='form-control' required><option selected='' disabled=''>Select</option><option value='0.5'>0.5KG</option><option value='0.250'>0.250KG</option><option value='0.175'>0.175KG</option><option value='1'>1KG</option><option value='1'>1KG</option><option value='2'>2KG</option><option value='3'>3KG</option><option value='4'>4KG</option><option value='5'>5KG</option><option value='10'>10KG</option><option value='15'>15KG</option><option value='20'>20KG</option></select></div>";

    $('.kg').remove();    
    $('.ltr').remove();
    $('.pc').remove();
    $('.append').append(kg);

    } else if(unit == 'Litrs'){

      var litr = '';

      litr += "<div class='form-group ltr'> <label>Quantity in Litrs</label><select name='qty' class='form-control' required><option selected='' disabled=''>Select</option><option value='0.5'>0.5KG</option><option value='0.250'>0.250ltr</option><option value='0.175'>0.175KG</option><option value='1'>1ltr</option><option value='2'>2ltr</option><option value='3'>3ltr</option><option value='4'>4ltr</option><option value='5'>5ltr</option></select></div>";
      
      $('.ltr').remove();
      $('.pc').remove();
      $('.kg').remove();
      $('.append').append(litr);
      

    } else if(unit == 'Peaice'){

      var peaice = '';

       peaice += "<div class='form-group pc'> <label>Quantity Peaice</label><select name='qty' class='form-control' required><option selected='' disabled=''>Select</option><option value='1'>1PC</option><option value='2'>2PCs</option><option value='3'>3pc</option><option value='4'>4PCs</option><option value='5'>5PCs</option></select></div>";

      $('.pc').remove();
      $('.ltr').remove();
      $('.kg').remove();
      $('.append').append(peaice);
     
    }
    

  });

  $('#unit-edit').change(function(){

    var unit_edit = $('#unit-edit option:selected').text();
    if (unit_edit == 'Kilogram') {
      var kg_edit = '';
      kg_edit += "<div class='form-group kg-edit'> <label>Quantity in KG</label><select name='qty' class='form-control' required><option selected='' disabled=''>Select</option><option value='0.5'>0.5KG</option><option value='0.250'>0.250KG</option><option value='0.175'>0.175KG</option><option value='1'>1KG</option><option value='1'>1KG</option><option value='2'>2KG</option><option value='3'>3KG</option><option value='4'>4KG</option><option value='5'>5KG</option><option value='10'>10KG</option><option value='15'>15KG</option><option value='20'>20KG</option></select></div>";

    $('.kg-edit').remove();    
    $('.ltr-edit').remove();
    $('.pc-edit').remove();
    $('.append-edit').append(kg_edit);

    } else if(unit_edit == 'Litrs'){

      var litr_edit = '';

      litr_edit += "<div class='form-group ltr-edit'> <label>Quantity in Litrs</label><select name='qty' class='form-control' required><option selected='' disabled=''>Select</option><option value='0.5'>0.5KG</option><option value='0.250'>0.250ltr</option><option value='0.175'>0.175KG</option><option value='1'>1ltr</option><option value='2'>2ltr</option><option value='3'>3ltr</option><option value='4'>4ltr</option><option value='5'>5ltr</option></select></div>";
      
      $('.ltr-edit').remove();
      $('.pc-edit').remove();
      $('.kg-edit').remove();
      $('.append-edit').append(litr_edit);
      

    } else if(unit_edit == 'Peaice'){

      var peaice_edit = '';

       peaice_edit += "<div class='form-group pc-edit'> <label>Quantity Peaice</label><select name='qty' class='form-control' required><option selected='' disabled=''>Select</option><option value='1'>1PC</option><option value='2'>2PCs</option><option value='3'>3pc</option><option value='4'>4PCs</option><option value='5'>5PCs</option></select></div>";

      $('.pc-edit').remove();
      $('.ltr-edit').remove();
      $('.kg-edit').remove();
      $('.append-edit').append(peaice_edit);
     
    }
    

  });
  

});




</script>
</body>
</html>
