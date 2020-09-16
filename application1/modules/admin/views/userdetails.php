<?php require_once 'header.php';?>
<link href="<?php echo base_url(); ?>assets/css/user_detials.css" type="text/css" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js'></script> 
<?php require_once 'sidebar.php';?>   
<style type="text/css">
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
#table_footer td.tr_amount{padding-right:50px;width:120px;}
	#usr_lst_tbl .pl_m {
		max-width: 53.2667px;
		text-align: center;
		border-right: 1px solid #f0f1f5 !important;
		cursor: pointer;
	}
	#usr_lst_tbl .pl_m span {font-size:17px;bottom: -3px;position: relative;}
	table .trans_detail {width:100%;}
	.material-icons {font-size:17px;cursor: pointer;}
	#usr_lst_tbl td.trans_detail_tr{padding: 15px !important;background: #ccc;}
	#usr_lst_tbl .trans_detail tr:hover {background:#fff !important;}
</style>
<div class="right_blk">
          <div class="top_ttl_blk"> 
            <!-- <span class="back_btn"> <a href="<?php echo base_url(); ?>admin/users" title=""><img src="<?php echo base_url(); ?>assets/images/back.png" alt="" title=""> </a></span>  -->
            <span> <b><?php echo $user["user_name"];?> </b> Transactions - #<?php echo $user["user_code"];?> </span>         
            <!-- <a href="<?php echo base_url(); ?>api/users/previewUserTransactions/" target="_blank" title="" class="btn ed_usr btn-primary fr"> Print </a> -->
		<a href="javascript:void(0);" id="print_transaction"  title="" class="btn ed_usr btn-primary fr"> Print </a>
	</div>

<div class="sale_rt">
<div class="det_view">
<input type="checkbox"> 
<p> Detailed View</p>
<div class="swith_blk"> 
  <!-- <span> No </span> -->
</div>
</div>
  <div class="dvder"> </div>
  <ul class="crd_aval_cr"> 
    <li> <div class="li_lft_blk"> Credit Limit </div> <div class="li_rt_blk"> ₹10,00000 </div> </li>
    <li> <div class="li_lft_blk"> Available Credit </div> <div class="li_rt_blk"> ₹10,00000 </div> </li>
  </ul>
   <div class="dvder"> </div>
   <div class="main_anal">
        <h2 class="create_hdg"> Analytics - <span>All crops(4)</span> </h2>
      <ul class="anl_tcs">
                      <li class="bor_lf_none"> 
            <div class="top_in_op crop_top">
                               <p>Loan </p> 
                               <h1> <?php echo '₹'.IND_money_format($totalLoan);?> </h1>
                                    </div>
        </li>
        <li class="bor_lf_none"> 
            <div class="top_in_op crop_top">
                               <p>Orders </p> 
                               <h1> <?php echo '₹'.IND_money_format($totalOrders);?> </h1>
                                    </div>
        </li>
        <li class="bor_lf_none"> 
            <div class="top_in_op crop_top">
                               <p>Harvest </p> 
                               <h1> ₹<?php echo IND_money_format($totalHarvest);?> </h1>
                                    </div>
        </li>
        <li class="bor_lf_none"> 
            <div class="top_in_op crop_top">
                               <p>Acres </p> 
                               <h1> <?php echo IND_money_format($totalAcres);?> </h1>
                                    </div>
        </li>  
                     </ul>     
                   </div>
                   <div class="rt_btm">
                     <button class="btn btn-primary stl_trn_his" data-toggle="modal" data-target="#settl_amnt" onclick="getlloandata();" >Settle Account </button>
                     <button class="btn btn-primary stl_trn_his" data-toggle="modal" data-target="#bal_wthdr">Balance Withdrawal </button>
                   </div>
</div>

<div class="modal fade" id="bal_wthdr" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content ">
        <div class="pp_clss" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> </div>
          <div class="bal_wth_pp">
            <div class="pop_hdr"> <h1 class="create_hdg"> Balance Withdrawal </h1> </div>
                  <div class="top_in_op crop_top">
                                      <p> Available Balance </p> 
                                    <h1> ₹10,00,00 </h1>
                                    </div>
                  <div class="po_Rel">      
        <ul class="assign_type">   
          <li class="ban_trns_edit lnk_typ act_type">      
            <img src="http://3.7.44.132/aquacredit/assets/images/bank_tansfer.png" class="mCS_img_loaded">
            <input type="radio" name="act_types_edit" value="cash" checked="">
            <span> Bank Transfer </span>
          </li>
          <li class="cash_trns_edit lnk_typ"> 
            <img src="http://3.7.44.132/aquacredit/assets/images/cash_icn.png" class="mCS_img_loaded">
            <input type="radio" name="act_types_edit" value="cash">
            <span> Cash </span>
          </li>
          <li class="cash_trns_edit lnk_typ"> 
            <img src="http://3.7.44.132/aquacredit/assets/images/cash_icn.png" class="mCS_img_loaded">
            <input type="radio" name="act_types_edit" value="cash">
            <span> Crop Transfer </span>
          </li>
        </ul>

        <div class="bnk_trnk_blk"> 
             <ul class="trans_inf bnk_tr"> 
                  <li class="create_li date">
                          <div class="cre_inp">
  <div class="sm_blk"> Date </div>
    <input type="text" class="form-control" placeholder="" data-original-title="" title="">
 </div>
</li>

<li class="admin_bank_li"> 
    <div class="check_wt_serc"> 
              <div class="show_va"> Select Bank </div>
            <div class="selectVal">  Select Bank </div>
            <ul class="check_list">   
              <li> 
        <div class="form-check">
  <input class="form-check-input" type="radio" name="trader" id="bnk1" value="Bank 1">
<label class="form-check-label" for="bnk1">
    <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/sib_icn.png" alt="" title="" class="mCS_img_loaded"> </div>
        <div class="bank_mny"> 
            <div class="bank_bal"> ₹ 10,000 </div>
            <div class="accont_numb">xxxxxxxxx01792</div>
        </div>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="trader" id="bnk2" value=" Bank 2">
<label class="form-check-label" for="bnk2">
  <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/hdfc_icn.png" alt="" title="" class="mCS_img_loaded"> </div>
        <div class="bank_mny"> 
            <div class="bank_bal"> ₹ 10,000 </div>
            <div class="accont_numb">xxxxxxxxx01792</div>
        </div>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="trader" id="bnk3" value="Bank 3">
