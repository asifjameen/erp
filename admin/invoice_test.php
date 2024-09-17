<?php
include("partial/header.php");
include("partial/nav.php");

?>
<h2>Create New <span class="invoice_type">Invoice</span> </h2>
<!-- <hr> -->

<div id="response" class="alert alert-success" style="display:none;">
	<a href="#" class="close" data-dismiss="alert">×</a>
	<div class="message"></div>
</div>

<form method="post" id="create_invoice" action="code.php">
	<input type="hidden" name="action" value="create_invoice">

	<div class="row">
		<div class="col-md-4">

		</div>
		<div class="col-md-8 text-right">
			<div class="row">
				<div class="col-md-6">
					<h2 class="">Select Type:</h2>
				</div>
				<div class="col-md-4 mb-2">
					<select name="invoice_type" id="invoice_type" class="form-control">
						<option value="invoice" selected="">Invoice</option>
						<option value="quote">Quote</option>
						<option value="receipt">Receipt</option>
					</select>
				</div>
				<!--<div class="col-md-3">
							<select name="invoice_status" id="invoice_status" class="form-control">
								<option value="open" selected>Open</option>
								<option value="paid">Paid</option>
							</select>
						</div>
					-->
			</div>
			<div class="col-md-4 no-padding-right">
				<div class="form-group">
					<div class="input-group date" id="invoice_date">
						<input type="text" class="form-control " required="" name="invoice_date"
							placeholder="Invoice Date" data-date-format="<?php echo DATE_FORMAT ?>">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 ">
				<div class="form-group">
					<div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
						<span class="input-group-addon input-group-prepend border-right">
							<span class="icon-calendar input-group-text calendar-icon"></span>
						</span>
						<input type="text" class="form-control">
					</div>
					<div class="input-group date due_date" id="invoice_due_date">
						<input type="text" class="form-control " required="" name="invoice_due_date"
							placeholder="Due Date" data-date-format="<?php echo DATE_FORMAT ?>">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
			</div>
			<div class="input-group col-md-4 float-right">
				<span class="input-group-addon">#<!--?php echo INVOICE_PREFIX ?--></span>
				<input type="text" name="invoice_id" id="invoice_id" class="form-control " required=""
					placeholder="Invoice Number" aria-describedby="sizing-addon1" value="">
			</div>
		</div>
	</div>
	<hr>

	<div class="row mt-4 mb-4">
		<div class="col-md-8">
			<div class="card ">
				<div class="card-header">
					<h4 class="float-left">Customer Information</h4>
					<a href="#" class="float-right select-customer"><b>OR</b> Select Existing Customer</a>
					<div class="clear"></div>
				</div>
				<div class="card-body form-group form-group-sm">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control margin-bottom copy-input " required=""
									name="customer_name" id="customer_name" placeholder="Enter Name" tabindex="1">
							</div>

							<div class="form-group">
								<input type="text" class="form-control margin-bottom copy-input " required=""
									name="customer_address_1" id="customer_address_1" placeholder="Company_name"
									tabindex="3">
							</div>

							<div class="form-group ">
								<input type="text" class="form-control copy-input " required="" name="customer_postcode"
									id="customer_postcode" placeholder="Postcode" tabindex="7">
							</div>
							<div class="form-group">
								<input type="text" class="form-control margin-bottom copy-input " required=""
									name="customer_town" id="customer_town" placeholder="GST_NO" tabindex="5">
							</div>

						</div>
						<div class="col-md-6">
							<div class="input-group float-right margin-bottom">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input type="text" class="form-control copy-input " required="" name="customer_email"
									id="customer_email" placeholder="Customer_id" aria-describedby="sizing-addon1"
									tabindex="2">
							</div>

							<div class="form-group">
								<input type="text" class="form-control margin-bottom copy-input " required=""
									name="customer_address_2" id="customer_address_2" placeholder="address"
									tabindex="6">
							</div>
							<div class="form-group no-margin-bottom">
								<input type="text" class="form-control " required="" name="customer_phone"
									id="customer_phone" placeholder="Phone Number" tabindex="8">
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!--			<div class="col-md-3 text-right">
					<div class="card card-default">
						<div class="card-header">
							<h4>Shipping Information</h4>
						</div>
						<div class="card-body form-group form-group-sm">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control margin-bottom "required name="customer_name_ship" id="customer_name_ship" placeholder="Enter Name" tabindex="9">
									</div>
									<div class="form-group">
										<input type="text" class="form-control margin-bottom" name="customer_address_2_ship" id="customer_address_2_ship" placeholder="Address 2" tabindex="11">	
									</div>
									<div class="form-group ">
										<input type="text" class="form-control " requiredname="shipping_district" id="shipping_district" placeholder="District" tabindex="13">
									</div>
									<div class="form-group no-margin-bottom">
										<input type="text" class="form-control "required name="shipping_phone" id="shipping_phone" placeholder="Phone_no" tabindex="13">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control margin-bottom "required name="customer_address_1_ship" id="customer_address_1_ship" placeholder="Address 1" tabindex="10">
									</div>
									<div class="form-group">
										<input type="text" class="form-control margin-bottom "required name="customer_town_ship" id="customer_town_ship" placeholder="State" tabindex="12">							
									</div>
									<div class="form-group no-margin-bottom">
										<input type="text" class="form-control "required name="customer_postcode_ship" id="customer_postcode_ship" placeholder="Postcode" tabindex="14">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

