<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="p2">
        <div class="row">
                <div class="form-group col-6">
                    <label for="frist_name">Nama Depan</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group col-6">
                  </div>
                </div>

                <div class="form-group">

                        <label for="birthday">Tanggal Lahir</label>
                      <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday">

                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="password" class="d-block">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group col-6">
                    <label for="password2" class="d-block">Password Confirmation</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                      <label>Alamat Rumah</label>
                      <textarea name="address" id="address" class="form-control"></textarea>
                    </div>

                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Jenis Kelamin</label>
                      <select name="jk" class="form-control">
                          <option value="">-- Pilih Jenis Kelamin --</option>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                      </select>

                      @error('jk')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    <div class="form-group col-6">
                      <label>No Handphone</label>
                      <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="new-phone">

                      @error('phone')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-12">
                        <label>Photo Profile</label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror" accept="image/png|image/jpg" name="file" required>
                        @error('file')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  </div>
        <button class="btn btn-primary">Simpan</button>
    </div>
</form>