<label class="form-check-label" for="bnk3">
         <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/icici_icn.png" alt="" title="" class="mCS_img_loaded"> </div>
        <div class="bank_mny"> 
            <div class="bank_bal"> ₹ 10,000 </div>
            <div class="accont_numb">xxxxxxxxx01792</div>
        </div>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="trader" id="bnk4" value="Bank 4">
<label class="form-check-label" for="bnk4">
      <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/hdfc_icn.png" alt="" title="" class="mCS_img_loaded"> </div>
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

  <li class="admin_bank_li"> 
    <div class="check_wt_serc"> 
              <div class="show_va"> Select User Bank </div>
            <div class="selectVal">  Select User Bank </div>
            <ul class="check_list"> 
              <li> 
        <div class="form-check">
  <input class="form-check-input" type="radio" name="trader" id="bnk1" value="Bank 1">
<label class="form-check-label" for="bnk1">
    <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/sib_icn.png" alt="" title="" class="mCS_img_loaded"> </div>
        <div class="bank_mny"> 
            <div class="bank_bal"> ₹ 10,000 </div>
            <div class="accont_numb">xxxxxxxxx01792</div>
        </div>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="trader" id="bnk2" value=" Bank 2">
<label class="form-check-label" for="bnk2">
  <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/hdfc_icn.png" alt="" title="" class="mCS_img_loaded"> </div>
        <div class="bank_mny"> 
            <div class="bank_bal"> ₹ 10,000 </div>
            <div class="accont_numb">xxxxxxxxx01792</div>
        </div>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="trader" id="bnk3" value="Bank 3">
<label class="form-check-label" for="bnk3">
         <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/icici_icn.png" alt="" title="" class="mCS_img_loaded"> </div>
        <div class="bank_mny"> 
            <div class="bank_bal"> ₹ 10,000 </div>
            <div class="accont_numb">xxxxxxxxx01792</div>
        </div>
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="trader" id="bnk4" value="Bank 4">
<label class="form-check-label" for="bnk4">
      <div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/hdfc_icn.png" alt="" title="" class="mCS_img_loaded"> </div>
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
<li class="create_li">
<div class="cre_inp">
  <div class="sm_blk"> Withdrawal Amount </div>
    <input type="text" class="form-control" placeholder="" data-original-title="" title="">
 </div>
</li>
    </ul>
        </div>
        <div class="wth_pop_not"> 
          <textarea>Note</textarea>
        </div>
        <div class="pop_footer"> 
          <button type="submit" class="btn btn-primary wth_drw_btn">Withdraw</button>
        </div>
      </div>
          </div>
      </div>
     </div>
  </div>

