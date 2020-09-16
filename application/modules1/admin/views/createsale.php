<?php require_once 'header.php' ; ?>
<link href="<?php echo base_url();?>assets/css/createsale.css" type="text/css" rel="stylesheet">
<?php require_once 'sidebar.php' ; ?>
<style>
#invoice_preview_modal .modal-dialog {max-width: 100%; overflow: auto; margin: 0px auto; padding: 10px; box-sizing: border-box;}
#invoice_preview_modal .panel-body {overflow: auto;}
#snackbar {
  visibility: hidden;
  min-width: 300px;
  margin-left: -150px;
  background-color: red;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 10px;
  position: absolute;
  z-index: 1;
  left: 50%;
  top: 5px;
  font-size: 17px;
}
#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
@-webkit-keyframes fadein {
  from {top: 0; opacity: 0;} 
  to {top: 5px; opacity: 1;}
}

@keyframes fadein {
  from {top: 0; opacity: 0;}
  to {top: 5px; opacity: 1;}
}
.ui-autocomplete{
	position: absolute;
}		
</style>
<div class="right_blk">
	
	<div class="top_ttl_blk"> 
		<!-- <span class="back_btn"><a href="<?php echo base_url();?>admin/sales" title=""><img src="<?php echo base_url();?>assets/images/back.png" alt="" title=""> </a></span> --> <span> <?php echo $page_title;?></span>
		<a href="<?php echo base_url();?>admin/sales" title="" class="fr btn btn-primary"> Show all sales  </a>
		<div id="snackbar" class=""></div>
	</div>
	<form id="salefrm" name="salefrm" action="javascript:void(0);" method="post">
	<div class="sale_rt">

		<h2 class="create_hdg"> Transport Details </h2>
		<ul class="create_ul"> 

										<li class="create_li slc_usr">
												<div class="check_wt_serc"> 
													<div class="show_va">Select  Transport</div>
													<div class="selectVal">  Transport Type </div>
													<ul class="check_list mykey" id="trn1"> 
														<li id="transport_opt_li">
															<div class="form-check">
															  <input class="form-check-input" type="radio" name="transport_type" id="trns1" value="ssa">
															  <label class="form-check-label" for="trns1">
															  	SSA Vehicle
															  </label>
															</div>
														</li>
														<li id="transport_opt_li">
															<div class="form-check">
															  <input class="form-check-input" type="radio" name="transport_type" id="trns2" value="user">
															  <label class="form-check-label" for="trns2">
															 	User Vehicle
															  </label>
															</div>
														</li>
													</ul>												
												</div>
												</li>

												<li class="create_li">
													<div class="cre_inp">
													  <div class="sm_blk"> Driver Name </div>
													    <input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="driver_name" id="driver_name">
													 </div>
													</li>
													 <li class="create_li ">
													 	<div class="cre_inp">
													  <div class="sm_blk"> Driver Mobile </div>
													    <input type="text" onkeypress="return onlyNumberKey(event)" maxlength="10" class="form-control mykey" placeholder="" data-original-title="" title="" name="driver_mobile" id="driver_mobile">
													</div>
													 </li>
													  <li class="create_li ">
													 	<div class="cre_inp">
													  <div class="sm_blk"> Vehicle Number </div>
													    <input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="vehicle_number" id="vehicle_number">
													</div>
													 </li>
		</ul>

		<h2 class="create_hdg"> Shipping Address </h2>
		<ul class="create_ul"> 
			<li class="create_li ">
			 	<div class="cre_inp">
			  		<div class="sm_blk"> Name</div>
			    	<input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="s_name" id="s_name">
				</div>
			</li>
	 		<li class="create_li ">
	 			<div class="cre_inp">
	  				<div class="sm_blk"> Mobile</div>
	    			<input type="text" onkeypress="return onlyNumberKey(event)" maxlength="10" class="form-control mykey" placeholder="" data-original-title="" title="" name="s_mobile" id="s_mobile">
				</div>
	 		</li>
			 <li class="create_li ">
			 	<div class="cre_inp">
			  		<div class="sm_blk"> Address</div>
			    	<input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="s_address" id="s_address">
				</div>
			 </li>
			<li class="create_li ">
			 	<div class="cre_inp">
			  		<div class="sm_blk"> State</div>
			    	<input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="s_state" id="s_state">
				</div>
			 </li>

			<li class="create_li ">
			 	<div class="cre_inp">
			  		<div class="sm_blk"> Pin code</div>
			    	<input type="text" class="form-control mykey" onkeypress="return onlyNumberKey(event)" placeholder="" data-original-title="" title="" name="s_pincode" id="s_pincode" maxlength="6">
				</div>
			 </li>

		</ul>
		<div class="checkbox">
  			<label class="chek_bx"><input type="checkbox" value="" name="billadd" id="billadd"> Billing and shipping address are same</label>
		</div>
		<div class="bil_add">
			<h2 class="create_hdg"> Billing Address </h2>
			<ul class="create_ul"> 
					<li class="create_li ">
					 	<div class="cre_inp">
					  <div class="sm_blk"> Name</div>
					    <input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="b_name" id="b_name">
					</div>
					</li>
					<li class="create_li ">
					 	<div class="cre_inp">
					  <div class="sm_blk"> Mobile</div>
					    <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control mykey" placeholder="" data-original-title="" title="" name="b_mobile" id="b_mobile">
					</div>
					</li>

					<li class="create_li ">
					 	<div class="cre_inp">
					  <div class="sm_blk"> Address</div>
					    <input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="b_address" id="b_address">
					</div>
					</li>

					<li class="create_li ">
					 	<div class="cre_inp">
					  <div class="sm_blk"> State</div>
					    <input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="b_state" id="b_state">
					</div>
					</li>

					<li class="create_li ">
					 	<div class="cre_inp">
					  <div class="sm_blk"> Pin code</div>
					    <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control mykey" placeholder="" data-original-title="" title="" name="b_pincode" id="b_pincode"  maxlength="6">
					</div>
					</li>

					<li class="create_li ">
					 	<div class="cre_inp">
					  <div class="sm_blk"> GST</div>
					    <input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="b_gst" id="b_gst">
					</div>
		 			</li>

			</ul>
		</div>
	</div>
	<div class="sle_cr_r"> 
		<!-- <h2 class="create_hdg"> Loan Request </h2> -->

		<ul class="assign_type" id="saletype">  

			<li class="act_type lnk_typ crd_sale" onclick="return ttype('credit');"> 
				<img src="http://3.7.44.132/aquacredit/assets/images/credit_icn.png">
				<input type="radio" name="sale_types" value="credit" checked  >
				<span> Credit Sale </span>
			</li>
			<li class="cash_sale lnk_typ" onclick="return ttype('cash');"> 
				<img src="http://3.7.44.132/aquacredit/assets/images/cash_icn.png">
				<input type="radio" name="sale_types" value="cash"  >
				<span> Cash Sale </span>
			</li>

		</ul>

		<ul class="create_ul"> 
					<li class="create_li slc_usr">
						<div class="check_wt_serc wth_225_sel" id="branchlist"> 
							<div class="show_va">Select  Branch</div>
							<div class="selectVal">  Select  Branch </div>
							<ul class="check_list mykey" id="brn_l"> 
								<li id="crop_opt_li">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="branchval" id="branch" value="">
										<label class="form-check-label" for="branch">
															 	Select Branch
										</label>
									</div>
								</li>
							</ul>												
						</div>
					</li>
					<li class="create_li">
					<div class="cre_inp">
					  <div class="sm_blk"> Search User </div>
					    <input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="ukey" id="ukey">
					    <input type="hidden" class="form-control" placeholder=""  name="userid" id="userid">
					    <input type="hidden" class="form-control" placeholder=""  name="usertype" id="usertype">
					 </div>
					 <div class="err_msg" style="display: none;"> User Not Found </div>
					</li>
					<!-- crop locatiom -->
					<li class="create_li slc_usr" id="cropdis" >
						<div class="check_wt_serc wth_225_sel" id="branchlist"> 
							<div class="show_va">Crop location</div>
							<div class="selectVal crop_type_val"> Crop location </div>
							<ul class="check_list mykey" id="crop_1"> 
                            <li id="crops_opt_li">
                              <div class="form-check">
                                <input class="form-check-input mykey" type="radio" name="crop_opt" id="crop_opt" >
                                <label class="form-check-label" >
                                Crop Location
                                </label>
                              </div>
                            </li>
                          </ul>    												
						</div>
					</li>
					<!-- crop location -->
					<li class="create_li " style="display: none;" id="guestmobile">
					 	<div class="cre_inp">
					  		<div class="sm_blk"> Mobile </div>
					    	<input type="text" onkeypress="return onlyNumberKey(event)" maxlength="10" class="form-control mykey" placeholder="" data-original-title="" title="" name="mobile" id="mobile">
						</div>
					</li>
		</ul>
	<div class="add_more">
		<a href="javascript:void(0);" onclick="addmorerows();" >Add More</a>
	</div>
		<div class="res_tbl">

			<table class="sa_lst" cellpadding="0" cellspacing="" border="0">
				<thead>
				<tr> 
					<th> Product Name </th>
					<th class="qty txt_cnt"> Qty </th>
					<th class="mrp txt_rt"> MRP </th>
					<th class="disc txt_rt"> Discount </th>
					<th class="ttl_prc txt_rt"> Total Price </th>
					<th class="dele_th_td"> Delete </th>
				</tr>
				</thead><input type="hidden" id="rowval" value="0">
				<tbody id="invoiceItem">
					
					<!-- <tr id="rowNums0"> 
						<td> <input type="hidden" class="mykey" name="proid[]" id="proid0" value="0">
							 <input type="text" autocomplete="off" class="mykey" placeholder="Product Name" name="proname[]" id="proname0" > </td>
						<td class="qty txt_cnt"> <input type="text" class="mykey" placeholder="0" onkeypress="return onlyNumberKey(event)" name="proqty[]" id="proqty0"> </td>
						<td class="mrp txt_rt"> <input type="text" class="mykey" placeholder="0" name="promrp[]" id="promrp0" readonly><input type="hidden" class="mykey" placeholder="0" name="promrpval[]" id="promrpval0" > </td>
						<td class="disc txt_rt"> <input type="text" onkeypress="return onlyNumberKey(event)" class="mykey disckey" placeholder="0" name="prodisc[]" id="prodisc0" readonly> </td>
						<td class="ttl_prc txt_rt"> <input type="text" class="mykey" placeholder="0" name="protot[]" id="protot0" readonly>
						<input type="hidden" placeholder="0" name="prototval[]" id="prototval0" >
						 </td>
						 <td class="dele_th_td"><i class="fa fa-trash" onclick="removerow(0)" style="color:red"></i></td>
					</tr> -->

				</tbody>
				<tfoot>
					<tr>
						<td colspan="4" class="txt_rt"> <b> Total Amount </b> </td>
						<td class="txt_rt ttl_prc" colspan="2"> <b id="totamt"> 0 </b> 
						<input type="hidden" placeholder="0" name="totamtval" id="totamtval" >
						<input type="hidden" placeholder="0" name="totdiscount" id="totdiscount" >
						</td>
					</tr>
				</tfoot>
			</table>
				
			<table class="sa_lst mar_sale_ttl" cellpadding="0" cellspacing="" border="0">
					<tr>
						<td class="txt_rt"> Loading Charges </td>
						<td class="txt_rt ttl_prc"> <input type="text" onkeypress="return onlyNumberKey(event)" value="0" name="load_charge" id="load_charge"> </td>
					</tr>
					<tr>
						<td class="txt_rt"> Transport Charges </td>
						<td class="txt_rt ttl_prc"> <input type="text" onkeypress="return onlyNumberKey(event)" value="0" name="transport_charge" id="transport_charge"> </td>
					</tr>
					<tr>
						<td class="txt_rt"> <b> Grand Total </b> </td>
						<td class="txt_rt ttl_prc"> <b id="gtotamt"> 0 </b> 
						<input type="hidden" placeholder="0" name="gtotamtval" id="gtotamtval" >
						</td>
					</tr>
			</table>
		</div>
		<div id="discash" style="display: none;">
			<h2 class="create_hdg"> <span class="ttl">Amount received</span>
				<span class="create_li">
					<div class="cre_inp">
				  		<div class="sm_blk"> Received Amount </div>
				    	<input type="text" class="form-control" placeholder="" data-original-title="" title="" name="received_amount" id="received_amount" onkeypress="return onlyNumberKey(event)">
			 		</div>
				</span> 
			</h2>
			<div id="disamt" style="display: none;">
				<ul class="assign_type"> 
					<li class="act_type lnk_typ ban_trns"> 
						<img src="http://3.7.44.132/aquacredit/assets/images/bank_tansfer.png">
						<input type="radio" name="paymenttype" value="bank" checked>
						<span> Bank Transfer </span>
					</li>
					<li class="cash_trns lnk_typ"> 
						<img src="http://3.7.44.132/aquacredit/assets/images/cash_icn.png">
						<input type="radio" name="paymenttype" value="cash">
						<span> Cash </span>
					</li>
				</ul>
				<ul class="trans_inf bnk_tr"> 
					<li class="create_li date">
						<div class="cre_inp">
							<div class="sm_blk"> Date </div>
						    <input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="payment_date" id="payment_date" onkeydown="return false;" value="<?php echo date('d-M-Y'); ?>">
						</div>
					</li>
					<li class="admin_bank_li" > 
				 		<div class="check_wt_serc wth_225_sel" id="bankslist"> 
				            <div class="show_va"> Select Bank </div>
				            <div class="selectVal">  Select Bank </div>
							<ul class="check_list mykey" id="bnkl"> 
							    <li id="bank_opt_li"> 
								    <div class="form-check">
								  		<input class="form-check-input" type="radio" name="bankid" id="bnk" value="Bank 1">
										<label class="form-check-label" for="bnk">
											Select Bank
										</label>
									</div>
								</li>
							</ul>
						</div>
				 	</li>
					<li class="create_li">
					<div class="cre_inp">
					  <div class="sm_blk"> Reference Number </div>
					    <input type="text" class="form-control mykey"  placeholder="" data-original-title="" title="" name="bank_reference" id="bank_reference">
					 </div>
					</li>
				</ul>
			</div>
		</div>
		<div class="show_note">
		<p></p>
			<div class="note_add"> <a href="#" title=""> Note </a> </div> 
				<textarea placeholder="Note" name="note"></textarea>
			</div>
			<div class="po_ftr">
				<!-- <button class="btn fr sb_btn btn-primary" data-toggle="modal" data-target="#view_order"> Create Order </button> -->
				<button class="btn fr sb_btn btn-primary" type="submit"> Create Order </button>
			</div>
		</div>
	</div>
