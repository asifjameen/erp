
  var start = moment().subtract(29, 'days');
  var end = moment();

  function cb(start, end) {
    $('#reportrange span').html(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
  }

  $('#reportrange').daterangepicker({
    startDate: start,
    endDate: end, 
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
  }, cb);

  cb(start, end);


  var start = moment().subtract(29, 'days');
  var end = moment();

  function cb(start, end) {
    $('#reportrangeEnd span').html(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
  }

  $('#reportrangeEnd').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
  }, cb);

  cb(start, end);
// alert("s");

//   $(document).on('click', '#search_sales_report', function(event) {
//     event.preventDefault();

//     issuedate = $.trim($("#search_date").text());
//     // var customer = $("#customer option:selected").val();
//     var customer = '1';

//     $.post('invoice_report_table.php', {
//       customer: customer,
//       issuedate: issuedate
//     }, function(data) {
//       $('.inv_table').load('product_table.php');
//     });



//   });
