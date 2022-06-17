@extends('layouts.app')
<style>
    form {
        max-width: 400px;
        padding: 20px;
        background: #ffffff;
        margin: 0 auto;
        border-radius: 5px;
        box-shadow: 0px 1px 5px rgb(167, 167, 167);
    }
</style>
@section('content')
    <div class="container">
        <form method="POST">
            @csrf
            <div class="mb-4">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="mb-4">
                <label>Body</label>
                <textarea name="body" class="form-control pb-4"> </textarea>
            </div>
            <div class="mb-4">
                <label>Category</label>
                <select name="category_id" class="form-select">
                    <option value="1">Local</option>
                    <option value="2">Global</option>
                    <option value="3">General</option>
                    <option value="4">Tech</option>
                    <option value="5">Politics</option>
                </select>
            </div>
            <input type="submit" value="Add Article" class="btn btn-primary">
        </form>
    </div>
@endsection