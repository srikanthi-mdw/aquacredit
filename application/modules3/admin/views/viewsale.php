<?php require_once 'header.php' ; ?>
<link href="<?php echo base_url();?>assets/css/createsale.css" type="text/css" rel="stylesheet">
<?php require_once 'sidebar.php' ; ?>
<style>
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

</style>
<div class="right_blk">
	
	<div class="top_ttl_blk"> 
		<!-- <span class="back_btn"><a href="<?php echo base_url();?>admin/sales" title=""><img src="<?php echo base_url();?>assets/images/back.png" alt="" title=""> </a></span> --> <span> <?php echo $page_title;?></span> (<span id="saleordid"></span>)
		<a href="<?php echo base_url();?>admin/sales" title="" class="fr btn btn-primary"> Show all sales  </a>
		<div id="snackbar" class=""></div>
	</div>
	<form id="salefrm" name="salefrm" action="javascript:void(0);" method="post">
	<div class="sale_rt">

		<h2 class="create_hdg"> Transport Details </h2>
		<ul class="create_ul"> 
		<input type="hidden" name="saleid" id="saleid" value="<?php echo $pid; ?>" >
										<li class="create_li slc_usr mykey">
												<div class="check_wt_serc"> 
													<div class="show_va">Select  Transport</div>
													<div class="selectVal tranval_type">  Transport Type </div>
													<!-- <ul class="check_list mykey" id="trn1" style="display: none;"> 
														<li id="transport_opt_li mykey">
															<div class="form-check">
															  <input class="form-check-input mykey" type="radio" name="transport_type" id="brn1" value="ssa">
															  <label class="form-check-label" for="trns2">
															  	SSA Vehicle
															  </label>
															</div>
													
															<div class="form-check">
															  <input class="form-check-input mykey" type="radio" name="transport_type" id="brn2" value="user">
															  <label class="form-check-label" for="trns2">
															 	User Vehicle
															  </label>
															</div>
														</li>
													</ul> -->												
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
			    	<input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="s_pincode" id="s_pincode">
				</div>
			 </li>

		</ul>
		<div class="checkbox">
  			<label><input type="checkbox" value="" name="billadd" id="billadd" class="mykey"> Billing and shipping address are same</label>
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
					    <input type="text" onkeypress="return onlyNumberKey(event)" class="form-control mykey" placeholder="" data-original-title="" title="" name="b_pincode" id="b_pincode">
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

			<li class="act_type lnk_typ crd_sale mykey" > 
				<img src="http://3.7.44.132/aquacredit/assets/images/credit_icn.png">
				<input type="radio" name="sale_types" id="sale1" value="credit" class="mykey">
				<span> Credit Sale </span>
			</li>
			<li class="cash_sale lnk_typ mykey" > 
				<img src="http://3.7.44.132/aquacredit/assets/images/cash_icn.png">
				<input type="radio" name="sale_types" id="sale2" value="cash"  class="mykey">
				<span> Cash Sale </span>
			</li>

		</ul>

		<ul class="create_ul"> 
					<li class="create_li slc_usr">
						<div class="check_wt_serc mykey" id="branchlist"> 
							<div class="show_va mykey">Select  Branch</div>
							<div class="selectVal crop_type_val mykey" >  Select  Branch </div>
							<!-- <ul class="check_list mykey" id="brn_l"> 
								<li id="crop_opt_li">
									<div class="form-check">
										<input class="form-check-input mykey" type="radio" name="branchval" id="branch" value="">
										<label class="form-check-label mykey" for="branch">
															 	Select Branch
										</label>
									</div>
								</li>
							</ul> -->												
						</div>
					</li>
					<li class="create_li">
					<div class="cre_inp">
					  <div class="sm_blk"> Search User </div>
					    <input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="ukey" id="ukey">
					    <input type="hidden" class="form-control" placeholder=""  name="userid" id="userid">
					 </div>
					 <div class="err_msg" style="display: none;"> User Not Found </div>
					</li>
					<li class="create_li slc_usr" id="cropdis" style="display: none;">
						<div class="check_wt_serc wth_225_sel" id="branchlist"> 
							<div class="show_va">Crop location</div>
							<div class="selectVal crop_type_val1"> Crop location </div>
							<!-- <ul class="check_list" id="crop_1"> 
                            <li id="crops_opt_li">
                              <div class="form-check">
                                <input class="form-check-input mykey" type="radio" name="crop_opt" id="crop_opt" >
                                <label class="form-check-label" >
                                Crop Location
                                </label>
                              </div>
                            </li>
                          </ul>    	 -->											
						</div>
					</li>
					<li class="create_li " style="display: none;" id="guestmobile">
					 	<div class="cre_inp">
					  		<div class="sm_blk"> Mobile </div>
					    	<input type="text" onkeypress="return onlyNumberKey(event)" maxlength="10" class="form-control mykey" placeholder="" data-original-title="" title="" name="mobile" id="mobile">
						</div>
					</li>
		</ul>
		<div class="res_tbl">
			<table class="sa_lst" cellpadding="0" cellspacing="" border="0">
				<thead>
				<tr> 
					<th> Product Name </th>
					<th class="qty txt_cnt"> Qty </th>
					<th class="mrp txt_rt"> MRP </th>
					<th class="disc txt_rt"> Discount </th>
					<th class="ttl_prc txt_rt"> Total Price </th>
					
				</tr>
				</thead>
				<tbody id="invoiceItem">
				<input type="hidden" name="rcntval" id="rcntval" >
					<!-- <tr id="rowNums0"> 
						<td> <input type="hidden" class="mykey" placeholder="Product Name" name="proid[]" id="proid0" >
							 <input type="text" class="mykey" placeholder="Product Name" name="proname[]" id="proname0" > </td>
						<td class="qty txt_cnt"> <input type="text" class="mykey" placeholder="0" onkeypress="return onlyNumberKey(event)" name="proqty[]" id="proqty0"> </td>
						<td class="mrp txt_rt"> <input type="text" class="mykey" placeholder="0" name="promrp[]" id="promrp0" readonly><input type="hidden" class="mykey" placeholder="0" name="promrpval[]" id="promrpval0" > </td>
						<td class="disc txt_rt"> <input type="text" class="mykey" placeholder="0" name="prodisc[]" id="prodisc0"> </td>
						<td class="ttl_prc txt_rt"> <input type="text" class="mykey" placeholder="0" name="protot[]" id="protot0" readonly>
						<input type="hidden" placeholder="0" name="prototval[]" id="prototval0" >
						 </td>
					</tr> -->
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4" class="txt_rt"> <b> Total Amount </b> </td>
						<td class="txt_rt ttl_prc"  > <b id="totamt"> 0 </b> 
						<input type="hidden" placeholder="0" name="totamtval" id="totamtval" >
						</td>
					</tr>
				</tfoot>
			</table>
				
			<table class="sa_lst mar_sale_ttl" cellpadding="0" cellspacing="" border="0">
					<tr>
						<td class="txt_rt"> Loading Charges </td>
						<td class="txt_rt ttl_prc"> <input type="text" class="mykey" onkeypress="return onlyNumberKey(event)" value="0" name="load_charge" id="load_charge"> </td>
					</tr>
					<tr>
						<td class="txt_rt"> Transport Charges </td>
						<td class="txt_rt ttl_prc"> <input type="text" class="mykey" onkeypress="return onlyNumberKey(event)" value="0" name="transport_charge" id="transport_charge"> </td>
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
				    	<input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="received_amount" id="received_amount" onkeypress="return onlyNumberKey(event)">
			 		</div>
				</span> 
			</h2>
			<p id="textcash"> </p>
			<p><a data-toggle="modal" data-target="#myModal">Payment Transactions List</a></p>
			<!-- popup start -->
			
			  <div class="modal fade" id="myModal" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        
			        </div>
			        <div class="modal-body">
			        	<table class="actl_tbl table" cellspacing="0" cellpadding="0" border="0">
			            <thead>
			              <tr> 
			              	<th> Date </th>
			                <th> Bank</th>
			                <th> Account Number </th>
			                <th> IFSC Code </th>
			                <th> Reference Number </th>
			                <th> Amount </th>
			                     
			              </tr>
			            </thead>
			            <tbody id="transactionlist">
			            </tbody>
			          </table>
			        </div>
			      
			         <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
			        
			      </div>
			      
			    </div>
			  </div>
			<!-- popup end -->
			<div id="disamt" style="display: none;">
				<ul class="assign_type"> 
					<li class="act_type lnk_typ ban_trns mykey"> 
						<img src="http://3.7.44.132/aquacredit/assets/images/bank_tansfer.png">
						<input type="radio" name="paymenttype" value="bank" checked id="pay1" class="mykey">
						<span> Bank Transfer </span>
					</li>
					<li class="cash_trns lnk_typ mykey"> 
						<img src="http://3.7.44.132/aquacredit/assets/images/cash_icn.png">
						<input type="radio" name="paymenttype" value="cash" id="pay2" class="mykey">
						<span> Cash </span>
					</li>
				</ul>
				<ul class="trans_inf bnk_tr"> 
					<li class="create_li date">
						<div class="cre_inp">
							<div class="sm_blk"> Date </div>
						    <input type="text" class="form-control mykey" placeholder="" data-original-title="" title="" name="payment_date" id="payment_date" onkeydown="return false;">
						</div>
					</li>
					<li class="admin_bank_li" > 
				 		<div class="check_wt_serc" id="bankslist"> 
				            <div class="show_va"> Select Bank </div>
				            <div class="selectVal bankval_chk">  Select Bank </div>
							<!-- <ul class="check_list mykey" id="bnkl"> 
							    <li id="bank_opt_li"> 
								    <div class="form-check">
								  		<input class="form-check-input mykey" type="radio" name="bankid" id="bnk" value="Bank 1">
										<label class="form-check-labe mykeyl" for="bnk">
											Select Bank
										</label>
									</div>
								</li>
							</ul> -->
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
			<p id="textcredit"></p>
			<div class="note_add"> <a href="#" title=""> Note </a> </div> 
				<textarea class="mykey" placeholder="Note" name="note"></textarea>
			</div>
			<div class="po_ftr">
				<!-- <button class="btn fr sb_btn btn-primary" data-toggle="modal" data-target="#view_order"> Create Order </button> -->
				<!-- <button class="btn fr sb_btn btn-primary" type="submit"> Update Order </button> -->
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
    <td colspan="2" style="font-size: 16px; padding-top: 10px; padding-bottom: 10px; text-align: right;"><b>Grand Total </b></td>
    <td style="font-size: 16px; padding-top: 10px; padding-bottom: 10px; text-align: right;"><b>21,500</b></td>
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

