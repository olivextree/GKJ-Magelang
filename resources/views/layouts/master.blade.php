@include('_include.head')
@include('_include.navbar')
@include('_include.sidebar')
      <!-- Main Content -->
      @include('sweetalert::alert')

                  <!-- Main Content -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div id="page" class="p-2"></div>
                          </div>
                      </div>
                  </div>
              </div>

                  <div class="modal fade" id="aboutmodal" tabindex="-1" aria-labelledby="aboutmodalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="aboutmodalLabel"></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div id="page-edit" class="p-2"></div>
                          </div>
                      </div>
                  </div>
              </div>

      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>
@include('_include.footer')
