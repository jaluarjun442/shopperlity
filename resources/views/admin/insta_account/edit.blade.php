@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Insta Account - {{ $insta_account_data['name'] }}</div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.update_insta_account') }}" id="add_form" name="add_form">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $insta_account_data['id'] }}" />
                        <input type="hidden" name="old_image" id="old_image" value="{{ $insta_account_data['image'] }}" />
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="name" value="<?php echo $insta_account_data['name']; ?>" name="name" placeholder="Name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">UserName</label>
                                <input type="text" class="form-control" id="username" value="<?php echo $insta_account_data['username']; ?>" name="username" placeholder="UserName">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
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
                }
            }
        });
    });
</script>
@endsection