<div class="kt-header__topbar">
    <!--begin: Search -->
    <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
            <span class="kt-header__topbar-icon"><i class="fa fa-search"></i></span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
            <div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact" id="kt_quick_search_dropdown">
                <form method="get" class="kt-quick-search__form">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
                        <input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
                        <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                    </div>
                </form>
                <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="325" data-mobile-height="200">
                </div>
            </div>
        </div>
    </div>
    <!--end: Search -->

    <!--begin: Language bar -->
    <div class="kt-header__topbar-item kt-header__topbar-item--langs">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
            <span class="kt-header__topbar-icon">
                <img class="" src="assets/media/flags/226-united-states.svg" alt="" />
            </span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
            <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                <li class="kt-nav__item kt-nav__item--active">
                    <a href="#" class="kt-nav__link">
                        <span class="kt-nav__link-icon"><img src="assets/media/flags/226-united-states.svg" alt="" /></span>
                        <span class="kt-nav__link-text">English</span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                        <span class="kt-nav__link-icon"><img src="assets/media/flags/128-spain.svg" alt="" /></span>
                        <span class="kt-nav__link-text">Spanish</span>
                    </a>
                </li>
                <li class="kt-nav__item">
                    <a href="#" class="kt-nav__link">
                        <span class="kt-nav__link-icon"><img src="assets/media/flags/162-germany.svg" alt="" /></span>
                        <span class="kt-nav__link-text">German</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--end: Language bar -->

    <!--begin: User Bar -->
    <div class="kt-header__topbar-item kt-header__topbar-item--user">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
            <div class="kt-header__topbar-user">
                <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                <span class="kt-header__topbar-username kt-hidden-mobile">
                    <?php
                        echo ucfirst($this->session->userdata('merchant_information')->first_name);
                    ?>
                </span>
                <img class="kt-hidden" alt="Pic" src="assets/media/users/300_25.jpg" />
                <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">
                    <?php echo substr(ucfirst($this->session->userdata('merchant_information')->first_name), 0, 1);?>
                </span>
            </div>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

            <!--begin: Head -->
            <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(assets/media/misc/bg-1.jpg)">
                <div class="kt-user-card__avatar">
                    <img class="kt-hidden" alt="Pic" src="assets/media/users/300_25.jpg" />
                    <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">
                        <?php echo substr(ucfirst($this->session->userdata('merchant_information')->first_name), 0, 1);?>
                    </span>
                </div>
                <div class="kt-user-card__name">
                    <?php echo ucfirst($this->session->userdata('merchant_information')->first_name); ?>
                    <?php echo ucfirst($this->session->userdata('merchant_information')->last_name); ?>
                </div>
            </div>
            <!--end: Head -->

            <!--begin: Navigation -->
            <div class="kt-notification">
                <a href="members/merchant/view/<?php echo $this->session->userdata('merchant_information')->id;?>" class="kt-notification__item">
                    <div class="kt-notification__item-icon">
                        <i class="flaticon2-calendar-3 kt-font-success"></i>
                    </div>
                    <div class="kt-notification__item-details">
                        <div class="kt-notification__item-title kt-font-bold">
                            My Profile
                        </div>
                        <div class="kt-notification__item-time">
                            Account settings and more
                        </div>
                    </div>
                </a>
                <div class="kt-notification__custom kt-space-between">
                    <a href="members/merchant/logout" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                </div>
            </div>
            <!--end: Navigation -->
        </div>
    </div>
    <!--end: User Bar -->
</div>