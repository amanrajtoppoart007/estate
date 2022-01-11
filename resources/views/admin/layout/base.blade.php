<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../favicon.ico">

    <!-- Font -->
    <link href="{{asset('theme/front/assets/font/css27217.css?family=Open+Sans:wght@400;600&amp;display=swap')}}" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('theme/front/assets/css/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/front/assets/vendor/icon-set/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('theme/front/assets/css/theme.minc619.css?v=1.0')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/overit.css')}}">
    @yield('head')
</head>
<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl">


@include('admin.layout.include.navbar')

<!-- ========== MAIN CONTENT ========== -->

@include('admin.layout.include.leftSideBar')
<main id="content" role="main" class="main">
@yield('content')

<!-- Footer -->
    <div class="footer mt-5 pt-8">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <p class="font-size-sm mb-0">&copy;  <span class="d-none d-sm-inline-block">2020 Softwarefuels Consultency Services PVT LTD.</span></p>
            </div>
            <div class="col-auto">
                <div class="d-flex justify-content-end">
                    <!-- List Dot -->
                    <ul class="list-inline list-separator">
                        <li class="list-inline-item">
                            <a class="list-separator-link" href="#">FAQ</a>
                        </li>

                        <li class="list-inline-item">
                            <a class="list-separator-link" href="#">License</a>
                        </li>


                    </ul>
                    <!-- End List Dot -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->


@include('admin.layout.include.speedLink')

<!-- Welcome Message Modal -->
<div class="modal fade" id="welcomeMessageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-close">
                <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                    <i class="tio-clear tio-lg"></i>
                </button>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="modal-body p-sm-5">
                <div class="text-center">
                    <div class="w-75 w-sm-50 mx-auto mb-4">
                        <img class="img-fluid" src="../assets/svg/illustrations/graphs.svg" alt="Image Description">
                    </div>

                    <h4 class="h1">Welcome to Front</h4>

                    <p>We're happy to see you in our community.</p>
                </div>
            </div>
            <!-- End Body -->

            <!-- Footer -->
            <div class="modal-footer d-block text-center py-sm-5">
                <small class="text-cap mb-4">Trusted by the world's best teams</small>

                <div class="w-85 mx-auto">
                    <div class="row justify-content-between">
                        <div class="col">
                            <img class="img-fluid ie-welcome-brands" src="../assets/svg/brands/gitlab-gray.svg" alt="Image Description">
                        </div>
                        <div class="col">
                            <img class="img-fluid ie-welcome-brands" src="../assets/svg/brands/fitbit-gray.svg" alt="Image Description">
                        </div>
                        <div class="col">
                            <img class="img-fluid ie-welcome-brands" src="../assets/svg/brands/flow-xo-gray.svg" alt="Image Description">
                        </div>
                        <div class="col">
                            <img class="img-fluid ie-welcome-brands" src="../assets/svg/brands/layar-gray.svg" alt="Image Description">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</div>
<!-- End Welcome Message Modal -->

