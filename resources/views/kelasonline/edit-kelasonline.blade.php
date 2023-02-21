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
            Edit Topics
        @endslot
    @endcomponent
    {{-- <form> --}}

    <form action="{{ route('kelasonline.update', $kelasonline->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')


      
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <label for="exampleFormControlTextarea1">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ $kelasonline->title }}">
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <label for="exampleFormControlTextarea1">Short Desc</label>
                        <textarea name="short_desc" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $kelasonline->short_desc }}</textarea>
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
                        <textarea id="elm1" name="text">{{ $kelasonline->text }}</textarea>

                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Status</h4>
                                           
                            <select class="form-select" name="status">
                                <option value="draft"  selected>Draft</option>
                                <option value="published">Published</option>
                            </select>
                    </div>
                </div>
            </div>


            
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
      
                        <div class="input-group hdtuto control-group lst increment" >
                            <input type="file" name="image" class="myfrm form-control">
                            
                        </div>
                     
                    </div>
                </div>
            </div>       

        </div>
  


            <button type="submit" class="btn btn-md btn-primary mt-3">Update</button>
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
