<div class="modal" id="viewUnitInfoModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title">Property Unit  Detail</h4>
          <button id="print_btn" type="button" class="btn btn-primary mx-5">
            <i class="fa fa-print text-white"></i>
        </button>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body print_this">
          <div class="card card-primary">
             <div class="card-header">
                   <h6>Property Detail</h6>
             </div>
             <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 table-responsive">
                    <table class="table border-th-td-none" id="unit_detail_table_grid">
                        <tbody>
                          <tr>
                            <th>Property</th>
                            <td id="txt_property_title"></td>
                            <th>Property Code</th>
                            <td id="txt_propcode"></td>
                            <th>Unit Code</th>
                            <td id="txt_unitcode"></td>
                            <th>Type</th>
                            <td id="txt_unit_type"></td>
                          </tr>
                          <tr>
                            <th>Size (Sqrt)</th>
                            <td id="txt_unit_size"></td>
                            <th>Bedroom</th>
                            <td id="txt_bedroom"></td>
                            <th>Bathroom</th>
                            <td id="txt_bathroom"></td>
                            <th>Balcony</th>
                            <td id="txt_balcony"></td>
                          </tr>

                          <tr>
                            <th>Parking</th>
                            <td id="txt_parking"></td>
                            <th>Hall</th>
                            <td id="txt_hall"></td>
                            <th>Kithchen</th>
                            <td id="txt_kitchen"></td>
                            <th>Price</th>
                            <td id="txt_price"></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
              </div>
             </div>
          </div>
          <div class="card card-primary">
             <div class="card-header">
                <h6>Owner Detail</h6>
             </div>
             <div class="card-body table-responsive">
               <table class="table border-th-td-none" id="owner_detail_table_grid">
                   <tbody>
                     <tr>
                       <th>Name</th>
                       <td id="txt_owner_name"></td>
                       <th>Email</th>
                       <td id="txt_owner_email"></td>
                       <th>Mobile</th>
                       <td id="txt_owner_mobile"></td>
                     </tr>
                     <tr>
                       <th>PassPort</th>
                       <td id="txt_owner_passport"></td>
                       <th>Visa</th>
                       <td id="txt_owner_visa"></td>
                       <th>Emirates Id</th>
                       <td id="txt_owner_emirates_id"></td>
                     </tr>
                     <tr>
                       <th>Country</th>
                       <td id="txt_owner_country"></td>
                       <th>State</th>
                       <td id="txt_owner_state"></td>
                       <th>City</th>
                       <td id="txt_owner_city"></td>
                     </tr>
                     <tr>
                       <th>Address</th>
                       <td id="txt_owner_address"></td>
                       <th></th>
                       <td></td>
                       <th></th>
                       <td></td>
                     </tr>
                   </tbody>
                 </table>
             </div>
          </div>
          <div class="card">
              <div class="card-header">
                <h6>Allotment Detail</h6>
             </div>
              <div class="card-body">
                  <table class="table table-borderless" id="allotment_detail_table_grid">
            <tbody>
                <tr>
                    <th>Tenant</th>
                    <td id="ur_tenant_name"></td>
                    <th>Owner</th>
                    <td id="ur_owner_name"></td>
                    <th>Agent</th>
                    <td id="ur_agent_name"></td>
                    <th>Admin</th>
                    <td id="ur_admin_name"></td>
                </tr>
                <tr>
                    <th>Rent</th>
                    <td id="ur_rent_amount"></td>
                    <th>Installments</th>
                    <td id="ur_rent_installment"></td>
                    <th>Security Deposit</th>
                    <td id="ur_security_deposit"></td>
                    <th>Sewa Deposit</th>
                    <td id="ur_sewa_deposit"></td>
                </tr>
                <tr>
                    <th>Municipality Fees</th>
                    <td id="ur_municipality_fees"></td>
                    <th>Brokerage</th>
                    <td id="ur_brokerage"></td>
                    <th>Contract</th>
                    <td id="ur_contract"></td>
                    <th>Remote Deposit</th>
                    <td id="ur_remote_deposit"></td>
                </tr>
            </tbody>
        </table>
        <h6>Rent BreakDown</h6>
        <hr>
        <table class="table table-bordered">
            <thead class="bg-gradient-cyan">
                <tr>
                    <th>Installment</th>
                    <th>Dated</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="unit_rent_installment_detail_grid">

            </tbody>
        </table>
              </div>
          </div>
          <div class="card card-primary">
              <div class="card-header">
                <h6>Tenant Detail</h6>
             </div>
              <div class="card-body">
                   <!--- td_ = tenant detail ---->
        <table class="table table-borderless" id="tenant_detail_table_grid">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td id="td_tenant_name"></td>
                    <th>Mobile</th>
                    <td id="td_tenant_mobile"></td>
                    <th>Email</th>
                    <td id="td_tenant_email"></td>
                    <th></th>
                    <td></td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td id="td_tenant_country"></td>
                    <th>State</th>
                    <td id="td_tenant_state"></td>
                    <th>City</th>
                    <td id="td_tenant_city"></td>
                    <th>Address</th>
                    <td id="td_tenant_address"></td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td id="td_tenant_country"></td>
                    <th>State</th>
                    <td id="td_tenant_state"></td>
                    <th>City</th>
                    <td id="td_tenant_city"></td>
                    <th>Address</th>
                    <td id="td_tenant_address"></td>
                </tr>
            </tbody>
        </table>
        <h6>Tenant Documents</h6>
        <hr>
        <table class="table table-bordered">
            <thead class="bg-gradient-cyan">
                <tr>
                    <th>Document</th>
                    <th>Uploaded</th>
                </tr>
            </thead>
            <tbody id="tenant_documents_detail_grid">

            </tbody>
        </table>
        <h6>Tenant Relations</h6>
        <hr>
        <table class="table table-bordered">
            <thead class="bg-gradient-cyan">
                <tr>
                    <th>Name</th>
                    <th>Relation</th>
                </tr>
            </thead>
            <tbody id="tenant_relation_detail_grid">

            </tbody>
        </table>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
