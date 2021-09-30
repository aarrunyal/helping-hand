<!-- begin:: Content -->
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">

    <!--begin::Portlet-->
    <div class="row">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Document File
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                @if (auth()->user()->user_type != 'student')
                    <form action="{{ route('document-file.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-8">
                                <input class="form-control" type="hidden" name="document_id"
                                    value="{{ $document->id }}">
                                <input type="file" name="files[]" class="form-control" placeholder="Document File"
                                    multiple>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-success">Upload</button>
                            </div>
                        </div>
                    </form>
                @endif

                <div class="mt-5 row">
                    @if ($documentFiles->count())
                        @foreach ($documentFiles as $documentFile)
                            @if (!empty($documentFile->file_path))
                                <div class="m-2 col-2">
                                    @if ($documentFile->type == 'xls' || $documentFile->type == 'xlsx' || $documentFile->type == 'csv')
                                        <img src="{{ asset('resources/back/assets/image/file/excel.png') }}"
                                            alt="{{ $documentFile->name }}"
                                            style="height: 212px !important; width: 100%; !important"
                                            class="m-3 img-fluid">
                                    @elseif ($documentFile->type == 'pdf')
                                        <img src="{{ asset('resources/back/assets/image/file/pdf.png') }}"
                                            alt="{{ $documentFile->name }}"
                                            style="height: 212px !important; width: 100%; !important"
                                            class="m-3 img-fluid">
                                    @elseif ($documentFile->type == 'doc' || $documentFile->type == 'docx')
                                        <img src="{{ asset('resources/back/assets/image/file/word.png') }}"
                                            alt="{{ $documentFile->name }}"
                                            style="height: 212px !important; width: 100%; !important"
                                            class="m-3 img-fluid">
                                    @else
                                        <img src="{{ $documentFile->file }}" alt="{{ $documentFile->name }}"
                                            class="m-3 img-fluid"
                                            style="height: 212px !important; width: 100%; !important">
                                    @endif

                                    @if ($document->downloadable == '1')
                                        <span class="m-4">
                                            <a href="{{ $documentFile->file }}" target="_blank"><i
                                                    class="text-success fa fa-download"></i></a>
                                        </span>
                                    @endif
                                    {{-- <span class="m-4">
                                        <a href="{{ route('document-file-view', [$documentFile->id]) }}" target="_blank"><i
                                                class="text-info fas fa-eye"></i></a>
                                    </span> --}}
                                    @if ($document->access_type != 'student')
                                        <span class="m-4">
                                            <a href="{{ route('document-file.destroy', $documentFile->id) }}"><i
                                                    class="text-danger fas fa-trash"></i></a>
                                        </span>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