<!-- Edit user Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <h4 id="editUserModalTitle" class="modal-title">Edit user</h4>

                <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                    <i class="tio-clear tio-lg"></i>
                </button>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="modal-body">
                <!-- Nav -->
                <ul class="js-tabs-to-dropdown nav nav-segment nav-fill nav-lg-down-break mb-5" id="editUserModalTab" role="tablist"
                    data-hs-transform-tabs-to-btn-options='{
                "transformResolution": "lg",
                "btnClassNames": "btn btn-block btn-white dropdown-toggle justify-content-center mb-3"
              }'>
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab">
                            <i class="tio-user-outlined mr-1"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="billing-address-tab" data-toggle="tab" href="#billing-address" role="tab">
                            <i class="tio-city mr-1"></i> Billing address
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="change-password-tab" data-toggle="tab" href="#change-password" role="tab">
                            <i class="tio-lock-outlined mr-1"></i> Change password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="notifications-tab" data-toggle="tab" href="#notifications" role="tab">
                            <i class="tio-notifications-on-outlined mr-1"></i> Notifications
                        </a>
                    </li>
                </ul>
                <!-- End Nav -->

                <!-- Tab Content -->
                <div class="tab-content" id="editUserModalTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form>
                            <!-- Profile Cover -->
                            <div class="profile-cover">
                                <div class="profile-cover-img-wrapper">
                                    <img id="editProfileCoverImgModal" class="profile-cover-img" src="../assets/img/1920x400/img1.jpg" alt="Image Description">

                                    <!-- Custom File Cover -->
                                    <div class="profile-cover-content profile-cover-btn p-3">
                                        <div class="custom-file-btn">
                                            <input type="file" class="js-file-attach custom-file-btn-input" id="editProfileCoverUplaoderModal"
                                                   data-hs-file-attach-options='{
                                    "textTarget": "#editProfileCoverImgModal",
                                    "mode": "image",
                                    "targetAttr": "src"
                                 }'>
                                            <label class="custom-file-btn-label btn btn-sm btn-white" for="editProfileCoverUplaoderModal">
                                                <i class="tio-add-photo"></i>
                                                <span class="d-none d-sm-inline-block ml-1">Upload header</span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- End Custom File Cover -->
                                </div>
                            </div>
                            <!-- End Profile Cover -->

                            <!-- Avatar -->
                            <label class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar mb-5" for="editAvatarUploaderModal">
                                <img id="editAvatarImgModal" class="avatar-img" src="../assets/img/160x160/img9.jpg" alt="Image Description">

                                <input type="file" class="js-file-attach avatar-uploader-input" id="editAvatarUploaderModal"
                                       data-hs-file-attach-options='{
                              "textTarget": "#editAvatarImgModal",
                              "mode": "image",
                              "targetAttr": "src"
                           }'>

                                <span class="avatar-uploader-trigger">
                    <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                  </span>
                            </label>
                            <!-- End Avatar -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editFirstNameModalLabel" class="col-sm-3 col-form-label input-label">Full name <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Displayed on public forums, such as Front."></i></label>

                                <div class="col-sm-9">
                                    <div class="js-form-message input-group input-group-sm-down-break">
                                        <input type="text" class="form-control" name="editFirstNameModal" id="editFirstNameModalLabel" placeholder="Your first name" aria-label="Your first name" value="Ella">
                                        <input type="text" class="form-control" name="editLastNameModal" id="editLastNameModalLabel" placeholder="Your last name" aria-label="Your last name" value="Lauda">
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editEmailModalLabel" class="col-sm-3 col-form-label input-label">Email</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="email" class="form-control" name="editEmailModal" id="editEmailModalLabel" placeholder="Email" aria-label="Email" value="ella@example.com">
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editPhoneLabel" class="col-sm-3 col-form-label input-label">Phone <span class="input-label-secondary">(Optional)</span></label>

                                <div class="col-sm-9">
                                    <div class="input-group input-group-sm-down-break align-items-center">
                                        <input type="text" class="js-masked-input form-control" name="phone" id="editPhoneLabel" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx" value="1(609)972-22-22"
                                               data-hs-mask-options='{
                                 "template": "+0(000)000-00-00"
                               }'>

                                        <div class="input-group-append">
                                            <!-- Select -->
                                            <div class="select2-custom">
                                                <select class="js-select2-custom" name="editPhoneSelect"
                                                        data-hs-select2-options='{
                                    "minimumResultsForSearch": "Infinity",
                                    "dropdownAutoWidth": true,
                                    "width": "6rem"
                                  }'>
                                                    <option value="Mobile" selected>Mobile</option>
                                                    <option value="Home">Home</option>
                                                    <option value="Work">Work</option>
                                                    <option value="Fax">Fax</option>
                                                    <option value="Direct">Direct</option>
                                                </select>
                                                <!-- End Select -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editOrganizationModalLabel" class="col-sm-3 col-form-label input-label">Organization</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="form-control" name="editOrganizationModal" id="editOrganizationModalLabel" placeholder="Your organization" aria-label="Your organization" value="Htmlstream">
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editDepartmentModalLabel" class="col-sm-3 col-form-label input-label">Department</label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="editDepartmentModal" id="editDepartmentModalLabel" placeholder="Your department" aria-label="Your department">
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label class="col-sm-3 col-form-label input-label">Account type</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message input-group input-group-sm-down-break">
                                        <!-- Custom Radio -->
                                        <div class="form-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="editUserModalAccountTypeModalRadio" id="editUserModalAccountTypeModalRadio1" checked>
                                                <label class="custom-control-label" for="editUserModalAccountTypeModalRadio1">Individual</label>
                                            </div>
                                        </div>
                                        <!-- End Custom Radio -->

                                        <!-- Custom Radio -->
                                        <div class="form-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="editUserModalAccountTypeModalRadio" id="editUserModalAccountTypeModalRadio2">
                                                <label class="custom-control-label" for="editUserModalAccountTypeModalRadio2">Company</label>
                                            </div>
                                        </div>
                                        <!-- End Custom Radio -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-white mr-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="billing-address" role="tabpanel" aria-labelledby="billing-address-tab">
                        <form>
                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editLocationModalLabel" class="col-sm-3 col-form-label input-label">Location</label>

                                <div class="col-sm-9">
                                    <!-- Select -->
                                    <div class="js-form-message mb-3">
                                        <select class="js-select2-custom" id="editLocationModalLabel"
                                                data-hs-select2-options='{
                                  "customClass": "custom-select",
                                  "placeholder": "Select country",
                                  "searchInputPlaceholder": "Search a country"
                                }'>
                                            <option label="empty"></option>
                                            <option value="AF" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/af.svg" alt="Afghanistan Flag" />Afghanistan</span>'>Afghanistan</option>
                                            <option value="AX" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ax.svg" alt="Aland Islands Flag" />Aland Islands</span>'>Aland Islands</option>
                                            <option value="AL" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/al.svg" alt="Albania Flag" />Albania</span>'>Albania</option>
                                            <option value="DZ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/dz.svg" alt="Algeria Flag" />Algeria</span>'>Algeria</option>
                                            <option value="AS" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/as.svg" alt="American Samoa Flag" />American Samoa</span>'>American Samoa</option>
                                            <option value="AD" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ad.svg" alt="Andorra Flag" />Andorra</span>'>Andorra</option>
                                            <option value="AO" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ao.svg" alt="Angola Flag" />Angola</span>'>Angola</option>
                                            <option value="AI" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ai.svg" alt="Anguilla Flag" />Anguilla</span>'>Anguilla</option>
                                            <option value="AG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ag.svg" alt="Antigua and Barbuda Flag" />Antigua and Barbuda</span>'>Antigua and Barbuda</option>
                                            <option value="AR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ar.svg" alt="Argentina Flag" />Argentina</span>'>Argentina</option>
                                            <option value="AM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/am.svg" alt="Armenia Flag" />Armenia</span>'>Armenia</option>
                                            <option value="AW" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/aw.svg" alt="Aruba Flag" />Aruba</span>'>Aruba</option>
                                            <option value="AU" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/au.svg" alt="Australia Flag" />Australia</span>'>Australia</option>
                                            <option value="AT" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/at.svg" alt="Austria Flag" />Austria</span>'>Austria</option>
                                            <option value="AZ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/az.svg" alt="Azerbaijan Flag" />Azerbaijan</span>'>Azerbaijan</option>
                                            <option value="BS" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bs.svg" alt="Bahamas Flag" />Bahamas</span>'>Bahamas</option>
                                            <option value="BH" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bh.svg" alt="Bahrain Flag" />Bahrain</span>'>Bahrain</option>
                                            <option value="BD" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bd.svg" alt="Bangladesh Flag" />Bangladesh</span>'>Bangladesh</option>
                                            <option value="BB" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bb.svg" alt="Barbados Flag" />Barbados</span>'>Barbados</option>
                                            <option value="BY" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/by.svg" alt="Belarus Flag" />Belarus</span>'>Belarus</option>
                                            <option value="BE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/be.svg" alt="Belgium Flag" />Belgium</span>'>Belgium</option>
                                            <option value="BZ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bz.svg" alt="Belize Flag" />Belize</span>'>Belize</option>
                                            <option value="BJ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bj.svg" alt="Benin Flag" />Benin</span>'>Benin</option>
                                            <option value="BM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bm.svg" alt="Bermuda Flag" />Bermuda</span>'>Bermuda</option>
                                            <option value="BT" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bt.svg" alt="Bhutan Flag" />Bhutan</span>'>Bhutan</option>
                                            <option value="BO" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bo.svg" alt="Bolivia (Plurinational State of) Flag" />Bolivia (Plurinational State of)</span>'>Bolivia (Plurinational State of)</option>
                                            <option value="BQ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bq.svg" alt="Bonaire, Sint Eustatius and Saba Flag" />Bonaire, Sint Eustatius and Saba</span>'>Bonaire, Sint Eustatius and Saba</option>
                                            <option value="BA" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ba.svg" alt="Bosnia and Herzegovina Flag" />Bosnia and Herzegovina</span>'>Bosnia and Herzegovina</option>
                                            <option value="BW" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bw.svg" alt="Botswana Flag" />Botswana</span>'>Botswana</option>
                                            <option value="BR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/br.svg" alt="Brazil Flag" />Brazil</span>'>Brazil</option>
                                            <option value="IO" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/io.svg" alt="British Indian Ocean Territory Flag" />British Indian Ocean Territory</span>'>British Indian Ocean Territory</option>
                                            <option value="BN" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bn.svg" alt="Brunei Darussalam Flag" />Brunei Darussalam</span>'>Brunei Darussalam</option>
                                            <option value="BG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bg.svg" alt="Bulgaria Flag" />Bulgaria</span>'>Bulgaria</option>
                                            <option value="BF" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bf.svg" alt="Burkina Faso Flag" />Burkina Faso</span>'>Burkina Faso</option>
                                            <option value="BI" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bi.svg" alt="Burundi Flag" />Burundi</span>'>Burundi</option>
                                            <option value="CV" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cv.svg" alt="Cabo Verde Flag" />Cabo Verde</span>'>Cabo Verde</option>
                                            <option value="KH" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/kh.svg" alt="Cambodia Flag" />Cambodia</span>'>Cambodia</option>
                                            <option value="CM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cm.svg" alt="Cameroon Flag" />Cameroon</span>'>Cameroon</option>
                                            <option value="CA" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ca.svg" alt="Canada Flag" />Canada</span>'>Canada</option>
                                            <option value="KY" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ky.svg" alt="Cayman Islands Flag" />Cayman Islands</span>'>Cayman Islands</option>
                                            <option value="CF" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cf.svg" alt="Central African Republic Flag" />Central African Republic</span>'>Central African Republic</option>
                                            <option value="TD" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/td.svg" alt="Chad Flag" />Chad</span>'>Chad</option>
                                            <option value="CL" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cl.svg" alt="Chile Flag" />Chile</span>'>Chile</option>
                                            <option value="CN" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cn.svg" alt="China Flag" />China</span>'>China</option>
                                            <option value="CX" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cx.svg" alt="Christmas Island Flag" />Christmas Island</span>'>Christmas Island</option>
                                            <option value="CC" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cc.svg" alt="Cocos (Keeling) Islands Flag" />Cocos (Keeling) Islands</span>'>Cocos (Keeling) Islands</option>
                                            <option value="CO" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/co.svg" alt="Colombia Flag" />Colombia</span>'>Colombia</option>
                                            <option value="KM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/km.svg" alt="Comoros Flag" />Comoros</span>'>Comoros</option>
                                            <option value="CK" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ck.svg" alt="Cook Islands Flag" />Cook Islands</span>'>Cook Islands</option>
                                            <option value="CR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cr.svg" alt="Costa Rica Flag" />Costa Rica</span>'>Costa Rica</option>
                                            <option value="HR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/hr.svg" alt="Croatia Flag" />Croatia</span>'>Croatia</option>
                                            <option value="CU" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cu.svg" alt="Cuba Flag" />Cuba</span>'>Cuba</option>
                                            <option value="CW" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cw.svg" alt="Curaçao Flag" />Curaçao</span>'>Curaçao</option>
                                            <option value="CY" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cy.svg" alt="Cyprus Flag" />Cyprus</span>'>Cyprus</option>
                                            <option value="CZ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cz.svg" alt="Czech Republic Flag" />Czech Republic</span>'>Czech Republic</option>
                                            <option value="CI" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ci.svg" alt=Côte d&apos;Ivoire Flag" />Côte d&apos;Ivoire</span>'>Côte d'Ivoire</option>
                                            <option value="CD" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cd.svg" alt="Democratic Republic of the Congo Flag" />Democratic Republic of the Congo</span>'>Democratic Republic of the Congo</option>
                                            <option value="DK" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/dk.svg" alt="Denmark Flag" />Denmark</span>'>Denmark</option>
                                            <option value="DJ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/dj.svg" alt="Djibouti Flag" />Djibouti</span>'>Djibouti</option>
                                            <option value="DM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/dm.svg" alt="Dominica Flag" />Dominica</span>'>Dominica</option>
                                            <option value="DO" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/do.svg" alt="Dominican Republic Flag" />Dominican Republic</span>'>Dominican Republic</option>
                                            <option value="EC" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ec.svg" alt="Ecuador Flag" />Ecuador</span>'>Ecuador</option>
                                            <option value="EG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/eg.svg" alt="Egypt Flag" />Egypt</span>'>Egypt</option>
                                            <option value="SV" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sv.svg" alt="El Salvador Flag" />El Salvador</span>'>El Salvador</option>
                                            <option value="GB-ENG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gb-eng.svg" alt="England Flag" />England</span>'>England</option>
                                            <option value="GQ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gq.svg" alt="Equatorial Guinea Flag" />Equatorial Guinea</span>'>Equatorial Guinea</option>
                                            <option value="ER" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/er.svg" alt="Eritrea Flag" />Eritrea</span>'>Eritrea</option>
                                            <option value="EE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ee.svg" alt="Estonia Flag" />Estonia</span>'>Estonia</option>
                                            <option value="ET" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/et.svg" alt="Ethiopia Flag" />Ethiopia</span>'>Ethiopia</option>
                                            <option value="FK" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/fk.svg" alt="Falkland Islands Flag" />Falkland Islands</span>'>Falkland Islands</option>
                                            <option value="FO" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/fo.svg" alt="Faroe Islands Flag" />Faroe Islands</span>'>Faroe Islands</option>
                                            <option value="FM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/fm.svg" alt="Federated States of Micronesia Flag" />Federated States of Micronesia</span>'>Federated States of Micronesia</option>
                                            <option value="FJ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/fj.svg" alt="Fiji Flag" />Fiji</span>'>Fiji</option>
                                            <option value="FI" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/fi.svg" alt="Finland Flag" />Finland</span>'>Finland</option>
                                            <option value="FR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/fr.svg" alt="France Flag" />France</span>'>France</option>
                                            <option value="GF" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gf.svg" alt="French Guiana Flag" />French Guiana</span>'>French Guiana</option>
                                            <option value="PF" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/pf.svg" alt="French Polynesia Flag" />French Polynesia</span>'>French Polynesia</option>
                                            <option value="TF" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/tf.svg" alt="French Southern Territories Flag" />French Southern Territories</span>'>French Southern Territories</option>
                                            <option value="GA" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ga.svg" alt="Gabon Flag" />Gabon</span>'>Gabon</option>
                                            <option value="GM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gm.svg" alt="Gambia Flag" />Gambia</span>'>Gambia</option>
                                            <option value="GE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ge.svg" alt="Georgia Flag" />Georgia</span>'>Georgia</option>
                                            <option value="DE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/de.svg" alt="Germany Flag" />Germany</span>'>Germany</option>
                                            <option value="GH" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gh.svg" alt="Ghana Flag" />Ghana</span>'>Ghana</option>
                                            <option value="GI" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gi.svg" alt="Gibraltar Flag" />Gibraltar</span>'>Gibraltar</option>
                                            <option value="GR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gr.svg" alt="Greece Flag" />Greece</span>'>Greece</option>
                                            <option value="GL" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gl.svg" alt="Greenland Flag" />Greenland</span>'>Greenland</option>
                                            <option value="GD" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gd.svg" alt="Grenada Flag" />Grenada</span>'>Grenada</option>
                                            <option value="GP" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gp.svg" alt="Guadeloupe Flag" />Guadeloupe</span>'>Guadeloupe</option>
                                            <option value="GU" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gu.svg" alt="Guam Flag" />Guam</span>'>Guam</option>
                                            <option value="GT" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gt.svg" alt="Guatemala Flag" />Guatemala</span>'>Guatemala</option>
                                            <option value="GG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gg.svg" alt="Guernsey Flag" />Guernsey</span>'>Guernsey</option>
                                            <option value="GN" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gn.svg" alt="Guinea Flag" />Guinea</span>'>Guinea</option>
                                            <option value="GW" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gw.svg" alt="Guinea-Bissau Flag" />Guinea-Bissau</span>'>Guinea-Bissau</option>
                                            <option value="GY" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gy.svg" alt="Guyana Flag" />Guyana</span>'>Guyana</option>
                                            <option value="HT" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ht.svg" alt="Haiti Flag" />Haiti</span>'>Haiti</option>
                                            <option value="VA" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/va.svg" alt="Holy See Flag" />Holy See</span>'>Holy See</option>
                                            <option value="HN" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/hn.svg" alt="Honduras Flag" />Honduras</span>'>Honduras</option>
                                            <option value="HK" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/hk.svg" alt="Hong Kong Flag" />Hong Kong</span>'>Hong Kong</option>
                                            <option value="HU" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/hu.svg" alt="Hungary Flag" />Hungary</span>'>Hungary</option>
                                            <option value="IS" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/is.svg" alt="Iceland Flag" />Iceland</span>'>Iceland</option>
                                            <option value="IN" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/in.svg" alt="India Flag" />India</span>'>India</option>
                                            <option value="ID" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/id.svg" alt="Indonesia Flag" />Indonesia</span>'>Indonesia</option>
                                            <option value="IR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ir.svg" alt="Iran (Islamic Republic of) Flag" />Iran (Islamic Republic of)</span>'>Iran (Islamic Republic of)</option>
                                            <option value="IQ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/iq.svg" alt="Iraq Flag" />Iraq</span>'>Iraq</option>
                                            <option value="IE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ie.svg" alt="Ireland Flag" />Ireland</span>'>Ireland</option>
                                            <option value="IM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/im.svg" alt="Isle of Man Flag" />Isle of Man</span>'>Isle of Man</option>
                                            <option value="IL" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/il.svg" alt="Israel Flag" />Israel</span>'>Israel</option>
                                            <option value="IT" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/it.svg" alt="Italy Flag" />Italy</span>'>Italy</option>
                                            <option value="JM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/jm.svg" alt="Jamaica Flag" />Jamaica</span>'>Jamaica</option>
                                            <option value="JP" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/jp.svg" alt="Japan Flag" />Japan</span>'>Japan</option>
                                            <option value="JE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/je.svg" alt="Jersey Flag" />Jersey</span>'>Jersey</option>
                                            <option value="JO" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/jo.svg" alt="Jordan Flag" />Jordan</span>'>Jordan</option>
                                            <option value="KZ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/kz.svg" alt="Kazakhstan Flag" />Kazakhstan</span>'>Kazakhstan</option>
                                            <option value="KE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ke.svg" alt="Kenya Flag" />Kenya</span>'>Kenya</option>
                                            <option value="KI" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ki.svg" alt="Kiribati Flag" />Kiribati</span>'>Kiribati</option>
                                            <option value="KW" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/kw.svg" alt="Kuwait Flag" />Kuwait</span>'>Kuwait</option>
                                            <option value="KG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/kg.svg" alt="Kyrgyzstan Flag" />Kyrgyzstan</span>'>Kyrgyzstan</option>
                                            <option value="LA" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/la.svg" alt="Laos Flag" />Laos</span>'>Laos</option>
                                            <option value="LV" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/lv.svg" alt="Latvia Flag" />Latvia</span>'>Latvia</option>
                                            <option value="LB" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/lb.svg" alt="Lebanon Flag" />Lebanon</span>'>Lebanon</option>
                                            <option value="LS" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ls.svg" alt="Lesotho Flag" />Lesotho</span>'>Lesotho</option>
                                            <option value="LR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/lr.svg" alt="Liberia Flag" />Liberia</span>'>Liberia</option>
                                            <option value="LY" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ly.svg" alt="Libya Flag" />Libya</span>'>Libya</option>
                                            <option value="LI" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/li.svg" alt="Liechtenstein Flag" />Liechtenstein</span>'>Liechtenstein</option>
                                            <option value="LT" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/lt.svg" alt="Lithuania Flag" />Lithuania</span>'>Lithuania</option>
                                            <option value="LU" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/lu.svg" alt="Luxembourg Flag" />Luxembourg</span>'>Luxembourg</option>
                                            <option value="MO" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mo.svg" alt="Macau Flag" />Macau</span>'>Macau</option>
                                            <option value="MG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mg.svg" alt="Madagascar Flag" />Madagascar</span>'>Madagascar</option>
                                            <option value="MW" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mw.svg" alt="Malawi Flag" />Malawi</span>'>Malawi</option>
                                            <option value="MY" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/my.svg" alt="Malaysia Flag" />Malaysia</span>'>Malaysia</option>
                                            <option value="MV" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mv.svg" alt="Maldives Flag" />Maldives</span>'>Maldives</option>
                                            <option value="ML" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ml.svg" alt="Mali Flag" />Mali</span>'>Mali</option>
                                            <option value="MT" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mt.svg" alt="Malta Flag" />Malta</span>'>Malta</option>
                                            <option value="MH" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mh.svg" alt="Marshall Islands Flag" />Marshall Islands</span>'>Marshall Islands</option>
                                            <option value="MQ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mq.svg" alt="Martinique Flag" />Martinique</span>'>Martinique</option>
                                            <option value="MR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mr.svg" alt="Mauritania Flag" />Mauritania</span>'>Mauritania</option>
                                            <option value="MU" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mu.svg" alt="Mauritius Flag" />Mauritius</span>'>Mauritius</option>
                                            <option value="YT" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/yt.svg" alt="Mayotte Flag" />Mayotte</span>'>Mayotte</option>
                                            <option value="MX" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mx.svg" alt="Mexico Flag" />Mexico</span>'>Mexico</option>
                                            <option value="MD" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/md.svg" alt="Moldova Flag" />Moldova</span>'>Moldova</option>
                                            <option value="MC" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mc.svg" alt="Monaco Flag" />Monaco</span>'>Monaco</option>
                                            <option value="MN" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mn.svg" alt="Mongolia Flag" />Mongolia</span>'>Mongolia</option>
                                            <option value="ME" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/me.svg" alt="Montenegro Flag" />Montenegro</span>'>Montenegro</option>
                                            <option value="MS" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ms.svg" alt="Montserrat Flag" />Montserrat</span>'>Montserrat</option>
                                            <option value="MA" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ma.svg" alt="Morocco Flag" />Morocco</span>'>Morocco</option>
                                            <option value="MZ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mz.svg" alt="Mozambique Flag" />Mozambique</span>'>Mozambique</option>
                                            <option value="MM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mm.svg" alt="Myanmar Flag" />Myanmar</span>'>Myanmar</option>
                                            <option value="NA" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/na.svg" alt="Namibia Flag" />Namibia</span>'>Namibia</option>
                                            <option value="NR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/nr.svg" alt="Nauru Flag" />Nauru</span>'>Nauru</option>
                                            <option value="NP" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/np.svg" alt="Nepal Flag" />Nepal</span>'>Nepal</option>
                                            <option value="NL" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/nl.svg" alt="Netherlands Flag" />Netherlands</span>'>Netherlands</option>
                                            <option value="NC" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/nc.svg" "alt="New Caledonia Flag" />New Caledonia</span>'>New Caledonia</option>
                                            <option value="NZ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/nz.svg" alt="New Zealand Flag" />New Zealand</span>'>New Zealand</option>
                                            <option value="NI" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ni.svg" alt="Nicaragua Flag" />Nicaragua</span>'>Nicaragua</option>
                                            <option value="NE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ne.svg" alt="Niger Flag" />Niger</span>'>Niger</option>
                                            <option value="NG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ng.svg" alt="Nigeria Flag" />Nigeria</span>'>Nigeria</option>
                                            <option value="NU" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/nu.svg" alt="Niue Flag" />Niue</span>'>Niue</option>
                                            <option value="NF" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/nf.svg" alt="Norfolk Island Flag" />Norfolk Island</span>'>Norfolk Island</option>
                                            <option value="KP" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/kp.svg" alt="North Korea Flag" />North Korea</span>'>North Korea</option>
                                            <option value="MK" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mk.svg" alt="North Macedonia Flag" />North Macedonia</span>'>North Macedonia</option>
                                            <option value="GB-NIR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gb-nir.svg" alt="Northern Ireland Flag" />Northern Ireland</span>'>Northern Ireland</option>
                                            <option value="MP" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mp.svg" alt="Northern Markna Islands Flag" />Northern Markna Islands</span>'>Northern Markna Islands</option>
                                            <option value="NO" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/no.svg" alt="Norway Flag" />Norway</span>'>Norway</option>
                                            <option value="OM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/om.svg" alt="Oman Flag" />Oman</span>'>Oman</option>
                                            <option value="PK" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/pk.svg" alt="Pakistan Flag" />Pakistan</span>'>Pakistan</option>
                                            <option value="PW" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/pw.svg" alt="Palau Flag" />Palau</span>'>Palau</option>
                                            <option value="PA" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/pa.svg" alt="Panama Flag" />Panama</span>'>Panama</option>
                                            <option value="PG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/pg.svg" alt="Papua New Guinea Flag" />Papua New Guinea</span>'>Papua New Guinea</option>
                                            <option value="PY" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/py.svg" alt="Paraguay Flag" />Paraguay</span>'>Paraguay</option>
                                            <option value="PE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/pe.svg" alt="Peru Flag" />Peru</span>'>Peru</option>
                                            <option value="PH" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ph.svg" alt="Philippines Flag" />Philippines</span>'>Philippines</option>
                                            <option value="PN" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/pn.svg" alt="Pitcairn Flag" />Pitcairn</span>'>Pitcairn</option>
                                            <option value="PL" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/pl.svg" alt="Poland Flag" />Poland</span>'>Poland</option>
                                            <option value="PT" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/pt.svg" alt="Portugal Flag" />Portugal</span>'>Portugal</option>
                                            <option value="PR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/pr.svg" alt="Puerto Rico Flag" />Puerto Rico</span>'>Puerto Rico</option>
                                            <option value="QA" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/qa.svg" alt="Qatar Flag" />Qatar</span>'>Qatar</option>
                                            <option value="CG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/cg.svg" alt="Republic of the Congo Flag" />Republic of the Congo</span>'>Republic of the Congo</option>
                                            <option value="RO" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ro.svg" alt="Romania Flag" />Romania</span>'>Romania</option>
                                            <option value="RU" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ru.svg" alt="Russia Flag" />Russia</span>'>Russia</option>
                                            <option value="RW" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/rw.svg" alt="Rwanda Flag" />Rwanda</span>'>Rwanda</option>
                                            <option value="RE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/re.svg" alt="Réunion Flag" />Réunion</span>'>Réunion</option>
                                            <option value="BL" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/bl.svg" alt="Saint Barthélemy Flag" />Saint Barthélemy</span>'>Saint Barthélemy</option>
                                            <option value="SH" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sh.svg" alt="Saint Helena, Ascension and Tristan da Cunha Flag" />Saint Helena, Ascension and Tristan da Cunha</span>'>Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option value="KN" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/kn.svg" alt="Saint Kitts and Nevis Flag" />Saint Kitts and Nevis</span>'>Saint Kitts and Nevis</option>
                                            <option value="LC" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/lc.svg" alt="Saint Lucia Flag" />Saint Lucia</span>'>Saint Lucia</option>
                                            <option value="MF" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/mf.svg" alt="Saint Martin Flag" />Saint Martin</span>'>Saint Martin</option>
                                            <option value="PM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/pm.svg" alt="Saint Pierre and Miquelon Flag" />Saint Pierre and Miquelon</span>'>Saint Pierre and Miquelon</option>
                                            <option value="VC" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/vc.svg" alt="Saint Vincent and the Grenadines Flag" />Saint Vincent and the Grenadines</span>'>Saint Vincent and the Grenadines</option>
                                            <option value="WS" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ws.svg" alt="Samoa Flag" />Samoa</span>'>Samoa</option>
                                            <option value="SM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sm.svg" "alt="San Marino Flag" />San Marino</span>'>San Marino</option>
                                            <option value="ST" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/st.svg" "alt="Sao Tome and Principe Flag" />Sao Tome and Principe</span>'>Sao Tome and Principe</option>
                                            <option value="SA" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sa.svg" alt="Saudi Arabia Flag" />Saudi Arabia</span>'>Saudi Arabia</option>
                                            <option value="GB-SCT" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gb-sct.svg" alt="Scotland Flag" />Scotland</span>'>Scotland</option>
                                            <option value="SN" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sn.svg" alt="Senegal Flag" />Senegal</span>'>Senegal</option>
                                            <option value="RS" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/rs.svg" alt="Serbia Flag" />Serbia</span>'>Serbia</option>
                                            <option value="SC" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sc.svg" alt="Seychelles Flag" />Seychelles</span>'>Seychelles</option>
                                            <option value="SL" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sl.svg" alt="Sierra Leone Flag" />Sierra Leone</span>'>Sierra Leone</option>
                                            <option value="SG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sg.svg" alt="Singapore Flag" />Singapore</span>'>Singapore</option>
                                            <option value="SX" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sx.svg" alt="Sint Maarten Flag" />Sint Maarten</span>'>Sint Maarten</option>
                                            <option value="SK" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sk.svg" alt="Slovakia Flag" />Slovakia</span>'>Slovakia</option>
                                            <option value="SI" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/si.svg" alt="Slovenia Flag" />Slovenia</span>'>Slovenia</option>
                                            <option value="SB" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sb.svg" alt="Solomon Islands Flag" />Solomon Islands</span>'>Solomon Islands</option>
                                            <option value="SO" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/so.svg" alt="Somalia Flag" />Somalia</span>'>Somalia</option>
                                            <option value="ZA" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/za.svg" alt="South Africa Flag" />South Africa</span>'>South Africa</option>
                                            <option value="GS" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gs.svg" alt="South Georgia and the South Sandwich Islands Flag" />South Georgia and the South Sandwich Islands</span>'>South Georgia and the South Sandwich Islands</option>
                                            <option value="KR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/kr.svg" alt="South Korea Flag" />South Korea</span>'>South Korea</option>
                                            <option value="SS" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ss.svg" alt="South Sudan Flag" />South Sudan</span>'>South Sudan</option>
                                            <option value="ES" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/es.svg" alt="Spain Flag" />Spain</span>'>Spain</option>
                                            <option value="LK" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/lk.svg" "alt="Sri Lanka Flag" />Sri Lanka</span>'>Sri Lanka</option>
                                            <option value="PS" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ps.svg" alt="State of Palestine Flag" />State of Palestine</span>'>State of Palestine</option>
                                            <option value="SD" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sd.svg" alt="Sudan Flag" />Sudan</span>'>Sudan</option>
                                            <option value="SR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sr.svg" alt="Suriname Flag" />Suriname</span>'>Suriname</option>
                                            <option value="SJ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sj.svg" alt="Svalbard and Jan Mayen Flag" />Svalbard and Jan Mayen</span>'>Svalbard and Jan Mayen</option>
                                            <option value="SZ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sz.svg" alt="Swaziland Flag" />Swaziland</span>'>Swaziland</option>
                                            <option value="SE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/se.svg" alt="Sweden Flag" />Sweden</span>'>Sweden</option>
                                            <option value="CH" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ch.svg" alt="Switzerland Flag" />Switzerland</span>'>Switzerland</option>
                                            <option value="SY" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/sy.svg" alt="Syrian Arab Republic Flag" />Syrian Arab Republic</span>'>Syrian Arab Republic</option>
                                            <option value="TW" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/tw.svg" alt="Taiwan Flag" />Taiwan</span>'>Taiwan</option>
                                            <option value="TJ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/tj.svg" alt="Tajikistan Flag" />Tajikistan</span>'>Tajikistan</option>
                                            <option value="TZ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/tz.svg" alt="Tanzania Flag" />Tanzania</span>'>Tanzania</option>
                                            <option value="TH" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/th.svg" alt="Thailand Flag" />Thailand</span>'>Thailand</option>
                                            <option value="TL" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/tl.svg" alt="Timor-Leste Flag" />Timor-Leste</span>'>Timor-Leste</option>
                                            <option value="TG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/tg.svg" alt="Togo Flag" />Togo</span>'>Togo</option>
                                            <option value="TK" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/tk.svg" alt="Tokelau Flag" />Tokelau</span>'>Tokelau</option>
                                            <option value="TO" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/to.svg" alt="Tonga Flag" />Tonga</span>'>Tonga</option>
                                            <option value="TT" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/tt.svg" alt="Trinidad and Tobago Flag" />Trinidad and Tobago</span>'>Trinidad and Tobago</option>
                                            <option value="TN" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/tn.svg" alt="Tunisia Flag" />Tunisia</span>'>Tunisia</option>
                                            <option value="TR" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/tr.svg" alt="Turkey Flag" />Turkey</span>'>Turkey</option>
                                            <option value="TM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/tm.svg" alt="Turkmenistan Flag" />Turkmenistan</span>'>Turkmenistan</option>
                                            <option value="TC" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/tc.svg" alt="Turks and Caicos Islands Flag" />Turks and Caicos Islands</span>'>Turks and Caicos Islands</option>
                                            <option value="TV" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/tv.svg" alt="Tuvalu Flag" />Tuvalu</span>'>Tuvalu</option>
                                            <option value="UG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ug.svg" alt="Uganda Flag" />Uganda</span>'>Uganda</option>
                                            <option value="UA" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ua.svg" alt="Ukraine Flag" />Ukraine</span>'>Ukraine</option>
                                            <option value="AE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ae.svg" alt="United Arab Emirates Flag" />United Arab Emirates</span>'>United Arab Emirates</option>
                                            <option value="GB" selected data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gb.svg" alt="United Kingdom Flag" />United Kingdom</span>'>United Kingdom</option>
                                            <option value="UM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/um.svg" alt="United States Minor Outlying Islands Flag" />United States Minor Outlying Islands</span>'>United States Minor Outlying Islands</option>
                                            <option value="US" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="United States of America Flag" />United States of America</span>'>United States of America</option>
                                            <option value="UY" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/uy.svg" alt="Uruguay Flag" />Uruguay</span>'>Uruguay</option>
                                            <option value="UZ" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/uz.svg" alt="Uzbekistan Flag" />Uzbekistan</span>'>Uzbekistan</option>
                                            <option value="VU" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/vu.svg" alt="Vanuatu Flag" />Vanuatu</span>'>Vanuatu</option>
                                            <option value="VE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ve.svg" alt="Venezuela (Bolivarian Republic of) Flag" />Venezuela (Bolivarian Republic of)</span>'>Venezuela (Bolivarian Republic of)</option>
                                            <option value="VN" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/vn.svg" alt="Vietnam Flag" />Vietnam</span>'>Vietnam</option>
                                            <option value="VG" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/vg.svg" alt="Virgin Islands (British) Flag" />Virgin Islands (British)</span>'>Virgin Islands (British)</option>
                                            <option value="VI" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/vi.svg" alt="Virgin Islands (U.S.) Flag" />Virgin Islands (U.S.)</span>'>Virgin Islands (U.S.)</option>
                                            <option value="GB-WLS" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/gb-wls.svg" alt="Wales Flag" />Wales</span>'>Wales</option>
                                            <option value="WF" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/wf.svg" alt="Wallis and Futuna Flag" />Wallis and Futuna</span>'>Wallis and Futuna</option>
                                            <option value="EH" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/eh.svg" alt="Western Sahara Flag" />Western Sahara</span>'>Western Sahara</option>
                                            <option value="YE" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/ye.svg" alt="Yemen Flag" />Yemen</span>'>Yemen</option>
                                            <option value="ZM" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/zm.svg" alt="Zambia Flag" />Zambia</span>'>Zambia</option>
                                            <option value="ZW" data-option-template='<span class="d-flex align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/vendor/flag-icon-css/flags/1x1/zw.svg" alt="Zimbabwe Flag" />Zimbabwe</span>'>Zimbabwe</option>
                                        </select>
                                    </div>
                                    <!-- End Select -->

                                    <div class="js-form-message mb-3">
                                        <input type="text" class="form-control" name="editCityModal" id="editCityModalLabel" placeholder="City" aria-label="City" value="London">
                                    </div>
                                    <input type="text" class="form-control" name="editStateModal" id="editStateModalLabel" placeholder="State" aria-label="State">
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editAddressLine1ModalLabel" class="col-sm-3 col-form-label input-label">Address line 1</label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="form-control" name="editAddressLine1Modal" id="editAddressLine1ModalLabel" placeholder="Your address" aria-label="Your address" value="45 Roker Terrace, Latheronwheel">
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editAddressLine2ModalLabel" class="col-sm-3 col-form-label input-label">Address line 2 <span class="input-label-secondary">(Optional)</span></label>

                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="editAddressLine2Modal" id="editAddressLine2ModalLabel" placeholder="Your address" aria-label="Your address">
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editZipCodeModalLabel" class="col-sm-3 col-form-label input-label">Zip code <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="You can find your code in a postal address."></i></label>

                                <div class="col-sm-9">
                                    <div class="js-form-message">
                                        <input type="text" class="js-masked-input form-control" name="editZipCodeModal" id="editZipCodeModalLabel" placeholder="Your zip code" aria-label="Your zip code" value="KW5 8NW"
                                               data-hs-mask-options='{
                                 "template": "AA0 0AA"
                               }'>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <hr>

                            <!-- Toggle Switch -->
                            <label class="row form-group toggle-switch" for="editUserModalBillingPreferencesSwitch1">
                  <span class="col-8 col-sm-9 toggle-switch-content ml-0">
                    <span class="d-block text-dark mb-1">Default billing address</span>
                    <span class="d-block font-size-sm text-muted">Set as default billing address</span>
                  </span>
                                <span class="col-4 col-sm-3">
                    <input type="checkbox" class="toggle-switch-input" id="editUserModalBillingPreferencesSwitch1" checked>
                    <span class="toggle-switch-label ml-auto">
                      <span class="toggle-switch-indicator"></span>
                    </span>
                  </span>
                            </label>
                            <!-- End Toggle Switch -->

                            <!-- Toggle Switch -->
                            <label class="row form-group toggle-switch" for="editUserModalBillingPreferencesSwitch2">
                  <span class="col-8 col-sm-9 toggle-switch-content ml-0">
                    <span class="d-block text-dark mb-1">See info about people who view my profile</span>
                    <span class="d-block font-size-sm text-muted"><a class="link" href="#">More about viewer info</a>.</span>
                  </span>
                                <span class="col-4 col-sm-3">
                    <input type="checkbox" class="toggle-switch-input" id="editUserModalBillingPreferencesSwitch2">
                    <span class="toggle-switch-label ml-auto">
                      <span class="toggle-switch-indicator"></span>
                    </span>
                  </span>
                            </label>
                            <!-- End Toggle Switch -->

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-white" data-dismiss="modal" aria-label="Close">Cancel</button>
                                <span class="mx-2"></span>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                        <form>
                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editUserModalCurrentPasswordLabel" class="col-sm-3 col-form-label input-label">Current password</label>

                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="js-toggle-password form-control" name="currentPassword" id="editUserModalCurrentPasswordLabel" placeholder="Enter current password" aria-label="Enter current password"
                                               data-hs-toggle-password-options='{
                                 "target": "#editUserModalChangePassModalTarget",
                                 "defaultClass": "tio-hidden-outlined",
                                 "showClass": "tio-visible-outlined",
                                 "classChangeTarget": "#editUserModalChangePassModalIcon"
                               }'>
                                        <div id="editUserModalChangePassModalTarget" class="input-group-append">
                                            <a class="input-group-text" href="javascript:;">
                                                <i id="editUserModalChangePassModalIcon" class="tio-visible-outlined"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editUserModalNewPassword" class="col-sm-3 col-form-label input-label">New password</label>

                                <div class="col-sm-9">
                                    <input type="password" class="js-toggle-password form-control" name="editUserModalNewPassword" id="editUserModalNewPassword" placeholder="Enter new password" aria-label="Enter new password"
                                           data-hs-toggle-password-options='{
                               "target": "#editUserModalChangePassModalCheckbox"
                             }'>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <label for="editUserModalConfirmNewPasswordLabel" class="col-sm-3 col-form-label input-label">Confirm new password</label>

                                <div class="col-sm-9">
                                    <input type="password" class="js-toggle-password form-control" name="confirmNewPassword" id="editUserModalConfirmNewPasswordLabel" placeholder="Confirm your new password" aria-label="Confirm your new password"
                                           data-hs-toggle-password-options='{
                               "target": "#editUserModalChangePassModalCheckbox"
                             }'>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="row form-group">
                                <div class="col-sm-9 offset-sm-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="editUserModalChangePassModalCheckbox" class="custom-control-input">
                                        <label class="custom-control-label" for="editUserModalChangePassModalCheckbox">Show password</label>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-white mr-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                        <!-- Table -->
                        <div class="table-responsive datatable-custom">
                            <table class="table table-thead-bordered table-nowrap table-align-middle table-first-col-px-0">
                                <thead class="thead-light">
                                <tr>
                                    <th>Type</th>
                                    <th class="text-center">
                                        <div class="mb-1">
                                            <img class="avatar avatar-xs" src="../assets/svg/illustrations/at-line.svg" alt="Image Description">
                                        </div>
                                        Email
                                    </th>
                                    <th class="text-center">
                                        <div class="mb-1">
                                            <img class="avatar avatar-xs" src="../assets/svg/illustrations/world-line.svg" alt="Image Description">
                                        </div>
                                        Browser
                                    </th>
                                    <th class="text-center">
                                        <div class="mb-1">
                                            <img class="avatar avatar-xs" src="../assets/svg/illustrations/phone-line.svg" alt="Image Description">
                                        </div>
                                        App
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td>New for you</td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox1" checked>
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox2">
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox3">
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox3"></label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Account activity <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Get important notifications about you or activity you've missed"></i></td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox4" checked>
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox4"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox5" checked>
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox5"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox6" checked>
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox6"></label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>A new browser used to sign in</td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox7" checked>
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox7"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox8" checked>
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox8"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox9" checked>
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox9"></label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>A new device is linked</td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox10">
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox10"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox11" checked>
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox11"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox12">
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox12"></label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>A new device connected <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Email me when a new device connected"></i></td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox13">
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox13"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox14" checked>
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox14"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox mb-3 mr-n2">
                                            <input type="checkbox" class="custom-control-input" id="editUserModalAlertsCheckbox15" checked>
                                            <label class="custom-control-label" for="editUserModalAlertsCheckbox15"></label>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table -->

                        <hr>

                        <div class="row">
                            <div class="col-sm">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <span class="d-block mb-2">When should we send notifications?</span>

                                    <!-- Select -->
                                    <select class="js-select2-custom"
                                            data-hs-select2-options='{
                                "minimumResultsForSearch": "Infinity",
                                "customClass": "custom-select",
                                "width": "15rem"
                              }'>
                                        <option value="whenToSendNotification1">Always</option>
                                        <option value="whenToSendNotification2">Only when I'm online</option>
                                    </select>
                                    <!-- End Select -->
                                </div>
                                <!-- End Form Group -->
                            </div>

                            <div class="col-sm">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <span class="d-block mb-2">Send a daily summary ("Daily Digest") of task activity.</span>

                                    <div class="form-row">
                                        <div class="col-auto">
                                            <!-- Select -->
                                            <select class="js-select2-custom"
                                                    data-hs-select2-options='{
                                    "minimumResultsForSearch": "Infinity",
                                    "customClass": "custom-select",
                                    "dropdownAutoWidth": true,
                                    "width": true
                                  }'>
                                                <option value="EveryDay">Every day</option>
                                                <option value="weekdays" selected>Weekdays</option>
                                                <option value="Never">Never</option>
                                            </select>
                                            <!-- End Select -->
                                        </div>

                                        <div class="col-auto">
                                            <!-- Select -->
                                            <select class="js-select2-custom"
                                                    data-hs-select2-options='{
                                    "minimumResultsForSearch": "Infinity",
                                    "customClass": "custom-select",
                                    "dropdownAutoWidth": true,
                                    "width": true
                                  }'>
                                                <option value="0">at 12 AM</option>
                                                <option value="1">at 1 AM</option>
                                                <option value="2">at 2 AM</option>
                                                <option value="3">at 3 AM</option>
                                                <option value="4">at 4 AM</option>
                                                <option value="5">at 5 AM</option>
                                                <option value="6">at 6 AM</option>
                                                <option value="7">at 7 AM</option>
                                                <option value="8">at 8 AM</option>
                                                <option value="9" selected>at 9 AM</option>
                                                <option value="10">at 10 AM</option>
                                                <option value="11">at 11 AM</option>
                                                <option value="12">at 12 PM</option>
                                                <option value="13">at 1 PM</option>
                                                <option value="14">at 2 PM</option>
                                                <option value="15">at 3 PM</option>
                                                <option value="16">at 4 PM</option>
                                                <option value="17">at 5 PM</option>
                                                <option value="18">at 6 PM</option>
                                                <option value="19">at 7 PM</option>
                                                <option value="20">at 8 PM</option>
                                                <option value="21">at 9 PM</option>
                                                <option value="22">at 10 PM</option>
                                                <option value="23">at 11 PM</option>
                                            </select>
                                            <!-- End Select -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Group -->
                            </div>
                        </div>

                        <p>In order to cut back on noise, email notifications are grouped together and only sent when you're idle or offline.</p>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-white mr-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
            <!-- End Body -->
        </div>
    </div>
