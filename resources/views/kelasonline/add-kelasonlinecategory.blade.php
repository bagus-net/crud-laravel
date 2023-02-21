@extends('layouts.master')
@section('title')
    @lang('translation.Add_Product')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            Kelas-Online
        @endslot
        @slot('title')
            Add Topics
        @endslot
    @endcomponent
    {{-- <form> --}}

    <form action="{{ route('kelasonlinecategory.store') }}" method="POST">

        @csrf
      
      
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <label class="form-label">Single Select</label>
                                    <select class="form-control select2" name="category_id">
                                        @foreach ($news_category_models as $news_category )
                                        <option value={{ $news_category->id }}>{{ $news_category->name }}</option>
                                        @endforeach
                                    </select>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <label for="exampleFormControlTextarea1">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="">
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <label for="exampleFormControlTextarea1">Short Desc</label>
                        <textarea name="short_desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Content</h4>
                        {{-- <p class="card-title-desc">Bootstrap-wysihtml5 is a javascript
                            plugin that makes it easy to create simple, beautiful wysiwyg editors
                            with the help of wysihtml5 and Twitter Bootstrap.</p> --}}
                        <textarea id="elm1" name="text"></textarea>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
  


            <button type="submit" class="btn btn-md btn-primary mt-3">Save</button>
            {{-- <a href="{{ route('post.index') }}" class="btn btn-md btn-secondary">back</a> --}}

        </form>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/ckeditor/ckeditor.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/pages/form-editor.init.js') }}"></script>
        <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/pages/ecommerce-add-product.init.js') }}"></script>
@endsection