</form>

<div class="modal fade" id="view_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  	 <div class="modal-content">
  	 	 <div class="modal-body">
  	 	 	<div class="pp_clss" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> </div>
  	 	 	<h2 class="create_hdg"> Order View </h2>
  	 	 	<table cellspacing="0" cellpadding="0" border="0" style="width: 100%; font-family: arial; border-top: 1px solid #ccc; padding:10px 20px;">
<tr> 
  <td style="padding-right: 10px; padding-top: 10px; padding-bottom: 10px; width: 50%;">  
    <p style="font-size: 13px; margin: 0px; padding: 0px;"> <b> Details of Receiver | Billed to:</b> </p>
  </td>
  <td style="padding-left: 10px; padding-top: 10px; padding-bottom: 10px; width: 50%;"> 
   <p style="font-size: 13px; margin: 0px; padding: 0px;"> <b>Details of Consignee | Shipped to:</b> </p>
   </td>
</tr>
<tr> <td colspan="2"> <table cellspacing="0" cellpadding="0" border="0" style="width: 100%;">
<tr>
<td style="padding:5px 10px; margin-top: 10px; border: 1px solid #000;"> 
  
 
    <p style="font-size: 13px; padding: 0px; margin: 0px 0px 5px 0px;"> Sample Name </p>
    <p style="font-size: 13px; padding: 0px; margin: 0px 0px 5px 0px;"> <b>Address:</b> Sample Address, 9876543210, Andhrapradedsh, 533001 </p>
   <p style="font-size: 13px; padding: 0px; margin: 0px 0px 5px 0px;"> <b> GST: </b>  </p>

