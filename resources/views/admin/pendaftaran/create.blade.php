<form action="{{route('kegiatan.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="p2">
        <div class="form-group">
            <label for="">Nama Acara</label>
            <input type="text" name="acara" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Tanggal Mulai</label>
            <input type="datetime-local" name="tanggal_mulai" id="txt-appoint_date" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Tanggal Selesai</label>
            <input type="datetime-local" name="tanggal_selesai" id="txt-appoint_date" required class="form-control">
        </div>
        {{-- <div class="form-group">
            <label for="">Category</label>
            <select name="category" class="form-control">
                <option value="Penikahan">Penikahan</option>
                <option value="Baptis">Baptis</option>
            </select>
        </div> --}}
        <div class="form-group">
            <label for="">Foto Acara</label>
            <input type="file" name="file" accept="image/png|image/jpg" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Tentang Acara</label>
            <textarea name="desc" class="form-control" id="desc"></textarea>
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() { //DISABLED PAST DATES IN APPOINTMENT DATE
  var dateToday = new Date();
  var month = dateToday.getMonth() + 1;
  var day = dateToday.getDate();
  var year = dateToday.getFullYear();

  if (month < 10)
    month = '0' + month.toString();
  if (day < 10)
    day = '0' + day.toString();

  var maxDate = year + '-' + month + '-' + day;

  $('#txt-appoint_date').attr('min', maxDate);
});
</script>
