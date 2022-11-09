<div class="sidebar">
    <div class="sidebar-wrapper">
    <p><br></p>
        <div class="logo__centered">
            <a href={{ route('home')}} class="text-center">
                <img class="logo" src="{{ asset('black') }}/img/Logo.png" alt="logo SIAF">
            </a>
        </div>
        <div class="logo_centered text-center ">
            <a href={{ route('home')}} class="text-white logo-normal">
                <b>{{ __('') }}</b></a>
        </div>
        <ul class="nav">
            @can('cuenta.index')
            <li @if ($pageSlug == 'catalogo') class="active " @endif>
                <!--a href="{{ route('home') }}"-->
                <a href="{{ route('catalogo_show') }}">
                    <i class="tim-icons icon-align-left-2"></i>
                    <p>{{ __('Catálogo de cuentas') }}</p>
                </a>
            </li>
            <!--Menusito desplegable-->
            <!--li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Laravel Examples') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ __('User Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li-->
            <li @if ($pageSlug == 'vincular_cuenta') class="active " @endif>
                <a href="{{ route('cuenta_equivalente.index') }}">
                    <i class="tim-icons icon-coins"></i>
                    <p>Cuentas equivalentes</p>
                </a>
            </li>
            @endcan
            @can('periodo.index')
            <li @if ($pageSlug == 'periodo') class="active " @endif>
                <a href="{{ route('periodo.index') }}">
                    <i class="tim-icons icon-chart-bar-32   "></i>
                    <p>{{ __('Períodos contables') }}</p>
                </a>
            </li>
            @endcan
            @can('analisis.index')
            <li @if ($pageSlug == 'empresa') class="active " @endif>
                <a href="{{ route('analisis_horizontal.index') }}">
                    <i class="tim-icons icon-money-coins"></i>
                    <p>{{ __('Ratios') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'ratio') class="active " @endif>
                <a href="{{ route('ratioGeneral.index') }}">
                    <i class="tim-icons  icon-single-copy-04"></i>
                    <p>{{ __('Ratios por sector') }}</p>
                </a>
            </li>
            @endcan
            @canany(['users.index', 'roles.index', 'permission_user.index'])
            <li>
                <a data-toggle="collapse" href="#seguridad" aria-expanded="false">
                    <i class="tim-icons icon-lock-circle" ></i>
                    <span class="nav-link-text" >{{ __('Seguridad') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse" id="seguridad">
                    <ul class="nav pl-4">
                        @can('users.index')
                            <li @if ($pageSlug == 'usuarios') class="active " @endif>
                                <a href="{{ route('users.index') }}">
                                    <i class="tim-icons icon-single-02"></i>
                                    <p>{{ __('Usuarios') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('role.index')
                            <li @if ($pageSlug == 'permisos') class="active " @endif>

                                <a href="{{ route('roles.index') }}">
                                    <i class="tim-icons icon-badge"></i>
                                    <p>{{ __('Roles') }}</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcanany
        </ul>
    </div>
</div>
