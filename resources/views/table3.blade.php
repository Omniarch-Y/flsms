@extends('layouts.main')
@section('content')
    <div id='wrapper'>
          <nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
              <div class='navbar-header'>
                  <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-hamburger-delicious'>
                      <span class='sr-only'>Toggle navigation</span>
                      <span class='icon-bar'></span>
                      <span class='icon-bar'></span>
                      <span class='icon-bar'></span>
                  </button>
                  <a class='navbar-brand' >Responsive Demo</a>
              </div>
  
              <div class='collapse navbar-collapse navbar-hamburger-delicious'>
                  <ul class='nav navbar-nav side-nav fadeInLeft'>
                      <li class='toggle-nav visible-lg visible-md visible-sm'><a><i class='fa fa-lg fa-arrow-left'></i>Hide Menu</a></li>
                      <li class='dashboard'><a href='#'><i class='fa fa-lg fa-dashboard'></i>Dash</a></li>
                      <li class='active docs'><a href='#docs'><i class='fa fa-lg fa-folder-open'></i>Docs</a></li>
                      <li class='admin'><a href='#admin'><i class='fa fa-lg fa-user'></i>Admin</a></li>
                      <li class='divider'><hr></li>
                      <li class='person-lookup'><a href='#personLookup'><i class='fa fa-lg fa-phone-square'></i>Person Lookup</a></li>
                      <li class='software-support'><a href='#softwareSupport'><i class='fa fa-lg fa-question-circle'></i>Support</a></li>
                      <li class='dashboard-updates'><a href='#dashboardUpdates'><i class='fa fa-lg fa-arrow-up'></i>Updates</a></li>
                      <li class='print'><a><i class='fa fa-lg fa-print'></i>Print</a></li>
                  </ul>
                  <ul class='nav navbar-nav navbar-right navbar-user'>
                      <li class='dropdown user-dropdown'>
                              <a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class="js-user-name">Ryan Gill</span><b class='caret'></b></a>
                              <ul class='dropdown-menu'>
                                      <li class='settings'><a href='#settings'><i class='fa fa-lg fa-gear'></i> Settings</a></li>
                              </ul>
                      </li>
                  </ul>
              </div>
  
          </nav>
  
          <div id='page-wrapper'>
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <h2>Documents</h2>
              <hr />
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12 col-md-12 col-xs-12 js-content">
              <div class="docs-table">
                <table data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-striped="true">
                  <thead>
                    <tr>
                      <th data-field="Type">Type</th>
                      <th data-field="Name">Name</th>
                      <th data-field="Description">Description</th>
                      <th data-field="Tags">Tags</th>
                      <th data-field="LastViewed">Last Viewed</th>
                      <th data-field="Expiration">Expiration</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><i class="fa fa-file-excel-o"></i></td>
                      <td>Remaining Tasks for this app</td>
                      <td>This is a list of all the remaining tasks required to complete this app</td>
                      <td>Responsive, RWD</td>
                      <td>an hour ago</td>
                      <td>Sep 08, 2015</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-file-powerpoint-o"></i></td>
                      <td>EVAMs presentation</td>
                      <td>This is presentation for the EVAM occuring later this month</td>
                      <td>EVAM</td>
                      <td>a day ago</td>
                      <td>Sep 13, 2015</td>
                    </tr>
                    <tr>
                      <td><i class="fa fa-file-word-o"></i></td>
                      <td>Xmas Party list</td>
                      <td>List of all the people who will be attending the holiday party</td>
                      <td>list</td>
                      <td>a few mins ago</td>
                      <td>Dec 25, 2015</td>
                    </tr>
                  </tbody>
                </table>
              </div>
                      </div>
                  </div>
              </div>
  
          </div>
  
      </div>
@endsection

  <style>
    $docs: rgb(34, 153, 81);
$admin: rgb(0,0,0);
$personLookup: rgb(125, 212, 209);
$softwareSupport: rgb(233, 105, 30);
$dashboardUpdates: rgb(164, 106, 206);
$settings: rgb(51, 51, 153);
$white: rgb(255,255,255);
$print: rgb(0,0,0);
$nav-toggle-duration: 500ms;

.rotate-180-deg {
	transform: rotate(180deg);
}

hr {
  margin: 5px 0;
}



