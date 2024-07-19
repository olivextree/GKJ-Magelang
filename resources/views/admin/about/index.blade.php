@extends('layouts.master')
@section('title', 'Tentang Gereja')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card" id="read">

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            read();
        });

        // Read Database
        function read() {
            $.get("{{ url('admin/about/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }

        // Untuk modal halaman edit show
        function edit(id) {
            $.get("{{ url('admin/about/') }}/" + id +"/edit", {}, function(data, status) {
                $("#aboutmodalLabel").html('Edit about')
                $("#page-edit").html(data);
                $("#aboutmodal").modal('show');
                CKEDITOR.replace( 'desc' );
                CKEDITOR.replace( 'visi' );
                CKEDITOR.replace( 'misi' );
            });
        }

        function formSubmit() {
            $("#deleteform").submit();
        }
    </script>
@endsection
