@include('frontend._include.head')
@include('frontend._include.navbar')

@include('sweetalert::alert')
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

	<div class="container-wrap">
        @yield('content')
	</div><!-- END container-wrap -->

@include('frontend._include.footer')
@yield('script')