</td>
<td style="width: 20px;"> </td>
<td style="padding:5px 10px; margin-top: 10px; border: 1px solid #000;"> 
 

    <p style="font-size: 13px; padding: 0px; margin: 0px 0px 5px 0px;"> Sample Name </p>
    <p style="font-size: 13px; padding: 0px; margin: 0px 0px 5px 0px;"> <b>Address:</b> Sample Address, 9876543210, Andhrapradedsh, 533001 </p>
   <p style="font-size: 13px; padding: 0px; margin: 0px 0px 5px 0px;"> <b> Transport: </b> </p>

</td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="2">
<table style="width:100%; margin-top: 10px; font-size: 13px;" cellpadding="5" cellspacing="0" border="0">
  <tr>
    <th style="text-align: left; padding: 2px 5px; border-left: 1px solid #ccc; border-right: 1px solid #ccc; border-top: 1px solid #ccc; background: #f8f8f8;">Product Name</th>
    <th style="text-align: center; padding: 2px 5px; width: 80px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; background: #f8f8f8;">HSN</th> 
    <th style="text-align: center; padding: 2px 5px; width: 60px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; background: #f8f8f8;">Qty</th> 
    <th style="text-align: right; padding: 2px 5px; width: 80px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; background: #f8f8f8;">Value </th>
    <th style="text-align: right; padding: 2px 5px; width:60px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; background: #f8f8f8;">Tax </th> 
    <th style="text-align: right; padding: 2px 5px; width: 100px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; background: #f8f8f8;">Total</th>
  </tr>
  <tr>
    <td style="border-right: 1px solid #ccc; padding: 2px 5px; border-left: 1px solid #ccc;  border-top: 1px solid #ccc;">Product Name -2</td>
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 80px;">&nbsp;</td> 
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 60px;">10</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 80px">2,000</td>
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width:60px">20%</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 100px;">1,800</td>
  </tr> 
  <tr>
    <td style="border-right: 1px solid #ccc; padding: 2px 5px; border-left: 1px solid #ccc;  border-top: 1px solid #ccc;">Product Name -3</td>
    <td style="text-align: center; padding:2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 80px;">&nbsp;</td> 
    <td style="text-align: center; padding:2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 60px;">10</td> 
    <td style="text-align: right; padding:2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 80px">2,000</td>
    <td style="text-align: right; padding:2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width:60px">20%</td> 
    <td style="text-align: right; padding:2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 100px;">1,800</td>
  </tr> 
  <tr>
    <td style="border-right: 1px solid #ccc; padding: 2px 5px; border-left: 1px solid #ccc;  border-top: 1px solid #ccc;">Product Name -4</td>
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 80px;">&nbsp;</td> 
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 60px;">10</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 80px">2,000</td>
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width:60px">20%</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 100px;">1,800</td>
  </tr> 
    <tr>
    <td style="border-right: 1px solid #ccc; padding: 2px 5px; border-left: 1px solid #ccc; border-top: 1px solid #ccc;  ">Product Name -5</td>
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 80px;">&nbsp;</td> 
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 60px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; ">10</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc;  width: 80px">2,000</td>
    <td style="text-align: right; padding: 2px 5px;  border-right: 1px solid #ccc; border-top: 1px solid #ccc; width:60px border-bottom: 1px solid #ccc;">20%</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 100px;">1,800</td>
  </tr> 
    <tr>
    <td style="border-right: 1px solid #ccc; padding: 2px 5px; border-left: 1px solid #ccc; border-top: 1px solid #ccc;  ">Product Name -5</td>
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 80px;">&nbsp;</td> 
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 60px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; ">10</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc;  width: 80px">2,000</td>
    <td style="text-align: right; padding: 2px 5px;  border-right: 1px solid #ccc; border-top: 1px solid #ccc; width:60px border-bottom: 1px solid #ccc;">20%</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 100px;">1,800</td>
  </tr> 
    <tr>
    <td style="border-right: 1px solid #ccc; padding: 2px 5px; border-left: 1px solid #ccc; border-top: 1px solid #ccc;  ">Product Name -5</td>
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 80px;">&nbsp;</td> 
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 60px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; ">10</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc;  width: 80px">2,000</td>
    <td style="text-align: right; padding: 2px 5px;  border-right: 1px solid #ccc; border-top: 1px solid #ccc; width:60px border-bottom: 1px solid #ccc;">20%</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 100px;">1,800</td>
  </tr> 
   <tr>
    <td style="border-right: 1px solid #ccc; padding: 2px 5px; border-left: 1px solid #ccc; border-top: 1px solid #ccc;  ">Product Name -5</td>
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 80px;">&nbsp;</td> 
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 60px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; ">10</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc;  width: 80px">2,000</td>
    <td style="text-align: right; padding: 2px 5px;  border-right: 1px solid #ccc; border-top: 1px solid #ccc; width:60px border-bottom: 1px solid #ccc;">20%</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 100px;">1,800</td>
  </tr>  
    <tr>
    <td style="border-right: 1px solid #ccc; padding: 2px 5px; border-left: 1px solid #ccc; border-top: 1px solid #ccc;  ">Product Name -5</td>
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 80px;">&nbsp;</td> 
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 60px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; ">10</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc;  width: 80px">2,000</td>
    <td style="text-align: right; padding: 2px 5px;  border-right: 1px solid #ccc; border-top: 1px solid #ccc; width:60px border-bottom: 1px solid #ccc;">20%</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 100px;">1,800</td>
  </tr> 
   <tr>
    <td style="border-right: 1px solid #ccc; padding: 2px 5px; border-left: 1px solid #ccc; border-top: 1px solid #ccc;  ">Product Name -5</td>
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 80px;">&nbsp;</td> 
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 60px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; ">10</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc;  width: 80px">2,000</td>
    <td style="text-align: right; padding: 2px 5px;  border-right: 1px solid #ccc; border-top: 1px solid #ccc; width:60px border-bottom: 1px solid #ccc;">20%</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 100px;">1,800</td>
  </tr> 
  <tr>
    <td style="border-right: 1px solid #ccc; padding: 2px 5px; border-left: 1px solid #ccc; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;  ">Product Name -5</td>
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc;  border-bottom: 1px solid #ccc;width: 80px;">&nbsp;</td> 
    <td style="text-align: center; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 60px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">10</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; width: 80px">2,000</td>
    <td style="text-align: right; padding: 2px 5px; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width:60px border-bottom: 1px solid #ccc;">20%</td> 
    <td style="text-align: right; padding: 2px 5px; border-right: 1px solid #ccc; border-top: 1px solid #ccc; width: 100px; border-bottom: 1px solid #ccc;">1,800</td>
  </tr> 
    <tr> 
    <td colspan="5" style="border-right: 1px solid #ccc; padding: 2px 5px; text-align: right; color: green;  border-left: 1px solid #ccc; border-bottom: 1px solid #ccc;">Promotional Offers </td>
    <td style="border-right: 1px solid #ccc; color: green; padding: 2px 5px; text-align: right;   border-bottom: 1px solid #ccc;">-0.00</td>
  </tr>
   <tr> 

    <td colspan="5" style="border-right: 1px solid #ccc; padding: 2px 5px; border-bottom: 1px solid #ccc; text-align: right;   border-left: 1px solid #ccc;">CGST </td>
    <td style="border-right: 1px solid #ccc; padding: 2px 5px; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; text-align: right;   border-top: 0px solid #ccc;">1000</td>
  </tr>
  <tr> 
      
    <td colspan="5" style="border-right: 1px solid #ccc;  padding: 2px 5px; text-align: right;   border-left: 1px solid #ccc;">SGST </td>
    <td style="border-right: 1px solid #ccc;  text-align: right;  ">1000</td>
  </tr>

  <tr> 
    <td colspan="5" style="border-right: 1px solid #ccc; padding: 5px 5px; text-align: right; border-bottom: 1px solid #ccc;  border-left: 1px solid #ccc; border-top: 1px solid #ccc;"><b>Total Amount</b></td>
    <td style="border-right: 1px solid #ccc; padding: 5px 5px; text-align: right; border-bottom: 1px solid #ccc;  border-top: 1px solid #ccc;"><b>20,000</b></td>
  </tr>
