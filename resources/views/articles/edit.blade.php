@extends('layout.app')
@section('title', 'Articles')

@section('breadcrumb')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Articles</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
        </ol>
    </div>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Edit Article</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="{{ route('articles-update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <div class="card-body custom-ekeditor">
                        <textarea id="title" name="title" class="form-control" required>{{ $article->title }}</textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Body</label>
                    <div class="card-body custom-ekeditor">
                        <textarea id="body" name="body" class="form-control" required>{{ $article->body }}</textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <div class="input-group">
                        <div class="form-file">
                            <input type="file" class="form-file-input form-control" name="image">
                        </div>
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('css')
<style>
    .cke_notification, .cke_notification_warning {
        display: none !important;
    }
</style>
@endpush
@push('script')
    <script>
        $(document).ready(function () {
            CKEDITOR.replace('title');
            CKEDITOR.replace('body');
        });
    </script>
@endpush
