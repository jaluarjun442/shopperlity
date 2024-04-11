@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Insta 10k Follow</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.save_insta_10k_follow') }}" id="add_form" name="add_form">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="UserName">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Added</label>
                                <input type="text" class="form-control" id="added" name="added" placeholder="Added">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Total</label>
                                <input type="text" value="10000" class="form-control" id="total" name="total" placeholder="Total - 1000">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#add_form").validate({
            rules: {
                name: {
                    required: true,
                },
                image: {
                    required: true,

                }
            }
        });
    });
</script>
@endsection