<tr> <td colspan="5" style="padding: 2px;"> &nbsp; </td> </tr>

 

  <tr> 
         <td colspan="3" style="text-align: left;  padding: 2px 5px; border-left: 1px solid #ccc; border-top: 1px solid #ccc;"> <p style="margin: 0px; padding: 0px; font-size: 11px;"> Above invoice inclusive of aqua cash redemption </p> </td>
    <td colspan="2" style="border-right: 1px solid #ccc; padding: 2px 5px; text-align: right;   border-left: 1px solid #ccc; border-top: 1px solid #ccc;">Loading Charges </td>
    <td style="border-right: 1px solid #ccc; padding: 2px 5px; text-align: right;   border-top: 1px solid #ccc;">500</td>
  </tr>

  <tr> 
      <td colspan="3" style="text-align: left; padding: 2px 5px; border-left: 1px solid #ccc;border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; "> <p style="margin: 0px; padding: 0px; font-size: 11px;"> This is computer generated Invoice, no signature is required </p>  </td>
    <td colspan="2" style="border-right: 1px solid #ccc; padding: 2px 5px; border-bottom: 1px solid #ccc; text-align: right;   border-left: 1px solid #ccc; border-top: 1px solid #ccc;">Transport Charges </td>
    <td style="border-right: 1px solid #ccc; padding: 2px 5px; border-bottom: 1px solid #ccc; text-align: right;   border-top: 1px solid #ccc;">1000</td>
  </tr>
 

  <tr> 
      <td colspan="3"> </td>
    <td colspan="2" style="font-size: 14px; padding-top: 10px; padding-bottom: 10px; text-align: right;"><b>Grand Total </b></td>
    <td style="font-size: 14px; padding-top: 10px; padding-bottom: 10px; text-align: right;"><b>21,500</b></td>
  </tr>
  <tr> 
      <td colspan="3" style="border-top: 1px solid #ccc; padding-top: 10px;">   </td>
      <td colspan="3" style="border-top: 1px solid #ccc; padding-top: 10px; text-align: right;"> <button class="btn btn-primary"> Submit </button>  </td>
  </tr>
</table>
</td>
</tr>
</table>
  	 	 </div>
  	 </div>
  </div>
</div>
<div id="invoice_preview_modal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:1000px;">
        <div class="modal-content">
            <section class="panel panel-featured panel-featured-danger">
            	
                <header class="panel-heading">
                    <h2 class="panel-title">Order View</h2>
                </header>
                <div class="">
                  <div class="panel-body" id="invoice_body">
                      
                  </div>
                 </div>
                <footer class="panel-footer text-right">  
                	<input type="hidden" value='' id="user_id" /> 
                	<button class="btn btn-default" data-dismiss="modal" id="reset_seller">Cancel</button>
                    <button class="btn btn-primary test_inact" id="confirmOrder">Place Order & Print</button>
                </footer>
           
            </section>
        </div>
    </div>
</div>

<script type="text/javascript">
var url = '<?php echo base_url()?>';
$('.cre_inp').addClass('inp_ss');
getbranches();
getbanks();
function getbranches()
{ 
  $.ajax({    
    url: url+"api/sales/getbranches",
    data: {},
    type:'POST',    
    datatype:'json',
    success : function(response){
      
      res= JSON.parse(response);        
      
        var opt = "";
        if(res.data.length > 0)
        {
            $.each(res.data, function(index, crop) {
            opt += '<div class="form-check"><input class="form-check-input" onclick="hidecolor();" type="radio" name="branchval" id="branch'+index+'" value="'+crop.branch_id+'" /><label class="form-check-label" for="branch'+index+'">'+crop.branch_name+'</label></div>';
          });
        }
       
        $("#crop_opt_li").html(opt);
    }
  });
}
function hidecolor()
{
	$('.mykey').parent().css("border", "");
}
function getusercrops(user_id,addoredit)
{
  var aeval = hidcrop = "";
  if(addoredit == "edit"){ aeval = "_edit"; hidcrop = $("#hid_crop_id").val();}
  $.ajax({    
    url: url+"api/UserCrops/index/"+user_id,
    data: {},
    type:'POST',    
    datatype:'json',
    success : function(response){
      
      //alert(response);
      res= JSON.parse(response);        
      //alert(res.data.length);
      
      //var usercode = $('#select_usercode'+aeval).val();
      var user_id = $('#userid'+aeval).val();
      var sel = "";
      if(user_id != "")
      {

        //var opt = '<option value="">-- Select Crop --</option>';
        var opt = "";
        if(res.data.length > 0)
        {

          $.each(res.data, function(index, crop) {
            
            if(crop.cd_id == hidcrop){ sel = "checked"; }else{ sel = "";}
            
            opt += '<div class="form-check"><input class="form-check-input" onclick="hidecolor();" type="radio" name="crop_opt'+aeval+'" id="crp'+index+aeval+'" value="'+crop.cd_id+'" '+sel+' /><label class="form-check-label" for="crp'+index+aeval+'">'+crop.crop_location+'</label></div>';
          });
        }
      }else{
        //var opt = '<option value="">-- Select user first --</option>';
        var opt = '';
      }
      $("#crops_opt_li"+aeval).html(opt);
      //$("#crop_opt"+aeval).select2('refresh');
      //document.getElementById("crop_opt"+aeval).fstdropdown.rebind();
    }
  });
}
function getbanks()
{ 

  $.ajax({    
    url: url+"api/sales/getbanks",
    data: {},
    type:'POST',    
    datatype:'json',
    success : function(response){
      
      res= JSON.parse(response);        
      
        var opt = "";
        if(res.data.length > 0)
        {
            $.each(res.data, function(index, crop) {
            	var bimg = '';
            	if(crop.bank_name=='SBI')
            	{
            		bimg = '<img src="http://3.7.44.132/aquacredit/assets/images/sib_icn.png" alt="" title="">';
            	}
            	else if(crop.bank_name=='ICICI')
            	{
            		bimg = '<img src="http://3.7.44.132/aquacredit/assets/images/icici_icn.png" alt="" title="">';
            	}
            	else
            	{
            		bimg = '<img src="http://3.7.44.132/aquacredit/assets/images/hdfc_icn.png" alt="" title="">';
            	}
            opt += '<div class="form-check"><input class="form-check-input" type="radio" name="bankid" id="bnk'+index+'" value="'+crop.bank_id+'"><label class="form-check-label" for="bnk'+index+'"><div class="bank_logo">'+bimg+'</div><div class="bank_mny"><div class="bank_bal"> ₹ '+crop.avail_amount+'</div><div class="accont_numb">'+crop.account_no+'</div></div></label></div>';
          });
        }
       
        $("#bank_opt_li").html(opt);
    }
  });
}
function ttype(val)
{
	if(val=='cash')
	{
		$('#guestmobile').show();
        $('#cropdis').hide();
		$('input[name="sale_types"][value="cash"]').prop('checked', true);
		$("#discash").show();
		$('#ukey').val('');
		$('#mobile').val('');
		$('#userid').val('');
		$('.disckey').prop('readonly', false);
		$('#crop_type_val').text('');
	}
	else
	{
		 $('#guestmobile').hide();
     	$('#cropdis').show();
		$('input[name="sale_types"][value="credit"]').prop('checked', true);
		$("#discash").hide();
		$('#ukey').val('');
		$('#mobile').val('');
		$('#userid').val('');
		$('.disckey').prop('readonly', true);
		$(".crop_type_val1").text('Crop location');
	}
}

