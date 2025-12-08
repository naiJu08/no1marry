<style>
  .glass-dropdown-panel{
    min-width: 320px;
    border-radius: 18px;
    border: 1px solid rgba(148,163,184,.35);
    background: radial-gradient(circle at 0% 0%, rgba(255,255,255,0.96), transparent 60%),
                radial-gradient(circle at 120% -10%, rgba(191,219,254,0.9), transparent 55%),
                rgba(15,23,42,.96);
    box-shadow: 0 20px 45px rgba(15,23,42,.55);
    padding: 0;
    overflow: hidden;
    -webkit-backdrop-filter: blur(18px) saturate(150%);
    backdrop-filter: blur(18px) saturate(150%);
  }
  .glass-dropdown-header{
    padding: .8rem 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid rgba(148,163,184,.45);
  }
  .glass-dropdown-title{
    display: inline-flex;
    align-items: center;
    gap: .45rem;
    font-size: .85rem;
    font-weight: 600;
    color: #e5e7eb;
  }
  .glass-dropdown-title i{
    font-size: 1.1rem;
  }
  .glass-dropdown-count{
    font-size: .75rem;
    font-weight: 600;
    color: #a5b4fc;
    text-transform: uppercase;
    letter-spacing: .08em;
  }
  .glass-dropdown-count.is-empty{
    color: #9ca3af;
    opacity: .85;
  }
  .glass-dropdown-list{
    max-height: 320px;
    overflow-y: auto;
    background: linear-gradient(to bottom, rgba(15,23,42,.9), rgba(15,23,42,.98));
  }
  .glass-dropdown-footer{
    padding: .6rem 1rem;
    background: rgba(15,23,42,.98);
  }
  .glass-dropdown-footer .btn{
    font-size: .8rem;
    font-weight: 500;
  }
  .glass-dropdown-footer .btn i{
    font-size: .95rem;
  }
  .chat-user-item{
    border-bottom: 1px solid rgba(55,65,81,.55);
  }
  .chat-user-item:last-child{
    border-bottom: none;
  }
  .chat-user-item .media-body h6{
    color: #f9fafb;
  }
  .chat-user-item .fs-12{
    color: #9ca3af;
  }
  .notif-sidebar-overlay{
    position: fixed;
    inset: 0;
    background: rgba(15,23,42,.4);
    -webkit-backdrop-filter: blur(10px) saturate(140%);
    backdrop-filter: blur(10px) saturate(140%);
    opacity: 0;
    visibility: hidden;
    transition: opacity .22s ease, visibility .22s ease;
    z-index: 1048;
  }
  .notif-sidebar-overlay.is-open{
    opacity: 1;
    visibility: visible;
  }
  .notif-sidebar{
    position: fixed;
    top: 0;
    right: 0;
    height: 100vh;
    width: 360px;
    max-width: 100%;
    background: radial-gradient(circle at 0% 0%, rgba(248,250,252,0.98), transparent 65%),
               radial-gradient(circle at 120% -10%, rgba(191,219,254,0.95), transparent 55%),
               rgba(15,23,42,0.98);
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    box-shadow: -18px 0 45px rgba(15,23,42,0.65);
    transform: translateX(100%);
    transition: transform .28s ease;
    z-index: 1049;
    display: flex;
    flex-direction: column;
  }
  .notif-sidebar.is-open{
    transform: translateX(0);
  }
  .notif-sidebar__header{
    padding: .85rem 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid rgba(148,163,184,.45);
  }
  .notif-sidebar__title{
    display: inline-flex;
    align-items: center;
    gap: .45rem;
    font-size: .95rem;
    font-weight: 600;
    color: #0f172a;
  }
  .notif-sidebar__title i{
    font-size: 1.2rem;
  }
  .notif-sidebar__body{
    flex: 1;
    overflow-y: auto;
    background: linear-gradient(to bottom, rgba(15,23,42,.02), rgba(15,23,42,.06));
  }
  .notif-sidebar__footer{
    padding: .75rem 1rem;
    border-top: 1px solid rgba(148,163,184,.35);
    background: rgba(248,250,252,0.9);
  }
  @media (max-width: 767.98px){
    .notif-sidebar{
      width: 100%;
      border-radius: 0;
    }
  }
