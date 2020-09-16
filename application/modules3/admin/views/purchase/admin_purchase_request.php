<div id="create_module" role="dialog" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="pp_clss" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></div>
            <h2 class="create_hdg" style="margin-bottom: 15px;">
                Purchase Request <span id="msg"></span>
            </h2>
            <ul class="trans_inf ll_inp">
                <li>
                    <div class="check_wt_serc val_seld">
                        <div class="show_va">Branchs</div>
                        <div class="selectVal"><?php echo $branch["branch_name"];?></div>
                        <ul class="check_list">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="branch" name="branch" value="Branch1" checked="checked" />
                                    <label class="form-check-label" for="branch">
                                        <?php echo $branch["branch_name"];?>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="check_wt_serc">
                        <div class="show_va">Brands</div>
                        <div class="selectVal" id="bselectVal">Brands</div>
                        <ul class="check_list">
                            <li>
                                <?php 
                                    foreach ($brands as $key=>$value) {
                                       ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="brand_id" id="brand_<?php echo $value["brand_id"];?>_id" value="<?php echo $value["brand_name"];?>" onclick="Purchase.getProducts(<?php echo $value["brand_id"];?>);"/>
                                            <label class="form-check-label" for="brand_<?php echo $value["brand_id"];?>_id">
                                                <?php echo $value["brand_name"];?>
                                            </label>
                                        </div>
                                       <?php 
                                    }
                                ?>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <table class="ord_lst" cellspacing="0" cellpadding="0" border="0">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th class="txt_cnt qty_pp">Qty</th>
                        <th class="txt_cnt act_pp">Delete</th>
                    </tr>
                </thead>
                <tbody id="addproducts">
                    <tr><td colspan="3">Please select Brand</td></tr>
                </tbody>
            </table>
            <div class="po_ftr">
                <button type="button" class="btn fr sb_btn btn-primary" onclick="Purchase.submitRequest();" id="reqbtn">Request <span id="reqloader"></span></button>
            </div>
        </div>
    </div>
</div>