var url = '<?php echo base_url()?>';
$(document).ready(function(){

	var rr = 4;
	$('#rowval').val(4);
	var rowNum = $('#rowval').val();

	for(var ii=0;ii<=rr;ii++)
	{
	    rowNum ++;
	    htmlRows = '<tr id="rowNums'+rowNum+'" ><td><input type="hidden" placeholder="Product Name" name="proid[]" id="proid'+rowNum+'" value="0" ><input class="mykey" type="text" placeholder="Product Name" autocomplete="off" name="proname[]" id="proname'+rowNum+'" > </td><td class="qty txt_cnt"> <input type="text" class="mykey" placeholder="0" onkeypress="return onlyNumberKey(event)" name="proqty[]" id="proqty'+rowNum+'"></td><td class="mrp txt_rt"> <input type="text" class="mykey" readonly placeholder="0" name="promrp[]" id="promrp'+rowNum+'"><input type="hidden" placeholder="0" name="promrpval[]" id="promrpval'+rowNum+'"> </td><td class="disc txt_rt"> <input type="text" class="mykey disckey noalpha" placeholder="0" name="prodisc[]" id="prodisc'+rowNum+'"> </td><td class="ttl_prc txt_rt"> <input type="text" placeholder="0" readonly name="protot[]" id="protot'+rowNum+'"><input type="hidden" placeholder="0" name="prototval[]" id="prototval'+rowNum+'" > </td><td class="dele_th_td"><i class="fa fa-trash" onclick="removerow('+rowNum+')" style="color:red" ></i></td></tr>';

	    var saletype = $("input[name='sale_types']:checked").val();
    	if(saletype=='cash')
    	{
	     	$('.disckey').prop('readonly', true);
	    }
	    else{
	    	$('.disckey').prop('readonly', true);
	    } 	
	    
	    $('#invoiceItem').append(htmlRows);
	}

	var dateToday = new Date();
	  $("#payment_date").datepicker({
	    dateFormat: 'dd-M-yy',
	    changeMonth: true,
	    changeYear: true,
	    /*minDate: dateToday,*/
	    numberOfMonths: 1
	  });

	$('.lnk_typ.ban_trns').click(function(){
        $(this).addClass('act_type');
        $('.blk_disb').removeClass('blk_no_dis');
        $(this).siblings('.cash_trns, .lnk_typ').removeClass('act_type');
        // $('.blk_disb').addClass('blk_no_dis');
        $(this).parent().siblings('.ove_auto').find('.lon_typ').removeClass('hide_blk_anim');
    });
    $('.lnk_typ.cash_trns').click(function(){
        $(this).addClass('act_type');
        $('.blk_disb').removeClass('blk_no_dis');
        // $('.blk_disb').addClass('blk_no_dis');
        $(this).siblings('.ban_trns, .lnk_typ').removeClass('act_type');
        $(this).parent().siblings('.ove_auto').find('.lon_typ').addClass('hide_blk_anim');
    });
    $('.lnk_typ.crd_sale').click(function(){
        $(this).addClass('act_type');
        $('.blk_disb').removeClass('blk_no_dis');
        $(this).siblings('.cash_trns, .lnk_typ').removeClass('act_type');
        // $('.blk_disb').addClass('blk_no_dis');
        $(this).parent().siblings('.ove_auto').find('.lon_typ').removeClass('hide_blk_anim');
    });
    $('.lnk_typ.cash_sale').click(function(){
        $(this).addClass('act_type');
        $('.blk_disb').removeClass('blk_no_dis');
        // $('.blk_disb').addClass('blk_no_dis');
        $(this).siblings('.ban_trns, .lnk_typ').removeClass('act_type');
        $(this).parent().siblings('.ove_auto').find('.lon_typ').addClass('hide_blk_anim');
    });

    
    $('#billadd').click(function(){
    	
    		if($(this).prop("checked") == true){
                var s_name = $("#s_name").val();
			    var s_mobile = $("#s_mobile").val();
			    var s_address = $("#s_address").val();
			    var s_state = $("#s_state").val();
			    var s_pincode = $("#s_pincode").val();

			    if(s_name == ""){ err = 1; err_msg = "Please enter name!"; tagid = "#s_name";
			        return form_validation(err,err_msg,tagid);}
			    if(s_mobile == ""){ err = 1; err_msg = "Please enter mobile!"; tagid = "#s_mobile";
			        return form_validation(err,err_msg,tagid);}
			    if(s_address == ""){ err = 1; err_msg = "Please enter address!"; tagid = "#s_address";
			        return form_validation(err,err_msg,tagid);} 
			    if(s_state == ""){ err = 1; err_msg = "Please enter state!"; tagid = "#s_state";
			        return form_validation(err,err_msg,tagid);}
			    if(s_pincode == ""){ err = 1; err_msg = "Please enter pincode!"; tagid = "#s_pincode";
			        return form_validation(err,err_msg,tagid);}

			    $("#b_name").val(s_name);
			    $("#b_mobile").val(s_mobile);
			    $("#b_address").val(s_address);
			    $("#b_state").val(s_state);
			    $("#b_pincode").val(s_pincode);	    

            }
            else if($(this).prop("checked") == false){
                $("#b_name").val('');
			    $("#b_mobile").val('');
			    $("#b_address").val('');
			    $("#b_state").val('');
			    $("#b_pincode").val('');	
            }
    });

    /*$('#mobile').blur(function(){
	    var user_id = $("#userid").val().trim();
	    var ukey = $("#ukey").val().trim();
	    var mobile = $("#mobile").val().trim();
	    if(user_id == "")
	    {
	      if(ukey!='' && mobile!='')
	      {
	          $.ajax({    
	                url: url+"api/sales/insertguest",
	                data: {ukey:ukey,mobile:mobile},
	                type:'POST',    
	                datatype:'json',
	                success : function(response1){
	                    rescp1 = JSON.parse(response1);        
	                    if(rescp1.status=='success')
	                    {
		                    $("#userid").val(rescp1.insert_id);
		                    var err_msg= 'Guest user added successfully';
		                    $("#snackbar").text(err_msg);
		                    $("#snackbar").addClass("show");
		                    setTimeout(function(){ $("#snackbar").removeClass("show"); }, 3000);
	                    }
	                }
	          });
	      }
	    }
    });*/ 

$('#ukey').blur(function(){
    //var usercode = $(this).val();   
    //var usercode = $("#select_usercode").val().trim();
    var user_id = $("#userid").val().trim();
    if(user_id != "")
    {
      getusercrops(user_id,'add');
     
    }else{
      var opt = '<option value="">-- Select Crop --</option>';
      $("#crop_opt").html(opt); $("#crop_opt").val('');   
       
      //document.getElementById("crop_opt").fstdropdown.rebind();
      //document.getElementById("bank_opt").fstdropdown.rebind();
      
    }     
});

});