.docs-table {
  tbody{
    i {
      display: inline-block;
      margin: 0 auto;
      font-size: 2em;
      width: 100%;
      text-align: center;
    }  
  }
  
}




ul {
  li i {
    display: inline-block;
    margin-right: 10px;
  }
}

li.divider {
	width: 100%;
	hr {
		width: 90%;
		text-align: center;
	}
}

li.sub-li {
	font-size: 0.8em;
}



.navbar.navbar-inverse.navbar-fixed-top {
	background-color: $white;
	border: none;

	.navbar-brand:hover {
		color: #777;
	}
}

.navbar-fixed-bottom .navbar-collapse, .navbar-fixed-top .navbar-collapse {
	max-height: 500px;
}

.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
	border-top: none;
}

.nav.navbar-nav.side-nav {
	background-color: $white;

	transition: width $nav-toggle-duration ease;

	// Nice sexy silky peanut buttery smoothness
	transform: translate3d(0,0,0);

	&.hide-link-text { // used in combination with #wrapper.extended
		width: 48px;
		left: 0;
		margin-left: 0;
	}
}

.navbar-nav {

	li {
		a { transition: all 250ms ease; }

		&:not(.divider):hover {
			cursor: pointer;
		}

		&.toggle-nav {

			i{
				transition: transform $nav-toggle-duration linear;
			}

			i.rotate-180-deg {
				transform-origin: 10px 8px; // looks funny but I kind of like it ;)
			}
		}
	}

	li > a {
		line-height: 35px;

		transition: all 250ms ease;

		i {
			min-width: 24px;
			width: 24px;
			margin-right: 10px;
			padding-right: 10px;
			text-align: center;
		}
	}

	li.active, li.active:hover{
		&.docs > a {
			background-color: $docs;
			border-color: darken($docs, 10%);
		}
		&.admin > a {
			background-color: $admin;
			border: 1px solid darken($admin, 10%);
		}
		&.person-lookup > a {
			background-color: $personLookup;
			border: 1px solid darken($personLookup, 10%);
		}
		&.software-support > a {
			background-color: $softwareSupport;
			border: 1px solid darken($softwareSupport, 10%);
		}
		&.dashboard-updates > a {
			background-color: $dashboardUpdates;
			border: 1px solid darken($dashboardUpdates, 10%);
		}
		&.print > a {
			background-color: $print;
			border: 1px solid darken($print, 10%);
		}
		
	}

	li:hover{
		&.dashboard > a {
			background-color: lighten(#428bca, 10%) !important;
		}
		&.docs > a {
			background-color: lighten($docs, 5%) !important;
		}
		&.admin > a {
			background-color: lighten($admin, 15%) !important;
		}
		&.person-lookup > a {
			background-color: lighten($personLookup, 5%) !important;
		}
		&.software-support > a {
			background-color: lighten($softwareSupport, 5%) !important;
		}
		&.dashboard-updates > a {
			background-color: lighten($dashboardUpdates, 5%) !important;
		}
		&.print > a {
			background-color: lighten($print, 15%) !important;
		}
		
	}
}

// if height is less than 600px
@media (max-height:600px) {
	ul.navbar-nav.side-nav > li > a {
		height: 40px;
		padding: 5px 15px;
	}
}


body {
  margin-top: 52px;
  padding-bottom: 52px;
}
#wrapper {
	height: 100%;
  padding-left: 0;
}
#page-wrapper {
	height: 100%;
  padding: 5px 15px;
  overflow-x: hidden;
  overflow-y: auto;
}

.navbar-inverse {
  background-color: #e7e7e7;
  border-color: #e7e7e7;
}

.navbar-toggle {
    background: rgb(125,120,120);
  }
.navbar-inverse .navbar-nav > .active > a,
.navbar-inverse .navbar-nav > .active > a:hover,
.navbar-inverse .navbar-nav > .active > a:focus {
  color: #fff;
  background-color: #428bca;
}
.navbar-inverse .navbar-nav > .open > a,
.navbar-inverse .navbar-nav > .open > a:hover,
.navbar-inverse .navbar-nav > .open > a:focus {
  color: #fff;
  background-color: #428bca;
}
@media (max-width: 767px) {
  .navbar-inverse .navbar-nav .open .dropdown-menu > .dropdown-header {
    border-color: #DFF0D9;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu .divider {
    background-color: #428bca;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > li > a {
    color: #999;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover,
  .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #fff;
    background-color: transparent;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a,
  .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:hover,
  .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #fff;
    background-color: #428bca;
  }
  .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a,
  .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:hover,
  .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:focus {
    color: #444;
    background-color: transparent;
  }
  
  .nav.navbar-nav.side-nav {
    background-color: rgb(220,225,225);
    border: 2px solid rgb(200, 215, 215);
  }
}