-->
		<div class="col-md-4 mt-4 text-right">
			<div class="card card-default">
				<div class="card-header">
					<h4>Transport</h4>
				</div>
				<div class="card-body form-group form-group-sm">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<select id="transport_name" class="form-select form-control margin-bottom " required=""
									name="transport_name" placeholder="Transport_name" tabindex="15">

									<!--?php
																		include("includes/config1.php");
																		$query = "SELECT * FROM `transport`";
																		$res = $con--->query($query);
									$res-&gt;setFetchMode(PDO::FETCH_ASSOC);
									$rows = $res-&gt;fetchall();
									foreach ($rows as $row) {
									?&gt;
									<option value="<?php echo $row['id']; ?>"><!--?php echo $row['transportName'];?-->
									</option>

									<!--?php
																		} 
																		?-->
								</select>
							</div>
							<!--	<div class="form-group">
										<input type="text" class="form-control margin-bottom" name="weight" id="weight" placeholder="Weight" tabindex="16">	
									</div>
																	-->
							<div class="form-group no-margin-bottom">
								<input type="text" class="form-control " required="" name="bags" id="bags"
									placeholder="bags" tabindex="17">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control margin-bottom " required="" name="ewaysno"
									id="ewaysno" placeholder="E-Way_no" tabindex="18">
							</div>
							<div class="form-group">
								<input type="text" class="form-control margin-bottom " required="" name="destination"
									id="destination" placeholder="Destination" tabindex="19">
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- / end client details section -->
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped" id="invoice_table">
			<thead>
				<tr>
					<th width="">
						<h4><a href="#" class="btn btn-success btn-xs add-row"><span class="glyphicon glyphicon-plus"
									aria-hidden="true"></span></a> Products</h4>
					</th>
					<th>
						<h4>AVL_Qty</h4>
					</th>
					<th>
						<h4>Qty</h4>
					</th>
					<th>
						<h4>Price</h4>
					</th>
					<th width="300">
						<h4>Discount</h4>
					</th>
					<th>
						<h4>Sub Total</h4>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr class="sub-row">
					<td>
						<div class="form-group  no-margin-bottom">

							<input type="text" class="form-control item-input invoice_product" required=""
								name="invoice_product[]" placeholder="Enter Product Name OR Description">
							<p class="item-select">or <a href="#">select a product</a></p>
							<div>
								<br>
								<input type="button" value="Del" name="ss" id="ss"
									class="btn btn-danger btn-xs delete-row">
								<input type="button" value="Add_pro" name="ss" id="add-row"
									class="btn btn-primary btn-xs add-row">
							</div>

						</div>
					</td>
					<td class="text-right">
						<!-- <div class="form-group form-group-sm no-margin-bottom">
								<input type="text" class="form-control invoice_product_avl_qty calculate" name="invoice_product_avl_qty[]" value="1">
								<input type="hidden" class="pid" name="pid[]" id="pid[]">
								<input type="hidden" class="purchase_price" name="purchase_price[]" id="purchase_price[]">
							</div> -->
						<div class="input-group mb-3">
							<input type="text" class="form-control" aria-label="Sizing example input"
								aria-describedby="inputGroup-sizing-default">
						</div>

					</td>

					<td class="text-right">
						<div class="form-group form-group-sm no-margin-bottom">
							<input type="number" class="form-control invoice_product_qty calculate"
								name="invoice_product_qty[]" value="1">
						</div>
					</td>
					<td class="text-right">
						<div class="input-group input-group-sm  no-margin-bottom">
							<span class="input-group-addon"><!--?php echo CURRENCY ?--></span>
							<input type="number" class="form-control calculate invoice_product_price "
								name="invoice_product_price[]" aria-describedby="sizing-addon1" placeholder="0.00">
						</div>
					</td>
					<td class="text-right">
						<div class="form-group form-group-sm  no-margin-bottom">
							<input type="text" class="form-control calculate" name="invoice_product_discount[]"
								value="0" placeholder="Enter % OR value (ex: 10% or 10.50)">
						</div>
					</td>
					<td class="text-right">
						<div class="input-group input-group-sm">
							<span class="input-group-addon"><!--?php echo CURRENCY ?--></span>
							<input type="text" class="form-control subbb calculate-sub" name="invoice_product_sub[]"
								id="invoice_product_sub" value="0.00" aria-describedby="sizing-addon1">
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div id="invoice_totals" class="padding-right row text-right">
		<div class="col-md-6">
			<div class="input-group form-group-sm textarea no-margin-bottom">
				<textarea class="form-control" name="invoice_notes" placeholder="Additional Notes..."></textarea>
			</div>
			<div class="margin-top ">
				<label for="tax_type" class="">Select Tax Type:</label>

				<select id="tax_type" name="tax_type">
					<option value="gst">GST</option>
					<option value="igst">IGST</option>
				</select>
			</div>


		</div>


		<div class="col-md-6 no-padding-right">
			<div class="row">
				<div class="col-md-4 col-md-offset-5">
					<strong>Sub Total:</strong>

					<!--?php echo CURRENCY ?--><span class="invoice-sub-total">0.00</span>
					<input type="hidden" name="invoice_subtotal" id="invoice_subtotal">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-5">
					<strong>Discount:</strong>

					<!--?php echo CURRENCY ?--><span class="invoice-discount">0.00</span>
					<input type="hidden" name="invoice_discount" id="invoice_discount">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-5">

					<div class="input-group input-group-sm">
						<strong class="shipping">Shipping: </strong>


						<input type="text" class="form-control calculate shipping mb-2" name="invoice_shippping"
							aria-describedby="sizing-addon1" placeholder="0.00">
					</div>
				</div>
			</div>
			<div class="row tax">
				<div class="col-md-4 col-md-offset-5 ">


					<div class="input-group input-group-sm">

						<strong class="cgst ">cgst:</strong>
						<input type="text" class="form-control calculate_cgst margin-bottom-1" id="invoice_sgst"
							name="invoice_sgst" aria-describedby="sizing-addon1" placeholder="0.00">
					</div>
				</div>
			</div>
			<div class="row tax ">
				<div class="col-md-4 ">


					<div class="input-group margin-bottom">

						<strong class="sgst ">sgst:</strong>
						<input type="text" class="form-control calculate_cgst " id="invoice_cgst" name="invoice_cgst"
							aria-describedby="sizing-addon1" placeholder="0.00">
					</div>
				</div>
			</div>
			<!--?php if (ENABLE_VAT == true) { ?-->
			<div class="row tax">
				<div class="col-md-4 col-md-offset-5">
					<strong>IGST:</strong><br>Remove TAX/ <input type="checkbox" class="remove_vat">

					<!--?php echo CURRENCY ?--><span class="invoice-vat" data-enable-vat="<?php echo ENABLE_VAT ?>"
						data-vat-rate="<?php echo VAT_RATE ?>" data-vat-method="<?php echo VAT_INCLUDED ?>">0.00</span>
					<input type="text" name="invoice_vat" id="invoice_vat" class="ss">
				</div>
			</div>
			<!--?php } ?-->
			<div class="row">
				<div class="col-md-4 col-md-offset-5">

					<strong>Total:</strong>
					<!--?php echo CURRENCY ?--><span class="invoice-total">0.00</span>
					<input type="hidden" name="invoice_total" id="invoice_total">
				</div>
			</div>
		</div>


		<div class="col-md-6">
			<input type="email" name="custom_email" id="custom_email" class="custom_email_textarea"
				placeholder="Enter custom email if you wish to override the default invoice type email msg!">
		</div>

		<div class="col-md-6 margin-top btn-group">
			<button type="submit" class="btn btn-primary">
				Launch demo modal
			</button>

		</div>


	</div>
	<div class="row">

	</div>
</form>

<!-- Button trigger modal -->

















<div id="insert" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">×</span></button>
				<h4 class="modal-title">Select Product</h4>
			</div>
			<div class="modal-body">
				<!--?php popProductsList(); ?-->



			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-primary" id="selected">Add</button>
				<button type="button" data-dismiss="modal" class="btn">Cancel</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="insert_customer" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">×</span></button>
				<h4 class="modal-title">Select An Existing Customer</h4>
			</div>
			<div class="modal-body">
				<!--?php popCustomersList(); ?-->

			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn">Cancel</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?PHP
include_once("partial/footer.php");
?>