<div class="modal fade" id="settl_amnt" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content ">
        <div class="pp_clss" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> </div>
      <div class="pop_hdr"> 
        <h1 class="create_hdg"> Bill Settelement </h1>
        <p> 10-Apr-2020 to 10-May-2020 </p>
      <div class="pop_stp_tbs"> 
        <div class="bdr_blue"></div>
      <div class="tbs_div fst_step act_tb"> 1
        <div class="tb_hdg"> Loans </div> 
      </div>
        <div class="tbs_div sec_step"> 2 
      <div class="tb_hdg"> Sales </div> 
        </div>
        <div class="tbs_div thrd_step"> 3 
      <div class="tb_hdg"> Billing </div>
        </div>
      </div>        
    </div>
     <div class="tab_cnt_blk">
        <div class="loans_tb"> 
            <div class="rt_tbl_sale"> 
              <div class="rt_blk_in">
                <div class="analtic_blk"> 
                  <p class="anl_sml_txt"> Final Loan Amount </p>
                  <h1 class="anl_lrg_txt" id="finalamount"> ₹0 </h1>
                  <ul> 
                    <li> 
                      <span class="anl_sml_txt">Total Amount</span> 
                      <span class="li_amnt_an"> <b id="totalamount">₹0</b> </span>
                    </li>
                    <li> 
                      <span class="anl_sml_txt">Total Interest</span> 
                      <span class="li_amnt_an blue_txt"> <b id="totalinterest">₹0</b> </span>
                    </li>
                  </ul>
                </div>             
                      </div>
            </div>
            <div class="lft_tbl_sale">
            <div class="res_tbl"> 
              <form id="loanfrm" name="loanfrm" action="javascript:void(0);" method="post">
                <table class="table">
                  <thead> <tr> 
                    <th width="120"> Start Date </th>
                    <th width="120"> End Date </th>
                    <th width="32"> Days </th>
                    <th width="120"> Type </th>
                    <th class="txt_rt" width="120"> Loan Amount </th>
                    <th width="32" style="width: 32px; max-width: 32px;" class="txt_cnt"> ROI </th>
                    <th class="txt_rt" width="120"> Interest </th>
                    <th class="txt_rt" width="200"> Total </th>
                  </tr> </thead>
                  <input type="hidden" name="rowcount" id="rowcount">
                  <tbody id="loandata">

                  </tbody>
                  <!--  <tfoot>
                    <tr> 
                      <th>  Total  </th>
                      <th colspan="4" class="txt_rt"> 1,20,000</th>
                      <th> </th>
                      <th class="txt_rt">  24,000  </th>
                      <th class="txt_rt txt_red">  1,44,000 <i> <img src="http://3.7.44.132/aquacredit/assets/images/rd_c_ar.png" alt="" title=""> </i> </th>
                    </tr>
                    </tfoot> -->
                </table>
              </form>
            </div>
            </div>
        </div>

        <div class="sale_tb" style="display: none">
          <div class="rt_tbl_sale">
            <div class="rt_blk_in"> 
                <div class="analtic_blk"> 
                  <p class="anl_sml_txt"> Final Amount </p>
                  <h1 class="anl_lrg_txt"> ₹1,42,000 </h1>
                  <ul> 
                    <li class="prd_typ"> 
                      <span class="anl_sml_txt">Feed</span> 
                      <span class="li_amnt_an">  ₹1,00,000  </span>
                    </li>
                    <li class="discount_li"> 
                      <span class="anl_sml_txt">Discount</span> 
                      <span class="li_amnt_an">  - ₹10,000   </span>
                    </li>
                    <li class="eql_tbl"> = </li>
                    <li> 
                       <span class="anl_sml_txt">Total</span> 
                      <span class="li_amnt_an blue_txt"> <b>₹90,000</b> </span>
                    </li>
                  </ul>
                  <ul> 
                    <li class="prd_typ"> 
                      <span class="anl_sml_txt">Machinery </span> 
                      <span class="li_amnt_an">  ₹1,00,000  </span>
                    </li>
                    <li> 
                      <span class="anl_sml_txt discount_li">Discount</span> 
                      <span class="li_amnt_an">  - ₹10,000   </span>
                    </li>
                    <li class="eql_tbl"> = </li>
                    <li> 
                       <span class="anl_sml_txt">Total</span> 
                      <span class="li_amnt_an blue_txt"> <b>₹90,000</b> </span>
                    </li>
                  </ul>
                  <ul> 
                    <li class="prd_typ"> 
                      <span class="anl_sml_txt">Medicine </span> 
                      <span class="li_amnt_an">  ₹1,00,000  </span>
                    </li>
                    <li class="discount_li"> 
                      <span class="anl_sml_txt">Discount</span> 
                      <span class="li_amnt_an">  - ₹10,000   </span>
                    </li>
                    <li class="eql_tbl"> = </li>
                    <li> 
                       <span class="anl_sml_txt">Total</span> 
                      <span class="li_amnt_an blue_txt"> <b>₹90,000</b> </span>
                    </li>
                  </ul>
                  <ul class="ttl_blk_ul"> 
                    <li class="prd_typ"> 
                      <span class="anl_sml_txt prd_typ">Total Amount</span> 
                      <span class="li_amnt_an">   <b>₹3,00,00</b>    </span>
                    </li>
                    <li class="pad_l_none"> 
                      <span class="anl_sml_txt">Total Discount</span> 
                      <span class="li_amnt_an blue_txt">   <b>₹30,000</b>   </span>
                    </li>
                  </ul>
                </div>
            </div>
          </div>
            <div class="lft_tbl_sale">   
                         
            	<table border="0" cellpadding="0" cellspacing="0" id="saledataload">

            	</table>  	
            
            </div>  
        </div>

        <div class="billing_tb" style="display: none;"> 
          <div class="top_bill_tb">
              <div class="bil_tp_lft top_in_op"> 
                <h1> PS Prudhvi - #05657 </h1>
                <p> 9876543210 </p>
              </div>
              <div class="bil_tp_rt"> 
                <ul> 
                  <li class="top_in_op bdr_non"> 
                    <p> Location </p>
                    <h1> Kakinada </h1>
                  </li>
                  <li class="top_in_op"> 
                    <p> Billing Date </p>
                    <h1> 12-May-2020 </h1>
                  </li>
                </ul>
              </div>
          </div>

          <div class="row">
              <div class="col-md-6"> 
                <div class="rat_blk"> 
                  <div class="rto_tons"> 
                    Harvest
                    <div class="rto_val"> 1.000 tons </div>
                  </div>
                  <div class="ratio_icon grt_rto"> 
                    <div class="mdl_bar"> </div>
                    <div class="tp_bar"> </div>
                    <div class="btm_bar"> </div>
                    <div class="crlcl_blk"> </div>
                    <div class="bal_bar"> </div>
                    <div class="sing_bag"> 
                      <img src="http://3.7.44.132/aquacredit/assets/images/icon_singl_rat" alt="" title="">
                    </div>
                    <div class="mult_bag"> <img src="http://3.7.44.132/aquacredit/assets/images/icon_mult_rat" alt="" title=""> </div>
                     <div class="mult_bag2"> <img src="http://3.7.44.132/aquacredit/assets/images/icon_mult_rat" alt="" title=""> </div>
                     <div class="rto_txt"> FCR: <span class="blue_txt">1:1.2</span> </div>
                  <div class="sts_rto">  Good </div>
                  </div>
                  <div class="rto_tons"> 
                    Feed Usage
                    <div class="rto_val"> 1.200 tons </div>
                  </div>
                </div>
              </div>
               <div class="col-md-6"> 
                  <table border="none" class="prods_ls_blk">
                      <thead>
                        <tr> 
                          <th> Feeds </th>
                          <th class="no_bgs"> No.of.bags </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr> 
                          <td> Product Name - 50kgs </td>
                          <td class="no_bgs"> 5 </td>
                        </tr>
                          <tr> 
                          <td> Product Name - 50kgs </td>
                          <td class="no_bgs"> 5 </td>
                        </tr>
                          <tr> 
                          <td> Product Name - 50kgs </td>
                          <td class="no_bgs"> 5 </td>
                        </tr>
                          <tr> 
                          <td> Product Name - 50kgs </td>
                          <td class="no_bgs"> 5 </td>
                        </tr>
                          <tr> 
                          <td> Product Name - 50kgs </td>
                          <td class="no_bgs"> 5 </td>
                        </tr>
                          <tr> 
                          <td> <b> Total Bags </b> </td>
                          <td class="no_bgs"> <b> 25 </b> </td>
                        </tr>
                      </tbody>
                  </table>
                </div>
          </div>

                <div class="row card_list">
          <div class="col-md-9"> 
              <div class="row"> 
                <div class="col-md-4"> 
                    <div class="analtic_blk"> 
                <p class="anl_sml_txt"> Loan Amount </p>
                <h1 class="anl_lrg_txt"> ₹1,42,000 </h1>
                <ul> 
                  <li> 
                    <span class="anl_sml_txt">Total Amount</span> 
                    <span class="li_amnt_an"> ₹1,20,000 </span>
                  </li>
                  <li> 
                    <span class="anl_sml_txt">Total Interest</span> 
                    <span class="li_amnt_an"> ₹24,000 </span>
                  </li>
                </ul>
              </div>
                </div>

                <div class="col-md-4"> 
                    <div class="analtic_blk"> 
                    <p class="anl_sml_txt"> Feed Amount </p>
                    <h1 class="anl_lrg_txt"> ₹90,000 </h1>
                    <ul> 
                      <li> 
                        <span class="anl_sml_txt">Total Amount</span> 
                        <span class="li_amnt_an"> ₹1,00,000 </span>
                      </li>
                      <li> 
                        <span class="anl_sml_txt">Total Discount</span> 
                        <span class="li_amnt_an"> ₹10,000 </span>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="col-md-4"> 
                     <div class="analtic_blk"> 
      <p class="anl_sml_txt"> Medicine Amount </p>
      <h1 class="anl_lrg_txt"> ₹90,000 </h1>
      <ul> 
        <li> 
          <span class="anl_sml_txt">Total Amount</span> 
          <span class="li_amnt_an"> ₹1,00,000 </span>
        </li>
        <li> 
          <span class="anl_sml_txt">Total Discount</span> 
          <span class="li_amnt_an"> ₹10,000 </span>
        </li>
      </ul>
    </div>
                </div>

                <div class="col-md-4"> 
                    <div class="analtic_blk"> 
      <p class="anl_sml_txt"> Machinery Amount </p>
      <h1 class="anl_lrg_txt"> ₹90,000 </h1>
      <ul> 
        <li> 
          <span class="anl_sml_txt">Total Amount</span> 
          <span class="li_amnt_an"> ₹1,00,000 </span>
        </li>
        <li> 
          <span class="anl_sml_txt">Total Discount</span> 
          <span class="li_amnt_an"> ₹10,000 </span>
        </li>
      </ul>
    </div>
                </div>

                <div class="col-md-4"> 
                    <div class="analtic_blk"> 
      <p class="anl_sml_txt"> Harvest </p>
      <h1 class="anl_lrg_txt"> ₹10,000 </h1>
      <ul> 
        <li> 
          <span class="anl_sml_txt">Type</span> 
          <span class="li_amnt_an"> Vannamei </span>
        </li>
        <li> 
          <span class="anl_sml_txt">Total Tons</span> 
          <span class="li_amnt_an"> 1.200 </span>
        </li>
      </ul>
    </div>
                </div>
              </div>
          </div>
           <div class="col-md-3"> 
                <div class="ext_pop_chrs">
                  <ul> 
                    <li><span class="fl"> Transport </span> <span class="fr"> ₹2,000 </span> </li>
                     <li><span class="fl"> Lab Fee </span> <span class="fr"> ₹3,000 </span> </li>
                      <li><span class="fl"> Receipts </span> <span class="fr"> ₹10,0000 </span> </li>
                       <li><span class="fl"> Return </span> <span class="fr"> ₹5000 </span> </li>
                  </ul>                  
                </div>              
           </div>
         </div>
         
         <div class="list_all_vew"> 
          <table border="0" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
              <th class="date"> Date </th>
              <th> Details </th>
              <th class="txt_rt">  Amount  </th>
            </tr>
            </thead>
            <tbody>
              <tr> 
                <td class="date"> 01-Jan-2020 </td>
                <td> <a href="#"> LN123456 </a> </td>
                <td class="txt_red txt_rt out_td"> -10,000 <div class="arr_blk"> <img src="http://3.7.44.132/aquacredit/assets/images/rd_c_ar.png" class="mCS_img_loaded"> </div> </td>
              </tr>
              <tr>
                <td> </td>
              
                  <td colspan="2"> 
                  <table>
                    <tbody><tr> 
                      <th> Crop Location </th>
                      <th> Loan Type </th>
                      <th> Loan Amount </th>
                      <th>  </th>
                      <th>  </th>
                    </tr>
                    <tr> 
                      <td> Kakinada </td>
                      <td> Crop Loan </td>
                      <td> 20,000 </td>
                      <td>  </td>
                      <td>  </td>
                    </tr>
                  </tbody></table>
              </td>

              </tr>
              <tr> 
                <td class="date"> 01-Jan-2020 </td>
                <td> <a href="#"> LN123456 </a> </td>
                <td class="txt_red txt_rt out_td"> -10,000 <div class="arr_blk"> <img src="http://3.7.44.132/aquacredit/assets/images/rd_c_ar.png" class="mCS_img_loaded"> </div> </td>
              </tr>

              <tr> 
                <td class="date"> 01-Jan-2020 </td>
                <td> <a href="#"> LN123456 </a> </td>
                <td class="txt_red txt_rt out_td"> -10,000 <div class="arr_blk"> <img src="http://3.7.44.132/aquacredit/assets/images/rd_c_ar.png" class="mCS_img_loaded"> </div> </td>
              </tr>

            </tbody>
          </table>
         </div>
        </div>
    </div> 
     <div class="footer_pp"> <button class="btn btn-primary"  id="confirmOrder" > Next </button> </div>
      </div>
   </div>