/* Nav Announcements */
.alerts-heading {
  font-size: 50px;
  margin: 0;
}
.alerts-text {
  margin: 0;
}

/* Edit Below to Customize Widths > 768px */
@media (min-width:768px) {
  /* Wrappers */
  #wrapper {
	padding-left: 225px;

	transition: padding-left 800ms ease;

	&.expanded { // used in combination with .side-nav.hide-link-text
		padding-left: 48px;
	}

  }
  #page-wrapper {
	padding: 0px 25px 15px 25px;
  }

  /* Side Nav */
  .side-nav {
	margin-left: -225px;
	left: 225px;
	width: 225px;
	position: fixed;
	top: 50px;
	height: auto;
	border-radius: 0;
	border: none;
	background-color: #F3F3F3;
	overflow-x: hidden;
	overflow-y: hidden;
	user-select: none;
  }

  /*menu overrides*/
  .side-nav>li.dropdown>ul.dropdown-menu {
	position: relative;
	min-width: 225px;
	margin: 0;
	padding: 0;
	border: none;
	border-radius: 0;
	background-color: transparent;
	box-shadow: none;
  }
  .side-nav>li.dropdown>ul.dropdown-menu>li>a {
	color: #999999;
	padding: 15px 15px 15px 25px;
  }
  .side-nav>li.dropdown>ul.dropdown-menu>li>a:hover,
  .side-nav>li.dropdown>ul.dropdown-menu>li>a.active,
  .side-nav>li.dropdown>ul.dropdown-menu>li>a:focus {
	color: #fff;
	background-color: #428bca;
  }
  .side-nav>li>a {
	width: 225px;
  }

  .navbar-inverse .navbar-nav>li>a:hover,
  .navbar-inverse .navbar-nav>li>a:focus {
	background-color: #c9c9c9;
  }

  .navbar-collapse {
    padding-left: 15px !important;
    padding-right: 15px !important;
  }
}

.header-text {
	display: inline-block;
	border-bottom: 1px solid lightgrey;
	font-weight: 300;

	animation-delay: 0;
	animation-duration: 600ms;
}
  </style>

  <script>
    function activateNav() {
  $('ul.nav > li').on('click', function (evt) {
    if ($(evt.currentTarget).hasClass('toggle-nav')) return;
    $(evt.currentTarget).addClass('active').siblings().removeClass('active');
  });
}


var docs = [
  {
    "Type": "excel",
    "Name": "Remaining tasks for this app",
    "Description": "This is a list of all the remaining tasks required to complete this app",
    "Tags": "Responsive, RWD",
    "LastViewed": "an hour ago",
    "Expiration": "Sep 17, 2015"
  },
  {
    "Type": "ppt",
    "Name": "EVAMs presentation",
    "Description": "This is presentation for the EVAM occuring later this month",
    "Tags": "EVAM",
    "LastViewed": "a day ago",
    "Expiration": "Sep 08, 2015"
  },
  {
    "Type": "word",
    "Name": "Xmas Party list",
    "Description": "List of all the people who will be attending the holiday party",
    "Tags": "Responsive, RWD",
    "LastViewed": "a few mins ago",
    "Expiration": "Dec 25, 2014"
  }
];


function addToggle() {
	$('li.toggle-nav').on('click', function () {
		$(this).find('i').toggleClass('rotate-180-deg');
		$('.navbar-nav.side-nav').toggleClass('hide-link-text');
		$('#wrapper').toggleClass('expanded');
	});
}

function fixHamburgerUl() {
	$('.navbar-toggle').on('click', function () {
		$('.navbar-nav.side-nav').removeClass('hide-link-text');
		$("#wrapper").removeClass('expanded');
		$('i.fa-arrow-left').removeClass('rotate-180-deg');
	});
}

function init() {
  activateNav();
  addToggle();
  fixHamburgerUl();
}

init();
  </script>