$(document).on('blur', "[id^=received_amount]", function() {
	var proqty = $('#received_amount').val();
	if(proqty!='')
	{
		$('#disamt').show();
	}
	else
	{
		$('#disamt').hide();
	}
});

$(document).on('blur', "[id^=proname]", function() {
		var id = $(this).attr('id');
    	id = id.replace("proname", '');
    	
    	var vd = $('#proname'+id).val();
    	var proqty = $('#proqty'+id).val();
    	var promrp = $('#promrp'+id).val();
    	var prodisc = $('#prodisc'+id).val();
    	var protot = $('#protot'+id).val();
    	
    	if(vd=='' )
    	{
    		//$('#rowNums'+id).remove();
    	}

});

/*$(document).on('blur', "[id^=proqty]", function() {
		var id = $(this).attr('id');
    	id = id.replace("proqty", '');
    	
    	var qty = $('#proqty'+id).val();
		var mrp = $('#promrpval'+id).val();
		$('#promrp'+id).val(mrp);
		var ft = qty*mrp;
		$('#protot'+id).val(ft);

});*/
$(document).on('keyup', "[id^=received_amount]", function() {
	var gt = $('#gtotamtval').val();
	var rcmt = $('#received_amount').val();

		if(gt=='' || gt==0)
        {
        	$('#received_amount').val('');
          if(gt=='' || gt==0){ err = 1; err_msg = "Please add products!"; tagid = "#proid0"; 
          return form_validation(err,err_msg,tagid); }
          return false;
        }
        if(parseInt(rcmt)>parseInt(gt))
        {
          $('#received_amount').val('');
          if(parseInt(rcmt)>parseInt(gt)){ err = 1; err_msg = "Received amount is less than grand total!"; tagid = "#received_amount"; 
          return form_validation(err,err_msg,tagid); }
          return false;
        }

});
$(document).on('blur', "[id^=prodisc]", function() {
    calculateTotal();
}); 
$(document).on('blur', "[id^=proqty]", function() {
    calculateTotal();
}); 
$(document).on('blur', "[id^=load_charge]", function() {
    calculateTotal();
}); 
$(document).on('blur', "[id^=transport_charge]", function() {
    calculateTotal();
}); 

