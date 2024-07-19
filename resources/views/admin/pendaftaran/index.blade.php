@extends('layouts.master')
@section('title', 'kegiatan')
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
            $.get("{{ url('admin/kegiatan/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }

        function create() {
            $.get("{{ url('admin/kegiatan/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create kegiatan')
                $("#page").html(data);
                $("#exampleModal").modal('show');
                CKEDITOR.replace( 'desc' );
            });
        }

        // Untuk modal halaman edit show
        function edit(id) {
            $.get("{{ url('admin/kegiatan/') }}/" + id +"/edit", {}, function(data, status) {
                $("#exampleModalLabel").html('Edit kegiatan')
                $("#page").html(data);
                $("#exampleModal").modal('show');
                CKEDITOR.replace( 'desc' );
            });
        }

        function deleteData(id) {
            var id = id;
            var url = '{{ route('kegiatan.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }

        function formSubmit() {
            $("#deleteform").submit();
        }
    </script>
@endsection
