
<nav x-data="{ open: false, userMenu: false }" class="main-navigation">
    <style>
        .main-navigation {
            background: #801818;
            color: #FFFFFF;
            border-bottom: 4px solid #641212;
            position: relative;
            z-index: 50;
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .nav-main {
            min-height: 76px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 35px;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #FFFFFF;
        }

        .nav-logo-image {
            width: 43px;
            height: 43px;
            border-radius: 12px;
            object-fit: cover;
            display: block;
            flex-shrink: 0;
        }

        .nav-brand-title {
            font-size: 17px;
            font-weight: 800;
            line-height: 1.3;
        }

        .nav-brand-subtitle {
            font-size: 11px;
            color: #F0DCDC;
            margin-top: 3px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            display: inline-flex;
            align-items: center;
            padding: 11px 16px;
            border-radius: 8px;
            color: #F8EEEE;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .nav-link:hover {
            background: #641212;
            color: #FFFFFF;
        }

        .nav-link.active {
            background: #FFFFFF;
            color: #801818;
        }

        .nav-user-button {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 13px;
            border: 1px solid rgba(255,255,255,0.35);
            border-radius: 10px;
            background: transparent;
            color: #FFFFFF;
            cursor: pointer;
            font-family: inherit;
        }

        .nav-user-button:hover {
            background: #641212;
        }

        .nav-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #F0DCDC;
            color: #801818;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 14px;
        }

        .nav-user-name {
            font-size: 13px;
            font-weight: 700;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .nav-dropdown {
            position: absolute;
            right: 24px;
            top: calc(100% - 2px);
            width: 220px;
            padding: 8px;
            border: 1px solid #E5C7C7;
            border-radius: 12px;
            background: #FFFFFF;
            box-shadow: 0 10px 25px rgba(53, 28, 28, 0.16);
            z-index: 100;
        }

        .nav-dropdown-link {
            display: block;
            width: 100%;
            padding: 11px 13px;
            border-radius: 7px;
            text-align: left;
            text-decoration: none;
            color: #351C1C;
            background: transparent;
            border: none;
            font-family: inherit;
            font-size: 14px;
            cursor: pointer;
        }

        .nav-dropdown-link:hover {
            background: #F8EEEE;
            color: #801818;
        }

        .nav-dropdown-link.logout {
            color: #801818;
            font-weight: 700;
        }

        .nav-user-info {
            padding: 12px;
            border-bottom: 1px solid #E5C7C7;
            margin-bottom: 6px;
            overflow-wrap: anywhere;
        }

        .nav-user-info strong {
            display: block;
            color: #801818;
            font-size: 14px;
        }

        .nav-user-info span {
            display: block;
            color: #765858;
            font-size: 12px;
            margin-top: 4px;
        }

        .nav-mobile-button {
            display: none;
            padding: 9px;
            border: 1px solid rgba(255,255,255,0.35);
            border-radius: 8px;
            background: transparent;
            color: #FFFFFF;
            cursor: pointer;
        }

        .nav-mobile {
            padding: 0 0 16px;
        }

        .nav-mobile-user {
            padding: 16px 0;
            border-top: 1px solid rgba(255,255,255,0.25);
            margin-top: 12px;
        }

        .nav-mobile-user strong {
            display: block;
            font-size: 14px;
        }

        .nav-mobile-user span {
            display: block;
            margin-top: 4px;
            color: #F0DCDC;
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        [x-cloak] {
            display: none !important;
        }

        @media (max-width: 760px) {
            .nav-container {
                padding: 0 16px;
            }

            .nav-main {
                min-height: 68px;
            }

            .nav-left {
                gap: 12px;
            }

            .nav-logo-image {
                width: 40px;
                height: 40px;
            }

            .nav-brand-title {
                font-size: 15px;
            }

            .nav-brand-subtitle {
                font-size: 10px;
            }

            .nav-links,
            .nav-desktop-user {
                display: none;
            }

            .nav-mobile-button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            .nav-mobile .nav-link {
                display: flex;
                width: 100%;
                margin-top: 6px;
            }

            .nav-dropdown {
                right: 16px;
            }
        }

        @media (max-width: 360px) {
            .nav-brand-title {
                font-size: 13px;
            }

            .nav-brand-subtitle {
                font-size: 9px;
            }
        }
    </style>

    <div class="nav-container">
        <div class="nav-main">
            <div class="nav-left">
                <a href="{{ route('dashboard') }}" class="nav-brand">
                    <img
                        src="{{ asset('favicon.svg') }}"
                        alt="Student Services Logo"
                        class="nav-logo-image"
                    >

                    <div>
                        <div class="nav-brand-title">Student Services</div>
                        <div class="nav-brand-subtitle">
                            Request Management System
                        </div>
                    </div>
                </a>

                <div class="nav-links">
                    <a
                        href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    >
                        Dashboard
                    </a>
                </div>
            </div>

            <div class="nav-desktop-user" style="position: relative;">
                <button
                    type="button"
                    class="nav-user-button"
                    @click="userMenu = !userMenu"
                    @click.outside="userMenu = false"
                    :aria-expanded="userMenu"
                >
                    <div class="nav-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <span class="nav-user-name">
                        {{ Auth::user()->name }}
                    </span>

                    <svg width="16" height="16" viewBox="0 0 20 20"
                         fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd" />
                    </svg>
                </button>

                <div
                    x-cloak
                    x-show="userMenu"
                    x-transition
                    class="nav-dropdown"
                >
                    <div class="nav-user-info">
                        <strong>{{ Auth::user()->name }}</strong>
                        <span>{{ Auth::user()->email }}</span>
                    </div>

                    <a href="{{ route('profile.edit') }}"
                       class="nav-dropdown-link">
                        My Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="nav-dropdown-link logout">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>

            <button
                type="button"
                class="nav-mobile-button"
                @click="open = !open"
                :aria-expanded="open"
                aria-label="Toggle navigation menu"
            >
                <svg x-show="!open" width="25" height="25"
                     viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2"
                     stroke-linecap="round">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                <svg x-cloak x-show="open" width="25" height="25"
                     viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2"
                     stroke-linecap="round">
                    <path d="M6 6l12 12M18 6L6 18" />
                </svg>
            </button>
        </div>

        <div x-cloak x-show="open" x-transition class="nav-mobile">
            <a
                href="{{ route('dashboard') }}"
                class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >
                Dashboard
            </a>

            <a href="{{ route('profile.edit') }}" class="nav-link">
                My Profile
            </a>

            <div class="nav-mobile-user">
                <strong>{{ Auth::user()->name }}</strong>
                <span>{{ Auth::user()->email }}</span>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="nav-link"
                    style="width: 100%; border: none; background: transparent; cursor: pointer; font-family: inherit;"
                >
                    Log Out
                </button>
            </form>
        </div>
    </div>
</nav>
