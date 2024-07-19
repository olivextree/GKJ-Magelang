@extends('layouts.master')
@section('title', 'youtube')
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
            $.get("{{ url('admin/youtube/read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }

        function create() {
            $.get("{{ url('admin/youtube/create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Create youtube')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        // Untuk modal halaman edit show
        function edit(id) {
            $.get("{{ url('admin/youtube/') }}/" + id +"/edit", {}, function(data, status) {
                $("#exampleModalLabel").html('Edit youtube')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        function deleteData(id) {
            var id = id;
            var url = '{{ route('youtube.destroy', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteform").attr('action', url);
        }

        function formSubmit() {
            $("#deleteform").submit();
        }
    </script>
@endsection
