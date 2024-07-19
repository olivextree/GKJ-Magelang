<form action="{{route('youtube.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="p2">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Link Youtube <sup style="color: red">*contoh : AITcZ7o3Hro</sup></label>
            <input type="text" name="link" required class="form-control">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