<script type="text/javascript">
var url = '<?php echo base_url()?>';
$(".mykey").prop( "disabled", true );
getsale();
function getbranches(bid)
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
            		if(bid == crop.branch_id)
                    { 
                       sel = "checked"; 
                       $(".crop_type_val").text(crop.branch_name); 
                    }
                    else
                    { 
                      sel = "";
                    }

            opt += '<div class="form-check"><input class="form-check-input mykey" type="radio" name="branchval" id="branch" value="'+crop.	branch_id+'" '+sel+' /><label class="form-check-label" for="crp'+index+'">'+crop.branch_name+'</label></div>';
          });
        }
       
        //$("#crop_opt_li").html(opt);
    }
  });
}
function getusercrops(user_id,selval)
{
  var aeval = hidcrop = "";
 
  $.ajax({    
    url: url+"api/UserCrops/index/"+user_id,
    data: {},
    type:'POST',    
    datatype:'json',
    success : function(response){
      
      //alert(JSON.stringify(response));
      res= JSON.parse(response);        
      //alert(res.data.length);
      
      //var usercode = $('#select_usercode'+aeval).val();
      var user_id = $('#userid').val();
      var sel = "";
      if(user_id != "")
      {
        //var opt = '<option value="">-- Select Crop --</option>';
        var opt = "";
        if(res.data.length > 0)
        {
          $.each(res.data, function(index, crop) {
            
            if(crop.cd_id == selval){ 
            	sel = "checked"; 
            	 $(".crop_type_val1").text(crop.crop_location); 

            }else{ 
            	sel = "";
            }
            
            opt += '<div class="form-check"><input class="form-check-input" type="radio" name="crop_opt'+aeval+'" id="crp'+index+aeval+'" value="'+crop.cd_id+'" '+sel+' /><label class="form-check-label" for="crp'+index+aeval+'">'+crop.crop_location+'</label></div>';
          });
        }
      }else{
        //var opt = '<option value="">-- Select user first --</option>';
        var opt = '';
      }
     // $("#crops_opt_li").html(opt);
      //$("#crop_opt"+aeval).select2('refresh');
      //document.getElementById("crop_opt"+aeval).fstdropdown.rebind();
    }
  });
}
function getbanks(bid)
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

            	   if(bid == crop.bank_id)
                    { 
                       sel = "checked"; 
                       $(".bankval_chk").text(' ₹ '+crop.avail_amount+' '+crop.account_no); 
                    }
                    else
                    { 
                      sel = "";
                    }

            opt += '<div class="form-check"><input class="form-check-input mykey" type="radio" name="bankid" id="bnk2" value="'+crop.bank_id+'" '+sel+'><label class="form-check-label" for="bnk2"><div class="bank_logo">'+bimg+'</div><div class="bank_mny"><div class="bank_bal"> ₹ '+crop.avail_amount+' </div><div class="accont_numb">'+crop.account_no+'</div></div></label></div>';
          });
        }
       
       //$("#bank_opt_li").html(opt);
    }
  });
}

