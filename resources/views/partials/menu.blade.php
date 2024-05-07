<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('menu_access')
            <li class="{{ request()->is('admin/menus') || request()->is('admin/menus/*') ? 'active' : '' }}">
                <a href="{{ route("admin.menus.index") }}">
                    <i class="fa-fw fas fa-cogs">

                    </i>
                    <span>{{ trans('cruds.menu.title') }}</span>
                </a>
            </li>
            @endcan

            @can('stock_access')
                <li class="{{ request()->is('admin/stocks') || request()->is('admin/stocks/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.stocks.index") }}">
                        <i class="fa-fw fas fa-image">

                        </i>
                        <span>{{ trans('cruds.stock.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('service_access')
                <li class="{{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.services.index") }}">
                        <i class="fa-fw fab fa-servicestack">

                        </i>
                        <span>{{ trans('cruds.service.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('type_of_trainer_access')
                <li class="{{ request()->is('admin/type-of-trainers') || request()->is('admin/type-of-trainers/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.type-of-trainers.index") }}">
                        <i class="fa-fw fas fa-folder">

                        </i>
                        <span>{{ trans('cruds.typeOfTrainer.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('treainer_access')
                <li class="{{ request()->is('admin/treainers') || request()->is('admin/treainers/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.treainers.index") }}">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.treainer.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('photo_gallery_access')
            <li class="{{ request()->is('admin/photo-galleries') || request()->is('admin/photo-galleries/*') ? 'active' : '' }}">
                <a href="{{ route("admin.photo-galleries.index") }}">
                    <i class="fa-fw fab fa-servicestack">

                    </i>
                    <span>{{ trans('cruds.photoGallery.title') }}</span>
                </a>
            </li>
            @endcan
            @can('club_cart_access')
                <li class="{{ request()->is('admin/club-carts') || request()->is('admin/club-carts/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.club-carts.index") }}">
                        <i class="fa-fw fas fa-id-card-alt">

                        </i>
                        <span>{{ trans('cruds.clubCart.title') }}</span>
                    </a>
                </li>
            @endcan
            {{--@can('content_management_access')--}}
                {{--<li class="treeview">--}}
                    {{--<a href="#">--}}
                        {{--<i class="fa-fw fas fa-book">--}}

                        {{--</i>--}}
                        {{--<span>{{ trans('cruds.contentManagement.title') }}</span>--}}
                        {{--<span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>--}}
                    {{--</a>--}}
                    {{--<ul class="treeview-menu">--}}
                        {{--@can('content_category_access')--}}
                            {{--<li class="{{ request()->is('admin/content-categories') || request()->is('admin/content-categories/*') ? 'active' : '' }}">--}}
                                {{--<a href="{{ route("admin.content-categories.index") }}">--}}
                                    {{--<i class="fa-fw fas fa-folder">--}}

                                    {{--</i>--}}
                                    {{--<span>{{ trans('cruds.contentCategory.title') }}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endcan--}}
                        {{--@can('content_tag_access')--}}
                            {{--<li class="{{ request()->is('admin/content-tags') || request()->is('admin/content-tags/*') ? 'active' : '' }}">--}}
                                {{--<a href="{{ route("admin.content-tags.index") }}">--}}
                                    {{--<i class="fa-fw fas fa-tags">--}}

                                    {{--</i>--}}
                                    {{--<span>{{ trans('cruds.contentTag.title') }}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endcan--}}
                        {{--@can('content_page_access')--}}
                            {{--<li class="{{ request()->is('admin/content-pages') || request()->is('admin/content-pages/*') ? 'active' : '' }}">--}}
                                {{--<a href="{{ route("admin.content-pages.index") }}">--}}
                                    {{--<i class="fa-fw fas fa-file">--}}

                                    {{--</i>--}}
                                    {{--<span>{{ trans('cruds.contentPage.title') }}</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endcan--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--@endcan--}}
            @can('contact_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-info">

                        </i>
                        <span>{{ trans('cruds.contactManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('contact_company_access')
                            <li class="{{ request()->is('admin/contact-companies') || request()->is('admin/contact-companies/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.contact-companies.index") }}">
                                    <i class="fa-fw fas fa-building">

                                    </i>
                                    <span>{{ trans('cruds.contactCompany.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('contact_contact_access')
                            <li class="{{ request()->is('admin/contact-contacts') || request()->is('admin/contact-contacts/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.contact-contacts.index") }}">
                                    <i class="fa-fw fas fa-building">

                                    </i>
                                    <span>{{ trans('cruds.contactContact.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('sign_up_training_access')
            <li class="{{ request()->is('admin/sign-up-training') || request()->is('admin/sign-up-training/*') ? 'active' : '' }}">
                <a href="{{ route("admin.sign-up-training.index") }}">
                    <i class="fa-fw fas fa-folder">

                    </i>
                    <span>{{ trans('cruds.signUpTraining.title') }}</span>
                </a>
            </li>
            @endcan
            @can('training_schedule_access')
            <li class="{{ request()->is('admin/training-schedules') || request()->is('admin/training-schedules/*') ? 'active' : '' }}">
                <a href="{{ route("admin.training-schedules.index") }}">
                    <i class="fa-fw fas fa-folder">

                    </i>
                    <span>{{ trans('cruds.trainingSchedule.title') }}</span>
                </a>
            </li>
            @endcan
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>
@section('scripts')
<script>
    // $().ready( () => {
    //     checkTrainingScheduleExist();
    // setInterval(checkTrainingScheduleExist, 10000);
    // });
    var url = '{{ url('admin/sign-up-training') }}';
    var audio = $('#myAudio')[0];

    const checkTrainingScheduleExist = () => {
        setTimeout( () => {

            $.ajax({
                    headers: {'x-csrf-token': _token},
                    url: "{{ route('admin.sign-up-training.newSchedules') }}",
                    type: 'POST',
                    async: true,
                    data: {
                        checkNewOrder: 'true',
                    },
                    dataType: 'json'
                }).done( data => {

            if ( data != null  && data > 0){
                $('#new-order').html("<a class='navbar-brand' href='"+url+"' aria-haspopup='true' aria-expanded='false'><i style='color:red' class='fa-fw fas fa-bell'></i></a>");
                audio.play();
            }
    }).fail( ( jqXHR, textStatus ) => {
        console.log( "Request failed:" + new Date() );
    });
    }, 1000);
    };
</script>
@stop