$(document).on('keypress', "[id^=proname]", function() {
    var id = $(this).attr('id');
    id = id.replace("proname", '');

    var branch = $("input[name='branchval']:checked").val();
    var proids = $("input[name='proid[]']").map(function(){return $(this).val();}).get();

    if(branch==undefined || branch=='')
    {
    	err = 1; err_msg = "Please select branch"; tagid = "#brn_l";
        return form_validation(err,err_msg,tagid);
    }
    else
    {
    	$('.mykey').parent().css("border", "");
	    $('#proid'+id).val(0);
	    $('#promrpval'+id).val(0);
	    $('#promrp'+id).val(0);
	    $('#proqty'+id).val(0);
	    $('#protot'+id).val(0);
	    $('#prototval'+id).val(0);

	    calculateTotal();

	    $( "#proname"+id ).autocomplete({
	    	source: function( request, response ) {

		     $.ajax({
		    url: url+"api/sales/search_products",
		    type: 'post',
		    dataType: "json",
		    data: {
		     search: request.term,branch:branch,proid:proids
		    },
	    	success: function( data ) { 

		    if(data == null)
		    {
		        var err_msg= 'Product not available';
				$("#snackbar").text(err_msg);
				$("#snackbar").addClass("show");
				setTimeout(function(){ $("#snackbar").removeClass("show"); }, 3000);
		    }
	    
	      	response( $.map( data, function( result ) {  

		    return {  
			      label: result.label,
			      value: result.value,
			      imgsrc: result.img,   
			      pro_id: result.pid,
			      promrp : result.pmrp,
			      packing: result.packing,
			      units : result.units
		    }  
	      }));  

	    }  
	     });
	    },
	    select: function (event, ui) {
	     // Set selection

	     	$('#proname'+id).val(ui.item.label); 
	     	$('#proid'+id).val(ui.item.pro_id);
	     	$('#promrpval'+id).val(ui.item.promrp);
	     	$('#promrp'+id).val(addCommas(ui.item.promrp));
	     	$('#proqty'+id).val(1);

	     	/*$('#protot'+id).val(addCommas(ui.item.promrp));
	     	$('#prototval'+id).val(ui.item.promrp);

	     	$('#totamt').html(addCommas(ui.item.promrp));
	     	$('#totamtval').val(ui.item.promrp);

	     	$('#gtotamt').html(addCommas(ui.item.promrp));
	     	$('#gtotamtval').val(ui.item.promrp);*/
	     	calculateTotal();

            /* var rvvv = $('#rowval').val();
			var rowNum = rvvv;
	     	rowNum ++;
	     	var rrv = rowNum;
	     
	     	
	     	if($('#proid'+rrv).val()!='')
	     	{
	     		$('#rowval').val(rrv);

	     	htmlRows = '<tr id="rowNums'+rowNum+'" ><td><input type="hidden" placeholder="Product Name" name="proid[]" id="proid'+rowNum+'" value="0"><input class="mykey" type="text" placeholder="Product Name" name="proname[]" id="proname'+rowNum+'" > </td><td class="qty txt_cnt"> <input type="text" class="mykey" placeholder="0" onkeypress="return onlyNumberKey(event)" name="proqty[]" id="proqty'+rowNum+'"></td><td class="mrp txt_rt"> <input type="text" class="mykey" readonly placeholder="0" name="promrp[]" id="promrp'+rowNum+'"><input type="hidden" placeholder="0" name="promrpval[]" id="promrpval'+rowNum+'"> </td><td class="disc txt_rt"> <input type="text" class="mykey" placeholder="0" name="prodisc[]" id="prodisc'+rowNum+'"> </td><td class="ttl_prc txt_rt"> <input type="text" placeholder="0" readonly name="protot[]" id="protot'+rowNum+'"><input type="hidden" placeholder="0" name="prototval[]" id="prototval'+rowNum+'" > </td><td ><i class="fa fa-trash" onclick="removerow('+rowNum+')" style="color:red" ></i></td></tr>';

	     	$('#invoiceItem').append(htmlRows);
	     } */
	     	
	    }
	    
	    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) { 
	     	
	    	
	           return $( "<li></li>" )  

	               .data( "item.autocomplete", item )  

	               .append( "<a>" + item.label+ " "+item.units+"/"+item.packing+"</a>" )  

	               .appendTo( ul );  


	             
	   };
    }
    
});

$("#salefrm").submit(function(e) {  

	var sallen = $(':radio[name="sale_types"]:checked').length;
	var bralen = $(':radio[name="branchval"]:checked').length;
	var saletype = $("input[name='sale_types']:checked").val();
	var branchval = $("input[name='branchval']:checked").val();
    
    var ukey = $("#ukey").val();
    var userid = $("#userid").val();   
    var proname0 = $("#proname0").val();
    var proqty0 = $("#proqty0").val();

    var tralen = $(':radio[name="transport_type"]:checked').length;
    var driver_name = $("#driver_name").val();
    var driver_mobile = $("#driver_mobile").val();
    var vehicle_number = $("#vehicle_number").val();
    var s_name = $("#s_name").val();
    var s_mobile = $("#s_mobile").val();
    var s_address = $("#s_address").val();
    var s_state = $("#s_state").val();
    var s_pincode = $("#s_pincode").val();
    var b_name = $("#b_name").val();
    var b_mobile = $("#b_mobile").val();
    var b_address = $("#b_address").val();
    var b_state = $("#b_state").val();
    var b_pincode = $("#b_pincode").val();
    var b_gst = $("#b_gst").val();
        
    
  	if(sallen == 0 ){ err = 1; err_msg = "Please select sale type!"; tagid = "#saletype";
              return form_validation(err,err_msg,tagid);}
    if(bralen == 0 ){ err = 1; err_msg = "Please select branch!"; tagid = "#brn_l";
              return form_validation(err,err_msg,tagid);}  

   	if(ukey == ""){ err = 1; err_msg = "Please search user!"; tagid = "#ukey";
        return form_validation(err,err_msg,tagid);} 
    if(saletype == "cash")
    {     
      var mobile = $("#mobile").val();  
      if(mobile == ""){ err = 1; err_msg = "Please enter mobile!"; tagid = "#mobile";
        return form_validation(err,err_msg,tagid);}     
    } 
    if(saletype == "credit")
    {  
    	if(userid == ""){ err = 1; err_msg = "User is not registered!"; tagid = "#ukey";
        return form_validation(err,err_msg,tagid);}
        var usertype = $("#usertype").val();

        if(usertype=='FARMER')
        {
        	var len = $(':radio[name="crop_opt"]:checked').length;
        	if(len == 0 ){ err = 1; err_msg = "Please select crop location!"; tagid = "#crop_1";
        	return form_validation(err,err_msg,tagid);}
        }
    }     
        

    if(proname0 == ""){ err = 1; err_msg = "Please select product!"; tagid = "#proname0";
        return form_validation(err,err_msg,tagid);}
    if(proqty0 == 0){ err = 1; err_msg = "Please enter quantity!"; tagid = "#proqty0";
        return form_validation(err,err_msg,tagid);}

     if(saletype == "cash")
    {     
      var received_amount = $("#received_amount").val();  
      if(received_amount!='')
      {
      		 var payment_date = $("#payment_date").val();
      		 var bblen = $(':radio[name="bankid"]:checked').length;
      		 var bank_reference = $("#bank_reference").val();

      		if(payment_date == ""){ err = 1; err_msg = "Please select date!"; tagid = "#payment_date";
        	return form_validation(err,err_msg,tagid);}
        	if(bblen == 0){ err = 1; err_msg = "Please select bank!"; tagid = "#bnkl";
        	return form_validation(err,err_msg,tagid);}
        	if(bank_reference == ""){ err = 1; err_msg = "Please enter reference number!"; tagid = "#bank_reference";
        	return form_validation(err,err_msg,tagid);}
      }
    }    

    if(tralen == 0 ){ err = 1; err_msg = "Please select tranport type!"; tagid = "#trn1";
              return form_validation(err,err_msg,tagid);}

    if(driver_name == ""){ err = 1; err_msg = "Please enter driver name!"; tagid = "#driver_name";
        return form_validation(err,err_msg,tagid);}
    if(driver_mobile == ""){ err = 1; err_msg = "Please enter driver mobile!"; tagid = "#driver_mobile";
        return form_validation(err,err_msg,tagid);}
    if(vehicle_number == ""){ err = 1; err_msg = "Please enter vehicle number!"; tagid = "#vehicle_number";
        return form_validation(err,err_msg,tagid);}

    if(s_name == ""){ err = 1; err_msg = "Please enter name!"; tagid = "#s_name";
        return form_validation(err,err_msg,tagid);}
    if(s_mobile == ""){ err = 1; err_msg = "Please enter mobile!"; tagid = "#s_mobile";
        return form_validation(err,err_msg,tagid);}
    if(s_address == ""){ err = 1; err_msg = "Please enter address!"; tagid = "#s_address";
        return form_validation(err,err_msg,tagid);} 
    if(s_state == ""){ err = 1; err_msg = "Please enter state!"; tagid = "#s_state";
        return form_validation(err,err_msg,tagid);}
    if(s_pincode == ""){ err = 1; err_msg = "Please enter pincode!"; tagid = "#s_pincode";
        return form_validation(err,err_msg,tagid);}

    if(b_name == ""){ err = 1; err_msg = "Please enter name!"; tagid = "#b_name";
        return form_validation(err,err_msg,tagid);}
    if(b_mobile == ""){ err = 1; err_msg = "Please enter mobile!"; tagid = "#b_mobile";
        return form_validation(err,err_msg,tagid);}
    if(b_address == ""){ err = 1; err_msg = "Please enter address!"; tagid = "#b_address";
        return form_validation(err,err_msg,tagid);} 
    if(b_state == ""){ err = 1; err_msg = "Please enter state!"; tagid = "#b_state";
        return form_validation(err,err_msg,tagid);}
    if(b_pincode == ""){ err = 1; err_msg = "Please enter pincode!"; tagid = "#b_pincode";
        return form_validation(err,err_msg,tagid);}
    if(b_gst == ""){ err = 1; err_msg = "Please enter gst!"; tagid = "#b_gst";
        return form_validation(err,err_msg,tagid);}

                  
  /* print_preview */
  $('#invoice_body').load("<?php echo base_url('api/sales/invoice_preview')?>", $("form").serializeArray(),function(){
    $(".pop_blk_prive").mCustomScrollbar({
        theme:"minimal",
        mouseWheelPixels: 35,
        scrollInertia:250,
    });
  });
  
	$("#invoice_preview_modal").modal('show');

	/* ------- */
});

$("#confirmOrder").on("click",function(){
      /*form submit*/
    formData = new FormData(salefrm);    
        
          $.ajax({
            url: url+"api/sales/add",
            data: formData,
            type:'POST',
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            datatype:'json',
            success : function(response)
            {           
              res= JSON.parse(response);
              if(res.status == 'success')
              { 
                new PNotify({
                  title: 'Success',
                  text: "Order created successfully!",
                  type: 'success',
                  shadow: true
                });
                
                window.location.href = "<?php echo base_url('api/sales/sale_invoice');?>/"+res.insert_id;
                  setTimeout(function() {
                    location.reload();
                  }, 2000);  
                              
              }
              else{
                new PNotify({
                  title: 'Error',
                  text: 'Something went wrong, try again!',
                  type: 'failure',
                  shadow: true
                });
              }         
            }
     }); 
    /*form submit*/
  });

$( function() {
	$( "#ukey" ).autocomplete({
    source: function( request, response ) {
      $('#userid').val('');
     
      $('#mobile').val('');
      $("#mobile").prop( "readonly", false );
      var sale_type = $("input[name='sale_types']:checked").val();
     // Fetch data
     $('.err_msg').hide();
     $.ajax({
    url: url+"api/sales/searchusers",
    type: 'post',
    dataType: "json",
    data: {
     search: request.term,ttype:sale_type
    },
    success: function( data ) { 
    	$('.cre_inp').addClass('inp_ss');
    if(sale_type=='credit')
    {
      if(data == null)
      {
        //$("#ukey").val('');
        $('.err_msg').show();
      }
    } 
      response( $.map( data, function( result ) {  

      return {  
      label: result.label,
      value: result.value,
      imgsrc: result.img,   
      user_id: result.user_id,
      mobile:result.mobile,
      user_type: result.user_type
      }  

      }));  

    }  
     });
    },
    select: function (event, ui) {
    	
     // Set selection
      if(ui.item.user_type == "DEALER"){ $("#cropdis").hide();}else{ $("#cropdis").show(); }

     var sale_type = $("input[name='sale_types']:checked").val();
     if(sale_type=='cash')
     {
     	$("#cropdis").hide();
     	$('#guestmobile').show();
     }
     else
     {
     	$("#cropdis").show();
     	$('#guestmobile').hide();
     }
     
        $('#mobile').val(ui.item.mobile);
        $("#mobile").prop( "readonly", true );

     $('#ukey').val(ui.item.label); // display the selected text
     $('#userid').val(ui.item.user_id); // save selected id to input
     $('#usertype').val(ui.item.user_type);
     //return false;
    }
    
   }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {  

           return $( "<li></li>" )  

               .data( "item.autocomplete", item )  

               .append( "<a>" + "<img style='width:25px;height:25px' src='" + item.imgsrc + "' /> " + item.label+ "</a>" )  

               .appendTo( ul );  

  };
});
function form_validation(err,err_msg,tagid)
{
  $('.mykey').parent().css("border", "");
  /* $(".err_msg").text(err_msg);
      
  $("#danger-alert").fadeTo(2000, 500).slideUp(1000, function(){
    $("#danger-alert").slideUp(1000);
  }); */
  $("#snackbar").text(err_msg);
  $("#snackbar").addClass("show");
  /* var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000); */
  setTimeout(function(){ $("#snackbar").removeClass("show"); }, 3000);
  $(tagid).parent().css("border", "1px solid red");
  //$("#tname").css("border", "1px solid red");
  $(tagid).focus();
  return false;
}
function addCommas(x) {
  x=x.toString();
  var lastThree = x.substring(x.length-3);
  var otherNumbers = x.substring(0,x.length-3);
  if(otherNumbers != '')
  lastThree = ',' + lastThree;
  //var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
  var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/, ",") + lastThree;

  return res;
}
function calculateTotal() {
    var qty = 0;
    var totamt = 0;
    var grandTotal = 0;
    $('.cre_inp').addClass('inp_ss');
    var ddisc =0;

    $("[id^='proqty']").each(function() {
        var id = $(this).attr('id');
        id = id.replace("proqty", '');
        var proqty = $("#proqty" + id).val();
        var promrpval = $('#promrpval' + id).val();
        var prodisc = $('#prodisc' + id).val();
       //alert(prodisc);
        $('#promrp' + id).val(promrpval);

        var total = proqty * promrpval;
        
        var ds = prodisc/100;
        var dsc = ds*total;
        var tot1 = total-dsc;

        var ftot = tot1.toFixed(2);
        //$('#protot' + id).val(addCommas(ftot));
        $('#protot' + id).val(ftot);
        $('#prototval' + id).val(ftot);

        grandTotal += tot1;
        ddisc += prodisc; 

    });
    var loadc = $('#load_charge').val();
    var transportc = $('#transport_charge').val();
    
    if(loadc!='' && loadc!=NaN )
    {
      
    }
    else
    {
      loadc = 0;
    }

    if(transportc!='' && transportc!=NaN )
    { 
      
    }
    else
    {
      transportc = 0;
    }
   //alert(ddisc);

    var GrandTot = parseFloat(grandTotal) + parseInt(loadc) + parseInt(transportc);
   // $('#totamt').html(addCommas(grandTotal));
   // $('#gtotamt').html(addCommas(GrandTot));
    $('#totamt').html(grandTotal.toFixed(2));
    $('#gtotamt').html(GrandTot.toFixed(2));
    $('#totdiscount').val(ddisc);
    $('#totamtval').val(grandTotal.toFixed(2));
    $('#gtotamtval').val(GrandTot.toFixed(2));

    var saletype = $("input[name='sale_types']:checked").val();
    if(saletype=='cash')
    {
    	$('#received_amount').val(GrandTot.toFixed(2));
    	$('#disamt').show();
    	$('#textcredit').show();
    	$('#textcredit').html(GrandTot.toFixed(2)+' will be added to user credit');
    	$('#textcash').hide();
    }else
    {
    	$('#textcash').show();
    	$('#disamt').show();
    	$('#textcash').html('Remaining amount will be added to user credit amount');
    	$('#textcredit').hide();
    }
}
function onlyNumberKey(evt) { 
          
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
}
function removerow(id)
{
	var rr = $('#rowval').val();
	if(rr!=0)
	{
		rr --;
		$('#rowval').val(rr);
		$('#rowNums'+id).remove();
		calculateTotal();
	}
	else if(rr==0)
	{
		$('#proname'+id).val('');
		$('#proqty'+id).val('');
		$('#promrpval'+id).val('');
		$('#promrp'+id).html('');
		$('#prodisc'+id).val('');
		calculateTotal();
		$('#rowval').val(rr);
		$('#rowNums'+id).remove();

		htmlRows = '<tr id="rowNums0" ><td><input type="hidden" placeholder="Product Name" name="proid[]" id="proid0" value="0"><input class="mykey" type="text" placeholder="Product Name" name="proname[]" id="proname0" autocomplete="off" > </td><td class="qty txt_cnt"> <input type="text" class="mykey" placeholder="0" onkeypress="return onlyNumberKey(event)" name="proqty[]" id="proqty0"></td><td class="mrp txt_rt"> <input type="text" class="mykey" readonly placeholder="0" name="promrp[]" id="promrp0"><input type="hidden" placeholder="0" name="promrpval[]" id="promrpval0"> </td><td class="disc txt_rt"> <input type="text" class="mykey disckey noalpha" placeholder="0" name="prodisc[]" onkeypress="return onlyNumberKey(event)" id="prodisc0"> </td><td class="ttl_prc txt_rt"> <input type="text" placeholder="0" readonly name="protot[]" id="protot0"><input type="hidden" placeholder="0" name="prototval[]" id="prototval0"><input type="hidden" class="form-control noalpha mykey" placeholder="" readonly name="hid_acivity_id[]" id="hid_acivity_id_0" value="0"></td><td class="dele_th_td"> <i class="fa fa-trash" onclick="removerow(0,0)" style="color:red"></i> </td></tr>';
			        
		$('#invoiceItem').append(htmlRows);
		
	}
}
function addmorerows()
{
		var rr = $('#rowval').val();

		var rowNum = rr;
	    rowNum ++;
	    var rrv = rowNum;
	    $('#rowval').val(rrv);
	     	
	    htmlRows = '<tr id="rowNums'+rowNum+'" ><td><input type="hidden" placeholder="Product Name" name="proid[]" id="proid'+rowNum+'" value="0" ><input class="mykey" type="text" placeholder="Product Name" autocomplete="off" name="proname[]" id="proname'+rowNum+'" > </td><td class="qty txt_cnt"> <input type="text" class="mykey" placeholder="0" onkeypress="return onlyNumberKey(event)" name="proqty[]" id="proqty'+rowNum+'"></td><td class="mrp txt_rt"> <input type="text" class="mykey" readonly placeholder="0" name="promrp[]" id="promrp'+rowNum+'"><input type="hidden" placeholder="0" name="promrpval[]" id="promrpval'+rowNum+'"> </td><td class="disc txt_rt"> <input type="text" class="mykey disckey noalpha" placeholder="0" name="prodisc[]" id="prodisc'+rowNum+'"> </td><td class="ttl_prc txt_rt"> <input type="text" placeholder="0" readonly name="protot[]" id="protot'+rowNum+'"><input type="hidden" placeholder="0" name="prototval[]" id="prototval'+rowNum+'" > </td><td class="dele_th_td"><i class="fa fa-trash" onclick="removerow('+rowNum+')" style="color:red" ></i></td></tr>';

	    var saletype = $("input[name='sale_types']:checked").val();
    	if(saletype=='cash')
    	{
	     	$('.disckey').prop('readonly', true);
	    }
	    else{
	    	$('.disckey').prop('readonly', true);
	    } 	
	    
	    $('#invoiceItem').append(htmlRows);
}
</script>
<?php require_once 'footer.php' ; ?>