</style>
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
                        <img src="{{ static_asset('assets/img/logo2.1.png') }}" alt="{{ env('APP_NAME') }}" >
                    @else
                        <img src="{{ static_asset('assets/img/logo2.1.png') }}" alt="{{ env('APP_NAME') }}">
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
                        <div class="glass-icon-group d-inline-flex">
                            <div class="glass-icon-btn">
                                <button type="button" id="notifToggleBtn" class="glass-icon">
                                    <i class="las la-bell"></i>
                                    @if($unseen_notification > 0)
                                        <span class="badge badge-dot badge-status badge-primary"></span>
                                    @endif
                                </button>
                            </div>
                            <div class="glass-icon-btn">
                                <button type="button" id="chatToggleBtn" class="glass-icon">
                                    <i class="las la-envelope"></i>
                                    @if($unseen_chat_thread_count > 0)
                                        <span class="badge badge-dot badge-status badge-primary"></span>
                                    @endif
                                </button>
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
                    <!-- <button class="glass-nav-toggle d-lg-none" type="button" data-toggle="collapse" data-target="#primaryNav" aria-controls="primaryNav" aria-expanded="false" aria-label="{{ translate('Toggle navigation') }}"> -->
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
<div id="notifSidebarOverlay" class="notif-sidebar-overlay"></div>
<div id="notifSidebar" class="notif-sidebar">
    <div class="notif-sidebar__header">
        <div class="notif-sidebar__title">
            <i class="las la-bell"></i>
            <span>{{ translate('Notifications') }}</span>
        </div>
        <button type="button" id="notifSidebarClose" class="btn btn-sm btn-outline-secondary rounded-pill">&times;</button>
    </div>
    <div class="notif-sidebar__body c-scrollbar-light">
        <ul class="list-group list-group-raw mb-0">
            @include('frontend.inc.notification')
        </ul>
    </div>
    <div class="notif-sidebar__footer">
        <a href="{{ route('frontend.notifications') }}" class="btn btn-sm btn-outline-primary w-100">
            {{ translate('View all notifications') }}
        </a>
    </div>
</div>
<div id="chatSidebarOverlay" class="notif-sidebar-overlay"></div>
<div id="chatSidebar" class="notif-sidebar">
    <div class="notif-sidebar__header">
        <div class="notif-sidebar__title">
            <i class="las la-envelope"></i>
            <span>{{ translate('Messages') }}</span>
        </div>
        <button type="button" id="chatSidebarClose" class="btn btn-sm btn-outline-secondary rounded-pill">&times;</button>
    </div>
    <div class="notif-sidebar__body c-scrollbar-light">
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
                <h4 class="h6 text-light">{{ translate('No New Messages') }}</h4>
            </div>
        @endforelse
    </div>
    <div class="notif-sidebar__footer">
        <a href="{{ route('all.messages') }}" class="btn btn-sm btn-outline-primary w-100">
            {{ translate('View all messages') }}
        </a>
    </div>
