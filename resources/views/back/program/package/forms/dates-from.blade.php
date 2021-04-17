<form class="kt-form kt-form--label-right" id="date-form" method="POST" enctype="multipart/form-data"
      action="{{route('package.date-store-and-update', $package->slug)}}">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="kt-section__content" id="date-form-id">
                @include('back.program.package.forms.custom-form.date-form')
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-dark" onclick="getDateForm()">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>

    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-brand">Save</button>
                    <a href="{{route('package.index')}}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</form>
