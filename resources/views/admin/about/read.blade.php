<div class="card-body">
    <h4 class="box-title">Tentang Gereja</h4>
</div>
<div class="card-body">
    <div>
        <label for=""><strong><span>About</span></strong></label>
        {!!$about->desc!!}
    </div>
    <br>
    <div>
        <label for=""><strong><span>Visi</span></strong></label>
        {!!$about->visi!!}
    </div>
    <br>
    <div>
        <label for=""><strong><span>Misi</span></strong></label>
        {!!$about->misi!!}
    </div>
    <br>
      <a href="#" onclick="return edit({{ $about->id }})" class="btn btn-success"><i
        class="fas fa-pen"> Edit</i></a>
</div>
