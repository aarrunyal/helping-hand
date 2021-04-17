@extends('layouts.back.layout')
@section('content')
    <!-- begin:: Content Head -->
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Form</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <span class="kt-subheader__desc">#XRS-45670</span>
                <a href="#" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10">
                    Add New
                </a>
                <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                    <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
											<span><i class="flaticon2-search-1"></i></span>
										</span>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Content Head -->


    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--begin::Portlet-->
        <div class="row">
            <div class="col-lg-6">

                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Default Validation 1
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form kt-form--label-right" id="kt_form_1">
                        <div class="kt-portlet__body">
                            <div class="form-group form-group-last kt-hide">
                                <div class="alert alert-danger" role="alert" id="kt_form_1_msg">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">
                                        Oh snap! Change a few things up and try submitting again.
                                    </div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="la la-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Email *</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <input type="text" class="form-control" name="email" placeholder="Enter your email">
                                    <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">URL *</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="url" placeholder="Enter your url">
                                        <div class="input-group-append"><span class="input-group-text">.via.com</span></div>
                                    </div>
                                    <span class="form-text text-muted">Please enter your website URL.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Digits</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <div class="kt-input-icon kt-input-icon--left">
                                            <input type="text" class="form-control" name="digits" placeholder="Enter digits">
                                            <span class="kt-input-icon__icon kt-input-icon__icon--left"><span><i class="la la-calculator"></i></span></span>
                                        </div>
                                    </div>
                                    <span class="form-text text-muted">Please enter only digits</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Credit Card</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="creditcard" placeholder="Enter card number">
                                        <div class="input-group-append"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
                                    </div>
                                    <span class="form-text text-muted">Please enter your credit card number</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">US Phone</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="phone" placeholder="Enter phone">
                                        <div class="input-group-append"><span class="btn btn-brand btn-icon"><i class="la la-phone"></i></span></div>
                                    </div>
                                    <span class="form-text text-muted">Please enter your US phone number</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Option *</label>
                                <div class="col-lg-9 col-md-9 col-sm-12 form-group-sub">
                                    <select class="form-control" name="option">
                                        <option value="">Select</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    <span class="form-text text-muted">Please select an option.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Options *</label>
                                <div class="col-lg-9 col-md-9 col-sm-12 form-group-sub">
                                    <select class="form-control" name="options" multiple size="5">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    <span class="form-text text-muted">Please select at least one or maximum 4 options</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Memo *</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <textarea class="form-control" name="memo" placeholder="Enter a menu" rows="8"></textarea>
                                    <span class="form-text text-muted">Please enter a menu within text length range 10 and 100.</span>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-xl"></div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Checkbox *</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="kt-checkbox-inline">
                                        <label class="kt-checkbox">
                                            <input type="checkbox" name="checkbox"> Tick me
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="form-text text-muted">Please tick the checkbox</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Checkboxes *</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="kt-checkbox-list">
                                        <label class="kt-checkbox">
                                            <input type="checkbox" name="checkboxes"> Option 1
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox" name="checkboxes"> Option 2
                                            <span></span>
                                        </label>
                                        <label class="kt-checkbox">
                                            <input type="checkbox" name="checkboxes"> Option 3
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="form-text text-muted">Please select at lease 1 and maximum 2 options</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12">Radios *</label>
                                <div class="col-lg-9 col-md-9 col-sm-12">
                                    <div class="kt-radio-inline">
                                        <label class="kt-radio">
                                            <input type="checkbox" name="radio"> Option 1
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="checkbox" name="radio"> Option 2
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" name="radio"> Option 3
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="form-text text-muted">Please select an option</span>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-9 ml-lg-auto">
                                        <button type="submit" class="btn btn-brand">Validate</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->
            </div>
            <div class="col-lg-6">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Advanced Validation
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form kt-form--label-right" id="kt_form_2">
                        <div class="kt-portlet__body">
                            <div class="kt-section">
                                <h3 class="kt-section__title">
                                    Billing Information:
                                </h3>
                                <div class="kt-section__content">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="form-control-label">* Cardholder Name:</label>
                                            <input type="text" name="billing_card_name" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="form-control-label">* Card Number:</label>
                                            <input type="text" name="billing_card_number" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="form-group form-group-last row">
                                        <div class="col-lg-4 form-group-sub">
                                            <label class="form-control-label">* Exp Month:</label>
                                            <select class="form-control" name="billing_card_exp_month">
                                                <option value="">Select</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 form-group-sub">
                                            <label class="form-control-label">* Exp Year:</label>
                                            <select class="form-control" name="billing_card_exp_year">
                                                <option value="">Select</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 form-group-sub">
                                            <label class="form-control-label">* CVV:</label>
                                            <input type="number" class="form-control" name="billing_card_cvv" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-xl"></div>
                            <div class="kt-section">
                                <h3 class="kt-section__title">
                                    Billing Address
                                    <i data-toggle="kt-tooltip" data-width="auto" class="kt-section__help" title="If different than the corresponding address"></i>
                                </h3>
                                <div class="kt-section__content">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="form-control-label">* Address 1:</label>
                                            <input type="text" name="billing_address_1" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="form-control-label">Address 2:</label>
                                            <input type="text" name="billing_address_2" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="form-group form-group-last row">
                                        <div class="col-lg-5 form-group-sub">
                                            <label class="form-control-label">* City:</label>
                                            <input type="text" class="form-control" name="billing_city" placeholder="" value="">
                                        </div>
                                        <div class="col-lg-5 form-group-sub">
                                            <label class="form-control-label">* State:</label>
                                            <input type="text" class="form-control" name="billing_state" placeholder="" value="">
                                        </div>
                                        <div class="col-lg-2 form-group-sub">
                                            <label class="form-control-label">* ZIP:</label>
                                            <input type="text" class="form-control" name="billing_zip" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-xl"></div>
                            <div class="kt-section">
                                <h3 class="kt-section__title kt-margin-b-20">
                                    Delivery Type:
                                </h3>
                                <div class="kt-section__content">
                                    <div class="form-group form-group-last">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="kt-option">
																		<span class="kt-option__control">
																			<span class="kt-radio kt-radio--state-brand">
																				<input type="radio" name="billing_delivery" value="">
																				<span></span>
																			</span>
																		</span>
                                                    <span class="kt-option__label">
																			<span class="kt-option__head">
																				<span class="kt-option__title">
																					Standart Delevery
																				</span>
																				<span class="kt-option__focus">
																					Free
																				</span>
																			</span>
																			<span class="kt-option__body">
																				Estimated 14-20 Day Shipping
																				(&nbsp;Duties end taxes may be due
																				upon delivery&nbsp;)
																			</span>
																		</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="kt-option">
																		<span class="kt-option__control">
																			<span class="kt-radio kt-radio--state-brand">
																				<input type="radio" name="billing_delivery" value="">
																				<span></span>
																			</span>
																		</span>
                                                    <span class="kt-option__label">
																			<span class="kt-option__head">
																				<span class="kt-option__title">
																					Fast Delevery
																				</span>
																				<span class="kt-option__focus">
																					$&nbsp;8.00
																				</span>
																			</span>
																			<span class="kt-option__body">
																				Estimated 2-5 Day Shipping
																				(&nbsp;Duties end taxes may be due
																				upon delivery&nbsp;)
																			</span>
																		</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-text text-muted">

                                            <!--must use this helper element to display error message for the options-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-brand">Validate</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->
            </div>
        </div>
    </div>

    <!-- end:: Content -->
@stop
@section('page-script')

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{asset('resources/back/assets/js/pages/crud/forms/validation/form-controls.js')}}" type="text/javascript"></script>

    <!--end::Page Scripts -->
@endsection