</div>
<div class="d-lg-none">
        @php $mobileUser = Auth::user(); @endphp
        <div id="mobileSidebarOverlay" style="position:fixed;inset:0;background:rgba(15,23,42,.55);backdrop-filter:blur(10px) saturate(140%);-webkit-backdrop-filter:blur(10px) saturate(140%);opacity:0;visibility:hidden;transition:opacity .22s ease, visibility .22s ease;z-index:1049;will-change:opacity;"></div>
        <div id="mobileSidebar" class="mobile-sidebar" style="position:fixed;top:0;left:0;height:100vh;width:86%;max-width:360px;background:radial-gradient(circle at 0% 0%, rgba(248,250,252,0.98), transparent 65%),radial-gradient(circle at 120% -10%, rgba(191,219,254,0.95), transparent 55%),rgba(15,23,42,0.98);border-top-right-radius:20px;border-bottom-right-radius:20px;box-shadow:0 20px 50px rgba(15,23,42,.55);transform:translateX(-100%);transition:transform .28s ease;z-index:1050;display:flex;flex-direction:column;padding-bottom:env(safe-area-inset-bottom);">
            <div class="ms-drawer-header">
                <div class="d-flex align-items-center">
                    <span class="avatar avatar-sm mr-2">
                        @if($mobileUser && $mobileUser->photo)
                            <img src="{{ uploaded_asset($mobileUser->photo) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                        @else
                            <img src="{{ static_asset('assets/img/avatar-place.png') }}">
                        @endif
                    </span>
                    <div class="d-flex flex-column">
                        <small class="text-uppercase text-muted" style="font-size:.68rem;letter-spacing:.12em;">{{ translate('Quick menu') }}</small>
                        @if($mobileUser)
                            <strong style="font-size:.95rem;">{{ translate('Hi') }}, {{ $mobileUser->first_name }}</strong>
                        @else
                            <strong style="font-size:.95rem;">{{ env('APP_NAME') }}</strong>
                        @endif
                    </div>
                </div>
                <button id="mobileSidebarClose" class="btn btn-sm btn-light rounded-pill" type="button">&times;</button>
            </div>
            <div class="ms-drawer-body">
                <div class="ms-section-label">{{ translate('Browse') }}</div>
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
                    <div class="ms-section-label mt-3">{{ translate('Activity') }}</div>
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
                    <a href="{{ route('logout') }}" class="ms-link">
                        <i class="las la-sign-out-alt mr-2"></i>
                        <span>{{ translate('Logout') }}</span>
                    </a>
                @else
                    <div class="ms-section-label mt-3">{{ translate('Account') }}</div>
                    <a href="{{ route('login') }}" class="ms-link">
                        <i class="las la-sign-in-alt mr-2"></i>
                        <span>{{ translate('Login') }}</span>
                    </a>
                    <a href="{{ route('register') }}" class="ms-link">
                        <i class="las la-user-plus mr-2"></i>
                        <span>{{ translate('Create Profile') }}</span>
                    </a>
                @endif
            </div>
        </div>
        <nav class="mobile-bottom-nav d-flex justify-content-around align-items-center px-3" style="position:fixed;bottom:0;left:0;right:0;height:72px;z-index:1051;padding-bottom:env(safe-area-inset-bottom);">
            <button id="mobileHomeBtn" class="mb-item" type="button" aria-label="{{ translate('Menu') }}">
                <span class="mb-item-icon"><i class="las la-bars"></i></span>
                <span class="mb-item-label">{{ translate('Menu') }}</span>
            </button>
            <a href="{{ route('member.listing') }}" class="mb-item {{ areActiveRoutes(['member.listing'],'active') }}" aria-label="{{ translate('Members') }}">
                <span class="mb-item-icon"><i class="las la-users"></i></span>
                <span class="mb-item-label">{{ translate('Members') }}</span>
            </a>
            <a href="{{ route('packages') }}" class="mb-item {{ areActiveRoutes(['packages'],'active') }}" aria-label="{{ translate('Plans') }}">
                <span class="mb-item-icon"><i class="las la-gem"></i></span>
                <span class="mb-item-label">{{ translate('Plans') }}</span>
            </a>
            @if(Auth::check())
                <a href="{{ route('all.messages') }}" class="mb-item {{ areActiveRoutes(['all.messages'],'active') }}" aria-label="{{ translate('Messages') }}">
                    <span class="mb-item-icon"><i class="las la-envelope"></i></span>
                    <span class="mb-item-label">{{ translate('Messages') }}</span>
                </a>
                <a href="{{ route('dashboard') }}" class="mb-item {{ areActiveRoutes(['dashboard'],'active') }}" aria-label="{{ translate('Me') }}">
                    <span class="mb-item-icon"><i class="las la-user"></i></span>
                    <span class="mb-item-label">{{ translate('Me') }}</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="mb-item" aria-label="{{ translate('Login') }}">
                    <span class="mb-item-icon"><i class="las la-sign-in-alt"></i></span>
                    <span class="mb-item-label">{{ translate('Login') }}</span>
                </a>
                <a href="{{ route('register') }}" class="mb-item" aria-label="{{ translate('Join') }}">
                    <span class="mb-item-icon"><i class="las la-user-plus"></i></span>
                    <span class="mb-item-label">{{ translate('Join') }}</span>
                </a>
            @endif
        </nav>
        <style>
            /* Global link reset */
            a { text-decoration: none !important; color: inherit; }
            a:hover { text-decoration: none !important; color: inherit; }

            /* Sidebar container */
            .mobile-sidebar{color:#0f172a;}

            .ms-drawer-header{padding:14px 16px 12px;border-bottom:1px solid rgba(148,163,184,.35);display:flex;align-items:center;justify-content:space-between;}
            .ms-drawer-body{padding:12px 14px 16px;overflow:auto;flex:1;display:flex;flex-direction:column;gap:4px;}
            .ms-section-label{margin:8px 4px 2px;font-size:.72rem;font-weight:600;text-transform:uppercase;letter-spacing:.12em;color:rgba(15,23,42,.6);}

            /* Sidebar links */
            .mobile-sidebar .ms-link{display:flex;align-items:center;padding:10px 14px;border-radius:999px;margin:3px 2px;color:#0f172a;background:rgba(255,255,255,0.82);box-shadow:0 10px 25px rgba(15,23,42,.18);transition:background-color .15s ease, transform .1s ease, box-shadow .15s ease}
            .mobile-sidebar .ms-link:hover{background:rgba(255,255,255,0.96);box-shadow:0 14px 32px rgba(15,23,42,.24);}
            .mobile-sidebar .ms-link:active{transform:scale(.98)}
            .mobile-sidebar .ms-link i{font-size:20px;width:24px;text-align:center;margin-right:8px}

            /* Mobile bottom navigation */
            .mobile-bottom-nav{
              background: radial-gradient(circle at 0% 0%, rgba(248,250,252,0.96), transparent 60%),
                          radial-gradient(circle at 120% -10%, rgba(191,219,254,0.85), transparent 55%),
                          rgba(15,23,42,0.92);
              border-top: 1px solid rgba(148,163,184,.45);
              box-shadow: 0 -18px 40px rgba(15,23,42,0.55);
              backdrop-filter: blur(18px) saturate(150%);
              -webkit-backdrop-filter: blur(18px) saturate(150%);
            }
            .mobile-bottom-nav .mb-item{
              display:flex;
              flex-direction:column;
              align-items:center;
              justify-content:center;
              min-width:60px;
              height:56px;
              border-radius:16px;
              border:1px solid transparent;
              background:transparent;
              color:#e5e7eb;
              box-shadow:none;
              transition:transform .16s ease, background-color .16s ease, color .16s ease, border-color .16s ease, box-shadow .16s ease;
            }
            .mobile-bottom-nav .mb-item-icon{display:block;font-size:20px;line-height:1}
            .mobile-bottom-nav .mb-item-label{display:block;font-size:10px;margin-top:3px;font-weight:500;letter-spacing:.02em}
            .mobile-bottom-nav .mb-item:active{transform:scale(.95)}
            .mobile-bottom-nav .mb-item:hover:not(.active){background:rgba(15,23,42,0.24);border-color:rgba(148,163,184,.55)}
            .mobile-bottom-nav .mb-item.active{
              background:linear-gradient(135deg,#8f62ff,#ff9f7b);
              color:#fff;
              border-color:rgba(255,255,255,0.65);
              box-shadow:0 10px 26px rgba(79,70,229,0.55);
              transform:translateY(-3px);
            }
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
    (function(){
        var toggleBtn = document.getElementById('notifToggleBtn');
        var overlay = document.getElementById('notifSidebarOverlay');
        var panel = document.getElementById('notifSidebar');
        var closeBtn = document.getElementById('notifSidebarClose');
        function open(){
            if(!panel || !overlay) return;
            panel.classList.add('is-open');
            overlay.classList.add('is-open');
            document.documentElement.style.overflow = 'hidden';
        }
        function close(){
            if(!panel || !overlay) return;
            panel.classList.remove('is-open');
            overlay.classList.remove('is-open');
            document.documentElement.style.overflow = '';
        }
        if(toggleBtn){ toggleBtn.addEventListener('click', open); }
        if(closeBtn){ closeBtn.addEventListener('click', close); }
        if(overlay){ overlay.addEventListener('click', close); }
        document.addEventListener('keydown', function(e){ if(e.key === 'Escape'){ close(); }});
    })();
    (function(){
        var toggleBtn = document.getElementById('chatToggleBtn');
        var overlay = document.getElementById('chatSidebarOverlay');
        var panel = document.getElementById('chatSidebar');
        var closeBtn = document.getElementById('chatSidebarClose');
        function open(){
            if(!panel || !overlay) return;
            panel.classList.add('is-open');
            overlay.classList.add('is-open');
            document.documentElement.style.overflow = 'hidden';
        }
        function close(){
            if(!panel || !overlay) return;
            panel.classList.remove('is-open');
            overlay.classList.remove('is-open');
            document.documentElement.style.overflow = '';
        }
        if(toggleBtn){ toggleBtn.addEventListener('click', open); }
        if(closeBtn){ closeBtn.addEventListener('click', close); }
        if(overlay){ overlay.addEventListener('click', close); }
        document.addEventListener('keydown', function(e){ if(e.key === 'Escape'){ close(); }});
    })();
    </script>