</div>
<!-- End Edit user Modal -->

<!-- Invoice Modal -->
<div class="modal fade" id="invoiceReceiptModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-top-cover bg-dark text-center">
                <figure class="position-absolute right-0 bottom-0 left-0 ie-modal-curved-shape">
                    <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1" style="margin-bottom: -2px;">
                        <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"/>
                    </svg>
                </figure>

                <div class="modal-close">
                    <button type="button" class="btn btn-icon btn-sm btn-ghost-light" data-dismiss="modal" aria-label="Close">
                        <i class="tio-clear tio-lg"></i>
                    </button>
                </div>
            </div>
            <!-- End Header -->

            <div class="modal-top-cover-icon">
          <span class="icon icon-lg icon-light icon-circle icon-centered shadow-soft">
            <i class="tio-receipt-outlined"></i>
          </span>
            </div>

            <!-- Body -->
            <div class="modal-body pt-3 pb-sm-5 px-sm-5">
                <div class="text-center mb-5">
                    <h2 class="mb-1">Invoice from Front</h2>
                    <span class="d-block">Invoice #3682303</span>
                </div>

                <div class="row mb-6">
                    <div class="col-md-4 mb-3">
                        <small class="text-cap">Amount paid:</small>
                        <span class="text-dark">$316.8</span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <small class="text-cap">Date paid:</small>
                        <span class="text-dark">April 22, 2020</span>
                    </div>

                    <div class="col-md-4 mb-3">
                        <small class="text-cap">Payment method:</small>
                        <div class="d-flex align-items-center">
                            <img class="avatar avatar-xss avatar-4by3 mr-2" src="../assets/svg/brands/mastercard.svg" alt="Image Description">
                            <span class="text-dark">&bull;&bull;&bull;&bull; 4242</span>
                        </div>
                    </div>
                </div>

                <small class="text-cap mb-2">Summary</small>

                <ul class="list-group mb-4">
                    <li class="list-group-item text-dark">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Payment to Front</span>
                            <span>$264.00</span>
                        </div>
                    </li>

                    <li class="list-group-item text-dark">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Tax fee</span>
                            <span>$52.8</span>
                        </div>
                    </li>

                    <li class="list-group-item list-group-item-light text-dark">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="font-weight-bold">Amount paid</span>
                            <span class="font-weight-bold">$316.8</span>
                        </div>
                    </li>
                </ul>

                <div class="d-flex justify-content-end">
                    <a class="btn btn-sm btn-white mr-2" href="#"><i class="tio-download-to mr-1"></i> PDF</a>
                    <a class="btn btn-sm btn-white" href="#"><i class="tio-print mr-1"></i> Print Details</a>
                </div>

                <hr class="my-5">

                <p class="modal-footer-text">If you have any questions, contact us at <a href="mailto:example@gmail.com">example@gmail.com</a> or call at <a href="#">+1 898 34-5492</a></p>
            </div>
            <!-- End Body -->
        </div>
    </div>