</div>

  <div class="sle_cr_r"> 
             <div class="card_view cp_anl"> 
                 <ul class="trd_anl"> 
          <li class="bor_lf_none"> 
            <div class="top_in_op crop_top">
                                      <p> Loan </p> 
                                      <h1 id="cropLoan">  </h1>
                                    </div>
          </li>
          <li class=""> 
            <div class="top_in_op crop_top">
                                      <p> Orders </p> 
                                      <h1 id="cropOrder">  </h1>
                                    </div>
          </li>
          <li class=""> 
            <div class="top_in_op crop_top">
                                      <p> Crop Outputs </p> 
                                      <h1 id="cropHarvest"> </h1>
                                    </div>
          </li>
          <li class=""> 
            <div class="top_in_op crop_top">
                                      <p> Acres </p> 
                                      <h1 id="cropAcre">  </h1>
                                    </div>
          </li>
            <li class="fr slc_usr">      
      <div class="check_wt_serc val_seld"> 
                          <div class="show_va">Selected Crop</div>
                          <div class="selectVal cropValue"></div>
                          <ul class="check_list"> 
                            <li id="crop_opt_li">
                              
                            </li>
                          </ul>                       
                        </div>
    </li>
    <input type="hidden" value="" id="crop_id">
         </ul>
             </div>        
                  <div class="urs_dt"> 
                  <div class=""> 
                        <div class="res_tbl">
                     <table id="usr_lst_tbl" class="table table-striped table-bordered" style="width:100%">
            <thead>
                      
            </thead>
          <tbody>        
      
          </tbody>
           
                      </table>
                    </div>
                    <div id="table_footer"  style="width:100%;padding: 10px 0;">
					<table style="width:100%">
						<tr>
							<td class="opic_non date"> &nbsp;   </td>
							<td class="txt_rt"> Total </td>
							<td class="txt_rt in_td tr_amount">  </td>

						</tr>
						<tr>
							<td class="opic_non date"> &nbsp;  </td>
							<td class="txt_rt type"> Opening Balance</td>
							<td class="txt_rt tr_amount" id="open_bal"> +0 </td>
						</tr>
						<!-- <tr>
							<td class="opic_non date"> &nbsp;  </td>
							<td class="txt_rt type"> <b>Previous Balance <span class="grn_clr"></span></b> </td>
							<td class="grn_clr txt_rt"> <b>+100</b> </td>
						</tr>-->
						<tr>
							<td class="opic_non date"> &nbsp;  </td>
							<td class="txt_rt grd_ttl"> <b>Grand Total <span class="grn_clr"></span></b> </td>
							<td class="grd_ttl txt_rt grand_total tr_amount" id="grand_total"> <b>+0</b> </td>
						</tr>
					</table>
				</div>
                  </div>
               </div>
