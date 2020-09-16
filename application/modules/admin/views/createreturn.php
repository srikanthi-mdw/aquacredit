<?php require_once 'header.php' ; ?>
<link href="<?php echo base_url();?>assets/css/createreturn.css" type="text/css" rel="stylesheet">
<?php require_once 'sidebar.php' ; ?>
<link href="<?php echo base_url();?>assets/css/snackbar.css" type="text/css" rel="stylesheet">
<style>
.modal-body {
    text-align: center;
}
</style>	
<div class="right_blk">
	<div class="top_ttl_blk"> 
		<!-- <span class="back_btn"><a href="<?php echo base_url();?>admin/sales" title=""><img src="<?php echo base_url();?>assets/images/back.png" alt="" title=""> </a></span> --> <span> <?php echo $page_title;?></span>
		<a href="<?php echo base_url();?>admin/returns" title="" class="fr btn btn-primary"> Show all Returns </a>		
		<div id="snackbar" class=""></div>
	</div>
	<form id="return_frm" name="return_frm" action="javascript:void(0);" method="post" >
		<div class="sale_rt"> 
			<h2 class="create_hdg"> Recent Returns </span></h2>
			
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#f_far" role="tab" aria-controls="home" aria-selected="true" onclick="recentProducts('f');">From Farmer</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#t_com" role="tab" aria-controls="profile"	aria-selected="false" onclick="recentProducts('c');">To Company</a>
				</li>
			</ul>
			<div class="tab-content">
				
				<div id="f_far" class="tab-pane fade show active"></div>
				<div id="t_com" class="tab-pane fade"></div>
			</div>
		</div>
	
		<div class="sle_cr_r"> 		
			<!-- <h2 class="create_hdg"> Loan Request </h2> -->
			<ul class="assign_type"> 
				<li class="act_type lnk_typ frm_farm"> 
					<img src="http://3.7.44.132/aquacredit/assets/images/credit_icn.png">
					<input type="radio" name="rtn_types" value="farmer" checked>
					<span> From Farmers </span>
				</li>
				<li class="lnk_typ to_cmp"> 
					<img src="http://3.7.44.132/aquacredit/assets/images/cash_icn.png">
					<input type="radio" name="rtn_types" value="company">
					<span> To Company </span>
				</li>
			</ul>
			<div class="from_farmer">
				<ul class="create_ul">
					<li class="create_li slc_usr">
						<div class="check_wt_serc"> 
							<div class="show_va">Select  Branch</div>
							<div class="selectVal bval">  Select  Branch </div>
							<ul class="check_list mykey" id="brn_l"> 
								<li id="branch_opt_li"></li>
							</ul>												
						</div>
					</li>
					<li class="create_li">
						<div class="cre_inp">
							<div class="sm_blk"> Search User </div>
							<input type="text" class="form-control mykey search" placeholder="" data-original-title="" title="" name="ukey" id="ukey">
							
						</div>
					</li>

					<li class="create_li slc_usr" id="cropids">
						<div class="check_wt_serc"> 
							<div class="show_va">Select  Crop</div>
							<div class="selectVal cval">  Select  Crop </div>
							<ul class="check_list mykey" id="crp_l"> 
								<li id="crop_opt_li"></li>													
							</ul>												
						</div>
					</li>
					
					<li class="create_li " style="display: none;" id="guestmobile">
							<div class="cre_inp">
								<div class="sm_blk"> Mobile </div>
								<input type="text" onkeypress="return onlyNumberKey(event)" maxlength="10" class="form-control mykey" placeholder="" data-original-title="" title="" name="mobile" id="mobile">
							</div>
						</li>
				</ul>
				<div class="add_more">
					<a href="javascript:void(0);" onclick="addmorerows();">Add More</a>
				</div>
				<div class="res_tbl">
					<table class="sa_lst" id="rtn_table_farmer" cellpadding="0" cellspacing="" border="0">
					<thead>
						<tr> 
							<th> Product Name </th>
							<th class="qty txt_cnt"> Qty </th>
							<th class="mrp txt_rt"> MRP </th>
							<th class="disc"> Discount </th>
							<th class="ttl_prc txt_rt"> Total Price </th>
							<th class="dele_th_td"> Delete </th>
						</tr>
					</thead>
					<tbody id="invoiceItem">
						<!--<tr> 
							<td> <input type="text" value="Product Name"> </td>
							<td class="qty txt_cnt"> <input type="text" value="10"> </td>
							<td class="mrp txt_rt"> <input type="text" value="2,000"> </td>
							<td class="disc txt_rt"> <input type="text" value="20%"> </td>
							<td class="ttl_prc txt_rt"> <input type="text" value="1,800"> </td>
							<td class="dele_th_td"><i class="fa fa-trash" onclick="removerow(5)" style="color:red" aria-hidden="true"></i></td>
						</tr> -->
						
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4" class="txt_rt"> <b>Grand Total</b> </td>
							<td class="txt_rt"> <b id="gtotamt" class="gtotamt"> 0 </b> 
							<!-- <input type="hidden" placeholder="0" name="gtotamtval" id="gtotamtval" > --> </td>
							<td> </td>
						</tr>
					</tfoot>
				</table>
				<input type="hidden" id="rowval" value="0">
			</div>
			<h2 class="create_hdg" style="margin-bottom: 15px; "> <span class="stl_amt">₹0</span> will be added to user credit! </h2>
			<ul class="assign_type" style="display:none;"> 
				<li class="act_type lnk_typ ban_trns"> 
					<img src="http://3.7.44.132/aquacredit/assets/images/bank_tansfer.png">
					<input type="radio" name="act_types" value="bank" checked>
					<span> Bank Transfer </span>
				</li>
				<li class="cash_trns lnk_typ"> 
					<img src="http://3.7.44.132/aquacredit/assets/images/cash_icn.png">
					<input type="radio" name="act_types" value="cash">
					<span> Cash </span>
				</li>
				<li class="crdt_trns lnk_typ"> 
					<img src="http://3.7.44.132/aquacredit/assets/images/credit_icn.png">
					<input type="radio" name="act_types" value="cash">
					<span> Credit </span>
				</li>
			</ul>

			<ul class="trans_inf bnk_tr" style="display:none;"> 
				<li class="create_li date">
					<div class="cre_inp">
						<div class="sm_blk"> Date </div>
						<input type="text" class="form-control" placeholder="" data-original-title="" title="">
					</div>
				</li>

	<li class="admin_bank_li" style="display:none;"> 
			<div class="check_wt_serc wth_225_sel"> 
				  <div class="show_va"> Select Bank </div>
				<div class="selectVal">  Select Bank </div>
				<ul class="check_list"> 
	  
				  <li> 
			<div class="form-check">
	  <input class="form-check-input" type="radio" name="trader" id="bnk1" value="Bank 1">
	<label class="form-check-label" for="bnk1">
		<div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/sib_icn.png" alt="" title=""> </div>
			<div class="bank_mny"> 
				<div class="bank_bal"> ₹ 10,000 </div>
				<div class="accont_numb">xxxxxxxxx01792</div>
			</div>
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="radio" name="trader" id="bnk2" value=" Bank 2">
	<label class="form-check-label" for="bnk2">
	  <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/hdfc_icn.png" alt="" title=""> </div>
			<div class="bank_mny"> 
				<div class="bank_bal"> ₹ 10,000 </div>
				<div class="accont_numb">xxxxxxxxx01792</div>
			</div>
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="radio" name="trader" id="bnk3" value="Bank 3">
	<label class="form-check-label" for="bnk3">
			 <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/icici_icn.png" alt="" title=""> </div>
			<div class="bank_mny"> 
				<div class="bank_bal"> ₹ 10,000 </div>
				<div class="accont_numb">xxxxxxxxx01792</div>
			</div>
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="radio" name="trader" id="bnk4" value="Bank 4">
	<label class="form-check-label" for="bnk4">
		  <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/hdfc_icn.png" alt="" title=""> </div>
			<div class="bank_mny"> 
				<div class="bank_bal"> ₹ 10,000 </div>
				<div class="accont_numb">xxxxxxxxx01792</div>
			</div>
	  </label>
	</div>
	</li>
	</ul>
	</div>
		</li>

		<li class="admin_bank_li" style="display:none;"> 
			<div class="check_wt_serc wth_225_sel"> 
				  <div class="show_va"> Select User Bank </div>
				<div class="selectVal">  Select User Bank </div>
				<ul class="check_list"> 
				  <!-- <li> <div class="form-group">
					<input type="email" checked="true" class="form-control" placeholder="Search User Bank">
				  </div> </li> -->
				  <li> 
			<div class="form-check">
	  <input class="form-check-input" type="radio" name="trader" id="bnk1" value="Bank 1">
	<label class="form-check-label" for="bnk1">
		<div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/sib_icn.png" alt="" title=""> </div>
			<div class="bank_mny"> 
				<div class="bank_bal"> ₹ 10,000 </div>
				<div class="accont_numb">xxxxxxxxx01792</div>
			</div>
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="radio" name="trader" id="bnk2" value=" Bank 2">
	<label class="form-check-label" for="bnk2">
	  <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/hdfc_icn.png" alt="" title=""> </div>
			<div class="bank_mny"> 
				<div class="bank_bal"> ₹ 10,000 </div>
				<div class="accont_numb">xxxxxxxxx01792</div>
			</div>
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="radio" name="trader" id="bnk3" value="Bank 3">
	<label class="form-check-label" for="bnk3">
			 <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/icici_icn.png" alt="" title=""> </div>
			<div class="bank_mny"> 
				<div class="bank_bal"> ₹ 10,000 </div>
				<div class="accont_numb">xxxxxxxxx01792</div>
			</div>
	  </label>
	</div>
	<div class="form-check">
	  <input class="form-check-input" type="radio" name="trader" id="bnk4" value="Bank 4">
	<label class="form-check-label" for="bnk4">
		  <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/hdfc_icn.png" alt="" title=""> </div>
			<div class="bank_mny"> 
				<div class="bank_bal"> ₹ 10,000 </div>
				<div class="accont_numb">xxxxxxxxx01792</div>
			</div>
	  </label>
	</div>
	</li>
	</ul>
	</div>
		</li>
	<li class="create_li" style="display:none;">
	<div class="cre_inp">
	  <div class="sm_blk"> Paid Amount </div>
		<input type="text" class="form-control" placeholder="" data-original-title="" title="">
	 </div>
	</li>
	<li class="create_li" style="display:none;">
	<div class="cre_inp">
	  <div class="sm_blk"> Reference Number </div>
		<input type="text" class="form-control" placeholder="" data-original-title="" title="">
	 </div>
	</li>


			</ul>

		<div class="show_note">
			<div class="note_add"> <a href="#" title=""> Note </a> </div> 
			<textarea id="rece_note" name="rece_note" placeholder="Note" class="mykey" ></textarea>
		</div>


			<!-- <div class="not_li note_blk"> 
				<a href="" title="" class="ad_note" data-toggle="modal"> Note </a> 
				<div class="note_entr">
					<div class="form-group note_area"> 
						<textarea id="rece_note" name="rece_note" placeholder="Note" class="mykey" ></textarea>
					</div>
				</div>
			</div> -->

		</div>

			<div class="to_comp">
				<ul class="create_ul"> 

					<li class="create_li slc_usr">
						<div class="check_wt_serc"> 
							<div class="show_va">Select branch</div>
							<div class="selectVal bval">  Select branch </div>
							<ul class="check_list" id="brn_comp"> 
								<li id="branch_opt_li1"></li>					
							</ul>												
						</div>
					</li>
					<!-- <li class="create_li slc_usr">
						<div class="check_wt_serc"> 
							<div class="show_va">Select  Company</div>
							<div class="selectVal">  Select  Company </div>
							<ul class="check_list"> 
								<li id="company_opt_li"></li>

							</ul>												
						</div>
					</li> -->
					<li class="create_li">
						<div class="cre_inp">
							<div class="sm_blk"> Search company </div>
							<input type="text" class="form-control mykey search" placeholder="" title="" name="ukey" id="ukey" autocomplete="on">
							
						</div>
					</li>
				</ul>
				<div class="add_more">
					<a href="javascript:void(0);" onclick="addmore_compnyrows();">Add More</a>
				</div>
				<div class="res_tbl">
					<table class="sa_lst" id="rtn_table_company" cellpadding="0" cellspacing="" border="0">
						<thead>
							<tr> 
								<th> Product Name </th>
								<th class="qty txt_cnt"> Qty </th>
								<th class="mrp txt_rt"> Purchased Amount </th>
								<th class=""> Delete </th>
							</tr>
						</thead>
						<tbody id="invoiceItem1">
							<!-- <tr> 
								<td> <input type="text" value="Product Name"> </td>
								<td class="qty txt_cnt"> <input type="text" value="10"> </td>
								<td class="mrp txt_rt"> <input type="text" value="2,000"> </td>
							</tr> -->
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2" class="txt_rt"> <b> Total Amount </b> </td>
								<td class="txt_rt ttl_prc" > <b id="totamt"> 0 </b> 
								<input type="hidden" placeholder="0" name="totamtval" id="totamtval" >
								<input type="hidden" placeholder="0" name="totdiscount" id="totdiscount" >
								</td>
								
							</tr>

							<tr>
								<td colspan="2" class="txt_rt"> Loading Charges </td>
								<td class="txt_rt ttl_prc"> <input type="text"  value="0" name="load_charge" id="load_charge"  class="allownumericwithdecimal" /> </td>
							</tr>
							<tr>
								<td colspan="2" class="txt_rt"> Transport Charges </td>
								<td class="txt_rt ttl_prc"> <input type="text" value="0" name="transport_charge" id="transport_charge"  class="allownumericwithdecimal" /> </td>
							</tr>
							<tr>
								<td colspan="2" class="txt_rt"> <b>Grand Total</b> </td>
								<td class="txt_rt ttl_prc"> <b id="gtotamt" class="gtotamt"> 0 </b> </td>
							</tr>
						</tfoot>
					</table>
					<input type="hidden" id="rowval1" value="0">
					<h2 class="create_hdg" style="margin-top: 20px; text-align: right;"><span class="stl_amt">₹0</span> will be added to company balance </h2>
					<div class="show_note">
						<div class="note_add"> <a href="#" title=""> Note </a> </div> 
						<textarea placeholder="Note" id="rece_note1" name="rece_note1" class="mykey"></textarea>
					</div>
				</div>
			</div>
			<div class="po_ftr">				
				<button class="btn fr sb_btn btn-primary" type="submit"> Return </button>
			</div>
		</div>
		<input type="hidden" class="form-control" placeholder=""  name="userid" id="userid">
		<input type="hidden" class="form-control" placeholder=""  name="usertype" id="usertype">
		<input type="hidden" class="form-control" id="select_guest" name="select_guest" value="0">
		<input type="hidden" placeholder="0" name="gtotamtval" id="gtotamtval" >
	</form>
