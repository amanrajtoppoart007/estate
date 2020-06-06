@extends('admin.layout.app')
@section('content')
<h4 class="color-primary mb-4">System Settings</h4>
	<div class="submit_form color-secondery icon_primary p-5 bg-white">
    <form class="change_password" action="{{route('system-setting.update')}}" method="POST" id="system_setting_update_form">
        @csrf
            <h5 class="color-primary">Social Media  Settings</h5>
                <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group position-relative">
                        <label>Facebook</label>
                        <abbr title="Must used your real username or link to connect your profile">
                        <input type="text" name="facebook_social_account" class="form-control" placeholder="https://" value="{{$setting['facebook_social_account']}}">
                        </abbr>
                    </div>
                     </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Twitter</label>
                            <abbr title="Must used your real username or link to connect your profile">
                                <input type="text" name="twitter_social_account" class="form-control" placeholder="https://" value="{{$setting['twitter_social_account']}}">
                            </abbr>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Linkedin</label>
                            <abbr title="Must used your real username or link to connect your profile">
                                <input type="text" name="linkedin_social_account" class="form-control" placeholder="https://" value="{{$setting['linkedin_social_account']}}">
                            </abbr>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Google plus</label>
                            <abbr title="Must used your real username or link to connect your profile">
                                <input type="text" name="google_social_account" class="form-control" placeholder="https://" value="{{$setting['google_social_account']}}">
                            </abbr>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Vimeo</label>
                            <abbr title="Must used your real username or link to connect your profile">
                                <input type="text" name="vimeo_social_account" class="form-control" placeholder="https://" value="{{$setting['vimeo_social_account']}}">
                            </abbr>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>Youtube</label>
                            <abbr title="Must used your real username or link to connect your profile">
                                <input  type="text" name="youtube_social_account" class="form-control" placeholder="https://" value="{{$setting['youtube_social_account']}}">
                            </abbr>
                        </div>
                </div>
            </div>
            <h5 class="color-primary">Office Contact Settings</h5>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input  class="form-control" name="official_email_id" id="official_email_id" value="{{$setting['official_email_id']}}">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label>Contact No </label>
                        <input  class="form-control" name="official_contact_number" id="official_contact_number" value="{{$setting['official_contact_number']}}">
                    </div>
                </div>
            </div>
            <h5 class="color-primary">Office Address Settings</h5>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <label>Address</label>
                     <textarea class="form-control" name="office_address" id="office_address">{{$setting['office_address']}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 text-right">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Save</button>
                     </div>
                </div>
            </div>
	   </form>
</div>
@endsection
@section('script')
<script>
     $(document).ready(function()
     {
         $('#system_setting_update_form').on('submit',function(e){
           e.preventDefault();
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            })
            $.ajax({
                type     : "POST",
                url      : $(this).attr('action'),
                data     : $(this).serialize(),
                dataType : 'json',
                success  : function(res)
				{
                    if(res.response=='success')
					{
						$.toast({
                        icon     : 'success',
                        heading  : 'Success',
                        loader   : true,
                        loaderBg : '#9EC600',
                        text     : res.message,
                        position : 'bottom-right',
                        stack    : false
                        });
                    }
					else
					{
                        $.toast({
                        icon     : 'error',
                        heading  : 'Error',
                        loader   : true,
                        loaderBg : '#9EC600',
                        text     : res.message,
                        position : 'bottom-right',
                        stack    : false
                        });
                    }
                },
                error: function(ERROR)
				{
                    console.log('Error:', ERROR);
                }
            });
         });
     })
</script>
@endsection	