<!-- <div class="btm_btn"> <button class="btn btn-primary"> Settle Amount </button> </div> -->
  </div>
</div>
<script type="text/javascript">
function onlyNumberKey(evt) { 
          
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
}

function getlloandata()
{
  var user_id = "<?php echo $user["user_id"];?>";
  var crpid = $("#crop_id").val();
  /*get loans data start*/
   $('#loandata').html('');
    $.ajax({
      url: url+"api/users/getloandata",
      data: {userid:user_id,crop_id:crpid},
      type:'POST',    
      datatype:'json',
      success : function(response1){
      res1 = JSON.parse(response1);
      htmlRows = "";
      $('#rowcount').val(res1.length);
      if(res1.length>0)
      {
          $.each(res1, function(index, trades) {
                       
          var tcamtt = trades.amount;
          var interestval = trades.interestval;
          if(trades.interest_amount!='' && trades.interest_amount!=null)
          {
            var interest_amount = trades.interest_amount;
          }
          else
          {
            var interest_amount = 0;
          }
          
          if(trades.total_amount!='' && trades.total_amount!=null)
          {
            var total_amount = trades.total_amount;
          }
          else
          {
             var total_amount = 0;
          }
          /*var tfamtt = trades.total_price;*/

          htmlRows = '<tr><td> '+trades.startdate+' </td><td>'+trades.enddate+'</td><td> '+trades.days+' </td><td> '+trades.croploan+'</td><td class="txt_rt"> '+tcamtt+'</td><td> <input type="text" class="txt_cnt rt_int mykey" value="'+interestval+'" name="iinterest[]" id="iinterest'+index+'" onkeypress="return onlyNumberKey(event)"> <input type="hidden" value="'+trades.amount+'" name="tot[]" id="tot'+index+'" ><input type="hidden" value="'+trades.days+'" name="days[]" id="days'+index+'" ><input type="hidden" value="'+trades.months+'" name="months[]" id="months'+index+'" ><input type="hidden" value="'+trades.id+'" name="trans_id[]" id="trans_id'+index+'" ><input type="hidden"  name="interestamtval[]" id="interestamtval'+index+'" value="'+trades.interest_amount+'" /><input type="hidden" name="totamtval[]" id="totamtval'+index+'" value="'+trades.total_amount+'" /></td><td class="txt_rt" id="interestamt'+index+'"> '+interest_amount+'</td><td class="txt_rt txt_red" id="totamt'+index+'">'+total_amount+'<i> <img src="http://3.7.44.132/aquacredit/assets/images/rd_c_ar.png" alt="" title=""> </i> </td></tr>';

              $('#loandata').append(htmlRows);
              calculateTotal();
          });
      }
      }
    });
  /*get loans data end*/
  /*get sales data start*/
  var user_id = "<?php echo $user["user_id"];?>";
 
  	 $.ajax({
      url: url+"api/users/getsalesdata",
      data: {userid:user_id,crop_id:crpid},
      type:'POST',    
      datatype:'json',
      success : function(response1){
      res1 = JSON.parse(response1);
      htmlRows = "";
      $('#rowcount').val(res1.length);
      if(res1.length>0)
      {
          $.each(res1, function(index, trades) {
                       
          /*var tcamtt = trades.amount;
          var interestval = trades.interestval;
          if(trades.interest_amount!='' && trades.interest_amount!=null)
          {
            var interest_amount = trades.interest_amount;
          }
          else
          {
            var interest_amount = 0;
          }
          
          if(trades.total_amount!='' && trades.total_amount!=null)
          {
            var total_amount = trades.total_amount;
          }
          else
          {
             var total_amount = 0;
          }
          var tfamtt = trades.total_price;*/

          htmlRows = '<thead data-toggle="collapse" data-target="#feed_tbl" aria-expanded="false" aria-controls="feed_tbl"><tr><th><span class="tggl_act"><img src="http://3.7.44.132/aquacredit/assets/images/plu.svg" class="plu"><img src="http://3.7.44.132/aquacredit/assets/images/mini.svg" class="mini"></span>Feed (5) </th><th class="pp_amnt txt_rt"></th><th class="pp_dis"></th><th class="pp_ttl txt_rt"> </th></tr></thead>';

              $('#saledataload').append(htmlRows);
              calculateTotal();
          });
      }
      }
    });
  /*get sales data end*/
}
function form_validation(err,err_msg,tagid)
{
  $('.mykey').parent().css("border", "");
  
  $("#snackbar").text(err_msg);
  $("#snackbar").addClass("show");
  
  setTimeout(function(){ $("#snackbar").removeClass("show"); }, 3000);
  $(tagid).parent().css("border", "1px solid red");
 
  $(tagid).focus();
  return false;
}
/*form submit*/`1q`
$("#confirmOrder").on("click",function(){
    var rcount = $('#rowcount').val();

    var i;
    for (i = 0; i <= rcount; i++) {

      var interests = $('#iinterest'+i).val();

      if(interests == 0 || interests == ''){ err = 1; err_msg = "Please select sale type!"; tagid = "#iinterest"+i;
        return form_validation(err,err_msg,tagid);}
    }

    formData = new FormData(loanfrm);
    $.ajax({
            url: url+"api/users/loandataupdate",
            data: formData,
            type:'POST',
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            datatype:'json',
            success : function(response)
            {           
              res= JSON.parse(response);
               $(".sec_step").trigger("click");
            }
    });
});

