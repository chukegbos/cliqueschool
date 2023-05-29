@extends('layouts.mainuser')
@section('pageTitle', 'Create School')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="align-items-center">
            <div class="page-header-title">
                <h2 class="m-b-10 text-center">Create School</h2>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ url('user/my-school/create') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    
                    <div class="form-group">
                        <label>Name of School <span class="text text-danger"><small><i>(Compulsory)</i></small></span></label>
                        <input class="form-control" type="text" name="name" required="" placeholder="{{ $setting->sitename }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Category <span class="text text-danger"><small><i>(Compulsory)</i></small></span></label>
                        <select class="form-control" required name="category">
                            <option value="">--Select Category--</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label>Are you already teaching an online course? <span class="text text-danger"><small><i>(Compulsory)</i></small></span></label>
                        <select name="type_teaching" aria-invalid="false" class="form-control">
                            <option>Please choose an option...</option>
                            <option value="1">Yes, I’m already teaching an online course</option>
                            <option value="2">I teach online (coaching, workshops, etc) but not through an online course </option><option value="c">I’m teaching (I have content), but not online</option>
                            <option value="3">I'm just getting started sharing my knowledge</option>
                        </select>
                    </div>
                        
                    <div class="form-group">
                        <label>What is the size of your audience? <span class="text text-danger"><small><i>(Compulsory)</i></small></span></label>
                        <select name="audience" required class="form-control">
                            <option>Please choose an option...</option>
                            <option value="1">No one yet</option>
                            <option value="2">1 - 100 people</option>
                            <option value="3">100 - 1,000 people</option>
                            <option value="4">1,000 - 5,000 people</option>
                            <option value="5">5,000 - 10,000 people</option>
                            <option value="6">10,000 - 50,000 people</option>
                            <option value="7">50,000+ people</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Featured Image <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                        <input class="form-control" type="file" name="featured_image" maxlength="64" required>
                    </div>

                    <div class="form-group">
                        <label>Featured Video <span class="text text-info"><small><i>(Optional - Must be Youtube Link)</i></small></span></label>
                        <input class="form-control" type="text" name="featured_video" placeholder="https://youtu.be/CMsU4rTjPs4">
                    </div>
                    
                    <div class="form-group">
                        <label>Description of School <span class="text text-info"><small><i>(Optional)</i></small></span></label>
                        <textarea rows="2" id="description" name="description" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-info btn-block" type="submit">Proceed</button>
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