function gettransport(val)
{
	
	if(val == 'ssa')
    { 
        sel1 = "checked"; 
        $(".tranval_type").text('SA Vehicle'); 
    }
    else
    {
    	sel1 = ""; 
    }
                    

    if(val == 'user')
    { 
        sel = "checked"; 
        $(".tranval_type").text('User Vehicle'); 
    }
    else
    {
    	sel = "";
    }
                    

	var opt = '<div class="form-check"><input class="form-check-input mykey" type="radio" name="transport_type" id="brn1" value="ssa" '+sel1+'><label class="form-check-label" for="trns2">SA Vehicle</label></div><div class="form-check"><input class="form-check-input" type="radio" name="transport_type" id="brn2" value="user" '+sel+' ><label class="form-check-label" for="trns2">User Vehicle</label></div>';

	//$("#transport_opt_li").html(opt);

}
function getsale()
	{
		// Get Brand

		var pid = <?php echo $pid; ?>;
		
		$.ajax({		
			url: url+"api/sales/getsalesdetails/"+pid,
			data: {},
			type:'POST',		
			datatype:'json',
			success : function(response2){
				
				res= JSON.parse(response2);				
				//alert(res.data.status);
				if(res.data != "")
				{
					$('.cre_inp').addClass('inp_ss');
					$("#saleid").val(res.data.id);
					
					/*if(res.data.saletype==0)
					{
						$("#sale1").val(res.data.saletype);
						$("#sale1").prop( "checked", true );
					}
					else
					{ 
						$("#sale2").val(res.data.saletype);
						$("#sale2").prop( "checked", true );
					}*/

					$("#ukey").val(res.data.user_name);	
					$("#userid").val(res.data.userid);					
					$("#mobile").val(res.data.mobile);					
					$("#note").val(res.data.note);	
					//alert(res.data.addresstype);
					if(res.data.addresstype==1)
					{
						$('#billadd').prop('checked', true);
					}
					else
					{
						$('#billadd').prop('checked', false);
					}
					if(res.data.saletype==0)
					{
						$('#cropdis').show();
						$('#guestmobile').hide();
						var bcsh = 'credit';
						var ord = 'SCD'+pid;
					}
					else
					{
						$('#cropdis').hide();
						$('#guestmobile').show();
						var bcsh = 'cash';
						var ord = 'SCH'+pid;
					}
					$("#saleordid").html(ord);
					
					$('input[name="sale_types"][value="'+bcsh+'"]').prop('checked', true);
					if(res.data.saletype == 0)
					{
						$('.crd_sale').addClass('act_type');
						$('.cash_sale').removeClass('act_type');
						$("#discash").hide();
						$('.disckey').prop('readonly', true);

					}
					else if(res.data.saletype == 1)
					{
						$('.crd_sale').removeClass('act_type');
						$('.cash_sale').addClass('act_type');
						$("#discash").show();
						$('.disckey').prop('readonly', false);

						/*text display*/
						if( parseInt(res.data.grandtotal) > parseInt(res.data.received_amount))
    					{
    						$('#textcredit').hide();
	        				$('#textcash').html(' Due amount : '+res.data.balance_receivedamount+'</br> Paid amount : '+res.data.received_amount);
	        				$('#textcash').show();
    					}
    					else
    					{
    						$('#textcredit').hide();
    						if(res.data.balance_receivedamount!=0)
    						{
    							$('#textcash').html(res.data.balance_receivedamount+' Balance amount will be added in user credit </br> Total Paid Amount : '+res.data.received_amount);
    						}
    						else
    						{
    							$('#textcash').html(' Total Paid Amount : '+res.data.received_amount);
    						}
	        				
	        				$('#textcash').show();
    					}
						/*text display*/
					}

					$("#received_amount").val(res.data.received_amount);
					if(res.data.received_amount!='' && res.data.received_amount!=0)
					{
						$("#disamt").show();
					}
					else
					{
						$("#disamt").hide();
					}

					if(res.data.payment_date!='1970-01-01')
					{
						var a=$.datepicker.formatDate( "dd-M-yy", new Date(res.data.payment_date));
          				$("#payment_date").val(a);
					}
					

					$("#bank_reference").val(res.data.bank_reference);
					$("#driver_name").val(res.data.driver_name);	
					$("#driver_mobile").val(res.data.driver_mobile);	
					$("#vehicle_number").val(res.data.vehicle_number);

					$("#s_name").val(res.data.s_name);	
					$("#s_mobile").val(res.data.s_mobile);					
					$("#s_address").val(res.data.s_address);				
					$("#s_state").val(res.data.s_state);					
					$("#s_pincode").val(res.data.s_pincode);

					$("#b_name").val(res.data.b_name);
					$("#b_mobile").val(res.data.b_mobile);
					$("#b_address").val(res.data.b_address);				
					$("#b_state").val(res.data.b_state);					
					$("#b_pincode").val(res.data.b_pincode);
					$("#b_gst").val(res.data.b_gst);	

					$("#totamt").html(addCommas(res.data.total_saleprice));
					$("#totamtval").val(res.data.total_saleprice);
					$("#gtotamt").html(addCommas(res.data.grandtotal));
					$("#gtotamtval").val(res.data.grandtotal);	

					$("#load_charge").val(res.data.load_charge);
					$("#transport_charge").val(res.data.transport_charge);	

					var branchid = res.data.branchid;
					var bankid = res.data.bankid;
					var transport_type = res.data.transport_type;
					
					getusercrops(res.data.userid,res.data.crop_id);
					getbranches(branchid);
					getbanks(bankid);
					gettransport(transport_type);

				}				
			}
		});
		
		/*edit product details*/
					
		            $.ajax({
		            	url: url+"api/sales/getsaleactualdetails/"+pid,
			            data: {},
			            type:'POST',    
			            datatype:'json',
			            success : function(response1){

			              res1 = JSON.parse(response1);
			              
			              htmlRows = "";
			              
			              if(res1.data.length>0)
			              {
			                $('#rcntval').val(res1.data.length);
			                $.each(res1.data, function(index, trades) {
			                	
			                  var tcamtt = addCommas(trades.mrp);
			                  var tfamtt = addCommas(trades.total_price);


			                  htmlRows = '<tr id="rowNums'+trades.id+'"><td> <input type="hidden" class="mykey" placeholder="Product Name" name="proid[]" id="proid'+trades.id+'" value="'+trades.product_id+'" disabled><input type="text" class="mykey" placeholder="Product Name" name="proname[]" id="proname'+trades.id+'" value="'+trades.pname+'" disabled></td><td class="qty txt_cnt"> <input type="text" class="mykey" placeholder="0" onkeypress="return onlyNumberKey(event)" name="proqty[]" id="proqty'+trades.id+'" value="'+trades.quantity+'" disabled> </td><td class="mrp txt_rt"> <input type="text" class="mykey" placeholder="0" name="promrp[]" id="promrp'+trades.id+'" readonly value="'+tcamtt+'"><input type="hidden" class="mykey" placeholder="0" name="promrpval[]" id="promrpval'+trades.id+'" value="'+trades.mrp+'"> </td><td class="disc txt_rt"> <input type="text" class="mykey disckey" onkeypress="return onlyNumberKey(event)" placeholder="0" name="prodisc[]" id="prodisc'+trades.id+'" value="'+trades.discount+'" disabled> </td><td class="ttl_prc txt_rt"> <input type="text" class="mykey" placeholder="0" name="protot[]" id="protot'+trades.id+'" readonly value="'+tfamtt+'" disabled><input type="hidden" placeholder="0" name="prototval[]" id="prototval'+trades.id+'" value="'+trades.total_price+'" disabled><input type="hidden" class="form-control noalpha mykey" placeholder="" readonly name="hid_acivity_id[]" id="hid_acivity_id_'+trades.id+'" value="'+trades.id+'"></td></tr>';

			                  $('#invoiceItem').append(htmlRows);

			                  
			                   /* if(res.data.status==1)
			          			{
			          				$(".mykey").prop("disabled", true);
			          			}
			          			else
			          			{
			          				$(".mykey").prop("disabled", false);
			          			}*/

			                });
			               
			                    /*if(res.data.status==1)
			          			{
			          				$(".mykey").prop("disabled", true);
			          			}
			          			else
			          			{
			          				$(".mykey").prop("disabled", false);
			          			}*/

			              }
			              else
			              {

			                 

			                 
			              }
			              
			            }
		            });
					/*edit product details*/
					/*get transaction details*/
				$.ajax({
		            	url: url+"api/sales/gettransdetails/"+pid,
			            data: {},
			            type:'POST',    
			            datatype:'json',
			            success : function(response1_t){

			              res1_t = JSON.parse(response1_t);
			              
			              htmlRows = "";
			             
			              if(res1_t.data.length>0)
			              {
			              
			                $.each(res1_t.data, function(index, transaction) {

			                  var aa = $.datepicker.formatDate( "dd-M-yy", new Date(transaction.transaction_date));	
			                	
			                  htmlRows = '<tr ><td>'+aa+'</td><td>'+transaction.bank_name+'</td><td>'+transaction.account_no+'</td><td>'+transaction.bank_ifsc+'</td><td>'+transaction.reference_number+'</td><td>'+transaction.amount+'</td></tr>';

			                  $('#transactionlist').append(htmlRows);

			                  
			               
			                });
			              
			              }
			              

			            }
		        });
		/*get transaction details*/
	}
