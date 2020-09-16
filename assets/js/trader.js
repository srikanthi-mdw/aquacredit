$(document).ready(function() {

    /*jQuery.validator.addMethod("checkMobile1", function(value, element) {
        response1 = null;
        if ($("#hid_td_id").val() != "") {
            trader_id = $("#hid_td_id").val();
            url1 = url + "api/traders/checkmobile/" + trader_id;
        } else {
            url1 = url + "api/traders/checkmobile";
        }
        $.ajax({
            type: "POST",
            url: url1,
            data: "tmobile=" + $('#trader_frm :input[name="tmobile"]').val(),
            dataType: "html",
            success: function(msg) {
                response1 = (msg == 'true') ? true : false;
                return response1;
            }

        });

    }); */
    $.validator.addMethod("pan", function(value, element) {
        return this.optional(element) || /^[A-Z]{5}\d{4}[A-Z]{1}$/.test(value);
    }, "Invalid Pan Number");
    $.validator.addMethod("GST", function(value, element) {
        return this.optional(element) || /\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}$/.test(value);
    }, "Invalid GST Number");
    $.validator.addMethod("Amount", function(value, element) {
        //return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
        return !isNaN(value.toString().replace(/[,.]/g, ''));
    }, "Invalid Amount");
    //$(document).on("click", ".sbt_btn", function() {
    var validator = $('#trader_frm').validate({
        debug: false,
        ignore: '',
        rules: {
            tname: {
                required: true,
                lettersonly: true,
                remote: {
                    url: url + "api/traders/checkTrader",
                    type: "post",
                    data: {
                        tname: function() {
                            return $('#trader_frm :input[name="tname"]').val();
                        },
                        trader_id: function() {
                            return $("#hid_td_id").val();
                        },
                        trader_type: function() {
                            return get_trader_type();
                        }
                    }
                }
            },
            tmobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
                remote: {
                    url: url + "api/traders/checkmobile",
                    type: "post",
                    data: {
                        tmobile: function() {
                            return $('#trader_frm :input[name="tmobile"]').val();
                        },
                        trader_id: function() {
                            return $("#hid_td_id").val();
                        },
                    }
                }
            },
            tlocation: {
                required: true,
                lettersonly: true,
            },
            taadhar: {
                minlength: 12,
                remote: {
                    url: url + "api/traders/checkAadhar",
                    type: "post",
                    data: {
                        taadhar: function() {
                            return $("#taadhar").val();
                        },
                        trader_id: function() {
                            return $("#hid_td_id").val();
                        }
                    }
                }
            },
            tpan: {
                pan: true,
                remote: {
                    url: url + "api/traders/checkPAN",
                    type: "post",
                    data: {
                        tpan: function() {
                            return $("#tpan").val();
                        },
                        trader_id: function() {
                            return $("#hid_td_id").val();
                        }
                    }
                }
            },
            tgst: {
                GST: true,
                remote: {
                    url: url + "api/traders/checkGST",
                    type: "post",
                    data: {
                        tgst: function() {
                            return $("#tgst").val();
                        },
                        trader_id: function() {
                            return $("#hid_td_id").val();
                        }
                    }
                }
            },
            tbal_commas: {
                required: true,
                Amount: true,
            },
            firm_name: {
                required: function(element) {
                    return $("input[name='trader_type']:checked").val() == "Exporter";
                },
                remote: {
                    url: url + "api/traders/checkFirm",
                    type: "post",
                    data: {
                        tname: function() {
                            return $('#trader_frm :input[name="tname"]').val();
                        },
                        trader_id: function() {
                            return $("#hid_td_id").val();
                        },
                        trader_type: function() {
                            return get_trader_type();
                        }
                    }
                }
                //lettersonly:true,
            },
        },
        messages: {
            tname: {
                required: "Mandatory",
                lettersonly: "Letters only please",
                remote: 'Name is Taken',
            },
            tmobile: {
                required: "Mandatory",
                minlength: "Invalid Number",
                maxlength: "Invalid Number",
                remote: 'Mobile Number Exists',
            },
            tlocation: {
                required: "Mandatory",
            },
            taadhar: {
                minlength: "Invalid Aadhar",
                remote: 'Aadhar Exists',
            },
            tpan: {
                pan: "Invalid PAN",
                remote: 'PAN Exists',
            },
            tgst: {
                GST: "Invalid GST",
                remote: 'GST Exists',
            },
            tbal_commas: {
                required: 'Mandatory',
                Amount: "Invalid Amount",
            },
            firm_name: {
                required: "Mandatory",
                remote: 'Firm name Exists',
            },
        },
        showErrors: function(errorMap, errorList) {
            // Clean up any tooltips for valid elements
            $.each(this.validElements(), function(index, element) {
                var $element = $(element);
                $element.data("title", "").removeClass("error").tooltip("dispose");
            });

            // Create new tooltips for invalid elements
            $.each(errorList, function(index, error) {
                var $element = $(error.element);
                $element.tooltip("dispose").data("title", error.message).addClass("error").tooltip();
                // Create a new tooltip based on the error message we just set in the title
            });
        },
        submitHandler: function(form) {
            formData = new FormData(trader_frm);
            var dynurl = url + "api/traders/add";
            var dynsucc = "Trader created successfully!";
            if ($("#hid_td_id").val() != "") {
                dynurl = url + "api/traders/update";
                var dynsucc = "Trader updated successfully!";
            }

            $.ajax({
                url: dynurl,
                data: formData,
                type: 'POST',
                contentType: false,
                processData: false,
                enctype: 'multipart/form-data',
                datatype: 'json',
                success: function(response) {
                    //alert(response);
                    res = JSON.parse(response);
                    if (res.status == 'success') {
                        new PNotify({
                            title: 'Success',
                            text: dynsucc,
                            type: 'success',
                            shadow: true,
                            delay: 3000,
                            stack: { "dir1": "down", "dir2": "right", "push": "top" }
                        });
                        validator.resetForm();
                        table.draw();
                        $('.crt_link').trigger('click');
                        clearform("trader_frm");

                        //setInterval('location.reload()', 2000);											
                    } else {
                        new PNotify({
                            title: 'Error',
                            text: 'Something went wrong, try again!',
                            type: 'failure',
                            shadow: true,
                            delay: 3000,
                            stack: { "dir1": "down", "dir2": "right", "push": "top" }
                        });
                    }
                }
            });
        }
    });
    //});

    $(document).on("keyup blur focus", ".mykey", function() {
        $(".mykey").each(function() {
            if ($(this).hasClass("error")) {
                $(this).parent().css("border", "1px solid red");
            } else {
                $(this).parent().css("border", "");
            }
        });
    });

    $(".gst_block").hide();
    $(document).on("click", ".bal_ll li", function() {
        $('.bal_ll li').removeClass('atc');
        $(this).addClass('atc');
    });
    $(document).on("click", ".type_trd label", function() {
        $("#hid_tname").val('');
        $("#hid_firmname").val('');

        var k = get_trader_type();

        if (k == 'Agent') {
            /* $('.exppr_blk').hide();
            $('.agnt_blk').show(); */
            $('.firm_block').hide();
            $('.aadhar_block').show();
            $('.gst_block').hide();
            $(".aadhar_block").css({ "float": "left" });
            $(".pan_block").css({ "float": "right" });
            //$("#tname").attr("placeholder", "Trader Name");
            $(".chng_label").html("Trader Name");

        } else if (k == 'Exporter') {
            /* $('.agnt_blk').hide();
            $('.exppr_blk').show(); */
            $('.firm_block').show();
            $('.aadhar_block').hide();
            $('.gst_block').show();
            $(".pan_block").css({ "float": "left" });
            $(".gst_block").css({ "float": "right" });
            //$("#tname").attr("placeholder", "Contact Person");
            $(".chng_label").html("Contact Person");

        }
    });

    var table = $('#trader_lst_tbl').DataTable({
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "ordering": false,
        language: {
            processing: '<div class="loader">Loading...</div> ',
            searchPlaceholder: "Search Trader Details",
            search: "",
            "dom": '<"toolbar">frtip'
        },
        "columnDefs": [
            { className: "text-capitalize", "targets": 2 },
            { className: "mob_numb", "targets": 3 },
            { className: "bal_tbl txt_rt", "targets": 5 },
            { className: "txt_cnt", "targets": 6 }
        ],
        'ajax': {
            'url': url + 'api/traders/get_traders',
            'data': function(data) {
                // Read values				 
                var month_opt = $("input[name='month_opt']:checked").val();
                var multi_trader = [];
                var reportrange = $('#date_val').val();
                $.each($("input[name='trader_opt']:checked"), function() {
                    multi_trader.push($(this).val());
                });
                // Append to data			 
                data.month_opt = month_opt;
                data.trader_opt = multi_trader;
                data.reportrange = reportrange;
            },
            "dataSrc": function(json) {
                if (json.recordsTotal) $('#overlay').hide();
                var acount = ecount = 0;

                if (json.agent_count > 0) {
                    $("#agent_count").html(addCommas(json.agent_count));
                    acount = json.agent_count;
                } else { $("#agent_count").html(0); }

                if (json.exporter_count > 0) {
                    $("#exporter_count").html(addCommas(json.exporter_count));
                    ecount = json.exporter_count
                } else { $("#exporter_count").html(0); }

                $("#tot_count").html(addCommas(+acount + +ecount));
                return json.data;
            }

        }
    });

    $(document).on('click', '[data-toggle="popover"]', function() {
        var $this = $(this);
        if (!$this.data('bs.popover')) {
            $this.popover({
                content: popoverContent,
                html: true,
                trigger: 'focus',
                delay: {
                    hide: "100"
                },
            }).popover('show');
        }
    });

    function popoverContent() {
        var content = '';
        var element = $(this);
        var id = element.attr("id");
        $("#trader_edit_id").val(id);
        content = $("#popover-content1").html();
        return content;
    }

    function cb(start, end) {
        $('#date_val').val(start.format('D/MMM/YYYY') + ' - ' + end.format('D/MMM/YYYY'));
        if ($('#date_val').val() == "Invalid date - Invalid date") {
            $('#date_val').val('');
        } else {
            $('#date_val').val(start.format('D/MMM/YYYY') + ' - ' + end.format('D/MMM/YYYY'));
        }
    }

    $(document).on("click", ".del_yes", function() {
        var delval = $("#trader_edit_id").val();
        $.ajax({
            url: url + "api/traders/delete",
            data: { tdid: delval },
            type: 'POST',
            datatype: 'json',
            success: function(response) {

                res = JSON.parse(response);

                if (res.status == 'success') {
                    new PNotify({
                        title: 'Success',
                        text: "Trader deleted successfully!",
                        type: 'success',
                        shadow: true,
                        delay: 3000,
                        stack: { "dir1": "down", "dir2": "right", "push": "top" }
                    });
                    table.draw();
                }
            }
        });
    });

    $('#reportrange').daterangepicker({
        opens: 'right',
        drops: 'down',
        showDropdowns: true,
        locale: {
            format: 'D-MMM-YYYY',
            customRangeLabel: 'Date Range'
        },
        parentEl: '.dateEle',
        ranges: {
            'Till Date': [],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
            'Last 6 Months': [moment().subtract(5, 'month').startOf('month'), moment().endOf('month')],
            "Last Year": [moment().subtract(1, "y").startOf("year"), moment().subtract(1, "y").endOf("year")]
        }
    }, cb);

    $(document).on('click', '.ranges ul li', function() {
        $(this).parent().children().removeClass('active');
        $(this).addClass('active');
        $('.drp-selected').css('font-weight', 'bold');
        if ($(this).text() == "Till Date") {
            $("#date_val").val('Till Date');
        }

        if ($(this).text() != "Date Range") {
            table.draw();
        }
    });
    $(document).on('click', '.applyBtn', function() {
        table.draw();
    });

    $("input[name='month_opt']").on('click', function() {
        table.draw();
    });

    $("input[name='trader_opt']").on('click', function() {
        table.draw();
    });

    $('.note').click(function() {
        $('.note_txt').toggleClass('show');
    });

    $("div.toolbar").html('<b>SSS</b>');

    $('a.toggle-vis').on('click', function(e) {
        $(this).parent().toggleClass('act');
        e.preventDefault();
        var column = table.column($(this).attr('data-column'));
        column.visible(!column.visible());
    });

    $('.dataTables_length').html('<h2 class="create_hdg lng_hdg"> Trader List </h2>');

    $('.adds_blk').click(function() {
        var k = $(this).text();
        $('.adds_blk').removeClass('fl_wth');
        $(this).addClass('fl_wth');

        $('.fl_wth').click(function() {
            $(this).siblings('.tool_tip').text(k);
            $(this).siblings('.tool_tip').show();
        });

        $('.fl_wth').mouseout(function() {
            $('.tool_tip').hide();
            $('.tool_tip').text('');
        });
    });

    $('.ad_mr_trd').click(function() {
        $('.sec_blk').css('display', 'table');
    });

    $(document).mouseup(function(e) {
        var container = $(".sl_menu, .drp_btn");

        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.sl_menu').removeClass('show');
        }

        var fl_cnt = $('.adds_blk');
        if (!fl_cnt.is(e.target) && fl_cnt.has(e.target).length === 0) {
            $('.adds_blk ').removeClass('fl_wth');
        }
    });

    $('.crt_link').click(function() {
        clearform("trader_frm");
        $('.trade_create').toggleClass('sh_trade_create');
        $("#trader_hd").html('Create Trader');
        $('.trd_cr_r').toggleClass('trd_cr_r_r');
        $(this).find('.btn').toggleClass('hide_blk');
        $('.cl_crt_bl').toggleClass('hide_blk');
        $('.sbt_btn').text('Submit');
        $("#hid_td_id").val('');
        //document.getElementById("trader_frm").reset();
        // reload action
        $('.firm_block').hide();
        $('.aadhar_block').show();
        $('.gst_block').hide();
        $(".aadhar_block").css({ "float": "left" });
        $(".pan_block").css({ "float": "right" });
        $(".chng_label").html("Trader Name");
    });

    $('body').css('display', 'block');

    $('#exp_far, #exp_cmp').keyup(function() {
        var e_cnt = $('#mul1').val();
        var e_far = $('#exp_far').val();
        var e_cmp = $('#exp_cmp').val();
        if (e_cnt != null) {
            if (e_far != '') {
                if (e_cmp != '') {
                    $('.expected_blk').show();
                }
            }
        }
    });

    $(document).on("click", ".del", function() {
        $('#delete_trader').modal();
    });

    $(document).on("click", ".edt", function() {
        $("#loading").show();
        $('.trade_create').addClass('sh_trade_create');
        $('.trd_cr_r').addClass('trd_cr_r_r');
        $('.crt_link').find('.btn').addClass('hide_blk');
        $('.crt_link').find('.cl_crt_bl').removeClass('hide_blk');
        clearform("trader_frm");
        edit_trader();
    });

    $('.pp_clss').click(function() {
        $('#edt_user_id').hide();
        $('.ap_blk').hide();
        $('.popover').remove();
        $('.prc_txt_area').removeAttr('aria-describedby');
    });

    $('.crt_blk').click(function() {
        $('.cl_crt_trd').show();
        $(this).addClass('cre_all_blk');
        // $('.alpha').addClass('ful_alpha');
        // $('.trd_anl').addClass('wth_100');
    });

    // $('.crt_link').tooltip();
    $('.cl_crt_trd').click(function() {
        $('.crt_blk').removeClass('cre_all_blk');
        // $('.alpha').removeClass('ful_alpha');
        $('.trd_anl').removeClass('wth_100');
        $(this).hide();
        $('.sec_blk').hide();
        $('.trd_cr input[type=text]').val('');
        $(".trd_cr input[type=radio]").prop("checked", true);
        $('.check_wt_serc').removeClass('val_seld');
        $('.cre_inp').removeClass('inp_ss');
        $('.sm_blk').hide();
        $('#sel_usr').text('Select User');
        $('#sel_trd').text('Select Trader');
        $('#exp_cnt').text('Expected Count');
        $('#ac_f_cnt').text('Act.Farmer Count');
        $('#act_com_cn').text('Act.Company Count');
        $('.trd_ad_lst').addClass('show_ad_m');
    });

    $('.remv_blk').click(function() {
        $('.sec_blk').hide();
    });

    $('.ap_blk').click(function() {
        $('#edt_user_id').hide();
        $(this).hide();
    });

    // Edit section
    $('.edt_bl_lnk').click(function() {
        $(this).toggleClass('opacity_1');
        $(this).parent().siblings('ul').toggleClass('disb_sel');
        $('.popover').remove();
        $('.prc_txt_area').removeAttr('aria-describedby');
    });

    $('.disb_sel .prc_txt_area').popover({
        html: true,
        content: function() {
            return $('#note_cnt').html();
        }
    });

    //$(document).on('blue',"#tname",function(event){ checktradername(); });
    //$(document).on('blue',"#firm_name",function(event){ checkfirmname(); });	
});