$(document).on('blur', "[id^=iinterest]", function() {
    calculateTotal();
}); 
function calculateTotal() {
   
    var totalamtvalue = '';
    var totinterestvalue = '';
    var totval = '';

    $("[id^='iinterest']").each(function() {
        var id = $(this).attr('id');
        id = id.replace("iinterest", '');
        
        var t = $("#iinterest" + id).val();
        var p = $('#tot' + id).val();
        var days = $('#days' + id).val();
        var r = $('#months' + id).val();
        if(r==0)
        {
          r=1;
        }

        /*interest*/
        var intrests = ((+p) * (+t) * (+r)) / 100; 
        $("#intrestResult").val(intrests)
        $("#totalResult").val((+p) + intrests)
        /*interest*/     
       
        $('#interestamt' + id).html('₹'+currency_format(intrests,2));
        $('#interestamtval' + id).val(intrests);

        $('#totamt' + id).html('₹'+currency_format((+p) + intrests),2);
        $('#totamtval' + id).val((+p) + intrests);
        var tf = (+p) + intrests;
        var ttt = (+p);
        //alert(tf);
        //alert(intrest);

        totalamtvalue += tf;
        totinterestvalue += intrests;
        totval += ttt;
        //ddisc += prodisc; 

    });

   
    $('#finalamount').html('₹'+currency_format(totalamtvalue,2));
    $('#totalamount').html('₹'+currency_format(totval,2));
    $('#totalinterest').html('₹'+currency_format(totinterestvalue,2));
     
}


var url = '<?php echo base_url() ?>';
$(document).ready(function() {
  var user_id = "<?php echo $user["user_id"];?>";
  hidcrop = ""
  //get crops data
  $.ajax({    
    url: url+"api/UserCrops/index/"+user_id,
    data: {},
    type:'POST',    
    datatype:'json',
    success : function(response){     
      res= JSON.parse(response);        
      // var user_id = $('#selectuser_id'+aeval).val();
      var sel = "";
      if(user_id != "")
      {
        var opt = '<div class="form-check"><input class="form-check-input" type="radio" name="crop_opt" id="crp" /><label class="form-check-label" for="crp"></label></div>';;
        if(res.data.length > 0)
        {
          opt = '';
          $.each(res.data, function(index, crop) {
            if($("#crop_id").val() == "")
            { 
              $("#crop_id").val(crop.cd_id); 
              console.log(crop.crop_location);
              $(".cropValue").text(crop.crop_location);
              sel = "checked"; 
            } else{ 
              sel = "";
            }
            //if(crop.cd_id == hidcrop){ sel = "checked"; }else{ sel = "";}
            opt += '<div class="form-check"><input class="form-check-input" type="radio" name="crop_opt" id="crp'+index+'" value="'+crop.cd_id+'" '+sel+' required /><label class="form-check-label" for="crp'+index+'">'+crop.crop_location+'</label></div>';
          });
        }
      }else{
        var opt = '';
      }
      $("#crop_opt_li").html(opt); 
      load_unsettled();
      load_analytics();
    }
  });

  $(document).on("change", ".check_list input[name='crop_opt']", function(){
    var id = $( 'input[name=crop_opt]:checked' ).val();
    $("#crop_id").val(id);
    $(".swith_blk").toggleClass('tog_yes');
    //$('#usr_lst_tbl').DataTable().ajax.reload();
    $('#usr_lst_tbl').DataTable().destroy();
    load_unsettled();
    load_analytics();
  });

  $(document).on("click", "#print_transaction",function(){
		console.log('print');
		user_id = user_id;
		crop_id = $("#crop_id").val();
		settled = $(".act_tab").attr("id");

		console.log('user_id'+user_id);
		console.log('crop'+crop_id);
		console.log('settled'+ settled);
		window.location.href = "<?php echo base_url('api/users/printTrans');?>/"+user_id+"/"+crop_id+"/0";
	});

  $('.swith_blk').click(function(){
    tables = $('#usr_lst_tbl').DataTable();
    $(".expand_details").each(function() {       
      var tr = $(this).closest('tr');
      var row = tables.row( tr );
      row.child.hide();
      tr.removeClass('shown');
    });
    if($(this).hasClass('tog_yes')){
      $(this).removeClass('tog_yes');   
    }else{
      $(this).addClass('tog_yes');
      $(".expand_details").trigger("click");
    }
  });

   $(".loan_btm div.toolbar").html('<b>SSS</b>');
    $('.loan_btm a.toggle-vis').on( 'click', function (e) {
        $(this).parent().toggleClass('act');
        e.preventDefault();
        var column = tables.column( $(this).attr('data-column') );
        column.visible( ! column.visible() );
    });

    $('.dataTables_paginate').html('<a href="#" title=""> Show More </a>');
    $('.ad_nt').click(function(){
    $('.pp_note').toggleClass('show_blk');
});  

  $(document).on('click','.comp_cl',function(){
    $(this).addClass('act_tab');
    $('.tabs_tbl').addClass('cmp_ul');
    $('.drft_cl').removeClass('act_tab');
    //$('#usr_lst_tbl').DataTable().ajax.reload();
    $('#usr_lst_tbl').DataTable().destroy();
    load_settled();
  });

  $(document).on('click','.drft_cl',function(){
    $(this).addClass('act_tab');
    $('.tabs_tbl').removeClass('cmp_ul');
    $('.comp_cl').removeClass('act_tab');
    //$('#usr_lst_tbl').DataTable().ajax.reload();
    $('#usr_lst_tbl').DataTable().destroy();
    load_unsettled();
  });

    $('#fil2').multiselect();
    $('#fil1').multiselect();
    $('#fil3').multiselect();

  $('.loans_tp').click(function(){
      $('.alpha_blk').show();
      $('.side_popup').addClass('opn_slide');
      $('#loans_tp').show();
      $('#orders_tp').hide();
      $('#crop_top').hide();
    });

    $('.orders_tp').click(function(){
      $('.alpha_blk').show();
      $('.side_popup').addClass('opn_slide');
       $('#loans_tp').hide();
      $('#orders_tp').show();
      $('#crop_top').hide();
    });


 $('.crop_top').click(function(){
      $('.alpha_blk').show();
      $('.side_popup').addClass('opn_slide');
      $('#loans_tp').hide();
      $('#orders_tp').hide();
      $('#crop_top').show();
    });

    $('.alpha_blk').click(function(){
        $('.side_popup').removeClass('opn_slide');
        $(this).hide();
    });

    $('.sec_step').click(function(){
        $(this).addClass('act_tb').removeClass('dne_tb');
		$('.fst_step').removeClass('act_tb').addClass('dne_tb');
		$('.thrd_step, .fth_step, .fst_step').removeClass('act_tb dne_tb');
		$('.bdr_blue').css('width', '75px');
		$('.loans_tb').hide();
		$('.sale_tb').show();
		$('.billing_tb').hide();
    });

      $('.fst_step').click(function(){
        $(this).addClass('act_tb').removeClass('dne_tb');
		$('.confrm_blk').show();
		$('.sec_step, .fth_step, .thrd_step').removeClass('act_tb dne_tb');
		$('.thrd_step').removeClass('act_tb dne_tb');
		$('.bdr_blue').removeAttr('style');
		$('.loans_tb').show();
		$('.sale_tb').hide();
		$('.billing_tb').hide();
    });

  $('.thrd_step').click(function(){
  $('.confrm_blk').hide();
  $(this).addClass('act_tb').removeClass('dne_tb');
  $('.fst_step, .fth_step').removeClass('act_tb').addClass('dne_tb');
  $('.sec_step').removeClass('act_tb').addClass('dne_tb');
  $('.bdr_blue').css('width', '150px');
  $('.loans_tb').hide();
  $('.sale_tb').hide();
  $('.billing_tb').show()
    });

  $('.lnk_typ').click(function(){
    $(this).parent('.assign_type').find('.lnk_typ').removeClass('act_type');
    $(this).addClass('act_type');
  });
});
function load_unsettled()
{
  $("#table_footer").show();
  $("#usr_lst_tbl").empty();
  var h = $(window).height();
  var min_h = h-315;
  var tables = $('#usr_lst_tbl').DataTable({
    'ordering': false,
    'processing': true,
    'serverSide': true,
      'serverMethod': 'post',
    "columns": [
      {title: "Date", className: "date","width": "20%"},
      {title: "Detail",className: "", "width": "20%"},
      {title: "Amount",className: "txt_rt out_td","width": "60%"} //grn_clr txt_red out_td
    ],
    
    language: {
      searchPlaceholder: "Search Transaction Details",
      search: "",
      "dom": '<"toolbar">frtip',
    },
    "scrollY":  min_h,
    "scrollCollapse": true,
    'ajax': {
      'url':url+'api/users/unsettled_trans',
      'data': function(data){
          data.user_id = "<?php echo $user["user_id"];?>";
          data.crop_id = $("#crop_id").val();
          data.settled = $(".act_tab").attr("id");
      },
      "dataSrc": function (json) {
        total_trans_amount = json.total_trans_amount;
				grand_total = parseFloat(total_trans_amount) + parseFloat(json.open_balance);
				$(".in_td").html('₹'+currency_format(total_trans_amount,2));
				$("#open_bal").html('₹'+currency_format(json.open_balance,2));
				$(".grand_total").html('₹'+currency_format(grand_total,2));		
				return json.data;
      }
    }
  });
  
  $('.dataTables_scrollBody').css('height', min_h);
  $('#usr_lst_tbl_wrapper .dataTables_length').html('<ul class="tabs_tbl"><li class="act_tab drft_cl" id="status_0"> <span>Unsettled</span> </li><li class="comp_cl" id="status_1"> <span>Settled </span> </li></ul> <span class="tbl_btn">  </span>');
  $('.dataTables_scrollBody').mCustomScrollbar("destroy");
	$('.dataTables_scrollBody').mCustomScrollbar({
		theme:"minimal",
		mouseWheelPixels: 35,
		scrollInertia:250,
	});  
  $('#usr_lst_tbl tbody').on('click', '.expand_details', function () {
        var tr = $(this).closest('tr');
        var row = tables.row( tr );
 
        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            $content = format(row.data())
            if($content !='')
            {
              row.child( $content,'user_dtl_tr' ).show();
              tr.addClass('shown');
            }
        }
    } );
  }

