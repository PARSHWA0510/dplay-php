<?php /*?><div class="sidebar sidebar-right">
  <button type="button" class="btn close-sidebar"><i class="material-icons">settings</i></button>
  <div class="row mx-0 pt-2">
    <div class="col-12">
      <p class="sidebar-color-primary page-sub-title-small"> <span class="icon-circle mr-2"> <i class="material-icons">settings</i> </span>Visual Style Setting</p>
      <p class="sidebar-color-secondary">We provide wide range of color scheme to change from</p>
      <div class="row">
        <ul class="list-group border-top border-bottom list-group-flush w-100">
          <li class="list-group-item"> <span class="vm">Boxed Layout</span>
            <input type="checkbox" id="boxlayout" class="switch switch-sm">
            <label for="boxlayout" class="pink-gradient float-right"></label>
          </li>
          <li class="list-group-item"> <span class="vm">Full Container</span>
            <input type="checkbox" id="full-width2" class="switch switch-sm">
            <label for="full-width2" class="pink-gradient float-right"></label>
            <p class="sidebar-color-secondary mt-2 mb-0"><small>Container will be full width in big screen</small></p>
          </li>
          <li class="list-group-item"> <span class="vm">RTL</span>
            <input type="checkbox" id="rtl" class="switch switch-sm">
            <label for="rtl" class="pink-gradient float-right"></label>
          </li>
          <li class="list-group-item"> <span class="vm">Icon Sidebar</span>
            <input type="checkbox" id="iconsibarbar" class="switch switch-sm">
            <label for="iconsibarbar" class="pink-gradient float-right"></label>
          </li>
        </ul>
      </div>
      <p class="sidebar-color-primary page-sub-title-small mt-2"><span class="icon-circle mr-2"><i class="material-icons">palette</i></span>Select Color</p>
      <div class="row">
        <ul class="list-group list-group-flush w-100">
          <li class="list-group-item">
            <div class="theme-color">
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label bg-white" for="customRadio1" data-title="style"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label dark-blue" for="customRadio2" data-title="dark-blue"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio3" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label dark-purple" for="customRadio3" data-title="dark-purple"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio4" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label dark-maroon" for="customRadio4" data-title="dark-maroon"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio5" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label dark-grey" for="customRadio5" data-title="dark-grey"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio6" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label dark-pink" for="customRadio6" data-title="dark-pink"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio7" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label dark-brown" for="customRadio7" data-title="dark-brown"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio8" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label dark-green" for="customRadio8" data-title="dark-green"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1mat" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label red" for="customRadio1mat" data-title="red"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2mat" name="style-sheet-color" class="custom-control-input" checked>
                <label class="custom-control-label purple" for="customRadio2mat" data-title="purple"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio4mat" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label blue" for="customRadio4mat" data-title="blue"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio6mat" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label skyblue" for="customRadio6mat" data-title="skyblue"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio5mat" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label teal" for="customRadio5mat" data-title="teal"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio7mat" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label orange" for="customRadio7mat" data-title="orange"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio3mat" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label brown" for="customRadio3mat" data-title="brown"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio8mat" name="style-sheet-color" class="custom-control-input">
                <label class="custom-control-label grey" for="customRadio8mat" data-title="grey"></label>
              </div>
              <div class="clearfix"></div>
            </div>
          </li>
        </ul>
      </div>
      <div class="row">
        <ul class="list-group border-top border-bottom list-group-flush w-100">
          <li class="list-group-item"> <span class="vm">Sidebar Colored</span>
            <input type="checkbox" id="sidebarfill" class="switch switch-sm" checked>
            <label for="sidebarfill" class="pink-gradient float-right"></label>
          </li>
          <li class="list-group-item"> <span class="vm">Header Colored</span>
            <input type="checkbox" id="headerfill" class="switch switch-sm">
            <label for="headerfill" class="pink-gradient float-right"></label>
          </li>
          <li class="list-group-item"> <span class="vm">Full Colored</span>
            <input type="checkbox" id="fullcolorfill" class="switch switch-sm">
            <label for="fullcolorfill" class="pink-gradient float-right"></label>
          </li>
        </ul>
      </div>
      <p class="sidebar-color-primary page-sub-title-small mt-2"><span class="icon-circle mr-2"><i class="material-icons">photo_library</i></span> Background Image</p>
      <div class="row">
        <ul class="list-group list-group-flush w-100">
          <li class="list-group-item">
            <div class="sidebar-image">
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio12img" name="background-image-sidebar" class="custom-control-input" checked="">
                <label class="custom-control-label " for="customRadio12img" data-title="none"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio22img" name="background-image-sidebar" class="custom-control-input">
                <label class="custom-control-label " for="customRadio22img" data-title="img/sidebar-1.png"> <img src="img/sidebar-11.png" alt="" class="w-100"> </label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio32img" name="background-image-sidebar" class="custom-control-input">
                <label class="custom-control-label " for="customRadio32img" data-title="img/sidebar-2.png"> <img src="img/sidebar-12.png" alt="" class="w-100"> </label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio43img" name="background-image-sidebar" class="custom-control-input">
                <label class="custom-control-label " for="customRadio43img" data-title="img/sidebar-3.png"> <img src="img/sidebar-13.png" alt="" class="w-100"> </label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio52img" name="background-image-sidebar" class="custom-control-input">
                <label class="custom-control-label " for="customRadio52img" data-title="img/sidebar-4.png"> <img src="img/sidebar-14.png" alt="" class="w-100"> </label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio63img" name="background-image-sidebar" class="custom-control-input">
                <label class="custom-control-label " for="customRadio63img" data-title="img/sidebar-5.png"> <img src="img/sidebar-15.png" alt="" class="w-100"> </label>
              </div>
              <div class="clearfix"></div>
            </div>
          </li>
        </ul>
      </div>
      <p class="sidebar-color-primary page-sub-title-small "><span class="icon-circle mr-2"><i class="material-icons">gradient</i></span> Sidebar Texture</p>
      <div class="row">
        <ul class="list-group list-group-flush w-100 mb-4">
          <li class="list-group-item">
            <div class="sidebar-image">
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio14img" name="background-image-sidebar" class="custom-control-input bg-repeat">
                <label class="custom-control-label " for="customRadio14img" data-title="none"></label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio24img" name="background-image-sidebar" class="custom-control-input bg-repeat">
                <label class="custom-control-label " for="customRadio24img" data-title="img/sidebar-texture1.png"> <img src="img/pattern-1.png" alt="" class="w-100"> </label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio34img" name="background-image-sidebar" class="custom-control-input bg-repeat">
                <label class="custom-control-label " for="customRadio34img" data-title="img/sidebar-texture2.png"> <img src="img/pattern-2.png" alt="" class="w-100"> </label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio44img" name="background-image-sidebar" class="custom-control-input bg-repeat">
                <label class="custom-control-label " for="customRadio44img" data-title="img/sidebar-texture3.png"> <img src="img/pattern-3.png" alt="" class="w-100"> </label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio54img" name="background-image-sidebar" class="custom-control-input bg-repeat">
                <label class="custom-control-label " for="customRadio54img" data-title="img/sidebar-texture4.png"> <img src="img/pattern-4.png" alt="" class="w-100"> </label>
              </div>
              <div class="custom-control custom-radio">
                <input type="radio" id="customRadio64img" name="background-image-sidebar" class="custom-control-input bg-repeat">
                <label class="custom-control-label " for="customRadio64img" data-title="img/sidebar-texture5.png"> <img src="img/pattern-5.png" alt="" class="w-100"> </label>
              </div>
              <div class="clearfix"></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="settings-sidebar close-settings-sidebar-backdrop">
  <button type="button" class="btn close-setting-sidebar pink-gradient"><i class="material-icons">keyboard_arrow_left</i></button>
  <ul class="nav nav-tabs row no-gutters pink-gradient" role="tablist">
    <li class="nav-item text-center col"> <a class="nav-link active" id="tabhome1settings-tab" data-toggle="tab" href="#tabhome1settings" role="tab" aria-controls="tabhome1settings" aria-selected="true">
      <h5 class="content-color-primary mb-0"><i class="material-icons">chat</i></h5>
      <p class="content-color-secondary mb-0 small">Chat</p>
      </a> </li>
    <li class="nav-item text-center col"> <a class="nav-link" id="tabhome2settings-tab" data-toggle="tab" href="#tabhome2settings" role="tab" aria-controls="tabhome2settings" aria-selected="false">
      <h5 class="content-color-primary mb-0"><i class="material-icons">settings</i></h5>
      <p class="content-color-secondary mb-0 small">Settings</p>
      </a> </li>
    <li class="nav-item text-center col"> <a class="nav-link" id="tabhome3settings-tab" data-toggle="tab" href="#tabhome3settings" role="tab" aria-controls="tabhome3settings" aria-selected="false">
      <h5 class="content-color-primary mb-0"><i class="material-icons">notifications</i></h5>
      <p class="content-color-secondary mb-0 small">Updates</p>
      </a> </li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tabhome1settings" role="tabpanel" aria-labelledby="tabhome1settings-tab">
      <ul class="list-group list-group-flush" id="chat-list">
        <li class="list-group-item new">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user1.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">John Doe <small class="float-right content-color-secondary">7:05 am</small></h6>
              <p>Hi</p>
            </div>
          </div>
        </li>
        <li class="list-group-item new">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user2.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">Alizee TaCkor<small class="float-right content-color-secondary">8:05 am</small></h6>
              <p>GoTRI is best of everyone else</p>
            </div>
          </div>
        </li>
        <li class="list-group-item new">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user3.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">Denial Torry<small class="float-right content-color-secondary">10:05 am</small></h6>
              <p>How are you?</p>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user1.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">John Doe <small class="float-right content-color-secondary">7:05 am</small></h6>
              <p>Hi</p>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user2.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">Alizee TaCkor<small class="float-right content-color-secondary">8:05 am</small></h6>
              <p>GoTRI is best of everyone else</p>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user3.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">Denial Torry<small class="float-right content-color-secondary">10:05 am</small></h6>
              <p>How are you?</p>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user1.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">John Doe <small class="float-right content-color-secondary">7:05 am</small></h6>
              <p>Hi</p>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user2.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">Alizee TaCkor<small class="float-right content-color-secondary">8:05 am</small></h6>
              <p>GoTRI is best of everyone else</p>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user3.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">Denial Torry<small class="float-right content-color-secondary">10:05 am</small></h6>
              <p>How are you?</p>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user1.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">John Doe <small class="float-right content-color-secondary">7:05 am</small></h6>
              <p>Hi</p>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user2.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">Alizee TaCkor<small class="float-right content-color-secondary">8:05 am</small></h6>
              <p>GoTRI is best of everyone else</p>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user3.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">Denial Torry<small class="float-right content-color-secondary">10:05 am</small></h6>
              <p>How are you?</p>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user1.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">John Doe <small class="float-right content-color-secondary">7:05 am</small></h6>
              <p>Hi</p>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user2.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">Alizee TaCkor<small class="float-right content-color-secondary">8:05 am</small></h6>
              <p>GoTRI is best of everyone else</p>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="media">
            <figure class="avatar avatar-40 mr-3"> <img src="img/user3.png" alt="Generic placeholder image"> </figure>
            <div class="media-body">
              <h6 class="my-0">Denial Torry<small class="float-right content-color-secondary">10:05 am</small></h6>
              <p>How are you?</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="tab-pane fade" id="tabhome2settings" role="tabpanel" aria-labelledby="tabhome2settings-tab">
      <div class="row mx-0">
        <div class="col-12">
          <div class="alert alert-success alert-dismissible  mt-2 p-2" role="alert" id="settingalert"> <strong>Congratulation!</strong> <br>
            Your setting has been reflected.
            <button type="button" class="close btn-sm" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          </div>
        </div>
      </div>
      <div class="row mx-0 mt-2">
        <div class="col-12">
          <p class="page-sub-title-small"> <span class="icon-circle mr-2"> <i class="material-icons">settings</i> </span>Application Settings</p>
        </div>
      </div>
      <ul class="list-group  list-group-flush w-100">
        <li class="list-group-item">
          <label class="d-inline-block mr-2">Hide Backdrop</label>
          <input type="checkbox" id="hidebackdrop" class="switch switch-sm">
          <label for="hidebackdrop" class="pink-gradient float-right"></label>
        </li>
        <li class="list-group-item">
          <label class="d-inline-block mr-2">Full Container</label>
          <input type="checkbox" id="full-width3" class="switch switch-sm">
          <label for="full-width3" class="pink-gradient float-right"></label>
        </li>
      </ul>
      <div class="row mx-0 mt-2">
        <div class="col-12">
          <p class="page-sub-title-small"> <span class="icon-circle mr-2"> <i class="material-icons">mail</i> </span>Email Settings</p>
        </div>
      </div>
      <ul class="list-group list-group-flush w-100">
        <li class="list-group-item">
          <label class="d-inline-block mr-2">Receive Updates</label>
          <input type="checkbox" id="dead1" class="switch switch-sm" checked>
          <label for="dead1" class="pink-gradient float-right"></label>
        </li>
        <li class="list-group-item">
          <label class="d-inline-block mr-2">Receive Notification</label>
          <input type="checkbox" id="dead2" class="switch switch-sm" checked>
          <label for="dead2" class="pink-gradient float-right"></label>
        </li>
        <li class="list-group-item">
          <label class="d-inline-block mr-2">Receive Alerts</label>
          <input type="checkbox" id="dead3" class="switch switch-sm">
          <label for="dead3" class="pink-gradient float-right"></label>
        </li>
      </ul>
      <div class="row mx-0 mt-2">
        <div class="col-12">
          <p class="page-sub-title-small"> <span class="icon-circle mr-2"> <i class="material-icons">person</i> </span>User Settings</p>
        </div>
      </div>
      <ul class="list-group list-group-flush w-100">
        <li class="list-group-item">
          <label class="d-inline-block mr-2">Connection List</label>
          <input type="checkbox" id="dead11" class="switch switch-sm">
          <label for="dead11" class="pink-gradient float-right"></label>
          <hr class="mt-2">
          <p class="content-color-secondary small mb-2">Your friends or connection can see your connection list if you allow this setting.</p>
        </li>
        <li class="list-group-item">
          <label class="d-inline-block mr-2">Comments</label>
          <input type="checkbox" id="dead21" class="switch switch-sm" checked>
          <label for="dead21" class="pink-gradient float-right"></label>
          <hr class="mt-2">
          <p class="content-color-secondary small mb-2">Your friends or connection can able to comment on your profile and post you have posted or shared if you allow this setting.</p>
        </li>
        <li class="list-group-item">
          <label class="d-inline-block mr-2">Share</label>
          <input type="checkbox" id="dead31" class="switch switch-sm" checked>
          <label for="dead31" class="pink-gradient float-right"></label>
          <hr class="mt-2">
          <p class="content-color-secondary small mb-2">Your friends or connection can able to share your post you have posted and written by you only if you allow this setting.</p>
        </li>
      </ul>
    </div>
    <div class="tab-pane fade " id="tabhome3settings" role="tabpanel" aria-labelledby="tabhome3settings-tab">
      <div class="row mx-0 mt-0 bg-light">
        <div class="col-12">
          <div class="card my-3">
            <div class="card-body">
              <div class="media">
                <div class="icon-circle icon-50 bg-light-primary mr-3"> <i class="material-icons">track_changes</i> </div>
                <div class="media-body">
                  <h4 class="content-color-primary mb-0">Good Job!</h4>
                  <p class="content-color-secondary mb-3">System running perfectly.</p>
                </div>
              </div>
              <div class="progress progress-small">
                <div class="progress-bar bg-primary col-6" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <p class="page-sub-title-small"> <span class="icon-circle mr-2"> <i class="material-icons">av_timer</i> </span>Application Settings </p>
        </div>
      </div>
      <ul class="list-group list-group-flush w-100 log-information mt-2">
        <li class="list-group-item">
          <div class="avatar avatar-15 border-danger"></div>
          <p class="content-color-primary">System updated <br>
            <small class="content-color-secondary">2:02 am</small></p>
        </li>
        <li class="list-group-item"> <span class="avatar avatar-15 border-warning"></span>
          <p class="content-color-primary">New account Created <br>
            <small class="content-color-secondary">5:02 pm</small></p>
        </li>
        <li class="list-group-item"> <span class="avatar avatar-15 border-success"></span>
          <p class="content-color-primary">Shutdown 2 hours <br>
            <small class="content-color-secondary">Yesterday | 2:02 pm</small></p>
        </li>
        <li class="list-group-item"> <span class="avatar avatar-15 border-primary"></span>
          <p class="content-color-primary">System updated <br>
            <small class="content-color-secondary">Yesterday | 1:32 pm</small></p>
        </li>
        <li class="list-group-item"> <span class="avatar avatar-15 border-dark"></span>
          <p class="content-color-primary">icro changes done! <br>
            <small class="content-color-secondary">14 October 2018 | 2:02 am</small></p>
        </li>
        <li class="list-group-item"> <span class="avatar avatar-15 border-secondary"></span>
          <p class="content-color-primary">icro changes done! <br>
            <small class="content-color-secondary">14 October 2018 | 2:02 am</small></p>
        </li>
      </ul>
      <br>
      <div class="row mx-0 mt-2 bg-light">
        <div class="col-12">
          <p class="page-sub-title-small"> <span class="icon-circle mr-2"> <i class="material-icons">av_timer</i> </span>Application Settings</p>
        </div>
      </div>
      <ul class="list-group list-group-flush w-100 log-information bubble-sheet mt-2">
        <li class="list-group-item">
          <div class="avatar avatar-15 border-danger"></div>
          <p class="content-color-primary">System updated <br>
            <small class="content-color-secondary">2:02 am</small></p>
        </li>
        <li class="list-group-item"> <span class="avatar avatar-15 border-warning"></span>
          <p class="content-color-primary">New account Created <br>
            <small class="content-color-secondary">5:02 pm</small></p>
        </li>
        <li class="list-group-item"> <span class="avatar avatar-15 border-success"></span>
          <p class="content-color-primary">Shutdown 2 hours <br>
            <small class="content-color-secondary">Yesterday | 2:02 pm</small></p>
        </li>
        <li class="list-group-item"> <span class="avatar avatar-15 border-primary"></span>
          <p class="content-color-primary">System updated <br>
            <small class="content-color-secondary">Yesterday | 1:32 pm</small></p>
        </li>
        <li class="list-group-item"> <span class="avatar avatar-15 border-dark"></span>
          <p class="content-color-primary">icro changes done! <br>
            <small class="content-color-secondary">14 October 2018 | 2:02 am</small></p>
        </li>
        <li class="list-group-item"> <span class="avatar avatar-15 border-secondary"></span>
          <p class="content-color-primary">icro changes done! <br>
            <small class="content-color-secondary">14 October 2018 | 2:02 am</small></p>
        </li>
      </ul>
    </div>
  </div>
</div>
<?php */?>