function clearform(form_id) {
    var someForm = $('#' + form_id);
    someForm[0].reset();
    $(".mykey").parent().css("border", "");
    $(".mykey").parent().removeClass('inp_ss');
    $.each(someForm[0].elements, function(index, elem) {
        //console.log(elem.type);
        if (elem.type == "text") {
            $(elem).removeClass('error');
            $(elem).parent().css('border', '');
            //console.log(elem.id);
        }
        if (elem.type == "radio") {
            $(elem).closest(".check_wt_serc").data("title", "").tooltip("dispose");
            $(elem).closest(".check_wt_serc").css("border", "");

        }
    });
    reset_trader_type();
}

function get_trader_type() {
    return $("input[name='trader_type']:checked").val();
}

function set_trader_type(value) {
    $('.rad_btns').find('.radio_blk').removeClass('checkd');
    $('#trader_type_agent').prop('checked', false);
    $('#trader_type_exporter').prop('checked', false);

    $('input:radio[name=trader_type]').filter('[value=' + value + ']').prop('checked', 'checked');
    $('input:radio[name=trader_type]').filter('[value=' + value + ']').parent('.radio_blk').addClass('checkd');
}

function reset_trader_type() {
    //console.log('rest');
    $('.rad_btns').find('.radio_blk').removeClass('checkd');
    $(".rad_btns").children(".radio_blk").first().addClass('checkd');

    $('input[name="trader_type"]').prop('checked', false);
    $('#trader_type_agent').prop('checked', true);
}

