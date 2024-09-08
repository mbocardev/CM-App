<div id="left-sidebar" class="sidebar">
    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="../assets/images/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Pro. Chandler Bing</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="doctor-profile.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                </ul>
            </div>                
            <hr>
          
        </div>
     
            
        <!-- Tab panes -->
        <div class="tab-content padding-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul class="metismenu li_animation_delay">
                        <li><a href="index.html"><i class="fa fa-dashboard"></i><span>Tableau de bord</span></a></li>
                        <li><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-tag"></i><span>Produits</span></a>
                            <ul>
                                <li><a href="events.html">Liste</a></li>
                                <li><a href="app-inbox.html">Ajouter un produit</a></li>
                                
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="has-arrow"><i class="fa  fa-user-circle"></i><span>Fournisseurs</span> </a>
                            <ul>
                                <li><a href="add-professors.html">Tous les fornisseurs</a></li>
                                <li><a href="professors-list.html">Ajouter</a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="javascript:void(0);" class="has-arrow"><i class="fa fa-users"></i><span>Utilisateurs</span> </a>
                            <ul>
                                <li class="active"><a href="students-add.html">Liste</a></li>
                                <li><a href="{{ route('users.create') }}">Ajouter un utilisateur</a></li>
                                
                            </ul>
                        </li>
                  
                     
                       
                      
                    </ul>
                </nav>
            </div>
            <div class="tab-pane" id="Chat">
                <form>
                    <div class="input-group m-b-20">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </form>
               
            </div> 
        </div>          
    </div>
</div>