function load_settled()
{
  $("#table_footer").hide();
  $("#usr_lst_tbl").empty();
  var h = $(window).height();
  var min_h = h-230;
  var tables = $('#usr_lst_tbl').DataTable({
    'ordering': false,
    'processing': true,
    'serverSide': true,
      'serverMethod': 'post',
    "columns": [
      {title: "<span class='material-icons'>add</span>", className: "pl_m","width": "50px"},
      {title: "Settled Date", className: "date","width": "100px"},
      {title: "Settled Id",className: "", "width": ""},
      {title: "Status",className: "txt_rt out_td","width": ""},
      {title: "Download",className: "txt_rt out_td","width": ""},
    ],
    
    language: {
      searchPlaceholder: "Search Transaction Details",
      search: "",
      "dom": '<"toolbar">frtip',
    },
    "scrollY":  min_h,
    "scrollCollapse": true,
    'ajax': {
      'url':url+'api/users/settled_trans',
      'data': function(data){
          data.user_id = "<?php echo $user["user_id"];?>";
          data.crop_id = $("#crop_id").val();
          data.settled = $(".act_tab").attr("id");;
      },
      "dataSrc": function (json) {
        return json.data;
      }
    }
  });
  $('.dataTables_scrollBody').css('height', min_h);
  $('#usr_lst_tbl_wrapper .dataTables_length').html('<ul class="tabs_tbl cmp_ul"><li class="drft_cl" id="status_0"> <span>Unsettled</span> </li><li class="act_tab comp_cl" id="status_1"> <span>Settled </span> </li></ul> <span class="tbl_btn">  </span>');
  $('.dataTables_scrollBody').mCustomScrollbar("destroy");
	$('.dataTables_scrollBody').mCustomScrollbar({
		theme:"minimal",
		mouseWheelPixels: 35,
		scrollInertia:250,
	});
 $('#usr_lst_tbl tbody').on('click', '.expand_details', function () {
    console.log('expand on click');
        var tr = $(this).closest('tr');
        var row = tables.row( tr );
 
    $.ajax({
      url: url+'api/users/getSettledDetails/'+row.data()[5],
      type: "GET",
      dataType: "json",
      async: false,
      success: function(result){
        if (row.child.isShown()){
          tr.removeClass('details');
          row.child.hide();
          $("#hide_details").hide();
					$("#show_details").show();
        }
        else {
          tr.addClass('details');
          row.child(result,'trans_detail_tr').show();
          $("#hide_details").show();
					$("#show_details").hide();		
        }
        
      },
      error: function(error){
        console.log("Error:");
        console.log(error);
      }
    }); 
       /*  if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            //console.log(row.data());
            row.child( load_records(row.data()) ).show();
            tr.addClass('shown');
        } */
    } );

}

