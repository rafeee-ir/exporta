@extends('layouts.dapp')
@section('title','Add brand')
@section('dashboard-title','Add brand')

@section('content')


    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header bg-dark text-light h4">
                    Add FAQ
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="question" class="col-form-label">Question*</label>
                                            <input class="form-control input" type="text" id="question" name="question" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="answer" class="col-form-label">Answer</label>
                                            <textarea class="form-control" id="editor" name="answer" rows="7"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Publish</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>

@endsection
@section('script')
    <script src="{{url('assets/js/ckeditor.js')}}"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
