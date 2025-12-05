<div class="glass-header position-sticky w-100 top-0 z-1020 bg-white shadow-sm">
    <div class="glass-header__top py-1 bg-white border-bottom">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="{{ get_setting('header_left_quick_link1') }}" class="glass-link d-none d-md-inline-flex align-items-center">
                <i class="las la-bolt mr-1"></i>
                <span class="small">{{ get_setting('header_left_quick_link1_text') }}</span>
            </a>
            <div class="glass-header__helpline small d-inline-flex align-items-center text-muted">
                <i class="las la-envelope"></i>
                <span class="ml-1">{{ translate('Helpline') }}:</span>
                <strong class="ml-1 text-dark"> numberonemarry@gmail.com</strong>
            </div>
        </div>
    </div>
    <header class="glass-header__main">
        <div class="container-fluid">
            <div class="glass-header__bar d-flex align-items-center">
                <a href="{{ route('dashboard') }}" class="glass-brand mr-3 order-1">
                    @if(get_setting('header_logo') != null)
                        <img src="{{ static_asset('assets/image-removebg-preview.png') }}" alt="{{ env('APP_NAME') }}">
                    @else
                        <img src="{{ static_asset('assets/image-removebg-preview.png') }}" alt="{{ env('APP_NAME') }}">
                    @endif
                </a>
                <div class="glass-header__nav collapse d-lg-flex flex-grow-1 justify-content-center order-2" id="primaryNav">
                    <nav class="glass-nav">
                        <ul class="glass-nav__list">
                            <li class="glass-nav__item {{ areActiveRoutes(['home'],'is-active') }}">
                                <a href="{{ route('dashboard') }}">
                                    <span class="glass-nav-pill">
                                        <span class="glass-nav-pill-icon">
                                            <i class="las la-home"></i>
                                        </span>
                                        <span class="glass-nav-pill-label">{{ translate('Home') }}</span>
                                    </span>
                                </a>
                            </li>
                            <li class="glass-nav__item {{ areActiveRoutes(['member.listing'],'is-active') }}">
                                <a href="{{ route('member.listing') }}">
                                    <span class="glass-nav-pill">
                                        <span class="glass-nav-pill-icon">
                                            <i class="las la-user-friends"></i>
                                        </span>
                                        <span class="glass-nav-pill-label">{{ translate('Active Members') }}</span>
                                    </span>
                                </a>
                            </li>
                            <li class="glass-nav__item {{ areActiveRoutes(['packages'],'is-active') }}">
                                <a href="{{ route('packages') }}">
                                    <span class="glass-nav-pill">
                                        <span class="glass-nav-pill-icon">
                                            <i class="las la-gem"></i>
                                        </span>
                                        <span class="glass-nav-pill-label">{{ translate('Premium Plans') }}</span>
                                    </span>
                                </a>
                            </li>
                            <!-- <li class="glass-nav__item {{ areActiveRoutes(['happy_stories'],'is-active') }}">
                                <a href="{{ route('happy_stories') }}">
                                    <i class="las la-heart"></i>
                                    <span>{{ translate('Happy Stories') }}</span>
                                </a>
                            </li> -->
                        </ul>
                        <!-- <div class="glass-nav__cta d-lg-none">
                            @if(Auth::check())
                                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-glass btn-block">{{ translate('Go to Dashboard') }}</a>
                                <a href="{{ route('logout') }}" class="btn btn-outline-primary btn-block mt-2">{{ translate('Logout') }}</a>
                            @else
                                <a href="{{ route('register') }}" class="btn btn-primary btn-glass btn-block">{{ translate('Create Profile') }}</a>
                                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-block mt-2">{{ translate('Already a member? Log in') }}</a>
                            @endif
                        </div> -->
                    </nav>
                </div>
                <div class="glass-header__bar-actions d-flex align-items-center ml-auto order-3">
                    <!-- <a href="{{ route('packages') }}" class="d-none d-lg-inline-flex btn btn-sm btn-primary rounded-pill px-4 fw-600 shadow-sm">
                        <i class="las la-gem mr-1"></i>
                        {{ translate('Upgrade Plan') }}
                    </a> -->
                    @php
                        $notifications = Auth::check() ? \App\Models\Notification::latest()->where('notifiable_id',Auth()->user()->id)->take(10)->get() : collect();
                        $unseen_notification = Auth::check() ? \App\Models\Notification::where('notifiable_id',Auth()->user()->id)->where('read_at',null)->count() : 0;
                        $unseen_chat_threads = Auth::check() ? chat_threads() : [];
                        $unseen_chat_thread_count = Auth::check() ? count($unseen_chat_threads) : 0;
                    @endphp
                    @if (Auth::check())
                        <div class="glass-icon-group d-none d-md-inline-flex">
                            <div class="glass-icon-btn dropdown">
                                <a href="javascript:void(0)" class="glass-icon" data-toggle="dropdown" data-display="static">
                                    <i class="las la-bell"></i>
                                    @if($unseen_notification > 0)
                                        <span class="badge badge-dot badge-status badge-primary"></span>
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg py-0">
                                    <div class="p-3 bg-light border-bottom">
                                        <h6 class="mb-0">{{ translate('Notifications') }}</h6>
                                    </div>
                                    <ul class="list-group list-group-raw c-scrollbar-light" style="overflow-y:auto;max-height:300px;">
                                        @include('frontend.inc.notification')
                                    </ul>
                                    <div class="border-top">
                                        <a href="{{ route('frontend.notifications') }}" class="btn text-reset btn-block">{{ translate('View All Notifications') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="glass-icon-btn dropdown">
                                <a href="javascript:void(0)" class="glass-icon" data-toggle="dropdown" data-display="static">
                                    <i class="las la-envelope"></i>
                                    @if($unseen_chat_thread_count > 0)
                                        <span class="badge badge-dot badge-status badge-primary"></span>
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg py-0">
                                    <div class="p-3 bg-light border-bottom">
                                        <h6 class="mb-0">{{ translate('Messages') }}</h6>
                                    </div>
                                    <div class="c-scrollbar-light" style="overflow-y:auto;max-height:300px;">
                                        @forelse ($unseen_chat_threads as $key => $chat_thread_id)
                                            @php
                                                $chat = \App\Models\Chat::where('chat_thread_id', $chat_thread_id)->latest()->first();
                                                $current_user = Auth::user()->id;
                                            @endphp
                                            @if ($chat != null)
                                                <a href="{{ route('all.messages') }}" class="chat-user-item p-3 d-block text-inherit hov-bg-soft-primary">
                                                    <div class="media">
                                                        <span class="avatar avatar-sm mr-3 flex-shrink-0">
                                                            @if($current_user == $chat->chatThread->sender->id)
                                                                @php $user_to_show = 'receiver'; @endphp
                                                            @else
                                                                @php $user_to_show = 'sender'; @endphp
                                                            @endif
                                                            @if ($chat->chatThread->$user_to_show->photo != null)
                                                                <img src="{{ uploaded_asset($chat->chatThread->$user_to_show->photo) }}">
                                                            @else
                                                                <img src="{{ static_asset('assets/img/avatar-place.png') }}">
                                                            @endif
                                                            @if(Cache::has('user-is-online-' . $chat->chatThread->$user_to_show->id))
                                                                <span class="badge badge-dot badge-circle badge-success badge-status badge-md"></span>
                                                            @else
                                                                <span class="badge badge-dot badge-circle badge-secondary badge-status badge-md"></span>
                                                            @endif
                                                        </span>
                                                        <div class="media-body minw-0">
                                                            <h6 class="mt-0 mb-1 fs-14 text-truncate">
                                                                {{ $chat->chatThread->$user_to_show->first_name.' '.$chat->chatThread->$user_to_show->last_name }}
                                                            </h6>
                                                            @if ($chat->message != null)
                                                                <div class="fs-12 text-truncate opacity-60">{{ $chat->message }}</div>
                                                            @else
                                                                <div class="fs-12 text-truncate opacity-60">{{ translate('Attachments') }}</div>
                                                            @endif
                                                        </div>
                                                        <div class="ml-2 text-right">
                                                            <div class="opacity-60 fs-10 mb-1">{{ Carbon\Carbon::parse($chat->created_at)->diffForHumans() }}</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                        @empty
                                            <div class="text-center py-4">
                                                <i class="las la-frown la-4x mb-2 opacity-40"></i>
                                                <h4 class="h6">{{ translate('No New Messages') }}</h4>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="border-top">
                                        <a href="{{ route('all.messages') }}" class="btn text-reset btn-block">{{ translate('View All Messages') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('dashboard') }}" class="glass-profile d-none d-md-inline-flex">
                            <span class="glass-profile__avatar">
                                <img src="{{ uploaded_asset(Auth::user()->photo) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                            </span>
                            <span class="glass-profile__text">
                                <small>{{ translate('Welcome back') }}</small>
                                <strong>{{ Auth::user()->first_name }}</strong>
                            </span>
                        </a>
                        <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-primary rounded-pill shadow-sm d-none d-md-inline-flex">{{ translate('Logout') }}</a>
                    @else
                        <a class="btn btn-sm btn-outline-primary rounded-pill shadow-sm d-none d-md-inline-flex mr-2" href="{{ route('login') }}">{{ translate('Log In') }}</a>
                        <a class="btn btn-sm btn-primary rounded-pill shadow-sm d-none d-md-inline-flex" href="{{ route('register') }}">{{ translate('Create Profile') }}</a>
                    @endif
                    <button class="glass-nav-toggle d-lg-none" type="button" data-toggle="collapse" data-target="#primaryNav" aria-controls="primaryNav" aria-expanded="false" aria-label="{{ translate('Toggle navigation') }}">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
            
            <!-- <div class="d-lg-none px-3 pb-3">
                <div class="mt-2">
                    @if(Auth::check())
                        <a href="{{ route('dashboard') }}" class="btn btn-primary rounded-pill shadow-sm btn-block">{{ translate('Go to Dashboard') }}</a>
                        <a href="{{ route('logout') }}" class="btn btn-outline-primary rounded-pill shadow-sm btn-block mt-2">{{ translate('Logout') }}</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-primary rounded-pill shadow-sm btn-block">{{ translate('Create Profile') }}</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill shadow-sm btn-block mt-2">{{ translate('Already a member? Log in') }}</a>
                    @endif
                </div>
            </div> -->
        </div>
    </header>
</div>
<div class="d-lg-none">
        <div id="mobileSidebarOverlay" style="position:fixed;inset:0;background:rgba(15,23,42,.45);backdrop-filter:blur(4px) saturate(120%);opacity:0;visibility:hidden;transition:opacity .22s ease, visibility .22s ease;z-index:1049;will-change:opacity;"></div>
        <div id="mobileSidebar" class="mobile-sidebar" style="position:fixed;top:0;left:0;height:100vh;width:80%;max-width:340px;background:#fff;border-top-right-radius:14px;border-bottom-right-radius:14px;box-shadow:0 20px 40px rgba(0,0,0,.12);transform:translateX(-100%);transition:transform .28s ease;z-index:1050;display:flex;flex-direction:column;padding-bottom:env(safe-area-inset-bottom);">
            <div style="padding:14px 16px;border-bottom:1px solid rgba(0,0,0,.06);display:flex;align-items:center;justify-content:space-between;">
                <div class="d-flex align-items-center">
                    <i class="las la-bars mr-2"></i>
                    <strong>{{ env('APP_NAME') }}</strong>
                </div>
                <button id="mobileSidebarClose" class="btn btn-sm btn-light rounded-pill" type="button">&times;</button>
            </div>
            <div style="padding:10px 12px;overflow:auto;flex:1;">
                <a href="{{ route('dashboard') }}" class="ms-link">
                    <i class="las la-home mr-2"></i>
                    <span>{{ translate('Home') }}</span>
                </a>
                <a href="{{ route('member.listing') }}" class="ms-link">
                    <i class="las la-users mr-2"></i>
                    <span>{{ translate('Active Members') }}</span>
                </a>
                <a href="{{ route('packages') }}" class="ms-link">
                    <i class="las la-crown mr-2"></i>
                    <span>{{ translate('Premium Plans') }}</span>
                </a>
                <!-- <a href="{{ route('happy_stories') }}" class="ms-link">
                    <i class="las la-heart mr-2"></i>
                    <span>{{ translate('Happy Stories') }}</span>
                </a> -->
                @if(Auth::check())
                    <a href="{{ route('all.messages') }}" class="ms-link">
                        <i class="las la-envelope mr-2"></i>
                        <span>{{ translate('Messages') }}</span>
                    </a>
                    <a href="{{ route('frontend.notifications') }}" class="ms-link">
                        <i class="las la-bell mr-2"></i>
                        <span>{{ translate('Notifications') }}</span>
                    </a>
                    <a href="{{ route('dashboard') }}" class="ms-link">
                        <i class="las la-tachometer-alt mr-2"></i>
                        <span>{{ translate('Dashboard') }}</span>
                    </a>
                @endif
            </div>
        </div>
        <nav class="mobile-bottom-nav d-flex justify-content-around align-items-center px-3" style="position:fixed;bottom:0;left:0;right:0;height:64px;background:#fff;border-top:1px solid rgba(0,0,0,.06);box-shadow:0 -6px 16px rgba(0,0,0,.06);z-index:1051;padding-bottom:env(safe-area-inset-bottom);">
            <button id="mobileHomeBtn" class="mb-item" type="button" aria-label="{{ translate('Menu') }}">
                <i class="las la-home"></i>
            </button>
            <a href="{{ route('member.listing') }}" class="mb-item {{ areActiveRoutes(['member.listing'],'active') }}" aria-label="{{ translate('Members') }}">
                <i class="las la-users"></i>
            </a>
            <a href="{{ route('packages') }}" class="mb-item {{ areActiveRoutes(['packages'],'active') }}" aria-label="{{ translate('Plans') }}">
                <i class="las la-gem"></i>
            </a>
            @if(Auth::check())
                <a href="{{ route('all.messages') }}" class="mb-item {{ areActiveRoutes(['all.messages'],'active') }}" aria-label="{{ translate('Messages') }}">
                    <i class="las la-envelope"></i>
                </a>
                <a href="{{ route('dashboard') }}" class="mb-item {{ areActiveRoutes(['dashboard'],'active') }}" aria-label="{{ translate('Me') }}">
                    <i class="las la-user"></i>
                </a>
            @else
                <a href="{{ route('login') }}" class="mb-item" aria-label="{{ translate('Login') }}">
                    <i class="las la-sign-in-alt"></i>
                </a>
                <a href="{{ route('register') }}" class="mb-item" aria-label="{{ translate('Join') }}">
                    <i class="las la-user-plus"></i>
                </a>
            @endif
        </nav>
        <style>
            /* Global link reset */
            a { text-decoration: none !important; color: inherit; }
            a:hover { text-decoration: none !important; color: inherit; }

            /* Sidebar links */
            .mobile-sidebar .ms-link{display:flex;align-items:center;padding:10px 14px;border-radius:10px;margin:3px 2px;color:#111;background:transparent;transition:background-color .15s ease, transform .1s ease}
            .mobile-sidebar .ms-link:hover{background:rgba(15,23,42,.06)}
            .mobile-sidebar .ms-link:active{transform:scale(.98)}
            .mobile-sidebar .ms-link i{font-size:20px;width:24px;text-align:center;margin-right:8px}
            .mobile-bottom-nav .mb-item{display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;border-radius:999px;border:1px solid rgba(0,0,0,.06);background:#fff;color:#111;box-shadow:0 4px 12px rgba(0,0,0,.08);transition:transform .12s ease, background-color .12s ease, color .12s ease, border-color .12s ease}
            .mobile-bottom-nav .mb-item i{font-size:20px;line-height:1}
            .mobile-bottom-nav .mb-item:active{transform:scale(.96)}
            .mobile-bottom-nav .mb-item.active{background:rgba(37,99,235,.12);color:#2563eb;border-color:rgba(37,99,235,.3)}
        </style>
        
    </div>
<script>
    (function(){
        var homeBtn = document.getElementById('mobileHomeBtn');
        var sidebar = document.getElementById('mobileSidebar');
        var overlay = document.getElementById('mobileSidebarOverlay');
        var closeBtn = document.getElementById('mobileSidebarClose');
        function open(){
            if(!sidebar||!overlay) return;
            sidebar.style.transform = 'translateX(0)';
            overlay.style.opacity = '1';
            overlay.style.visibility = 'visible';
            document.documentElement.style.overflow = 'hidden';
        }
        function close(){
            if(!sidebar||!overlay) return;
            sidebar.style.transform = 'translateX(-100%)';
            overlay.style.opacity = '0';
            overlay.style.visibility = 'hidden';
            document.documentElement.style.overflow = '';
        }
        if(homeBtn){ homeBtn.addEventListener('click', open); }
        if(closeBtn){ closeBtn.addEventListener('click', close); }
        if(overlay){ overlay.addEventListener('click', close); }
        document.addEventListener('keydown', function(e){ if(e.key==='Escape'){ close(); }});
    })();
    // ensure content not hidden behind mobile bottom nav
    (function(){
      function adjust(){
        if (window.innerWidth < 992) {
          document.body.style.paddingBottom = '80px';
        } else {
          document.body.style.paddingBottom = '';
        }
      }
      window.addEventListener('load', adjust);
      window.addEventListener('resize', adjust);
    })();
    </script>