function load_analytics()
{
  $.ajax({
    url: url+'admin/Users/getAnalytics',
    type: "POST",
    data: { user_id: "<?php echo $user["user_id"];?>", crop_id: $("#crop_id").val() },
    dataType: "json",
    async: false,
    success: function(data){
      data.cropLoan = (data.cropLoan) ? data.cropLoan : 0;
      data.cropOrders = (data.cropOrders) ? data.cropOrders : 0;
      data.cropHarvest = (data.cropHarvest) ? data.cropHarvest : 0;
      data.cropAcres = (data.cropAcres) ? data.cropAcres : 0;
      $("#cropLoan").text('₹'+currency_format(data.cropLoan,2));
      $("#cropOrder").text('₹'+currency_format(data.cropOrders,2));
      $("#cropHarvest").text('₹'+currency_format(data.cropHarvest,2));
      $("#cropAcre").text(data.cropAcres);
        //console.log(data.cropLoan);
    },
    error: function(error){
      console.log("Error:");
      console.log(error);
    }
  }); 

}

function format ( d ) {
  var  details = "";
  if(d[3] == "LOAN")
  {
    $.ajax({
      url: url+'api/loans/getLoanTypeByLoan/'+d[5],
      type: "POST",
      dataType: "json",
      async: false,
      success: function(data){
         details = '<tr class="detal_row">'+
            '<td class="date"> &nbsp; </td>'+
            '<td colspan="2">'+
              '<table>'+
                '<tr>'+
                  '<th> Crop Location </th>'+
                  '<th> Loan Type </th>'+
                  '<th> Loan Amount </th>'+
                  '<th>  </th>'+
                  '<th>  </th>'+
                '</tr>'+
                '<tr>'+
                  '<td> '+data.crop_location+'  </td>'+
                  '<td> '+data.loan_type+' </td>'+
                  '<td> '+'₹'+currency_format(data.loan_amt,2)+' </td>'+
                  '<td>  </td>'+
                  '<td>  </td>'+
                '</tr>'+
              '</table>'+
            '</td>'+
            '<td class="hide_blk"> </td>'+
            '<td class="hide_blk"> </td>'+
            '<td class="hide_blk"> </td>'+
          '</tr>';
        return details;
      },
      error: function(error){
        console.log("Error:");
        console.log(error);
      }
    });   
  }
  else if(d[3] == "RECEIPT")
  {
    details = '<tr class="detal_row">'+
            '<td class="date"> &nbsp; </td>'+
            '<td colspan="2">'+
              '<table>'+
                '<tr>'+
                  '<th> Transfer Type </th>'+
                  '<th> Amount </th>'+
                  '<th>  </th>'+
                  '<th>  </th>'+
                '</tr>'+
                '<tr>'+
                  '<td> '+d[4]+' transfer </td>'+
                  '<td> '+'₹'+currency_format(d[6],2)+' </td>'+
                  '<td>  </td>'+
                  '<td>  </td>'+
                '</tr>'+
              '</table>'+
            '</td>'+
            '<td class="hide_blk"> </td>'+
            '<td class="hide_blk"> </td>'+
            '<td class="hide_blk"> </td>'+
          '</tr>';
  }
  else if(d[4] == "GOODS")
  {
    $.ajax({
      url: url+'api/sales/getSaleItemDetails/'+d[5],
      type: "POST",
      dataType: "json",
      async: false,
      success: function(data){
        //var obj = jQuery.parseJSON(data);
         details = '<tr class="detal_row">'+
            '<td class="date"> &nbsp; </td>'+
            '<td colspan="2">'+
              '<table>'+
                '<tr>'+
                  '<th> Product Name </th>'+
                  '<th> Qty </th>'+
                  '<th> MRP </th>'+
                  '<th> Discount </th>'+
                  '<th> Total Price </th>'+
                '</tr>';
          $.each(data.data, function(key,value) {
            details += '<tr>'+
                  '<td> '+value.pname+'  </td>'+
                  '<td> '+value.quantity+' </td>'+
                  '<td> '+'₹'+currency_format(value.mrp,2)+' </td>'+
                  '<td> '+value.discount+' </td>'+
                  '<td> '+'₹'+currency_format(value.total_price,2)+' </td>'+
                '</tr>';
          }); 
        
        
          details += '</table>'+
            '</td>'+
            '<td class="hide_blk"> </td>'+
            '<td class="hide_blk"> </td>'+
            '<td class="hide_blk"> </td>'+
          '</tr>';
        return details;
      },
      error: function(error){
        console.log("Error:");
        console.log(error);
      }
    });
    
  }
  else if(d[4]=="HARVEST")
  {
    $.ajax({
      url: url+'api/Trades/tradeactualdetails/'+d[5],
      type: "GET",
      dataType: "json",
      async: false,
      success: function(data){
        //console.log(data);
        //var obj = jQuery.parseJSON(data);
         details = '<tr class="detal_row">'+
            '<td class="date"> &nbsp; </td>'+
            '<td colspan="2">'+
              '<table>'+
                '<tr>'+
                  '<th> Date </th>'+
                  '<th> Count </th>'+
                  '<th> Price </th>'+
                  '<th> Weight </th>'+
                  '<th> Total Price </th>'+
                '</tr>';
          $.each(data.data, function(key,value) {
            details += '<tr>'+
                  '<td> '+value.trade_date+'  </td>'+
                  '<td> '+value.count+' </td>'+
                  '<td> '+'₹'+currency_format(value.farmer_price,2)+' </td>'+
                  '<td> '+value.farmer_weight+' </td>'+
                  '<td> '+'₹'+currency_format(value.farmer_amount,2)+' </td>'+
                '</tr>';
          }); 
        
        
          details += '</table>'+
            '</td>'+
            '<td class="hide_blk"> </td>'+
            '<td class="hide_blk"> </td>'+
            '<td class="hide_blk"> </td>'+
          '</tr>';
        return details;
      },
      error: function(error){
        console.log("Error:");
        console.log(error);
      }
    });
  }
  else if(d[4] == "LOADING" || d[4] == "TRANSPORT"|| d[4] == "AMOUNT")
  {
    details = '';
  }
  return details;
    
}
</script>

<?php require_once 'footer.php';?>