</div>
<!-- End Invoice Modal -->

<!-- New project Modal -->
<div class="modal fade" id="newProjectModal" tabindex="-1" role="dialog" aria-labelledby="newProjectModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-header">
                <h4 id="newProjectModalTitle" class="modal-title">New project</h4>

                <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal" aria-label="Close">
                    <i class="tio-clear tio-lg"></i>
                </button>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="modal-body">
                <!-- Step Form -->
                <form class="js-step-form"
                      data-hs-step-form-options='{
                  "progressSelector": "#createProjectStepFormProgress",
                  "stepsSelector": "#createProjectStepFormContent",
                  "endSelector": "#createProjectFinishBtn",
                  "isValidate": false
                }'>
                    <!-- Step -->
                    <ul id="createProjectStepFormProgress" class="js-step-progress step step-sm step-icon-sm step-inline step-item-between mb-7">
                        <li class="step-item">
                            <a class="step-content-wrapper" href="javascript:;"
                               data-hs-step-form-next-options='{
                    "targetSelector": "#createProjectStepDetails"
                  }'>
                                <span class="step-icon step-icon-soft-dark">1</span>
                                <div class="step-content">
                                    <span class="step-title">Details</span>
                                </div>
                            </a>
                        </li>

                        <li class="step-item">
                            <a class="step-content-wrapper" href="javascript:;"
                               data-hs-step-form-next-options='{
                     "targetSelector": "#createProjectStepTerms"
                   }'>
                                <span class="step-icon step-icon-soft-dark">2</span>
                                <div class="step-content">
                                    <span class="step-title">Terms</span>
                                </div>
                            </a>
                        </li>

                        <li class="step-item">
                            <a class="step-content-wrapper" href="javascript:;"
                               data-hs-step-form-next-options='{
                     "targetSelector": "#createProjectStepMembers"
                   }'>
                                <span class="step-icon step-icon-soft-dark">3</span>
                                <div class="step-content">
                                    <span class="step-title">Members</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- End Step -->

                    <!-- Content Step Form -->
                    <div id="createProjectStepFormContent">
                        <div id="createProjectStepDetails" class="active">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="input-label">Project logo</label>

                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarNewProjectUploader">
                                        <img id="avatarNewProjectImg" class="avatar-img" src="../assets/img/160x160/img2.jpg" alt="Image Description">

                                        <input type="file" class="js-file-attach avatar-uploader-input" id="avatarNewProjectUploader"
                                               data-hs-file-attach-options='{
                                "textTarget": "#avatarNewProjectImg",
                                "mode": "image",
                                "targetAttr": "src",
                                "resetTarget": ".js-file-attach-reset-img",
                                "resetImg": "../assets/img/160x160/img1.jpg"
                             }'>

                                        <span class="avatar-uploader-trigger">
                        <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                      </span>
                                    </label>
                                    <!-- End Avatar -->

                                    <button type="button" class="js-file-attach-reset-img btn btn-white">Delete</button>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="clientNewProjectLabel" class="input-label">Client</label>

                                <div class="form-row align-items-center">
                                    <div class="col-12 col-md-7 mb-3">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-account-square-outlined"></i>
                                                </div>
                                            </div>
                                            <input class="js-tagify-avatars tagify-form-control form-control" id="clientNewProjectLabel" placeholder="Add creater name" aria-label="Add creater name"
                                                   data-hs-tagify-options='{
                                 "delimiters": null,
                                 "enforceWhitelist": true,
                                 "whitelist": [
                                   {
                                     "value": "Htmlstream",
                                     "src": "../assets/svg/brands/htmlstream.svg"
                                   },{
                                     "value": "Digitalocean",
                                     "src": "../assets/svg/brands/digitalocean.svg"
                                   }, {
                                     "value": "Google",
                                     "src": "../assets/svg/brands/google.svg"
                                   }, {
                                     "value": "Mailchimp",
                                     "src": "../assets/svg/brands/mailchimp.svg"
                                   }, {
                                     "value": "Prosperops",
                                     "src": "../assets/svg/brands/prosperops.svg"
                                   }, {
                                     "value": "Spec",
                                     "src": "../assets/svg/brands/spec.svg"
                                   }, {
                                     "value": "Spotify",
                                     "src": "../assets/svg/brands/spotify.svg"
                                   }, {
                                     "value": "Frontapp",
                                     "src": "../assets/svg/brands/frontapp.svg"
                                   }, {
                                     "value": "Figma",
                                     "src": "../assets/svg/brands/figma.svg"
                                   }, {
                                     "value": "Bookingcom",
                                     "src": "../assets/svg/brands/bookingcom.svg"
                                   }
                                 ],
                                 "dropdown": {
                                   "enabled": 1,
                                   "classname": "tagify__dropdown__menu"
                                 }
                               }'>
                                        </div>
                                    </div>

                                    <span class="col-auto mb-3">or</span>

                                    <div class="col-md mb-md-3">
                                        <a class="btn btn-white" href="javascript:;">
                                            <i class="tio-add mr-1"></i>New client
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label for="projectNameNewProjectLabel" class="input-label">Project name <i class="tio-help-outlined text-body ml-1" data-toggle="tooltip" data-placement="top" title="Displayed on public forums, such as Front."></i></label>

                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tio-briefcase-outlined"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" name="projectName" id="projectNameNewProjectLabel" placeholder="Enter project name here" aria-label="Enter project name here">
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Quill -->
                            <div class="form-group">
                                <label class="input-label">Project description <span class="input-label-secondary">(Optional)</span></label>

                                <!-- Quill -->
                                <div class="quill-custom mb-3 mb-lg-7">
                                    <div id="toolbar-container">
                                        <ul class="list-inline ql-toolbar-list">
                                            <li class="list-inline-item">
                                                <button class="ql-bold"></button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button class="ql-italic"></button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button class="ql-underline"></button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button class="ql-strike"></button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button class="ql-link"></button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button class="ql-image"></button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button class="ql-blockquote"></button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button class="ql-code"></button>
                                            </li>
                                            <li class="list-inline-item">
                                                <button class="ql-list" value="bullet"></button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="js-quill" style="min-height: 15rem;"
                                         data-hs-quill-options='{
                            "placeholder": "Type your message...",
                            "toolbarBottom": true,
                            "attach": "#newProjectModal",
                            "modules": {
                              "toolbar": "#toolbar-container"
                            }
                           }'>
                                    </div>
                                </div>
                                <!-- End Quill -->
                            </div>
                            <!-- End Quill -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label for="projectDeadlineFlatpickrNewProjectLabel" class="input-label">Due date</label>

                                        <div id="projectDeadlineNewProjectFlatpickr" class="js-flatpickr flatpickr-custom input-group input-group-merge"
                                             data-hs-flatpickr-options='{
                            "appendTo": "#projectDeadlineNewProjectFlatpickr",
                            "dateFormat": "d/m/Y",
                            "wrap": true
                          }'>
                                            <div class="input-group-prepend" data-toggle>
                                                <div class="input-group-text">
                                                    <i class="tio-date-range"></i>
                                                </div>
                                            </div>

                                            <input type="text" class="flatpickr-custom-form-control form-control" id="projectDeadlineFlatpickrNewProjectLabel" placeholder="Select dates" data-input value="29/06/2020">
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>

                                <div class="col-sm-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label for="ownerNewProjectLabel" class="input-label">Owner</label>

                                        <!-- Select -->
                                        <div class="select2-custom">
                                            <select class="js-select2-custom" id="ownerNewProjectLabel"
                                                    data-hs-select2-options='{
                                  "minimumResultsForSearch": "Infinity"
                                }'>
                                                <option value="owner1" data-option-template='<span class="media align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/img/160x160/img6.jpg" alt="Avatar" /><span class="media-body">Mark Williams</span></span>'>Mark Williams</option>
                                                <option value="owner2" data-option-template='<span class="media align-items-center"><img class="avatar avatar-xss avatar-circle mr-2" src="../assets/img/160x160/img10.jpg" alt="Avatar" /><span class="media-body">Amanda Harvey</span></span>'>Amanda Harvey</option>
                                                <option value="owner3" selected data-option-template='<span class="media align-items-center"><i class="tio-user-outlined text-body mr-2"></i><span class="media-body">Assign to owner</span></span>'>Assign to owner</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                            </div>
                            <!-- End Row -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="input-label">Attach files</label>

                                <!-- Dropzone -->
                                <div id="attachFilesNewProjectLabel" class="js-dropzone dropzone-custom custom-file-boxed">
                                    <div class="dz-message custom-file-boxed-label">
                                        <img class="avatar avatar-xl avatar-4by3 mb-3" src="../assets/svg/illustrations/browse.svg" alt="Image Description">
                                        <h5 class="mb-1">Choose files to upload</h5>
                                        <p class="mb-2">or</p>
                                        <span class="btn btn-sm btn-primary">Browse files</span>
                                    </div>
                                </div>
                                <!-- End Dropzone -->
                            </div>
                            <!-- End Form Group -->

                            <label class="input-label">Default view</label>

                            <div class="form-row mb-3">
                                <div class="col-sm mb-2 mb-sm-0">
                                    <!-- Custom Radio -->
                                    <div class="form-control">
                                        <div class="custom-control custom-radio custom-radio-reverse">
                                            <input type="radio" class="custom-control-input" name="projectViewNewProjectTypeRadio" id="projectViewNewProjectTypeRadio1">
                                            <label class="custom-control-label media align-items-center" for="projectViewNewProjectTypeRadio1">
                                                <i class="tio-agenda-view-outlined text-muted mr-2"></i>
                                                <span class="media-body">
                            List
                          </span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- End Custom Radio -->
                                </div>

                                <div class="col-sm mb-2 mb-sm-0">
                                    <!-- Custom Radio -->
                                    <div class="form-control">
                                        <div class="custom-control custom-radio custom-radio-reverse">
                                            <input type="radio" class="custom-control-input" name="projectViewNewProjectTypeRadio" id="projectViewNewProjectTypeRadio2" checked>
                                            <label class="custom-control-label media align-items-center" for="projectViewNewProjectTypeRadio2">
                                                <i class="tio-table text-muted mr-2"></i>
                                                <span class="media-body">
                            Table
                          </span>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- End Custom Radio -->
                                </div>

                                <div class="col-sm mb-2 mb-sm-0">
                                    <!-- Custom Radio -->
                                    <div class="form-control">
                                        <div class="custom-control custom-radio custom-radio-reverse">
                                            <input type="radio" class="custom-control-input" name="projectViewNewProjectTypeRadio" id="projectViewNewProjectTypeRadio3" disabled>
                                            <label class="custom-control-label media align-items-center" for="projectViewNewProjectTypeRadio3">
                                                <i class="tio-align-to-center-outlined text-muted mr-2"></i>
                                                <span class="media-body">
                            Timeline
                          </span>
                                            </label>
                                        </div>
                                    </div>

                                    <span class="badge badge-soft-primary badge-pill mt-2">Coming soon...</span>
                                    <!-- End Custom Radio -->
                                </div>
                            </div>
                            <!-- End Row -->

                            <!-- Footer -->
                            <div class="d-flex align-items-center">
                                <div class="ml-auto">
                                    <button type="button" class="btn btn-primary"
                                            data-hs-step-form-next-options='{
                              "targetSelector": "#createProjectStepTerms"
                            }'>
                                        Next <i class="tio-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- End Footer -->
                        </div>

                        <div id="createProjectStepTerms" style="display: none;">
                            <!-- Form Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label for="paymentTermsNewProjectLabel" class="input-label">Terms</label>

                                        <!-- Select -->
                                        <div class="select2-custom">
                                            <select class="js-select2-custom" id="paymentTermsNewProjectLabel"
                                                    data-hs-select2-options='{
                                  "minimumResultsForSearch": "Infinity"
                                }'>
                                                <option value="fixed" selected>Fixed</option>
                                                <option value="Per hour">Per hour</option>
                                                <option value="Per day">Per day</option>
                                                <option value="Per week">Per week</option>
                                                <option value="Per month">Per month</option>
                                                <option value="Per quarter">Per quarter</option>
                                                <option value="Per year">Per year</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    <!-- End Form Group -->
                                </div>

                                <div class="col-sm-6">
                                    <label for="expectedValueNewProjectLabel" class="input-label">Expected value</label>

                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-dollar-outlined"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="expectedValue" id="expectedValueNewProjectLabel" placeholder="Enter value here" aria-label="Enter value here">
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                            </div>
                            <!-- End Form Row -->

                            <!-- Form Row -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label for="milestoneNewProjectLabel" class="input-label">Milestone <a class="small ml-1" href="javascript:;">Change probability</a></label>

                                        <!-- Select -->
                                        <div class="select2-custom">
                                            <select class="js-select2-custom" id="milestoneNewProjectLabel"
                                                    data-hs-select2-options='{
                                  "minimumResultsForSearch": "Infinity"
                                }'>
                                                <option value="New">New</option>
                                                <option value="Qualified">Qualified</option>
                                                <option value="Meeting">Meeting</option>
                                                <option value="Proposal">Proposal</option>
                                                <option value="Negotiation">Negotiation</option>
                                                <option value="Contact">Contact</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    <!-- End Form Group -->
                                </div>

                                <div class="col-lg-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label for="privacyNewProjectLabel" class="input-label mr-2">Privacy</label>

                                        <!-- Select -->
                                        <div class="select2-custom">
                                            <select class="js-select2-custom" id="privacyNewProjectLabel"
                                                    data-hs-select2-options='{
                                  "minimumResultsForSearch": "Infinity"
                                }'>
                                                <option value="privacy1" data-option-template='<span class="media"><i class="tio-group-senior tio-lg text-body mr-2" style="margin-top: .125rem;"></i><span class="media-body"><span class="d-block">Everyone</span><small class="select2-custom-hide">Public to Front Dashboard</small></span></span>'>Everyone</option>
                                                <option value="privacy2" disabled data-option-template='<span class="media"><i class="tio-lock-outlined tio-lg text-body mr-2" style="margin-top: .125rem;"></i><span class="media-body"><span class="d-block">Private to project members <span class="badge badge-soft-primary">Upgrade to Premium</span></span><small class="select2-custom-hide">Only visible to project members</small></span></span>'>Private to project members</option>
                                                <option value="privacy2" data-option-template='<span class="media"><i class="tio-user-outlined tio-lg text-body mr-2" style="margin-top: .125rem;"></i><span class="media-body"><span class="d-block">Private to me</span><small class="select2-custom-hide">Only visible to you</small></span></span>'>Private to me</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                            </div>
                            <!-- End Form Row -->

                            <!-- Checkbox -->
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="budgetNewProjectCheckbox">
                                <label class="custom-control-label" for="budgetNewProjectCheckbox">Budget resets every month</label>
                            </div>
                            <!-- End Checkbox -->

                            <!-- Checkbox -->
                            <div class="form-group custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="emailAlertNewProjectCheckbox" checked>
                                <label class="custom-control-label" for="emailAlertNewProjectCheckbox">Send email alerts if project exceeds <span class="font-weight-bold">50.00%</span> of budget</label>
                            </div>
                            <!-- End Checkbox -->

                            <!-- Footer -->
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn btn-ghost-secondary mr-2"
                                        data-hs-step-form-prev-options='{
                       "targetSelector": "#createProjectStepDetails"
                     }'>
                                    <i class="tio-chevron-left"></i> Previous step
                                </button>

                                <div class="ml-auto">
                                    <button type="button" class="btn btn-primary"
                                            data-hs-step-form-next-options='{
                              "targetSelector": "#createProjectStepMembers"
                            }'>
                                        Next <i class="tio-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- End Footer -->
                        </div>

                        <div id="createProjectStepMembers" style="display: none;">
                            <!-- Form Group -->
                            <div class="form-group">
                                <div class="input-group input-group-merge mb-2 mb-sm-0">
                                    <div class="input-group-prepend" id="fullNameNewProject">
                      <span class="input-group-text">
                        <i class="tio-search"></i>
                      </span>
                                    </div>

                                    <input type="text" class="form-control" name="fullNameNewProject" placeholder="Search name or emails" aria-label="Search name or emails" aria-describedby="fullNameNewProject">

                                    <div class="input-group-append input-group-append-last-sm-down-none">
                                        <!-- Select -->
                                        <div id="permissionNewProjectSelect" class="select2-custom select2-custom-right">
                                            <select class="js-select2-custom"
                                                    data-hs-select2-options='{
                                  "dropdownParent": "#permissionNewProjectSelect",
                                  "minimumResultsForSearch": "Infinity",
                                  "dropdownAutoWidth": true,
                                  "dropdownWidth": "10rem"
                                }'>
                                                <option value="guest" selected>Guest</option>
                                                <option value="can edit">Can edit</option>
                                                <option value="can comment">Can comment</option>
                                                <option value="full access">Full access</option>
                                            </select>
                                        </div>
                                        <!-- End Select -->

                                        <a class="btn btn-primary d-none d-sm-block" href="javascript:;">Add member</a>
                                    </div>
                                </div>

                                <a class="btn btn-block btn-primary d-sm-none" href="javascript:;">Add member</a>
                            </div>
                            <!-- End Form Group -->

                            <ul class="list-unstyled list-unstyled-py-4 mb-5">
                                <!-- List Group Item -->
                                <li>
                                    <div class="media">
                      <span class="icon icon-sm icon-soft-dark icon-circle mr-3">
                        <i class="tio-group-senior"></i>
                      </span>

                                        <div class="media-body">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-sm">
                                                    <h5 class="text-body mb-0">#digitalmarketing</h5>
                                                    <span class="d-block font-size-sm">8 members</span>
                                                </div>

                                                <div class="col-12 col-sm">
                                                    <!-- Select -->
                                                    <div id="inviteUserNewProjectSelect1" class="select2-custom select2-custom-sm-right d-sm-flex justify-content-sm-end">
                                                        <select class="js-select2-custom"
                                                                data-hs-select2-options='{
                                        "dropdownParent": "#inviteUserNewProjectSelect1",
                                        "minimumResultsForSearch": "Infinity",
                                        "customClass": "custom-select custom-select-sm custom-select-borderless pl-0",
                                        "dropdownAutoWidth": true,
                                        "width": true
                                      }'>
                                                            <option value="guest">Guest</option>
                                                            <option value="can edit" selected>Can edit</option>
                                                            <option value="can comment">Can comment</option>
                                                            <option value="full access">Full access</option>
                                                            <option value="remove" data-option-template='<span class="text-danger">Remove</span>'>Remove</option>
                                                        </select>
                                                    </div>
                                                    <!-- End Select -->
                                                </div>
                                            </div>
                                            <!-- End Row -->
                                        </div>
                                    </div>
                                </li>
                                <!-- End List Group Item -->

                                <!-- List Group Item -->
                                <li>
                                    <div class="media">
                                        <div class="avatar avatar-sm avatar-circle mr-3">
                                            <img class="avatar-img" src="../assets/img/160x160/img3.jpg" alt="Image Description">
                                        </div>

                                        <div class="media-body">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-sm">
                                                    <h5 class="text-body mb-0">David Harrison</h5>
                                                    <span class="d-block font-size-sm">david@example.com</span>
                                                </div>

                                                <div class="col-12 col-sm">
                                                    <!-- Select -->
                                                    <div id="inviteUserNewProjectSelect2" class="select2-custom select2-custom-sm-right d-sm-flex justify-content-sm-end">
                                                        <select class="js-select2-custom"
                                                                data-hs-select2-options='{
                                        "dropdownParent": "#inviteUserNewProjectSelect2",
                                        "minimumResultsForSearch": "Infinity",
                                        "customClass": "custom-select custom-select-sm custom-select-borderless pl-0",
                                        "dropdownAutoWidth": true,
                                        "width": true
                                      }'>
                                                            <option value="guest">Guest</option>
                                                            <option value="can edit" selected>Can edit</option>
                                                            <option value="can comment">Can comment</option>
                                                            <option value="full access">Full access</option>
                                                            <option value="remove" data-option-template='<span class="text-danger">Remove</span>'>Remove</option>
                                                        </select>
                                                    </div>
                                                    <!-- End Select -->
                                                </div>
                                            </div>
                                            <!-- End Row -->
                                        </div>
                                    </div>
                                </li>
                                <!-- End List Group Item -->

                                <!-- List Group Item -->
                                <li>
                                    <div class="media">
                                        <div class="avatar avatar-sm avatar-circle mr-3">
                                            <img class="avatar-img" src="../assets/img/160x160/img9.jpg" alt="Image Description">
                                        </div>

                                        <div class="media-body">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-sm">
                                                    <h5 class="text-body mb-0">Ella Lauda <i class="tio-verified text-primary" data-toggle="tooltip" data-placement="top" title="Top endorsed"></i></h5>
                                                    <span class="d-block font-size-sm">Markvt@example.com</span>
                                                </div>

                                                <div class="col-12 col-sm">
                                                    <!-- Select -->
                                                    <div id="inviteUserNewProjectSelect4" class="select2-custom select2-custom-sm-right d-sm-flex justify-content-sm-end">
                                                        <select class="js-select2-custom"
                                                                data-hs-select2-options='{
                                        "dropdownParent": "#inviteUserNewProjectSelect4",
                                        "minimumResultsForSearch": "Infinity",
                                        "customClass": "custom-select custom-select-sm custom-select-borderless pl-0",
                                        "dropdownAutoWidth": true,
                                        "width": true
                                      }'>
                                                            <option value="guest">Guest</option>
                                                            <option value="can edit" selected>Can edit</option>
                                                            <option value="can comment">Can comment</option>
                                                            <option value="full access">Full access</option>
                                                            <option value="remove" data-option-template='<span class="text-danger">Remove</span>'>Remove</option>
                                                        </select>
                                                    </div>
                                                    <!-- End Select -->
                                                </div>
                                            </div>
                                            <!-- End Row -->
                                        </div>
                                    </div>
                                </li>
                                <!-- End List Group Item -->

                                <!-- List Group Item -->
                                <li>
                                    <div class="media">
                      <span class="icon icon-sm icon-soft-dark icon-circle mr-3">
                        <i class="tio-group-senior"></i>
                      </span>

                                        <div class="media-body">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-sm">
                                                    <h5 class="text-body mb-0">#conference</h5>
                                                    <span class="d-block font-size-sm">3 members</span>
                                                </div>

                                                <div class="col-12 col-sm">
                                                    <!-- Select -->
                                                    <div id="inviteUserNewProjectSelect3" class="select2-custom select2-custom-sm-right d-sm-flex justify-content-sm-end">
                                                        <select class="js-select2-custom"
                                                                data-hs-select2-options='{
                                        "dropdownParent": "#inviteUserNewProjectSelect3",
                                        "minimumResultsForSearch": "Infinity",
                                        "customClass": "custom-select custom-select-sm custom-select-borderless pl-0",
                                        "dropdownAutoWidth": true,
                                        "width": true
                                      }'>
                                                            <option value="guest">Guest</option>
                                                            <option value="can edit" selected>Can edit</option>
                                                            <option value="can comment">Can comment</option>
                                                            <option value="full access">Full access</option>
                                                            <option value="remove" data-option-template='<span class="text-danger">Remove</span>'>Remove</option>
                                                        </select>
                                                    </div>
                                                    <!-- End Select -->
                                                </div>
                                            </div>
                                            <!-- End Row -->
                                        </div>
                                    </div>
                                </li>
                                <!-- End List Group Item -->
                            </ul>

                            <!-- Toggle Switch -->
                            <label class="row toggle-switch mb-3" for="addTeamPreferencesNewProjectSwitch1">
                  <span class="col-8 col-sm-9 toggle-switch-content ml-0">
                    <span class="d-flex align-items-center">
                      <i class="tio-notifications-on-outlined text-primary mr-3"></i>
                      <span class="text-dark">Inform all project members</span>
                    </span>
                  </span>
                                <span class="col-4 col-sm-3">
                    <input type="checkbox" class="toggle-switch-input" id="addTeamPreferencesNewProjectSwitch1" checked>
                    <span class="toggle-switch-label ml-auto">
                      <span class="toggle-switch-indicator"></span>
                    </span>
                  </span>
                            </label>
                            <!-- End Toggle Switch -->

                            <!-- Toggle Switch -->
                            <label class="row form-group toggle-switch" for="addTeamPreferencesNewProjectSwitch2">
                  <span class="col-8 col-sm-9 toggle-switch-content ml-0">
                    <span class="d-flex align-items-center">
                      <i class="tio-sms-chat-outlined text-primary mr-3"></i>
                      <span class="text-dark">Show team activity</span>
                    </span>
                  </span>
                                <span class="col-4 col-sm-3">
                    <input type="checkbox" class="toggle-switch-input" id="addTeamPreferencesNewProjectSwitch2">
                    <span class="toggle-switch-label ml-auto">
                      <span class="toggle-switch-indicator"></span>
                    </span>
                  </span>
                            </label>
                            <!-- End Toggle Switch -->

                            <!-- Footer -->
                            <div class="d-sm-flex align-items-center">
                                <button type="button" class="btn btn-ghost-secondary mb-3 mb-sm-0 mr-2"
                                        data-hs-step-form-prev-options='{
                       "targetSelector": "#createProjectStepTerms"
                     }'>
                                    <i class="tio-chevron-left"></i> Previous step
                                </button>

                                <div class="d-flex justify-content-end ml-auto">
                                    <button type="button" class="btn btn-white mr-2" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button id="createProjectFinishBtn" type="button" class="btn btn-primary">Create project</button>
                                </div>
                            </div>
                            <!-- End Footer -->
                        </div>
                    </div>
                    <!-- End Content Step Form -->

                    <!-- Message Body -->
                    <div id="createProjectStepSuccessMessage" style="display:none;">
                        <div class="text-center">
                            <img class="img-fluid mb-3" src="../assets/svg/illustrations/create.svg" alt="Image Description" style="max-width: 15rem;">

                            <div class="mb-4">
                                <h2>Successful!</h2>
                                <p>New project has been successfully created.</p>
                            </div>

                            <div class="row justify-content-center gy-1 gx-2">
                                <div class="col-auto">
                                    <a class="btn btn-white" href="projects.html">
                                        <i class="tio-chevron-left ml-1"></i> Back to projects
                                    </a>
                                </div>

                                <div class="col-auto">
                                    <a class="btn btn-primary" href="javascript:;" data-toggle="modal" data-target="#newProjectModal">
                                        <i class="tio-city mr-1"></i> Add new project
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Message Body -->
                </form>
                <!-- End Step Form -->
            </div>
            <!-- End Body -->
        </div>
    </div>
</div>
<!-- End New project Modal -->
<!-- ========== END SECONDARY CONTENTS ========== -->


<!-- JS Implementing Plugins -->
<script src="{{asset('theme/front/assets/js/vendor.min.js')}}"></script>

<!-- JS Front -->
<script src="{{asset('theme/front/assets/js/theme.min.js')}}"></script>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // initialization of navbar vertical navigation
        var sidebar = $('.js-navbar-vertical-aside').hsSideNav();

        // initialization of tooltip in navbar vertical menu
        $('.js-nav-tooltip-link').tooltip({ boundary: 'window' })

        $(".js-nav-tooltip-link").on("show.bs.tooltip", function(e) {
            if (!$("body").hasClass("navbar-vertical-aside-mini-mode")) {
                return false;
            }
        });

        // initialization of unfold
        $('.js-hs-unfold-invoker').each(function () {
            var unfold = new HSUnfold($(this)).init();
        });

        // initialization of form search
        $('.js-form-search').each(function () {
            new HSFormSearch($(this)).init()
        });
    });
</script>

<!-- IE Support -->
<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="../assets/vendor/babel-polyfill/polyfill.min.js"><\/script>');
</script>
@yield('script')
</body>

</html>
