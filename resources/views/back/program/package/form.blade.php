<!--begin::Form-->
{{--title, is_parent, parent_id, is_active, is_requested,--}}
{{csrf_field()}}
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="row">
            <div class="col">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical"
                         data-tabs="tabs">
                        <a class="nav-link active" id="v-pills-details-tab" data-toggle="tab" href="#v-pills-details"
                           role="tab" aria-controls="v-pills-details" aria-selected="true">Details</a>
                        @if(!empty($package))
                            <a class="nav-link" id="v-pills-pricing-tab" data-toggle="tab" href="#v-pills-pricing"
                               role="tab" aria-controls="v-pills-pricing" aria-selected="false">Pricing</a>
                            <a class="nav-link" id="v-pills-dates-tab" data-toggle="tab" href="#v-pills-dates"
                               role="tab" aria-controls="v-pills-dates" aria-selected="false">Dates</a>
                            <a class="nav-link" id="v-pills-itinerary-tab" data-toggle="tab" href="#v-pills-itinerary"
                               role="tab" aria-controls="v-pills-itinerary" aria-selected="false">Itinerary</a>
                            <a class="nav-link" id="v-pills-faq-tab" data-toggle="tab" href="#v-pills-faq"
                               role="tab" aria-controls="v-pills-faq" aria-selected="false">Faqs</a>
                        @endif
                    </div>
                    <div class="tab-content ml-5" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-details" role="tabpanel"
                             aria-labelledby="v-pills-details-tab">
                            @include('back.program.package.forms.package-from')
                        </div>
                        @if(!empty($package))
                            <div class="tab-pane fade" id="v-pills-pricing" role="tabpanel"
                                 aria-labelledby="v-pills-pricing-tab">
                                @include('back.program.package.forms.pricing-from')
                            </div>
                            <div class="tab-pane fade" id="v-pills-dates" role="tabpanel"
                                 aria-labelledby="v-pills-dates-tab">
                                @include('back.program.package.forms.dates-from')
                            </div>
                            <div class="tab-pane fade" id="v-pills-itinerary" role="tabpanel"
                                 aria-labelledby="v-pills-itinerary-tab">
                                @include('back.program.package.forms.itinerary-from')
                            </div>
                            <div class="tab-pane fade" id="v-pills-faq" role="tabpanel"
                                 aria-labelledby="v-pills-faq-tab">
                                @include('back.program.package.forms.faq-from')
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@section('page-script')
    @include('back.program.package.forms.script')
@endsection
