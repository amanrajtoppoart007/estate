(function($) {

    $.render_breakdown_heading = function()
    {
        $("#rent_breakdown_grid").empty();
        $("#rent_breakdown_grid").html(`
                            <tr id="row_security_deposit">
                                <th>Security Deposit</th>
                            </tr>
                            <tr id="row_municipality_fees">
                                <th>Municipality Fees</th>
                            </tr>
                            <tr id="row_brokerage">
                                <th>Commission + Vat</th>
                            </tr>
                            <tr id="row_contract">
                                <th>Tenancy Contract</th>
                            </tr>
                            <tr id="row_remote_deposit">
                                <th>Remote Deposit</th>
                            </tr>
                            <tr id="row_sewa_deposit">
                                <th>S.E.W.A. Deposit</th>
                            </tr>
                            <tr id="row_monthly_installment">
                                <th>First Installment</th>
                            </tr>
                            <tr id="row_total_monthly_installment">
                                <th>Total Monthly Installment</th>
                            </tr>`);
    }
 $.render_break_down_items =   function()
  {
      $.render_breakdown_heading();
      let installments = parseInt($("#installments").val());
      let rent_amount = parseFloat($("#rent_amount").val());
      let monthly_amount = parseFloat(rent_amount / installments);
      let brokerage_constant = $("#brokerage_constant").val();
      let security_deposit_constant = $("#security_deposit_constant").val();
      let municipality_fees_constant = $("#municipality_fees_constant").val();
      let contract_constant = $("#contract_constant").val();
      let remote_deposit_constant = $("#remote_deposit_constant").val();
      let sewa_deposit_constant = $("#sewa_deposit_constant").val();
      let municipality_fees = (monthly_amount * municipality_fees_constant) / 100;

      for(let i=1;i<=1;i++)
      {
          let total_rent_amount =0;
          if(i==1)
          {
              total_rent_amount = parseFloat(monthly_amount) + parseFloat(brokerage_constant) + parseFloat(security_deposit_constant) + parseFloat(municipality_fees) + parseFloat(contract_constant)
              + parseFloat(remote_deposit_constant) + parseFloat(sewa_deposit_constant);
          }
          else
          {
              security_deposit_constant = remote_deposit_constant = sewa_deposit_constant = 0;
              total_rent_amount = parseFloat(monthly_amount) + parseFloat(municipality_fees) + parseFloat(brokerage_constant) + parseFloat(contract_constant);
          }
          let readonly = null;
          if($("#tenancy_type").val()==='company')
          {
               readonly = '';
          }
          else
          {
               readonly = 'readonly';
          }
          $("#row_security_deposit").append(`<td><input name="security_deposit[]" class="form-control numeric" value="${security_deposit_constant}" ${readonly}></td>`);
          $("#row_municipality_fees").append(`<td><input name="municipality_fees[]" class="form-control numeric" value="${municipality_fees}" ${readonly}></td>`);
          $("#row_brokerage").append(`<td><input name="brokerage[]" class="form-control numeric" value="${brokerage_constant}" ${readonly}></td>`);
          $("#row_contract").append(`<td><input name="contract[]" class="form-control numeric" value="${contract_constant}" ${readonly}></td>`);
          $("#row_remote_deposit").append(`<td><input name="remote_deposit[]" class="form-control numeric" value="${remote_deposit_constant}" ${readonly}></td>`);
          $("#row_sewa_deposit").append(`<td><input name="sewa_deposit[]" class="form-control numeric" value="${sewa_deposit_constant}" ${readonly}></td>`);
          $("#row_monthly_installment").append(`<td><input name="monthly_installment[]" class="form-control numeric" value="${monthly_amount}" ${readonly}></td>`);
          $("#row_total_monthly_installment").append(`<td><input name="total_monthly_installment[]" class="form-control numeric" value="${total_rent_amount}" ${readonly}></td>`);

      }
  }
  $.render_installment_title = function(count)
  {
      let set = null;
      switch (count) {
          case 1:
              set = 'st Installment';
              break;
          case 2:
              set = 'nd Installment';
              break;
          case 3:
              set = 'rd Installment';
              break;
          default :
              set = 'th Installment';
              break;
      }
      return count + set;
  }

  $.calculate_column_breakdown = function(index)
  {
        let monthly_installment = $('input[name="monthly_installment[]"]').eq(index).val();
        let sewa_deposit        = $('input[name="sewa_deposit[]"]').eq(index).val();
        let remote_deposit      = $('input[name="remote_deposit[]"]').eq(index).val();
        let contract            = $('input[name="contract[]"]').eq(index).val();
        let brokerage           = $('input[name="brokerage[]"]').eq(index).val();
        let municipality_fees   = $('input[name="municipality_fees[]"]').eq(index).val();
        let security_deposit    = $('input[name="security_deposit[]"]').eq(index).val();
        let total_rent_amount   = 0;
        if(index===0)
        {
            total_rent_amount = parseFloat(monthly_installment) + parseFloat(brokerage) + parseFloat(security_deposit) + parseFloat(municipality_fees) + parseFloat(contract)
              + parseFloat(remote_deposit) + parseFloat(sewa_deposit);
        }
        else
        {
            total_rent_amount = parseFloat(monthly_installment) + parseFloat(municipality_fees) + parseFloat(brokerage) + parseFloat(contract);
        }
        $('input[name="total_monthly_installment[]"]').eq(index).val(total_rent_amount);

  }
})(jQuery);
