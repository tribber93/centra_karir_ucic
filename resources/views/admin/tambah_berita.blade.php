@extends('layouts.user_admin')
@section('judul', 'Tambah Berita')
@section('konten')
    <!-- ############ PAGE START-->

    <div class="padding">
        <h3>Tambah Berita</h3>
        <br>
        <form class="p-x-xs">
            <div class="form-group row">
                <label class="col-sm-2 form-control-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control">
                </div>
            </div>
        </form>
        <div class="box m-b-md">
            <div ui-jp="summernote">
                <h3>Try me!</h3>
                <p>Super Simple WYSIWYG Editor on Bootstrap</p>
                <p><b>Features:</b></p>
                <ol>
                    <li>Worldwide Bootstrap</li>
                    <li style="color: blue;">Easy to Install</li>
                    <li><strong>Open Source</strong></li>
                    <li>Customizing</li>
                    <li>Smart Shortcuts</li>
                    <li>Works with Firefox, Chrome, and IE9+</li>
                </ol>
                <p><b>Code at GitHub:</b> <a href="https://github.com/summernote/summernote/">Here</a> </p>
            </div>
        </div>

        <!-- ############ PAGE END-->
    @endsection
