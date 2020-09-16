$(document).ready(function() {	
	
	/* $('#from_date').datepicker({ dateFormat: 'd-M-yy',changeMonth: true, changeYear: true });
	$('#to_date').datepicker({ dateFormat: 'd-M-yy',changeMonth: true, changeYear: true }); */

	var dateToday = new Date();
	
	//Datepicker Range
	/* var start = moment().subtract(29, 'days');
    var end = moment(); */

    function cb(start, end) {
		
		//$("#reportrange").show();				
		//$('#reportrange span').html(start.format('D/MMM/YYYY') + ' - ' + end.format('D/MMM/YYYY'));
		
		$('#date_val').val(start.format('D/MMM/YYYY') + ' - ' + end.format('D/MMM/YYYY'));
		
		if($('#date_val').val() == "Invalid date - Invalid date")
		{
			//$('#reportrange span').html('');
			$('#date_val').val('');
		}else{
			//$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			//$('#reportrange span').html(start.format('D/MMM/YYYY') + ' - ' + end.format('D/MMM/YYYY'));	
			$('#date_val').val(start.format('D/MMM/YYYY') + ' - ' + end.format('D/MMM/YYYY'));
		}		
    }
	
		
    $('#reportrange').daterangepicker({
		//timePicker: true,
        /* startDate: null,
        endDate: null, */
		opens: 'left',
		drops: 'down',
		showDropdowns: true,		
		locale: {
		  format: 'D-MMM-YYYY',
		  customRangeLabel: 'Date Range'
		},
		parentEl: '.dateEle',
        ranges: {
			'Till Date': [],
			/* 'Today': [moment(), moment()],
			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			'Last 30 Days': [moment().subtract(29, 'days'), moment()], */
			'This Month': [moment().startOf('month'), moment().endOf('month')],
			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
			'Last 6 Months': [moment().subtract(6, 'month').startOf('month'), moment().subtract(6, 'month').endOf('month')],
			"Last Year": [moment().subtract(1, "y").startOf("year"), moment().subtract(1, "y").endOf("year")]
        }
    }, cb);

    //cb(start, end);
	// End Datepicker Range

	$("#from_date").datepicker({
		dateFormat: 'dd-M-yy',
		//defaultDate: "+1w",		
		changeMonth: true,
		changeYear: true,
		//minDate: dateToday,		
		numberOfMonths: 1,
        onSelect: function (selected) {
			str = selected.split("-").join(" ");
            var dt = new Date(str);
            dt.setDate(dt.getDate() + 1);
            $("#to_date").datepicker("option", "minDate", dt);
			$(this).parent().parent('.sts_fil_blk').addClass('show');
			$(this).parent().parent().parent().children('.sts_pp').addClass('ad_tgl');
        }
    });
	
    $("#to_date").datepicker({
		dateFormat: 'dd-M-yy',
		//defaultDate: "+1w",
		changeMonth: true,
		changeYear: true,
		//minDate: dateToday,
        numberOfMonths: 1,
        onSelect: function (selected) {
			str = selected.split("-").join(" ");
            var dt = new Date(str);
            dt.setDate(dt.getDate() - 1);			
            $("#from_date").datepicker("option", "maxDate", dt);
			$(this).parent().parent('.sts_fil_blk').addClass('show');
			$(this).parent().parent().parent().children('.sts_pp').addClass('ad_tgl');
        }
    });
	
	$( "#skey" ).autocomplete({
		//source: url+"api/users/searchusers",
	  source: function( request, response ) {
			$('#selectuser_id').val('');
			$('#select_usercode').val('');
			$("#bank_opt_li").html('<div class="form-check"><input class="form-check-input" type="radio" name="bank_opt" id="tps_l" required /><label class="form-check-label" for="tps_l" /></label></div>');	
			$("#crop_opt_li").html('<div class="form-check"><input class="form-check-input" type="radio" name="crop_opt" id="crp" required /><label class="form-check-label" for="crp"></label></div>');	
			$(".cval").text('Crop location');
			$(".bval").text('Select User Bank');
	   // Fetch data
	   $.ajax({
		url: url+"api/users/searchusers",
		type: 'post',
		dataType: "json",
		data: {
		 search: request.term
		},
		success: function( data ) {  

			response( $.map( data, function( result ) {  

			return {  

			label: result.label,
			value: result.value,
			imgsrc: result.img,		
			user_id: result.user_id,
			usercode: result.usercode,
			user_type: result.user_type

			}  

			}));  

		}  
	   });
	  },
	  select: function (event, ui) {
	   // Set selection
	   if(ui.item.user_type == "NON_FARMER"){ $('input[name="crop_opt"]').removeAttr('required');
			$(".sel_loc").hide(); 
		}else{ $('input[name="crop_opt"]').prop('required',true); $(".sel_loc").show(); }   
		
	   $(".cval").text('Crop Loaction');
		$(".bval").text('Select User Bank'); 
	   $('#skey').val(ui.item.label); // display the selected text
	   $('#selectuser_id').val(ui.item.user_id); // save selected id to input
	   $('#select_usercode').val(ui.item.usercode); // save selected id to input
	   //return false;
	  }
	  
	 }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {  

           return $( "<li></li>" )  

               .data( "item.autocomplete", item )  

               .append( "<a>" + "<img style='width:25px;height:25px' src='" + item.imgsrc + "' /> " + item.label+ "</a>" )  

               .appendTo( ul );  

       }; 
	   
	   // Edit
	$( "#skey_edit" ).autocomplete({
		source: function( request, response ) {
			$('#selectuser_id_edit').val('');
			$('#select_usercode_edit').val('');
			
			$("#bank_opt_li_edit").html('<div class="form-check"><input class="form-check-input" type="radio" name="bank_opt_edit" id="tps_l" required /><label class="form-check-label" for="tps_l" /></label></div>');	
			$("#crop_opt_li_edit").html('<div class="form-check"><input class="form-check-input" type="radio" name="crop_opt_edit" id="crp" required /><label class="form-check-label" for="crp"></label></div>');	
			$(".crop_val").text('Crop location');
			$(".bank_val").text('Select User Bank');
		   // Fetch data
		   $.ajax({
			url: url+"api/users/searchusers",
			type: 'post',
			dataType: "json",
			data: {
			 search: request.term
			},
			success: function( data ) {  

			response( $.map( data, function( result ) {  

			return {  

				label: result.label,
				value: result.value,
				imgsrc: result.img,		
				user_id: result.user_id,
				usercode: result.usercode,
				user_type: result.user_type

				}  

			}));  

			}
	   });
	  },	 
	  select: function (event, ui) {
		// Set selection
		if(ui.item.user_type == "NON_FARMER"){ 
			$(".sel_loc_edit").hide(); 
			$("input[name='crop_opt_edit']").removeClass('required');
		}else{
		   $(".sel_loc_edit").show();
		   $("input[name='crop_opt_edit']").addClass('required');
		}
		
		$(".crop_val").text('Crop Loaction');
		$(".bank_val").text('Select User Bank');		
		$('#skey_edit').val(ui.item.label); // display the selected text
		$('#selectuser_id_edit').val(ui.item.user_id); // save selected id to input
		$('#select_usercode_edit').val(ui.item.usercode); // save selected id to input
		//return false;
		}
	}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {  

           return $( "<li></li>" )  

               .data( "item.autocomplete", item )  

               .append( "<a>" + "<img style='width:25px;height:25px' src='" + item.imgsrc + "' /> " + item.label+ "</a>" )  

               .appendTo( ul );  

       };
	
	//$( "#start_date" ).datepicker( "widget" );
	
	$("#start_date").datepicker({
		dateFormat: 'dd-M-yy',
		//defaultDate: "+1w",		
		changeMonth: true,
		changeYear: true,
		minDate: dateToday,		
		numberOfMonths: 1,
        onSelect: function (selected) {
			//event.stopPropagation();
			$("#start_date").parent().addClass('inp_ss');
			$("#start_date").removeClass('error');
			str = selected.split("-").join(" ");
            var dt = new Date(str);
            dt.setDate(dt.getDate() + 1);
            $("#end_date").datepicker("option", "minDate", dt);
        }
    });
	
    $("#end_date").datepicker({
		dateFormat: 'dd-M-yy',
		//defaultDate: "+1w",
		changeMonth: true,
		changeYear: true,
		minDate: dateToday,
        numberOfMonths: 1,
        onSelect: function (selected) {
			$("#end_date").parent().addClass('inp_ss');
			$("#end_date").removeClass('error');
			str = selected.split("-").join(" ");
            var dt = new Date(str);
            dt.setDate(dt.getDate() - 1);			
            $("#start_date").datepicker("option", "maxDate", dt);
        }
    });
	
	//$.validator.setDefaults({ ignore: ":hidden:not(select)" }) //for all select
	//OR for all select having class .chosen-select
	//$.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" });
	$.validator.setDefaults({ ignore: [] });	
	
	getadminbanks(); getaloantype(); getadminbankslist(); getaloantype_counts();
	//branchcash();
	
	/* $('#crop_opt').select2();
	$('#bank_opt').select2();
	$('#crop_opt_edit').select2();
	$('#bank_opt_edit').select2();  
	$('#admin_bank').select2();  
	$('#loan_type').select2(); */  
	
	//alert($("input[name='month_opt']:checked").val());	
	
	/* $("#crop_opt").val('');
	$("#bank_opt").val('');	 */
	
	/* $('#users_opt').multiselect({
		enableFiltering: true
	}); */
	
	
	$('#skey').blur(function(){
		//var usercode = $(this).val();		
		//var usercode = $("#select_usercode").val().trim();
		var user_id = $("#selectuser_id").val().trim();
		if(user_id != "")
		{
			getusercrops(user_id,'add');
			getuserbanks(user_id,'add');
			//alert($("input[name='act_types']:checked").val());
			
		}		
	});
	$('#skey_edit').blur(function(){
		//var usercode = $(this).val();		
		//var usercode = $("#select_usercode").val().trim();
		var user_id = $("#selectuser_id_edit").val().trim();
		if(user_id != "")
		{

				getusercrops(user_id,'edit');
				getuserbanks(user_id,'edit');
			
			
			
			setTimeout(function(){ 
			$("input[name='crop_opt_edit'][value='11']").prop('checked',false);
			$("input[name='bank_opt_edit'][value='11']").prop('checked',false);
			}, 500);
		}			
	});
	
	/* $('#loan_amt').keyup(function(){
		var loan_amt = $(this).val();		
		var amt_word = convertNumberToWords(loan_amt);
		$('.amon_text').html(amt_word);
	}); */

    $('.lnk_typ.ban_trns').click(function(){
		
        $(this).addClass('act_type');
        $(this).siblings('.cash_trns').removeClass('act_type');
        //$(this).parent().siblings('.ove_auto').find('.lon_typ').removeClass('hide_blk');
		//$('#bank_opt').attr('required','true');		
		$("input[name='bank_opt']").attr('required','required');
		$("input[name='act_types']:checked").val('bank');		
		$(".lon_typ").show();
		
    });
    $('.lnk_typ.cash_trns').click(function(){
        $(this).addClass('act_type');
        $(this).siblings('.ban_trns').removeClass('act_type');
        //$(this).parent().siblings('.ove_auto').find('.lon_typ').addClass('hide_blk');
		$("input[name='act_types']:checked").val('cash');		
		$("input[name='bank_opt']").removeAttr('required');		
		//$('#bank_opt').removeAttr('required');		
		$(".lon_typ").hide();	
		
    });
	 
	$('.lnk_typ.ban_trns_edit').click(function(){		
        $(this).addClass('act_type');
        $(this).siblings('.cash_trns_edit').removeClass('act_type');		
		//$('#bank_opt_edit').addClass('required');
		//$("input[name='bank_opt_edit']").addClass('required');
		$("input[name='admin_bank']").addClass('required');
		$("input[name='act_types_edit']:checked").val('bank');
		$(".lon_typ_edit").show();		
		$(".adm_bn_ls").show();		
    });
    $('.lnk_typ.cash_trns_edit').click(function(){
        $(this).addClass('act_type');
        $(this).siblings('.ban_trns_edit').removeClass('act_type');		
		$("input[name='act_types_edit']:checked").val('cash');
		//$('#bank_opt_edit').removeClass('required');
		$("input[name='bank_opt_edit']").removeClass('required');
		$("input[name='admin_bank']").removeClass('required');
		$(".lon_typ_edit").hide();
		$(".adm_bn_ls").hide();		
    });
	
	
	//DataTable
	
	var tables = $('#loan_lst_tbl_pend').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		"ordering": false,
		   language: {
			searchPlaceholder: "Search by Username / Location / Loan amount",
			search: "",
			"dom": '<"toolbar">frtip'
			},
		"columnDefs": [/* {
				'targets': [0,1,3,4,5,7,9], // column index (start from 0)
				'orderable': false, // set orderable false for selected columns
			 }, */
			{ className: "tbl_check", "targets": 0 },
			{ className: "id_td", "targets": 1 },
			{ className: "app_date", "targets": 2 },
			{ className: "usr_dtl", "targets": 3 },
			{ className: "tran_type", "targets": 5 },
			{ className: "loan_type_td", "targets": 6 },
			{ className: "loan_amnt", "targets": 7 },
			{ className: "txt_cnt stat_blk", "targets": 8 },
			{ className: "act_ms", "targets": 9 }			
		  ],
		//"order": [[ 3, 'desc' ], [ 0, 'asc' ]],
		//"order": [[ 1, 'desc' ]],
		'ajax': {
		   'url':url+'api/loans/getloans',
		   'data': function(data){
			  // Read values
				var multi_status = [];
				$.each($("input[name='status_opt']:checked"), function(){
					multi_status.push($(this).val());
				});
				
				var month_opt = $("input[name='month_opt']:checked").val();
				var trans_opt = $("input[name='trans_opt']:checked").val();
				var loan_opt = $("input[name='loan_opt']:checked").val();
				//var reportrange = $('#reportrange span').html();
				var reportrange = $('#date_val').val();
				var from_date = $("#from_date").val();
				var to_date = $("#to_date").val();
				var tabval = $("#hid_tabval").val();
				var status_opt = multi_status;
				
				// Append to data
				data.month_opt = month_opt;
				data.reportrange = reportrange;
				data.from_date = from_date;
				data.to_date = to_date;
				data.trans_opt = trans_opt;
				data.loan_opt = loan_opt;
				data.tabval = tabval;
				data.status_opt = status_opt;
		   },
		   "dataSrc": function (json) {		   
			
			//alert($("#hid_tabval").val());
			  
			  var totcompleted = +json.approved+ +json.rejected;			   
			  //var tot_amt = +json.approved+ +json.rejected;			   
			  $(".pending_amt").html('₹'+addCommas(json.pending_amt));
			  //$(".tot_amt").html('₹'+addCommas(json.pending_amt));
			  $(".tot_amt").html('₹'+addCommas(json.tot_amt));
			  $("#draft_count").html('Draft List ('+json.pending+')');
			  $("#except_pending").html('Completed List ('+totcompleted+')');
			  //$(".tot_loans").html('Loans('+json.tot_rec+')');
			  $(".tot_loans").html('Loans('+json.approved+')');
			  $(".pending_count").html(json.pending);
			  $(".approved_count").html(json.approved);
			  $(".rejected_count").html(json.rejected);
			  
			  
				setInterval(function(){ 
					if($("#hid_tabval").val() == 1){
						$('.tbl_check').hide();
						$('.usr_sub_dtl').hide();
						$('.acrs_td').hide();
					}else{
						$('.tbl_check').show();
						$('.usr_sub_dtl').show();
						$('.acrs_td').show();
					}
					$('.act_icns').popover({
						html: true,
						content: function() {
						  return $('#popover-contents').html();
						}
					}); 
				}, 500);
			 
				return json.data;
				
			},		
			'columns': [
			   { data: '' }, 
			   { data: 'loan_id' }, 
			   { data: 'loan_status_date' },
			   { data: 'user_id' },
			   { data: 'crop_id' },
			   { data: 'transfer_type' },
			   { data: 'loan_type' },
			   { data: 'loan_amt' },
			   { data: '' },
			   { data: '' },
			]
		}
	});
	
	$("input[name='month_opt']").on('click',function() {
		
		var date_val = $("input[name='month_opt']:checked").val();
		if(date_val == "custom"){ $(".cdate").show(); }
		else{ $(".cdate").hide(); tables.draw(); }
		
	});	
	
	$(".ranges ul li ").mouseup(function(){
		
		$(this).parent().children().removeClass('active');
		$(this).addClass('active');
		$('.drp-selected').css('font-weight','bold');
		if($(this).text() == "Till Date")
		{
			setTimeout(function(){ 
				$("#date_val").val('Till Date');
			}, 500);
			
		}
		
		if($(this).text() != "Date Range")
		{
			setTimeout(function(){ 
				tables.draw();
			}, 500);
		}
		
		
	});
	$(".applyBtn").on("click",function(){
		
		setTimeout(function(){ 
			tables.draw();			
		}, 500);
		
	});
	
	$("#custom_date").click(function(){		
	
		tables.draw();
	});
	$("#from_date").change(function(e){		
	
		e.stopPropagation()
	});
	
	$("input[name='trans_opt']").on('click',function() {
		tables.draw();
	});
	
	$("input[name='loan_opt']").on('click',function() {
		tables.draw();
	});
	
	$("input[name='status_opt']").on('click',function() {		
		tables.draw();
	});
	
	tables.columns( [ 2, 6, 8 ] ).visible( false, false, false );
	tables.columns.adjust().draw( false );
	
	
	//Add Loan Form submit
	$("#loanfrm").submit(function(e) {			
		//e.preventDefault();
		
	}).validate({
		//ignore: [],
		
		/* errorElement : 'div',
		errorLabelContainer: '.errorTxt', */
		submitHandler: function(form) 
		{	
			formData = new FormData(form);		
			
			$.ajax({
				url: url+"api/loans/add",
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
							text: "Loan created successfully!",
							type: 'success',
							shadow: true
						});
						
						//setInterval('location.reload()', 2000);
						$("#loanfrm")[0].reset();
						$(".cval").text('Crop Loaction');
						$("#crop_opt_li").html("");
						$(".bval").text('Select User Bank');
						$("#bank_opt_li").html("");
						tables.ajax.reload();
													
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
		}
	});

	// $('.lons_hdg_blk').click(function(){
	//       $('.lns_sub_blk').toggleClass('show_blk');
	//     });
	
	$(".updt_btn").click(function(){	
		
		if($("input[name='act_types_edit']:checked").val() == 'bank')
		{ $("input[name='bank_opt_edit']").addClass('required'); }else{ $("#bank_opt_edit").removeClass('required'); }
	
		$("input[name='admin_bank']").removeClass('required');
		$("input[name='loan_type']").removeClass('required');		
		$("#start_date").removeClass('required');		
		$("#end_date").removeClass('required');
		//$("#roi").removeClass('required');
		$("#hid_appove").val(0);
		//$('#loanfrm_edit').submit();
	});
	
	//Edit Loan Form submit
	$("#loanfrm_edit").submit(function(e) {			
		e.preventDefault();
		
	}).validate({
		rules:{
			
			skey_edit:
			{
				required: true
			},
			/* crop_opt_edit:
			{
				required: true
			},
			bank_opt_edit:
			{
				required: true
			},	 */		
			loan_amt_commas_edit:{
				required: true,
				//maxlength:8	
			},
			/* loan_amt_edit:{
				required: true,
				number: true,
				//decimal: true,
				min: 1,
				max: 999999,
				minlength:1,
				maxlength:6				
			}, */
			//end_date: { greaterThan: "#start_date" }
		},
		messages: {
			skey_edit:
			{
				required: "Please select user"
			},
			crop_opt_edit:
			{
				required: "Please select crop"
			},
			bank_opt_edit:
			{
				required: "Please select bank"
			},
			loan_amt_commas_edit:
			{
				required: "Please enter loan amount"
			}
		},
		/* errorElement : 'div',
		errorLabelContainer: '.errorTxt', */
		submitHandler: function(form) 
		{
			if($("#hid_chkbal").val() == 1)
			{
				
				new PNotify({
					title: 'Error',
					text: "Insufficient Balance, please select another admin bank!",
					type: 'failure',
					shadow: true
				});
				return false;					
			}
			formData = new FormData(form);			
			/* formData.append('hid_lid', $("#hid_lid").val());
			formData.append('hid_crop_id', $("#hid_crop_id").val());
			formData.append('hid_bank_id', $("#hid_bank_id").val()); */
			
			$.ajax({
				url: url+"api/loans/update",
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
							text: "Loan updated successfully!",
							type: 'success',
							shadow: true
						});
						
						//setInterval('location.reload()', 2000);
						//tables.draw();
						$('#apr_loan').modal("toggle");
						tables.ajax.reload();
													
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
		}
	});
	
	// Apporve 
	$(".approv_btn").click(function(){
		
		if($("input[name='act_types_edit']:checked").val() == 'bank')
		{
			$("input[name='bank_opt_edit']").addClass('required');
			$("input[name='admin_bank']").addClass('required'); 
		}else{
			$("input[name='bank_opt_edit']").removeClass('required');
			$("input[name='admin_bank']").removeClass('required'); 
		}
		$("input[name='loan_type']").addClass('required');
		/* $( "input[name='admin_bank']" ).addClass('required');
		$( "input[name='loan_type']" ).addClass('required');	 */	
		$("#start_date").addClass('required');
		
		$("#hid_appove").val(1);
		$('#loanfrm_edit').submit();
	});
	
	
	$('.rej_btn').click(function(){
		//alert($("#hid_lid").val());
		$.ajax({		
			url: url+"api/loans/reject",
			data: {lid : $("#hid_lid").val()},
			type:'POST',		
			datatype:'json',
			success : function(response){
				
				//alert(response);
				res= JSON.parse(response);		
				
				if(res.status == 'success')
				{	
					new PNotify({
						title: 'Success',
						text: "Loan rejected successfully!",
						type: 'success',
						shadow: true
					});												
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

	 $('.stat_Reg, .bnk_dl_li').popover({
	  trigger: 'focus'
	});

    /* var tables = $('#loan_lst_tbl_pend').DataTable({
      "ordering": false,
       language: {
        searchPlaceholder: "Search Loan Details",
        search: "",
        "dom": '<"toolbar">frtip'
		}
	}); */	
		
    $('.edt_bl_lnk').click(function(){		
		
        $('.app_pop_tbl').toggleClass('disb_sel');
        $('.ds_as_type').toggleClass('show_blk');		
		var x = document.getElementById("myDIV");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
    });   

    $('.reject_tr').click(function(){
      $(this).addClass('bdr_t_1');
      $('.rej_list').toggleClass('hide_blk');
      $('.cmp_list').addClass('hide_blk');
    });
    $('.comp_blk_tr').click(function(){
      $('.reject_tr').removeClass('bdr_t_1');
      $('.cmp_list').toggleClass('hide_blk');
      $('.rej_list').addClass('hide_blk');
    });

	$('#loan_lst_tbl_pend_wrapper .dataTables_length').html('<ul class="tabs_tbl"><li class="act_tab drft_cl"> <span id="draft_count">Draft list (0)</span> </li><li class="comp_cl"> <span id="except_pending">Completed list (0) </span> </li></ul> <span class="tbl_btn">  </span>');
	// <a href="#" class="appr_all"> Approve All </a>
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

    $('.act_icn').popover({
		html: true,
		content: function() {
		  return $('#popover-content').html();
		}
	});

    $('.tbl_check').popover({	
		html: true,
		content: function() {
			
			if($(".pending_count").html() > 0)
			{
				$(".sel_users_num").html($(".pending_count").html());
				$(".tot_pend_amt").html($(".pending_amt").html());
				return $('#popover-tbl').html();
			}
			else
			{				
				return "No Draft list";
			}
		}

	});
	

	$('.comp_cl').click(function(){			
		
		$("#hid_tabval").val(1);
		$('.tabs_tbl').addClass('cmp_ul');
		$(this).addClass('act_tab');
		$('.drft_cl').removeClass('act_tab');		
		//$(row).addClass("label-warning");
		//$('tr').addClass('rej_list');
		//$('tr').removeClass('cmp_list');
		tables.columns( [ 0, 9 ] ).visible( false, false );
		tables.columns( [ 1, 2, 3, 4, 5, 6, 7, 8 ] ).visible( true, true, true, true, true, true, true, true );
		tables.columns.adjust().draw( false );
		tables.ajax.reload();
		 /* setTimeout(function(){ 
		
			//$('.tbl_check').hide();
			//$('.usr_sub_dtl').hide();
			//$('.acrs_td').hide();
			$('.tbl_check, .usr_sub_dtl, .acrs_td').addClass('hide_blk');
			$('.drft_cl').removeClass('act_tab');
			$('.stat_blk').removeClass('hide_blk');
			$('.app_date').removeClass('hide_blk');
			$('.tbl_btn').addClass('hide_blk');
			$('.act_ms').addClass('hide_blk');
			$('.comp_blk_tr, .reject_tr').removeClass('hide_blk');
			$('.loan_type_td').removeClass('hide_blk');
					
		}, 100); */
		
		
		
	});
	$('.drft_cl').click(function(){
		
		$("#hid_tabval").val(0);				
		$('.tabs_tbl').removeClass('cmp_ul');
		$(this).addClass('act_tab');
		$('.comp_cl').removeClass('act_tab');
		//$('tr').addClass('cmp_list');
		//$('tr').removeClass('rej_list');
		tables.columns( [ 2, 6, 8 ] ).visible( false, false, false );
		tables.columns( [ 0, 1, 3, 4, 5, 7, 9 ] ).visible( true, true, true, true, true, true, true );  
		tables.columns.adjust().draw( false );
		tables.ajax.reload();
		//$('.check_list').removeAttr('disabled');
		
		 /* setTimeout(function(){ 
			
			//$('.tbl_check, .usr_sub_dtl, .acrs_td').show();
			$('.tbl_check, .usr_sub_dtl, .acrs_td').removeClass('hide_blk');
			$('.loan_type_td').addClass('hide_blk');        
			$('.stat_blk').addClass('hide_blk');
			$('.app_date').addClass('hide_blk');
			$('.act_ms').removeClass('hide_blk');
			$('.rej_list, .tbl_btn').removeClass('hide_blk');
			$('.cmp_list').removeClass('hide_blk');
			$('.comp_blk_tr, .reject_tr').addClass('hide_blk');
					
		}, 100); */
		
	});

	$('.bnk_icn').click(function(){
		$('.bnk_ll_blk').toggleClass('show_blk');
		$('.create_loan_module').toggleClass('show_blk');
		$('.loan_create .fa-university, .loan_create .fa-times').toggleClass('show_blk');
		var swiper = new Swiper('.swiper-container', {
			pagination: {
			el: '.swiper-pagination',
			dynamicBullets: true,
			},
		});

	});
	$('.amnt input, .ln_amn_blk input').popover();
	$('.actvty .anlat_bb').popover({
		html: true,
		content: function() {
			return $('#popover-ana').html();
		}
	});

	$('.crt_link').click(function(){
		$('.trade_create').toggleClass('sh_trade_create');
		$('.trd_cr_r').toggleClass('trd_cr_r_r');
		$(this).find('.btn').toggleClass('hide_blk');
		$('.cl_crt_bl').toggleClass('hide_blk');
		// $(this).toggleClass('crt_link');
	});
	
	$("#admin_bank_li").on("change",function() {

		bankBalCheck();
		
		setTimeout(function(){
		  
			if($("#hid_chkbal").val() == 1)
			{			
				new PNotify({
					title: 'Error',
					text: "Insufficient Balance, please select another admin bank!",
					type: 'failure',
					shadow: true
				});
				return false;					
			}
		  
		}, 500);
	
		
	});
	
	$('#loan_amt_commas_edit').keyup(function(){
		
		bankBalCheck();
		setTimeout(function(){
		  
			if($("#hid_chkbal").val() == 1)
			{			
				new PNotify({
					title: 'Error',
					text: "Insufficient Balance, please select another admin bank!",
					type: 'failure',
					shadow: true
				});
				return false;					
			}
		  
		}, 500);
	});

	$(document).on("click", ".edt , .vw", function() {
	   $('#apr_loan').modal();
	});

	$(document).on("click", ".appr_all", function() {
	   $('#apr_loans').modal();
	});
	
	// $(document).on("click", ".reject_loan", function() {
	//   // alert('ss');
	//    $('#rej_loan').modal();

	// });

	$(document).on("click", ".del", function() {
	  // alert('ss');
	   $('#delete_loan').modal();
	});
	
	$(".del_yes").click(function(){
			
		var delval = $("#hid_lid").val();
		$.ajax({		
			url: url+"api/loans/delete",
			data: {lid:delval},
			type:'POST',		
			datatype:'json',
			success : function(response){				
				
				res= JSON.parse(response);			
				
				if(res.status == 'success')
				{	
					new PNotify({
						title: 'Success',
						text: "Loan deleted successfully!",
						type: 'success',
						shadow: true
					});	
					//var dataTable = $('#brd_lst_tbl').DataTable();
					tables.ajax.reload();
				}				
			}
		});
	});
});
function edit_loan(lid,lstatus)
{	
	$("#loanfrm_edit")[0].reset();
	$('.app_pop_tbl').addClass('disb_sel');
    $('.ds_as_type').addClass('show_blk');
    $('#myDIV').hide();
	
	if(lstatus != 0 ){ 
	
		$(".pop_footer").hide(); $('.edt_bl_lnk').hide();
		$('#loanfrm_edit').find('input').attr('disabled','disabled');

		//To enable 
		//$('.check_list').removeAttr('disabled');

		// OR you can set attr to "" 
		$('.check_list').attr('disabled', 'disabled');
		//$('.check_list').addAttr('disabled');
	}else if(lstatus == 0 ){
		
		$(".pop_footer").show(); $('.edt_bl_lnk').show();
		$('.check_list').removeAttr('disabled');		
		$('#loanfrm_edit').find('input').removeAttr('disabled');
	}
	$("#hid_lid").val(lid);
	$.ajax({		
		//url: url+"api/loans/index/"+lid,
		url: url+"api/loans/loandetails/"+lid,
		data: {},
		type:'POST',		
		datatype:'json',
		success : function(response){
			
			//alert(response);
			res= JSON.parse(response);
			
			//alert(res.data.transfer_type);
			//$('input[name="bank_opt_edit"][value="11"]').prop('checked', true);
			
			setTimeout(function(){ 

				getuserbanks(res.data.user_id,"edit");
				getusercrops(res.data.user_id,"edit");			
				amount_with_commas("edit");
			
			}, 500);
				
			if(res.data.transfer_type == "bank")
			{
				$('.lnk_typ.ban_trns_edit').addClass('act_type');
				$('.lnk_typ.cash_trns_edit').removeClass('act_type');
				$('#bank_opt_edit').addClass('required');
				$('.lon_typ_edit').show();
				$('.adm_bn_ls').show();
				
			}else{
				$('.lnk_typ.ban_trns_edit').removeClass('act_type');
				$('.lnk_typ.cash_trns_edit').addClass('act_type');
				$('#bank_opt_edit').removeClass('required');
				$('.lon_typ_edit').hide();				
				$('.adm_bn_ls').hide();				
			}
			if(res.data.user_type == "NON_FARMER"){ 
				$('.sel_loc_edit').hide(); $("input[name='crop_opt_edit']").removeClass('required');
			}else{ 
				$('.sel_loc_edit').show(); $("input[name='crop_opt_edit']").addClass('required');
			}
			//$(".cre_inp").addClass('inp_ss');
			$("#loanfrm_edit").find(".cre_inp").addClass('inp_ss');
			$("input[name='act_types_edit']:checked").val(res.data.transfer_type);		
			$("#skey_edit").val(res.data.user_name);
			$("#act_types_edit").val(res.data.transfer_type);
			$("#loan_amt_commas_edit").val(res.data.loan_amt);
			$("#loan_amt_edit").val(res.data.loan_amt);
			$("#hid_crop_id").val(res.data.crop_id);
			$("#hid_bank_id").val(res.data.user_bank_id);
			$("#selectuser_id_edit").val(res.data.user_id);
			$("#select_usercode_edit").val(res.data.user_code);
			$("#rema_narr").val(res.data.narration);
			
			if(res.data.crop_location == null){
				
				$(".crop_val").text('Crop Loaction');			
				$("input[name='crop_opt_edit'][value='"+res.data.crop_id+"']").prop('checked', false);
				
			}else{
				
				$(".crop_val").text(res.data.crop_location); 
				$("input[name='crop_opt_edit'][value='"+res.data.crop_id+"']").prop('checked', true);
			}
			
			if(res.data.user_acc_no == null){ 
			
				$(".bank_val").text('Select User Bank');				
				$('input[name="bank_opt_edit"][value="' + res.data.user_bank_id + '"]').prop('checked',false);		
				
			}else{	
				
				$(".bank_val").text(res.data.user_acc_no);
				$('input[name="bank_opt_edit"][value="' + res.data.user_bank_id + '"]').prop('checked',true);
			}
			
			if(res.data.account_no == null){
				$(".admin_bank_val").text('Select Admin Bank'); 
				$('input[name="admin_bank"][value="'+res.data.admin_bank+'"]').prop('checked', false);
			}else{ 
				$(".admin_bank_val").text(res.data.account_no);				
				$('input[name="admin_bank"][value="'+res.data.admin_bank+'"]').prop('checked', true);
			}
			
			if(res.data.loan_type == null){ 
				$(".loan_type_val").text('Select Loan Type');
				$("input[name='loan_type'][value='"+res.data.loan_type+"']").prop('checked', false);
				
			}else{ 
				$(".loan_type_val").text(res.data.loan_type_name); 
				$("input[name='loan_type'][value='"+res.data.loan_type+"']").prop('checked', true);	
				//$("input[name='loan_type']:checked").val(res.data.loan_type);
			}
			
			//$('#crop_opt_edit radio:eq('+res.data.crop_id+')').attr('checked', true);
			
			$("#hid_acivity_id").val(res.data.la_id);
			
			/* $("#start_date").val(res.data.start_date);
			$("#end_date").val(res.data.end_date); */
				
			if(res.data.start_date != null && res.data.start_date != "0000-00-00")
			{
				var new_start_date = new Date(res.data.start_date);
				$("#start_date").datepicker({
					dateFormat: 'd-M-yy',
				}).datepicker('setDate', new_start_date);
			}else{
				
				var new_start_date = new Date();
				$("#start_date").datepicker({
					dateFormat: 'd-M-yy',
				}).datepicker('setDate', new_start_date);
			}
			
			if(res.data.end_date != null && res.data.end_date != "0000-00-00")
			{
				var new_end_date = new Date(res.data.end_date);
				$("#end_date").datepicker({
					dateFormat: 'd-M-yy'
				}).datepicker('setDate', new_end_date);
			}			
			
			$("#roi").val(res.data.rate_of_interest);			
			$("#ref_no").val(res.data.ref_no);			
			/* $('#admin_bank option:eq('+res.data.admin_bank+')').attr('selected', true);
			$('#loan_type option:eq('+res.data.loan_type+')').attr('selected', true);
			$('#admin_bank').select2();
			$('#loan_type').select2(); */		
		}
	});
}
function DateFormat_Change(date_val)
{
	var date    = new Date(date_val),
	yr      = date.getFullYear(),
	month   = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth(),
	day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
	newDate = day + '/' + month + '/' + yr;
	return newDate;
}
function loan_upd(lid,lstatus)
{
	edit_loan(lid,lstatus);
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
			var user_id = $('#selectuser_id'+aeval).val();
			var sel = "";
			if(user_id != "")
			{
				//var opt = '<option value="">-- Select Crop --</option>';
				var opt = '<div class="form-check"><input class="form-check-input" type="radio" name="crop_opt'+aeval+'" id="crp'+aeval+'" /><label class="form-check-label" for="crp'+aeval+'"></label></div>';;
				if(res.data.length > 0)
				{
					opt = '';
					$.each(res.data, function(index, crop) {
						//if(crop.id == hidcrop){ sel = "selected"; }else{ sel = "";}
						if(crop.cd_id == hidcrop){ sel = "checked"; }else{ sel = "";}
						//sel = "";
						//opt += '<option value="'+crop.id+'" '+sel+' >'+crop.crop_loc+'</option>';
						opt += '<div class="form-check"><input class="form-check-input" type="radio" name="crop_opt'+aeval+'" id="crp'+index+aeval+'" value="'+crop.cd_id+'" '+sel+' required /><label class="form-check-label" for="crp'+index+aeval+'">'+crop.crop_location+'</label></div>';
					});
				}
			}else{
				//var opt = '<option value="">-- Select user first --</option>';
				var opt = '';
			}
			//$(".crop_val").text('Crop Loaction');
			$("#crop_opt_li"+aeval).html(opt);
			//$("#crop_opt"+aeval).select2('refresh');
			//document.getElementById("crop_opt"+aeval).fstdropdown.rebind();
		}
	});
}

function getuserbanks(user_id,addoredit)
{
	var aeval = hidbank = req = "";
	if(addoredit == "add"){ 
	
		if($("input[name='act_types']:checked").val() == "cash"){  req = ""; }else{ req = "required"; }
	}
	if(addoredit == "edit"){ 
	
		if($("input[name='act_types_edit']:checked").val() == "cash"){  req = ""; }else{ req = "required"; }
		aeval = "_edit"; hidbank = $("#hid_bank_id").val(); 
	}
	$.ajax({		
		url: url+"api/UserBanks/index/"+user_id,
		data: {},
		type:'POST',		
		datatype:'json',
		success : function(response){
			
			//alert(response);
			res= JSON.parse(response);				
			//alert(res.data.length);
			
			//var usercode = $('#select_usercode'+aeval).val().trim();
			var user_id = $('#selectuser_id'+aeval).val().trim();
			var sel = "";
			if(user_id != "")
			{
				//var opt = '<option value=""> Select Bank </option>';
				var opt = '<div class="form-check"><input class="form-check-input" type="radio" name="bank_opt'+aeval+'" id="tps_l'+aeval+'" /><label class="form-check-label" for="tps_l'+aeval+'"><div class="bank_logo"></div><div class="bank_mny"><div class="bank_bal"></div></div></label></div>';
				if(res.data.length > 0)
				{
					var opt = "";
					$.each(res.data, function(index, bank) {
						if(bank.bank_name == "SBI"){  bank_icn = 'sib_icn.png'; }
						else if(bank.bank_name == "HDFC"){  bank_icn = 'hdfc_icn.png'; }
						else if(bank.bank_name == "ICICI"){  bank_icn = 'icici_icn.png'; }
					
						//if(bank.id == hidbank){ sel = "selected"; }else{ sel = "";}
						if(bank.acc_id == hidbank){ sel = "checked"; }else{ sel = "";}
						//opt += '<option value="'+bank.id+'" '+sel+' >'+bank.bank_name+' - '+bank.ac_number+'</option>';
						//sel = "";
						
						opt += '<div class="form-check"><input class="form-check-input" type="radio" name="bank_opt'+aeval+'" id="tps_l'+index+aeval+'" value="'+bank.acc_id+'" '+sel+' '+req+' /><label class="form-check-label" for="tps_l'+index+aeval+'"><div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/'+bank_icn+'" alt="" title="">  </div><div class="bank_mny"><div class="bank_bal"> '+bank.account_no+' </div></div></label></div>';
					});
				}
			}
			else{
				//var opt = '<option value=""> Select user first </option>';
				var opt = '';
			}
			//$(".bank_val").text('Select User Bank');			
			$("#bank_opt_li"+aeval).html(opt);			
			//document.getElementById("bank_opt"+aeval).fstdropdown.rebind();
		}
	});
}
function branchcash()
{
	$.ajax({		
		url: url+"api/Branch/byuser",
		data: {},
		type:'POST',		
		datatype:'json',
		success : function(response){
			res= JSON.parse(response);
			$("#branch_cash").text('₹ '+addCommas(res.data.amount));
		}
	});
	//return addCommas('21000');
}
function getadminbankslist()
{
	$.ajax({		
		url: url+"api/Banks",
		data: {},
		type:'POST',		
		datatype:'json',
		success : function(response){
			
			//alert(response);
			res= JSON.parse(response);				
			//alert(res.data.length);
			var bcash = 0;
			bcash = branchcash();
			var opt = '<li><div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/cash_account.png" alt="" title=""> </div>     <div class="bank_mny"><div class="bank_bal" id="branch_cash"> ₹ 0 </div><div class="accont_numb">Cash Account</div></div></li>';
			if(res.data.length > 0)
			{
				var bank_icn = "";
				$.each(res.data, function(index, bank) {
					
					if(bank.bank_name == "SBI"){  bank_icn = 'sib_icn.png'; }
					else if(bank.bank_name == "HDFC"){  bank_icn = 'hdfc_icn.png'; }
					else if(bank.bank_name == "ICICI"){  bank_icn = 'icici_icn.png'; }
					opt += '<li><div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/'+bank_icn+'" alt="" title=""> </div><div class="bank_mny"><div class="bank_bal"> ₹ '+addCommas(bank.avail_amount)+' </div><div class="accont_numb">'+bank.account_no+'</div></div></li>';
				});
			}
			$(".admin_bank_val").text('Select Admin Bank');
			$(".bank_lst_blk").html(opt);			
			//document.getElementById("admin_bank").fstdropdown.rebind();
		}
	});
}
function getadminbanks()
{
	$.ajax({		
		url: url+"api/Banks",
		data: {},
		type:'POST',		
		datatype:'json',
		success : function(response){
			
			//alert(response);
			res= JSON.parse(response);				
			//alert(res.data.length);
			
			//var usercode = $('#selectuser_id').val().trim();
			
			//var opt = '<option value="">-- Select Admin Bank --</option>';
			var opt = '';
			if(res.data.length > 0)
			{
				$.each(res.data, function(index, bank) {
					
					if(bank.bank_name == "SBI"){  bank_icn = 'sib_icn.png'; }
					else if(bank.bank_name == "HDFC"){  bank_icn = 'hdfc_icn.png'; }
					else if(bank.bank_name == "ICICI"){  bank_icn = 'icici_icn.png'; }
					
					//opt += '<option value="'+bank.bank_id+'">'+bank.bank_name+' - '+bank.account_no+'</option>';
					opt += '<div class="form-check"><input class="form-check-input" type="radio" name="admin_bank" id="bnk'+index+'" value="'+bank.bank_id+'"><label  class="form-check-label" for="bnk'+index+'"><div class="bank_logo"> <img src="http://3.7.44.132/aquacredit/assets/images/'+bank_icn+'" alt="" title=""> </div><div class="bank_mny"><div class="bank_bal"> ₹ '+addCommas(bank.avail_amount)+' </div><div class="accont_numb">'+bank.account_no+'</div></div></label></div>';
				});
			}
			$(".admin_bank_val").text('Select Admin Bank');
			$("#admin_bank_li").html(opt);			
			//document.getElementById("admin_bank").fstdropdown.rebind();
		}
	});
}

function getaloantype_counts()
{
	$.ajax({		
		url: url+"api/LoanTypes",
		data: {},
		type:'POST',		
		datatype:'json',
		success : function(response){
			
			//alert(response);
			res= JSON.parse(response);
			
			var ltype_opt = '';
			if(res.data.length > 0)
			{
				$.each(res.data, function(index, loan) {	
					
					ltype_opt += '<li class="list-group-item">'+loan.loan_type+' (<span class="blue_text">0</span>)</li>';
				});
			}			
			$(".loan_type_pop").html(ltype_opt);		
		}
	});
}

function getaloantype()
{	
	$.ajax({		
		url: url+"api/LoanTypes",
		data: {},
		type:'POST',		
		datatype:'json',
		success : function(response){
			
			
			res= JSON.parse(response);
			
			//var opt = '<option value="">-- Select Loan Type --</option>';
			var opt = '';
			if(res.data.length > 0)
			{
				$.each(res.data, function(index, loan) {
					
					//opt += '<option value="'+loan.loan_type_id+'">'+loan.loan_type+'</option>';
					opt += '<div class="form-check"><input class="form-check-input" type="radio" name="loan_type" id="nl'+index+'" value="'+loan.loan_type_id+'"><label class="form-check-label" for="nl'+index+'">'+loan.loan_type+'</label></div>';
				});
			}
			//$(".loan_type_val").text('Select Loan Type');
			$("#loan_type_li").html(opt);
			
		}
	});
}
function amount_with_commas(addoredit)
{
	//alert($('input[type=radio][name=crop_opt]:checked').val());
	var aeval = "";
	if(addoredit == "edit"){ aeval = "_edit";}
	var textbox = '#loan_amt_commas'+aeval;
	var hidden = '#loan_amt'+aeval;

	//$(textbox).keyup(function () {
	  
	var num = $(textbox).val();
	var comma = /,/g;
	num = num.replace(comma,'');
	$(hidden).val(num);
	var numCommas = addCommas(num);
	$(textbox).val(numCommas);
	var amt_word = convertNumberToWords(num);
	if(amt_word != undefined){
		$('.amon_text'+aeval).html(amt_word);
	}
  //});
}
function typeindividual(str)
{
	$.ajax({		
		url: url+"api/LoanTypes/counts",
		data: { ltype : str },
		type:'POST',		
		datatype:'json',
		success : function(response){
			
			//alert(response);
			res= JSON.parse(response);
			
			var ltype_opt = eachcount = ''; 
			if(res.data.length > 0)
			{
				$.each(res.data, function(index, loan) {	
					
					if(loan.counts == null){ eachcount = 0; }else{ eachcount = loan.counts; }
					if(str == "pamt" || str == "pcount"){
						if(loan.status == 0){
							eachcount = loan.counts;
						}else{
							eachcount = 0;
						}
					}else if(str == "ramt"){
						
							eachcount = 0;
							
					}else if(str == "acount"){
						
						if(loan.status == 1){
							eachcount = loan.counts;
						}else{
							eachcount = 0;
						}
					}else if(str == "rcount"){
						
						if(loan.status == 2){
							eachcount = loan.counts;
						}else{
							eachcount = 0;
						}
					}
					ltype_opt += '<li class="list-group-item">'+loan.loan_type+' (<span class="blue_text">'+eachcount+'</span>)</li>';
				});
			}			
			$(".loan_type_pop").html(ltype_opt);	
			
		}
	});
}
function bankBalCheck()
{
	var req_amt = $("#loan_amt_edit").val();
	var bank_id = $("input[name='admin_bank']:checked").val();
	
	if(bank_id != undefined ){		
		$.ajax({		
			url: url+"api/banks/check_balance",
			data: {bank_id : bank_id},
			type:'POST',		
			datatype:'json',
			success : function(response){
				
				//alert(response);
				res= JSON.parse(response);	
				
				//alert(req_amt+'-'+res.data.avail_amount);
				if(res.data != null)
				{
					if(+req_amt > +res.data.avail_amount)
					{
						$("#hid_chkbal").val(1);
					}else{
						$("#hid_chkbal").val(0);
					}
				}
			}
		});
	}
	
}
function stopPropagation(evt) {
    if (evt.stopPropagation !== undefined) {
        evt.stopPropagation();
    } else {
        evt.cancelBubble = true;
    }
}