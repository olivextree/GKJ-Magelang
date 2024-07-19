@extends('layouts.master')
@section('title', 'Banner')
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
            $.get("{{ url('admin/banner/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }

        function create() {
            $.get("{{ url('admin/banner/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create banner')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        // Untuk modal halaman edit show
        function edit(id) {
            $.get("{{ url('admin/banner/') }}/" + id +"/edit", {}, function(data, status) {
                $("#exampleModalLabel").html('Edit banner')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function deleteData(id) {
            var id = id;
            var url = '{{ route('banner.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }

        function formSubmit() {
            $("#deleteform").submit();
        }
    </script>
@endsection
