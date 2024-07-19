@guest
<div class="p2">
    <Span>Silahkan Login Terlebih Dahulu Sebelum Mengikuti Acara</Span>
</div>
@else
<form action="{{route('pendaftaran.kegiatanstore')}}" method="POST">
    @csrf
    <div class="p2">
        <div class="form-group">
            <label for="">Acara</label>
            <input type="hidden" name="pendaftaran_id" value="{{$item->id}}">
            <input type="text" value="{{$item->acara}}" disabled class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama Pendaftar</label>
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="text" value="{{Auth::user()->name}}" disabled class="form-control">
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary" >Simpan</button>
        </div>
    </div>
</form>
@endguest
