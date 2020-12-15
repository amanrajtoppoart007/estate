$(document).ready(async function(){
    // url variables
    const calculateEndDateUrl   = $("#calculate_end_date_url").val();
    const vacantUnitListUrl     = $("#vacant_unit_list_url").val();
    const breakDownItemsUrl     = $("#breakdown_items_url").val();
    const bankListUrl           = $("#bank_list_url").val();
//form variables
    let breakdown_grid_table    = $("#breakdown_item_grid");
    let rent_frequency          = $("#rent_frequency");
    let rent_period             = $("#rent_period");
    let lease_start_date        = $("#lease_start_date");
    let lease_end_date          = $("#lease_end_date");

    let unit_id                 = $("#unit_id");
    let property_id             = $("#property_id");
    let security_deposit        = $("#security_deposit");
    let municipality_fees       = $("#municipality_fees");
    let brokerage               = $("#brokerage");
    let contract                = $("#contract");
    let remote_deposit          = $("#remote_deposit");
    let sewa_deposit            = $("#sewa_deposit");
    let first_installment       = $("#first_installment");
    let total_first_installment = $("#total_first_installment");
    let tenancy_type            = $("#tenancy_type");
    let unit_type              = $("#unit_type");

    let installments            = $("#installments");
    let rent_amount             = $("#rent_amount");
    let total_rent_amount       = $("#total_rent_amount");
    let advance_payment         = $("#advance_payment");
    let balance_amount          = $("#balance_amount");


    //primary constants for breakdown

    let security_deposit_const  = $("#security_deposit_constant");
    let municipality_fees_const = $("#municipality_fees_constant");
    let brokerage_const         = $("#brokerage_constant");
    let contract_const          = $("#contract_constant");
    let remote_deposit_const    = $("#remote_deposit_constant");
    let sewa_deposit_const      = $("#sewa_deposit_constant");


    let CHECK_DATES             = $(".check_dates");
    let BANK_LIST               = $(".bank_list");


    CHECK_DATES.each(function(){
                $(this).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy'});
            });
    BANK_LIST.each(function(){
                $(this).select2();
            });




   function  render_primary_breakdown()
   {

       balance_amount.val(0);

      let _total_installment         = parseInt((installments.val()!=="")?installments.val():0);
      let _rent_amount               = parseFloat((rent_amount.val()!=="")?rent_amount.val():0);
      let total_rent_value           = 0;
      let brokerage_value            = parseFloat((brokerage_const.val()!=="")?brokerage_const.val():0);
      let security_deposit_value     = parseFloat((security_deposit_const.val()!=="")?security_deposit_const.val():0);
      let municipality_fees_constant = parseFloat((municipality_fees_const.val()!=="")?municipality_fees_const.val():0);
      let contract_value             = parseFloat((contract_const.val()!=="")?contract_const.val():0);
      let remote_deposit_value       = parseFloat((remote_deposit_const.val()!=="")?remote_deposit_const.val():0);
      let sewa_deposit_value         = parseFloat((sewa_deposit_const.val()!=="")?sewa_deposit_const.val():0);
      let municipality_fees_value    = (_rent_amount*_total_installment*municipality_fees_constant) / 100;
      let first_installment_value    = _rent_amount;
          let total_first_installment_value = 0;

          total_first_installment_value = _rent_amount + brokerage_value + security_deposit_value + municipality_fees_value + contract_value
              + remote_deposit_value + sewa_deposit_value;


          total_rent_value = total_first_installment_value + (_rent_amount*(_total_installment-1));
          security_deposit.val(security_deposit_value);
          municipality_fees.val(municipality_fees_value);
          brokerage.val(brokerage_value);
          contract.val(contract_value);
          sewa_deposit.val(sewa_deposit_value);
          remote_deposit.val(remote_deposit_value);
          first_installment.val(first_installment_value);
          total_first_installment.val(total_first_installment_value);
          total_rent_amount.val(total_rent_value);
          const advance = (advance_payment.val()!=="")?(advance_payment.val()):0;
          const balance = parseFloat(total_first_installment_value??0) - parseFloat(advance);
          balance_amount.val(balance);

  }


   async function generateRentInstallments()
  {
      const rent_installment_grid = $("#rent_installment_grid");
       rent_installment_grid.empty();

           let option ='';

             let banks = [];
       let csrf_token = $('meta[name="csrf-token"]').attr('content');
      jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': csrf_token, } });
     await $.ajax({
          url : bankListUrl,
          method : 'POST',
          success: function(result)
          {
              if(result.response==="success")
              {
                 banks = result.data;
              }

          }
      });

           if(banks!==undefined && banks.length>1)
           {
               $.each(banks,function(index,item){
                   option+=`<option value="${item.name}">${item.name}</option>`;
               });
           }


           for(let i=0;i<parseInt(installments.val());i++)
          {
              let _amount;
             if(i===0)
             {
                  _amount = parseFloat(balance_amount.val());
             }
             else
             {
                  _amount = parseFloat(rent_amount.val());
             }
             let _prefix;

              switch (i)
              {
                  case 0 :
                      _prefix = '1st Remaining';
                      break;
                  case 1:
                      _prefix = '2nd';
                      break;
                  case 2:
                      _prefix = '3rd';
                      break;
                  default:
                      _prefix = `${i+1}th`;
                      break;
              }

              let id = '';

              if(parseInt(i)===0)
              {
                  id+=`id="rent_first_installment_input"`;
              }
             console.log(id);

              let _tableRow = `<tr>
                 <td>
                       ${_prefix} Installment
                       <input type="hidden" name="installment[${i}][installment]"  value="${i+1}" >
                </td>
                <td>
                  <input type="text"  name="installment[${i}][amount]]" ${id} value="${_amount}"/>
                </td>
                <td>
                  <select class="bank_list" name="installment[${i}][bank_name]]">
                       ${option}
                  </select>
                </td>
                <td>
                  <input type="text"  name="installment[${i}][cheque_no]]" value=""/>
               </td>
                <td>
                  <input type="text" class="check_dates"  name="installment[${i}][cheque_date]]" value=""/>
                </td>
                <td>
                   <input type="text"   name="installment[${i}][paid_to]]" value=""/>
                 </td>
            </tr>`;
            rent_installment_grid.append(_tableRow);

          }

           CHECK_DATES.each(function(){
                $(this).datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy'});
            });
            BANK_LIST.each(function(){
                $(this).select2();
            });



  }


    let get_breakdown_const = function ()
    {
          security_deposit_const.val('');
          municipality_fees_const.val('');
          brokerage_const.val('');
          contract_const.val('');
          remote_deposit_const.val('');
          sewa_deposit_const.val('');

        let params = {
            tenancy_type: tenancy_type.val(),
            unit_type    :unit_type.val(),
        };

        function fn_success(result)
        {
            if(result.data)
            {
                let items = result.data;
                security_deposit_const.val(items.security_deposit??0);
                municipality_fees_const.val(items.municipality_fees??0);
                brokerage_const.val(items.brokerage??0);
                contract_const.val(items.contract??0);
                remote_deposit_const.val(items.remote_deposit??0);
                sewa_deposit_const.val(items.sewa_deposit??0);
                render_primary_breakdown();
            }
        }

        function fn_error(result)
        {
            toast("error", result.message, "top-right");
        }

        $.fn_ajax(breakDownItemsUrl, params, fn_success, fn_error);
  };


   $("#tenancy_type,#unit_type,#rent_amount,#installments").on("change", function () {
                    if (!$.trim(tenancy_type.val()))
                    {
                      tenancy_type.css({'border-color': 'aqua'}).trigger("focus");
                        return false;
                    }
                    if (!$.trim(unit_type.val())) {
                        unit_type.css({'border-color': 'aqua'}).trigger("focus");
                        return false;
                    }
                    if (!$.trim(rent_amount.val()))
                    {
                        rent_amount.css({'border-color': 'aqua'}).trigger("focus");
                        return false;
                    }
                    if (!$.trim(installments.val())) {
                        installments.css({'border-color': 'aqua'}).trigger("focus");
                        return false;
                    }
                    get_breakdown_const();
                       (async () => {
                           await generateRentInstallments();
                       })();

                });


    function calculateEndDate()
         {
           if(!$.trim(rent_frequency.val()))
                {
                    rent_frequency.css({'border-color':'aqua'}).trigger("focus");
                    return false;
                }
                if(!$.trim(rent_period.val()))
                {
                    rent_period.css({'border-color':'aqua'}).trigger("focus");
                    return false;
                }
                if(!$.trim(lease_start_date.val()))
                {
                    lease_start_date.css({'border-color':'aqua'}).trigger("focus");
                    return false;
                }
                let params = {
                   'rent_period_type': rent_frequency.val(),
                   'rent_period'     : rent_period.val(),
                   'lease_start'     : lease_start_date.val(),
                }
                function fn_success(result)
                {
                   let minDate = lease_start_date.val();
                   lease_end_date.datepicker().destroy();
                   lease_end_date.datepicker({footer: true, modal: true,format: 'dd-mm-yyyy',value:`${result.endDate}`,minDate:`${minDate}`});
                }
                function fn_error(result)
                {
                  toast('error',result.message,'bottom-right');
                }
                $.fn_ajax(calculateEndDateUrl,params,fn_success,fn_error);
         }

    $(document).on("change","#breakdown_item_grid tbody tr input",function(){

        const inputs = breakdown_grid_table.find("tbody").find("tr").find("input");
        let total_first_payment=0;
        inputs.each(function(index){
            if(index<7)
            {
                if($(this).val()!=="")
                {
                  total_first_payment += parseFloat($(this).val());
                }
            }

            total_first_installment.val(total_first_payment);
            const balance = advance_payment.val()!==0?(total_first_payment-advance_payment.val()):total_first_payment;
            balance_amount.val(balance);
            $("#rent_first_installment_input").val(balance);


        });

    });

    function rent_period_type_text(rent_period_type)
    {
        let rent_period_text;
        switch (rent_period_type) {
            case 'monthly':
                rent_period_text = 'Month';
                break;
            case 'half_yearly':
                rent_period_text = 'Half Years';
                break;
            case 'yearly':
                rent_period_text = 'Years';
                break;
        }
        return rent_period_text;
    }

      $("#rent_period_type").on('change',function(){
              let rent_period_type = $(this).val();
              $("#rent_period_text").text(rent_period_type_text(rent_period_type));
        });

    lease_start_date.datepicker({ footer: true, modal: true,format: 'dd-mm-yyyy',
            change : function()
            {
                calculateEndDate();
            }
         });

      $("#rent_period,#rent_period_type").on('change',function(){
           calculateEndDate();
         });

         property_id.on('change', function ()
         {
                unit_id.html('');
                let params = {'property_id': $(this).val()};

                function fn_success(result)
                {
                    let options = `<option value="">Select Unit</option>`;
                    $.each(result.data, function (i, item)
                    {
                        options += `<option value="${item.id}">${item.unitcode}</option>`;

                    });
                    unit_id.html(options);

                }

                function fn_error(result) {
                    toast('error', result.message, 'bottom-right');
                }

                $.fn_ajax(vacantUnitListUrl, params, fn_success, fn_error);
            });
    $(document).on("change","#unit_id",function(){
          let url    = $("#get_unit_type_url").val();
		  let params = {"unit_id" : $(this).val() };
		  function fn_success(result)
		  {
		      let $option;
		      switch (result.data.bedroom)
              {
                  case "1":
                      $option = `<option value="one_br">1 Br</option>`;
                      break;
                  case "2":
                      $option = `<option value="two_br">2 Br</option>`;
                      break;
                  case "3":
                       $option = `<option value="three_br">3 Br</option>`;
                       break;
                  case "studio":
                      $option = `<option value="studio">Studio</option>`;
                      break;
                  default:
                      $option = "";
                      break;
              }
                unit_type.html('');
		        unit_type.html($option);
		        unit_type.prop({readOnly:true});
		  }
		  function fn_error(result)
		  {
             toast('error',result.message,'top-right');
		  }
		  $.fn_ajax(url,params,fn_success,fn_error);
		});

          $("#rent_period_text").text(rent_period_type_text(rent_frequency.val()));

});