var url = '<?php echo base_url()?>';
$(document).ready(function(){

	var dateToday = new Date();
	  $("#payment_date").datepicker({
	    dateFormat: 'dd-M-yy',
	    changeMonth: true,
	    changeYear: true,
	    minDate: dateToday,
	    numberOfMonths: 1
	  });
/*
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
    });*/
  /*  $('.lnk_typ.crd_sale').click(function(){
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
    });*/

    
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

    $('#mobile').blur(function(){
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

			var rowNum = id;
	     	rowNum ++;
	     	var rrv = rowNum;
	     
	     	
	     	if($('#proid'+rrv).val()!='')
	     	{

	     	/*htmlRows = '<tr id="rowNums'+rowNum+'" ><td><input type="hidden" placeholder="Product Name" name="proid[]" id="proid'+rowNum+'" ><input class="mykey" type="text" placeholder="Product Name" name="proname[]" id="proname'+rowNum+'" > </td><td class="qty txt_cnt"> <input type="text" class="mykey" placeholder="0" onkeypress="return onlyNumberKey(event)" name="proqty[]" id="proqty'+rowNum+'"></td><td class="mrp txt_rt"> <input type="text" class="mykey" readonly placeholder="0" name="promrp[]" id="promrp'+rowNum+'"><input type="hidden" placeholder="0" name="promrpval[]" id="promrpval'+rowNum+'"> </td><td class="disc txt_rt"> <input type="text" class="mykey disckey" placeholder="0" name="prodisc[]" id="prodisc'+rowNum+'"> </td><td class="ttl_prc txt_rt"> <input type="text" placeholder="0" readonly name="protot[]" id="protot'+rowNum+'"><input type="hidden" placeholder="0" name="prototval[]" id="prototval'+rowNum+'" > <input type="hidden" class="form-control noalpha mykey" placeholder="" readonly name="hid_acivity_id[]" id="hid_acivity_id_0" value=""></td><td > <i class="fa fa-trash" onclick="removerow('+rowNum+',0)">X</i> </td></tr>';

	     	$('#invoiceItem').append(htmlRows);*/
	     }
	     	
	    }
	    
	    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) { 
	     	
	    	
	           return $( "<li></li>" )  

	               .data( "item.autocomplete", item )  

	               .append( "<a>" + "<img style='width:25px;height:25px' src='" + item.imgsrc + "' /> " + item.label+ "</br><span>Packing: "+item.packing+", Units: "+item.units+"</span></a>" )  

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
    if(userid == ""){ err = 1; err_msg = "User is not registered!"; tagid = "#ukey";
        return form_validation(err,err_msg,tagid);}                 
    if(saletype == "cash")
    {     
      var mobile = $("#mobile").val();  
      if(mobile == ""){ err = 1; err_msg = "Please enter mobile!"; tagid = "#mobile";
        return form_validation(err,err_msg,tagid);}     
    } 

   	
        

    /*if(proname0 == ""){ err = 1; err_msg = "Please select product!"; tagid = "#proname0";
        return form_validation(err,err_msg,tagid);}
    if(proqty0 == 0){ err = 1; err_msg = "Please enter quantity!"; tagid = "#proqty0";
        return form_validation(err,err_msg,tagid);}*/

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
                  

    /*form submit*/
    formData = new FormData(salefrm);    
        
          $.ajax({
            url: url+"api/sales/update",
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
                  text: "Order updated successfully!",
                  type: 'success',
                  shadow: true
                });
                
                location.replace(url+'admin/sales');
                              
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
     if(ui.item.user_type == "NON_FARMER"){ $(".sel_loc").hide();}else{ $(".sel_loc").show(); }
     var sale_type = $("input[name='sale_types']:checked").val();
     
        $('#mobile').val(ui.item.mobile);
        $("#mobile").prop( "readonly", true );

     $('#ukey').val(ui.item.label); // display the selected text
     $('#userid').val(ui.item.user_id); // save selected id to input
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

    

    $("[id^='proqty']").each(function() {
        var id = $(this).attr('id');
        id = id.replace("proqty", '');
        var proqty = $("#proqty" + id).val();
        var promrpval = $('#promrpval' + id).val();
        var prodisc = $('#prodisc' + id).val();
       
        $('#promrp' + id).val(addCommas(promrpval));

        var total = proqty * promrpval;
        
        var ds = prodisc/100;
        var dsc = ds*total;
        var tot1 = total-dsc;

        var ftot = Math.round(tot1);
        $('#protot' + id).val(addCommas(ftot));
        $('#prototval' + id).val(ftot);

        grandTotal += Math.round(tot1);

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

    var GrandTot = parseInt(grandTotal) + parseInt(loadc) + parseInt(transportc);
    $('#totamt').html(addCommas(grandTotal));
    $('#gtotamt').html(addCommas(GrandTot));

    $('#totamtval').val(grandTotal);
    $('#gtotamtval').val(GrandTot);
}
function onlyNumberKey(evt) { 
          
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
}
function removerow(id,sid)
{
	
	var thid = $('#hid_acivity_id_' + id).val();
	if(thid!='')
	{
		if (confirm('Are you sure you want to remove')) {
	        $.ajax({    
	            url: url+"api/sales/salesdelete",
	            data: {tid:thid,saleid:sid},
	            type:'POST',    
	            datatype:'json',
	            success : function(responseff){
	            	calculateTotal();
	            }
	        });

	        $('#rowNums'+id).remove();
    	} 
	}
	else
	{
		$('#rowNums'+id).remove();
	}
	
	
}
</script>
<?php require_once 'footer.php' ; ?>