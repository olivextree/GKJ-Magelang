@extends('layouts.master')
@section('title', 'pendaftaran')
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
            $.get("{{ url('admin/pendaftaran/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }

        function create() {
            $.get("{{ url('admin/pendaftaran/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create pendaftaran')
                $("#page").html(data);
                $("#exampleModal").modal('show');
                CKEDITOR.replace( 'desc' );
            });
        }

        // Untuk modal halaman edit show
        function edit(id) {
            $.get("{{ url('admin/pendaftaran/') }}/" + id +"/edit", {}, function(data, status) {
                $("#exampleModalLabel").html('Edit pendaftaran')
                $("#page").html(data);
                $("#exampleModal").modal('show');
                CKEDITOR.replace( 'desc' );
            });
        }

        function deleteData(id) {
            var id = id;
            var url = '{{ route('pendaftaran.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }

        function formSubmit() {
            $("#deleteform").submit();
        }
    </script>
@endsection