function edit_trader() {
    var tdid = $("#trader_edit_id").val();
    $("#hid_td_id").val(tdid);
    $.ajax({
        url: url + "api/traders/traderdetails/" + tdid,
        data: {},
        type: 'POST',
        datatype: 'json',
        success: function(response) {
            //alert(response);
            res = JSON.parse(response);
            if (res.status == "success") {
                $("#trader_hd").html("Edit Trader - TDR" + res.data.td_id);
                $('.sbt_btn').text('Update');
                set_trader_type(res.data.trader_type);
                $(".cre_inp").addClass("inp_ss");
                if (res.data.trader_type == "Exporter") {
                    $(".chng_label").html("Contact Person");
                    $(".pan_block").css({ "float": "left" });
                    $(".gst_block").css({ "float": "right" });
                    $(".aadhar_block").hide();
                    $(".gst_block").show();
                    $(".firm_block").show();
                    $("#firm_name").val(res.data.firm_name);
                    $("#tname").val(res.data.contact_person);
                    $("#tgst").val(res.data.gst);
                    $("#hid_tname").val('');
                    $("#hid_firmname").val(res.data.firm_name);
                } else {
                    $(".chng_label").html("Trader Name");
                    $(".pan_block").css({ "float": "right" });
                    $(".aadhar_block").show();
                    $(".gst_block").hide();
                    $(".firm_block").hide();
                    $("#firm_name").val('');
                    $("#tname").val(res.data.full_name);
                    $("#tgst").val('');
                    $("#hid_tname").val(res.data.full_name);
                    $("#hid_firmname").val('');
                }

                $("#tmobile").val(res.data.mobile_no);
                $("#tlocation").val(res.data.location);
                $("#taadhar").val(res.data.aadhar_no);
                $("#tpan").val(res.data.pan_no);
                $("#tbal_commas").val(addCommas(res.data.balance));
                $("#tbal").val(res.data.balance);
                $("#pterm").val(res.data.payment_terms);
                $("#loading").hide();
            }
        }
    });

}

function amount_with_commas(addoredit) {
    var aeval = "";
    if (addoredit == "edit") { aeval = "_edit"; }
    var textbox = '#tbal_commas' + aeval;
    var hidden = '#tbal' + aeval;

    //$(textbox).keyup(function () {

    var num = $(textbox).val();
    var comma = /,/g;
    num = num.replace(comma, '');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $(textbox).val(numCommas);
    /* var amt_word = convertNumberToWords(num);
    if(amt_word != undefined){
    	$('.amon_text'+aeval).html(amt_word);
    } */
}

$('.dataTables_paginate').html('<a href="#" title=""> Show More </a>');