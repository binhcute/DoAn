@extends('layout_admin')
@section('title','Trang Chủ')
@section('content')
<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>User Profile</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">User Profile</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="user-profile">
              <div class="row">
                <!-- user profile first-style start-->
                <div class="col-sm-12">
                  <div class="card hovercard text-center">
                    <div class="cardheader"></div>
                    <div class="user-image">
                      <div class="avatar"><img alt="" src="{{URL::to('/')}}/server/assets/image/account/{{Auth::user()->avatar}}"></div>
                      <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
                    </div>
                    <div class="info">
                      <div class="row">
                        <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                                <h6><i class="fa fa-envelope"></i>   Email</h6><span>{{Auth::user()->email}}</span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                                <h6><i class="fa fa-calendar"></i>   BOD</h6><span>{{Auth::user()->birthday}}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                          <div class="user-designation">
                            <div class="title"><a target="_blank" href="#">{{Auth::user()->firstName }} {{ Auth::user()->lastName }}</a></div>
                            <div class="desc">designer</div>
                          </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                                <h6><i class="fa fa-phone"></i>   Contact Us</h6><span>{{Auth::user()->phone}}</span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="ttl-info text-start">
                                <h6><i class="fa fa-location-arrow"></i>   Location</h6><span>{{Auth::user()->address}}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="social-media">
                        <ul class="list-inline">
                          <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                      </div>
                      <a href="{{route('TaiKhoan.edit',Auth::user()->id)}}" class="btn btn-pill btn-primary-gradien">Chỉnh Sửa</a>
                      <div class="follow">
                        <div class="row">
                          <div class="col-6 text-md-end border-right">
                            <div class="follow-num counter">25869</div><span>Follower</span>
                          </div>
                          <div class="col-6 text-md-start">
                            <div class="follow-num counter">659887</div><span>Following</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- user profile first-style end-->
                @foreach ($article as $item)
                <!-- user profile fifth-style start-->
                <div class="col-sm-12">
                  <div class="card">
                    <div class="profile-img-style">
                      <div class="row">
                        <div class="col-sm-8">
                          <div class="media"><img class="img-thumbnail rounded-circle me-3" src="../assets/images/user/7.jpg" alt="Generic placeholder image">
                            <div class="media-body align-self-center">
                              <h5 class="mt-0 user-name">{{$item->firstName}} {{$item->lastName}}</h5>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4 align-self-center">
                          <div class="float-sm-end"><small>9 Hours ago</small></div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-lg-12 col-xl-4">
                          <div class="my-gallery" id="aniimated-thumbnials-3" itemscope="">
                            <figure itemprop="associatedMedia" itemscope=""><a href="{{URL::to('/')}}/server/assets/image/article/{{$item->article_img}}" itemprop="contentUrl" data-size="1600x950"><img class="img-fluid rounded" src="{{URL::to('/')}}/server/assets/image/article/{{$item->article_img}}" itemprop="thumbnail" alt="gallery"></a>
                              <figcaption itemprop="caption description">Image caption  1</figcaption>
                            </figure>
                          </div>
                          <div class="like-comment mt-4 like-comment-sm-mb">
                            <ul class="list-inline">
                              <li class="list-inline-item border-right pe-3">
                                <label class="m-0"><a href="#"><i class="fa fa-heart"></i></a>  Like</label><span class="ms-2 counter">2659</span>
                              </li>
                              <li class="list-inline-item ms-2">
                                <label class="m-0"><a href="#"><i class="fa fa-comment"></i></a>  Comment</label><span class="ms-2 counter">569</span>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-xl-6">
                          <p>{!!$item->article_description!!}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- user profile fifth-style end-->
                @endforeach
                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="pswp__bg"></div>
                  <div class="pswp__scroll-wrap">
                    <div class="pswp__container">
                      <div class="pswp__item"></div>
                      <div class="pswp__item"></div>
                      <div class="pswp__item"></div>
                    </div>
                    <div class="pswp__ui pswp__ui--hidden">
                      <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--share" title="Share"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                          <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                              <div class="pswp__preloader__donut"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                      </div>
                      <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                      <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                      <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
@endsection