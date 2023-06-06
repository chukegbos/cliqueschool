@extends('layouts.mainuser')
@section('pageTitle', 'Create School')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="align-items-center">
            <div class="page-header-title">
                <h2 class="m-b-10 text-center">Create Lecture</h2>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('storeLecture') }}" enctype="multipart/form-data">
                    @csrf
                   
                    <input type="hidden" name="school_id" value="{{ $school->id }}">
                    
                    <div class="form-group">
                        <label>Lecture Title <span class="text text-danger"><small><i>(Compulsory)</i></small></span></label>
                        <input class="form-control" type="text" name="title" required="" placeholder="Introduction to AI" required>
                    </div>

                    <div class="form-group">
                        <label>Featured Image <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                        <input class="form-control" type="file" name="featured_image">
                    </div>

                    <div class="form-group">
                        <label>Lecture Document(PDF) <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                        <input class="form-control" type="file" name="pdf">
                    </div>

                    <div class="form-group">
                        <label>Lecture Video <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                        <input class="form-control" type="file" name="video">
                    </div>
                    
                    <div class="form-group">
                        <label>Description <span class="text text-danger"><small><i>(Compulsory)</i></small></span></label>
                        <textarea rows="5" id="description" name="description" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-grey btn-block" type="submit">Proceed</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    ClassicEditor
        .create(document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection