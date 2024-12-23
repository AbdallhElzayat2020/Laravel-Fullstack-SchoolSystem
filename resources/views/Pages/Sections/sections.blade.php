@extends('layouts.master')

@section('title')
    {{ __('language.sections') }}
@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{ __('language.List_sections') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"
                            class="default-color">{{ __('language.sections') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('language.List_sections') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a class="button x-small mb-3" href="#" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('Sections_trans.add_section') }}
                    </a>
                    <div class="accordion gray plus-icon round">
                        @foreach ($grades as $grade)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $grade->Name }}</a>
                                <div class="acd-des">
                                    <div class="table-responsive mt-15">
                                        <table class="table center-aligned-table mb-0">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th>#</th>
                                                    <th>{{ trans('Sections_trans.Name_Section') }}
                                                    </th>
                                                    <th>{{ trans('Sections_trans.Name_Class') }}</th>
                                                    <th>{{ trans('Sections_trans.Status') }}</th>
                                                    <th>{{ trans('Sections_trans.Processes') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($grade->Sections as $key => $list_Sections)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $list_Sections->Section_Name }}</td>
                                                        <td>
                                                            {{ $list_Sections->Classes->Class_Name }}
                                                        </td>
                                                        <td>
                                                            @if ($list_Sections->Status === 1)
                                                                <label
                                                                    class="badge badge-success">{{ trans('Sections_trans.Status_Section_AC') }}</label>
                                                            @else
                                                                <label
                                                                    class="badge badge-danger">{{ trans('Sections_trans.Status_Section_No') }}</label>
                                                            @endif

                                                        </td>
                                                        <td>

                                                            <a href="#" class="btn btn-outline-info btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#edit{{ $list_Sections->id }}">{{ trans('Sections_trans.Edit') }}
                                                            </a>
                                                            <a href="#" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete{{ $list_Sections->id }}">{{ trans('Sections_trans.Delete') }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <!--تعديل قسم جديد -->
                                                    <div class="modal fade" id="edit{{ $list_Sections->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                        id="exampleModalLabel">
                                                                        {{ trans('Sections_trans.edit_Section') }}
                                                                    </h5>

                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>

                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('sections.update', 'test') }}"
                                                                        method="POST">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <div class="row">

                                                                            <div class="col">
                                                                                <input type="text" name="Name_Section_Ar"
                                                                                    class="form-control"
                                                                                    value="{{ $list_Sections->getTranslation('Section_Name', 'ar') }}">
                                                                            </div>

                                                                            <div class="col">
                                                                                <input type="text" name="Name_Section_En"
                                                                                    class="form-control"
                                                                                    value="{{ $list_Sections->getTranslation('Section_Name', 'en') }}">

                                                                                <input id="id" type="hidden"
                                                                                    name="id" class="form-control"
                                                                                    value="{{ $list_Sections->id }}">
                                                                            </div>
                                                                        </div>
                                                                        <br>


                                                                        <div class="col">
                                                                            <label for="inputName"
                                                                                class="control-label">{{ trans('Sections_trans.Name_Grade') }}</label>
                                                                            <select name="grade_id" class="custom-select"
                                                                                onclick="console.log($(this).val())">

                                                                                @foreach ($list_Grades as $list_Grade)
                                                                                    <option value="{{ $list_Grade->id }}">
                                                                                        {{ $list_Grade->Name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <br>

                                                                        <div class="col">
                                                                            <label for="inputName"
                                                                                class="control-label">{{ trans('Sections_trans.Name_Class') }}</label>
                                                                            <select name="class_id" class="custom-select">
                                                                                <option
                                                                                    value="{{ $list_Sections->Classes->id }}">
                                                                                    {{ $list_Sections->Classes->Class_Name }}
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <br>
                                                                        <div class="col">
                                                                            <label for="inputName"
                                                                                class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                                                            <select multiple name="teacher_id[]"
                                                                                class="form-control"
                                                                                id="exampleFormControlSelect2">
                                                                                {{-- Selected Teachers --}}
                                                                                @foreach ($list_Sections->teachers as $teacher)
                                                                                    <option selected
                                                                                        value="{{ $teacher['id'] }}">
                                                                                        {{ $teacher['Name'] }} (معين
                                                                                        حالياً)
                                                                                    </option>
                                                                                @endforeach

                                                                                {{-- Available Teachers (excluding already selected ones) --}}
                                                                                @foreach ($teachers as $teacher)
                                                                                    @unless ($list_Sections->teachers->contains('id', $teacher->id))
                                                                                        <option value="{{ $teacher->id }}">
                                                                                            {{ $teacher->Name }}
                                                                                        </option>
                                                                                    @endunless
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="col">
                                                                            <div class="form-check">

                                                                                @if ($list_Sections->Status === 1)
                                                                                    <input type="checkbox" checked
                                                                                        class="form-check-input"
                                                                                        name="Status" id="exampleCheck1">
                                                                                @else
                                                                                    <input type="checkbox"
                                                                                        class="form-check-input"
                                                                                        name="Status" id="exampleCheck1">
                                                                                @endif
                                                                                <label class="form-check-label"
                                                                                    for="exampleCheck1">{{ trans('Sections_trans.Status') }}</label><br>
                                                                            </div>
                                                                        </div>
                                                                        <br />
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                                                            <button type="submit"
                                                                                class="btn btn-success">{{ trans('Sections_trans.submit') }}</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- delete_modal_Grade -->
                                                    <div class="modal fade" id="delete{{ $list_Sections->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                        class="modal-title" id="exampleModalLabel">
                                                                        {{ trans('Sections_trans.delete_Section') }}
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('sections.destroy', 'test') }}"
                                                                        method="post">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        {{ trans('Sections_trans.Warning_Section') }}
                                                                        <input id="id" type="hidden"
                                                                            name="id" class="form-control"
                                                                            value="{{ $list_Sections->id }}">
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">{{ trans('Sections_trans.Close') }}</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">{{ trans('Sections_trans.submit') }}</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!--اضافة قسم جديد -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                            {{ trans('Sections_trans.add_section') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('sections.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="Name_Section_Ar" class="form-control"
                                        placeholder="{{ trans('Sections_trans.Section_name_ar') }}" required>
                                </div>
                                <div class="col">
                                    <input type="text" name="Name_Section_En" class="form-control"
                                        placeholder="{{ trans('Sections_trans.Section_name_en') }}" required>
                                </div>
                            </div>
                            <br>
                            <div class="col">
                                <label for="inputName" class="control-label">
                                    {{ trans('Sections_trans.Name_Grade') }}
                                </label>
                                <select name="grade_id" class="custom-select" onchange="console.log($(this).val())"
                                    required>
                                    <option value="" selected disabled>
                                        {{ trans('Sections_trans.Select_Grade') }}
                                    </option>
                                    @foreach ($list_Grades as $list_Grade)
                                        <option value="{{ $list_Grade->id }}">{{ $list_Grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="col">
                                <label for="inputName"
                                    class="control-label">{{ trans('Sections_trans.Name_Class') }}</label>
                                <select name="class_id" class="custom-select" required>
                                </select>
                            </div>
                            <br />
                            <div class="col">
                                <label for="inputName"
                                    class="control-label">{{ trans('Sections_trans.Name_Teacher') }}</label>
                                <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                    @foreach ($teachers as $teacher)
                                        <option class="my-1" value="{{ $teacher->id }}">{{ $teacher->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('Sections_trans.Close') }}
                                </button>
                                <button type="submit" class="btn btn-success">
                                    {{ trans('Sections_trans.submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--اضافة قسم جديد -->
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('select[name="grade_id"]').on('change', function() {
                var grade_id = $(this).val();
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="class_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="class_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
