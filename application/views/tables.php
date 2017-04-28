<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/boostrap_warmth_color/css/bootstrap.min.css')?>">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/pdfmake-0.1.18/dt-1.10.13/af-2.1.3/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.1/rg-1.0.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.css"/>

</head>
<body class="container">
  <h1>Hello, world!</h1>
  <div class="">
    <table id="datatables" class="table table-hover cell-border display nowrap w-100">
      <thead>
        <tr>
          <th>Nuumber</th>
          <th>Datetime</th>
          <th>TextDecoded</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Nuumber</th>
          <th>Datetime</th>
          <th>TextDecoded</th>
        </tr>
      </tfoot>
    </table>
  </div>
  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="<?=base_url('assets/boostrap_warmth_color/js/bootstrap.min.js')?>"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/pdfmake-0.1.18/dt-1.10.13/af-2.1.3/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.1/rg-1.0.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
  <script type="text/javascript" src=https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.9.0/jquery.mark.min.js></script>
  <!-- remote_host, time_stamp, request_method, request_protocol, request_uri, status, bytes, referer, site -->
  <script>
  $(document).ready(function() {
    $('#datatables').DataTable({
      "ajax": "http://localhost/sms/index.php/api/get/<?php echo$table?>",
      "columns" :  [
        { "data" : null },
        { "data" : null },
        { "data" : "TextDecoded" }
      ], "columnDefs": [{
        "render": function ( data, type, row ) {
          if(typeof(row['DestinationNumber']) != "undefined" && row['DestinationNumber'] !== null) {
            return row['DestinationNumber'];
          } else if(typeof(row['SenderNumber']) != "undefined" && row['SenderNumber'] !== null) {
            return row['SenderNumber'];
          }
        },
        "targets": 0
      }, {
        "render": function ( data, type, row ) {
          if(typeof(row['ReceivingDateTime']) != "undefined" && row['ReceivingDateTime'] !== null) {
            return row['ReceivingDateTime'];
          } else if(typeof(row['SendingDateTime']) != "undefined" && row['SendingDateTime'] !== null) {
            return row['SendingDateTime'];
          }
        },
        "targets": 1
      }]
    });
  } );
  </script>
</body>
</html>
