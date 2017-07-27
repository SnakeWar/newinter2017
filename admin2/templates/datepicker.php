<div class="row column medium-6">
  
					<h4 data-magellan-destination="basic-example">Basic</h4>
					<a name="basic-example"></a>
					<p>Attached to a field with the format specified via options.</p>
					<input type="text" class="span2" value="02-12-1989" id="dp1">
					<hr>



					<h4 data-magellan-destination="advanced-example">Close button and data tags</h4>
					<a name="advanced-example"></a>
					<p>Attached to a field with the format specified via data tag and close button enabled.</p>
					<input type="text" class="span2" value="02/16/12" data-date-format="mm/dd/yy" id="dp2">
					<hr>

					<h4 data-magellan-destination="time-example">Time picker</h4>
					<a name="time-example"></a>
					<p>With time picking enabled and vietnamese language used.</p>
					<input type="text" class="span2" value="02-12-1989 12:05" id="dpt">
					<hr>

					<h4 data-magellan-destination="limited-example">Limited picker</h4>
					<a name="limited-example"></a>
					<p>Limit the view mode to months</p>
					<div class="row collapse date" id="dpMonths" data-date="102/2012" data-format="mm/yyyy" data-start-view="year" data-min-view="year" style="max-width:200px;">
						<div class="small-2 columns">	
							<span class="prefix"><i class="fa fa-calendar"></i></span>
						</div>
						<div class="small-10 columns">
							<input size="16" type="text" value="02/2012" readonly>	
						</div>
					</div>
					<hr>

					<h4 data-magellan-destination="no-inputs-example">No inputs</h4>
					<a name="no-inputs-example"></a>
					<p>Attached to other element then field and using events to work with the date values.</p>
					<table class="table">
						<thead>
							<tr>
								<th>Start date&nbsp;
									<a href="#" class="button tiny" id="dp4" data-date-format="yyyy-mm-dd" data-date="2012-02-20">Change</a>
								</th>
								<th>End date&nbsp;
									<a href="#" class="button tiny" id="dp5" data-date-format="yyyy-mm-dd" data-date="2012-02-25">Change</a>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td id="startDate">2012-02-20</td>
								<td id="endDate">2012-02-25</td>
							</tr>
						</tbody>
					</table>
					<div class="alert alert-box"  style="display:none;" id="alert">	<strong>Oh snap!</strong>
					</div>
					<hr>
					<script type="">
						$(document).foundation();


window.prettyPrint && prettyPrint();
$('#dp1').fdatepicker({
  format: 'mm-dd-yyyy',
  disableDblClickSelection: true
});
$('#dp2').fdatepicker({
  closeButton: true
});
$('#dp3').fdatepicker();
$('#dpt').fdatepicker({
  format: 'mm-dd-yyyy hh:ii',
  disableDblClickSelection: true,
  language: 'vi',
  pickTime: true
});
// datepicker limited to months
$('#dpMonths').fdatepicker();
// implementation of custom elements instead of inputs
var startDate = new Date(2012, 1, 20);
var endDate = new Date(2012, 1, 25);
$('#dp4').fdatepicker()
  .on('changeDate', function (ev) {
  if (ev.date.valueOf() > endDate.valueOf()) {
    $('#alert').show().find('strong').text('The start date can not be greater then the end date');
  } else {
    $('#alert').hide();
    startDate = new Date(ev.date);
    $('#startDate').text($('#dp4').data('date'));
  }
  $('#dp4').fdatepicker('hide');
});
$('#dp5').fdatepicker()
  .on('changeDate', function (ev) {
  if (ev.date.valueOf() < startDate.valueOf()) {
    $('#alert').show().find('strong').text('The end date can not be less then the start date');
  } else {
    $('#alert').hide();
    endDate = new Date(ev.date);
    $('#endDate').text($('#dp5').data('date'));
  }
  $('#dp5').fdatepicker('hide');
});

					</script>
</div>