</div>
<div class="modal" id="brand_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<!-- <h1> Are You Sure ! </h1> -->
				<p> Are you sure, want to return these products ? </p>
			</div>
			<div class="modal_footer">
				<button type="button" class="btn btn-primary cnf_yes" data-dismiss="modal">Yes</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var url = '<?php echo base_url()?>';
getbranches(); getbanks(); 
recentProducts('f');
function recentProducts(val)
{
	$.ajax({    
    url: url+"api/returns/getRecentProducts",
    data: {rtn_type:val},
    type:'POST',    
    datatype:'json',
    success : function(response){      
	  
      res= JSON.parse(response);        
      
        var opt = "";
        if(res.data.length > 0)
        {
            $.each(res.data, function(index, prod) {
            opt += '<div class="top_in_op crop_top">\
					<h1> '+prod.pname+' <span> ('+prod.return_qty+') </span> </h1>\
					<p> '+prod.return_date+' </p>\
				</div>';
          });
        }else{
			opt = "<span style='color:red;'>No Records found!</span>";
		}
       if(val == 'f'){
			$("#f_far").html(opt);
			$("#t_com").html('');
	   }
	   else if(val == 'c'){
		   $("#f_far").html('');
		   $("#t_com").html(opt);
	   }
    }
  });
}
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
       var saletype = $("input[name='rtn_types']:checked").val();
		if(saletype == "company"){ $("#branch_opt_li1").html(opt); $("#branch_opt_li").html(''); }
		else{ $("#branch_opt_li").html(opt); $("#branch_opt_li1").html('');}
        
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
      $("#crop_opt_li"+aeval).html(opt);
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
		if(proqty > 0)
		{			
			var promrpval = $('#promrpval' + id).val();
			var prodisc = $('#prodisc' + id).val();
		   
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
		}
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
    //var GrandTot = parseFloat(grandTotal) + parseFloat(loadc) + parseFloat(transportc);
	
   // $('#totamt').html(addCommas(grandTotal));
   // $('#gtotamt').html(addCommas(GrandTot));
    $('#totamt').html(grandTotal.toFixed(2));
    //$('#gtotamt').html(GrandTot.toFixed(2));
    $('.gtotamt').html(GrandTot.toFixed(2));
    $('#totdiscount').val(ddisc);
    $('#totamtval').val(grandTotal.toFixed(2));
    $('#gtotamtval').val(GrandTot.toFixed(2));
	
	//$('.stl_amt').text('₹'+addCommas(GrandTot));
	$('.stl_amt').text('₹'+GrandTot.toFixed(2).replace(/(\d)(?=(\d{2})+\d\.)/g, '$1,'));

    var saletype = $("input[name='rtn_types']:checked").val();
    if(saletype=='company')
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
$(document).ready(function(){
	
	addmorerows();
	$(document).on('focus','.search',function(){	
		
		$(this).autocomplete({
			source: function( request, response ) {	
				
			  $('#userid').val('');
			 
			  $('#mobile').val('');
			  $("#mobile").prop( "readonly", false );
			  var branch = $("input[name='branchval']:checked").val();
			  var sale_type = $("input[name='rtn_types']:checked").val();
			  
			  $(".cval").html('Select crop'); 
			  $(".gtotamt").html(0); $(".gtotamt").html('₹0'); 
			  $("#load_charge").val(0); $("#transport_charge").val(0); 
			
			  if(sale_type == "farmer"){ $("#rowval").val(0); $('#invoiceItem').html(''); addmorerows(); }
			  else if(sale_type == "company"){ $("#rowval1").val(0); $('#invoiceItem1').html(''); addmore_compnyrows(); }
			  
				if(branch == undefined || branch == '')
				{
					$(".search").val('');
					err = 1; err_msg = "Please select branch"; tagid = "#brn_comp";
					return form_validation(err,err_msg,tagid);
				}
			 // Fetch data
			 $('.err_msg').hide();
			 $.ajax({
				url: url+"api/returns/searchusers",
				type: 'post',
				dataType: "json",
				data: {
				 search: request.term,ttype:sale_type,branch:branch
				},
				success: function( data ) { 
					$('.cre_inp').addClass('inp_ss');
					/* if(sale_type=='credit')
					{
					  if(data == null)
					  {
						$('.err_msg').show();
					  }
					}  */
					response( $.map( data, function( result ) {  

					  return {  
						  label: result.label,
						  value: result.value,
						  imgsrc: result.img,   
						  user_id: result.user_id,
						  mobile:result.mobile,
						  user_type: result.user_type,
						  guest: result.guest,
					  }  

					}));  

				}  
			 });
			},
			select: function (event, ui) {
				
				hidecolor(); var guest_val = ui.item.guest;
			 // Set selection
			  if(ui.item.user_type == "DEALER" || guest_val == 1){ $("#cropids").hide(); }else{ $("#cropids").show(); }

			 //var sale_type = $("input[name='rtn_types']:checked").val();
			 
			 if(guest_val == 1){ $('#guestmobile').show(); $("#cropids").hide(); }else{$('#guestmobile').hide(); }
			 
				$('#mobile').val(ui.item.mobile);
				$("#mobile").prop( "readonly", true );

				 $('#ukey').val(ui.item.label); // display the selected text
				 $('#userid').val(ui.item.user_id); // save selected id to input
				 $('#usertype').val(ui.item.user_type);
				 $('#select_guest').val(guest_val);
			 
				if(guest_val == 0)
				{
					$('.disckey').prop('readonly', true);
				}
				else{
					$('.disckey').prop('readonly', false);
				}
			 //return false;
			}
			
		}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {

			var rtn_type = $("input[name='rtn_types']:checked").val();
			if(rtn_type == "farmer")
			{

			   return $( "<li></li>" )  

				   .data( "item.autocomplete", item )  

				   .append( "<a>" + "<img style='width:25px;height:25px' src='" + item.imgsrc + "' /> " + item.label+ "</a>" )  

				   .appendTo( ul ); 
			}else{
				
				return $( "<li></li>" )  

				   .data( "item.autocomplete", item )
				   
				   .append( "<a>" + item.label+ "</a>" ) 

				   .appendTo( ul ); 
			}				

		};
	});
  
  //$('#ukey').blur(function(){
  $(document).on('blur','#ukey',function(){
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


	$('.lnk_typ.frm_farm').click(function(){
		
		$("form")[0].reset();
		$('#guestmobile').hide(); $("#cropids").show();
		$(".gtotamt").html(0);
		$(".stl_amt").html('₹0');
		$(".bval").html('Select Branch'); $(".cval").html('Select Crop');
		$('input[name="rtn_types"][value="farmer"]').prop('checked', true);
        $(this).addClass('act_type');
        $('.blk_disb').removeClass('blk_no_dis');
        $(this).siblings('.cash_trns, .lnk_typ').removeClass('act_type');        
        $(this).parent().siblings('.ove_auto').find('.lon_typ').removeClass('hide_blk_anim');
        $('.from_farmer').show();
        $('.to_comp').hide();
		$('#invoiceItem').html('');
		$('#invoiceItem1').html('');
		$('#rtn_table_farmer').show();
		$('#rtn_table_company').hide();
		getbranches();
		$("#rowval").val(0);
		addmorerows();
    });
     $('.lnk_typ.to_cmp').click(function(){
		
		$("form")[0].reset();		
		$("#totamt").html(0);
		$(".gtotamt").html(0);
		$(".stl_amt").html('₹0');
		$(".bval").html('Select Branch');
		$('input[name="rtn_types"][value="company"]').prop('checked', true);
        $(this).addClass('act_type');
        $('.blk_disb').removeClass('blk_no_dis');        
        $(this).siblings('.ban_trns, .lnk_typ').removeClass('act_type');
        $(this).parent().siblings('.ove_auto').find('.lon_typ').addClass('hide_blk_anim');
        $('.from_farmer').hide();
        $('.to_comp').show();
		$('#invoiceItem').html('');
		$('#invoiceItem1').html('');
		$('#rtn_table_farmer').hide();
		$('#rtn_table_company').show();
		getbranches();
		$("#rowval1").val(0);
		addmore_compnyrows();
    });


     /* $('.lnk_typ.crdt_trns').click(function(){
        $(this).addClass('act_type');
        $('.blk_disb').removeClass('blk_no_dis');
        $(this).siblings('.cash_trns, .lnk_typ').removeClass('act_type');
        // $('.blk_disb').addClass('blk_no_dis');
        $(this).parent().siblings('.ove_auto').find('.lon_typ').removeClass('hide_blk_anim');
    });

      $('.lnk_typ.ban_trns').click(function(){
        $(this).addClass('act_type');
        $('.blk_disb').removeClass('blk_no_dis');
        // $('.blk_disb').addClass('blk_no_dis');
        $(this).siblings('.ban_trns, .lnk_typ').removeClass('act_type');
        $(this).parent().siblings('.ove_auto').find('.lon_typ').addClass('hide_blk_anim');
    }); */
	
	
	//quantity change
		//$('#proqty'+rowNum).on('keyup', function() {
		$(document).on('blur', "[id^=proqty]", function() {
			
			var id = $(this).attr('id');		
			id = id.replace("proqty", '');

			var this_val = $(this).val();
			var prod_val = $("#proid" + id).val();
			var rtn_type = $("input[name='rtn_types']:checked").val();
			if (prod_val == "") {
				$("#proqty" + id).val('');
				return table_validation(1, "Select Product First!", "#proname" + id);

			} else {
				
				var branch = $("input[name='branchval']:checked").val();
				var userid = $("#userid").val();
				var cropid = $("input[name='crop_opt']:checked").val();
				$.ajax({
					url: url + "api/returns/checkProductAvailQty",
					data: { branch_id: branch, user_id: userid, crop_id:cropid,pid: prod_val,rtn_type:rtn_type },
					type: 'POST',
					datatype: 'json',
					success: function(response) {
						//alert(response);
						res = JSON.parse(response);
						if (this_val == 0) {
							$("#proqty" + id).val(res.data['qty']);
							return table_validation(1, "Quantity must not be zero!", "#proqty" + id);
						} else if (res.data['qty'] == 0) {
							$("#proqty" + id).val(res.data['qty']);
							return table_validation(1, "Product quantity has zero, Please select another product!", "#proqty" + id);
						} else if (+this_val > +res.data['qty']) {
							$("#proqty" + id).val(res.data['qty']);					
							return table_validation(1, "Enter maximum quantity " + res.data['qty'], "#proqty" + id);
						}
						//calculateTotal();
					}
				});
			}
		});
	
	$(document).on('blur', "[id^=prodisc]", function() {
			
			var id = $(this).attr('id');
			var disc = $(this).val();
			if(disc > 100)
			{
				$("#"+id).val(0);
				return table_validation(1, "Enter maximum discount 100", "#"+id);
			}
			
	});
	
	
	$(document).on('keyup', "[id^=proname]", function() {		
		
		var err = 0;
		var id = $(this).attr('id');		
		id = id.replace("proname", '');
		
		var branch = $("input[name='branchval']:checked").val();
		var proids = $("input[name='proid[]']").map(function(){return $(this).val();}).get();
		var userid = $("#userid").val();
		var cropid = $("input[name='crop_opt']:checked").val();
		//alert(branch);
		var rtn_type = $("input[name='rtn_types']:checked").val();
		
		var user_company = "user";
		
		if(rtn_type == "company"){  user_company = "company"; }
		
		if(branch == undefined || branch == '')
		{
			err = 1; err_msg = "Please select branch"; tagid = "#brn_l";
			return form_validation(err,err_msg,tagid);
		}
		if(userid == undefined || userid == '')
		{
			err = 1; err_msg = "Please select "+user_company+"!"; tagid = "#ukey";
			return form_validation(err,err_msg,tagid);
		}
		
		if($("#select_guest").val() != 1 && $("#usertype").val() != "DEALER" && rtn_type != "company")
		{
			if(cropid == undefined || cropid == ""){
				err = 1; err_msg = "Please select crop"; tagid = "#crp_l";
				return form_validation(err,err_msg,tagid);
			}
		}	
		
		/* else
		{ */
		if(err == 0)
		{
			
			$('.mykey').parent().css("border", "");
			$('#proid'+id).val('');
			$('#sids'+id).val('');
			$('#promrpval'+id).val(0);
			$('#promrp'+id).val(0);
			$('#prodisc'+id).val(0);
			$('#proqty'+id).val(0);
			$('#protot'+id).val(0);
			$('#prototval'+id).val(0);

			calculateTotal();
				
			//$( "#proname"+id ).autocomplete({
			$(this ).autocomplete({
				source: function( request, response ) {

				 $.ajax({
				url: url+"api/returns/search_sale_products",
				type: 'post',
				dataType: "json",
				data: {
				 search: request.term,branch:branch,proid:proids,userid:userid,crop_id:cropid,rtn_type:rtn_type
				},
				success: function( data ) { 

				//console.log(data);
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
					  sids: result.sids,
					  pro_id: result.pid,
					  pro_qty: result.pqty,
					  promrp : result.pmrp,
					  prodisc : result.discount,
					  //totprice : (result.pqty*result.pmrp),
					  totprice : result.tot_price,
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
				$('#sids'+id).val(ui.item.sids); 
				$('#proid'+id).val(ui.item.pro_id);
				$('#promrpval'+id).val(ui.item.promrp);
				$('#promrp'+id).val(addCommas(ui.item.promrp));				
				$('#proqty'+id).val(ui.item.pro_qty);
				$('#prodisc'+id).val(ui.item.prodisc);
				$('#protot' + id).val(ui.item.totprice);
				$('#prototval' + id).val(ui.item.totprice);
				calculateTotal();
				
			}
			
			}).data( "ui-autocomplete" )._renderItem = function( ul, item ) { 
				
				
				   return $( "<li></li>" )  

					   .data( "item.autocomplete", item )  

					   .append( "<a>" + item.label+ " "+item.units+"/"+item.packing+"</a>" )  

					   .appendTo( ul );  


					 
		   };
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
	
	$("#branch_opt_li").on("change", function() {
		
		$('#guestmobile').hide(); $("#cropids").show();
		$("#rowval").val(0); $(".search").val('');
		$(".cval").html('Select crop'); 
		$(".gtotamt").html(0); $(".gtotamt").html('₹0'); 
		$("#load_charge").val(0); $("#transport_charge").val(0);
        $('#rtn_table_farmer tbody tr').remove();       
        $('.mykey').parent().css("border", "");
        addmorerows();
    });
	
	$("#branch_opt_li1").on("change", function() {		
		
		$("#rowval1").val(0); $(".search").val('');
		$(".gtotamt").html(0); $(".gtotamt").html('₹0'); 
		$("#load_charge").val(0); $("#transport_charge").val(0);
        $('#rtn_table_company tbody tr').remove();       
        $('.mykey').parent().css("border", "");
        addmore_compnyrows();
    });
	
	$("#crop_opt_li").on("change", function() {		

		$("#rowval").val(0);		
		//$(".cval").html('Select crop'); 		
        $('#rtn_table_farmer tbody tr').remove();       
        $('.mykey').parent().css("border", "");
        addmorerows();
    });
	
	/* $(document).on("click", ".sb_btn",function(){	
		
		$('#cnf_modal').modal('show');
	}); */
	
	//Form Submit
	$("#return_frm").on("submit",function(){		
		
		var sallen = $(':radio[name="rtn_types"]:checked').length;
		var bralen = $(':radio[name="branchval"]:checked').length;
		var saletype = $("input[name='rtn_types']:checked").val();
		var branchval = $("input[name='branchval']:checked").val();
		var cropval = $("input[name='crop_opt']:checked").val();
		
		var ukey = $("#ukey").val();
		var userid = $("#userid").val();   
		var proname0 = $("#proname0").val();
		var proqty0 = $("#proqty0").val();
		var user_company = "user";
		
		if(saletype == "company"){  user_company = "company"; }
		
		if(sallen == 0 ){ err = 1; err_msg = "Please select return type!"; tagid = "#saletype";
              return form_validation(err,err_msg,tagid);}
		if(bralen == 0 ){ err = 1; err_msg = "Please select branch!"; tagid = "#brn_l";
				  return form_validation(err,err_msg,tagid);}  

		if(ukey == ""){ err = 1; err_msg = "Please search "+user_company+"!"; tagid = "#ukey";
			return form_validation(err,err_msg,tagid);}
		if($("#select_guest").val() != 1 && $("#usertype").val() != "DEALER" && saletype != "company")
		{
			if(cropval == undefined || cropval == ""){
				err = 1; err_msg = "Please select crop"; tagid = "#crp_l";
				return form_validation(err,err_msg,tagid);
			}
		}
				
		var values = $("input[name='proid[]']").map(function() { return $(this).val(); }).get();
        var newArray = values.filter(function(v) { return v !== '' });
		
		if (newArray.length == 0) {
            err = 1;
            return form_validation(err, "Must have at least one product!", "");
        }else {
            //console.log(newQty);
            $("#return_frm td input").each(function() {

                //alert($(this).attr('id')+"--"+$(this).val());
                if ($(this).val() === '') {
                    //this.closest('tr').remove();
					$(this).closest('tr').remove();

                }
            });
        }

	 $('#brand_modal').modal('show');      
  });
  
  /*form submit*/
	  $(".cnf_yes").click(function(){
		formData = new FormData(return_frm);    
        //alert("Ok");
        $.ajax({
            url: url+"api/returns/add",
            data: formData,
            type:'POST',
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            datatype:'json',
            success : function(response)
            { 
				//console.log(response);
              res= JSON.parse(response);
              if(res.status == 'success')
              { 
                new PNotify({
                  title: 'Success',
                  text: "Returns created successfully!",
                  type: 'success',
                  shadow: true
                });
				
                //$("#return_frm")[0].reset();
                //window.location.href = "<?php echo base_url('api/sales/sale_invoice');?>/"+res.insert_id;
                  setInterval(function() {
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
	  });
    /*form submit*/
  
  //$('#rtn_table').on('click', '.del_btn', function() {
  $(document).on('click','.del_btn',function(){
        //alert($(this).parents('table').find('tr').length);
		var len = 3;
		var saletype = $("input[name='rtn_types']:checked").val();
		if(saletype == "company"){ len = 6; }
        if ($(this).parents('table').find('tr').length > len) {
            $(this).closest('tr').remove();
        } else {
            return form_validation(1, "Must have at least one product!", $(this).attr("id"));
        }
        //$(this).closest('tr').remove();
    });
});
function table_validation(err, err_msg, tagid) {
    $('.table_input').css("border", "");
    $("#snackbar").text(err_msg);
    $("#snackbar").addClass("show");
    setTimeout(function() { $("#snackbar").removeClass("show"); }, 3000);
    $(tagid).css("border", "1px solid red");
    //$("#tname").css("border", "1px solid red");
    $(tagid).focus();
    return false;
}

function addmorerows()
{
	if($('#rowval').val() == 0){
		var rr = 4;
		//$('#rowval').val();
		var rowNum = $('#rowval').val();
		var saletype = $("input[name='rtn_types']:checked").val();
		var guest = $("#select_guest").val();
		for(var ii=0;ii<=rr;ii++)
		{		
			htmlRows = '<tr id="rowNums'+rowNum+'" ><td><input type="hidden" name="proid[]" id="proid'+rowNum+'" value="" ><input class="mykey" type="text" placeholder="Product Name" autocomplete="off" name="proname[]" id="proname'+rowNum+'" > <input type="hidden" name="sids[]" id="sids'+rowNum+'" value="" ></td><td class="qty txt_cnt"> <input type="text" class="mykey" placeholder="0" onkeypress="return onlyNumberKey(event)" name="proqty[]" id="proqty'+rowNum+'" value="0"></td><td class="mrp txt_rt"> <input type="text" class="mykey" readonly placeholder="0" name="promrp[]" id="promrp'+rowNum+'" value="0"><input type="hidden" placeholder="0" name="promrpval[]" id="promrpval'+rowNum+'" value="0"> </td><td class="disc txt_rt"> <input type="text" class="mykey disckey noalpha" placeholder="0" name="prodisc[]" id="prodisc'+rowNum+'" value="0" readonly > </td><td class="ttl_prc txt_rt"> <input type="text" placeholder="0" readonly name="protot[]" id="protot'+rowNum+'" value="0"><input type="hidden" placeholder="0" name="prototval[]" id="prototval'+rowNum+'" value="0"> </td><td class="dele_th_td"><i class="fa fa-trash del_btn" style="color:red" ></i></td></tr>';
			
			
			if(guest == 0)
			{
				$('.disckey').prop('readonly', true);
			}
			else{
				$('.disckey').prop('readonly', false);
			} 	
			
			$('#invoiceItem').append(htmlRows);		
			$('#rowval').val(rowNum);		
			
			var last_id = $('#invoiceItem tr:last-child td:first-child').find('input').attr("id");
			if (last_id == undefined) { rowNum = 0; } else { rowNum++; }
			
		}
	}else{
		var rr = $('#rowval').val();

		var rowNum = rr;
	    rowNum ++;
	    var rrv = rowNum;
	    $('#rowval').val(rrv);
	    var guest = $("#select_guest").val();	
	    htmlRows = '<tr id="rowNums'+rowNum+'" ><td><input type="hidden" placeholder="Product Name" name="proid[]" id="proid'+rowNum+'" value="" ><input class="mykey" type="text" placeholder="Product Name" autocomplete="off" name="proname[]" id="proname'+rowNum+'" ><input type="hidden" name="sids[]" id="sids'+rowNum+'" value="" > </td><td class="qty txt_cnt"> <input type="text" class="mykey" placeholder="0" onkeypress="return onlyNumberKey(event)" name="proqty[]" id="proqty'+rowNum+'" value="0"></td><td class="mrp txt_rt"> <input type="text" class="mykey" readonly placeholder="0" name="promrp[]" id="promrp'+rowNum+'" value="0"><input type="hidden" placeholder="0" name="promrpval[]" id="promrpval'+rowNum+'" value="0"> </td><td class="disc txt_rt"> <input type="text" class="mykey disckey noalpha" placeholder="0" name="prodisc[]" id="prodisc'+rowNum+'" value="0" readonly > </td><td class="ttl_prc txt_rt"> <input type="text" placeholder="0" readonly name="protot[]" id="protot'+rowNum+'" value="0"><input type="hidden" placeholder="0" name="prototval[]" id="prototval'+rowNum+'" value="0"> </td><td class="dele_th_td"><i class="fa fa-trash del_btn" style="color:red" ></i></td></tr>';

	    var saletype = $("input[name='rtn_types']:checked").val();
    	if(guest == 0)
		{
			$('.disckey').prop('readonly', true);
		}
		else{
			$('.disckey').prop('readonly', false);
		} 	
	    
	    $('#invoiceItem').append(htmlRows);
	}
}

function addmore_compnyrows()
{
	if($('#rowval1').val() == 0){ 
		var rr = 4;
		$('#invoiceItem1').html('');
		var rowNum = $('#rowval1').val();
		for(var ii=0;ii<=rr;ii++)
		{	
			htmlRows = '<tr id="rowNums'+rowNum+'" ><td><input type="hidden" placeholder="Product Name" name="proid[]" id="proid'+rowNum+'" value="" ><input class="mykey" type="text" placeholder="Product Name" autocomplete="off" name="proname[]" id="proname'+rowNum+'" > </td><td class="qty txt_cnt"> <input type="text" class="mykey" placeholder="0" onkeypress="return onlyNumberKey(event)" name="proqty[]" id="proqty'+rowNum+'" value="0"></td><td class="mrp txt_rt"> <input type="text" placeholder="0" readonly name="protot[]" id="protot'+rowNum+'" value="0"><input type="hidden" placeholder="0" name="prototval[]" id="prototval'+rowNum+'" value="0"> <input type="hidden" class="mykey" readonly placeholder="0" name="promrp[]" id="promrp'+rowNum+'" value="0"><input type="hidden" placeholder="0" name="promrpval[]" id="promrpval'+rowNum+'" value="0"><input type="hidden" class="mykey disckey noalpha" placeholder="0" name="prodisc[]" id="prodisc'+rowNum+'" value="0" readonly ></td><td class="dele_th_td"><i class="fa fa-trash del_btn" style="color:red" ></i></td></tr>';
		
			var saletype = $("input[name='rtn_types']:checked").val();
		
			$('#invoiceItem1').append(htmlRows);		
			$('#rowval1').val(rowNum);		
		
			var last_id = $('#invoiceItem1 tr:last-child td:first-child').find('input').attr("id");
			if (last_id == undefined) { rowNum = 0; } else { rowNum++; }
		}
	}else{ 
			var rr = $('#rowval1').val();
			var rowNum = rr;
			rowNum ++;
			var rrv = rowNum;
			$('#rowval1').val(rrv);
			
			htmlRows = '<tr id="rowNums'+rowNum+'" ><td><input type="hidden" placeholder="Product Name" name="proid[]" id="proid'+rowNum+'" value="" ><input class="mykey" type="text" placeholder="Product Name" autocomplete="off" name="proname[]" id="proname'+rowNum+'" > </td><td class="qty txt_cnt"> <input type="text" class="mykey" placeholder="0" onkeypress="return onlyNumberKey(event)" name="proqty[]" id="proqty'+rowNum+'" value="0"></td><td class="mrp txt_rt"> <input type="text" placeholder="0" readonly name="protot[]" id="protot'+rowNum+'" value="0"><input type="hidden" placeholder="0" name="prototval[]" id="prototval'+rowNum+'" value="0"> <input type="hidden" class="mykey" readonly placeholder="0" name="promrp[]" id="promrp'+rowNum+'" value="0"><input type="hidden" placeholder="0" name="promrpval[]" id="promrpval'+rowNum+'" value="0"><input type="hidden" class="mykey disckey noalpha" placeholder="0" name="prodisc[]" id="prodisc'+rowNum+'" value="0" readonly ></td><td class="dele_th_td"><i class="fa fa-trash del_btn" style="color:red" ></i></td></tr>';
		
			var saletype = $("input[name='rtn_types']:checked").val();
		
			$('#invoiceItem1').append(htmlRows);
	}
}
</script>
<?php require_once 'footer.php' ; ?>